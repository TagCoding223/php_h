<?php
    
    $sever="localhost";
    $username="root";
    $password="";
    $database="newphp";

    // Create connection
    $con=new mysqli($sever,$username,$password,$database);

    // check connection
    if(!$con){
        die("Connection fail ,".mysqli_connect_error());
    }

    $sql="INSERT INTO `new_table`(`name`,`dest`,`phone_no`) VALUES(?,?,?)";
    
    // prepare and bind
    $stmt= $con->prepare($sql);
    $stmt->bind_param("ssi",$name,$dest,$phone);

    // set parameters and execute
    $name="ganesh";
    $dest="rookee";
    $phone=78342348;
    $stmt->execute();

    $name="rakesh";
    $dest="delhi";
    $phone=7883728;
    $stmt->execute();

    echo "New records created successfully";

    $stmt->close();
    $con->close();

//     Code lines to explain from the example above:

// "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)"
// In our SQL, we insert a question mark (?) where we want to substitute in an integer, string, double or blob value.

// Then, have a look at the bind_param() function:

// $stmt->bind_param("sss", $firstname, $lastname, $email);
// This function binds the parameters to the SQL query and tells the database what the parameters are. The "sss" argument lists the types of data that the parameters are. The s character tells mysql that the parameter is a string.

// The argument may be one of four types:

// i - integer
// d - double
// s - string
// b - BLOB
// We must have one of these for each parameter.

// By telling mysql what type of data to expect, we minimize the risk of SQL injections.

// Note: If we want to insert any data from external sources (like user input), it is very important that the data is sanitized and validated.
?>
