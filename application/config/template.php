<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


$template['active_template']='login';



//template 1

$template['login']['template']='login';

$template['login']['regions']=array('title');

$template['login']['parser']='parser';

$template['login']['parser_method']='parse';

$template['login']['parse_template']=FALSE;

//template 1

$template['forgetpassword']['template']='forgetpassword';

$template['forgetpassword']['regions']=array('title');

$template['forgetpassword']['parser']='parser';

$template['forgetpassword']['parser_method']='parse';

$template['forgetpassword']['parse_template']=FALSE;




//template 4 Dashboard

$template['dashboard']['template']='dashboard';

$template['dashboard']['regions']=array(

 'header',

 'title',

 'menu',
 
 'leftmenu',

 'latest',

 'dash_menu',

 'content',

 'footer',

);

$template['dashboard']['parser']='parser';

$template['dashboard']['parser_method']='parse';

$template['dashboard']['parse_template']=FALSE;


/* Front view */

$template['dashboardtemp']['template']='dashboardtemp';

$template['dashboardtemp']['regions']=array(

 'header',

 'title',

 'menu',
 
 

 'latest',

 'dash_menu',

 'content',

 'footer',

);

$template['livemaptemp']['parser']='parser';

$template['livemaptemp']['parser_method']='parse';

$template['livemaptemp']['parse_template']=FALSE;



?>