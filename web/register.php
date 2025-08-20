<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Check if the username already exists in the database
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Username already exists
    echo "Username already exists";
} else {
    // Username is available, proceed to register
    $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    mysqli_query($conn, $query);
    echo "Registration successful";
}
?>
>