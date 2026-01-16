<?php

// create-password.php - save this in your Laravel root and run it
$username = 'admin'; // CHANGE THIS
$password = 'Password123'; // CHANGE THIS

// Generate bcrypt hash
$hashed = password_hash($password, PASSWORD_BCRYPT);

// Create the line
$line = $username.':'.$hashed;

// Save to file
file_put_contents(__DIR__.'/storage/secure/.htpasswd', $line);

echo "Password file created!\n";
echo "Username: $username\n";
echo "Password: $password\n";
echo 'File saved to: '.__DIR__."/storage/secure/.htpasswd\n";
