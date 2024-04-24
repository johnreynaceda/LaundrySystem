<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use Carbon\Carbon;
use Livewire\Component;

class Report extends Component
{
    public $date_from, $date_to;
    public function render()
    {
        return view('livewire.admin.report',[
            'booking' => Booking::where('status', 'completed')->when($this->date_from, function($record){
                $record->whereBetween('date', [Carbon::parse($this->date_from), Carbon::parse($this->date_to)]);
            })->get(),
        ]);
    }
}
