<?php
/**
 * Created by KieuBT.
 * User: KieuBT
 * Date: 3/16/2019
 * Time: 8:45 PM
 */

$path = "dao/EventModal.php";
require_once "$path";

class DeleteEventCalendarController {
    public $model;

    public function __construct()
    {
        $this->model = new EventModal();

    }

    public function invoke()
    {
        if(!empty($_POST)) {
            if (isset($_POST['id'])) {
                $id =$_POST['id'];
                $response = $this->model->deleteEvent($id);
                echo json_encode("Add event " +$response);
            }
        }
    }
}