<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Shop\Product;
use App\Models\User;
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

class CustomerList extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query()->where('is_admin',false))
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('contact')->label('CONTACT')->searchable(),
                TextColumn::make('address')->label('ADDRESS')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([

            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.customer-list');
    }
}
