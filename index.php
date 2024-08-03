<?php

// Initialize submission status
$submitted = false;
    if (isset($_POST['name'])) {
        $server = "localhost";
        $username = "root";
        $password = "root";
        
        $con = mysqli_connect($server, $username, $password);

        if (!$con) {
            die("Connection Failed due to " . mysqli_connect_error());
        }

        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
                VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        if ($con->query($sql) === true) {
            $submitted = true;
        } else {
            echo "Error: $sql <br> $con->error";
        }

        $con->close();
    }

// Check and clear the session variable
if (isset($_SESSION['submitted'])) {
    $submitted = $_SESSION['submitted'];
    unset($_SESSION['submitted']); // Clear the session variable
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to IEM Singapore Trip form</h1>
            <p>Enter your details and submit this form to confirm your participation in the trip</p>
            <p class="submitmsg">Thanks for submitting your form.We are happy to see you joinign us for the Sinagpore Trip</p>
        <form action="index.php" class="method">
            <input type="text" name="name" id="name" placeholder="Enter your name:">
            <input type="text" name="age" id="age" placeholder="Enter your age:">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender:">
            <input type="email" name="email" id="email" placeholder="Enter your email:">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone:">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`SNO`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '23', 'male', 'this@this.com', '9999999999', 'this is my first ever php my admin message.', current_timestamp()); -->
</body>
</html>
