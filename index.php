<?php
$insert=false;
if(isset($_POST['name'])){
    //set connection variables
$server="localhost";
$username="root";
$password="";

//create connection
$con=mysqli_connect($server,$username,$password);

//Check for connection sucess
if(!$con){
    die("connection to this database failed due to ".mysqli_connect_error());
}
//echo "success connecting to db"


//collect post variables
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$desc=$_POST['desc'];
$sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age','$gender','$email','$phone','$desc', current_timestamp());";
//echo $sql;


//exceute the query
if($con->query($sql)==true){
    //echo "succesfully inserted";
    //flag for succesful insertion
    $insert=true;
}
else{
    echo "error: $sql <br> $con->error";
}
//close the database connection;
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <img src="clg.jfif" alt="">
    <div class="container">
        
        <h1 >Welcome to RVR & JC US tripform</h1>
        <p>Enter your details to confirm your participation in trip.</p>
        <?php
        if($insert==true){
    echo "<p class='spa'>Thanks for submitting the form.We are happy to see you joining for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="text" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">submit</button>
        
    </form>
    </div>
    <script src="index.js"></script>
   
   
</body>
</html>