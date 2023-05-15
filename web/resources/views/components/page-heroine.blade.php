<div class="fbd-page-heroine mb-12 md:mb-20">
    <div class="fbd-page-heroine__inner">
        <h1 class="fbd-page-heroine__title">{{__("fbd.heroine.title")}}</h1>
        <p class="fbd-page-heroine__lead">{!! __("fbd.heroine.lead") !!}</p>
        <div class="fbd-page-heroine__demands fbd-card mt-8">
            <h2 class="fbd-section-title"> {{__("fbd.heroine.demands.title")}} </h2>
            <ul class="list-disc mt-2">
                @foreach (__("fbd.heroine.demands.items") as $item)
                <li class="ml-4 mt-1">{!! $item !!}</li>
                @endforeach
            </ul>
        </div>
        <div class="fbd-page-heroine__ribbon fbd-ribbon"></div>
    </div>
</div>
