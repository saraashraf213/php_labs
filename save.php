<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : "None";
    $department = $_POST['department'];

    
    echo "<h2>Review</h2>";
    echo "Thanks $gender $fname $lname <br><br>";
    echo "Please Review Your Information:<br>";
    echo "Name: $fname $lname<br>";
    echo "Address: $address<br>";
    echo "Your Skills: $skills<br>";
    echo "Department: $department<br>";
    echo "Country: $country<br>";

}
?>
