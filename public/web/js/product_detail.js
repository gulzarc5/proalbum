$(document).ready(function(){

    $('#product_selection_btn').click(function(){
        $("#product_name").hide();
        $("#product_desc").hide();
        $("#product_selection_btn").hide();
        $("#feature_details").hide();
        $("#product-select").show();
    });

    $('#cancel_btn').click(function(){
        $("#product_name").show();
        $("#product_desc").show();
        $("#product_selection_btn").show();
        $("#feature_details").show();
        $("#product-select").hide();
    });
});

function option_change_function(option_id) {
    optionImage(option_id);
    priceGetValue();
}

function optionImage(option_id){
    var option_detail_id = $('#option_detail'+option_id).val();
    if(option_detail_id){
        var option_image = $('#optionDetailImage'+option_detail_id).html();
        $("#DisplayOptionImage"+option_id).html(option_image);
    }else{
        $("#DisplayOptionImage"+option_id).html('');
    }
}

function priceGetValue() {
    var myform = document.getElementById("product_selection_form");
    var fd = new FormData(myform);
    var action = $("#fetch_price_action").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url: action,
        data:fd,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $("#price_loader").show();
        },
        success:function(data){
            $("#price_loader").hide();
            $("#showPriceProduct").html(data);
            var vat = ((data*15)/100);
            $("#showPriceVat").html(vat);
            var total = parseFloat(data)+parseFloat(vat);
            $("#showPricetotal").html(total);
        },
        error:function (error) {
            
        },
    });
}

