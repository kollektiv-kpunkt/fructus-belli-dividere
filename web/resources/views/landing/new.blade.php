<x-frontend-layout>
    <x-navbar />
    <x-frontend-container>
        <div class="fbd-pagecontents-wrapper grid grid-cols-12 md:gap-x-12 lg:gap-x-16">
            <main class="col-span-12 lg:col-span-7">
                <div class="fbd-page-heroine mb-12 md:mb-20">
                    <div class="fbd-page-heroine__inner">
                        <h1 class="fbd-page-heroine__title">{!! __("fbd.landingpage.content.title") !!}</h1>
                        <p class="fbd-page-heroine__lead">{!! __("fbd.landingpage.content.lead") !!}</p>
                        <div class="fbd-page-heroine__demands fbd-card mt-8">
                            <h2 class="fbd-section-title"> {!!__("fbd.landingpage.content.donation.title")!!} </h2>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                @foreach (__("fbd.landingpage.content.donation.items") as $key => $item)
                                <a
                                    class="fbd-donation-box aspect-video relative border-foreground border-2 rounded-sm flex justify-center items-center"
                                    href="/{{__("fbd.landingpage.slug")}}?rnw-amount={{$key}}#donate"
                                >
                                    <span class="absolute -top-2 left-1 bg-white px-1 text-xs">{{__("fbd.landingpage.content.donation.helper")}}</span>
                                    <span class="font-black text-foreground text-2xl sm:text-3xl md:text-4xl">{{$item}}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="fbd-page-heroine__ribbon fbd-ribbon"></div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui rem totam itaque? Debitis, quaerat eos nostrum beatae, praesentium expedita totam alias ad nulla ea nam sapiente dicta voluptatem reprehenderit quis.</p>
                <p>Asperiores nemo atque esse! Eius tempore ipsa, deleniti quasi veniam odit et repudiandae. Ut fugiat ea, totam reprehenderit tempore consequuntur maxime cupiditate consequatur, nihil doloribus dolores iusto accusamus voluptatem? Repellendus?</p>
                <p>Sit voluptate vitae facilis, quisquam deleniti quos laudantium ullam ipsum officiis pariatur sed consequatur assumenda inventore earum possimus nostrum molestiae alias voluptatibus accusamus. Libero doloremque animi tempore iste necessitatibus dolor!</p>
                <p>Non libero incidunt totam! Delectus eius dolorum architecto eaque perspiciatis optio quam ut dolores, molestias voluptatem aspernatur corporis cupiditate laboriosam aliquam earum aliquid nostrum obcaecati magni, iure saepe. Nulla, quas?</p>
                <script src="https://widget.raisenow.com/widgets/lema/gsoas-948f/js/dds-init-widget-{{ app()->getLocale() }}.js"></script>
                <script>
                    window.rnwWidget = window.rnwWidget || {};
                    window.rnwWidget.configureWidget = function(options) {
                        options.defaults['stored_campaign_name'] = 'kriegsgewinne.ch - {{ app()->getLocale() }}';
                        options.translations.step_amount.onetime_amounts = [{text: '20 CHF', value: 2000}, {text: '50 CHF', value: 5000}, {text: '70 CHF', value: 7000}, {text: '100 CHF', value: 10000}];
                    };
                </script>
                <div class="dds-widget-container mt-4" data-widget="lema" id="donate"></div>
            </main>
        </div>
    </x-frontend-container>

    <x-Footer/>
</x-frontend-layout>
