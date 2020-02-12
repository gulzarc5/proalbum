// New option Add Div Show And Hide
function newOptionItemDivOpen(id) {
    $("#newOptionItem"+id).css("display", "block");
}

function newOptionItemDivClose(id) {   
    $("#newOptionItem"+id).css("display", "none");
}
// New option Add Div Show And Hide End Here///////////////


// New Option Item Add Ajax Code
function newOptionAdd(id) {
    $("#errMsg"+id).html('');
    var myform = document.getElementById("newOptionAddForm"+id);
    var fd = new FormData(myform);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:'POST',
        url: $(myform).attr('action'),
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
// New Option item Add Ajax Code End Here ////////////////////

// Option Details Edit Section

function optionDetailsEdit(id,size_count) {
    $("#option_details_name_div"+id).hide();
    $("#option_details_name_input_div"+id).show();
    
    $(".option_size_price_div"+id).hide();
    $(".option_size_input_div"+id).show();

    $("#option_details_img_div"+id).hide();
    $("#option_details_img_input_div"+id).show();

    $("#option_details_button_div"+id).html(' <button onclick="saveOptionEditDetails('+id+')" type="button" class="btn btn-sm btn-info">Save</button>')
}

function saveOptionEditDetails(id) {
    var optionDetailsid = $("#option_details_id"+id).val();
    var optionDetailsName = $("#option_details_name"+id).val();

    var optionDetailsPriceId = [];
    optionDetailsPriceId = $("input[name='option_size_id_"+id+"[]']")
    .map(function(){return $(this).val();}).get();

    var optionDetailsPrice = [];
    optionDetailsPrice = $("input[name='option_size_input_"+id+"[]']")
    .map(function(){return $(this).val();}).get();

    var file_data = document.getElementById("img_option"+id).files[0].name;
    var image = new FormData();
    image.append('file', file_data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        url: "{{route('admin.new_option_Edit')}}",
        data:{
            "_token": "{{ csrf_token() }}",
            'option_detail_id' :optionDetailsid,
            'optionDetailsName' :optionDetailsName,
            'optionDetailsPriceId' :optionDetailsPriceId,
            'optionDetailsPrice' :optionDetailsPrice,
            'img' :image,
        },
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log('success');
        },
        error:function (error) {
           console.log('error');
         },
    });
}



