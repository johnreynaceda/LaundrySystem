<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\BookingTransaction;
use App\Models\Service;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use WireUi\Traits\Actions;
class Transaction extends Component implements HasForms
{
    use InteractsWithForms;
    use Actions;
    public $quantity = 0;
    public $services_get = [];
    public $service_name;
    public $date, $time;
    public $service_id;
    public $payments = [], $note;
    public $quantity_modal = false;
    public function render()
    {
        return view('livewire.transaction',[
            'services' => Service::get(),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date')->required(),
                TimePicker::make('time')->required()->withoutSeconds(),
               FileUpload::make('payments')->label('PROOF OF PAYMENT')->required(),
               Textarea::make('note')->required()->label('NOTE')
            ]);
    }

    public function getService($id){
        sleep(1);
        $service = Service::where('id', $id)->first();
        $this->quantity = 0;
        $this->service_name = $service->name;
        $this->service_id = $id;
        $this->quantity_modal = true;
    }

    public function ok(){
$service = Service::where('id', $this->service_id)->first();

        $this->services_get[] = [
            'id' => $this->service_id,
            'name' => $service->name,
            'quantity' => $this->quantity,
            'total' => (int)$service->amount * (int)$this->quantity,
        ];


        $this->quantity_modal = false;
    }

    public function submitTransaction($total){

        $data = Carbon::parse($this->date);
        // dd(BookingTransaction::whereDate('date', $data)->get()->count());
        if (Booking::whereDate('date', $data)->get()->count() > 20) {
            $this->dialog()->error(

                $title = 'DATE IS FULLY BOOKED',

                $description = 'we allow 20 booking per day.'

            );
        }else{
            if (count($this->services_get) > 0) {
                sleep(2);
                $this->validate([
                    'payments' =>'required',
                    'note' =>'required',
                ]);

                foreach ($this->payments as $key => $value) {
                    $booking = Booking::create([
                        'user_id' => auth()->user()->id,
                        'total_amount' => $total,
                        'date' => Carbon::parse($this->date),
                        'time' => Carbon::parse($this->time),
                        'proof_of_payment' => $value->store('Payments', 'public'),
                        'note' => $this->note,
                    ]);
                }

                foreach ($this->services_get as $key => $value) {
                    BookingTransaction::create([
                        'booking_id' => $booking->id,
                        'service_id' => $value['id'],
                        'quantity' => $value['quantity'],
                        'amount' => $value['total'],
                    ]);
                    $this->reset('services_get','payments', 'note','date', 'time');
                }
              }else{
                  $this->dialog()->error(
                        $title = 'Error',
                        $description = 'Please select service first.'
                );
              }
        }

    }
}
