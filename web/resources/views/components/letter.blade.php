<div class="fbd-letter-divider mt-12 md:mt-20 flex gap-x-2 justify-between items-center">
    <div></div>
    <span class="text-2xs italic whitespace-nowrap">{{__("fbd.letter.title") }}</span>
    <div></div>
</div>
<div class="fbd-letter mt-6 md:mt-8 bg-white drop-shadow-2xl p-6 md:p-8">
    @php
        $locale = app()->getLocale();
        $letter = file_get_contents(public_path("markdown/letter.{$locale}.md"));
        $parser = new Illuminate\Support\Str;
        echo $parser->markdown($letter);
    @endphp
    <x-signator-logos />
</div>
