<x-page-heroine />
<div class="fbd-intro">
    @foreach (__("fbd.intro") as $paragraph)
    <p class="fbd-paragraph">{!! $paragraph !!}</p>
    @endforeach
</div>
<x-letter/>

