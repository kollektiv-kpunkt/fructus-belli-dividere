<div class="fbd-signup-form lg:min-h-screen top-0 sticky flex">
    <div class="w-full my-auto lg:py-12 fbd-signup-form__container">
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

<button class="fbd-signup-form__open-form lg:hidden border-2 border-white">
    <span class="fbd-signup-form__open-form__nudge border border-accent-50">{{supporterCount() }}</span>
    <div class="fbd-signup-form__open-form__text overflow-hidden">
        <span class="pr-2 whitespace-nowrap">
            {{__("fbd.form.open")}}
        </span>
    </div>
    <x-application-logo class="!fill-white h-7 w-7"/>
</button>
<div class="fbd-signup-form__blind"></div>
