<style>
    details[open] {
        & summary .chevron-icon {
            transform: rotate(180deg);
        }
    }

    details[open] summary ~ *
    {	animation: ease-opacity-t-b .5s ease}

    .chevron-icon {
        transition: all 0.5s;
    }
</style>

<details {{ $open ? 'open' : '' }} {{ $attributes->merge(['class' => 'w-full cursor-pointer']) }}>
    <summary class="list-none cursor-pointer flex py-2 items-center justify-between">
        <div class="flex items-center">
            <div class="flex items-center">
                <h4 class="font-semibold">
                    @isset($dropdownTitle)
                        {{ $dropdownTitle }}
                    @else
                        {{ $dropdownTitle }}
                    @endisset
                </h4>
            </div>

            @if($withInfo)
                <button>
                    <x-heroicon-o-information-circle class="h-4 ml-1 text-gray-500" />
                </button>

                <div>
                    {{ $info }}
                </div>
            @endif
        </div>

        <x-heroicon-c-chevron-up class="h-6 chevron-icon" />
    </summary>
    <div>
        @isset($content)
            {{ $content }}
        @else
            {{ $slot }}
        @endisset
    </div>
</details>
