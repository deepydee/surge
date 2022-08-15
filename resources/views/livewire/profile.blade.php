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
                    <x-input.text wire:model='user.username' name="username" id="username" autocomplete="username" leading-add-on="surge.test/"
                    />
                </x-input.group>

                <x-input.group label="Birthday" for="birthday" :error="$errors->first('birthday')">
                    <x-input.date wire:model='user.birthday' name="birthday" id="birthday" placeholder="MM/DD/YYYY"/>
                </x-input.group>

                <x-input.group label="About" for="about" :error="$errors->first('about')" help-text="Write a few sentences about yourself (Max 140 characters)">
                    <x-input.rich-text wire:model.defer='user.about' id="about"/>
                </x-input.group>

                <x-input.group label="Photo" for="photo" :error="$errors->first('upload')">
                    <x-input.avatar wire:model='upload' id="photo">
                        <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            @if ($upload)
                                <img src="{{ $upload->temporaryUrl() }}" alt="Profile photo">
                            @else
                                <img src="{{ auth()->user()->avatarUrl() }}" alt="Profile photo">
                            @endif
                        </span>
                    </x-input.avatar>
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
