<?php
//Current URI
$url = $_SERVER['REQUEST_URI'];
$url = substr_replace($url, '', 0, 1);
$params = array();
$breadcrumb = '';
//Add start page

//$_POST
if(!empty($_POST)) $params = array_merge($params, (ini_get('magic_quotes_gpc') == 1 ? stripSlashesDeep($_POST) : $_POST));
//$_GET
if(!empty($_GET)) $params = array_merge($params, (ini_get('magic_quotes_gpc') == 1 ? stripSlashesDeep($_GET) : $_GET));
//$_FILES
if(!empty($_FILES)) $params = array_merge($params, (ini_get('magic_quotes_gpc') == 1 ? stripSlashesDeep($_FILES) : $_FILES));


//Remove ?elements
$url = str_replace('?'.$_SERVER['QUERY_STRING'], '', $url);
$foundRoute = false;
$page = null;

include_once 'routing.php';

foreach($routes as $route)
{
    if(@preg_match($route['alias'], $url, $matches))
    {
        $params = array_merge($params, $matches);
        $layout = $route['layout'];
        $folder = $route['folder'];
        $page   = $route['file'];
        $foundRoute = true;
        break;
    }
}

//Set breadcrumb
$url_tmp = explode('/', $url);

$u = '';
if(!empty($url_tmp))
{
    $breadcrumb .= '<ul>';
    //Add root
    $breadcrumb .= '<li><a href="/">pocetna</a></li>';
    $i = count($url_tmp);
    foreach ($url_tmp as $tmp)
    {
        $u .= '/'.$tmp;
        if($i > 1) $breadcrumb .= '<li><a href="'.$u.'">'.$tmp.'</a></li>';
        else $breadcrumb .= '<li>'.$tmp.'</li>';
        $i--;
    }
    $breadcrumb .= '</ul>';
}

//If there is no route founded
if(!$foundRoute){
    //This should be reported!!!
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/404');
    exit;
}

//Load page
require_once $layout;