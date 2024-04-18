<select {{ $attributes->merge([
    'class' => 'border border-gray-300 bg-transparent h-10 px-3 rounded-md focus:ring-2 focus:ring-gray-900
    focus:ring-offset-2 focus:border-gray-400'
]) }}>
    {{ $slot }}
</select>
