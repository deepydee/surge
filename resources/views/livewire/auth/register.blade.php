@section('title', 'Registration')

<form wire:submit.prevent="register" class="space-y-6">
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 @error('email') border-red-500 @enderror"> Email address </label>
        <div class="mt-1">
            <input wire:model='email' id="email" name="email" type="email" autocomplete="email" required
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('email') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 @error('password') border-red-500 @enderror"> Password </label>
        <div class="mt-1">
            <input wire:model.lazy='password' id="password" name="password" type="password" autocomplete="current-password" required
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('password') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <label for="passwordConfirmation" class="block text-sm font-medium text-gray-700"> Password Confirmation</label>
        <div class="mt-1">
            <input wire:model.lazy='passwordConfirmation' id="passwordConfirmation" name="passwordConfirmation" type="password" autocomplete="current-password" required
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        @error('passwordConfirmation') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
        <button type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
    </div>
</form>

<div class="mt-6">
    <p class="mt-2 text-center text-sm text-gray-600">
        <a href="{{ route('auth.login') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> Already have an account? </a>
    </p>
</div>