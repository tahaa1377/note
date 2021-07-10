<?php

class Render{

    public static function ren($filepath,$params){

        ob_start();
        extract($params);
        require_once ($filepath);
        $theme=ob_get_clean();

        require_once ('mvc/view/theme.php');

    }

}