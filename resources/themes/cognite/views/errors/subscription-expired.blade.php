{{-- @extends('shop::companies.layouts.master') --}}


@section('page_title')
    {{ $status }} {{ __('shop::app.admin.tenant.exceptions.not-allowed-to-visit-this-section') }}
@stop

@section('content-wrapper')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
        body {
            margin: 0;
            font-family: 'Lato', sans-serif;
            font-size: 1rem;
            line-height: 1.5;
        }
        strong {
            font-weight: 700;
        }
        .error-container {
            text-align: center;
            display: flex;
            align-items: center;
            height: 100vh;
            max-width: 500px;
            margin: 0 auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .error-icon {
            margin-bottom: .5rem;
        }
        .error-title {
            margin-bottom: .5rem;
            font-size: 1.85rem;
            font-weight: 700;
        }
        .error-messgae {
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 1.125rem;
        }
        .error-description {
            margin-bottom: 1.5rem;
        }
        .btn {
            background-color: black;
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: .875rem;
            line-height: 1;
        }
    </style>

 

<div class="error-container">
        <div class="wrapper">
            <div class="error-box">
                <div class="error-icon">
                    <svg height="70" viewBox="-15 0 477 477.05619" width="70" xmlns="http://www.w3.org/2000/svg"><path d="m298.363281 204.609375c8.683594-7.597656 13.664063-18.570313 13.664063-30.105469v-25.480468c8.835937 0 16-7.164063 16-16v-16c0-8.835938-7.164063-16-16-16h-176c-8.835938 0-16 7.164062-16 16v16c0 8.835937 7.164062 16 16 16v25.480468c0 11.535156 4.980468 22.507813 13.664062 30.105469l50.335938 44.046875v8.734375l-50.335938 44.050781c-8.683594 7.59375-13.664062 18.566406-13.664062 30.101563v25.480469c-8.835938 0-16 7.164062-16 16v16c0 8.835937 7.164062 16 16 16h176c8.835937 0 16-7.164063 16-16v-16c0-8.835938-7.164063-16-16-16v-25.480469c0-11.535157-4.980469-22.507813-13.664063-30.101563l-50.335937-44.050781v-8.734375zm-162.335937-87.585937h176v16h-176zm16 32h144v25.480468c-.007813 5.25-1.742188 10.351563-4.933594 14.519532h-134.128906c-3.195313-4.167969-4.929688-9.269532-4.9375-14.519532zm160 240h-176v-16h176zm-74.535156-119.582032 50.335937 44.046875c5.207031 4.554688 8.195313 11.136719 8.199219 18.054688v25.480469h-144v-25.480469c.003906-6.917969 2.992187-13.5 8.199218-18.054688l50.335938-44.046875c3.476562-3.042968 5.46875-7.433594 5.464844-12.050781v-8.734375c.003906-4.617188-1.988282-9.007812-5.464844-12.046875l-36.09375-31.585937h99.160156l-36.097656 31.585937c-3.488281 3.03125-5.496094 7.425781-5.503906 12.046875v8.734375c0 4.617187 1.992187 9.007813 5.464844 12.050781zm0 0"></path><path d="m216.027344 277.023438h16v16h-16zm0 0"></path><path d="m216.027344 309.023438h16v16h-16zm0 0"></path><path d="m432.027344 253.023438c.019531 112.5625-89.507813 204.714843-202.023438 207.949218s-207.1875-83.625-213.632812-196.003906c-6.449219-112.375 77.671875-209.492188 189.816406-219.144531l-19.144531 22.816406 12.257812 10.28125 30.855469-36.800781c2.839844-3.386719 2.402344-8.433594-.984375-11.273438l-36.800781-30.847656-10.253906 12.296875 21.109374 17.726563c-120.488281 11.238281-210.269531 116.140624-202.765624 236.921874 7.5 120.78125 109.578124 213.765626 230.53125 210.003907 120.953124-3.761719 217.054687-102.914063 217.035156-223.925781zm0 0"></path><path d="m419.109375 180.6875 15.007813-5.542969c-1.898438-5.136719-4-10.289062-6.335938-15.328125l-14.554688 6.65625c2.144532 4.679688 4.121094 9.457032 5.882813 14.214844zm0 0"></path><path d="m326.546875 53.824219c-4.941406-2.542969-10-4.914063-15.007813-7.039063l-6.261718 14.71875c4.65625 1.984375 9.359375 4.183594 13.957031 6.550782zm0 0"></path><path d="m431.675781 240.777344 16-.9375c-.328125-5.527344-.855469-11.070313-1.601562-16.503906l-15.863281 2.113281c.664062 5.039062 1.152343 10.191406 1.464843 15.328125zm0 0"></path><path d="m427.621094 210.273438 15.664062-3.28125c-1.136718-5.398438-2.472656-10.808594-4-16.097657l-15.378906 4.425781c1.417969 4.902344 2.664062 9.925782 3.714844 14.953126zm0 0"></path><path d="m389.5 126.960938 12.710938-9.703126c-3.335938-4.378906-6.878907-8.691406-10.535157-12.800781l-12 10.621094c3.425781 3.816406 6.753907 7.816406 9.824219 11.882813zm0 0"></path><path d="m406.308594 152.734375 14.007812-7.734375c-2.664062-4.800781-5.535156-9.601562-8.535156-14.207031l-13.402344 8.742187c2.785156 4.273438 5.457032 8.6875 7.929688 13.199219zm0 0"></path><path d="m296.027344 40.847656c-5.296875-1.792968-10.648438-3.382812-15.902344-4.742187l-4 15.496093c4.878906 1.253907 9.847656 2.734376 14.765625 4.398438zm0 0"></path><path d="m263.917969 32.550781c-5.410157-.964843-10.9375-1.75-16.417969-2.328125l-1.65625 15.929688c5.089844.519531 10.214844 1.246094 15.242188 2.152344zm0 0"></path><path d="m354.820312 71.152344c-4.535156-3.257813-9.175781-6.34375-13.808593-9.183594l-8.359375 13.640625c4.296875 2.628906 8.617187 5.511719 12.800781 8.542969zm0 0"></path><path d="m380.210938 92.457031c-3.949219-3.847656-8.085938-7.585937-12.292969-11.105469l-10.289063 12.25c3.910156 3.277344 7.757813 6.757813 11.445313 10.335938zm0 0"></path></svg>
                </div>
                <div class="error-title">
Subscription Plan Expired!</div>
                <div class="error-messgae">Your current plan is expired for <?php echo Company::getCurrent()->domain;?> and please renew the plan to active your shop.</div>
                <div class="error-description">For more details feel free to contact us, we are available <strong>24x7</strong> to solve your issue. Thank you</div>
                <a href="https://buynoir.co" class="btn">Visit us</a>
            </div>
        </div>
    </div>
    @php
     
        exit();
    @endphp
@stop