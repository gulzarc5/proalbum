/////////////////////////////// Add More Size Section
var sizeDivCount = 1;
function addMoreSize() {
    var sizeHtml = '<div id="more_size'+sizeDivCount+'">'+
        '<label class="col-sm-12 control-label">Size</label>'+
            '<div class="col-sm-2" style="width:150px;">'+
                '<input type="text" name="swidth[]" id="swidth" class="form-control" placeholder="Width" required="">'+
            '</div>'+
            '<div class="col-sm-2" style="width:auto;line-height: 40px;">X</div>'+
            '<div class="col-sm-2" style="width:150px;">'+
                '<input type="text" name="sheight[]" id="sheigth" class="form-control" placeholder="Height" required="">'+
            '</div>'+
            '<div class="col-sm-2">'+
                '<input type="text" name="displaysize[]" id="displaysize" class="form-control" placeholder="Display Size" required="">'+
           '</div>'+
           '<div class="col-sm-4">'+
                '<input type="text" name="sprice[]" id="sprice" class="form-control" placeholder="Extra Page/ Sheet/ Quantity Price" required="">'
            +'</div>'+
            '<button type="button" style="border:0;background:transparent" onclick="removeSizeDiv('+sizeDivCount+')"><i class="fa fa-trash" aria-hidden="false" style="font-size: 32px;color: #ff7600f0;"></i></button>'+
        '</div>';
    $("#size-div").append(sizeHtml);
    sizeDivCount++;
}

function removeSizeDiv(id) {
    $("#more_size"+id).remove();
    sizeDivCount--;
}

function addNewSizeDivOpen(){
    $("#add_new_size_div").show()
}

function addNewSizeDivClose(){
    $("#add_new_size_div").hide()
}

function editSizeDivOpen(id) {
    $("#size_name_div"+id).hide();
    $("#size_price_div"+id).hide();
    $("#size_btn_edit"+id).hide();

    $("#size_input"+id).show();
    $("#size_price_input"+id).show();
    $("#size_btn_save"+id).show();
}

function saveSize(id) {
    var size_id =  $("#size_id"+id).val();
    var sHeight = $("#sheight"+id).val();
    var sWidth = $("#swidth"+id).val();
    var sDisplay = $("#displaysize"+id).val();
    var sPrice = $("#size_price"+id).val();
}