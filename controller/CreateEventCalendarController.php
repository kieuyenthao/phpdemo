<?php
/**
 * Created by KieuBT.
 * User: KieuBT
 * Date: 3/16/2019
 * Time: 8:08 PM
 */

$path = "dao/EventModal.php";
require_once "$path";

class CreateEventCalendarController {
    public $model;

    public function __construct()
    {
        $this->model = new EventModal();

    }

    public function invoke()
    {
        if(!empty($_POST)) {
            $name =$_POST['name'];
            $start_date = $_POST['start'];
            $end_date = $_POST['end'];
            $response =$this->model-> addEvent( $name, $start_date, $end_date);
            echo json_encode("Add event " +$response);
        }

    }
}