<div x-data>
    <div class="flex justify-between items-end">
        <div class="w-1/2 flex space-x-5">
            <x-datetime-picker label="Date From" without-time wire:model.live="date_from" />
            <x-datetime-picker label="Date To" without-time wire:model.live="date_to" />
        </div>
        <div wire:ignore>
            @if (request()->routeIs('admin.report'))
                <x-button label="Print Report" dark icon="printer" @click="printOut($refs.printContainer.outerHTML);" />
            @endif
        </div>
    </div>
    <div class="mt-10 " x-ref="printContainer">
        <div class="flex justify-between items-end border-b pb-3">
            <div class="flex space-x-3 items-center">
                <x-shared.logo class="h-16" />
                <div>
                    <h1 class="font-bold text-2xl text-main">LAUNDRY</h1>
                    <h1 class="font-bold text-sm leading-3 text-gray-500">Wellmade Laundry Shop</h1>
                </div>
            </div>
            <div class="text-right">
                <div wire:ignore>
                    @if (request()->routeIs('admin.sales'))
                        <span class="text-2xl font-bold text-gray-700">SALES INCOME REPORT</span>
                    @else
                        <span class="text-2xl font-bold text-gray-700">COLLECTION REPORT</span>
                    @endif
                </div>

                {{-- @if ($date_to == null)
                    <p class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($date_from)->format('F d, Y') }}
                    </p>
                @else
                    <div class="flex-space-x-2">
                        <span
                            class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($date_from)->format('F d, Y') }}</span>
                        -
                        <span
                            class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($date_to)->format('F d, Y') }}</span>
                    </div>
                @endif --}}
                @php
                    $start = \Carbon\Carbon::parse($date_from);
                    $end = \Carbon\Carbon::parse($date_to);

                    $interval = $start->diff($end);
                    $dayDifference = $interval->days;

                    if ($dayDifference <= 1) {
                        $frequency = 'daily';
                    } elseif ($dayDifference <= 7) {
                        // Difference of 6 means 7 days inclusive
                        $frequency = 'weekly';
                    } elseif ($dayDifference <= 31) {
                        $frequency = 'monthly';
                    } else {
                        $frequency = 'yearly';
                    }
                @endphp

                {{ $frequency }}
            </div>
        </div>
        <div class="mt-5">
            <table id="example" style="width:100%">
                <thead class="font-normal">
                    <tr>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">FULLNAME</th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            DATE
                        </th>
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
                    @foreach ($booking as $item)
                        <tr>
                            <td class="border-2  text-gray-700  px-3 py-1">{{ $item->user->name }}
                            </td>
                            <td class="border-2  text-gray-700  px-3 py-1">
                                {{ \Carbon\Carbon::parse($item->date)->format('F d, Y') . ' - ' . \Carbon\Carbon::parse($item->time)->format('h:i A') }}
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
                        <td class=""></td>
                        <td class="text-right pr-1 font-bold text-gray-700">
                            TOTAL:
                        </td>
                        <td class="border-2  text-gray-700 font-bold  px-3 py-1">
                            &#8369;{{ number_format($booking->sum('total_amount'), 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
