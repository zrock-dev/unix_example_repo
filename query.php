<?php
// Connect to the database
$servername = "3306";
$username = "user_1";
$password = "password";
$dbname = "user_1_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute SQL query
$sql = "SELECT * FROM your_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ip_address: " . $row["ip_address"]. " - flight_number: " . $row["flight_number"]. " " . $row["departure_airport_code"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
