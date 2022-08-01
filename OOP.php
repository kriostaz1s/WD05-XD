<?php
//1, 2, 3
class Worker {
    public $name;
    public $age;
    public $salary;
    public function setName($a){
        $this->name = $a;
    }
    public function getName(){
        return $this->name;
    }
    public function setAge($a){
        if ($this->checkAge($a) != 1) {

        }else{
            $this->age = $a;
        };
    }
    public function getAge(){
        return $this->age;
    }
    public function setSalary($a){
        $this->salary = $a;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function checkAge($a){
        if ($a < 1 && $a > 100) {
            return 0;
        }else{
            return 1;
        };
    }
};
$work1 = new Worker();
$work1->name = 'Иван';
$work1->age = 25;
$work1->salary = 1000;
$work2 = new Worker();
$work2->name = 'Вася';
$work2->age = 26;
$work2->salary = 2000;
echo $work1->salary + $work2->salary;
echo "<br/>";
echo $work1->age + $work2->age;
//4
class Worker {
    public $name;
    public $age;
    public $salary;
    public function setSalary($a){
        $this->salary = $a;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }
};
$work3 = new Worker('Дима', 25);
$work3->setSalary(1000);
echo $work3->age * $work3->getSalary();
//5, 6
class User {
    protected $name;
    protected $age;
    public function setName($a){
        $this->name = $a;
    }
    public function getName(){
        return $this->name;
    }
    public function setAge($a){
        $this->age = $a;
    }
    public function getAge(){
        return $this->age;
    }
};
class Worker extends User{
    private $salary;
    public function setSalary($a){
        $this->salary = $a;
    }
    public function getSalary(){
        return $this->salary;
    }
};
$work1 = new Worker();
$work1->name = 'Иван';
$work1->age = 25;
$work1->salary = 1000;
$work2 = new Worker();
$work2->name = 'Вася';
$work2->age = 26;
$work2->salary = 2000;
echo $work1->salary + $work2->salary;
class Student extends Worker{
    private $scholarship;
    private $course ;
    public function setScholarship($a){
        $this->scholarship = $a;
    }
    public function getScholarship(){
        return $this->scholarship;
    }
    public function setCourse($a){
        $this->course = $a;
    }
    public function getCourse(){
        return $this->course;
    }
};
class Driver extends Worker{
    private $experience;
    private $category ;
};
//7
class Form{
    private function array($arr){
        $str = '';
        foreach ($arr as $key => $value) {
            $str = $str . "$key =" . "\"$value\"" . " ";
        }
        return  $str;
    }
    public function input($arr){
        $a = $this->array($arr);
        return "<input $a>";
    }
    public function submit($arr){
        $a = $this->array($arr);
        return "<input $a>";
    }
    public function password($arr){
        $a = $this->array($arr);
        return "<input $a>";
    }
    public function textarea($arr){
        $a = $this->array($arr);
        return "<textarea $a>";
    }
    public function open($arr){
        $a = $this->array($arr);
        return "<form $a>";
    }
    public function close(){
        return "</form>";
    }
  };
//8
class SmartForm extends Form {
    public function input($arr){
        $a = $this->array($arr);
        if(!empty($_POST)){
            $inp = "value=".$_POST['name'];
            $a = $a.$inp;
            return "<input $a>";
        } else {
            return "<input $a>";
        }

    }
    public function password($arr){
        $a = $this->array($arr);
        if(!empty($_POST)){
            $pass = "value=".$_POST['pass'];
            $a = $a.$pass;
            return "<input $a>";
        } else {
            return "<input $a>";
        }

    }
};
//9
class Cookie{
    public function setc($name, $value){
        set($name, $value, time()+3600);
    }
    public function get($name){
        if(isset($_COOKIE[$name])){
            return $_COOKIE[$name];
        }
    }
    public function del($name){
        if(isset($_COOKIE[$name])){
        set($name, "", time()-3600);
    }
    }
};
//10
class Session{
    public function __construct(){
        return session_start();
    }
    public function set($name, $value){
        $_SESSION[$name] = $value;
    }
    public function get($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }
    public function del($name){
        unset($_SESSION[$name]);
    }
    public function check($name){
        return (isset($_SESSION[$name]));
    }
};
//11
class Flash{
    public $session;
    public function __construct(){
        $this->session = new Session;
    }
    public function set($name){
        if (isset($_POST[$name])){
            if (!empty($_POST[$name])){
                $this->session->set($name, $_POST[$name]);
            }
        }
    }
    public function get($name){
            if ($this->session->check($name)){
                $this->session->get($name);               
            }
    }
};