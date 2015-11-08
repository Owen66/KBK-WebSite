<?php

namespace kbk;


class Database
{
    private $username = "root";
    private $password = "";
    private $host = 'localhost';
    private $db = "KBK";
    private $connection;

    function connect() {
        $this->connection =  mysqli_connect($this->host, $this->username, $this->password, $this->db);
    }

    function query($sql) {
        $this->connect();
        $result = mysqli_query($this->connection, $sql);
        $records = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $records[] = $row;
        }
        $this->close();
        return $records;
    }

    function close() {
        mysqli_close($this->connection);
    }
}