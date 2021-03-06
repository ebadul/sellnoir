<div class="row justify-content-center align-items-center" style="height: 100vh">
    <div class="card stripe-card-shadow" style="top: 0">
    <div class="card-body">
        <button type="button" class="close payment-cancel" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        
        <div class="text-center">
            <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/images/logo.svg') }}" alt="Buynoir" class="mt-4" style="max-width: 110px; max-height: 70px"/>
        </div>

        @php
            $applicationFee = 0;
            $cart = (Object)session()->get('subscription_cart');
            if (core()->getConfigData('sales.paymentmethods.stripe.fees') == 'customer' && isset($cart->amount) && $cart->payment_method == 'stripe') {
                $applicationFee = $cart->amount;
                $applicationFee = (0.029 * $applicationFee) + (0.02 * $applicationFee) + 0.3;
            }
        @endphp

        <div class="stripe-form-content">
            <form  id="stripe-payment-form">
                <div class="stripe-fields new-card" style="display: flex; flex-direction: column; justify-content: center; align-items: center; font-family: 'Montserrat', sans-serif; font-size: 14px; padding-left: 0px; padding-right: 0px;">
                    
                    <div id="card-number" class="control-group form-control card-number-field"></div>
                    <!-- Used to display card number date error -->
                    <div class="stripe-errors w-100" id="card-number-error" role="alert"></div>
        
                    <div class="stripe-field-combinator" style="display: flex; width: 100%; flex-direction: row; justify-content: space-between; align-items: center;">
                        <div id="card-expiry" class="control-group" style="background: #FFFFFF; border: 1px solid #979797; border-radius: 5px; width: 65%; height: 43px; border-radius: 3px; font-size: 16px; padding-left: 15px; padding-top: 12px;"></div>
        
                        <div id="card-cvc" class="control-group" style="background: #FFFFFF; border: 1px solid #979797; border-radius: 5px; width: 30%; height: 43px; border-radius: 3px; font-size: 16px; padding-left: 15px; padding-top: 12px;"></div>
                    </div>
        
                    <!-- Used to display card expiry date error -->
                    <div class="stripe-errors w-100" id="card-expiration-error" role="alert"></div>
                    <button class="btn btn-primary btn-lg" id="stripe-pay-button" style="border-radius: 3px !important;">
                        {{ __('stripe_saas::app.shop.checkout.total.pay-now') }} ( {{ core()->currency($cart->amount + $applicationFee) }} )
                    </button>

                </div>
            </form>
            @php
                $cards = collect();
                if ( auth()->guard('customer')->check() ) {
                    $customer_id    = auth()->guard('customer')->user()->id;
                    $cards          = app('Webkul\StripeConnect\Repositories\StripeRepository')->findWhere([
                        'customer_id'   => $customer_id
                        ]);
                }                
            @endphp

            @if ( $cards->count() > 0 )
                <p class="text-center new-card">OR</p>
                <a href="#">
                    <p class="text-center saved-card-payment new-card" style="cursor:pointer;">
                        {{ __('stripe_saas::app.shop.checkout.total.pay-with-saved-card') }}
                    </p>
                </a>
            @endif

            @if ( auth()->guard('customer')->check() )
                <div id="saved-cards" class="saved-old-card">
                    
                    <div class="mt-10 mb-10 control-info">
                        @foreach($cards as $card)
                                <div class="mb-2 stripe-card-info" id="{{ $card->id }}">
                                    <label class="radio-container">
                                        <input type="radio" name="saved-card" class="saved-card-list" id="{{ $card->id }}" value="{{ $card->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                    <table>
                                        <tr>
                                            <td width="130px">
                                                <span class="card-last-four">*** *** {{ $card->last_four }}</span>
                                            </td>
                                            <td>
                                                <a id="delete-card" class="btn btn-danger" style="cursor: pointer;margin-left:10px;color:white;" data-id="{{ $card->id }}">
                                                    {{ __('stripe_saas::app.shop.checkout.total.delete') }}
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                        @endforeach
                    </div>

                    <div class="text-center col">
                        <button class="btn btn-primary btn-lg btn-center old-stripe-button"  style="border-radius: 3px !important;">
                            {{ __('stripe_saas::app.shop.checkout.total.pay-now') }} ( {{ core()->currency($cart->amount + $applicationFee) }} )
                        </button>
                    </div>
                    <p class="text-center old-card" style="margin-top:33px;">OR</p>
                    <p class="text-center saved-card-payment old-card" style="cursor:pointer;">
                        <a href="#">{{ __('stripe_saas::app.shop.checkout.total.pay-with-new-card') }}</a>
                    </p>
                </div>
            @endif

            <img src="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/images/payment-cards.png') }}" alt="Payment Cards" style="margin-top: 20px; max-width: 100%; height: auto"/>
            <p class="mt-3 mb-0 text-center">Powered by <a href="https://stripe.com/" target="_blank">Stripe.com</a></p>
        </div>
    </div>
  </div>
</div>

