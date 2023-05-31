<?php
// var_dump($products);
// var_dump($categories);
// echo "<pre>"; 
// var_dump($topNewProducts);
// echo "</pre>";
?>



<div class="container-fluid slide-show fix">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://routine.vn/media/catalog/category/thoi-trang-danh-cho-nu_1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://routine.vn/media/catalog/category/bo-suu-tap-thoi-trang-moi-nhat-2023_1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://routine.vn/media/catalog/category/thoi-trang-danh-cho-nam.jpg" class="d-block w-100" alt="...">
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

        <div class="wrap__main mt-5 mb-5">
            <section class="wrap__main-left">
                <div class="product-home">
                    <h2 class="text-center fw-bold"><a href="index.php?act=products&sort=number_sold&category=0" class="fs-1 text-dark text-deco-none">#Top Bán Chạy</a>
                    </h2>
                    <div class="grid-col-4 mt-5">
                        <!-- <div class="card border-0 shadow rounded" style="width: 100%; ">
                            <a href="" class="text-deco-none card__wrap-image">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/884/products/aocottondangsuongfreesizeinchu.jpg?v=1649173049000" class="card-img-top" alt="...">
                                <i class="card__price-sale-image">- 20%</i>
                            </a>
                            <div class="card-body">
                                <h3 class="card-title"><a href="" class="card__name text-deco-none">Áo Cotton Nữ cổ tròn
                                        dáng suôn chữ in theo trend</a></h3>
                                <p class="card__price mt-3">
                                    <span class="card__price-sale">195.000<u>đ</u></span>
                                    <span class="card__price-regular text-deco-line-th">250.000<u>đ</u></span>
                                </p>
                                <div class="card__sold text-center">
                                    <span class="card__sold-sale-bar">
                                        <span class="card__sold-sale-bar-text">#1</span>
                                    </span>
                                    <span class="card__sold-text">Đã bán 236</span>
                                    <span class="card__sold-countdown" style="width: 40%;"></span>
                                </div>
                            </div>
                        </div> -->

                        <?php
                        if (isset($top4SellingProducts) && $top4SellingProducts) :
                            foreach ($top4SellingProducts as $key => $top4SellingProduct) :
                                extract($top4SellingProduct);
                                if (isset($regular_price) && isset($sale_price) && $sale_price >= 0) {
                                    $sale = $regular_price - $sale_price;
                                    $precent = round((($sale / $regular_price) * 100), 2);
                                    if ($precent >= 100) {
                                        $precent = 100;
                                    } elseif ($precent <= 0) {
                                        $precent = 0;
                                    }
                                } else {
                                    $precent = 0;
                                }
                        ?>
                                <div class="card border-0 shadow rounded" style="width: 100%; ">
                                    <a href="index.php?act=products_detail&id=<?= (isset($id) && $id) ? $id : ""; ?>" class="text-deco-none card__wrap-image">
                                        <img src="<?= (isset($image_url) && $image_url) ? $image_url : ""; ?>" class="card-img-top" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>">
                                        <?php if (isset($precent)  && $precent > 0) : ?>
                                            <i class="card__price-sale-image">- <?= $precent ?>%</i>
                                        <?php endif; ?>
                                    </a>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="index.php?act=products_detail&id=<?= (isset($id) && $id) ? $id : ""; ?>" class="card__name text-deco-none"><?= (isset($name) && $name) ? $name : ""; ?></a>
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
                                                <?php if (isset($number_sold) && isset($quantity)) {
                                                    if ($number_sold == $quantity) echo "Hết $number_sold cái";
                                                    else echo $number_sold;
                                                }
                                                ?>
                                            </span>
                                            <span class="card__sold-countdown" style="width:<?= (isset($number_sold) && $number_sold && isset($quantity) && $quantity) ? ($number_sold / $quantity * 100) : ""; ?>%; max-width: 100%;"></span>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif;
                        ?>

                    </div>
                    <div class="text-center mt-5">
                        <a href="index.php?act=products&sort=number_sold&category=0" class=" product-home__view-more">Xem thêm</a>
                    </div>
                </div>
                <div class="product-home mt-5">
                    <h2 class="text-center fw-bold"><a href="index.php?act=products&sort=view_number&category=0" class="fs-1 text-dark text-deco-none">#Top Yêu Thích</a>
                    </h2>
                    <div class="grid-col-4 mt-5">
                        <?php
                        if (isset($top4ViewProducts) && $top4ViewProducts) :
                            foreach ($top4ViewProducts as $key => $top4ViewProduct) :
                                extract($top4ViewProduct);
                                if (isset($regular_price) && isset($sale_price) && $sale_price >= 0) {
                                    $sale = $regular_price - $sale_price;
                                    $precent = round((($sale / $regular_price) * 100), 2);
                                    if ($precent >= 100) {
                                        $precent = 100;
                                    } elseif ($precent <= 0) {
                                        $precent = 0;
                                    }
                                } else {
                                    $precent = 0;
                                }
                        ?>
                                <div class="card border-0 shadow rounded" style="width: 100%; ">
                                    <a href="index.php?act=products_detail&id=<?= (isset($id) && $id) ? $id : ""; ?>" class="text-deco-none card__wrap-image">
                                        <img src="<?= (isset($image_url) && $image_url) ? $image_url : ""; ?>" class="card-img-top" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>">
                                        <?php if (isset($precent)  && $precent > 0) : ?>
                                            <i class="card__price-sale-image">- <?= $precent ?>%</i>
                                        <?php endif; ?>
                                    </a>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="index.php?act=products_detail&id=<?= (isset($id) && $id) ? $id : ""; ?>" class="card__name text-deco-none"><?= (isset($name) && $name) ? $name : ""; ?></a>
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
                        <a href="index.php?act=products&sort=view_number&category=0" class=" product-home__view-more">Xem thêm</a>
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

                    <!-- <a href="#" class="wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                        Quần
                        <span class=" wrap-item__item-count badge  rounded-pill">14</span>
                    </a> -->
                </div>

                <div class="wrap-item list-group mt-5">
                    <span class="wrap-item__item-title list-group-item" aria-current="true">
                        Sản Phẩm Mới
                    </span>

                    <?php
                    if (isset($topNewProducts)) :
                        foreach ($topNewProducts as $topNewProduct) :
                            extract($topNewProduct);
                            $url_product = "index.php?act=products_detail&id=" . $id;
                    ?>
                            <a href="<?= (isset($url_product) && $url_product) ? $url_product : ""; ?>" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                                <div class="">
                                    <img class="wrap-item__product-img" src="<?= (isset($image_url) && $image_url) ? $image_url : ""; ?>" alt="<?= (isset($image_alt) && $image_alt) ? $image_alt : ""; ?>">
                                </div>
                                <div class="wrap-item__product-content">
                                    <h2 class="wrap-item__product-title"><?= (isset($name) && $name) ? $name : "Chưa có tên"; ?>
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
                    <!-- <a href="#" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                        <div class="">
                            <img class="wrap-item__product-img" src="https://bizweb.dktcdn.net/thumb/large/100/451/884/products/chanvaydangacaplientabongthant.jpg?v=1649173050000" alt="">
                        </div>
                        <div class="wrap-item__product-content">
                            <h2 class="wrap-item__product-title">Áo nữ mùa hè mát mẻ</h2>
                            <p class="wrap-item__product-price card__price ">
                                <span class="card__price-sale">195.000<u>đ</u></span>
                                <span class="card__price-regular text-deco-line-th">250.000<u>đ</u></span>
                            </p>
                        </div>
                    </a> -->

                </div>
            </aside>

        </div>

    </div>

</main>