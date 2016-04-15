<?php

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 14/04/2016
 * Time: 16:00
 */


require ('Gantt.php');
include ('HourlyActivities.php');
include('HourlyResources.php');

require_once ('../vendor/autoload.php');

$tpl = new Smarty();

$gantt = new Gantt($tpl);
$gantt->setResources($resources);
$gantt->setActivities($activities);
$gantt->render('2016-04-05','2016-04-06','PT1H');


$tpl->display("../templates/gantt.tpl");