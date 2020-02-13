var tab = '1';

// New option Add Div Show And Hide
function newOptionItemDivOpen(id) {
    $("#newOptionItem"+id).css("display", "block");
}

function newOptionItemDivClose(id) {   
    $("#newOptionItem"+id).css("display", "none");
}
// New option Add Div Show And Hide End Here///////////////


// New Option Item Add Ajax Code
// function newOptionAdd(id) {
//     $("#errMsg"+id).html('');
//     var myform = document.getElementById("newOptionAddForm"+id);
//     var fd = new FormData(myform);
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         type:'POST',
//         url: $(myform).attr('action'),
//         data:fd,
//         cache:false,
//         contentType: false,
//         processData: false,
//         success:function(data){
//             $("#newOptionItem"+id).css("display", "none");
//         },
//         error:function (error) {
//             var err = $.parseJSON(error.responseText)
//             var errHtml = '<p class="alert alert-danger">';
//             $.each(err.errors, function (key, val) {
//                 console.log(key);
//                  errHtml +="<strong>"+val[0]+"</strong><br>";
//             });
//             errHtml +="</p>";
//             $("#errMsg"+id).html(errHtml);
//          },
//     });
// }
// New Option item Add Ajax Code End Here ////////////////////

// Option Details Edit Section

function optionDetailsEdit(id) {
    $("#option_details_name_div"+id).hide();
    $("#option_details_name_input_div"+id).show();
    
    $(".option_size_price_div"+id).hide();
    $(".option_size_input_div"+id).show();

    $("#option_details_img_div"+id).hide();
    $("#option_details_img_input_div"+id).show();

    $("#option_details_button_div"+id).html(' <button type="submit" class="btn btn-sm btn-info">Save</button>')
}

// function saveOptionEditDetails(id) {
//     var myform = document.getElementById("newOptionUpdateForm"+id);
//     var fd = new FormData(myform);
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         type:'POST',
//         url: $(myform).attr('action'),
//         data:fd,
//         cache:false,
//         contentType: false,
//         processData: false, 
//         success:function(data){
//             console.log('success');
//         },
//         error:function (error) {
//            console.log('error');
//          },
//     });
// }



