<?

class UserController{


    public function logout(){
        session_destroy();
        header("Location: /note/login");

    }


    public function login()
    {

        if (isset($_POST['temail']) && isset($_POST['tpass'])){

            $this->logincheak();

        }else{

            if (isset($_SESSION['email'])){
                $message="you are already register".'<a href="/note/logout">logout</a>';
                require_once ("mvc/view/message/success.php");
                exit;
            }else
            $this->loginform();

        }

    }

    public function register(){

        if(isset($_POST['username']) && isset($_POST['email1']) && isset($_POST['pass1']) && isset($_POST['pass2'])){

            $this->registercheak();

        }else{

            $this->registerform();

        }

    }


    private function registercheak(){
        $user=$_POST['username'];
        $email=$_POST['email1'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $time= date("Y-m-d H:i:s");

        if (strlen($email) == 0){

            $ar['message']=_EMAIL_NOT_EMPTY;
            Render::ren("mvc/view/message/fail.php",$ar);
            exit;
        }

        if (strlen($pass1)==0 || strlen($pass2)==0){

            $ar['message']=_PASS_NOT_EMPTY;
            Render::ren("mvc/view/message/fail.php",$ar);
            exit;
        }

        $result=UserModel::first_element($email);

        if ($result!=null) {

            $ar['message']=_ALREADY_REGISTERD;
            Render::ren("mvc/view/message/fail.php",$ar);
            exit;
        }
        if ($pass1 != $pass2) {

            $ar['message']=_PASS_NOT_MATCH;
            Render::ren("mvc/view/message/fail.php",$ar);
            exit;
        }
        if (strlen($pass1) <= 3) {

            $ar['message']=_WRONG_PASS;
            Render::ren("mvc/view/message/fail.php",$ar);
            exit;
        }
        $hashmap=md5($pass1);
        UserModel::write($user,$email,$hashmap,$time);

        $ar['message']=_successfully_register;
        Render::ren("mvc/view/message/success.php",$ar);
        exit;

    }

    private function loginform()
    {
       Render::ren("mvc/view/user/loginform.php",array());
    }

    private function registerform()
    {
        Render::ren("mvc/view/user/registerform.php",array());    }

    private function logincheak(){

        $email=$_POST['temail'];
        $password=$_POST['tpass'];

        $result=UserModel::first_element($email);

        if ($result==null){
            $ar['message']=_WRONG_EMAIL;
            Render::ren("mvc/view/message/fail.php",$ar);
            exit;
        }else{

            if ($result['password'] != md5($password)){
                $ar['message']=_WRONG_PASS;
                Render::ren("mvc/view/message/fail.php",$ar);
                exit;

            }else{
                $_SESSION['email']=$result['email'];
                $ar['message']=_successfully_LOGIN . $_SESSION['email'];
                Render::ren("mvc/view/message/success.php",$ar);
                exit;
            }

        }

    }

}