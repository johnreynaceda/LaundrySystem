<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\Shop\Product;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ServiceList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Service::query())->headerActions([
                CreateAction::make('new_service')->color('main')->icon('heroicon-o-plus')->form([
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required(),
                    TextInput::make('amount')->label('Price')->required(),
                ])->modalWidth('xl'),
            ])
            ->columns([
                TextColumn::make('name')->label('SERVICE NAME'),
                TextColumn::make('description')->label('DESCRIPTION'),
                TextColumn::make('amount')->label('PRICE')->formatStateUsing(
                    function($record){
                        return '₱'.number_format($record->amount,2).'/ KG';
                    }
                ),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('name')->required(),
                    Textarea::make('description')->required(),
                    TextInput::make('amount')->label('Price')->required(),
                ])->modalWidth('xl'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.admin.service-list');
    }
}
