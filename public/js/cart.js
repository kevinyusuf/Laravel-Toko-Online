$(document).ready(function(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".btn-edit").click(function(){
    	var id 	= $(this).data("id"),
    		uri = $(this).data("uri");
        $.ajax({
            url: uri,
            type: 'POST',
            data: {_token: CSRF_TOKEN, 'key': id},
            dataType: 'JSON',
            success: function (data) {
            	if (data.type != 'done'){alert(data.msg)}
				else{
					// var pathImg = "{{ asset('img/') }}";
					$('#product-img').attr('src', pathImg + "/" + data.msg.productImg);
					$('#product-name').html(data.msg.productName);
					$('#product-price').html(data.msg.productPrice);
					$('#quantity').val(data.msg.productQTY);
					$('#product-id').val(data.msg.id);
					$(".btn-modal").click();
				}
            }
        }); 
    });

    $('#btn-update').on('click', function() {
		var qty 	= $('#quantity').val();
		var idcart 	= $('#product-id').val();
		var uri 	= $(this).data("uri");
		if(qty != "" || idcart != ""){
		  $.ajax({
		      url: uri,
		      type: "POST",
		      data: {
		          _token: CSRF_TOKEN,
		          "quantity": qty,
		          "key": idcart
		      },
		      dataType: 'JSON',
		      success: function(data){
		          if(data.type != 'done'){
		          	alert("Error occured ! " + data.msg);			
		          }
		          else{
		          	alert("Berhasil update product!");	
					window.location = "/cart";	
		          }
		          
		      }
		  });
		}
		else{
		  alert('Please fill all the field !');
		}
	});

	$('.btn-delete').on('click', function() {
		var id 	= $(this).data("id"),
    		uri = $(this).data("uri");
		if(id != ""){
		  $.ajax({
		      url: uri,
		      type: "POST",
		      data: {
		          _token: CSRF_TOKEN,
		          "key": id
		      },
		      dataType: 'JSON',
		      success: function(data){
		          if(data.type != 'done'){
		          	alert("Error occured ! " + data.msg);			
		          }
		          else{
		          	alert("Berhasil hapus product!");	
					window.location = "/cart";	
		          }
		          
		      }
		  });
		}
		else{
		  alert('Please fill all the field !');
		}
	});

});  