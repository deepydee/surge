@section('title', 'Dashboard')

<div class="py-4 space-y-4">

    <div class="flex justify-between">
        <div class="w-1/4">
            <x-input.text wire:model='search' placeholder="Search Transactions..."/>
        </div>

        <div>
            <x-button.primary wire:click='create'><x-icon.plus />New</x-button.primary>
        </div>
    </div>

    <div class="flex-col space-y-4">
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null" class="w-full">Title</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('amount')" :direction="$sortField === 'amount' ? $sortDirection : null">Amount</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null">Status</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('date')" :direction="$sortField === 'date' ? $sortDirection : null">Date</x-table.heading>
                <x-table.heading />
            </x-slot>
            <x-slot name="body">
                @forelse ($transactions as $transaction)
                    <x-table.row wire:loading.class.delay='opacity-50'>
                        <x-table.cell>
                            <span href="#" class="inline-flex space-x-2 truncate text-sm">
                                <x-icon.cash class="text-gray-400"/>
                                <p class="text-gray-600 truncate">
                                {{ $transaction->title }}
                                </p>
                            </span>
                        </x-table.cell>
        
                        <x-table.cell>
                            <span class="text-gray-900 font-medium">${{ $transaction->amount }} USD</span>
                        </x-table.cell>
                        <x-table.cell>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium  bg-{{$transaction->status_color}}-100 text-{{$transaction->status_color}}-800 capitalize">
                                {{ $transaction->status }}
                            </span>
                        </x-table.cell>
                        <x-table.cell>
                            {{ Carbon\Carbon::parse($transaction->date)->format('M, d Y') }}
                        </x-table.cell>
                        <x-table.cell>
                            <x-button.link wire:click='edit({{ $transaction->id }})'>Edit</x-button.link>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="4">
                            <div class="flex justify-center items-center space-x-2">
                                <x-icon.inbox class="h-8 inline-block text-gray-300 w-8"/>
                                <span class='font-medium py-8 text-gray-400 text-lg'>No transactions found...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>
        </x-table>
        <div>
            {{ $transactions->links() }}
        </div>
    </div>

    <form wire:submit.prevent='save'>
        <x-modal.dialog wire:model='showEditModal'>
            <x-slot name="title">Edit Transaction</x-slot>
        
            <x-slot name="content">
                <div class="space-y-4">
                    <x-input.group for="title" label="Title" :error="$errors->first('editing.title')">
                        <x-input.text wire:model='editing.title' id="title" placeholder="Title" />
                    </x-input.group>

                    <x-input.group for="amount" label="Amount" :error="$errors->first('editing.amount')">
                        <x-input.money wire:model='editing.amount' id="amount" />
                    </x-input.group>

                    <x-input.group for="status" label="Status" :error="$errors->first('editing.status')">
                        <x-input.select wire:model='editing.status' id="status">
                            @foreach (App\Models\Transaction::STATUSES as $value => $label)
                                <option value="{{$value}}">{{$label}}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    
                    <x-input.group for="date" label="Date" :error="$errors->first('editing.date')">
                        <x-input.date wire:model="editing.date" id="date" />
                    </x-input.group>
                </div>
            </x-slot>
        
            <x-slot name="footer">
                <div class="space-x-1">
                    <x-button.secondary>Cancel</x-button.secondary>
                    <x-button.primary type='submit'>Save</x-button.primary>
                </div>
            </x-slot>
        </x-modal.dialog>
    </form>

</div>
