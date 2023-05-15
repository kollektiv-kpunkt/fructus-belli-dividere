<div class="fbd-letter-divider mt-12 md:mt-20 flex gap-x-2 justify-between items-center">
    <div></div>
    <span class="text-2xs italic whitespace-nowrap">{{__("fbd.letter.title") }}</span>
    <div></div>
</div>
<div class="fbd-letter font-garamond mt-6 md:mt-8 bg-white drop-shadow-2xl p-6 md:p-8">
    @php
        $locale = app()->getLocale();
        $letter = file_get_contents(public_path("markdown/letter.{$locale}.md"));
        $parser = new Illuminate\Support\Str;
        echo $parser->markdown($letter);
    @endphp
    <x-signator-logos />
    <div class="mt-8 font-klima">
        <x-show-more :buttonText="__('fbd.letter.show_sources')">
            @php
                $i = 1;
            @endphp
            @foreach (__("fbd.letter.sources") as $source)
                <p class="text-2xs"><sup class="inline-block pr-1">{{$i}}</sup><a href="{{ $source }}" class="underline text-accent" target="_blank" referrerpolicy="norefferer">{{$source }}</a></p>
                @php
                    $i++;
                @endphp
            @endforeach
        </x-show-more>
    </div>
</div>
