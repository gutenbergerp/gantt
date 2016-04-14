<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 14/04/2016
 * Time: 15:41
 */

include('Gantt.php');
include ('DailyActivities.php');
include('DailyResources.php');
require ("C:/xampp/smarty/libs/Smarty.class.php");

//Istance
$tpl = new smarty();

$gantt = new Gantt($tpl);
$gantt->setResources($resources);
$gantt->setActivities($activities);
//From 2016-04-01 to 2016-04-15 with daily cadence
$gantt->render('2016-04-01','2016-04-15','P1D');


$tpl->display("C:/xampp/htdocs/files/gantt/templates/gantt.tpl");