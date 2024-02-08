<div>
    <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-5" wire:ignore>
        @foreach ($services as $item)
            <div class="border-2 shadow-xl rounded-xl p-6 border-main flex justify-between items-center">
                <div>
                    <h1 class="font-bold text-2xl uppercase text-main">{{ $item->name }}</h1>
                    <h1 class="font-bold text-sm  text-main/60">(Wash & Dry)</h1>
                </div>
                <div>
                    <x-button label="Get" wire:click="getService({{ $item->id }})"
                        spinner="getService({{ $item->id }})" dark rounded right-icon="arrow-right"
                        class="bg-main font-bold" />
                </div>
            </div>
        @endforeach

    </div>
    <div class="mt-10">
        <div class="flex space-x-1 text-main">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 10l-2 -6"></path>
                <path d="M7 10l2 -6"></path>
                <path
                    d="M15 20h-7.756a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304h13.999a2 2 0 0 1 1.977 2.304l-.161 .918">
                </path>
                <path d="M12 16a2 2 0 1 0 0 -4a2 2 0 0 0 0 4z"></path>
                <path d="M19 22v.01"></path>
                <path d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
            </svg>
            <header class="text-xl font-semibold text-main">Your Transaction</header>
        </div>
        <div class="mt-5 ml-3">
            <ul class="border-b pb-3">
                @forelse ($services_get as $key => $item)
                    <li class="text-lg font-medium text-gray-700 flex space-x-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path
                                d="M11.5 22.75c-.79 0-1.54-.41-2.06-1.11L8.42 20.3c-.21-.28-.49-.44-.79-.46-.29-.02-.6.12-.85.37-.86.92-1.7 1.36-2.49 1.34-.54-.02-1.01-.26-1.37-.7a.862.862 0 01-.11-.19c-.39-.84-.57-1.98-.57-3.69V7.05c0-1.71.18-2.84.57-3.69.03-.06.06-.12.11-.17.35-.45.82-.69 1.36-.72.8-.03 1.65.43 2.49 1.33.25.27.55.4.85.38.3-.02.58-.18.79-.46l1.02-1.35c.52-.7 1.27-1.11 2.06-1.11s1.54.41 2.06 1.11l1.01 1.34c.21.29.5.45.81.47.29.02.6-.12.85-.38.82-.88 1.63-1.33 2.41-1.33.56 0 1.08.25 1.44.72.04.05.08.11.11.18.39.84.57 1.98.57 3.69v9.92c0 1.71-.18 2.84-.57 3.69-.04.09-.09.17-.16.24-.31.4-.82.65-1.39.65-.78 0-1.59-.45-2.41-1.33-.24-.26-.57-.4-.85-.38-.31.02-.59.18-.81.47l-1.01 1.34c-.51.68-1.26 1.09-2.05 1.09zm-3.92-4.42h.13c.74.04 1.43.43 1.9 1.06l1.02 1.35c.49.66 1.23.66 1.72.01l1.01-1.34c.48-.64 1.18-1.02 1.92-1.06.74-.04 1.48.27 2.02.85.74.79 1.19.85 1.31.85.08 0 .15-.02.22-.08.28-.63.4-1.58.4-3V7.05c0-1.4-.13-2.35-.4-2.98a.271.271 0 00-.22-.1c-.12 0-.57.06-1.31.85-.54.58-1.28.89-2.02.85-.75-.04-1.45-.43-1.93-1.06l-1.01-1.34c-.49-.66-1.23-.66-1.72 0L9.6 4.63c-.47.63-1.16 1.01-1.9 1.05-.74.04-1.48-.27-2.02-.84-.61-.66-1.08-.88-1.34-.87-.06 0-.13.02-.21.1-.27.63-.4 1.58-.4 2.98v9.92c0 1.41.13 2.36.4 2.99.09.08.15.09.21.1.25.01.72-.21 1.33-.86.53-.57 1.22-.87 1.91-.87z">
                            </path>
                            <path
                                d="M16 11H8c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h8c.41 0 .75.34.75.75s-.34.75-.75.75zM14 14.5H8c-.41 0-.75-.34-.75-.75S7.59 13 8 13h6c.41 0 .75.34.75.75s-.34.75-.75.75z">
                            </path>
                        </svg>
                        <span>
                            {{ $item['name'] }} x {{ $item['quantity'] }}
                        </span>
                    </li>
                @empty
                    <span class="text-sm text-red-400 animate-pulse">No Records...</span>
                @endforelse

            </ul>
            <div class="mt-2">
                @php
                    $total_sum = 0;

                    foreach ($services_get as $key => $value) {
                        $total_sum += $value['total'];
                    }

                    $sum = $total_sum;
                @endphp
                <span class="text-red-500 font-bold">TOTAL AMOUNT: &#8369;{{ number_format($sum, 2) }}</span>
            </div>
        </div>
        <div class="my-10">
            <div
                class=" rounded-lg shadow-lg flex space-x-4 items-center w-64 overflow-hidden border-2 border-[#007CFF]">
                <img src="{{ asset('images/gcash.png') }}" class="h-12" alt="">
                <span
                    class="font-semibold text-gray-700">{{ \App\Models\User::where('is_admin', true)->first()->contact }}</span>
            </div>
            <div class="mb-5 mt-5 w-96">
                {{ $this->form }}
            </div>
            <x-button label="Submit Transaction" right-icon="arrow-right" dark class="font-medium" rounded
                wire:click="submitTransaction({{ $total_sum }})" spinner="submitTransaction({{ $total_sum }})" />
        </div>
    </div>

    <x-modal wire:model.defer="quantity_modal" align="center" max-width="lg">
        <x-card>
            <div>
                <div>
                    <h1 class="font-bold text-2xl uppercase text-main">{{ $service_name ?? '' }}</h1>
                    <h1 class="font-bold text-sm  text-main/60">(Wash & Dry)</h1>
                </div>
                <div class="mt-5 flex justify-center">
                    <div x-data="{ count: @entangle('quantity') }" class="flex items-center gap-x-3">
                        <x-button x-hold.click.repeat.200ms="count--" icon="minus" />

                        <span class="bg-main rounded-lg text-white px-5 py-2" x-text="count"></span>

                        <x-button x-hold.click.repeat.200ms="count++" icon="plus" />
                    </div>
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button class="bg-main text-white hover:text-main font-bold" label="OK" wire:click="ok"
                        spinner="ok" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
