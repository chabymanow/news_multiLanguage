<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubdistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\WebsiteController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Frontend\ExtraController;

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

Route::get('/', function () {
    return view('main.home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

//Admin logout
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// Admin category routes
Route::get('/categories', [CategoryController::class, 'Index'])->name('categories');
Route::get('/deleted', [CategoryController::class, 'deletedCategories'])->name('deleted');
Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
Route::post('/create/category', [CategoryController::class, 'CreateCategory'])->name('create.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftdeleteCategory'])->name('softdelete.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');
Route::get('/restore/category/{id}', [CategoryController::class, 'RestoreCategory'])->name('restore.category');

// Admin sub category routes
Route::get('/subcategories', [SubcategoryController::class, 'Index'])->name('subcategories');
Route::get('/add/subcategory', [SubcategoryController::class, 'AddSubcategories'])->name('add.subcategory');
Route::post('/create/subcategory', [SubcategoryController::class, 'CreateSubcategory'])->name('create.subcategory');
Route::get('/edit/subcategory/{id}', [SubcategoryController::class, 'EditSubcategory'])->name('edit.subcategory');
Route::post('/update/subcategory/{id}', [SubcategoryController::class, 'UpdateSubcategory'])->name('update.subcategory');
Route::get('/delete/subcategory/{id}', [SubcategoryController::class, 'DeleteSubcategory'])->name('delete.subcategory');

// Admin Distric routes
Route::get('/district', [DistrictController::class, 'Index'])->name('district');
Route::get('/add/district', [DistrictController::class, 'AddDistric'])->name('add.district');
Route::post('/create/district', [DistrictController::class, 'CreateDistric'])->name('create.district');
Route::get('/edit/district/{id}', [DistrictController::class, 'EditDistrict'])->name('edit.district');
Route::post('/update/district/{id}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');
Route::get('/softdelete/district/{id}', [DistrictController::class, 'SoftdeleteDistrict'])->name('softdelete.district');
Route::get('/delete/district/{id}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');


// Admin sub Distric routes
Route::get('/subdistrict', [SubdistrictController::class, 'Index'])->name('subdistrict');
Route::get('/add/subdistrict', [SubdistrictController::class, 'AddSubdistrict'])->name('add.subdistrict');
Route::post('/create/subdistrict', [SubdistrictController::class, 'CreateSubdistrict'])->name('create.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubdistrictController::class, 'EditSubdistrict'])->name('edit.subdistrict');
Route::post('/update/subdistrict/{id}', [SubdistrictController::class, 'UpdateSubdistrict'])->name('update.subdistrict');
Route::get('/delete/subdistrict/{id}', [SubdistrictController::class, 'DeleteSubdistrict'])->name('delete.subdistrict');

// Admin Post routes
Route::get('/createpost', [PostController::class, 'CreatePost'])->name('create.post');
Route::post('/add/post', [PostController::class, 'StorePost'])->name('add.post');
Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');
Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');
Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');

// Settings routes
Route::get('social/settings', [SettingController::class, 'SocialSetting'])->name('social.settings');
Route::post('/update/social/{id}', [SettingController::class, 'UpdateSocial'])->name('update.social');
Route::get('seo/settings', [SettingController::class, 'SeoSetting'])->name('seo.settings');
Route::post('/update/seo/{id}', [SettingController::class, 'UpdateSeo'])->name('update.seo');
Route::get('coffee/settings', [SettingController::class, 'CoffeeSetting'])->name('coffee.settings');
Route::post('/update/coffee/{id}', [SettingController::class, 'UpdateCoffee'])->name('update.coffee');
Route::get('livetv/settings', [SettingController::class, 'LivetvSetting'])->name('livetv.settings');
Route::post('/update/livetv/{id}', [SettingController::class, 'UpdateLivetv'])->name('update.livetv');
Route::get('headline/settings', [SettingController::class, 'HeadlineSetting'])->name('headline.settings');
Route::post('/update/headline/{id}', [SettingController::class, 'UpdateHeadline'])->name('update.headline');


//Websites routes
Route::get('/websites', [WebsiteController::class, 'Index'])->name('websites');
Route::get('/create/website', [WebsiteController::class, 'CreateWebsite'])->name('create.website');
Route::post('/add/website', [WebsiteController::class, 'StoreWebsite'])->name('add.website');
Route::get('/edit/website/{id}', [WebsiteController::class, 'EditWebsite'])->name('edit.website');
Route::post('/update/website/{id}', [WebsiteController::class, 'UpdateWebsite'])->name('update.website');
Route::get('/delete/website/{id}', [WebsiteController::class, 'DeleteWebsite'])->name('delete.website');

// Photo gallery routes
Route::get('/photo/gallery', [GalleryController::class, 'PhotoGallery'])->name('photo.gallery');
Route::get('/add/photo', [GalleryController::class, 'AddPhoto'])->name('add.photo');
Route::post('/insert/photo', [GalleryController::class, 'InsertPhoto'])->name('insert.photo');
Route::get('/edit/photo/{id}', [GalleryController::class, 'EditPhoto'])->name('edit.photo');
Route::post('/update/photo/{id}', [GalleryController::class, 'UpdatePhoto'])->name('update.photo');
Route::get('/delete/photo/{id}', [GalleryController::class, 'DeletePhoto'])->name('delete.photo');

// Photo gallery routes
Route::get('/video/gallery', [GalleryController::class, 'VideoGallery'])->name('video.gallery');
Route::get('/add/video', [GalleryController::class, 'AddVideo'])->name('add.video');
Route::post('/insert/video', [GalleryController::class, 'InsertVideo'])->name('insert.video');
Route::get('/edit/video/{id}', [GalleryController::class, 'EditVideo'])->name('edit.video');
Route::post('/update/video/{id}', [GalleryController::class, 'UpdateVideo'])->name('update.video');
Route::get('/delete/video/{id}', [GalleryController::class, 'DeleteVideo'])->name('delete.video');

// JSON data for category and district
Route::get('/all/post', [PostController::class, 'Index'])->name('all.post');
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubcategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubdistrict']);


//************************* */
// Frontend section
//************************* */

// Multi language routes
Route::get('/language/{lang}', [ExtraController::class, 'ChangeLanguage'])->name('language');

