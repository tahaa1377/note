<?php

class UserModel{

    public static function first_element($email){

        $db=new Db();
        $result=$db->first("select * from `t_user` where email='$email'");

        return $result;
    }

    public static function write($user,$email,$hashmap,$time){
        $db=new Db();
        $db->write("INSERT INTO `t_user`(`username`, `email`, `password`,`registertime`)
                                          VALUES ('$user','$email', '$hashmap','$time')");

    }


}