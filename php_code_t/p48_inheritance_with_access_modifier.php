<?php
    class A{
        public $name;// use anywhere with help of object
        protected $salary;// allow inherit but not use outside the class
        private $job_title="android developer";//cannot inherit
        function __construct($name,$salary){
            $this->name=$name;
            $this->salary=$salary;
        }
        function emp_Details(){
            echo '<br>Name : '.$this->name.'<br>Salary : '.$this->salary.'<br>Job : '.$this->job_title.'<br>';
        }
    }

    class B extends A{
        // private $job_title="Web Developer";
        function __construct($name,$salary){
            $this->name=$name;
            $this->salary=$salary;
            $this->job_title="Web Developer";
        }
    }

    $obj1=new A("Abdul",80000);
    $obj2=new B("Deepak",70000);
    $obj1->emp_Details();
    $obj2->emp_Details();
?>