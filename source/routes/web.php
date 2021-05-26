<?php

use Illuminate\Support\Facades\Route;

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


/*-------------CMS ROUTES-----------------*/


//-- uploads large images --//
Route::post('upload-image', 'UploadController@postUpload');
//-- uploads thumb images --//
Route::post('upload-thumb','UploadController@upload_thumb');
//-- uploads docs --//
Route::post('upload-docs','UploadController@upload_docs');


//--login cms--//
Route::resource('cms', 'LoginController');
//--logout cms--//
Route::get('logout', 'LoginController@logout');
//-- account ---//
Route::get('my-account', 'DashboardController@account');
//--recover password--//
Route::get('recover-password', 'LoginController@recovery');
// store recovery //
Route::post('store_recovery', 'LoginController@store_recovery');
//--dashboard cms---//
Route::resource('dashboard', 'DashboardController');
//---update avatar user---//
Route::post('avatar','DashboardController@avatar');
//---users cms ----//
Route::resource('users', 'UserController');
// --- users lists--//
Route::get('user_lists', 'UserController@lists');
//---roles ----//
Route::resource('roles', 'RolController');
// -- roles lists--//
Route::get('rol_lists', 'RolController@lists');
//-- permissions --//
Route::get('permission/{id}', 'RolController@permission');
// -- list permissions --//
Route::get('permission_lists/{id}', 'RolController@permission_lists');
// --assing permission --//
Route::post('assign', 'RolController@assign');
// --remove permission --//
Route::post('remove', 'RolController@remove');

//----name/logo options----//
Route::get('options', 'OptionsController@index')->middleware('role:5');
//----seo options----//
Route::get('seo', 'OptionsController@seo')->middleware('role:7');
//----contact options----//
Route::get('contact', 'OptionsController@contact')->middleware('role:6');
//----update options----//
Route::post('update_logo','OptionsController@logo');
//---update options --//
Route::post('update_options', 'OptionsController@update');
// ----sections----//
Route::resource('sections', 'SectionController');
// --section list--//
Route::get('sections_lists', 'SectionController@lists');
// -- list photo section --//
Route::post('lists-photo-section', 'SectionController@lists_photo');
// --delete photo section --//
Route::post('delete-photo-section', 'SectionController@delete_photo');
//---move section---//
Route::post('move-section', 'SectionController@move_section');


// ----audits----//
Route::resource('audits','AuditsController');
// ----audits lists----//
Route::get('audits_listing','AuditsController@listing');
// ----audits search----//
Route::get('audits_search_listing/{type}/{init}/{end}','AuditsController@search_listing');


// ----menu ----//
Route::resource('menu', 'MenuController');
// --menu lists--//
Route::get('menu_lists', 'MenuController@lists');
// --move menu-- //
Route::post('move-menu', 'MenuController@move_menu');
// --update status-- //
Route::post('up-status-menu', 'MenuController@up_status');
// -- list photo menu --//
Route::post('lists-photo-menu', 'MenuController@lists_photo');
// --delete photo menu --//
Route::post('delete-photo-menu', 'MenuController@delete_photo');


// ----widget----//
Route::resource('widgets', 'WidgetController');
// --widget list--//
Route::get('widget_lists', 'WidgetController@lists');
//---move widget ---//
Route::post('move-widget', 'WidgetController@move_widget');
// -- list photo section --//
Route::post('lists-photo-widget', 'WidgetController@lists_photo');
// --delete photo section --//
Route::post('delete-photo-widget', 'WidgetController@delete_photo');


//---comments ----//
Route::resource('support', 'SupportController');
Route::get('mailbox-received', 'SupportController@index')->middleware('role:21');
Route::get('mailbox-sent', 'SupportController@sent')->middleware('role:22');
Route::get('{id}/response','SupportController@edit');
// ---comments lists--//
Route::get('support_lists/{id}', 'SupportController@listing');



// ----properties----//
Route::resource('properties', 'PropertiesController');
// --properties list--//
Route::get('properties_lists', 'PropertiesController@lists');
// -- list photo properties --//
Route::post('lists-photo-properties', 'PropertiesController@lists_photo');
// --delete photo properties --//
Route::post('delete-photo-properties', 'PropertiesController@delete_photo');
//---move properties---//
Route::post('move-properties', 'PropertiesController@move_properties');


//---types----//
Route::resource('properties-types', 'TypesController');
// -- types hives lists--//
Route::get('types_lists', 'TypesController@lists');
//---move types ---//
Route::post('move-types', 'TypesController@move_types');


//---amenities----//
Route::resource('properties-amenities', 'AmenitiesController');
// -- amenities hives lists--//
Route::get('amenities_lists', 'AmenitiesController@lists');
//---move amenities ---//
Route::post('move-amenities', 'AmenitiesController@move_amenities');



//---metricas ----//
Route::get('metrics/{init}/{end}','DashboardController@analytics_date');
Route::get('views_pages_listing', 'DashboardController@pages_listing');
Route::get('views_pages_listing_date/{init}/{end}', 'DashboardController@pages_listing_date');



/*-------------END CMS ROUTES ----------*/



/*-------------ERRORS LOGGED------------*/
Route::get('logged', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
/*-------------END ERRORS LOGGED------------*/




/********************FRONTEND*********************/

Route::get('/','FrontendController@index');
Route::get('/en','FrontendController@index');
Route::get('/es','FrontendController@index');


Route::get('venta','FrontendController@sales');
Route::get('es/venta','FrontendController@sales');
Route::get('en/sale','FrontendController@sales');


Route::get('alquiler','FrontendController@rentals');
Route::get('es/alquiler','FrontendController@rentals');
Route::get('en/rental','FrontendController@rentals');



foreach(DB::table('properties')->get() as $rs):
	if($rs->url!=""):
		Route::get("es/".$rs->url, 'FrontendController@property_detail');
		Route::get("en/".$rs->url_en, 'FrontendController@property_detail');
	endif;
	
endforeach;

Route::post('store_message','FrontendController@store_message');


Route::get('buscar','FrontendController@search');
Route::get('es/buscar','FrontendController@search');
Route::get('en/search','FrontendController@search');


Route::get('api/properties/{lang}/{type}/{area}/{bedroom}/{bathroom}','ApiPropertiesController@lists');

Route::get('api/properties/search/{lang}/{type}/{address}/{area}/{bedroom}/{bathroom}','ApiPropertiesController@lists_search');