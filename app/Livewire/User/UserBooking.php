<?php

namespace App\Livewire\User;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Shop\Product;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserBooking extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Booking::query()->where('user_id', auth()->user()->id))
            ->columns([
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
                ViewAction::make('view')->label('VIEW DETAILS')->color('warning')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.user.user-booking');
    }
}
