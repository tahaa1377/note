<?php
class HomeController{

    public function home(){
//        $data['record']=NotesModel::pageIndex($_SESSION['email'],0,10);
//        $d=NotesModel::catalog($_SESSION['email']);
//        $i=0;
//        foreach ($d as $da){
//            $i++;
//        }
//
//        $data['Index']=1;
//        $data['count']=ceil($i/10);
        Render::ren("mvc/view/note/home.php",array());
    }

}
