<?php
// var_dump($products);
// var_dump($categories);
// echo "<pre>"; 
// var_dump($top10NewProducts);
// echo "</pre>";
?>

<div class="container-fluid slide-show fix mt-3">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./resources/uploads/images/slideshow/slide1.png.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./resources/uploads/images/slideshow/slide2.png.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./resources/uploads/images/slideshow/slide3.png.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./resources/uploads/images/slideshow/slide4.png.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<main>
    <div class="container">
        <div class="information mt-5">
            <div class="information__wrap">
                <div class="information__icon">
                    <img class="information__icon-img" src="./resources/icons/information/ser_1.webp" alt="">
                </div>
                <div class="information__content-wrap">
                    <p class="information__content">Vận chuyển <span class="information__content-bold">MIỄN PHÍ</span>
                    </p>
                    <p class="information__content">Trong khu vực <span class="information__content-bold">TP.HÀ
                            NỘI</span></p>
                </div>
            </div>
            <div class="information__wrap">
                <div class="information__icon">
                    <img class="information__icon-img" src="./resources/icons/information/ser_2.webp" alt="">
                </div>
                <div class="information__content-wrap">
                    <p class="information__content">Đổi trả <span class="information__content-bold">MIỄN PHÍ</span></p>
                    <p class="information__content">Trong vòng <span class="information__content-bold">30 NGÀY</span>
                    </p>
                </div>
            </div>
            <div class="information__wrap">
                <div class="information__icon">
                    <img class="information__icon-img" src="./resources/icons/information/ser_3.webp" alt="">
                </div>
                <div class="information__content-wrap">
                    <p class="information__content">Tiến hành <span class="information__content-bold">THANH TOÁN</span>
                    </p>
                    <p class="information__content">Với nhiều <span class="information__content-bold">PHƯƠNG THỨC</span>
                    </p>
                </div>
            </div>
            <div class="information__wrap">
                <div class="information__icon">
                    <img class="information__icon-img" src="./resources/icons/information/ser_4.webp" alt="">
                </div>
                <div class="information__content-wrap">
                    <p class="information__content"><span class="information__content-bold">100% HOÀN TIỀN</span></p>
                    <p class="information__content">Nếu sản phẩm lỗi <span class="information__content-bold"></span></p>
                </div>
            </div>
        </div>
        <div class="mt-3 notify">
            <?php if (isset($_SESSION['notify']['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['notify']['success'] ?>
                    <button type="button" class="btn-close bg-danger" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['notify']['success']) ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['notify']['error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['notify']['error'] ?>
                    <button type="button" class="btn-close bg-danger" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['notify']['error']) ?>
            <?php endif; ?>
        </div>
        <div class="wrap__main mt-5 mb-5">
            <section class="wrap__main-left">
                <div class="product-home">
                    <h2 class="text-center fw-bold"><a href="index.php?act=products&sort=number_sold" class="fs-1 text-dark text-deco-none">#Top Bán Chạy - CẦN SỬA KHI LÀM XONG BÁN HÀNG</a>
                    </h2>
                    <div class="grid-col-4 mt-5">
                        <?php
                        if (isset($top4SellingProducts) && $top4SellingProducts) :
                            foreach ($top4SellingProducts as $key => $top4SellingProduct) :
                                extract($top4SellingProduct);
                                $url_product = 'index.php?act=product_detail&id=' . $id;
                                if (isset($regular_price) && isset($sale_price) && $sale_price >= 0) {
                                    $precent = ceil(($regular_price - $sale_price) / $regular_price * 100);
                                }
                        ?>
                                <div class="card border-0 shadow rounded" style="width: 100%; ">
                                    <a href="<?= (isset($url_product) && $url_product) ? $url_product : "" ?>" class="text-deco-none card__wrap-image">
                                        <img src="<?= defined('URL_WEB') && $image ? URL_WEB . $image : '' ?>" class="card-img-top" alt="Hình ảnh sản phẩm">
                                        <?php if (isset($precent)  && $precent > 0) : ?>
                                            <i class="card__price-sale-image">- <?= $precent ?>%</i>
                                        <?php endif; ?>
                                    </a>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="<?= (isset($url_product) && $url_product) ? $url_product : "" ?>" class="card__name text-deco-none"><?= (isset($name) && $name) ? $name : ""; ?></a>
                                        </h3>
                                        <p class="card__price mt-3">
                                            <?php if (isset($sale_price) && $sale_price >= 0) : ?>
                                                <span class="card__price-sale"><?= number_format($sale_price, 0, ",", ".") ?><u>đ</u></span>
                                                <span class="card__price-regular text-deco-line-th"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                            <?php else : ?>
                                                <span class="card__price-sale"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                            <?php endif; ?>
                                        </p>
                                        <div class="card__sold text-center">
                                            <span class="card__sold-sale-bar">
                                                <span class="card__sold-sale-bar-text">#<?= $key + 1 ?></span>
                                            </span>
                                            <span class="card__sold-text">Đã bán
                                                <?= (isset($number_sold) && $number_sold) ? $number_sold : ""; ?></span>
                                            <span class="card__sold-countdown" style="width:<?= (isset($number_sold) && $number_sold && isset($quantity) && $quantity) ? ($number_sold / $quantity * 100) : ""; ?>%; max-width: 100%;"></span>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif;
                        ?>

                    </div>
                    <div class="text-center mt-5">
                        <a href="index.php?act=products&sort=number_sold" class=" product-home__view-more">Xem thêm</a>
                    </div>
                </div>
                <div class="product-home mt-5">
                    <h2 class="text-center fw-bold"><a href="index.php?act=products&sort=view_number" class="fs-1 text-dark text-deco-none">#Top Yêu Thích</a>
                    </h2>
                    <div class="grid-col-4 mt-5">
                        <?php
                        if (isset($top8ViewProducts) && $top8ViewProducts) :
                            foreach ($top8ViewProducts as $key => $top8ViewProduct) :
                                extract($top8ViewProduct);
                                $url_product = 'index.php?act=product_detail&id=' . $id;
                                if (isset($regular_price) && isset($sale_price) && $sale_price >= 0) {
                                    $precent = ceil(($regular_price - $sale_price) / $regular_price * 100);
                                }
                        ?>
                                <div class="card border-0 shadow rounded" style="width: 100%; ">
                                    <a href="<?= (isset($url_product) && $url_product) ? $url_product : "" ?>" class="text-deco-none card__wrap-image">
                                        <img src="<?= defined('URL_WEB') && $image ? URL_WEB . $image : '' ?>" class="card-img-top" alt="Hình ảnh sản phẩm">
                                        <?php if (isset($precent)  && $precent > 0) : ?>
                                            <i class="card__price-sale-image">- <?= $precent ?>%</i>
                                        <?php endif; ?>
                                    </a>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="<?= (isset($url_product) && $url_product) ? $url_product : "" ?>" class="card__name text-deco-none"><?= (isset($name) && $name) ? $name : ""; ?></a>
                                        </h3>
                                        <p class="card__price mt-3">
                                            <?php if (isset($sale_price) && $sale_price >= 0) : ?>
                                                <span class="card__price-sale"><?= number_format($sale_price, 0, ",", ".") ?><u>đ</u></span>
                                                <span class="card__price-regular text-deco-line-th"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                            <?php else : ?>
                                                <span class="card__price-sale"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                            <?php endif; ?>
                                        </p>
                                        <div class="card__sold text-center">
                                            <span class="card__sold-sale-bar">
                                                <span class="card__sold-sale-bar-text">#<?= $key + 1 ?></span>
                                            </span>
                                            <span class="card__sold-text">Đã bán
                                                <?= (isset($number_sold) && $number_sold) ? $number_sold : ""; ?></span>
                                            <span class="card__sold-countdown" style="width:<?= (isset($number_sold) && $number_sold && isset($quantity) && $quantity) ? ($number_sold / $quantity * 100) : ""; ?>%; max-width: 100%;"></span>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="text-center mt-5">
                        <a href="index.php?act=products&sort=view_number" class=" product-home__view-more">Xem thêm</a>
                    </div>
                </div>
            </section>
            <aside class="wrap__main-right mt-5">
                <div class="wrap-item list-group mt-5">
                    <span class="wrap-item__item-title list-group-item" aria-current="true">
                        Danh mục
                    </span>
                    <?php
                    if (isset($categories)) :
                        foreach ($categories as $category) :
                            extract($category);
                    ?>
                            <a href="index.php?act=products&category=<?= (isset($id) && $id) ? $id : ""; ?>" class="wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                                <?= (isset($name) && $name) ? $name : ""; ?>
                                <span class=" wrap-item__item-count badge  rounded-pill"><?= (isset($quantity_product) && $quantity_product >= 0) ? $quantity_product : ""; ?></span>
                            </a>
                    <?php endforeach;
                    endif;
                    ?>
                </div>

                <div class="wrap-item list-group mt-5">
                    <span class="wrap-item__item-title list-group-item" aria-current="true">
                        Sản Phẩm Mới
                    </span>
                    <?php
                    if (isset($top10NewProducts)) :
                        foreach ($top10NewProducts as $topNewProduct) :
                            extract($topNewProduct);
                            $url_product = "index.php?act=product_detail&id=" . $id;
                    ?>
                            <a href="<?= (isset($url_product) && $url_product) ? $url_product : "" ?>" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                                <div class="">
                                    <img class="wrap-item__product-img" src="<?= defined('URL_WEB') && $image ? URL_WEB . $image : '' ?>" alt="Hình ảnh sản phẩm">
                                </div>
                                <div class="wrap-item__product-content">
                                    <h2 class="wrap-item__product-title"><?= isset($name) ? $name : "Chưa có tên" ?>
                                    </h2>
                                    <p class="wrap-item__product-price card__price ">
                                        <?php if (isset($sale_price) && $sale_price >= 0) : ?>
                                            <span class="card__price-sale"><?= number_format($sale_price, 0, ",", ".") ?><u>đ</u></span>
                                            <span class="card__price-regular text-deco-line-th"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                        <?php else : ?>
                                            <span class="card__price-sale"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </aside>

        </div>

    </div>

</main>