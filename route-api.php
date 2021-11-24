<?php
 ini_set("display_errors", "1");
 error_reporting(E_ALL);

require_once './libs/smarty-3.1.39/Router.php';
require_once './Controller/ApiCommentsController.php';
 
$r = new Router();

$r->addRoute("comentarios","GET","ApiCommentsController","getComments");
$r->addRoute("comentarios","POST","ApiCommentsController","insertComment");
$r->addRoute("comentarios/:ID","DELETE","ApiCommentsController","deleteComment");
$r->addRoute("comentarios/:ID","GET","ApiCommentsController","getCommentsByBook");

$r->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
?>