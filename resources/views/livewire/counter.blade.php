<div style="text-align: center">
    <input type="text" wire:model.debounce.1000ms="count.name" placeholder="Type Here" />
    <h1>@foreach ($count as $item)
        {{ $item }}
    @endforeach</h1>
</div>
