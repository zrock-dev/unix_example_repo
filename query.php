<?php
// port 3306 
$servername = "sql_server";
$username = "user_1";
$password = "password"; 
$dbname = "user_1_db";

// Enable detailed error reporting (development only)
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL); // Report all errors

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection using a dedicated function for better error handling
function check_connection_error($conn) {
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br>");
    die("Error Code: " . $conn->connect_errno); // Include error code
  }
}

check_connection_error($conn); // Call the function to handle connection errors

// Execute SQL query
$sql = "SELECT * FROM flights";
$result = $conn->query($sql);

// Check query execution using a dedicated function for clarity
function check_query_error($result) {
  if (!$result) {
    die("Error executing query: " . $conn->error . "<br>");
  }
}

check_query_error($result); // Call the function to handle query errors

if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr>";
    echo "<th>IP Address</th>";
    echo "<th>Flight Number</th>";
    echo "<th>Departure Airport</th>";
    echo "<th>Arrival Airport</th>";
    echo "<th>Departure Date</th>";
    echo "<th>Arrival Date</th>";
    echo "<th>Departure Time</th>";
    echo "<th>Arrival Time</th>";
    echo "<th>Flight Duration (Hours)</th>";
    echo "<th>Airline</th>";
    echo "<th>Aircraft Type</th>";
  echo "</tr>";

  // Output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
      echo "<td>" . $row["ip_address"] . "</td>";
      echo "<td>" . $row["flight_number"] . "</td>";
      echo "<td>" . $row["departure_airport_code"] . "</td>";
      echo "<td>" . $row["arrival_airport_code"] . "</td>";
      echo "<td>" . $row["departure_date"] . "</td>";
      echo "<td>" . $row["arrival_date"] . "</td>";
      echo "<td>" . $row["departure_time"] . "</td>";
      echo "<td>" . $row["arrival_time"] . "</td>";
      echo "<td>" . $row["flight_duration_hours"] . "</td>";
      echo "<td>" . $row["airline_name"] . "</td>";
      echo "<td>" . $row["aircraft_type"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

// Close connection
$conn->close();
?>

