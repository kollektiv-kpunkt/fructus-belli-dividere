<div class="fbd-page-heroine mb-12 md:mb-20">
    <div class="fbd-page-heroine__inner">
        @if (request()->session()->get('success') === true)
            <div class="fbd-page-heroine__alert--success bg-green-200 border-green-700 border text-green-700 font-bold p-4 mb-6 sticky top-0">
                <p>{{__("fbd.form.successmessage")}}</p>
            </div>
        @endif
        @if($errors->any())
        <div class="fbd-page-heroine__alert--error bg-red-200 border-red-700 border text-red-700 font-bold p-4 mb-6 sticky top-0">
            <p>{{__("fbd.form.errormessage")}}</p>
        </div>
        @endif
        <h1 class="fbd-page-heroine__title">{!! __("fbd.heroine.title") !!}</h1>
        <p class="fbd-page-heroine__lead">{!! __("fbd.heroine.lead") !!}</p>
        <div class="fbd-page-heroine__demands fbd-card mt-8">
            <h2 class="fbd-section-title"> {!!__("fbd.heroine.demands.title")!!} </h2>
            <ul class="list-disc mt-2">
                @foreach (__("fbd.heroine.demands.items") as $item)
                <li class="ml-4 mt-1">{!! $item !!}</li>
                @endforeach
            </ul>
        </div>
        <div class="fbd-page-heroine__ribbon fbd-ribbon"></div>
    </div>
</div>
