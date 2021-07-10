<?php

class NotesModel{

    public static function add_task($title, $desc, $email, $time){

        $req=new Db();
        $req->write("INSERT INTO `t_note`(`note_title`, `note_desc`, `note_email_user`, `note_time`, `isDone`)
                  VALUES ('$title','$desc','$email','$time',0)");
    }

    public static function remove($email,$id){
        $request=new Db();
        $request->write("DELETE FROM `t_note` WHERE `note_email_user`='$email' and `note_id`='$id'");
    }

    public static function catalog($email)
    {
        $result = new Db();
        $record = $result->read("select * from `t_note` where note_email_user='$email'");
        return $record;
    }

    public static function toggle($email, $id)
    {
        $request=new Db();
        $request->write("UPDATE `t_note` SET `isDone`=NOT isDone WHERE `note_email_user`='$email' and `note_id`='$id'");
    }

    public static function pageIndex($email,$startIndex,$count){
        $result = new Db();
        $record = $result->read("select * from `t_note` where note_email_user='$email' LIMIT $startIndex,$count");
        return $record;
    }

    public static function count($email){
        $result = new Db();
       $re= $result->read("select count(*) from t_note where `note_email_user`='$email'");
        return $re;
    }

}