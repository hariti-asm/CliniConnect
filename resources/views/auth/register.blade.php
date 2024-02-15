<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registerForm">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            <input id="profile_picture" type="file" name="profile_picture" accept="image/*"> <!-- Corrected to 'profile_picture' -->
            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" /> <!-- Corrected to 'profile_picture' -->
        </div>
        
        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="user_type" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="1">Patient</option>
                <option value="2">Doctor</option>
            </select>
            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
        </div>

        <!-- Speciality -->
        <div class="mt-4" id="specialityField" style="display: none;">
            <x-input-label for="speciality" :value="__('Speciality')" />
            <select id="speciality" name="speciality_id" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach($specialities as $speciality)
                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('speciality_id')" class="mt-2" />
        </div>
        
        <!-- Register Button -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    
    <script>
        document.getElementById('role').addEventListener('change', function() {
            var specialityField = document.getElementById('specialityField');
            if (this.value == '2') {
                specialityField.style.display = 'block';
            } else {
                specialityField.style.display = 'none';
            }
        });
    </script>
</x-guest-layout>
