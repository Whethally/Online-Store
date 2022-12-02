$(window).on('load', function() {
	$('.loading').fadeOut(300);
	$('header, main, footer').fadeIn(100);
});

$.ajaxSetup({
    headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('input, textarea').focus(function(){
    $(this).parents('.form-floating').addClass('focused');
});
var cinput = $('input, textarea');

cinput.each(function(){
    if ($(this).val() != '') {
        // alert('not empty');
        $(this).parents('.form-floating').addClass('focused');
        $(this).addClass('filled');

    } else {
        // alert('empty');
        $(this).parents('.form-floating').removeClass('focused');
        $(this).removeClass('filled');
    }
});
$('input, textarea').blur(function(){
    if (!$(this).val()) {
        // alert('not empty');
        $(this).parents('.form-floating').removeClass('focused');
        $(this).removeClass('filled');
    } else {
        // alert('empty');
        $(this).parents('.form-floating').addClass('focused');
        $(this).addClass('filled');
    }
});

let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

		elems.forEach(function(html) {
			let switchery = new Switchery(html, {
				size: 'small',color: 'var(--button-color)', jackColor: 'var(--body-color)'
			});
		});

		$(document).ready(function() {
			$('.active-switch').change(function() {
				let active = $(this).prop('checked') === true ? 1 : 0;
				let userId = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'active_status',
					data: {
						'active': active,
						'user_id': userId
					},
                    dataType: 'html',
					success: function(data) {
                        $('div.flash-message').html(data);
                    },
				});
			});
			$('.market-switch').change(function() {
				let market_active = $(this).prop('checked') === true ? 1 : 0;
				let userId = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'market_status',
					data: {
						'active': market_active,
						'id': userId
					},
					dataType: 'html',
					success: function(data) {
						console.log('success');
						$('div.flash-message').html(data);
					},
				});
			});	
			$('.admin-switch').change(function() {
				let admin_active = $(this).prop('checked') === true ? 1 : 0;
				let userId = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'admin_status',
					data: {
						'admin': admin_active,
						'id': userId
					},
					dataType: 'html',
					success: function(data) {
						console.log('success');
						$('div.flash-message').html(data);
					},
				});
			});	
		});

		$(".remove_from_cart").click(function (e) {
			e.preventDefault();
			var ele = $(this);
			// if(confirm("Are you sure want to remove?")) {
				$.ajax({
					url: 'remove_from_cart',
					method: "DELETE",
					data: {
						'_token': $('meta[name="csrf-token"]').attr('content'),
						id: ele.parents("tr").attr("data-id")
					},
					success: function (response) {
						// console.log(userId);	
						$('div.flash-message').html(response);
						ele.parents("tr").remove();

						if ($('tbody tr').length == 0) {
							$('table').remove();
							window.location.href = 'market';
						}
					},
					error: function (error) {
						console.log(error);
						window.location.reload();
					}
				});
			// }
		});

		$(".update_cart").change(function (e) {
			e.preventDefault();

			var ele = $(this);

			$.ajax({
				url: 'update_cart',
				method: "patch",
				data: {
					'_token': $('meta[name="csrf-token"]').attr('content'),
					id: ele.parents("tr").attr("data-id"), 
					quantity: ele.parents("tr").find(".quantity").val()
				},
				success: function (response) {
					$('div.flash-message').html(response);

					// if (ele.parents("tr").find(".quantity").val() == 0) {
					// 	ele.parents("tr").remove();
					// }

					// console.log(ele.parents("tr").display);
				},
				error: function (error) {
					console.log(error);
					// window.location.reload();
				}
			});
		});

		$('#status_id').change(function() {
			if ($(this).val() == 4) {
				$('.form-reason').append(
					'<div class="form-floating mb-3"><textarea class="form-control" name="reason" id="reason" placeholder="Введите причину отмены"></textarea><label for="reason"></label></div>'
				);
			} else {
				$('.form-reason').empty();
			}
		});
	
		// if status_id has value 4 then show reason field
		if ($('#status_id').val() == 4) {
			$('.form-reason').append(
				'<div class="form-floating mb-3"><textarea class="form-control" name="reason" id="reason" placeholder="Введите причину отмены"></textarea><label for="reason"></label></div>'
			);
		}

		// adding field after remove

		// $('.add').click(function() {
		// 	$('.add').append('<div class="form-group"><label for="reason">Reason</label><input type="text" name="reason" class="form-control" id="reason" placeholder="Enter reason"></div>');	
		// });