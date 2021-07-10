<?php

class Db{

    private $connect;

    public function __construct($q=null)
    {
        if ($q != null){
            $request["localhost"] = $q["localhost"] ;
            $request['username']  = $q['username']  ;
            $request['password']  = $q['password']  ;
            $request['dbname']    = $q['dbname']    ;
        }else {
            global $taha;
            $request["localhost"] = $taha['localhost'];
            $request['username']  = $taha['username'];
            $request['password']  = $taha['password'];
            $request['dbname']    = $taha['dbname'];
        }
        $this->connect=new mysqli($request['localhost'],$request['username'],$request['password'],$request['dbname']);
        if ($this->connect->connect_error){
            echo $this->connect->connect_error;
            exit;
        }
        $this->connect->query("SET NAMES 'utf8'");
    }

    public function read($q){
        $records=$this->connect->query($q);

        if ($records == null){
            return null;
        }
        $record=array();
        while ($row=$records->fetch_assoc()){
            $record[]=$row;
        }
        return $record;
    }

    public function write($q){
        $this->connect->query($q);
    }

    public function first($q){
        $record=$this->read($q);
        if ($record == null){
            return null;
        }
        return $record[0];
    }
}