$(document).ready(function(){

    $('#product_selection_btn').click(function(){
        $("#product_name").hide();
        $("#product_desc").hide();
        $("#product_selection_btn").hide();
        $("#product-select").show();
    });

    $('#cancel_btn').click(function(){
        $("#product_name").show();
        $("#product_desc").show();
        $("#product_selection_btn").show();
        $("#product-select").hide();
    });
});

function option_change_function(option_id) {

	var option_detail_id = $('#option_detail'+option_id).val();
	
	// $.ajax({
	// 	'url': 
	// });
}