<?php
/**
 * Created by KieuBT.
 * User: KieuBT
 * Date: 3/16/2019
 * Time: 8:04 PM
 */
$path = "dao/EventModal.php";

require_once "$path";

class ViewEventCalendarController {
    public $model;

    public function __construct()
    {
        $this->model = new EventModal();
    }

    public function invoke()
    {
        $eventList  = $this->model-> getEventList();
        header('Content-Type: application/json');
        echo json_encode($eventList);
    }

}