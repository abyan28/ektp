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

Route::group(['prefix' => 'admin-panel', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/login', 'LoginController@index')->name('auth.login');
        Route::post('/login', 'LoginController@store')->name('auth.login.process');
        Route::get('/logout','LogoutController@index')->name('auth.logout');
    });

    Route::group(['middleware' => ['admin.auth', 'admin.globalvariable']], function () {
//        Route::get('/', 'Dashboard\DashboardController@index')->name('index');
		
        Route::get('/', 'Home\HomeController@index')->name('index');
		Route::post('/daftar/show', 'Pendaftaran\PendaftaranController@show')->name('pendaftaran.show');
		Route::post('/daftar/buka', 'Pendaftaran\PendaftaranController@buka')->name('pendaftaran.buka');
		/*
        Route::resource('category_gallery', 'Gallery\CategoryGalleryController');
        Route::resource('gallery', 'Gallery\ImageController');
        Route::resource('exhibition', 'Gallery\ExhibitionController');
        Route::resource('gallery_video', 'Gallery\VideoController');
        Route::resource('category_article', 'Article\CategoryArticleController');
        Route::resource('article', 'Article\ArticleController');
        Route::resource('slider', 'Slider\SliderController');
        Route::resource('inbox', 'Inbox\InboxController');
        Route::resource('contact', 'Contact\ContactController');

        // Setting
        Route::resource('setting', 'Setting\SettingController');

        // Profile FKG UHT

        // Abstraction
//        Route::resource('guideline', 'Abstraction\GuidelineController');

        // Social Media
        Route::resource('social_media', 'SocialMedia\SocialMediaController');

        // Registration

        // Committee

        // Call For Paper

        // Event
        Route::resource('category_event', 'Event\CategoryEventController');
        Route::resource('event', 'Event\EventController');

        // Proceeding

        // Sub Category
        Route::resource('sub_category', 'SubCategory\SubCategoryController');
		
		
		//Classes
		Route::get('classes', 'Classes\ClassesController@index')->name('classes.index');
		Route::get('classes/create', 'Classes\ClassesController@create')->name('classes.create');
		Route::get('classes/{classes}', 'Classes\ClassesController@show')->name('classes.show');
		Route::get('classes/{classes}/edit', 'Classes\ClassesController@edit')->name('classes.edit');
		Route::put('classes/{classes}', 'Classes\ClassesController@update')->name('classes.update');
		Route::post('classes', 'Classes\ClassesController@store')->name('classes.store');
		Route::delete('classes/{classes}', 'Classes\ClassesController@destroy')->name('classes.destroy');
		
		
		//Class Category
		Route::resource('class_category', 'ClassCategory\ClassCategoryController');
		
		//ClassGallery
		Route::get('class_gallery', 'ClassGallery\ClassGalleryController@index')->name('class_gallery.index');
		Route::get('class_gallery/create/{id}', 'ClassGallery\ClassGalleryController@create')->name('class_gallery.create');
		Route::get('class_gallery/{classes}', 'ClassGallery\ClassGalleryController@show')->name('class_gallery.show');
		Route::get('class_gallery/{classGallery}/edit', 'ClassGallery\ClassGalleryController@edit')->name('class_gallery.edit');
		Route::put('class_gallery/{classGallery}', 'ClassGallery\ClassGalleryController@update')->name('class_gallery.update');
		Route::post('class_gallery', 'ClassGallery\ClassGalleryController@store')->name('class_gallery.store');
		Route::delete('class_gallery/{classGallery}', 'ClassGallery\ClassGalleryController@destroy')->name('class_gallery.destroy');
		
		Route::resource('session', 'Session\SessionController');
		Route::resource('class_benefit', 'ClassBenefit\ClassBenefitController');
		Route::resource('class_session', 'ClassSession\ClassSessionController');
		
		Route::post('class_session/delete', 'ClassSession\ClassSessionController@destroy2')->name('class_session.delete');
		
		Route::resource('activity', 'Activity\ActivityController');
		
		Route::resource('achievement', 'Achievement\AchievementController');
		
		Route::resource('feedback', 'Feedback\FeedbackController');
		
		Route::resource('base_price', 'BasePrice\BasePriceController');
		
		Route::resource('teacher', 'Teacher\teacherController');
		
		Route::post('teacher/details/deleteclass', 'Teacher\teacherController@deleteClass')->name('teacher.deleteclass');
		Route::post('teacher/details/deletesession', 'Teacher\teacherController@deleteSession')->name('teacher.deletesession');
		Route::post('teacher/details/storeclass', 'Teacher\teacherController@storeClass')->name('teacher.storeclass');
		Route::post('teacher/details/storeSession', 'Teacher\teacherController@storeSession')->name('teacher.storesession');
		*/
    });
});