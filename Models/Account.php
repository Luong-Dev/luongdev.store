<?php
include_once "./Models/Db.php";

// Admin
function getAccounts()
{
    $sql = "SELECT * FROM `users` WHERE 1";

    return pdo_query($sql);
}



// user
function postUser($name, $email, $phoneNumber, $password, $role = 3)
{
    $sql = "INSERT INTO `users`(`name`,`email`, `phone_number`, `password`, `role`)
     VALUES ('$name','$email','$phoneNumber','$password',$role)";

    return  pdo_execute($sql);
}

function checkAuthUser($email)
{
    $sql = "SELECT * FROM `users` WHERE email = '$email'";
    return  pdo_query_one($sql);
}
