<div class="flex items-center space-x-2">
    <input
        id="{{ $id }}"
        name="{{ $name }}"
        {{ isset($attributes['checked']) && $attributes['checked'] ? 'checked' : '' }}
        type="checkbox" class="rounded h-4 w-4 cursor-pointer border border-gray-500">
    <label for="{{ $id }}" class="text-gray-500 font-thin cursor-pointer">{{ $label }}</label>
</div>
