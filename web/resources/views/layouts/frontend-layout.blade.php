<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="--vh: 1vh">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if ($title)
            <title>{{$title || ""}} - {{__("fbd.site.title")}}</title>
        @else
            <title>{{__("fbd.site.title")}}</title>
        @endif

        <x-OG />

        @vite("resources/css/app.scss")
    </head>

    <body class="antialiased">
        {{$slot}}
        @vite("resources/js/app.js")
    </body>
</html>
