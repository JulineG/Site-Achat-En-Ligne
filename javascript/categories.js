$('.btnBuy').click(function() {
	var id = $(this).data('id');
	$('#formAdd').find('#inputId').val(id);
	var qty = $(this).parent().parent().find('#qty').val();
	$('#formAdd').find('#inputQty').val(qty);
	$('#formAdd').submit();
}
);