<div class="cart-dropdown" id="cart-dropdown">
    <div class="cart-content-wrap">
        <div class="cart-header">
            <h3 class="header-title">GIỎ HÀNG</h3>
            <button class="cart-close sidebar-close" id="closeModel"><i class="fas fa-times"></i></button>
        </div>

        <div id="miniCart">
            
        </div>

        <div class="cart-footer">
            <h3 class="cart-subtotal">
                <span class="subtotal-title">TỔNG TIỀN:</span>
                <span class="subtotal-amount" id="cart_total"></span>
            </h3>
            <div class="group-btn">
                <input type="hidden" id="product_id">
                <a href="#" class="axil-btn btn-bg-primary">TIẾP TỤC MUA HÀNG</a>

                <a href="{{ route('cart') }}" class="axil-btn btn-bg-primary">
                    GIỎ HÀNG
                </a>
                
            </div>
        </div>
    </div>
</div>







































