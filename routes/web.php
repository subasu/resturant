<?php
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
//main site

    Route::get('/test', 'IndexController@test');
    Route::get('/404', 'IndexController@load404');
    Route::get('/', 'IndexController@home');
    Route::post('/search', 'IndexController@search');
    Route::get('/aboutUs', 'IndexController@aboutUs');
    Route::get('productFiles', 'IndexController@productFiles');
    Route::get('products', 'IndexController@products');
    Route::get('getSubmenu/{id}', 'CommonController@getSubmenu');
    Route::get('showProducts/{id}', 'IndexController@showProducts');
//pagination for shopping product page
    Route::get('laravel-ajax-pagination', array('as' => 'ajax-pagination', 'uses' => 'IndexController@productList'));
    Route::get('order/{parameter}', 'IndexController@order');
    Route::get('productDetail/{id}', 'IndexController@productDetail');
//user routes => for basket //Mr shiri
    Route::group(['prefix' => 'user'], function () {
        Route::post('addToBasket', 'UserController@addToBasket');
        Route::get('getBasketCountNotify', 'UserController@getBasketCountNotify');
        Route::get('getBasketTotalPrice', 'UserController@getBasketTotalPrice');
        Route::get('getBasketContent', 'UserController@getBasketContent');
        Route::post('removeItemFromBasket', 'UserController@removeItemFromBasket');
        Route::post('orderFixed', 'UserController@orderFixed');
        Route::post('addOrSubCount', 'UserController@addOrSubCount');
        Route::post('orderRegistration', 'UserController@orderRegistration');
        Route::post('addToSeenCount', 'UserController@addToSeenCount');
        Route::get('checkLength', 'UserController@checkLength');
        Route::get('checkWidth', 'UserController@checkWidth');
    });
//Auth::routes();
// Authentication Routes...
    Route::get('/login', 'IndexController@login')->name('login');//rayat 20-9-96 //show register and login form
    Route::post('login', 'Auth\LoginController@login');//rayat 20-9-96
// Registration Routes...
    Route::post('register', 'IndexController@register');//rayat 20-9-96
    Route::get('captcha', 'IndexController@createCaptchaImage');
    Route::get('town/{cid}', 'IndexController@town');
