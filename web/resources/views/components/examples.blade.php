<?php
use Illuminate\Support\Str;
?>
<div class="fbd-examples mt-12 md_mt-20" >
    <h2 class="fbd-section-title">{{__("fbd.examples.title")}}</h2>
    <div class="fbd-examples__cards grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
        @foreach (__("fbd.examples.examples") as $key => $example)
        <div class="fbd-examples__card fbd-card !p-0">
            <img src="{{$example['cardimg']}}" class="fbd-examples__card-img">
            <div class="fbd-examples__card-content p-4">
                <h3 class="text-lg md:text-xl">{!! $example["title"] !!}</h3>
                <button class="fbd-examples__card-button inline-block mt-2 text-lg border-b-2 border-b-accent" data-card-key="{{$key}}">{{__("fbd.examples.readmore")}} <i class="icofont-simple-right-up"></i></button>
            </div>
        </div>
        @endforeach
        <script src=https://public.flourish.studio/resources/embed.js></script>
    </div>
    <div class="fbd-examples__more-contents mt-12">
        @foreach (__("fbd.examples.examples") as $key => $example)
        <div class="fbd-examples__more-content max-h-0 overflow-hidden" data-card-key="{{$key}}">
            @php
                $contents = file_get_contents(public_path($example["content"]));
                echo Str::markdown($contents);
            @endphp
        </div>
        @endforeach
    </div>
</div>
