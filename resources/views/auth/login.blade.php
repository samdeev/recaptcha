@php use Anhskohbo\NoCaptcha\Facades\NoCaptcha; @endphp

<x-guest-layout>
    <div>
        <h2 class="text-3xl font-semibold py-4 border-b border-gray-300">Sign In</h2>
        <form action="{{ route('signin') }}" method="POST" class="flex flex-col space-y-6">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email Address')" />
                <x-input-text
                    type="text"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="w-full"
                />
                <x-validation-error :field="__('email')"/>
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" />
                <div class="flex items-center space-x-3">
                    <div class="flex-1">
                        <x-input-text
                            type="password"
                            name="password"
                            id="password"
                            class="w-full"
                        />
                    </div>
                    <x-primary-button class="h-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </x-primary-button>
                </div>
                <x-validation-error :field="__('password')" />
            </div>

            <div>
                {!! NoCaptcha::renderJS() !!}
                {!! NoCaptcha::display() !!}
                <x-validation-error :field="__('g-recaptcha-response')" />
            </div>

            <div class="py-4 border-t border-gray-300">
                <p>Don't have an account?
                    <a href="{{ route('signup') }}" class="text-blue-600">
                        Sign Up
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
