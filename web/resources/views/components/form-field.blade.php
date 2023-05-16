<?php
use Illuminate\Support\Str;
$fieldId = Str::random(8);

$type = $attributes->get('type') ?? 'text';
$label = htmlspecialchars_decode($attributes->get('label'));
$placeholder = $attributes->get('placeholder') ?? '';
$required = $attributes->get('required') ?? false;
$name = $attributes->get('name');
$checked = $attributes->get('checked') ?? false;
if (!$name) {
    throw new Exception('Name of form field is required');
}

if ($attributes->get('classes')) {
    $classes = [];
    $classNames = explode(" ", $attributes->get('classes'));
    foreach ($classNames as $className) {
        $classes[] = "fbd-form__field--" . $className;
    }
    $class = implode(" ", $classes);
}

$id = $attributes->get('id') ?? "{$name}_{$fieldId}";
?>
<div class="fbd-form__field fbd-form__field--{{$type}} flex flex-col gap-y-1{{isset($class) ? " " . $class : ""}}">
    @switch($type)
        @case("text")
            <label for="{{$id}}" class="fbd-fbd-form__field__label">{{$label}}</label>
            <input type="{{$type}}" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" class="fbd-fbd-form__field__input" {{$required ? "required" : ""}} />
            @break
        @case("email")
            <label for="{{$id}}" class="fbd-fbd-form__field__label">{{$label}}</label>
            <input type="{{$type}}" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" class="fbd-fbd-form__field__input" {{$required ? "required" : ""}} />
            @break
        @case("checkbox")
            <div class="flex">
                <input type="{{$type}}" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" {{$checked ? " checked" : ""}} class="fbd-fbd-form__field__input" {{$required ? "required" : ""}} />
                <label for="{{$id}}" class="fbd-fbd-form__field__label text-2xs">{!! $label !!}</label>
            </div>
            @break
    @endswitch
</div>
