<?
global $taha;
$taha['localhost']='localhost';
$taha['username']='root';
$taha['password']='';
$taha['dbname']='node_db';

$taha['language']='p';

$taha['domain']=array(
    '/login/' =>'user/login',
    '/register/' =>'user/register',
    '/home/' =>'home/home',
    '/logout/' =>'user/logout',
    '/add_task/' =>'notes/add_task',
    '/toggle/' =>'notes/toggle',
    '/remove_task/' =>'notes/remove_task',
//    '/change_page/\(.*\)/' =>'notes/change_page/$1',

);