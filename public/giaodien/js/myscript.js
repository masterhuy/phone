$(document).ready(function() {
	$(".updatecart").on("click",function(){
		var id = $(this).attr("data-id");
		var qty = $(".item_cart_"+id).val();
		// alert(qty);
		 $.ajax({
			url : 'update-cart/'+id+'/'+qty,
			dataType : 'html',
			success: function(result){
				if(result){
						window.location = 'gio-hang';
					}
				}
		});
	});
});

