$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scrollTop').fadeIn(); 
        } else { 
            $('#scrollTop').fadeOut(); 
        } 
    }); 
    $('#scrollTop').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    });

    $("#checkout").on('change', "input[name='billing[address_id]']", function(){
        $(".address-holder .address-card").removeClass("active");
        $(this).closest(".address-card").addClass("active");
    });

    $("#checkout").on('change', "input[name='shipping_method']", function(){
        $(".shipping-methods .checkout-method-group").removeClass("active");
        $(this).closest(".checkout-method-group").addClass("active");
    });

    $("#checkout").on('change', "input[name='payment[method]']", function(){
        $(".payment-methods .checkout-method-group").removeClass("active");
        $(this).closest(".checkout-method-group").addClass("active");
    });

});