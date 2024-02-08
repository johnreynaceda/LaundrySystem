<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class Report extends Component
{
    public $date_from, $date_to;
    public function render()
    {
        return view('livewire.admin.report',[
            'booking' => Booking::when($this->date_from, function($record){
                $record->whereBetween('updated_at', [$this->date_from, $this->date_to]);
            })->get(),
        ]);
    }
}
