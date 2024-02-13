<x-user-layout>
    {{-- <div class="flex flex-col justify-center flex-1 md:px-12 lg:flex-none">
        <div class="relative ">
            <div class="relative">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="relative sm:overflow-hidden py-20">
                        <h1 class="font-bold text-3xl uppercase text-main">About Us</h1>
                        <p class="mt-5 text-xl">
                            Welcome to Wellmade Laundry Shop – Where Excellence Meets Freshness!
                        </p>
                        <p class="mt-5 text-xl">
                            Established on June 23, 2023, Wellmade Laundry Shop has been a beacon of reliability and
                            quality in the world of laundry services. Our journey began with a simple yet profound
                            mission: to provide our customers with a laundry experience that is as exceptional as their
                            wardrobes deserve.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

    <section class="">
        <div class="px-8 py-12 mx-auto md:px-12 lg:px-32 max-w-7xl ">
            <div class="mx-auto text-center max-w-3l">
                <span class="text-3xl font-bold tracking-wide text-main uppercase">Pricing</span>

            </div>
            <div
                class="grid grid-cols-1 gap-4 p-8 mt-12 bg-white shadow-sm md:grid-cols-2 lkg:mt-24 lg:p-12 rounded-4xl">
                @forelse (\App\Models\Service::get() as $item)
                    <div class="flex flex-col justify-between h-full">

                        <div class="p-8 overflow-hidden bg-gray-100 shadow-sm border-b-2 border-main rounded-3xl">
                            <h1 class="text-4xl font-bold uppercase text-main">
                                {{ $item->name }}
                            </h1>
                            <h1 class="text-gray-600">Wash & Dry</h1>
                            <div class="w-full mt-8">
                                <h1 class="text-4xl font-semibold text-red-400">
                                    &#8369;{{ number_format($item->amount, 2) }}/KG</h1>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class="font-medium  text-2xl text-gray-500">No Services Available...</h1>
                @endforelse

            </div>
        </div>
    </section>

</x-user-layout>
