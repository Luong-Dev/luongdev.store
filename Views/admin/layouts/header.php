<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./resources/icons/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./resources/css/base/validate.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="./resources/js/main.js"></script>
</head>

<body>
    <div class="container-fluid mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php?act=admin">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=admin_product_categories">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=admin_products">Hàng hóa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=admin_accounts">Tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=admin_orders">Bán hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=admin_comments">Bình luận</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.php?act=statistical_products_for_category">Thống kê</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <span class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Thống kê
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php?act=statistical_products_for_category">Hàng hóa theo loại</a></li>
                                <li><a class="dropdown-item" href="index.php?act=statistical_number_order_sold">Đơn hàng theo tháng</a></li>
                                <!-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?act=">Trang khách hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>