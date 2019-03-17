<?php
/**
 * Created by KieuBT.
 * User: KieuBT
 * Date: 3/16/9
 * Time: 11:14 AM
 */

class DB{
    private $link;
    private $_server;
    private $_user;
    private $_password;
    private $_dbname;


    /**
     * DB Class's constructor
     * @global type $config
     */
    function __construct() {

        $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/config/giraffe-face.ini");
        $this->_server = $ini["dbserver"];
        $this->_user = $ini["dbuser"];
        $this->_password = $ini["dbpassword"];
        $this->_dbname = $ini["dbname"];
        $this->link = mysqli_connect($this->_server, $this->_user, $this->_password, $this->_dbname) or die("Can't connect");
        mysqli_query($this->link, 'SET NAMES utf8');

    }


    /**
     * Execute a query
     * @param string $query
     * @return result of execute
     */
    public function db_query($query){
        $result = mysqli_query($this->link, $query);
        $this->close();
        return $result;
    }

    /**
     * Fetch row
     * @param resource $result
     * @return boolean
     */
    public function db_fetch($result){
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    public function escape($query) {
        return mysqli_real_escape_string($this->_conn, $query);
    }
    public function close(){
        $this->link->close();
    }
}