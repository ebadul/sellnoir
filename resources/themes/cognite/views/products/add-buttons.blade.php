@php
    $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false    
@endphp

 
    {{-- <form action="{{ route('cart.add', $product->product_id) }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
        <input type="hidden" name="quantity" value="1">
        <button class="btn btn-lg btn-primary addtocart" {{ $product->isSaleable() ? '' : 'disabled' }}>{{ ($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.add-to-cart') }}</button>
    </form> --}}
    <ul class="card-quick-icon">
        <li>@include('shop::products.wishlist')</li>
        <li>
            @if ($showCompare)
                @include('shop::products.compare', ['productId' => $product->id])
            @endif
        </li>
    </ul>
    
    
    
 