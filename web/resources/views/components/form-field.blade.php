<?php
use Illuminate\Support\Str;
$fieldId = Str::random(8);

$type = $attributes->get('type') ?? 'text';
$label = htmlspecialchars_decode($attributes->get('label'));
$placeholder = $attributes->get('placeholder') ?? '';
$required = $attributes->get('required') ?? false;
$name = $attributes->get('name');
$checked = $attributes->get('checked') ?? false;

$old = session()->getOldInput();
if (str_starts_with($name, "data" )) {
    $search = substr($name, 5, -1);
    if ($type == "checkbox") {
        $checked = (isset($old["data"][$search]) && $old["data"][$search] == 0) ? false : $attributes->get('checked') ?? false;
        $checked = $value ? true : false;
    } else {
        $value = $old['data'][$search] ?? null;
    }
} else {
    if ($type == "checkbox") {
        $checked = (isset($old[$name]) && $old[$name] == 0) ? false : $attributes->get('checked') ?? false;
    } else {
        $value = $old[$name] ?? null;
    }
}


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
            <input type="{{$type}}" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" class="fbd-fbd-form__field__input" {{$required ? "required" : ""}} {{isset($value) ? "value={$value}" : ""}} />
            @break
        @case("email")
            <label for="{{$id}}" class="fbd-fbd-form__field__label">{{$label}}</label>
            <input type="{{$type}}" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" class="fbd-fbd-form__field__input" {{$required ? "required" : ""}} {{isset($value) ? "value={$value}" : ""}} />
            @break
        @case("checkbox")
            <div class="flex">
                <input type="hidden" name="{{$name}}" value="0">
                <input type="{{$type}}" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" {{$checked ? " checked" : ""}} class="fbd-fbd-form__field__input" value="1" {{$required ? "required" : ""}} />
                <label for="{{$id}}" class="fbd-fbd-form__field__label text-2xs">{!! $label !!}</label>
            </div>
            @break
    @endswitch
    @error($name)
        <div class="fbd-form__field__error text-red-500">
            {{$message}}
        </div>
    @enderror
</div>
