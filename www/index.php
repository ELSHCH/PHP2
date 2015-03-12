<?php
/*
$content ´file_get_contents(__DIR__ . 'test.json' );
$obj =json_decon($content);
echo $obj->foo;
*/
 use \Application\Classes\E404Exception as E404Exception;
$obj =new stdClass();
$obj->title = '';
$obj->text='foo bar baz';
echo json_encode($obj);

//var_dump($_SERVER['REQUEST_URI']); //die;
//var_dump($__GET);
require_once __DIR__ . '/autoload.php';

echo $path = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$pathParts =explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

$controllerClassName = 'Application\\Controllers\\'. $ctrl . 'Controller';
$emessages[] = new E404Exception;
try {
$controller = new $controllerClassName;

$method = 'action' . $act;

    $controller->$method();
}catch (Exception $e) {
    //output error message and exit from code
    $e->getMessage;
    $emessages =new E404Exception();
    $emessages->add($e->getMessage(),$num);
    $emessages->display('errors.php');
}