<?php
    class Student{
        //properties (we need to define variables public when we want to access them outside the class , by default private)
        public $name;
        var $class;

        // methods (by default public)
        function setData($name,$class){
            $this->name=$name;
            $this->class=$class;
        }
        function showData(){
            echo '<br>i am '.$this->name.' and study in '.$this->class.' class.<br>'; // always use this
        }
        function getName(){
            return $this->name;
        }
        function getClass(){
            return $this->class;
        }
    }

    // object creation and variable or method calling 
    $Student1=new Student();
    $Student1->name="mohan";
    $Student1->class="7th";

    $Student2=new Student();
    $Student2->name="rajesh";
    $Student2->class="8th";
    
    $Student1->showData();
    $Student2->showData();


    $Student3=new Student();
    $Student3->setData("gopal","7th");

    $Student4=new Student();
    $Student4->setData("joker","6th");

    $Student3->showData();
    $Student4->showData();

    $Student5=new Student();
    $Student5->setData("aman","6th");
    echo '<br>i am '.$Student5->getName().' and study in '.$Student5->getClass().' class.<br>';
?>
