<?php 

include ('Gantt.php');
include ('activities.php');
include('resources.php');
require 'vendor/autoload.php';

$tpl = new Smarty();

$gantt = new Gantt($tpl);
$gantt->setResources($resources);
$gantt->setActivities($activities);


$tpl->display("./templates/Date_form.tpl");


if (!(empty($_POST['from'])) && !(empty($_POST['to']))  && !(empty($_POST['duration']))) {

    switch ($_POST['interval']){
        case 'D':
            $interval = 'P'.$_POST['duration'].'D';
            break;
        case 'H':
            $interval = 'PT'.$_POST['duration'].'H';
            break;
        default:
            $interval = 'P'.$_POST['duration'].'W';
    }

    $gantt->render($_POST['from'],$_POST['to'],$interval);
    $tpl->display("./templates/gantt.tpl");

} else {

    echo '<h3>FILL ALL FORM\'S FIELDS!</h3>';

}
