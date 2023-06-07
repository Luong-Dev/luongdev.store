<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Trang chủ nhớ sửa</title>
    <script src="https://kit.fontawesome.com/3bb14b2296.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="./resources/icons/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./resources/css/user/base.css">
    <link rel="stylesheet" href="./resources/css/user/header-footer.css">
    <link rel="stylesheet" href="./resources/css/user/home-page.css">
    <link rel="stylesheet" href="./resources/css/user/breadcrumb.css">
    <link rel="stylesheet" href="./resources/css/user/product.css">
    <link rel="stylesheet" href="./resources/css/user/product-detail.css">
    <link rel="stylesheet" href="./resources/css/user/cart.css">
    <link rel="stylesheet" href="./resources/css/user/account.css">

</head>

<body>
    <header id="header" class="grid-wide header">
        <a href="" class="header__logo-wrap">
            <img class="header__logo" src="./resources/uploads/images/logo/logo.png" alt="logo">
        </a>

        <!-- header center -->
        <div class="header__center">
            <div class="menu-top">
                <div class="menu-hotline">
                    <i class="menu-hotline__icon fa-solid fa-phone"></i>
                    <span class="menu-hotline__tittle">
                        Hotline:
                    </span>
                    <a href="tel:19000000" class="menu-hotline__phone">1900 0000</a>
                </div>
                <div class="menu-location">
                    <i class="menu-location__icon ti-location-pin"></i>
                    <a href="" class="menu-location__tittle">Hệ thống cửa hàng</a>
                </div>
                <form action="" class="form-search form">
                    <input type="text" class="form-search__input" placeholder="Tìm sản phẩm...">
                    <button class="form-search__btn">
                        <i class="form-search__icon ti-search"></i>
                    </button>
                </form>
            </div>
            <ul id="nav" class="nav menu-nav">
                <li class="menu-nav__item menu-nav__item--active">
                    <a href="index.php" class="menu-nav__link">Trang chủ</a>
                </li>
                <li class="nav-list-item__product menu-nav__item nav-list-item">
                    <!-- <a href="index.php?act=products&product_category_id=0&sort=name&sort_direct=DESC" class="menu-nav__link"> -->
                    <a href="index.php?act=products" class="menu-nav__link">
                        Sản phẩm
                        <i class="nav-list-item__icon-down nav-list-item__icon ti-angle-down"></i>
                        <i class="nav-list-item__icon-up nav-list-item__icon ti-angle-up"></i>
                    </a>

                    <!-- menu-extend -->
                    <div class="menu-extend-product menu-extend">
                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/ss-1.jpg" alt="">
                        </a>

                        <div class="menu-extend__wrap">
                            <!-- <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul> -->
                        </div>

                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/lg-2.jpg" alt="">
                        </a>
                    </div>
                </li>
                <li class="nav-list-item__men menu-nav__item nav-list-item">
                    <a href="index.php?act=products&product_category_id=8" class="menu-nav__link">
                        LG
                        <i class="nav-list-item__icon-down nav-list-item__icon ti-angle-down"></i>
                        <i class="nav-list-item__icon-up nav-list-item__icon ti-angle-up"></i>
                    </a>

                    <!-- menu-extend -->
                    <div class="menu-extend-men menu-extend">
                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/lg-1.jpg" alt="">
                        </a>

                        <div class="menu-extend__wrap">
                            <!-- <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul> -->
                        </div>

                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/lg-4.jpg" alt="">
                        </a>
                    </div>
                </li>
                <li class="nav-list-item__women menu-nav__item nav-list-item">
                    <a href="index.php?act=products&product_category_id=6" class="menu-nav__link">
                        SAMSUNG
                        <i class="nav-list-item__icon-down nav-list-item__icon ti-angle-down"></i>
                        <i class="nav-list-item__icon-up nav-list-item__icon ti-angle-up"></i>
                    </a>

                    <!-- menu-extend -->
                    <div class="menu-extend-women menu-extend">
                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/ss-1.jpg" alt="">
                        </a>

                        <div class="menu-extend__wrap">
                            <!-- <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul> -->
                        </div>

                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/ss-2.jpg" alt="">
                        </a>
                    </div>
                </li>
                <li class="nav-list-item__children menu-nav__item nav-list-item">
                    <a href="index.php?act=products&product_category_id=9" class="menu-nav__link">
                        SONY
                        <i class="nav-list-item__icon-down nav-list-item__icon ti-angle-down"></i>
                        <i class="nav-list-item__icon-up nav-list-item__icon ti-angle-up"></i>
                    </a>

                    <!-- menu-extend -->
                    <div class="menu-extend-children menu-extend">
                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/sn-1.jpg" alt="">
                        </a>

                        <div class="menu-extend__wrap">
                            <!-- <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul>
                            <ul class="menu-extend__category">
                                <a href="" class="menu-extend__category-tittle">Áo</a>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo len</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo thun</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo sơ mi</a>
                                </li>
                                <li class="menu-extend__item">
                                    <a href="" class="menu-extend__category-link">Áo Cardigan</a>
                                </li>
                            </ul> -->
                        </div>

                        <a href="" class="menu-extend__link">
                            <img class="menu-extend__img" src="./resources/uploads/images/product_header_footer/sn-2.jpg" alt="">
                        </a>
                    </div>
                </li>

                <!-- <li class="menu-nav__item">
                    <a href="index.php?act=news" class="menu-nav__link">Tin tức</a>
                </li> -->
                <li class="menu-nav__item">
                    <a href="index.php?act=contacts" class="menu-nav__link">Liên hệ</a>
                </li>
                <li class="menu-nav__item">
                    <a href="index.php?act=sales" class="menu-nav__link">
                        <i class="menu-nav__icon-coupons menu-nav__icon fa-solid fa-gift"></i> Khuyến mãi
                    </a>
                </li>
            </ul>
        </div>

        <!-- header right -->
        <div class="header__right">
            <a href="index.php?act=wishlist" class="header-wishlist header__right-box">
                <div class="header-wishlist__wrap header__right-wrap">
                    <i class="ti-heart header-wishlist__icon header__right-icon"></i>
                    <p class="header-wishlist__count header__right-count">0</p>
                </div>
                <p class="header-wishlist__tittle header__right-tittle">YÊU THÍCH</p>
            </a>

            <div class="header-account header__right-box">

                <?php
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) :
                ?>
                    <a href="index.php?act=account" class="header__right-box-link">
                        <div class="header-account__wrap header__right-wrap">
                            <i class="ti-user header-account__icon header__right-icon"></i>
                        </div>
                        <p class="header-account__tittle text-primary header__right-tittle">xin chào!</p>
                    </a>
                    <div class="header-account__hover header-account__hover--used">
                        <p class="header-account__hover-name">
                            Xin chào: <span class="header-account__hover-content"><?= isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : "" ?></span>
                        </p>
                        <a href="index.php?act=profile" class="header-account__hover-login">
                            <i class="header-account__hover-icon fa-solid fa-right-from-bracket"></i> Cài đặt tài khoản
                        </a>
                        <?php
                        if (isset($_SESSION['user']['role']) && ($_SESSION['user']['role'] == 5 || $_SESSION['user']['role'] == 4)) :
                        ?>
                            <a href="index.php?act=admin" class="header-account__hover-register">
                                <i class="header-account__hover-icon fa-solid fa-screwdriver-wrench"></i> Quản trị Website
                            </a>
                        <?php endif; ?>
                        <a href="index.php?act=account_logout" class="header-account__hover-login">
                            <i class="header-account__hover-icon fa-solid fa-right-from-bracket"></i> Đăng xuất
                        </a>
                    </div>
                <?php else : ?>
                    <a href="index.php?act=account" class="header__right-box-link">
                        <div class="header-account__wrap header__right-wrap">
                            <i class="ti-user header-account__icon header__right-icon"></i>
                        </div>
                        <p class="header-account__tittle header__right-tittle">TÀI KHOẢN</p>
                    </a>
                    <div class="header-account__hover">
                        <a href="index.php?act=login" class="header-account__hover-login">
                            <i class="header-account__hover-icon fa-solid fa-door-open"></i> Đăng nhập
                        </a>
                        <a href="index.php?act=register" class="header-account__hover-register">
                            <i class="header-account__hover-icon fa-solid fa-user-plus"></i> Đăng ký
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="header-cart header__right-box">
                <a href="index.php?act=cart" class="header-cart__link header__right-box-link">
                    <div class="header-cart__wrap-main header__right-box">
                        <div class="header-cart__wrap header__right-wrap">
                            <i class="ti-bag header-cart__icon header__right-icon"></i>
                            <p class="header-cart__count header__right-count">0</p>
                        </div>
                        <p class="header-cart__tittle header__right-tittle">GIỎ HÀNG</p>
                    </div>
                </a>

                <!-- <div class="header-cart__not-product">
                    <i class="header-cart__not-product-icon ti-shopping-cart"></i>
                    <p class="header-cart__not-product-description">Không có sản phẩm nào trong giỏ hàng của bạn</p>
                    <a class="header-cart__not-product-link" href="">Vào trang sản phẩm</a>
                </div> -->

                <div class="header-cart__have-product">
                    <h4 class="header-cart__have-product-tittle">GIỎ HÀNG</h4>
                    <div class="header-cart__have-product-list">
                        <div class="header-have-product-item">
                            <a href="" class="header-have-product-item__link">
                                <img src="../public/img/header/cart/aocottondangomfreesizeviencoph.webp" alt="" class="header-have-product-item__img">
                            </a>
                            <div class="have-product-item__container">
                                <div class="have-product-item__wrap-tittle">
                                    <a href="" class="have-product-item__tittle">Áo cotton dáng ôm free size viền cổ
                                        phối màu in họa tiết chữ</a>
                                    <a href="" class="have-product-item__remove ti-close"></a>
                                </div>
                                <span class="have-product-item__category">Đen / M</span>
                                <div class="have-product-item__wrap">
                                    <div class="have-product-item__wrap-quantity">
                                        <button class="have-product-item__minus ti-minus"></button>
                                        <input class="have-product-item__quantity" type="text" placeholder="1">
                                        <button class="have-product-item__plus ti-plus"></button>
                                    </div>
                                    <span class="have-product-item__price">400.000<u>đ</u></span>
                                </div>
                            </div>
                        </div>
                        <div class="header-have-product-item">
                            <a href="" class="header-have-product-item__link">
                                <img src="../public/img/header/cart/aocottondangomfreesizeviencoph.webp" alt="" class="header-have-product-item__img">
                            </a>
                            <div class="have-product-item__container">
                                <div class="have-product-item__wrap-tittle">
                                    <a href="" class="have-product-item__tittle">Áo cotton dáng ôm free size viền cổ
                                        phối màu in họa tiết chữ</a>
                                    <a href="" class="have-product-item__remove ti-close"></a>
                                </div>
                                <span class="have-product-item__category">Đen / M</span>
                                <div class="have-product-item__wrap">
                                    <div class="have-product-item__wrap-quantity">
                                        <button class="have-product-item__minus ti-minus"></button>
                                        <input class="have-product-item__quantity" type="text" placeholder="1">
                                        <button class="have-product-item__plus ti-plus"></button>
                                    </div>
                                    <span class="have-product-item__price">400.000<u>đ</u></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-cart__have-product-price-all">
                        <span class="header-cart__have-product-price-tittle">Tổng tiền:</span>
                        <span class="header-cart__have-product-price-number">650.000<u>đ</u></span>
                    </div>
                    <button class="header-cart__have-product-btn btn">THANH TOÁN</button>
                </div>
            </div>
        </div>
    </header>