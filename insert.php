<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['save_date']))

{
    
    $date = date('Y-m-d', strtotime($_POST['date']));
   

    
    $checkQuery = "SELECT * FROM my WHERE date = '$date'"; 
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        
        echo "<script>alert('Date already exists!'); window.location.href='search.html';</script>";
    } else {
        
        $insertQuery = "INSERT INTO my ( date) VALUES ( '$date')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Insert successful!'); window.location.href='searchbar.html';</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
