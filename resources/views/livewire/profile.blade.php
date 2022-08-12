@section('title', 'Profile')

<form wire:submit.prevent='save' class="space-y-8 divide-y divide-gray-200">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>
            <div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                    careful what you share.</p>
            </div>

            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                <x-input.group label="Username" for="username" :error="$errors->first('username')" help-text="Max 24 characters">
                    <x-input.text wire:model='username' name="username" id="username" autocomplete="username" leading-add-on="surge.test/"
                    />
                </x-input.group>

                <x-input.group label="About" for="about" :error="$errors->first('about')" help-text="Write a few sentences about yourself (Max 140 characters)">
                    <x-input.textarea wire:model='about' name="about" id="about" />
                </x-input.group>

                <x-input.group label="Photo" for="photo">
                    <div class="flex items-center">
                        <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <button type="button"
                            class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
                    </div>
                </x-input.group>


            </div>

            <div class="pt-5">
                <div class="flex justify-end items-center space-x-3">
                    <span
                    x-data="{ open: false }"
                    x-init="
                       @this.on('notify-saved', () => {
                            open = true;
                            setTimeout(() => {open = false}, 2500);
                        });
                    "
                    x-show="open"
                    x-transition:leave.duration.1000ms
                    x-cloak
                    class="text-gray-500"
                    >Saved!</span>
                    <button type="button"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </div>
</form>
