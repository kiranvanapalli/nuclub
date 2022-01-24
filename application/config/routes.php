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

//Catalog
$route['catalog'] = 'catalog/Catalog';

//Add Movie
// $route['movies'] = 'movies/Movies';
// $route['add_movie'] = 'movies/Movies/add_movie';
// $route['getmoviedetails'] = 'movies/Movies/getmoviedetails';
// $route['edit_movie'] = 'movies/Movies/edit_movie';

//Awards
$route['award'] = 'award/Award';
$route['add_award'] = 'award/Award/add_award';
$route['award_preview'] = 'award/Award/award_preview';
$route['edit_award'] = 'award/Award/edit_award_details';

//Add Upcoming Movies
$route['movies'] = 'movies/Movies';
$route['add_movie'] = 'movies/Movies/add_movie';
$route['movie_details']= 'movies/Movies/movie_details';
$route['edit_movie_details']= 'movies/Movies/edit_movie_details';
$route['movie_cast_details']= 'movies/Movies/movie_cast_details';

//Videos
$route['videos'] = 'video/Video';
$route['add_video'] = 'video/Video/add_video';
$route['save_video'] = 'video/Video/save_video';
$route['video_preview'] = 'video/Video/video_preview';
$route['edit_video_details'] = 'video/Video/edit_video_details';
$route['update_video_details'] = 'video/Video/update_video_details';
$route['delete_video'] = 'video/Video/delete_video';

//Enquiry
$route['enquiry'] = 'enquiry/Enquiry';

//News
$route['news'] = 'news/News';
$route['add_news'] = 'news/News/add_news';
$route['news_view'] = 'news/News/news_view';
$route['add_news_details'] = 'news/News/add_news_details';
$route['edit_news'] = 'news/News/edit_news';
$route['update_news'] = 'news/News/update_news';
$route['delete_resent_news'] = 'news/News/delete_recent_news';

//News Letter
$route['news_letter'] = 'news_letter/News_letter';

//Review
$route['review'] = 'review/Review';


//Cast & Crew

$route['cast_crew'] = 'cast_crew/Cast_crew';
$route['add_cast_crew'] = 'cast_crew/Cast_crew/add_cast_crew';
$route['cast_crew_details'] = 'cast_crew/Cast_crew/cast_crew_details';
$route['edit_cast_crew_details'] = 'cast_crew/Cast_crew/edit_cast_crew_details';

//Gallery

$route['gallery'] = 'gallery/Gallery';
$route['add_gallery'] = 'gallery/Gallery/add_gallery';
$route['gallery_details'] = 'gallery/Gallery/gallery_details';
$route['edit_gallery_details'] = 'gallery/Gallery/edit_gallery_details';

//Behind the Screen

$route['behind_screen'] = 'behind_the_screen/Behind_the_screen';
$route['add_behind_screen'] = 'behind_the_screen/Behind_the_screen/add_behind_screen';
$route['behind_screen_details'] = 'behind_the_screen/Behind_the_screen/behind_screen_details';
$route['edit_behind_screen_details'] = 'behind_the_screen/Behind_the_screen/edit_behind_screen_details';

//Wallpapers

$route['wallpapers'] = 'wallpapers/Wallpapers';
$route['add_wallpaper'] = 'wallpapers/Wallpapers/add_wallpaper';
$route['wallpaper_details'] = 'wallpapers/Wallpapers/wallpaper_details';
$route['edit_wallpaper_details'] = 'wallpapers/Wallpapers/edit_wallpaper_details';


/* END HERE */

$route['404_override'] = '';

$route['translate_uri_dashes'] = false;

