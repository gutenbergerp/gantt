<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 06/04/2016
 * Time: 11:50
**/


class SuperSimpleGantt
{

    public $res = array();
    public $act = array();
    public $days = array();
    public $tpl = null;

    /**
     * @param $resources: associative array with two fields
     *                    id = unique key of the resource
     *                    label = Description of the resource
     */
    public function setResources($resources)
    {

        $this->res = $resources;
        $this->tpl->assign("resources",$this->res);

    }

    /**
     * @param $activities: associative array with six fields
     *                     id_resource = id of the resource to which th activity is connected
     *                     start_date = starting date and hour of the activity
     *                     end_date = ending date and hour of the activity
     *                     description = description of the activity
     *                     url = url for an deepening page
     *                     json = json string with related activity information
     */
    public function setActivities($activities)
    {
		
		foreach ($activities as &$a){

			$a['start'] = new DateTime($a['Data_Posizione']);
			$a['start']->format('Y-m-d H:i:s');

			$a['end'] = new DateTime($a['Fine_Prevista']);
			$a['end']->format('Y-m-d H:i:s');
			
		}

	    $this->act = $activities;
        $this->tpl->assign("activities",$this->act);
    }

    /*
     * @param $start: starting date for the gantt chart
     * @param $end: ending date for the gantt chart
     * @param $cadence: cadence with which display the gantt chart
     */
    public function render($start, $end, $interval)
    {
		
		if (!($this->res) || !($this->act)){
			
			echo 'No Resources or Activities';
			return false;
			
		}

        $start    = new DateTime($start);
        $end      = new DateTime($end);
        $intervals = new DateInterval($interval);
        $period   = new DatePeriod($start, $intervals, $end);
        foreach ($period as $dt) {
            if ($interval[2] == 'D'){

                array_push($this->days,$dt->format("Y-m-d"));

            } else {

                array_push($this->days, $dt->format("Y-m-d H:i:s"));
            }
			
        }
        $this->tpl->assign("interval", $interval);
        $this->tpl->assign("days",$this->days);

    }

    public function __construct(smarty $tpl)
    {

        $this->tpl = $tpl;

    }


}
