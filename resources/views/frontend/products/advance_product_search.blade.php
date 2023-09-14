@if($products->isEmpty())
<div class="search-result-header">
    <h6 class="title">Không tìm thấy kết quả nào</h6>
</div>
@else

<div class="search-result-header">
    <h6 class="title">Tìm thấy {{ count($products) }} kết quả</h6>
</div>
<div class="psearch-results">

	@foreach($products as $product)

		@php
	        $formated_amount = number_format($product->discount_price);
	        $selling_price = number_format($product->selling_price);
	        $amount = $product->selling_price - $product->discount_price;
	        $discount = ($amount/$product->selling_price) * 100;
	    @endphp

	    <div class="axil-product-list">
	        <div class="thumbnail">
	            <a href="{{ url('products/'.$product->product_slug.'/'.$product->id) }}">
	                <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name}}" style="width:50px;height: 50px;">
	            </a>
	        </div>
	        <div class="product-content">
	            <h6 class="product-title"><a href="{{ url('products/'.$product->product_slug.'/'.$product->id) }}">{{ $product->product_name}}</a></h6>
	            <div class="product-price-variant">
	                @if($product->discount_price == NULL)
	                    <span class="price current-price" style="color: rgba(0,0,0,.54);">
	                      ₫{{ $selling_price }}
	                    </span>
	                @else
	                    <span class="price current-price" style="text-decoration: line-through;color: rgba(0,0,0,.54); font-size: 15px;">
	                      ₫{{ $selling_price }}
	                    </span>
	                    <span class="price current-price" style="color: #ee4d2d;">
	                      ₫{{ $formated_amount }}
	                    </span>
	                @endif
	            </div>
	        </div>
	    </div>
    @endforeach

</div>
@endif
























