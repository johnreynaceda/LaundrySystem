<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Shop\Product;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;


class Dashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Booking::query()->where('status','pending'))
            ->columns([
                TextColumn::make('user.name')->label('CUSTOMER NAME'),
                ViewColumn::make('services')->label('SERVICES')->view('filament.tables.columns.services'),
                ViewColumn::make('payment')->label('PROOF OF PAYMENT')->view('filament.tables.columns.payment'),

                TextColumn::make('note')->label('NOTE'),
                TextColumn::make('total_amount')->label('TOTAL AMOUNT')->formatStateUsing(
                    function($record){
                        return '₱'.number_format($record->total_amount,2);
                    }
                ),
                ViewColumn::make('status')->label('STATUS')->view('filament.tables.columns.status')

            ])
            ->filters([
                // ...
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('accept')->color('success')->icon('heroicon-s-hand-thumb-up')->action(
                        function($record){

                            $record->update([
                                'status' => 'in progress',
                            ]);
                            $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
                            $sender = 'SEMAPHORE';
                            $ch = curl_init();
                            $parameters = [
                                'apikey' => $api_key,
                                'number' => $record->user->contact,
                                'message' => 'Dear ' . strtoupper($record->user->name) . ', your laundry booking has been accepted.' . ' Please visit our shop for the other transaction.',
                                'sendername' => $sender,
                            ];
                            curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
                            curl_setopt( $ch, CURLOPT_POST, 1 );

                            //Send the parameters set above with the request
                            curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

                            // Receive response from server
                            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                            $output = curl_exec( $ch );
                            curl_close ($ch);

                            return $output;



                        }
                    ),
                    Action::make('decline')->color('danger')->icon('heroicon-s-hand-thumb-down')->action(
                        function($record){
                            $record->updated([
                                'status' => 'declined',
                            ]);
                            $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
                            $sender = 'SEMAPHORE';
                            $ch = curl_init();
                            $parameters = [
                                'apikey' => $api_key,
                                'number' => $record->user->contact,
                                'message' => 'Dear ' . strtoupper($record->user->name) . ', your laundry booking has been declined.' . ' Please visit our shop for the other transaction.',
                                'sendername' => $sender,
                            ];
                            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $output = curl_exec($ch);
                            curl_close($ch);

                            return $output;

                        }
                    ),
                ])
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.dashboard',[
            'book' => Booking::where('status', 'pending')->count(),
            'inprogress' => Booking::where('status', 'in progress')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
        ]);
    }
}
