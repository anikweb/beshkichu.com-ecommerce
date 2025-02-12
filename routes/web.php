<?php

use App\Http\Controllers\{
    AboutController,
    BasicSettingController,
    BackendUserController,
    BlogController,
    CategoryController,
    DashboardController,
    FrontController,
    RoleController,
    GithubController,
    ProductController,
    SubcategoryController,
    ShipDeliveryController,
    VoucherController,
    WishlistController,
    CartController,
    CheckoutController,
    ContactInformationController,
    FaqController,
    GetAjaxController,
    MyAccountController,
    OrderController,
    PrivacyPolicyController,
    ProductRequestController,
    ReportController,
    ReturnPolicyController,
    SslCommerzPaymentController,
    SliderController,
    TermConditionController,
    Wishlist,
};
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// frontend

Route::get('/',[FrontController::class, 'index'])->name('frontend');
Route::get('/products',[FrontController::class, 'productView'])->name('frontend.product');
Route::get('/products/category/{category_name}',[FrontController::class, 'productViewByCatgory'])->name('frontend.category.product');
Route::get('/product/{slug}',[FrontController::class, 'productSingle'])->name('frontend.product.single');
Route::get('/get/color/size/{cid}/{pid}',[FrontController::class, 'getColorSizeId']);
Route::get('/wishlist',[FrontController::class, 'wishlistIndex'])->name('frontend.wishlist.index');
Route::get('/wishlist/remove/{id}',[FrontController::class, 'wishlistRemove'])->name('frontend.wishlist.remove');
Route::get('/faq',[FrontController::class, 'faqIndex'])->name('frontend.faq.index');
Route::get('/about',[FrontController::class, 'aboutIndex'])->name('frontend.about.index');
Route::get('/blogs',[FrontController::class, 'blogIndex'])->name('frontend.blog.index');
Route::get('/blogs/{slug}',[FrontController::class, 'blogShow'])->name('frontend.blog.show');
Route::get('/requested-product',[FrontController::class, 'indexProductRequest'])->name('frontend.requested.product.index')->middleware(['auth','verified','isCustomer']);
Route::get('/privacy-policy',[FrontController::class, 'indexPrivacyPolicy'])->name('frontend.privacy.policy');
Route::get('/return-policy',[FrontController::class, 'indexReturnPolicy'])->name('frontend.return.policy');
Route::get('/terms-and-conditions',[FrontController::class, 'indexTermsConditions'])->name('frontend.terms.conditions');
Route::get('/shipping-and-delivery',[FrontController::class, 'indexShipDelivery'])->name('frontend.shipping.delivery');
Route::get('/contact-us',[FrontController::class, 'indexContactUs'])->name('frontend.contact.us');
Route::get('/size-guide',[FrontController::class, 'indexSizeGuide'])->name('frontend.size.guide');

// wishlist add by ajax
// Route::get('/wishlist/add/{product_id}',[FrontController::class, 'wishliststore']);
// Cart
Route::get('cart/voucher/remove',[CartController::class, 'cartRemoveVoucher'])->name('cart.remove.voucher');
Route::get('cart/delete/all',[CartController::class, 'cartDeleteAll'])->name('cart.all.delete');
Route::get('cart/delete/{slug}',[CartController::class, 'cartDelete'])->name('cart.delete');
Route::get('/cart/{voucher}',[CartController::class, 'index']);
Route::get('/cart/quantity/update/{cart_id}/{quantity}',[CartController::class, 'quantityUpdate']);
Route::get('/cart/quantity/total-price/{cart_id}',[CartController::class, 'totalPriceCart']);
Route::resource('cart', CartController::class);

// Checkout
Route::get('/checkout/success/{invoice}',[CheckoutController::class,'checkoutSuccess'])->name('checkout.success');

Route::resource('checkout', CheckoutController::class)->middleware(['auth','isCustomer']);

