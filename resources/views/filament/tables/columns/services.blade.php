<div class="ml-3">
    <ul>
        @foreach (\App\Models\BookingTransaction::where('booking_id', $getRecord()->id)->get() as $item)
            <li>{{ $item->service->name }} x {{ $item->quantity }}</li>
        @endforeach
    </ul>
</div>
