@props(['field'])

@error($field)
    <p class="block mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
@enderror
