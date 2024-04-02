<?php
    $sever="localhost";
    $username="root";
    $password="";
    $database="newphp";

    try {
        $con=new PDO("mysql:host=$sever;dbname=$database",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    

        $sql="INSERT INTO `new_table`(`name`,`dest`,`phone_no`) VALUES(:pname,:dest,:phone)";

        $stmt=$con->prepare($sql);
        $stmt->bindParam(':pname',$name);
        $stmt->bindParam(':dest',$dest);
        $stmt->bindParam(':phone',$phone);

        $name="neetin";
        $dest="kolkta";
        $phone=900;
        $stmt->execute();
        echo "insert done.";
    } catch (PDOException $e) {
        die("Connection fail ".$e->getMessage());
    }
    $con=NULL;
?>