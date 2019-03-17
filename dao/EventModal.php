<?php
/**
 * Created by KieuBT.
 * User: KieuBT
 * Date: 10/27/2018
 * Time: 3:05 PM
 */

$path = "dao/db.php";
require_once "$path";
//include_once("dao/db.php");

class Event {}
class EventModal extends DB {
    private $properties  = array(
        "id" => "",
        "name" => "",
        "start" => "",
        "end" => "",
        "status" => "");

    public function __construct($data = array()){
        parent::__construct();

        if (!empty($data)){
            foreach ( $data as $key => $value ){
                if(isset($this ->properties[$key])){
                    $this->properties[$key] = $value;
                }
            }
        }
    }
    public function getEventList()
    {

        $query = "SELECT * FROM events";
        $result = $this->db_query($query);
        $eventList = array();
        $i = 0;
        while($row = $this->db_fetch($result)){
            $e = new Event();
            $e->id = $row['id'];
            $e->text = $row['name'];
            $e->start = $row['start'];
            $e->end = $row['end'];
            $e->resource = $row['status'];
            $eventList[$i++] = $e;
        }
        return $eventList;
    }

    public function addEvent( $event_nm, $start_date, $end_date){
        $query = "INSERT INTO events (name, start, end) VALUES ('$event_nm','$start_date','$end_date')";
        print_r($query);
        $result = $this->db_query($query);
        return $result;
    }
    public function editEvent($event_id, $start_date, $end_date){
        $query = "UPDATE events SET start='$start_date',end='$end_date' WHERE id = '$event_id'";
        $result = $this->db_query($query);
        return $result;
    }
    public function deleteEvent($event_id){
        $query = "DELETE FROM events WHERE id='$event_id'";
        $result = $this->db_query($query);
        return $result;
    }

}