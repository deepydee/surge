@section('title', 'Dashboard')

<div class="py-4">
    <x-table>
        <x-slot name="head">
            <x-table.heading sortable>Title</x-table.heading>
            <x-table.heading sortable>Amount</x-table.heading>
            <x-table.heading sortable>Status</x-table.heading>
            <x-table.heading sortable>Date</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ($transactions as $transaction)
                <x-table.row>
                    <x-table.cell>
                        {{ $transaction->title }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $transaction->amount }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $transaction->status }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $transaction->date }}
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
</div>
