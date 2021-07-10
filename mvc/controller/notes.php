<?php

class NotesController{


    public function toggle($id1,$page){

        $email=$_SESSION['email'];
        NotesModel::toggle($email,$id1);

        $count=10;
        $startIndex=($page-1) * $count;
        $email=$_SESSION['email'];

        $data['record']=NotesModel::pageIndex($email,$startIndex,$count);

        $data['Index']=$page;

        ob_start();

        Render::ren("mvc/view/note/homeajax.php",$data);
        $e=ob_get_clean();

       echo json_encode($e);
    }

    public function remove_task($id1,$page){

        $email=$_SESSION['email'];
        NotesModel::remove($email,$id1);

        $count=10;
        $startIndex=($page-1) * $count;
        $email=$_SESSION['email'];

        $data['record']=NotesModel::pageIndex($email,$startIndex,$count);

        $data['Index']=$page;

        ob_start();

        Render::ren("mvc/view/note/homeajax.php",$data);
        $e=ob_get_clean();

        echo json_encode($e);

    }

    public function add_task(){
        if (isset($_POST['title']) && isset($_POST['desc'])){
         $this->task_cheack();
        }else{
            $this->task_form();
        }

    }

    private function task_cheack(){

        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $email=$_SESSION['email'];
        $time= date("Y-m-d H:i:s");

        NotesModel::add_task($title, $desc, $email, $time);

        header("Location: /note/home");

    }

    private function task_form(){

        Render::ren("mvc/view/note/new-task.php",array());
    }

    public function change_page($page){

        $count=10;
        $startIndex=($page-1) * $count;
        $email=$_SESSION['email'];


        $data['record']=NotesModel::pageIndex($email,$startIndex,$count);
        $d=NotesModel::catalog($email);
        $i=0;
        foreach ($d as $da){
            $i++;
        }

        $data['Index']=$page;
        $data['count']=ceil($i/10);
        ob_start();
        Render::ren("mvc/view/note/changePageAjax.php",$data);
        $e=ob_get_clean();

        echo json_encode($e);
    }



}