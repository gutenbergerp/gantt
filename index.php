<?php 

include ('Gantt.php');
include ('activities.php');
include('resources.php');
require ("C:/xampp/smarty/libs/Smarty.class.php");


$tpl = new smarty();

$gantt = new Gantt($tpl);
$gantt->setResources($resources);
$gantt->setActivities($activities);
$gantt->render('2016-04-01','2016/04/11','P1D');


$tpl->display("C:/xampp/htdocs/files/gantt/templates/gantt.tpl");