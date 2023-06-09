<?php
include_once "./Models/Db.php";

// Admin
function getAccounts()
{
    $sql = "SELECT * FROM `users` WHERE 1";

    return pdo_query($sql);
}

function getAccount($id)
{
    $sql = "SELECT * FROM `users` WHERE id = ?";

    return pdo_query_one($sql, $id);
}

function deleteAccount($id)
{
    $sql = "DELETE FROM `users` WHERE id = ?";
    pdo_execute($sql, $id);
}

function postAccount($name, $avatar, $phoneNumber, $email, $password, $role, $status, $createdAt)
{
    $sql = "INSERT INTO `users`(`name`, `avatar`, `phone_number`, `email`, `password`, `role`, `status`, `created_at`) VALUES (?,?,?,?,?,?,?,?)";

    return  pdo_execute($sql, $name, $avatar, $phoneNumber, $email, $password, $role, $status, $createdAt);
}

function putAccount($phoneNumber, $email, $role, $status, $id)
{
    $sql = "UPDATE `users` SET `phone_number`=? , `email`=? , `role`=? ,`status`=? WHERE id = ?";

    pdo_execute($sql, $phoneNumber, $email, $role, $status, $id);
}

// user
function postUser($name, $email, $phoneNumber, $password, $role = 1)
{
    $sql = "INSERT INTO `users`(`name`,`email`, `phone_number`, `password`, `role`)
     VALUES ('$name','$email','$phoneNumber','$password',$role)";

    return  pdo_execute($sql);
}

function putUser($name, $avatar, $phoneNumber, $email, $address, $id)
{
    // $sql = "UPDATE `users` SET `name`=? ,`avatar`=? ,`phone_number`=? , `email`=? , `address`=? WHERE id = ?";
    $sql = "UPDATE `users` SET `name`=? ,`avatar`= IF(? <> '', ?, `avatar`) ,`phone_number`=? , `email`=? , `address`=? WHERE id = ?";

    pdo_execute($sql, $name, $avatar, $avatar, $phoneNumber, $email, $address, $id);
}

function putPasswordUser($password, $id)
{
    $sql = "UPDATE `users` SET `password`=? WHERE id = ?";

    pdo_execute($sql, $password, $id);
}

function getUserWithEmail($email)
{
    $sql = "SELECT * FROM `users` WHERE email = ?";

    return  pdo_query_one($sql, $email);
}

function getUserWithEmailPassword($email, $password)
{
    $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";

    return  pdo_query_one($sql, $email, $password);
}