// Customer Dashboard
Route::get('/my-account/personal-information/change-password',[MyAccountController::class,'changePassword'])->name('my-account.changePassword')->middleware(['isCustomer','auth','verified']);
Route::post('/my-account/personal-information/change-password/update',[MyAccountController::class,'changePasswordUpdate'])->name('my-account.changePassword.update')->middleware(['isCustomer','auth','verified']);
Route::get('/my-account/personal-information',[MyAccountController::class,'indexPersonalOnfo'])->name('my-account.personal.information')->middleware(['isCustomer','auth','verified']);
Route::get('/my-account/personal-information/{username}/edit',[MyAccountController::class,'editPersonalOnfo'])->name('my-account.personal.information.edit')->middleware(['isCustomer','auth','verified']);
Route::post('/my-account/personal-information/edit/update',[MyAccountController::class,'updatePersonalOnfo'])->name('my-account.personal.information.update')->middleware(['isCustomer','auth','verified']);
// Customer Orders
Route::get('/my-account/orders/invoice/download/{billing_id}',[MyAccountController::class,'downloadInvoice'])->name('my-account.invoice.download')->middleware(['isCustomer','auth','verified']);
Route::get('/my-account/orders/delivered',[MyAccountController::class,'indexDeliveredOrder'])->name('my-account.delivered.order')->middleware(['isCustomer','auth','verified']);
Route::get('/my-account/orders',[MyAccountController::class,'indexOrders'])->name('my-account.orders')->middleware(['isCustomer','auth','verified']);
Route::get('/my-account/orders/track',[MyAccountController::class,'indexTrack'])->name('my-account.orders.track')->middleware(['isCustomer','auth','verified']);
Route::get('/my-account/orders/track/search/{invoice}/{mobile}',[MyAccountController::class,'TrackOrder'])->middleware(['isCustomer','auth','verified']);
Route::get('/my-account/orders/track/product/details/{invoice}',[MyAccountController::class,'productDetails'])->middleware(['isCustomer','auth','verified'])->name('track.product.details');
Route::get('/my-account/orders/track/product/details/full/{invoice}',[MyAccountController::class,'productDetailsFull'])->middleware(['isCustomer','auth','verified']);
Route::resource('my-account', MyAccountController::class)->middleware(['isCustomer','auth','verified']);
// Dashboard
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware(['auth','verified','verified']);
Route::get('/dashboard/get/color/size/{cid}/{pid}',[DashboardController::class, 'getColorSizeId'])->middleware(['auth','verified']);
// User
Route::get('/dashboard/user/profile',[BackendUserController::class, 'index'])->name('backend.user')->middleware(['auth','verified']);
Route::post('/dashboard/user/profile/choose/action',[BackendUserController::class, 'indexChooseAction'])->name('backend.choose.action')->middleware(['auth','verified']);
Route::get('/dashboard/user/profile/change/password',[BackendUserController::class, 'changePassword'])->name('backend.change.password')->middleware(['auth','verified']);
Route::post('/dashboard/user/profile/change/password/update',[BackendUserController::class, 'changePasswordUpdate'])->name('backend.change.password.update')->middleware(['auth','verified']);
Route::get('/dashboard/user/profile/edit',[BackendUserController::class, 'edit'])->name('backend.user.edit')->middleware(['auth','verified']);
Route::post('/dashboard/user/profile/edit/update',[BackendUserController::class, 'update'])->name('backend.user.update')->middleware(['auth','verified']);
// Role Controller
Route::get('/dashboard/role/assign/user',[RoleController::class, 'assignUser'])->name('assign.user')->middleware(['auth','verified']);
Route::post('/dashboard/role/assign/user/post',[RoleController::class, 'assignUserPost'])->name('assign.user.post')->middleware(['auth','verified']);
Route::get('/dashboard/create/user',[RoleController::class, 'createUser'])->name('create.user')->middleware(['auth','verified']);
Route::post('/dashboard/create/user/post',[RoleController::class, 'createUserPost'])->name('create.user.post')->middleware(['auth','verified']);
Route::resource('/dashboard/role',RoleController::class)->middleware(['auth','verified']);
// Basic Settings
Route::resource('/dashboard/basic-settings', BasicSettingController::class);
// Category
Route::resource('/dashboard/category', CategoryController::class)->middleware(['auth','verified']);
// Subcategory
Route::resource('/dashboard/subcategory', SubcategoryController::class)->middleware(['auth','verified']);
// Product
Route::get('/products/get/subcategory/{subcategory_id}',[ProductController::class,'getSubcategory'])->name('products.get.subcategory')->middleware(['auth','verified']);
// Route::get('/dashboard/product/image-gallery/{slug}',[ProductController::class,'productImageGallary'])->name('products.image.gallery')->middleware(['auth','verified']);
// Route::get('/dashboard/product/image-gallery/delete/{id}',[ProductController::class,'productImageGallaryDelete'])->name('products.image.gallery.delete')->middleware(['auth','verified']);
// Route::post('/dashboard/product/image-gallery/post',[ProductController::class,'productImageGallaryPost'])->name('products.image.gallery.post')->middleware(['auth','verified']);
Route::get('/dashboard/product/view/attribute/{product_slug}',[ProductController::class,'indexAttribute'])->name('products.attribute.index')->middleware(['auth','verified']);
Route::post('/dashboard/product/attribute/add',[ProductController::class,'AttributeStore'])->name('products.attribute.store')->middleware(['auth','verified']);
Route::get('/dashboard/product/attribute/edit/{attribute_id}',[ProductController::class,'editAttribute'])->name('products.attribute.edit')->middleware(['auth','verified']);
Route::post('/dashboard/product/attribute/update/',[ProductController::class,'updateAttribute'])->name('products.attribute.update')->middleware(['auth','verified']);
Route::get('/dashboard/product/stockout/{id}',[ProductController::class,'productStockout'])->name('products.stock.out')->middleware(['auth','verified']);
Route::resource('dashboard/product', ProductController::class);

