<div class="fbd-supporters mt-12 md:mt-20">
    <h2 class="fbd-section-title">{{__("fbd.supporters.title")}}</h2>
    <div class="fbd-supporters__imagegrid grid grid-cols-3 md:grid-cols-5 gap-4 md:gap-6 mt-4">
        @php
            $logos = glob(public_path('images/supporters/' . app()->getLocale()) . "/*");
            shuffle($logos);
        @endphp
        @foreach ($logos as $logo)
        <div class="flex justify-center items-center aspect-square">
            <img src="{{asset('images/supporters/' . app()->getLocale() . '/' . basename($logo))}}" alt="" class="object-contain w-full">
        </div>
        @endforeach
    </div>
</div>
