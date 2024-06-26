<div class="inline-flex items-center">
    <input id="{{ $id }}" name="{{ $name }}" type="radio" value="{{ $value }}" {{ $attributes->merge(['class' => $getRadioBoxClass()]) }} {{ $attributes }}" />

    <label for="{{ $id }}" class="{{ $getLabelClass() }}">
        @isset($radioIcon)
            {{ $content }}
        @else
            @isset($content)
                {{ $content }}
            @else
                {{ $slot ?? $label}}
            @endisset
        @endisset
    </label>
</div>
