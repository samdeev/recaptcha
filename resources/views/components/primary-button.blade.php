<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'bg-blue-700 text-white px-3 rounded-md'
]) }}>
    {{ $slot }}
</button>
