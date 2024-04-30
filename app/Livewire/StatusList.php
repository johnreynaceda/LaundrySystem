<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Shop\Product;
use Carbon\Carbon;
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


class StatusList extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Booking::query()->where('status','!=','pending')->orderBy('created_at','DESC'))
            ->columns([
                TextColumn::make('user.name')->label('CUSTOMER NAME')->formatStateUsing(
                    function($record){
                        return strtoupper($record->user->name);
                    }
                ),
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
                    Action::make('complete')->color('success')->icon('heroicon-s-clipboard-document-check')->action(
                        function($record){

                            $record->update([
                                'status' => 'completed',
                            ]);
                            $api_key = '1aaad08e0678a1c60ce55ad2000be5bd';
                            $sender = 'SEMAPHORE';
                            $ch = curl_init();
                            $parameters = [
                                'apikey' => $api_key,
                                'number' => $record->user->contact,
                                'message' => 'Dear ' . strtoupper($record->user->name) . ', your laundry has been completed.' . ' You may now able to pick-up your laundry. '. Carbon::parse(now())->format('F d, Y'). ', '. Carbon::parse(now())->format('H:i A') ,
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

                ])->visible(
                    function($record){
                        return $record->status == 'in progress';
                    }
                )
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.status-list');
    }
}
