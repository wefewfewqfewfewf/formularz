<?php
$host = "localhost";
$username = "root"; 
$password = "";  
$database = "osoby";  

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $province = $_POST["province"];
    $gender = $_POST["gender"];
    $newsletter = isset($_POST["newsletter"]) ? 1 : 0;

    $sql = "INSERT INTO osoby (imie, nazwisko, data_urodzenia, email, wojewodztwo, plec, zgoda_na_newsletter)
    VALUES ('$firstName', '$lastName', '$dob', '$email', '$province', '$gender', $newsletter)";


    if ($conn->query($sql) === TRUE) {
        echo "Formularz wysłany";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
