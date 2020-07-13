<?php
$insert = false;
$not_insert = false;
if(isset($_POST['fullname']))
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "clg_db";


    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con) {
       die ("Connection can't be established with db" . mysqli_connect_error());
    }

    $fullname = $_POST['fullname'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $other = $_POST['other'];
    $sql = "INSERT INTO student_details (fullname, age, sex, email, contact, other) VALUES ('$fullname', $age, '$sex', '$email', $contact, '$other')";

    if(mysqli_query($con, $sql))
    {
        $insert = true;
    }
    else{
        $not_insert = true;
        echo "Error : $sql <br> $con->error";
        exit();
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class ="img" src="./img/university1.jpg" alt="College">
    <div class="container">
        <h1>Welcome To The College Database Form</h1>
        <p>Enter your details and submit this form to register your name in database</p>
        <?php
        if($insert == true) {
        echo "<p class='submitMsg'>Thanks for submitting your details.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input required type="text" name="fullname" id="fullname" placeholder="Enter your name">
            <input type="age" name = "age" id="age" placeholder="Enter your age">
            <input type="text" name = "sex" id="sex" placeholder="Enter your gender"> 
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="contact" name="contact" id="contact" placeholder="Enter your contact number">  
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Description"></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
  <script src="index.js"></script>

</body>
</html>  