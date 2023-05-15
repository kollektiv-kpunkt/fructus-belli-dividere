<div x-data="{ open: false }">
    <div x-show="open" x-transition class="mb-6">
        {{ $slot }}
    </div>

    <button class="fbd-button" x-on:click="open = ! open">{{$buttonText}}</button>
</div>
