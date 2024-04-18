@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-gray-800 text-sm font-medium mb-1.5']) }}>
    {{ $value ?? $slot }}
</label>
