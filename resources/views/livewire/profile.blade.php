@section('title', 'Profile')

<form wire:submit.prevent='save' class="space-y-8 divide-y divide-gray-200">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>
            <div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                    careful what you share.</p>
            </div>

            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">



                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Username
                        (Max 24 characters)</label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <span
                                class="py-2 inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                workcation.com/ </span>
                            <input wire:model='username' type="text" name="username" id="username"
                                autocomplete="username"
                                class="py-2 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('username') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> About </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <textarea wire:model='about' id="about" name="about" rows="3"
                            class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                        @error('about') <div class="text-red-400 text-sm">{{ $message }}</div> @enderror
                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself (Max 140 characters).
                        </p>
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="photo" class="block text-sm font-medium text-gray-700"> Photo </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
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
                    </div>
                </div>


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