// Password Reset Routes...
    Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm');//rayat 20-9-96
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail');//rayat 20-9-96
    Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm');//rayat 20-9-96
    Route::post('reset', 'Auth\ResetPasswordController@reset');//rayat 20-9-96

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/panel', 'IndexController@index');
        //admin routes
        Route::group(['prefix' => 'admin'], function () {
            //categories
            Route::get('addCategory', 'CategoryController@addCategory');//show add category view
            Route::get('categoriesManagement', 'CategoryController@categoriesManagement');//show view of all category
            Route::post('addNewCategory', 'CategoryController@addNewCategory');// add new category in database
            Route::get('editCategory/{id}', 'CategoryController@editCategory');//this route is related to edit main category
            Route::get('showSubCategory/{id}', 'CategoryController@showSubCategory');//this route is related to edit sub category
            Route::post('editCategoryPicture', 'CategoryController@editCategoryPicture');//this route is related to edit category picture
            Route::post('editCategoryTitle', 'CategoryController@editCategoryTitle');//this route is related ti edit category title
            Route::post('enableOrDisableCategory', 'CategoryController@enableOrDisableCategory');//this route is related to make categories enable or disable
            //units
            Route::get('addUnit', 'UnitController@addUnit');//show add unit view
            Route::get('unitCountManagement', 'UnitController@unitCountManagement');//show view of all units and subUnits
            Route::post('addNewUnit', 'UnitController@addNewUnit');//show view of all units and subUnits
            Route::get('subUnitManagement/{id}', 'UnitController@subUnitManagement');//show view of all units and subUnits
            Route::get('editUnitCount/{id}', 'UnitController@editUnitCount');
            Route::post('editUnitCountTitle', 'UnitController@editUnitCountTitle');
            Route::post('enableOrDisableUnitCount', 'UnitController@enableOrDisableUnitCount');
            Route::post('enableOrDisableSubUnitCount', 'UnitController@enableOrDisableSubUnitCount');
            //product
            Route::get('addProduct', 'ProductController@addProduct');//show add product view
            Route::get('productsManagement', 'ProductController@productsManagement');//show view of all product's details
            Route::post('addNewProduct', 'ProductController@addNewProduct');// add new product in database
            Route::post('updateProduct', 'ProductController@updateProduct');// update Product in database
            Route::get('productDetails/{id}', 'ProductController@productDetailsGet');
            Route::post('changeProductStatus/{parameter}', 'ProductController@changeProductStatus');
            Route::get('deleteVideo', 'ProductController@deleteVideo');
            //images product
            Route::get('deleteProductPicture/{id}', 'ProductController@deleteProductPicture');//use in updating product (product details blade)
            //users
            Route::get('usersManagement', 'UserController@usersManagement');//show view of all customer's details
            //orders
            Route::get('ordersManagement', 'OrderController@ordersManagement');//show view of all orders
            Route::get('adminShowFactor/{id}', 'OrderController@adminShowFactor');
            Route::get('checkOrders', 'OrderController@checkOrders');
            Route::get('checkOrderStatus', 'OrderController@checkOrderStatus');
            Route::post('changeOrderStatus', 'OrderController@changeOrderStatus');
            Route::get('oldOrders', 'OrderController@oldOrders');
            //deliveryMan
            Route::get('addDeliveryMan', 'DeliveryManController@addDeliveryMan');//show add DeliveryMan view
            Route::get('deliveryMansManagement', 'DeliveryManController@deliveryMansManagement');//show view of all deliveryMans's details
            //color routes
            Route::get('colorsManagement', 'ColorController@colorsManagement'); //this route is related to show all colors
            Route::get('addColors', 'ColorController@addColors'); //this route is related to show add colors blade
            Route::post('addNewColors', 'ColorController@addNewColors');//this route is related to add new colors
            Route::get('editColor/{id}', 'ColorController@editColor'); //this route is related to return edit color view
            Route::post('editColorTitle', 'ColorController@editColorTitle');//this route is related to edit color title
            Route::post('enableOrDisableColor', 'ColorController@enableOrDisableColor');
            //size routes
            Route::get('sizesManagement/{id}', 'SizeController@sizesManagement');//this route is related to return view of size management
            Route::get('addSizes', 'SizeController@addSizes');//this route is related to return view of add size
            Route::post('addNewSize', 'SizeController@addNewSize');//this route is related to add new size in data base
            Route::get('editSize/{id}', 'SizeController@editSize'); //this route is related to return edit color view
            Route::post('editSizeInformation', 'SizeController@editSizeInformation');//this route is related to edit size title
            Route::post('enableOrDisableSize', 'SizeController@enableOrDisableSize');
            //payment type routes
            Route::get('addPaymentType', 'PaymentTypeController@addPaymentType');//this route is related to return add payment type blade
            Route::post('addNewPaymentTypes', 'PaymentTypeController@addNewPaymentTypes');
            Route::get('paymentTypesManagement', 'PaymentTypeController@paymentTypesManagement');
            Route::get('editPaymentType/{id}', 'PaymentTypeController@editPaymentType');
            Route::post('editPaymentTypeTitle', 'PaymentTypeController@editPaymentTypeTitle');
            Route::post('enableOrDisablePaymentType', 'PaymentTypeController@enableOrDisablePaymentType');
            //printer route
            Route::get('connectToPrinter', 'OrderController@connectToPrinter');
            //slider
            Route::get('addSlider', 'AdminController@addSlider');
            Route::post('addNewSlider', 'AdminController@addNewSlider');
            Route::get('sliderManagement','AdminController@sliderManagement');
            Route::get('editSlider/{id}','AdminController@editSlider');
            Route::post('editSliderPicture', 'AdminController@editSliderPicture');//this route is related to edit sliders picture
            Route::post('editSliderTitle', 'AdminController@editSliderTitle');//this route is related ti edit sliders title
            Route::post('enableOrDisableSlider', 'AdminController@enableOrDisableSlider');//this route is related to make sliders enable or disable
            //AboutUs
            Route::get('addAboutUs', 'AdminController@addAboutUs');
            Route::post('addAboutUsPost', 'AdminController@addAboutUsPost');
            Route::get('editAboutUs', 'AdminController@editAboutUs');
            Route::post('editAboutUsPost', 'AdminController@editAboutUsPost');
            //Services
            Route::get('addService', 'AdminController@addService');
            Route::post('addServicePost', 'AdminController@addServicePost');
            Route::get('ServicesManagement', 'AdminController@ServicesManagement');
            Route::get('editService/{id}', 'AdminController@editService');
            Route::post('editServicePost', 'AdminController@editServicePost');
            Route::post('enableOrDisableService', 'AdminController@enableOrDisableService');
            //Logo
            Route::get('addLogo', 'AdminController@addLogo');
            Route::post('addLogoPost', 'AdminController@addLogoPost');
            Route::get('editLogo', 'AdminController@editLogo');
            Route::post('editLogoPost', 'AdminController@editLogoPost');
            //google map
            Route::get('addGoogleMap', 'AdminController@addGoogleMap');
            Route::post('addGoogleMapPost', 'AdminController@addGoogleMapPost');
            Route::get('editGoogleMap', 'AdminController@editGoogleMap');
            Route::post('editGoogleMapPost', 'AdminController@editGoogleMapPost');
            //models route
            Route::get('addModels','ModelsController@addModels');
            Route::get('modelsManagement','ModelsController@modelsManagement');
            Route::post('addNewModels','ModelsController@addNewModels');
            Route::post('editModelTitle','ModelsController@editModelTitle');
            Route::post('enableOrDisableModel','ModelsController@enableOrDisableModel');
            Route::get('editModel/{id}', 'ModelsController@editModel'); //this route is related to return edit color view

            //new orders management
            Route::get('newOrders','NewOrdersController@newOrders');
            Route::get('showNewOrders/{id}','NewOrdersController@showNewOrders');
            Route::get('showOrdersMessage/{id}','NewOrdersController@showOrdersMessage');
            Route::post('saveAdminMessage','NewOrdersController@saveAdminMessage');
            Route::post('changeOrderStatus','NewOrdersController@changeOrderStatus');

            //page handle routes
            Route::post('pageHandle','PageController@pageHandle');

            //video handler
            Route::get('videoHandler/{parameter}','AdminController@videoHandler');
//            Route::get('showVideo/{pageName}',['as' => 'showVideo' , 'uses' => 'AdminController@showVideo']);

        });
        //end admin panel routes
        //user panel routes
        Route::group(['prefix' => 'user'], function () {
            Route::get('userOrders', 'UserController@userOrders');
            Route::get('orderDetails/{id}', 'UserController@orderDetails');
            Route::get('userShowFactor/{id}', 'UserController@userShowFactor');
            Route::get('changePassword', 'UserController@changePassword');
            Route::post('saveNewPassword', 'UserController@saveNewPassword');
            //below routes is related to  new orders
            Route::get('addNewOrders','UserController@addNewOrders');
            Route::post('saveNewOrder','UserController@saveNewOrder');
            Route::get('followOrders','UserController@followOrders');
            Route::get('showOrdersMessage/{id}','UserController@showOrdersMessage');
            Route::post('saveNewMessage','UserController@saveNewMessage');


         });
        //end user panel routes
        Route::post('logout', 'Auth\LoginController@logout');//rayat 20-9-96
        Route::get('logout', 'Auth\LoginController@logout');//rayat 20-9-96
    });
