@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.cart.title') }}
@stop

@section('content-wrapper')
    <cart-component></cart-component>
@endsection

@push('css')
    <style type="text/css">
        .quantity {
            width: unset;
            float: right;
        }
    </style>
@endpush

@push('scripts')
    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="cart-template">
        <div class="container">
            <section class="cart-details row no-margin col-12">

                <h1 class="fw6 col-12 p-5 bg-light">
                    {{ __('shop::app.checkout.cart.title') }}
                    <sub>
                        <span class="material-icons">
                            arrow_forward_ios
                        </span>
                    </sub>
                </h1>

                @if ($cart)
                    <div class="cart-details-header col-lg-7 col-md-12 bg-light p-5">
                        <div class="row cart-header col-12 no-padding  border-top bg-secondary text-white py-3">
                            <span class="col-7 fw6 fs16 pr0">
                                {{ __('velocity::app.checkout.items') }}
                            </span>

                            <span class="col-2 fw6 fs16 no-padding text-right">
                                {{ __('velocity::app.checkout.qty') }}
                            </span>

                            <span class="col-2 fw6 fs16 text-right pr0">
                                {{ __('velocity::app.checkout.subtotal') }}
                            </span>
                        </div>

                        <div class="cart-content col-12">
                            <form
                                method="POST"
                                @submit.prevent="onSubmit"
                                action="{{ route('shop.checkout.cart.update') }}">

                                <div class="cart-item-list">
                                    @csrf

                                    @foreach ($cart->items as $key => $item)

                                        @php
                                            $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                                            $product = $item->product;

                                            $productPrice = $product->getTypeInstance()->getProductPrices();

                                            if (is_null ($product->url_key)) {
                                                if (! is_null($product->parent)) {
                                                    $url_key = $product->parent->url_key;
                                                }
                                            } else {
                                                $url_key = $product->url_key;
                                            }

                                        @endphp

                                        <div class="row col-12 border-bottom pb-5" v-if="!isMobileDevice">
                                            <a
                                                title="{{ $product->name }}"
                                                class="product-image-container col-2"
                                                href="{{ route('shop.productOrCategory.index', $url_key) }}">

                                                <img
                                                    class="card-img-top img-thumbnail"
                                                    alt="{{ $product->name }}"
                                                    src="{{ $productBaseImage['large_image_url'] }}"
                                                    :onerror="`this.src='${this.$root.baseUrl}/vendor/webkul/ui/assets/images/product/large-product-placeholder.png'`">
                                            </a>

                                            <div class="product-details-content col-6 pr0">
                                                <div class="row item-title no-margin display-1">
                                                    <a
                                                        href="{{ route('shop.productOrCategory.index', $url_key) }}"
                                                        title="{{ $product->name }}"
                                                        class="unset col-12 no-padding">

                                                        <span class="fs20 fw6 link-color">{{ $product->name }}</span>
                                                    </a>
                                                </div>

                                                <div class="shopping-product-desc mt-2" >
                                                    {!!$product->short_description!!}
                                                </div>

                                               

                                                @php
                                                    $moveToWishlist = trans('shop::app.checkout.cart.move-to-wishlist');
                                                @endphp

                                                <div class="no-padding col-12 cursor-pointer ">
                                                    <!--a
                                                        class="unset
                                                            @auth('customer')
                                                                
                                                            @endauth
                                                        "
                                                        href="{{ route('shop.checkout.cart.remove', ['id' => $item->id]) }}"
                                                        @click="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">

                                                        <span class="rango-delete "></span>
                                                        <span class="align-vertical-center fs16">{{ __('shop::app.checkout.cart.remove') }}</span>
                                                    </a-->
                                                </div>
                                            </div>

                                            <div class="product-quantity col-2 no-padding">
                                                <quantity-changer
                                                    :control-name="'qty[{{$item->id}}]'"
                                                    quantity="{{ $item->quantity }}">
                                                </quantity-changer>
                                            </div>

                                            <div class="product-price col-2">
                                                <span class="card-current-price fw6 mr10">
                                                    {{ core()->currency( $item->base_total) }}
                                                </span>

                                                 <div class="no-padding col-12 cursor-pointer ">
                                                    <a
                                                        class="unset fs18
                                                            @auth('customer')
                                                                
                                                            @endauth
                                                        "
                                                        href="{{ route('shop.checkout.cart.remove', ['id' => $item->id]) }}"
                                                        @click="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">

                                                        <span class="rango-delete "></span>
                                                        <span class="align-vertical-center fs16">{{ __('shop::app.checkout.cart.remove') }}</span>
                                                    </a>
                                                </div>

                                            </div>

                                            @if (! cart()->isItemHaveQuantity($item))
                                                <div class="control-error mt-4 fs16 fw6">
                                                    * {{ __('shop::app.checkout.cart.quantity-error') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="row col-12" v-else>
                                            <a
                                                title="{{ $product->name }}"
                                                class="product-image-container col-2"
                                                href="{{ route('shop.productOrCategory.index', $url_key) }}">

                                                <img
                                                    src="{{ $productBaseImage['medium_image_url'] }}"
                                                    class="card-img-top"
                                                    alt="{{ $product->name }}">
                                            </a>

                                            <div class="col-10 pr0 item-title">
                                                <a
                                                    href="{{ route('shop.productOrCategory.index', $url_key) }}"
                                                    title="{{ $product->name }}"
                                                    class="unset col-12 no-padding">

                                                    <span class="fs20 fw6 link-color">{{ $product->name }}</span>
                                                </a>

                                                @if (isset($item->additional['attributes']))
                                                    <div class="row col-12 no-padding no-margin">

                                                        @foreach ($item->additional['attributes'] as $attribute)
                                                            <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                                        @endforeach

                                                    </div>
                                                @endif

                                                <div class="col-12 no-padding">
                                                    @include ('shop::products.price', ['product' => $product])
                                                </div>

                                                <div class="row col-12 remove-padding-margin actions text-center">
                                                    <div class="product-quantity col-lg-4 col-6 no-padding">
                                                        <quantity-changer
                                                            :control-name="'qty[{{$item->id}}]'"
                                                            quantity="{{ $item->quantity }}">
                                                        </quantity-changer>
                                                    </div>

                                                    <div class=" cursor-pointer text-down-4 mt-5 text-center">
                                                        <a href="{{ route('shop.checkout.cart.remove', ['id' => $item->id]) }}" class="unset">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    @endforeach
                                </div>

                                {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}
                                    <a
                                        class="col-12 link-color remove-decoration fs16 no-padding"
                                        href="{{ route('shop.home.index') }}">
                                        {{ __('shop::app.checkout.cart.continue-shopping') }}
                                    </a>

                                    <button
                                        type="submit"
                                        class="btn btn-dark btn-lg light mr15 pull-right unset">
                                        <i class="material-icons">add_shopping_cart</i>
                                        {{ __('shop::app.checkout.cart.update-cart') }}
                                    </button>
                                {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}
                            </form>
                        </div>

                     
                    </div>
                @endif

                {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}

                    @if ($cart)
                        <div class="col-lg-4 col-md-12 offset-lg-1 row order-summary-container">
                            @include('shop::checkout.total.summary', ['cart' => $cart])

                            <coupon-component></coupon-component>
                        </div>
                    @else
                        <div class="fs16 col-12 empty-cart-message">
                            {{ __('shop::app.checkout.cart.empty') }}
                        </div>

                        <a
                            class="fs16 mt15 col-12 remove-decoration continue-shopping"
                            href="{{ route('shop.home.index') }}">

                            <button type="button" class="btn btn-dark remove-decoration p-3">
                                {{ __('shop::app.checkout.cart.continue-shopping') }}
                            </button>
                        </a>
                    @endif

                {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}

            </section>

            <section>
                   @include ('shop::products.view.cross-sells')
            </section>
        </div>
    </script>

    <script type="text/javascript" id="cart-template">
        (() => {
            Vue.component('cart-component', {
                template: '#cart-template',
                data: function () {
                    return {
                        isMobileDevice: this.isMobile(),
                    }
                },

                methods: {
                    removeLink(message) {
                        if (! confirm(message))
                            event.preventDefault();
                    }
                }
            })
        })()
    </script>
@endpush