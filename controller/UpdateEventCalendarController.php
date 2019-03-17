<?php
/**
 * Created by KieuBT.
 * User: KieuBT
 * Date: 3/16/2019
 * Time: 8:24 PM
 */

$path = "dao/EventModal.php";
require_once "$path";

class UpdateEventCalendarController {
    public $model;

    public function __construct()
    {
        $this->model = new EventModal();

    }

    public function invoke()
    {
        if(!empty($_POST)) {
            if (isset($_POST['id']) && isset($_POST['newStart']) && isset($_POST['newEnd'])) {
                $id = $_POST['id'];
                $start_date = $_POST['newStart'];
                $end_date = $_POST['newEnd'];
                $response = $this->model->editEvent($id, $start_date, $end_date);
                echo $response;
            }
        }
    }
}