<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

|	https://codeigniter.com/user_guide/general/routing.html

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

// frontend views
$route['default_controller'] = 'frontend_side/frontend/index';
$route['index'] = 'frontend_side/Frontend/index';
$route['contactus'] = 'frontend_side/Frontend/contactus';
$route['about'] = 'frontend_side/Frontend/about';
$route['error_page'] = 'frontend_side/Frontend/error_page';
$route['awards'] = 'frontend_side/Frontend/award';
$route['all_movies'] = 'frontend_side/Frontend/all_movies';
$route['movie_details'] = 'frontend_side/Frontend/movie_details';
$route['save_enquiry'] = 'frontend_side/Frontend/save_enquiry';
$route['saveemail'] = 'frontend_side/Frontend/saveemail';
$route['news_details'] = 'frontend_side/Frontend/news_details';
$route['movie_info'] = 'frontend_side/Frontend/movie_info';


/** admin side **/
$route['dashboard'] = 'admin_dashboard/admin_dashboards';

$route['login'] = 'admin/admin/index';

$route['profileview'] = 'admin/admin/profile_view';

$route['edit_profile'] = 'admin/admin/profile_update';

$route['admin_update_pass'] = 'admin/admin/password_update';

$route['update-phone'] = 'admin/admin/phone_update';

$route['forgetpassword_page'] = 'admin/admin/forgetpassword';

$route['forgotpassword'] = 'admin/admin/checkemail';

$route['logout'] = 'admin/admin/logout';

//Admin Member 

$route['members'] = 'members/Members';
$route['add_member'] = 'members/Members/add_member';




/* END HERE */

$route['404_override'] = '';

$route['translate_uri_dashes'] = false;

