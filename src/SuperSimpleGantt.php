<?php


class SuperSimpleGantt
{

    public $res = array();
    public $act = array();
    public $days = array();
    public $tpl = null;

    /**
     * @param $resources : associative array with two fields
     *                    id = unique key of the resource
     *                    label = Description of the resource
     */
    public function setResources($resources)
    {

        $this->res = $resources;
        $this->tpl->assign("resources", $this->res);

    }

    /**
     * @param $activities : associative array with six fields
     *                     id_resource = id of the resource to which th activity is connected
     *                     start_date = starting date and hour of the activity
     *                     end_date = ending date and hour of the activity
     *                     description = description of the activity
     *                     url = url for an deepening page
     *                     json = json string with related activity information
     */
    public function setActivities($activities)
    {

        foreach ($activities as &$a) {

            $a['start'] = new DateTime($a['start_date']);
            $a['start']->format('Y-m-d H:i:s');

            $a['end'] = new DateTime($a['end_date']);
            $a['end']->format('Y-m-d H:i:s');

        }

        $this->act = $activities;
        $this->tpl->assign("activities", $this->act);
    }

    /*
     * @param $start: starting date for the gantt chart
     * @param $end: ending date for the gantt chart
     * @param $cadence: cadence with which display the gantt chart
     */
    public function render($start, $end, $interval)
    {

        if (!($this->res) || !($this->act)) {

            echo 'No Resources or Activities';
            return false;

        }

        $start = new DateTime($start);
        $end = new DateTime($end);
        $interval = new DateInterval($interval);
        $period = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {

            array_push($this->days, $dt->format("Y-m-d H:i:s"));

        }
        $this->tpl->assign("days", $this->days);

    }

    public function __construct(smarty $tpl)
    {

        $this->tpl = $tpl;

    }

}