Route::get('/dashboard/voucher/trash/restore/{id}',[VoucherController::class, 'voucherRestore'])->name('voucher.restore')->middleware(['auth','verified']);
Route::get('/dashboard/voucher/trash',[VoucherController::class, 'voucherTrashView'])->name('voucher.trash.index')->middleware(['auth','verified']);
Route::get('/dashboard/voucher/deactive/{id}',[VoucherController::class, 'voucherDeactivate'])->name('voucher.deactivate')->middleware(['auth','verified']);
Route::get('/dashboard/voucher/active/{id}',[VoucherController::class, 'voucherActive'])->name('voucher.active')->middleware('auth');
Route::get('/dashboard/voucher/deactivated-list',[VoucherController::class, 'voucherDeactivatedList'])->name('voucher.deactivate.list')->middleware(['auth','verified']);
Route::resource('/dashboard/voucher', VoucherController::class)->middleware(['auth','verified']);
// Wishlist
Route::get('/dashboard/wishlists',[WishlistController::class,'index'])->name('dashboard.wishlist')->middleware(['auth','verified']);
// Order
Route::get('/dashboard/orders/picup-in-progress/upgrade/shipped/{invoice_no}',[OrderController::class,'upgradeToShipped'])->middleware(['auth','verified']);
Route::get('/dashboard/orders/picup-in-progress',[OrderController::class,'index'])->name('dashboard.orders.index')->middleware(['auth','verified']);
Route::get('/dashboard/orders/shipped',[OrderController::class,'indexShipped'])->name('dashboard.orders.shipped')->middleware(['auth','verified']);
Route::get('/dashboard/orders/shipped/upgrade/out-for-delivery/{invoice_no}',[OrderController::class,'upgradeToOutForDelivery'])->middleware(['auth','verified']);
Route::get('/dashboard/orders/out-for-delivered',[OrderController::class,'indexOutForDelivered'])->name('dashboard.orders.outForDelivered')->middleware(['auth','verified']);
Route::get('/dashboard/orders/out-for-delivered/upgrade/delivered/{invoice_no}',[OrderController::class,'upgradeToDelivered'])->middleware(['auth','verified']);
Route::get('/dashboard/orders/delivered',[OrderController::class,'indexDelivered'])->name('dashboard.orders.delivered')->middleware(['auth','verified']);
Route::get('/dashboard/orders/details/{invoice_no}',[OrderController::class,'indexDetails'])->name('dashboard.orders.details')->middleware(['auth','verified']);
Route::get('/dashboard/orders/cancel/{invoice_no}',[OrderController::class,'cancelOrder'])->name('dashboard.orders.cancel')->middleware(['auth','verified']);
Route::get('/dashboard/orders/canceled',[OrderController::class,'indexCanceled'])->name('dashboard.orders.canceled')->middleware(['auth','verified']);
// Adding Shipping Charge
Route::post('/dashboard/orders/shipping-charge/add',[OrderController::class,'addShippingCharge'])->name('dashboard.orders.shipping.add')->middleware(['auth','verified']);
// Download Invoice
Route::get('/dashboard/orders/invoice/download/{billing_id}',[OrderController::class,'downloadInvoice'])->name('dashboard.orders.invoice')->middleware(['auth','verified']);

