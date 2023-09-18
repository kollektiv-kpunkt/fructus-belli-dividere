<div id="{{__("fbd.donation.anchor")}}">
    <div class="fbd-donation pt-12 md:pt-20">
        <script src="https://widget.raisenow.com/widgets/lema/gsoas-948f/js/dds-init-widget-{{ app()->getLocale() }}.js"></script>
        <script>
            window.rnwWidget = window.rnwWidget || {};
            window.rnwWidget.configureWidget = function(options) {
                options.defaults['stored_campaign_name'] = 'kriegsgewinne.ch - {{ app()->getLocale() }}';
            };
        </script>
        <h2 class="fbd-section-title">{{__("fbd.donation.title")}}</h2>
        <p class="mt-4">{{__("fbd.donation.lead")}}</p>
        <div class="fbd-donation-container" style="max-height: 0; overflow: hidden;">
            <div class="fbd-donation-inner py-12">
                <div class="dds-widget-container" data-widget="lema"></div>
            </div>
        </div>
        <a class="fbd-button my-6 inline-block fbd-donation-button cursor-pointer">{{__("fbd.donation.button") }}</a>
        <p>{!!__("fbd.donation.info")!!}</p>
    </div>
</div>
