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

function fetch_price() {
    var myform = document.getElementById("product_selection_form");
    var fd = new FormData(myform);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url: $("#fetch_price_action").val(),
        data:fd,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            $("#newOptionItem"+id).css("display", "none");
        },
        error:function (error) {
            var err = $.parseJSON(error.responseText)
            var errHtml = '<p class="alert alert-danger">';
            $.each(err.errors, function (key, val) {
                console.log(key);
                    errHtml +="<strong>"+val[0]+"</strong><br>";
            });
            errHtml +="</p>";
            $("#errMsg"+id).html(errHtml);
            },
    });
}

