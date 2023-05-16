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
    <p class="mt-6 md:mt-8">{!! __("fbd.supporters.lead") !!}</p>
    <div class="fbd-supporters__peoplewrapper relative">
        <div class="fbd-supporters__peoplelist mt-2 text-2xs">
            @foreach (supporters(50) as $supporter)
                <?php
                $render = "";
                $render .= "<b>";
                $render .= $supporter->data["fname"];
                if (isset($supporter->data["lname"]) && $supporter->data["lname"] !== "") {
                    $render .= " " . $supporter->data["lname"];
                }
                $render .= "</b>";
                if (isset($supporter->data["zip"]) && $supporter->data["zip"] !== "") {
                    $render .= ", " . $supporter->data["zip"];
                }
                if (isset($supporter->data["city"]) && $supporter->data["city"] !== "") {
                    $render .= " " . $supporter->data["city"];
                }
                if (isset($supporter->data["jobtitle"]) && $supporter->data["jobtitle"] !== "") {
                    $render .= ", " . $supporter->data["jobtitle"];
                }
                if (!$loop->last) {
                    $render .= "; ";
                }
                ?>
                {!! $render !!}
            @endforeach
        </div>
        <button class="absolute z-10 bottom-0 underline fbd-supporters__showall">{{supporters()->count() - 50}} {{__("fbd.supporters.showall")}}</button>
    </div>
</div>
