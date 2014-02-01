$(document).ready(function() {
	$('button[data-action]').each(function() {
		$(this).click(function() {
			$('#modal-title').html($(this).html());
			$('#modal form').attr('action', 'account/' + $(this).data('action'));
			$('#modal .modal-body').hide()
			$('#modal .modal-body[data-action="' + $(this).data('action') + '"]').show();
		});
	});
});