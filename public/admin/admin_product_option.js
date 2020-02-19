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


////////////////////////////// Add More Option Section 
var optionDivCount = 2 ;
function moreOption() {
    var optionStep = numToString(optionDivCount);
    var optionHtml = '<div class="col-md-6 col-sm-12 col-xs-12 mb-3" id="more-option'+optionDivCount+'">'+
                '<label for="name">'+optionStep+' Option Name</label><br><input type="text" class="form-control" name="option[]"  placeholder="Enter Product name" id="name" style="width:80%;float:left" required>'+
                '<button type="button" onclick="removeOption('+optionDivCount+')" style="border:0;background:transparent;float:right"><i class="fa fa-trash" aria-hidden="false" style="font-size: 32px;color: #ff7600f0;"></i></button>'+
            '</div>';
        $("#option-div").append(optionHtml);
    optionDivCount++;
}

function removeOption(id) {
    $("#more-option"+id).remove();
    optionDivCount--;
}

function numToString(num) {
    if (num == '1') {
        return "First";
    }else if (num == '2') {
        return "Second";
    }else if (num == '3') {
        return "Third";
    }else if (num == '4') {
        return "Fourtn";
    }else if (num == '5') {
        return "Fifth";
    }else if (num == '6') {
        return "Sixth";
    }else if (num == '7') {
        return "Seventh";
    }else if (num == '8') {
        return "Eighth";
    }else if (num == '9') {
        return "Ninth";
    }else if (num == '10') {
        return "Tenth";
    }else if (num == '11') {
        return "Eleventh";
    }else if (num == '12') {
        return "Twelveth";
    }else if (num == '13') {
        return "Thirteenth";
    }else if (num == '14') {
        return "Fourthinth";
    }else if (num == '15') {
        return "Fiftinth";
    } else {
        return "Sixtinth";
    }
}

function addNewOptionDivOpen() {
    $("#addNewOptionDiv").show();
}
function addNewOptionDivClose() {
    $("#addNewOptionDiv").hide();
}


