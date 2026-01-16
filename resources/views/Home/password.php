<?php

$password = 'secret';  // put password in here and then run page for the hash.  Put these into the user table in the database.
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
