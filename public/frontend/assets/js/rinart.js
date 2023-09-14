$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.choose').change(function(){

    var action = $(this).attr('id');
    var matp = $(this).val();
    var _token = $('input[name="_token"]').val();
    var $result = '';

    if(action == 'city_id'){
        result = 'province_id';
    }else{
        result = 'ward_id';
    }
    $.ajax({

        url: '/checkout/select-delivery',
        method: 'POST',
        data: {action:action, matp:matp, _token:_token},
        success: function(data){
            $('#'+result).html(data);
        }

    });
});



$('.calculate_delivery').click(function(){

   
    var matp = $('.city_id').val();
    var maqh = $('.province_id').val();
    var xaid = $('.ward_id').val();
    var _token = $('input[name="_token"]').val();



    if(matp == ' ' && maqh == ' ' && xaid == ' '){
        alert('sai rồi kìa');
    }else{
        $.ajax({

            url: '/checkout/calculate-delivery-fee',
            method: 'POST',
            data: {matp:matp, maqh:maqh, xaid:xaid, _token:_token},
            success: function(data){
                
            }

        });
    }

    
});





// Start Add To Cart Product 
function addToCart(){
    var product_name = $('#product_name').text();
    var id = $('#product_id').val();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();
    var quantity = 1;
    $.ajax({
        type: "POST",
        dataType: 'json',
        data:{
            color:color, size:size, quantity:quantity, product_name:product_name
        },
        url: "/cart/data/store/"+id,
        success:function(data){

        	miniCart()

            // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    title: data.error
                })
            }
        }
    })
}
  
// End Add To Cart Product 


// mini Cart Product 
function miniCart(){
	$.ajax({
		type: 'GET',
		url: '/product/mini/cart',
		dataType: 'json',
		success: function(response){

			$('span[id="cart_total"]').text(response.cartTotal);
            $('#cartQty').text(response.cartQty);

			var miniCart = ""


			$.each(response.carts, function(key, value){
				miniCart += `

			        <div class="cart-body">
                        <ul class="cart-item-list">
                            <li class="cart-item">
                                <div class="item-img">
                                    <a href="#"><img id="pimage" src="/${value.options.image}" alt="${value.name}"></a>
                                    <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="close-btn"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title"><a href="#"><span id="pname">${value.name}</span></a></h3>

                                    <div class="item-price">
                                        <span class="currency-symbol" id="pprice" style="color:#777777;">₫${value.price.toLocaleString('en-US')} x ${value.qty}</span>
                                    </div>
                                    
                                    <div class="pro-qty item-quantity">
                                        <input type="number" class="quantity-input" value="${value.qty}" min="1" id="qty">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
				`

			});

			$('#miniCart').html(miniCart);

		}
	})
}

miniCart();
// end mini Cart Product 


// remove item in mini Cart Product 
function miniCartRemove(rowId){
    $.ajax({
        type: 'GET',
        url: '/minicart/product-remove/'+rowId,
        dataType:'json',
        success:function(data){
        miniCart();
         // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    title: data.error
                })
            }
            // End Message 
        }
    });
}


// load cart page function 
function cart(){

    $.ajax({
        type: 'GET',
        url: '/user/get-cart-product-page',
        dataType:'json',
        success:function(response){

    		var rows = ""
    		$.each(response.carts, function(key,value){
		        rows += `
		        <tr>
                    <td class="product-remove">
                        <button type="submit" id="${value.rowId}" class="remove-wishlist" onclick="cartItemRemove(this.id)"><i class="fal fa-times"></i></button>
                    </td>
                    <td class="product-thumbnail"><a href="#">
                        <img src="/${value.options.image}" alt="${value.name}"></a>
                    </td>
                    <td class="product-title">
                        <a href="#">${value.name}</a>
                        <strong style="display: inline-block;
								    background: #e7e7e7;
								    border-radius: 10px;
								    position: relative;
								    cursor: pointer;
								    padding: 3px 8px 3px 8px;">

								    ${value.options.color == null ? ` `: `${value.options.color} /`} 
								    ${value.options.size == null ? ` `: `${value.options.size}`}

						</strong>
                    </td>
                    <td class="product-price" data-title="Price">
                        <span class="currency-symbol" style="color: #000000;">${value.price.toLocaleString('en-US')}₫</span>
                    </td>
                    <td class="product-quantity" data-title="Qty">
                        <div class="pro-qty">

                            ${value.qty > 1

                            ? `<button type="submit" class="dec qtybtn" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`

                            : `<button type="submit" class="dec qtybtn" disabled>-</button>`

                            }
                            
                            <input type="number" class="quantity-input" value="${value.qty}" min="1" max="100" disabled>
                            <button type="submit" class="inc qtybtn" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
                        </div>
                    </td>
                    <td class="product-subtotal" data-title="Subtotal">
                        <span class="currency-symbol" style="color: #000000;">${value.subtotal.toLocaleString('en-US')}₫</span>
                    </td>
                </tr>`
		        });
                
                $('#cartPage').html(rows);
            }
        })
    }
cart(); 


///  Wishlist remove Start 
function cartItemRemove(id){
    $.ajax({
        type: 'GET',
        url: '/user/cart-remove/'+id,
        dataType:'json',
        success:function(data){

        	couponCalculation();
            cart();
            miniCart();
            $('#couponField').show();
            $('#coupon_name').val('');

	         // Start Message 
	            const Toast = Swal.mixin({
	                  toast: true,
	                  position: 'top-end',
	                  showConfirmButton: false,
	                  timer: 3000
	                })
	            if ($.isEmptyObject(data.error)) {
	                Toast.fire({
	                    type: 'success',
	                    icon: 'success',
	                    title: data.success
	                })
	            }else{
	                Toast.fire({
	                    type: 'error',
	                    icon: 'error',
	                    title: data.error
	                })
	            }
	        // End Message 
        }
    });
}


 // -------- Cart Increment + Decrement --------//
    function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-increment/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }

    function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-decrement/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }
 // ---------- End Cart Increment + Decrement -----///


























































