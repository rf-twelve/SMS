@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge(['class'=>'bg-gray-100'])->only('class') }}>
    @unless ($sortable)
        <span class="flex px-3 font-medium tracking-wider text-gray-500 uppercase text-sm">
            {{ $slot }}
        </span>
    @else
        <button {{ $attributes->except('class')}} class="flex text-gray-500 tracking-wider items-center space-x-1 text-sm leading-4 text-left font-medium">
            <span>{{ $slot }}</span>
            <span>
                @if ($direction === 'asc')
                    <x-icon.sort-up class="w-5 h-5 text-gray-600"/>
                @elseif ($direction === 'desc')
                    <x-icon.sort-down class="w-5 h-5 text-gray-600"/>
                @else
                    <x-icon.sort class="w-5 h-5 text-gray-200 hover:text-gray-600"/>
                @endif
            </span>
        </button>
    @endif
</th>
