<div x-data>
    <div class="flex justify-between items-center">
        <div class="mb-10 w-64">
            <x-native-select wire:model.live="selected">

                <option>Select an Option</option>

                <option>Daily</option>

                <option>Weekly</option>

                <option>Monthly</option>

            </x-native-select>
        </div>
        <div>
            <x-button label="Print Report" dark icon="printer" @click="printOut($refs.printContainer.outerHTML);" />
        </div>
    </div>
    @if ($selected == 'Daily')
        <div x-ref="printContainer">
            <div class="flex justify-between items-end border-b pb-3">
                <div class="flex space-x-3 items-center">
                    <x-shared.logo class="h-16" />
                    <div>
                        <h1 class="font-bold text-2xl text-main">LAUNDRY</h1>
                        <h1 class="font-bold text-sm leading-3 text-gray-500">Wellmade Laundry Shop</h1>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-2xl font-bold text-gray-700">SALES INCOME REPORT</span>
                    <div class="font-bold">
                        (DAILY SALES)
                    </div>
                </div>
            </div>
            <div>
                <table id="example" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                TYPE
                            </th>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                KG
                            </th>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                FEE
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($daily as $item)
                            <tr>
                                <td class="border  text-gray-700  px-3 py-1">{{ $item->user->name }}
                                </td>
                                <td class="border  text-gray-700  px-3 py-1">
                                    <ul>
                                        @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                            <li>{{ $transaction->service->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border  text-gray-700  px-3 py-1">
                                    <ul>
                                        @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                            <li>{{ $transaction->quantity }}kg
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td class="border  text-gray-700  px-3 py-1">
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
                            <td class="border  text-gray-700 font-bold  px-3 py-1">
                                &#8369;{{ number_format($daily->sum('total_amount') ?? 0, 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @elseif ($selected == 'Weekly')
        <div x-ref="printContainer">
            <div class="flex justify-between items-end border-b pb-3">
                <div class="flex space-x-3 items-center">
                    <x-shared.logo class="h-16" />
                    <div>
                        <h1 class="font-bold text-2xl text-main">LAUNDRY</h1>
                        <h1 class="font-bold text-sm leading-3 text-gray-500">Wellmade Laundry Shop</h1>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-2xl font-bold text-gray-700">SALES INCOME REPORT</span>
                    <div class="font-bold">
                        (WEEKLY SALES)
                    </div>
                </div>
            </div>
            <div>
                <table id="example" style="width:100%">
                    <thead class="font-normal">
                        <tr>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                TYPE
                            </th>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                KG
                            </th>
                            <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                                FEE
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($daily as $item)
                            <tr>
                                <td class="border  text-gray-700  px-3 py-1">{{ $item->user->name }}
                                </td>
                                <td class="border  text-gray-700  px-3 py-1">
                                    <ul>
                                        @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                            <li>{{ $transaction->service->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border  text-gray-700  px-3 py-1">
                                    <ul>
                                        @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                            <li>{{ $transaction->quantity }}kg
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td class="border  text-gray-700  px-3 py-1">
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
                            <td class="border  text-gray-700 font-bold  px-3 py-1">
                                &#8369;{{ number_format($daily->sum('total_amount') ?? 0, 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="flex justify-between items-end border-b pb-3">
            <div class="flex space-x-3 items-center">
                <x-shared.logo class="h-16" />
                <div>
                    <h1 class="font-bold text-2xl text-main">LAUNDRY</h1>
                    <h1 class="font-bold text-sm leading-3 text-gray-500">Wellmade Laundry Shop</h1>
                </div>
            </div>
            <div class="text-right">
                <span class="text-2xl font-bold text-gray-700">SALES INCOME REPORT</span>
                <div class="font-bold">
                    (MONTHLY SALES)
                </div>
            </div>
        </div>
        <div x-ref="printContainer">
            <table id="example" style="width:100%">
                <thead class="font-normal">
                    <tr>
                        <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                        <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            TYPE
                        </th>
                        <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            KG
                        </th>
                        <th class="border  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            FEE
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($daily as $item)
                        <tr>
                            <td class="border  text-gray-700  px-3 py-1">{{ $item->user->name }}
                            </td>
                            <td class="border  text-gray-700  px-3 py-1">
                                <ul>
                                    @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                        <li>{{ $transaction->service->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="border  text-gray-700  px-3 py-1">
                                <ul>
                                    @foreach (\App\Models\BookingTransaction::where('booking_id', $item->id)->get() as $transaction)
                                        <li>{{ $transaction->quantity }}kg
                                        </li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="border  text-gray-700  px-3 py-1">
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
                        <td class="border  text-gray-700 font-bold  px-3 py-1">
                            &#8369;{{ number_format($daily->sum('total_amount') ?? 0, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif


</div>
