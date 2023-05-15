<?php
$directory = public_path('images/orgas/' . app()->getLocale());
$logos = glob($directory . "/*");
shuffle($logos);
?>
<div class="fbd-signator-logos grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-8 mt-8 md:mt-12">
    @foreach ($logos as $logo)
    <div class="flex justify-center items-center">
        <img src="{{asset('images/orgas/' . app()->getLocale() . '/' . basename($logo))}}" alt="" class="h-12 md:h-16 object-contain">
    </div>
    @endforeach
</div>
