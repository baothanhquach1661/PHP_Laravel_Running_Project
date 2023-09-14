<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SlideController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\DeliveryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\AdminRoleController;
use App\Http\Controllers\Backend\PricingController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\BannerAdvController;
use App\Http\Controllers\Backend\WhyusController;
use App\Http\Controllers\Backend\NewsletterController;


use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CartPageController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\AllUserController;
use App\Http\Controllers\Frontend\PriceController;
use App\Http\Controllers\Frontend\FContactController;

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\SlugController;

use App\Models\Order;



// Backend All Routes


Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function() {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:admin'])->group(function(){

    Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('backend.admin.index');
        })->name('admin.index');
    });


    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile-store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::post('/admin/change-password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');


    // brand routes
    Route::prefix('admin/brand')->group(function (){
        Route::get('/management', [BrandController::class, 'index'])->name('brand.management');
        Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('/inactive/{id}', [BrandController::class, 'inActive'])->name('brand.inactive');
        Route::get('/active/{id}', [BrandController::class, 'active'])->name('brand.active');
    });

    // category routes
    Route::prefix('admin/category')->group(function (){
        Route::get('/management', [CategoryController::class, 'index'])->name('category.management');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/inactive/{id}', [CategoryController::class, 'inActive'])->name('category.inactive');
        Route::get('/active/{id}', [CategoryController::class, 'active'])->name('category.active');

        Route::get('/subcategory/ajax/{category_id}', [CategoryController::class, 'GetSubCategory']);
    });

    // subcategory routes
    Route::prefix('admin/subcategory')->group(function (){
        Route::get('/management', [SubCategoryController::class, 'index'])->name('subcategory.management');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
        Route::get('/inactive/{id}', [SubCategoryController::class, 'inActive'])->name('subcategory.inactive');
        Route::get('/active/{id}', [SubCategoryController::class, 'active'])->name('subcategory.active');
    });


    // slide routes
    Route::prefix('admin/slide')->group(function (){
        Route::get('/management', [SlideController::class, 'index'])->name('slide.management');
        Route::get('/create', [SlideController::class, 'create'])->name('slide.create');
        Route::post('/store', [SlideController::class, 'store'])->name('slide.store');
        Route::get('/edit/{id}', [SlideController::class, 'edit'])->name('slide.edit');
        Route::post('/update', [SlideController::class, 'update'])->name('slide.update');
        Route::get('/delete/{id}', [SlideController::class, 'delete'])->name('slide.delete');
        Route::get('/inactive/{id}', [SlideController::class, 'inActive'])->name('slide.inactive');
        Route::get('/active/{id}', [SlideController::class, 'active'])->name('slide.active');
    });


    // banner adv routes
    Route::prefix('admin/banner2')->group(function (){
        Route::get('/management', [BannerAdvController::class, 'index'])->name('banner2.management');
        Route::get('/create', [BannerAdvController::class, 'create'])->name('banner2.create');
        Route::post('/store', [BannerAdvController::class, 'store'])->name('banner2.store');
        Route::get('/edit/{id}', [BannerAdvController::class, 'edit'])->name('banner2.edit');
        Route::post('/update', [BannerAdvController::class, 'update'])->name('banner2.update');
        Route::get('/delete/{id}', [BannerAdvController::class, 'delete'])->name('banner2.delete');
        Route::get('/inactive/{id}', [BannerAdvController::class, 'inActive'])->name('banner2.inactive');
        Route::get('/active/{id}', [BannerAdvController::class, 'active'])->name('banner2.active');
    });


    // ------------ product routes ------------ //
    Route::prefix('admin/product')->group(function (){
        Route::get('/management', [ProductController::class, 'index'])->name('product.management');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/inactive/{id}', [ProductController::class, 'inActive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');

        Route::post('/update-without-image', [ProductController::class, 'updateWithoutImage'])->name('product-update-withoutImage');
        Route::post('/update-with-multiImage', [ProductController::class, 'updateWithImage'])->name('product-update-image');
        Route::post('/update-Thumbnail', [ProductController::class, 'updateThumbnail'])->name('product-update-thumbnail');

        Route::get('/product-multiImg/delete/{id}', [ProductController::class, 'multiImgDelete'])->name('product.multiImg.delete');

        Route::get('/create-multiImage/{id}', [ProductController::class, 'createMultiImage'])->name('product.create-multiImage');
        Route::post('/store-multiImage', [ProductController::class, 'storeMultiImage'])->name('product.store-multiImage');
    });


    // ------------ about routes ------------ //
    Route::prefix('admin/about')->group(function (){
        Route::get('/management', [AboutController::class, 'index'])->name('about.management');
        Route::post('/update-without-image', [AboutController::class, 'updateWithoutImage'])->name('about-update-withoutImage');

        Route::get('/create-TeamImgs/{id}', [AboutController::class, 'createTeamImg'])->name('about.create-TeamImgs');
        Route::post('/store-TeamImg', [AboutController::class, 'storeTeamImg'])->name('about.store-TeamImg');
        Route::get('/update-TeamImgs/{id}', [AboutController::class, 'editTeamImg'])->name('about.edit-TeamImgs');
        Route::post('/update-with-TeamImgs', [AboutController::class, 'updateTeamImgs'])->name('about-update-teamImgs');

        Route::post('/update-aboutImage', [AboutController::class, 'updateAboutImage'])->name('about-update-image');
        Route::get('/TeamImgs/delete/{id}', [AboutController::class, 'TeamImgDelete'])->name('about.TeamImgs.delete');
        
    });


    // ------------ pricing routes ------------ //
    Route::prefix('admin/pricing')->group(function (){
        Route::get('/management', [PricingController::class, 'index'])->name('pricing.management');
        Route::get('/create', [PricingController::class, 'create'])->name('pricing.create');
        Route::post('/store', [PricingController::class, 'store'])->name('pricing.store');
        Route::get('/edit/{id}', [PricingController::class, 'edit'])->name('pricing.edit');
        Route::post('/update', [PricingController::class, 'update'])->name('pricing.update');
        Route::post('/updateBanner', [PricingController::class, 'updateWithBanner'])->name('price_list-update-banner');
        Route::post('/updateImage', [PricingController::class, 'updateImage'])->name('price_list-update-image');
        Route::get('/delete/{id}', [PricingController::class, 'delete'])->name('pricing.delete');

        Route::get('/inactive/{id}', [PricingController::class, 'pricingInactive'])->name('pricing.inactive');
        Route::get('/active/{id}', [PricingController::class, 'pricingActive'])->name('pricing.active');
        
    });


    // ------------ contact page routes ------------ //
    Route::prefix('admin/contact')->group(function (){
        Route::get('/management', [ContactController::class, 'index'])->name('contact.management');
        Route::post('/update', [ContactController::class, 'update'])->name('contact.update');
        
    });


    // footer setting
    Route::prefix('admin/footer')->group(function (){
        Route::get('/edit', [FooterController::class, 'edit'])->name('footer-setting');
        Route::post('/update', [FooterController::class, 'update'])->name('footer.update');
    });


    // coupon routes
    Route::prefix('admin/coupon')->group(function (){
        Route::get('/management', [CouponController::class, 'index'])->name('coupon.management');
        Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
        Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::post('/update', [CouponController::class, 'update'])->name('coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'delete'])->name('coupon.delete');
        Route::get('/inactive/{id}', [CouponController::class, 'inActive'])->name('coupon.inactive');
        Route::get('/active/{id}', [CouponController::class, 'active'])->name('coupon.active');

        Route::get('/image/', [CouponController::class, 'couponImage'])->name('coupon.image');
        Route::post('/image/update', [CouponController::class, 'couponImageUpdate'])->name('coupon.image.update');
    });


    // shipping area routes
    Route::prefix('/admin/shipping')->group(function (){
        Route::get('/city/view', [DeliveryController::class, 'deliveryCreate'])->name('delivery.management');
        Route::post('/select-delivery', [DeliveryController::class, 'selectDelivery']);
        Route::post('/store-delivery', [DeliveryController::class, 'storeDelivery']);
        Route::post('/show-delivery', [DeliveryController::class, 'showDelivery']);
        Route::post('/update-delivery-fee', [DeliveryController::class, 'updateDeliveryFee']);

    });


    // pending order routes
    Route::prefix('admin/orders')->group(function (){
        Route::get('/management', [OrderController::class, 'allOrders'])->name('all-orders');
        Route::get('/pending', [OrderController::class, 'pendingOrders'])->name('pending-orders');
        Route::get('/pending-order/edit/{order_id}', [OrderController::class, 'pendingOrderEdit'])->name('pending-order.edit');
        Route::get('/pending-confirm/{order_id}', [OrderController::class, 'pendingToConfirm'])->name('pending-confirm');
        Route::get('/pending-delete/{order_id}', [OrderController::class, 'pendingOrderDelete'])->name('pending-order.delete');

        Route::get('/confirmed', [OrderController::class, 'confirmedOrders'])->name('confirmed-orders');
        Route::get('/confirmed-processing/{order_id}', [OrderController::class, 'confirmToProcessing'])->name('confirmed-processing');
        Route::get('/confirmed/invoice/download/{order_id}', [OrderController::class, 'invoiceDownloadAdmin'])->name('invoice.download');
        
        Route::get('/processing', [OrderController::class, 'processingOrders'])->name('processing-orders');
        Route::get('/processing-picked/{order_id}', [OrderController::class, 'processingToPicked'])->name('processing-picked');

        Route::get('/picked', [OrderController::class, 'pickedOrders'])->name('picked-orders');
        Route::get('/picked-shipped/{order_id}', [OrderController::class, 'pickedToShipped'])->name('picked-shipped');

        Route::get('/shipped', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
        Route::get('/shipped-delivered/{order_id}', [OrderController::class, 'shippedToDelivered'])->name('shipped-delivered');

        Route::get('/deliverd', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');

        Route::get('/cancel', [OrderController::class, 'cancelOrders'])->name('cancel-orders');
    });


    // all report routes
    Route::prefix('/admin/reports')->group(function (){
        Route::get('/view', [ReportController::class, 'reports'])->name('all-reports');
        Route::post('/search-by-date', [ReportController::class, 'searchByDate'])->name('search-by-date');
        Route::post('/search-by-month', [ReportController::class, 'searchByMonth'])->name('search-by-month');
        Route::post('/search-by-year', [ReportController::class, 'searchByYear'])->name('search-by-year');
    });


    // all site setting routes
    Route::prefix('/admin/setting')->group(function (){
        Route::get('/site', [SiteSettingController::class, 'site'])->name('site-setting');
        Route::post('/update', [SiteSettingController::class, 'update'])->name('site.update');

        Route::get('/seo', [SiteSettingController::class, 'seo'])->name('seo-setting');
        Route::post('/seo-update', [SiteSettingController::class, 'seoUpdate'])->name('seo.update');
    });


    // all user routes
    Route::prefix('/admin/users')->group(function (){
        Route::get('/view', [AdminProfileController::class, 'users'])->name('all-users');
    });

    // all admin role routes
    Route::prefix('/admin/roles')->group(function (){
        Route::get('/view', [AdminRoleController::class, 'admins'])->name('admin-role');
        Route::get('/create', [AdminRoleController::class, 'adminCreate'])->name('create.admin');
        Route::post('/store', [AdminRoleController::class, 'adminStore'])->name('admin.role.store');
        Route::get('/edit/{id}', [AdminRoleController::class, 'adminEdit'])->name('admin.role.edit');
        Route::post('/update', [AdminRoleController::class, 'adminUpdate'])->name('admin.role.update');
        Route::get('/delete/{id}', [AdminRoleController::class, 'adminDelete'])->name('admin.role.delete');
    });


    // all return order routes
    Route::prefix('/admin/return-orders')->group(function (){
        Route::get('/request', [ReturnController::class, 'returnRequest'])->name('return.orders.request');
        Route::get('/approve/{order_id}', [ReturnController::class, 'returnApprove'])->name('return.approve');
        Route::get('/view', [ReturnController::class, 'allReturnOrders'])->name('return.orders.view');
    });


    // all stock management routes
    Route::prefix('/admin/stock')->group(function (){
        Route::get('/management', [ProductController::class, 'stockManagement'])->name('stock.management');
        Route::get('/approve/{order_id}', [ReturnController::class, 'returnApprove'])->name('return.approve');
        Route::get('/view', [ReturnController::class, 'allReturnOrders'])->name('return.orders.view');
    });


    // All Customer Messages 
    Route::prefix('admin/customer-message')->group(function (){

        Route::get('/index', [ContactController::class, 'customerMessage'])->name('customer_messages.management');
        Route::get('/delete/{id}', [ContactController::class, 'messageDelete'])->name('message.delete');

        Route::get('/inactive/{id}', [ContactController::class, 'inActive'])->name('message.inactive');
        Route::get('/active/{id}', [ContactController::class, 'active'])->name('message.active');
        Route::get('/read/{id}', [ContactController::class, 'inActive2'])->name('message.inactive2');

        Route::get('/content/{message_id}', [ContactController::class, 'messageDetails'])->name('message.details');

        Route::get('/not-read', [ContactController::class, 'notReadMessage'])->name('message.not_read');
        Route::get('/read', [ContactController::class, 'readMessage'])->name('message.read');

    });
    // ----------- end Customer messages area site setting ------------//


    // Why us setting routes
    Route::prefix('/admin/why-us')->group(function (){
        Route::get('/setting', [WhyusController::class, 'manage'])->name('whyus-setting');
        Route::post('/update', [WhyusController::class, 'update'])->name('whyus.update');
    });


    // Why us setting routes
    Route::prefix('/admin/newsletter-setting')->group(function (){
        Route::get('/setting', [NewsletterController::class, 'manage'])->name('newsletter-setting');
        Route::post('/update', [NewsletterController::class, 'update'])->name('newsletter.update');

        Route::get('/manage', [NewsletterController::class, 'manageNewsLetter'])->name('newsletters-manage');
    });




});















// Frontend All Routes

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


Route::middleware(['auth:sanctum,web', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/user-logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::post('/user-profile-store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
Route::post('/user-password-store', [IndexController::class, 'userPasswordStore'])->name('user.password.update');

Route::get('/about', [IndexController::class, 'homeAbout'])->name('home.about');


// Product Details Page //
Route::get('/products/{slug}/{id}', [IndexController::class, 'productDetails'])->name('product.details');


// Category wise Products Page //
Route::get('categories/products/{slug}/{id}', [IndexController::class, 'categoryWiseProduct'])->name('category.wiseProduct');


//-------------- SLUG ROUTE IMPORTANT ---------------//
Route::get('/{slug}', [SlugController::class, 'show'])->name('show');
//-------------- SLUG ROUTE IMPORTANT ---------------//


// SubCategory wise Products Page //
Route::get('subcategories/products/{slug}/{sub_id}', [IndexController::class, 'subcategoryWiseProduct']);
Route::get('subcategories/products/{slug}', [IndexController::class, 'subcategoryWiseProduct2'])->name('subcategory.wiseProduct');


// ------------ Cart Function ------------ //
// Add to cart store data  //
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart'])->name('add.cart');

// Get Data from mini cart //
Route::get('/product/mini/cart', [CartController::class, 'addMiniToCart'])->name('add.mini_cart');

// Remove item in mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);





// Start Cart Page 
Route::get('/cart', [CartPageController::class, 'myCart'])->name('cart');
Route::get('/user/get-cart-product-page', [CartPageController::class, 'getCartProduct']);
Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'cartRemoveItem']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'cartQtyIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'cartQtyDecrement']);
// End Cart Page


// Coupon apply
Route::post('/coupon-apply', [CartController::class, 'couponApply']);
Route::get('/coupon-calculation', [CartController::class, 'couponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'couponRemove']);


// Start Checkout Page
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/select-delivery', [CartController::class, 'selectDelivery']);
Route::post('/checkout/calculate-delivery-fee', [CheckoutController::class, 'calculateFee']);
Route::get('/checkout/del-fee', [CheckoutController::class, 'deleteFee'])->name('del-fee');

//Route::post('/get-shipping-area', [CheckoutController::class, 'getShippingArea']);


Route::post('/checkout/thank-you', [CheckoutController::class, 'checkoutStoreReturnPage'])->name('checkout.store');
Route::post('/checkout/cod-success', [CheckoutController::class, 'codCheckoutStore'])->name('cod-checkout.success');
Route::post('/checkout/transfer-success', [CheckoutController::class, 'transferCheckoutStore'])->name('transfer-checkout.success');
// End Checkout Page





// Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'],'namespace'=>'User'], function(){

    

// });

// user oder details
Route::get('order_details/{order_id}', [AllUserController::class, 'orderDetails'])->name('order-details');


// invoice_download
Route::get('invoice_download/{order_id}', [AllUserController::class, 'invoiceDownload']);


// user return order request 
Route::post('return/order/{order_id}', [AllUserController::class, 'orderReturn'])->name('return.order');

// user tracking order 
Route::post('order/tracking', [AllUserController::class, 'orderTracking'])->name('order.tracking');

// user product search 
Route::post('/search', [IndexController::class, 'productSearch'])->name('product.search');
Route::post('search-product', [IndexController::class, 'advanceProductSearch']);


///////----------- Frontend Pricing Page --------------//////////
Route::get('/pricing', [PriceController::class, 'pricingPage'])->name('pricing');
Route::get('/pricing/{id}', [PriceController::class, 'pricingDetails'])->name('pricing.details');


///////----------- Frontend Contact Page --------------//////////
Route::get('/contact', [FContactController::class, 'contactPage'])->name('contact');
Route::post('/contact/send', [FContactController::class, 'storeMessage'])->name('store.message');


///////----------- Frontend Customer newsletter send Page --------------//////////
Route::post('/send-newsletter', [NewsletterController::class, 'sendNewsletter'])->name('send.newsletter');








































































