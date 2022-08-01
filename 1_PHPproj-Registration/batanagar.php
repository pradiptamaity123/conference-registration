
<?php
$insert = false;
if(isset($_POST['name'])){
//Set connection variables
$server = "localhost";
$username = "root";
$password = "";

//Create database connection
$con = mysqli_connect($server, $username, $password);

//Check for connection success
if(!$con)
die("connetion to this database failed due to" . 
mysqli_connect_error());
//echo "Success connecting to the dB";

//Collect POST variables
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql= "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

//Execute the querry
if($con->query($sql)==true){
    // echo "successfully inserted";
    
    //Flag for successful insertion
    $insert = true;
}

else{
    echo "Error: $sql";
}

//Colse the database connection
$con->close();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <title>Welcome to Techno India Batanagar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img class= "bg" src="tib.jpg" alt="Techno Batanagar" srcset="">

    <div class="container">
        <h1>Welcome To Techno International Batanagar Home Page</h1>
        <h1>IEEE Conference Meet-2022</h1>
        <p>Enter your details to confirm your perticipation in the Conference </p>

        <?php
        
        if($insert == true){
        echo "<p class='submitMsg'>Thank you for your registration. We are happy to see you joining in the Conference</p>";
      }

        ?>
        
        <form action="batanagar.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone no">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">Submit</button>
        

         </form>


    </div>

    <!-- <script src="index.js"></script> -->


</body>
</html>