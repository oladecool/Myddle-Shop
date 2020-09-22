<?php

Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes((['verify' => true]));
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//Redirect Registration to Login
// Route::get('register', 'Auth\LoginController@redirectToProvider')->name('register');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


///Admin Section
//Categories
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/categories', 'Admin\Category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@Deletecategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@EditCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@Updatecategory');

//Brand
Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@Deletebrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@Editbrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@Updatebrand');

//Subcategories
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcat', 'Admin\Category\SubCategoryController@storesubcat')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubCategoryController@DeleteSubcat');
Route::get('edit/subcategory/{id}', 'Admin\Category\SubCategoryController@EditSubcat');
Route::post('update/subcategory/{id}', 'Admin\Category\SubCategoryController@UpdateSubcat');

//All Coupons
Route::get('admin/coupon', 'Admin\Category\CouponController@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@StoreCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@EditCoupon');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@UpdateCoupon');

//Newsletter
Route::get('admin/newsletter', 'Admin\Category\CouponController@Newsletter')->name('admin.newsletter');
Route::get('delete/newsletter/{id}', 'Admin\Category\CouponController@DeleteLetter');

//For Show Sub category with ajax
Route::get('get/subcategory/{category_id}', 'Admin\ProductController@GetSubcat');


//All Products Route
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');

Route::get('inactive/product/{id}', 'Admin\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\ProductController@active');
Route::get('delete/product/{id}', 'Admin\ProductController@DeleteProduct');

Route::get('view/product/{id}', 'Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}', 'Admin\ProductController@EditProduct');

Route::post('update/product/nophoto/{id}', 'Admin\ProductController@NoProductImage');
Route::post('update/product/photo/{id}', 'Admin\ProductController@UpdateProductImage');

// Blog Admin Route
Route::get('blog/category/list', 'Admin\PostController@BlogList')->name('add.blog.categorylist');
Route::post('admin/store/blog', 'Admin\PostController@StoreBlogCat')->name('store.blog.category');
Route::get('delete/blogcategory/{id}', 'Admin\PostController@DeleteBlogCat');
Route::get('edit/blogcategory/{id}', 'Admin\PostController@EditBlogCat');
Route::post('update/blogcategory/{id}', 'Admin\PostController@UpdateBlogCat');

Route::get('admin/add/post', 'Admin\PostController@Create')->name('add.blogpost');
Route::get('admin/all/post', 'Admin\PostController@index')->name('all.blogpost');

Route::post('admin/store/post', 'Admin\PostController@Store')->name('store.post');

Route::get('edit/post/{id}', 'Admin\PostController@EditPost');
Route::get('delete/post/{id}', 'Admin\PostController@DeletePost');
Route::post('update/post/{id}', 'Admin\PostController@UpdatePost');


//Frontend Rounds
Route::post('store/newsletter', 'FrontController@StoreNewsletter')->name('store.newsletter');

















