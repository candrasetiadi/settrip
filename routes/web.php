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
Route::get('/', function () {

	return view('homepage');
});

Route::get('/admin', function () {

    return view('auth/login');
});

Route::get('/admin/register', function () {

    return view('auth/register');
});

Route::prefix('admin')->group(function () {

	Route::get('home', 'Admin\HomeController@index')->name('home');
	Route::get('users', 'Admin\UserController@index')->name('users');

	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	Route::resource('trips', 'Admin\TripController');
	Route::get('trips/{id}/delete', ['as' => 'trips.delete', 'uses' => 'Admin\TripController@destroy']);

	//Destination
	Route::resource('destination', 'Admin\DestinationController');
	Route::get('destination/{id}/delete', ['as' => 'destination.delete', 'uses' => 'Admin\DestinationController@destroy']);

	Route::resource('destinationCategory', 'Admin\DestinationCategoryController');
	Route::get('destinationCategory/{id}/delete', ['as' => 'destinationCategory.delete', 'uses' => 'Admin\DestinationCategoryController@destroy']);

	Route::resource('destinationType', 'Admin\DestinationTypeController');
	Route::get('destinationType/{id}/delete', ['as' => 'destinationType.delete', 'uses' => 'Admin\DestinationTypeController@destroy']);

	Route::resource('destinationActivity', 'Admin\DestinationActivityController');
	Route::get('destinationActivity/{id}/delete', ['as' => 'destinationActivity.delete', 'uses' => 'Admin\DestinationActivityController@destroy']);

	Route::resource('destinationFacility', 'Admin\DestinationFacilityController');
	Route::get('destinationFacility/{id}/delete', ['as' => 'destinationFacility.delete', 'uses' => 'Admin\DestinationFacilityController@destroy']);

	Route::resource('destinationEquipment', 'Admin\DestinationEquipmentController');
	Route::get('destinationEquipment/{id}/delete', ['as' => 'destinationEquipment.delete', 'uses' => 'Admin\DestinationEquipmentController@destroy']);

	Route::resource('destinationAttraction', 'Admin\DestinationAttractionController');
	Route::get('destinationAttraction/{id}/delete', ['as' => 'destinationAttraction.delete', 'uses' => 'Admin\DestinationAttractionController@destroy']);

	Route::get('regencies/{id}','Admin\DestinationController@getRegencies');

	//Resto
	Route::resource('restaurantCategory', 'Admin\RestaurantCategoryController');
	Route::get('restaurantCategory/{id}/delete', ['as' => 'restaurantCategory.delete', 'uses' => 'Admin\RestaurantCategoryController@destroy']);

	Route::resource('restaurant', 'Admin\RestaurantController');
	Route::get('restaurant/{id}/delete', ['as' => 'restaurant.delete', 'uses' => 'Admin\RestaurantController@destroy']);

	Route::resource('restaurantMenu', 'Admin\RestaurantMenuController');
	Route::get('restaurantMenu/{id}/delete', ['as' => 'restaurantMenu.delete', 'uses' => 'Admin\RestaurantMenuController@destroy']);

	//lodging
	Route::resource('lodgingType', 'Admin\LodgingTypeController');
	Route::get('lodgingType/{id}/delete', ['as' => 'lodgingType.delete', 'uses' => 'Admin\LodgingTypeController@destroy']);

	Route::resource('lodging', 'Admin\LodgingController');
	Route::get('lodging/{id}/delete', ['as' => 'lodging.delete', 'uses' => 'Admin\LodgingController@destroy']);

	Route::resource('lodgingFacility', 'Admin\LodgingFacilityController');
	Route::get('lodgingFacility/{id}/delete', ['as' => 'lodgingFacility.delete', 'uses' => 'Admin\LodgingFacilityController@destroy']);

	Route::resource('lodgingRoomType', 'Admin\LodgingRoomTypeController');
	Route::get('lodgingRoomType/{id}/delete', ['as' => 'lodgingRoomType.delete', 'uses' => 'Admin\LodgingRoomTypeController@destroy']);

	Route::resource('lodgingDetailRoom', 'Admin\LodgingDetailRoomController');
	Route::get('lodgingDetailRoom/{id}/delete', ['as' => 'lodgingDetailRoom.delete', 'uses' => 'Admin\LodgingDetailRoomController@destroy']);

	//Transport
	Route::resource('transportationTypes', 'Admin\TransportationTypeController');
	Route::get('transportationTypes/{id}/delete', ['as' => 'transportationTypes.delete', 'uses' => 'Admin\TransportationTypeController@destroy']);

	Route::resource('transportationFacility', 'Admin\TransportationFacilityController');
	Route::get('transportationFacility/{id}/delete', ['as' => 'transportationFacility.delete', 'uses' => 'Admin\TransportationFacilityController@destroy']);

	Route::resource('transportation', 'Admin\TransportationController');
	Route::get('transportation/{id}/delete', ['as' => 'transportation.delete', 'uses' => 'Admin\TransportationController@destroy']);

	//Guide
	Route::resource('guideTalent', 'Admin\GuideTalentController');
	Route::get('guideTalent/{id}/delete', ['as' => 'guideTalent.delete', 'uses' => 'Admin\GuideTalentController@destroy']);

	Route::resource('guideLanguage', 'Admin\GuideLanguageController');
	Route::get('guideLanguage/{id}/delete', ['as' => 'guideLanguage.delete', 'uses' => 'Admin\GuideLanguageController@destroy']);

	Route::resource('guide', 'Admin\GuideController');
	Route::get('guide/{id}/delete', ['as' => 'guide.delete', 'uses' => 'Admin\GuideController@destroy']);
});

Auth::routes();


