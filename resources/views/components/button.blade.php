<button type="{{ $type }}" class="w-full px-5 bg-indigo-600 hover:bg-indigo-500 transition-colors text-white py-1.5 rounded-md">
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
