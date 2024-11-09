<html>
    <head>
        <title>Registration Page</title>
    <link rel="stylesheet" href="css/reg-hos.css">
        

    </head>

    <body>
        <div class="main">
            <div class="sub">
                <form action="" method="POST">

                    <div class="lab">
                    <label>Hospital ID    </label>
                    <input  type="text"name="id" />
                    </div>
                    
                    <div class="lab">
                    <label>hospital Name </label>
                    <input type="text"name="name" />
                    </div>
                    
                    <div class="lab">
                    <label>Email </label>
                    <input  type="text"name="email" />
                    </div>
                    
                    <div class="lab">
                    <label>Phone no  </label>
                    <input type="text"name="no" />
                    </div>
                    
                    <div class="lab">
                    <label>Password </label>
                    <input  type="text"name="pass" />
                    </div>
                    
                    <div class="lab">
                    <label>Address </label>
                    <textarea name="adr" ></textarea>
                    </div>
                    
                    <div class="lab">
                    <input type="submit"name="sbt" class="sbt-btn"/>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>


<?php

include('db.php');

if(isset($_POST['sbt']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['no'];
    $pass = $_POST['pass'];
    $address = $_POST['adr'];

    echo"$id.<br/>";
    echo"$name.<br/>";
    echo"$email.<br/>";
    echo"$phno.<br/>";

    echo"$pass";
    echo"$address";

    $i = "INSERT INTO `hospital`(`id`, `name`, `email`, `phno`, `pass`, `address`) VALUES ('$id','$name','$email','$phno','$pass','$address')";
    
    $result = mysqli_query($con,$i);
    if($result)
    {
        echo"<h2>Inserted Succesfully</h2>";
    }else{
       die("<h2>Insertion failed</h2>");
    }

}

?>