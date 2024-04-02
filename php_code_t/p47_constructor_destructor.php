<?php
    class default_Con{
        function __construct(){
            echo 'hello , i am default constructor. <br>';
        }
    }
    class Student{
        public $name;
        var $subject;// this is public because use var and nit use any other access modifier
        function __construct($name,$subject){
            $this->name=$name;
            $this->subject=$subject;
            echo 'i am parameterize constructor '.$name.' and i like to study '.$subject.'<br>';
        }
        function __destruct(){
            echo $this->name.' obj deleted .<br>';
        }
    }

    $Obj1=new default_Con();

    $Obj2 = new Student("fajer","math");
    $Obj3 = new Student("maynak","science");
    $Obj4 = new Student("yesh","physics");
?>
// destructor call automatically when code end (means after ?> ) and destroy object in LIFO(Last create first delete )