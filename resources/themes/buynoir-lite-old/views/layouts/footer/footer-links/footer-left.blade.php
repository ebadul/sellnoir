<div class="col-lg-4 col-md-12 col-sm-12 software-description">
    <div class="logo">
        <a
            :class="`left ${addClass}`"
            href="{{ route('shop.home.index') }}">

            @if ($logo = core()->getCurrentChannel()->logo_url)
                <img class="logo" src="{{ $logo }}" />
            @else
                <img class="logo" src="{{ asset('themes/buynoir-lite/assets/images/logo-text.png') }}" />
            @endif
        </a>
    </div>

    @if ($velocityMetaData)
        {!! $velocityMetaData->footer_left_content !!}
    @else
        {!! __('velocity::app.admin.meta-data.footer-left-raw-content') !!}
    @endif
</div>