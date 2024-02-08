@switch($getRecord()->status)
    @case('pending')
        <x-badge label="Pending" class="ml-3" warning flat />
    @break

    @case('in progress')
        <x-badge label="In Progress" class="ml-3" positive flat />
    @break

    @case('declined')
        <x-badge label="Declined" class="ml-3" negative flat />
    @break

    @case('completed')
        <x-badge label="Completed" class="ml-3" positive />
    @break

    @default
@endswitch
