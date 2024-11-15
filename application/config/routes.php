<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['save_valid_id'] = 'pages/save_valid_id';
$route['edit_id/(:any)/(:any)'] = 'pages/edit_id/$1/$2';
$route['add_remarks/(:any)'] = 'pages/add_remarks/$1';
$route['view_profile/(:any)'] = 'pages/view_profile/$1';
$route['manage_customer'] = 'pages/manage_customer';
$route['view_feedback/(:any)'] = 'pages/view_feedback/$1';
$route['update_booking'] = 'pages/update_booking';
$route['edit_booking/(:any)'] = 'pages/edit_booking/$1';
$route['check_rate'] = 'pages/check_rate';
$route['save_chat'] = 'pages/save_chat';
$route['live_chat_user/(:any)'] = 'pages/live_chat_user/$1';
$route['live_chat_admin'] = 'pages/live_chat_admin';
$route['submit_chat_user'] = 'pages/submit_chat_user';
$route['live_chat'] = 'pages/live_chat';
$route['chat_bot'] = 'pages/chat_bot';
$route['save_signature'] = 'pages/save_signature';
$route['signature/(:any)'] = 'pages/signature/$1';
$route['update_profile'] = 'pages/update_profile';
$route['user_profile'] = 'pages/user_profile';
$route['track_vehicle'] = 'pages/track_vehicle';
$route['print_agreement/(:any)'] = 'pages/print_agreement/$1';
$route['save_agreement'] = 'pages/save_agreement';
$route['manage_agreement/(:any)'] = 'pages/manage_agreement/$1';
$route['save_review'] = 'pages/save_review';
$route['check_availability'] = 'pages/check_availability';
$route['complete_booking/(:any)'] = 'pages/complete_booking/$1';
$route['confirm_booking'] = 'pages/confirm_booking';
$route['cancel_booking/(:any)'] = 'pages/cancel_booking/$1';
$route['remove_pop/(:any)'] = 'pages/remove_pop/$1';
$route['view_pop_image/(:any)'] = 'pages/view_pop_image/$1';
$route['upload_pop_save'] = 'pages/upload_pop_save';
$route['upload_pop/(:any)'] = 'pages/upload_pop/$1';
$route['cancel_user_booking/(:any)'] = 'pages/cancel_user_booking/$1';
$route['book_save'] = 'pages/book_save';
$route['car_booking/(:any)'] = 'pages/car_booking/$1';
$route['user_bookings'] = 'pages/user_bookings';
$route['view_car_details/(:any)'] = 'pages/view_car_details/$1';
$route['view_car_image/(:any)'] = 'pages/view_car_image/$1';
$route['save_car_image'] = 'pages/save_car_image';
$route['delete_car_type/(:any)'] = 'pages/delete_car_type/$1';
$route['save_car_type'] = 'pages/save_car_type';
$route['manage_car_type'] = 'pages/manage_car_type';
$route['delete_car/(:any)'] = 'pages/delete_car/$1';
$route['save_car'] = 'pages/save_car';
$route['manage_cars'] = 'pages/manage_cars';
$route['manage_bookings'] = 'pages/manage_bookings';
$route['admin_main'] = 'pages/admin_main';
$route['admin_logout'] = 'pages/admin_logout';
$route['admin_authentication'] = 'pages/admin_authentication';
$route['admin'] = 'pages/admin';
$route['user_authentication'] = 'pages/user_authentication';
$route['user_logout'] = 'pages/user_logout';
$route['save_user'] = 'pages/save_user';
$route['user_login/(:any)/(:any)'] = 'pages/user_login/$1/$2';
$route['view_car_type/(:any)'] = 'pages/view_car_type/$1';
$route['cars'] = 'pages/cars';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
