
<x-frontend-layout>
    <x-navbar />
    <div class="fbd-simple-page">
        <x-frontend-container size="sm">
            <div class="fbd-simple-page__heroine relative">
                <h1>{{$title}}</h1>
                <div class="fbd-ribbon"></div>
            </div>
        </x-frontend-container>
        <div class="fbd-simple-page__content mt-12">
            <x-frontend-container size="sm">
                @php
                    $parser = new Illuminate\Support\Str;
                    echo $parser->markdown($content);
                @endphp
            </x-frontend-container>
        </div>
    </div>

    <x-Footer/>
</x-frontend-layout>