// Slider
Route::get('dashboard/slider/active/{slider_id}',[SliderController::class,'sliderActive'])->name('slider.active')->middleware(['auth','verified']);
Route::get('dashboard/slider/deactivate/{slider_id}',[SliderController::class,'sliderDeactivate'])->name('slider.deactivate')->middleware(['auth','verified']);
Route::resource('dashboard/slider', SliderController::class)->middleware(['auth','verified']);
// Contact Information
Route::get('dashboard/contact-information',[ContactInformationController::class, 'index'])->name('contact.information')->middleware(['auth','verified']);
Route::post('dashboard/contact-information/update',[ContactInformationController::class, 'update'])->name('contact.information.update')->middleware(['auth','verified']);
Route::get('dashboard/google-map',[ContactInformationController::class, 'indexGoogleMap'])->name('contact.information.google.map')->middleware(['auth','verified']);
Route::post('dashboard/google-map/update',[ContactInformationController::class, 'updateGoogleMap'])->name('contact.information.google.map.update')->middleware(['auth','verified']);
// Dashboard FAQ
Route::get('dashboard/faq/trash',[FaqController::class, 'indexTrash'])->name('faq.trash.index')->middleware(['auth','verified']);
Route::get('dashboard/faq/trash/restore/{faq}',[FaqController::class, 'restoreTrash'])->name('faq.trash.restore')->middleware(['auth','verified']);
Route::post('dashboard/faq/trash/permanent-delete',[FaqController::class, 'permanetDestroyTrash'])->name('faq.trash.destroy')->middleware(['auth','verified']);
Route::resource('dashboard/faq', FaqController::class)->middleware(['auth','verified']);

// Dashboard About
Route::post('dashboard/about/image/update',[AboutController::class,'imageUpdate'])->name('about.image.update')->middleware(['auth','verified']);
Route::resource('dashboard/about', AboutController::class)->middleware(['auth','verified']);

// Dashboard Blog
Route::resource('dashboard/blog', BlogController::class)->middleware(['auth','verified']);
// Socialite
Route::get('/get/district/{division_id}',[GetAjaxController::class,'getDistrict']);
Route::get('/get/upazila/{district_id}',[GetAjaxController::class,'getUpazila']);

Route::get('github/redirect',[GithubController::class,'githubRedirect']);
Route::get('github/callback',[GithubController::class,'githubCallback']);

// SSLCOMMERZ Start

// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// Product Request
Route::get('dashboard/requested-product',[ProductRequestController::class, 'indexProduct'])->name('backend.requested.product.index')->middleware(['auth','verified']);
Route::get('dashboard/requested-product/details/{id}',[ProductRequestController::class, 'showProduct'])->name('backend.requested.product.show')->middleware(['auth','verified']);
Route::post('dashboard/requested-product/approve',[ProductRequestController::class, 'ApproveProductRequest'])->name('backend.requested.product.approve')->middleware(['auth','verified']);
Route::post('dashboard/requested-product/decline',[ProductRequestController::class, 'DeclineProductRequest'])->name('backend.requested.product.decline')->middleware(['auth','verified']);
Route::resource('product-request', ProductRequestController::class)->middleware(['auth','isCustomer','verified']);
// Privacy Policy
Route::resource('dashboard/privacy-policy',PrivacyPolicyController::class)->middleware(['auth','verified']);
// Return Policy
Route::resource('dashboard/return-policy',ReturnPolicyController::class)->middleware(['auth','verified']);
// Terms and Conditions
Route::resource('dashboard/terms-and-conditions',TermConditionController::class)->middleware(['auth','verified']);
// Ship and delivery
Route::resource('dashboard/shipping-and-delivery',ShipDeliveryController::class)->middleware(['auth','verified']);
Route::get('/export',[ReportController::class,'monthlySelesExport'])->name('monthly.seles.export')->middleware(['auth','verified']);
Route::get('/dashboard/reports',[ReportController::class,'index'])->name('report.index')->middleware(['auth','verified']);
Route::post('/dashboard/reports/search',[ReportController::class,'search'])->name('report.search')->middleware(['auth','verified']);

require __DIR__.'/auth.php';
