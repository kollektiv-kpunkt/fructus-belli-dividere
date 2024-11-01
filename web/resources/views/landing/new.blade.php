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
                            <h2 class="fbd-section-title">{!!__("fbd.landingpage.content.donation.title")!!}</h2>
                            <p>{!!__("fbd.landingpage.content.donation.lead")!!}</p>
                            <a href="#donate" class="fbd-button w-full flex justify-center mt-4">{!!__("fbd.landingpage.content.donation.button")!!}</a>
                        </div>
                        <div class="fbd-page-heroine__ribbon fbd-ribbon"></div>
                    </div>
                </div>
                @foreach (__("fbd.landingpage.content.paragraphs") as $paragraph)
                    <p class="mb-4">{!! $paragraph !!}</p>
                @endforeach
                <script src="https://widget.raisenow.com/widgets/lema/gsoas-948f/js/dds-init-widget-{{ app()->getLocale() }}.js"></script>
                <script>
                    window.rnwWidget = window.rnwWidget || {};
                    window.rnwWidget.configureWidget = function(options) {
                        options.defaults['stored_campaign_name'] = 'kriegsgewinne.ch - {{ app()->getLocale() }}';
                        options.translations.step_amount.onetime_amounts = [{text: '20 CHF', value: 2000}, {text: '50 CHF', value: 5000}, {text: '70 CHF', value: 7000}, {text: '100 CHF', value: 10000}];
                    };
                </script>
                <div class="dds-widget-container mt-8" data-widget="lema" id="donate"></div>
            </main>
        </div>
    </x-frontend-container>

    <x-Footer/>
</x-frontend-layout>
