<div>
    <div class="grid grid-cols-3 gap-5">
        <div class="p-6 rounded-xl bg-white shadow-xl">
            <div class="flex justify-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-yellow-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M13 21V23.5L10 21.5L7 23.5V21H6.5C4.567 21 3 19.433 3 17.5V5C3 3.34315 4.34315 2 6 2H20C20.5523 2 21 2.44772 21 3V20C21 20.5523 20.5523 21 20 21H13ZM7 19V17H13V19H19V16H6.5C5.67157 16 5 16.6716 5 17.5C5 18.3284 5.67157 19 6.5 19H7ZM7 5V7H9V5H7ZM7 8V10H9V8H7ZM7 11V13H9V11H7Z">
                        </path>
                    </svg>
                </div>
                <h1 class="font-bold text-3xl text-main uppercase">{{ $book }}</h1>
            </div>
            <div class="mt-2 flex justify-start">
                <h1 class="font-bold text-lg text-main uppercase">BOOK</h1>
            </div>
        </div>
        <div class="p-6 rounded-xl bg-white shadow-xl">
            <div class="flex justify-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-yellow-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12ZM20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12ZM18 12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12C6 10.3431 6.67157 8.84315 7.75736 7.75736L12 12V6C15.3137 6 18 8.68629 18 12Z">
                        </path>
                    </svg>
                </div>
                <h1 class="font-bold text-3xl text-main uppercase">{{ $inprogress }}</h1>
            </div>
            <div class="mt-2 flex justify-start">
                <h1 class="font-bold text-lg text-main uppercase">in progress</h1>
            </div>
        </div>
        <div class="p-6 rounded-xl bg-white shadow-xl">
            <div class="flex justify-between">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 text-yellow-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M6.99979 7V3C6.99979 2.44772 7.4475 2 7.99979 2H20.9998C21.5521 2 21.9998 2.44772 21.9998 3V16C21.9998 16.5523 21.5521 17 20.9998 17H17V20.9925C17 21.5489 16.551 22 15.9925 22H3.00728C2.45086 22 2 21.5511 2 20.9925L2.00276 8.00748C2.00288 7.45107 2.4518 7 3.01025 7H6.99979ZM8.99979 7H15.9927C16.549 7 17 7.44892 17 8.00748V15H19.9998V4H8.99979V7ZM8.50242 18L14.1593 12.3431L12.7451 10.9289L8.50242 15.1716L6.3811 13.0503L4.96689 14.4645L8.50242 18Z">
                        </path>
                    </svg>
                </div>
                <h1 class="font-bold text-3xl text-main uppercase">{{ $completed }}</h1>
            </div>
            <div class="mt-2 flex justify-start">
                <h1 class="font-bold text-lg text-main uppercase">Completed</h1>
            </div>
        </div>
    </div>
    <div class="mt-10 bg-white p-5 rounded-lg">
        <h1 class="mb-3 uppercase font-bold text-main">Booking Request</h1>

        {{ $this->table }}
    </div>
</div>
