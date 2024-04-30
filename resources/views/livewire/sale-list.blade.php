<div>
    {{-- <div class="mb-10 w-64">
        <x-native-select label="Select Status" wire:model.live="selected">

            <option>Select an Option</option>

            <option>Daily</option>

            <option>Weekly</option>

            <option>Monthly</option>

        </x-native-select>
    </div>
    @if ($selected == 'Daily')
        <span class="font-bold mb-10 uppercase text-gray-700 ">Daily Sales</span>
        <table id="example" style="width:100%">
            <thead class="font-normal">
                <tr>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        TYPE
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        KG
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        FEE
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($daily as $item)
                    <tr>
                        <td class="border-2  text-gray-700  px-3 py-1">{{ $item->user->name }}
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1">
                            <ul>
                                @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                    <li>{{ $transaction->service->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1">
                            <ul>
                                @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                    <li>{{ $transaction->quantity }}kg
                                    </li>
                                @endforeach
                            </ul>
                        </td>

                        <td class="border-2  text-gray-700  px-3 py-1">
                            &#8369;{{ number_format($item->total_amount, 2) }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="text-right pr-1 font-bold text-gray-700">
                        TOTAL:
                    </td>
                    <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                        &#8369;{{ number_format($daily->sum('total_amount') ?? 0, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>
    @elseif ($selected == 'Weekly')
        <span class="font-bold mb-10 uppercase text-gray-700 ">Weekly Sales</span>
        <table id="example" style="width:100%">
            <thead class="font-normal">
                <tr>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        TYPE
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        KG
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        FEE
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($daily as $item)
                    <tr>
                        <td class="border-2  text-gray-700  px-3 py-1">{{ $item->user->name }}
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1">
                            <ul>
                                @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                    <li>{{ $transaction->service->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1">
                            <ul>
                                @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                    <li>{{ $transaction->quantity }}kg
                                    </li>
                                @endforeach
                            </ul>
                        </td>

                        <td class="border-2  text-gray-700  px-3 py-1">
                            &#8369;{{ number_format($item->total_amount, 2) }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="text-right pr-1 font-bold text-gray-700">
                        TOTAL:
                    </td>
                    <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                        &#8369;{{ number_format($daily->sum('total_amount') ?? 0, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <span class="font-bold mb-10 uppercase text-gray-700 ">Monthly Sales</span>
        <table id="example" style="width:100%">
            <thead class="font-normal">
                <tr>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        TYPE
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        KG
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                        FEE
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($daily as $item)
                    <tr>
                        <td class="border-2  text-gray-700  px-3 py-1">{{ $item->user->name }}
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1">
                            <ul>
                                @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                    <li>{{ $transaction->service->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1">
                            <ul>
                                @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                    <li>{{ $transaction->quantity }}kg
                                    </li>
                                @endforeach
                            </ul>
                        </td>

                        <td class="border-2  text-gray-700  px-3 py-1">
                            &#8369;{{ number_format($item->total_amount, 2) }}
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td class=""></td>
                    <td class=""></td>
                    <td class="text-right pr-1 font-bold text-gray-700">
                        TOTAL:
                    </td>
                    <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                        &#8369;{{ number_format($daily->sum('total_amount') ?? 0, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>
    @endif --}}

    <div class="bg-white p-6  rounded-xl ">
        <livewire:admin.report />
        <script>
            function printOut(data) {
                var mywindow = window.open('', '', 'height=1000,width=1000');
                mywindow.document.head.innerHTML =
                    '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
                mywindow.document.body.innerHTML = '<div>' + data +
                    '</div><script src="{{ Vite::asset('resources/js/app.js') }}"/>';

                mywindow.document.close();
                mywindow.focus(); // necessary for IE >= 10
                setTimeout(() => {
                    mywindow.print();
                    return true;
                }, 1000);
            }
        </script>
    </div>
</div>
