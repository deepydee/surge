@props(['initialValue' => ''])

<div
    class="rounded-md shadow-sm"
    wire:ignore
    {{ $attributes }}
    x-data
    @trix-blur="$dispatch('change', $event.target.value)"
>  
    <input id="x" value="{{ $initialValue }}" type="hidden">
    <trix-editor input="x" class="bg-white px-2 py-2 shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></trix-editor>
</div>


@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.css">
@endpush

@push('scripts')
    <script src="https://unpkg.com/trix@2.0.0-beta.0/dist/trix.umd.js"></script>
@endpush