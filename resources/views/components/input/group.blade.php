@props([
    'label',
    'for',
    'error' => false,
    'helpText' => false,
])
<div {{ $attributes->merge(['class' => 'sm:grid sm:grid-cols-3 sm:gap-4 sm:items-startsm:border-gray-200']) }}>
    <label for= {{ $for }} class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
        {{ $label }}
    </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        {{ $slot }}

        @if ($helpText)
            <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
        @endif

        @if ($error)
             <div class="text-red-400 text-sm">{{ $error }}</div>
        @endif
    </div>
</div>