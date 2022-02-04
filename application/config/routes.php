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
$route['about'] = 'frontend_side/Frontend/about';
$route['nuclub'] = 'frontend_side/Frontend/nuclub_view';
$route['contactus'] = 'frontend_side/Frontend/contactus';
$route['events'] = 'frontend_side/Frontend/events';
$route['services'] = 'frontend_side/Frontend/services';
$route['service_details'] = 'frontend_side/Frontend/service_details';
$route['joinus'] = 'frontend_side/Frontend/joinus';
$route['user_login'] = 'frontend_side/Frontend/userLogin';
$route['register'] = 'frontend_side/Frontend/user_register';
$route['user_forgotpassword'] = 'frontend_side/Frontend/forgotpassword';
$route['savejoinus'] = 'frontend_side/Frontend/savejoinus';
$route['savecontact'] = 'frontend_side/Frontend/savecontact';
$route['forgotpasswordmail'] = 'frontend_side/Frontend/forgotpasswordmail';
$route['Referral'] = 'frontend_side/Frontend/ref_page';
$route['CheckUser'] = 'frontend_side/Frontend/CheckUser';
$route['payment']= 'frontend_side/Frontend/payment_page';
$route['saveTranscation']= 'frontend_side/Frontend/saveTranscation';
$route['saveUser']= 'frontend_side/Frontend/saveUser';
$route['user_logout'] = 'frontend_side/Frontend/logout';
$route['news_letter_save'] = 'frontend_side/Frontend/saveNewsLetter';

// Member Views

$route['member_dashboard'] = 'member_views/Member';
$route['Referralse'] = 'member_views/Member/Referralsefview';

//Profile

$route['Profile'] = 'member_views/Member/Profile';
$route['EditProfile'] = 'member_views/Member/editProfile';
$route['updateProfile'] = 'member_views/Member/updateProfile';

$route['update_password'] = 'member_views/Member/update_password';
$route['saveRefferData'] = 'member_views/Member/saveRefferData';


//Wallet

$route['Wallet'] = 'member_views/Member/Wallet';



//NU Coins


$route['nucoins'] = 'member_views/Member/nucoins';

//Afiliated Market Products

$route['afiliated'] = 'member_views/Member/afiliated';


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
$route['save_member'] = 'members/Members/save_member';
$route['edit_member'] = 'members/Members/edit_member';
$route['update_member'] = 'members/Members/update_member';
$route['delete_member'] = 'members/Members/delete_member';


//Transcation Details


$route['transcations'] = 'transcations/Transcations';
$route['edit_transcation'] = 'transcations/Transcations/edit_transcation';
$route['updateTranscation'] = 'transcations/Transcations/updateTranscation';
$route['tras_data'] = 'transcations/Transcations/tras_data';

//Join Us

$route['join_us'] = 'joinus/JoinUs';
$route['delete_join_us'] = 'joinus/JoinUs/delete_join_us';

//contact

$route['contact'] = 'contact/Contact';
$route['delete_contact_us'] = 'contact/Contact/delete_contact_us';


//News Letter Subscription

$route['news_letter_subscription'] = 'news_letters/News_letters';
$route['delete_news_letter_sub'] = 'news_letters/News_letters/delete';


/* END HERE */

$route['404_override'] = '';

$route['translate_uri_dashes'] = false;

