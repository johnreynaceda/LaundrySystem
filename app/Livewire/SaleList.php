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


class SaleList extends Component
{

public $selected = 'Daily';


    public function render()
    {
        return view('livewire.sale-list',[
           'daily' => Booking::where('status', 'completed')->get(),
           'weekly' => Booking::where('status', 'completed')->whereBetween('date', [Carbon::now(), Carbon::now()->subWeek()])->get(),
           'monthly' => Booking::where('status', 'completed')->whereBetween('date', [Carbon::now(), Carbon::now()->subMonths()])->get(),
        ]);
    }


}
