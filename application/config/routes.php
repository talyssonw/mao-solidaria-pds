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

$route['default_controller'] = 'appEntidadeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//usuarios
$route['login-admin'] = 'usuariosController/loginPainelAdministrativo';
$route['painel-admin'] = 'usuariosController/verifLoginAdmin';
$route['user-register-form'] = 'usuariosController/user_register_form';
$route['select-register-type-form'] = 'usuariosController/select_register_type_form';
$route['participation-accept-obj/(:num)/(:num)'] = 'usuariosController/confirm_register_event/$1/$2';
$route['user-request-part-obj/(:num)/(:num)/(:num)'] = 'usuariosController/user_request_event/$1/$2/$3';
$route['delete-user-participation/(:num)/(:num)'] = 'usuariosController/user_delete_part/$1/$2';
$route['user-project-list/(:num)'] = 'UsuariosController/user_project_list_form/$1';

//entidades
$route['main-page'] = 'appEntidadeController/callMainPage';
$route['entidade-login'] = 'appEntidadeController/verifLoginEnt';
$route['entidade-register-form'] = 'appEntidadeController/cadEntidade';
$route['entidade-register-event'] = 'appEntidadeController/cadEntidadeApp';
$route['login'] = 'appEntidadeController/loginEntidade';
$route['nome-entidade/(:num)'] = 'appEntidadeController/get_ent_name_by_id/$1';
$route['entidade-admin-page'] = 'appEntidadeController/callEntMainPage';
$route['entidade-edit-profile/(:num)'] = 'appEntidadeController/call_profile_entidade/$1';
$route['entidade-update-profile/(:num)'] = 'appEntidadeController/update_profile/$1';
$route['entidade-password-forgot-email'] = 'appEntidadeController/send_email_forgot_password';
$route['entidade-password-change-form'] = 'appEntidadeController/change_password_form';
$route['entidade-password-change-event'] = 'appEntidadeController/change_password_event';
$route['entidade-user-project-request/(:num)'] = 'appEntidadeController/entidade_obj_display_form/$1';

//projetos
$route['add-project'] = 'projetosController/callCadProj';
$route['project-create'] = 'projetosController/insertProject';
$route['projetos'] = 'appEntidadeController/call_search_proj_mainpage';
$route['project-list/(:num)'] = 'projetosController/callProjList/$1';
$route['finish-proj/(:num)'] = 'projetosController/finish_proj/$1';
$route['project-edit-form/(:num)'] = 'projetosController/call_edit_project_form/$1';
$route['project-edit-event/(:num)'] = 'projetosController/edit_project/$1';
$route['project-page-form/(:num)(:num)'] = 'projetosController/call_project_page_form/$1/$2';
//objetivos
$route['finish-obj/(:num)'] = 'objetivosController/finish_obj/$1';
$route['unfinish-obj/(:num)'] = 'objetivosController/unfinish_obj/$1';



