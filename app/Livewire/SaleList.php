<?php

namespace App\Livewire;

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


class SaleList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Booking::query()->where('status', 'completed'))
            ->columns([
                TextColumn::make('user.name')->label('USER'),
                ViewColumn::make('services')->label('SERVICES')->view('filament.tables.columns.services'),
                TextColumn::make('total_amount')->label('TOTAL AMOUNT')->formatStateUsing(
                    function($record){
                        return '₱'.number_format($record->total_amount,2);
                    }
                ),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // EditAction::make('edit')->color('success')->form([
                //     TextInput::make('name')->required(),
                //     Textarea::make('description')->required(),
                //     TextInput::make('amount')->label('Price')->required(),
                // ])->modalWidth('xl'),
                // DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.sale-list',[
            'sales_total_amount' => Booking::where('status', 'completed')->sum('total_amount'),
        ]);
    }
}
