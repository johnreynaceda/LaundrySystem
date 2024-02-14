<nav :class="{ 'flex': open, 'hidden': !open }"
    class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">



    <div class="inline-flex items-center gap-7 2xl:mt-0 mt-4 text-white list-none">
        @if (auth()->check())
            @if (auth()->user()->is_admin == false)
                <a class="hover:text-gray-300 text-sm 2xl:text-base " href="{{ route('user.dashboard') }}">HOME</a>
            @else
                <a class="hover:text-gray-300 text-sm 2xl:text-base " href="{{ route('welcome') }}">HOME</a>
            @endif
        @else
            <a class="hover:text-gray-300 text-sm 2xl:text-base " href="{{ route('welcome') }}">HOME</a>
        @endif
        <a class="hover:text-gray-300 text-sm 2xl:text-base " href="{{ route('about') }}">ABOUT</a>
        <a class="hover:text-gray-300 text-sm 2xl:text-base " href="{{ route('pricing') }}">PRICING</a>
        @if (auth()->check())
            <a class="hover:text-gray-300" href="{{ route('user.booking') }}">MY BOOKING
                ({{ \App\Models\Booking::where('user_id', auth()->user()->id)->count() }})</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="flex items-center border p-2 rounded space-x-2">
                    <span class="uppercase">{{ auth()->user()->name }}</span>
                    <x-button href="{{ route('logout') }}"
                        onclick="event.preventDefault();
            this.closest('form').submit();" icon="logout"
                        class="text-white hover:text-main font-medium" />
                </div>
            </form>
        @else
            <x-button label="SIGN IN" href="{{ route('login') }}" class="text-white hover:text-main font-medium" />
        @endif
    </div>
</nav>
