<button type="{{ $type }}" {{ $attributes->merge(['class' => $getButtonClass()])->except(['color', 'size']) }}>
    @isset($title)
        {{ $title }}
    @else
        @isset($content)
            {{ $content }}
        @else
            {{ $slot }}
        @endisset
    @endisset
</button>
