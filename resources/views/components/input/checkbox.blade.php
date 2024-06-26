<div class="flex items-center space-x-2">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        type="checkbox"
        class="rounded h-4 w-4 cursor-pointer border border-gray-500"
        {{ $attributes }}>

    <label for="{{ $id }}" class="text-gray-500 font-thin cursor-pointer">{{ $label }}</label>
</div>
