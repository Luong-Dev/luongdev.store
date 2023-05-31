<?php
// include_once "./Models/Comment.php";

function commentControl()
{
    if (isset($_REQUEST['productId']) && $_REQUEST['productId']) {
        $productId = $_REQUEST['productId'];
    }
    if (isset($_POST['id']) && $_POST['id']) {
        $productId = $_POST['id'];
    }

    echo $productId;

    session_start();
}
