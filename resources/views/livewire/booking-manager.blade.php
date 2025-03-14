<div>
    <input type="date" wire:model="startDate">
    <input type="date" wire:model="endDate">
    <button wire:click="book" class="bg-primary text-white px-4 py-2">Réserver</button>
    @if (session()->has('message'))
        <div class="text-green-500">{{ session('message') }}</div>
    @endif
</div>
