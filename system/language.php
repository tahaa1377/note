<?

global $taha;

$vari=$taha['language'];
if ($vari == 'fa'){

    define("_EMAIL","ایمیل");
    define("_PASSWORD","رمز");
    define("_SUBMIT","تایید");
    define("_CREAT_NEW_ACCOUNT","درست کردن حساب جدید");
    define("_PASS_NOT_EMPTY","رمز نباید خالی باشد");
    define("_ALREADY_REGISTERD", "شما قبلا ثبت نام کرده اید");
    define("_PASS_NOT_MATCH", "رمز اول و دوم یکی نیستند");
    define("_WEAK_PASS", "رمز شما کوتاه است");
    define("_successfully_register", "ثبت نام با موفقیت انجام شد".'<a href="login.php">ورود</a>');
    define("_WRONG_EMAIL", "ایمیل شما نادرست است");
    define("_WRONG_PASS", "رمز شما نادرست است");
    define("_successfully_LOGIN", "موفق شدی ".$_SESSION['email'].'<a href="home.php">ورود به صفحه ی اصلی</a>');
    define("_EMAIL_NOT_EMPTY", "ایمیل نباید خالی باشد");

}
else {
    define("_EMAIL", "email");
    define("_PASSWORD", "password");
    define("_SUBMIT", "submit");
    define("_CREAT_NEW_ACCOUNT","create new account");
    define("_PASS_NOT_EMPTY","password aren'n empty".'<a href="/note/register">register</a>');
    define("_ALREADY_REGISTERD", "you are already registerd");
    define("_PASS_NOT_MATCH", "pass1 and pass2 aren't match".'<a href="/note/register">register</a>');
    define("_WEAK_PASS", "your password is short".'<a href="/note/register">register</a>');
    define("_successfully_register", "success ".'<a href="/note/login">login</a>');
    define("_WRONG_EMAIL", "your email wrong".'<a href="/note/login">login</a>');
    define("_WRONG_PASS", "your password wrong".'<a href="/note/login">login</a>');
    define("_successfully_LOGIN", "success ".'<a href="/note/home">go to home</a>');
    define("_EMAIL_NOT_EMPTY", "your email not empty".'<a href="/note/register">register</a>');


}