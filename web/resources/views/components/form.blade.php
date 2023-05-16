<div class="fbd-signup-form h-screen top-0 sticky flex">
    <div class="w-full my-auto py-12 fbd-signup-form__container">
        <div class="fdb-signup-form__inner p-4 fbd-card">
            <h2 class="fbd-section-title">{{__("fbd.form.title")}}</h2>
            <x-progress-bar />
            <form action="/supporters" method="POST" class="fbd-form">
                @foreach (__("fbd.form.fields") as $field)
                    <x-form-field :name="$field['name']" :label="$field['label']" :placeholder="$field['placeholder'] ?? ''" :required="$field['required']" :type="$field['type']" :checked="$field['checked'] ?? false" :classes="$field['class'] ?? false" />
                @endforeach
                @csrf
                <input type="hidden" name="source" value="{{$_COOKIE['fbd-source'] ?? ""}}">
                <button type="submit" class="fbd-button w-full flex justify-center items-center gap-x-2">{{__("fbd.form.submit") }} <x-application-logo class="!fill-white w-4"/></button>
            </form>
        </div>
    </div>
</div>
