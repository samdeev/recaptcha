@php use Anhskohbo\NoCaptcha\Facades\NoCaptcha; @endphp

<x-guest-layout>
    <div>
        <h2 class="text-3xl font-semibold py-4 border-b border-gray-300">Register New Account</h2>
        <form action="{{ route('signup') }}" method="POST" class="flex flex-col space-y-6">
            @csrf

            <div class="flex items-start gap-2">
                <div>
                    <x-input-text
                        type="text"
                        name="first_name"
                        id="first_name"
                        placeholder="First Name"
                        class="w-full"
                        value="{{ old('first_name') }}"
                    />
                    <x-validation-error :field="__('first_name')" />
                </div>

                <div>
                    <x-input-text
                        type="text"
                        name="middle_name"
                        id="middle_name"
                        placeholder="Middle Name (Optional)"
                        class="w-full"
                        value="{{ old('middle_name') }}"
                    />
                    <x-validation-error :field="__('middle_name')" />
                </div>
            </div>

            <div>
                <x-input-text
                    type="text"
                    name="last_name"
                    id="last_name"
                    placeholder="Last Name"
                    class="w-full"
                    value="{{ old('last_name') }}"
                />
                <x-validation-error :field="__('last_name')" />
            </div>

            <div>
                <x-input-text
                    type="text"
                    name="email"
                    id="email"
                    placeholder="Email Address"
                    value="{{ old('email') }}"
                    class="w-full"
                />
                <x-validation-error :field="__('email')"/>
            </div>

            <div class="flex items-start gap-2">
                <div class="flex-1">
                    <x-select name="gender" class="w-full">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male" @selected(old('gender') == 'male')>Male</option>
                        <option value="female" @selected(old('gender') == 'female')>Female</option>
                    </x-select>
                    <x-validation-error :field="__('gender')" />
                </div>
                <div>
                    <x-input-text
                        type="date"
                        name="birth_date"
                        id="datepicker"
                        placeholder="Birthdate MM/DD/YYYY"
                        class="w-full"
                    />
                    <x-validation-error :field="__('birth_date')" />
                </div>
            </div>

            <div class="flex items-start gap-2">
                <div>
                    <x-input-text
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="w-full"
                    />
                    <x-validation-error :field="__('password')" />
                </div>
                <div>
                    <x-input-text
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm Password"
                        class="w-full"
                    />
                    <x-validation-error :field="__('password_confirmation')" />
                </div>
            </div>

            <div>
                {!! NoCaptcha::renderJS() !!}
                {!! NoCaptcha::display() !!}
                <x-validation-error :field="__('g-recaptcha-response')" />
            </div>

            <div class="py-4 border-t border-gray-300">
                <div class="flex gap-3">
                    <x-primary-button class="px-6">
                        {{ __('Register') }}
                    </x-primary-button>
                    <div>
                        <p>Already have an account?</p>
                        <a href="{{ route('signin') }}" class="text-blue-600">
                            Sign In
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-guest-layout>
