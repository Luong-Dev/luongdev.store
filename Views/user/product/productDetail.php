<?php
// var_dump($product);
// var_dump($categories);
// echo "<pre>";
// var_dump($top10RelatedProducts);
// echo "</pre>";
?>
<main>
    <div class="breadcrumb-css__background">
        <div class="container">
            <nav aria-label="breadcrumb-css breadcrumb ">
                <ol class=" breadcrumb-css__wrap breadcrumb">
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=" class="breadcrumb-css__item-link">Trang
                            chủ</a></li>
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=products" class="breadcrumb-css__item-link">Sản
                            phẩm</a></li>
                    <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">
                        <?= isset($product['name']) ? $product['name'] : "" ?>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="product wrap__main mt-5 mb-5">
            <section class="product-detail wrap__main-left">
                <div class="product-detail__wrap-top">
                    <div class="product-detail__image-top">
                        <img src="<?= isset($product['image']) ? $product['image'] : "" ?>" alt="Hình ảnh sản phẩm" class="image-top__main">
                        <div class="product-detail__image-wrap-extra">
                            <img src="https://bizweb.dktcdn.net/thumb/medium/100/451/884/products/chanvaydangacaplientabongthant.jpg?v=1649173050497" alt="" class="image-top__extra">
                            <img src="https://bizweb.dktcdn.net/thumb/medium/100/451/884/products/chanvaydangacaplientabongthant-eb9a6568-72f7-45a3-807b-dab4142ffc13.jpg?v=1649173050497" alt="" class="image-top__extra">
                            <img src="https://bizweb.dktcdn.net/thumb/medium/100/451/884/products/chanvaydangacaplientabongthant-08c397d2-22c4-4c19-ab1b-f3e8f5546784.jpg?v=1649173050497" alt="" class="image-top__extra">
                            <img src="https://bizweb.dktcdn.net/thumb/medium/100/451/884/products/chanvaydangacaplientabongthant-a7c357d3-d48a-49fb-91e8-035532643b0b.jpg?v=1649173050497" alt="" class="image-top__extra">
                            <img src="https://bizweb.dktcdn.net/thumb/medium/100/451/884/products/chanvaydangacaplientabongthant-afda6e75-aa07-4588-b82d-015432ec39d9.jpg?v=1649173050497" alt="" class="image-top__extra">
                        </div>
                    </div>
                    <div class="product-detail__content-top">
                        <h1 class="content-top__title"><?= isset($product['name']) ? $product['name'] : "" ?></h1>
                        <p class="content-top__code-wrap">Mã: <span class="content-top__code"><?= isset($product['module']) ? $product['module'] : "Đang cập nhật"; ?></span>
                        </p>
                        <span class="content-top__trademark-wrap">Thương hiệu:
                            <span class="content-top__trademark">
                                <?php if (isset($productCategories) && $productCategories) : ?>
                                    <?php foreach ($productCategories as $productCategory) : ?>
                                        <?= isset($product['product_category_id']) && $product['product_category_id'] == $productCategory['id'] ? $productCategory['name'] : "" ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </span>
                        </span>
                        <span class="content-top__status-wrap">Trạng thái: <span class="content-top__status">
                                <?php if (defined('AR_STATUS') && is_array(AR_STATUS) && AR_STATUS) : ?>
                                    <?php foreach (AR_STATUS as $key => $item) : ?>
                                        <?= isset($product['status']) && $product['status'] == $key + 1 ? $item : "" ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </span>
                        </span>
                        <p class="content-top__price-wrap">
                            <?php if (isset($product['sale_price']) && $product['sale_price'] >= 0) : ?>
                                <span><?= number_format($product['sale_price'], 0, ",", ".") ?><u>đ</u></span>
                                <span class="content-top__regular-price"><?= (isset($product['regular_price']) && $product['regular_price'] >= 0) ? number_format($product['regular_price'], 0, ",", ".")  : ""; ?><u>đ</u></span>
                            <?php else : ?>
                                <span><?= (isset($product['regular_price']) && $product['regular_price'] >= 0) ? number_format($product['regular_price'], 0, ",", ".")  : ""; ?><u>đ</u></span>
                            <?php endif; ?>
                        </p>
                        <p class="content-top__description-short">
                            <?= (isset($product['short_description']) && $product['short_description']) ? $product['short_description'] : ""; ?>
                        </p>
                        <div class="content-top__color-wrap">
                            <p class="content-top__color-title">Màu sắc:
                                <span class="content-top__color"><?= (isset($product['color']) && $product['color']) ? $product['color'] : "Đang cập nhật" ?></span>
                            </p>
                            <!-- <div class="content-top__description">
                                <span class="content-top__description-color content-top__description-color-active"></span>
                                <span class="content-top__description-color"></span>
                                <span class="content-top__description-color"></span>
                            </div> -->
                        </div>
                        <div class="content-top__size-wrap">
                            <p class="content-top__size-title">Kích thước:
                                <span class="content-top__size"><?= (isset($product['size']) && $product['size']) ? $product['size'] : "Đang cập nhật" ?></span>
                                Inch
                            </p>
                            <!-- <div class="content-top__description">
                                <span class="content-top__description-size content-top__description-size-active">S</span>
                                <span class="content-top__description-size">M</span>
                                <span class="content-top__description-size">L</span>
                            </div> -->
                        </div>
                        <form class="content-top__form">
                            <div class="content-top__form-wrap">
                                <button class="content-top__form-minus"><i class="ti-minus"></i></button>
                                <input class="content-top__form-quantity" type="text" value="1">
                                <button class="content-top__form-plus"><i class="ti-plus"></i></button>
                                <input class="content-top__form-submit" type="submit" value="THÊM VÀO GIỎ HÀNG">
                                <span class="content-top__form-heart">
                                    <i class="content-top__form-heart-icon ti-heart"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="content-top__description-long">
                    <h3 class="description-long__title">Mô tả sản phẩm</h3>
                    <p class="description-long__content">
                        <?= (isset($product['long_description']) && $product['long_description']) ? $product['long_description'] : ""; ?>
                    </p>
                </div>

                <!-- <div id="comment"></div> -->

                <div class="mt-5 product-detail__comment-wrap">
                    <div class="form__fixed">
                        <h4 class="product-comment__title">Bình luận</h4>
                        <?php
                        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) :
                        ?>
                            <h5 class="product-comment__not-login">
                                Bạn cần <a href="<?= defined('URL_LOGIN') ? URL_LOGIN : '' ?>" class="product-comment__link"> đăng nhập </a> để bình luận!
                            </h5>
                        <?php endif; ?>
                    </div>
                    <iframe src="./Views/user/comment/comments.php?productId=<?= (isset($product['id']) && $product['id']) ? $product['id'] : "" ?>" frameborder="0" width="100%" height="666px"></iframe>
                </div>


                <!-- <div class="product-detail__comment-wrap">
                    <h4 class="product-comment__title">Bình luận</h4>
                    <?php
                    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) :
                    ?>
                        <div class="product-comment__logined">
                            <form class="product-comment__form-comment">
                                <label for="product-comment" class="product-comment__form-label">Nhập bình luận của bạn:</label>
                                <textarea class="product-comment__form-input form-control" name="" id="product-comment" cols="30" rows="5"></textarea>
                                <input type="submit" name="" id="" class="product-comment__form-submit" value="Bình luận">
                            </form>
                        </div>
                    <?php else : ?>
                        <h5 class="product-comment__not-login">
                            Bạn cần <a href="index.php?act=login" class="product-comment__link">đăng nhập</a> để bình luận!
                        </h5>
                    <?php endif; ?>
                    <div class="product-comment__list">
                        <div class="product-comment__item">
                            <div class="product-comment__item-image-wrap">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/884/products/aocottondangsuongfreesizeinchu.jpg?v=1649173049000https://bizweb.dktcdn.net/thumb/large/100/451/884/products/aocottondangsuongfreesizeinchu.jpg?v=1649173049000" alt="" class="product-comment__item-image">
                                <p class="product-comment__item-user-name">User 01</p>
                            </div>
                            <div class="product-comment__item-content-wrap">
                                <p class="product-comment__content-comment">
                                    Sản phẩm đẹp, người mẫu cũng đẹp!
                                </p>
                                <span class="product-comment__time-comment">25-01-2023 12:00</span>

                            </div>
                        </div>
                        <div class="product-comment__item">
                            <div class="product-comment__item-image-wrap">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/884/products/aocottondangsuongfreesizeinchu.jpg?v=1649173049000https://bizweb.dktcdn.net/thumb/large/100/451/884/products/aocottondangsuongfreesizeinchu.jpg?v=1649173049000" alt="" class="product-comment__item-image">
                                <p class="product-comment__item-user-name">User 01</p>
                            </div>
                            <div class="product-comment__item-content-wrap">
                                <p class="product-comment__content-comment">
                                    Sản phẩm đẹp, người mẫu cũng đẹp!
                                </p>
                                <span class="product-comment__time-comment">25-01-2023 12:00</span>

                            </div>
                        </div>
                        <div class="product-comment__item">
                            <div class="product-comment__item-image-wrap">
                                <img src="https://bizweb.dktcdn.net/thumb/large/100/451/884/products/aocottondangsuongfreesizeinchu.jpg?v=1649173049000https://bizweb.dktcdn.net/thumb/large/100/451/884/products/aocottondangsuongfreesizeinchu.jpg?v=1649173049000" alt="" class="product-comment__item-image">
                                <p class="product-comment__item-user-name">User 01</p>
                            </div>
                            <div class="product-comment__item-content-wrap">
                                <p class="product-comment__content-comment">
                                    Sản phẩm đẹp, người mẫu cũng đẹp!
                                </p>
                                <span class="product-comment__time-comment">25-01-2023 12:00</span>

                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> -->
            </section>
            <aside class="product-detail wrap__main-right">

                <div class="product-coupon">
                    <h3 class="product-coupon__title">
                        <i class="product-coupon__title-icon ti-gift"></i> Mã giảm giá
                    </h3>
                    <div class="product-coupon__wrap-item">
                        <div class="product-coupon__wrap-coupon">
                            <p class="product-coupon__item-code">10% OFf</p>
                            <img src="https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/coupon1_value_img.png?1678454103962" alt="" class="product-coupon__item-img">
                        </div>
                        <p class="product-coupon__item-description">Giảm 10% cho đơn hàng từ 500k</p>
                        <form class="product-coupon__item-form" action="">
                            <input class="product-coupon__item-input" type="text" value="BFAS10">
                            <input class="product-coupon__item-submit" type="submit" value="Copy">
                        </form>
                    </div>
                    <div class="product-coupon__wrap-item">
                        <div class="product-coupon__wrap-coupon">
                            <p class="product-coupon__item-code">15% OFf</p>
                            <img src="https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/coupon2_value_img.png?1678454103962" alt="" class="product-coupon__item-img">
                        </div>
                        <p class="product-coupon__item-description">Giảm 10% cho đơn hàng từ 999k</p>
                        <form class="product-coupon__item-form" action="">
                            <input class="product-coupon__item-input" type="text" value="BFAS10">
                            <input class="product-coupon__item-submit" type="submit" value="Copy">
                        </form>
                    </div>
                    <div class="product-coupon__wrap-item">
                        <div class="product-coupon__wrap-coupon">
                            <p class="product-coupon__item-code">Free ship</p>
                            <img src="https://bizweb.dktcdn.net/100/451/884/themes/857425/assets/coupon3_value_img.png?1678454103962" alt="" class="product-coupon__item-img">
                        </div>
                        <p class="product-coupon__item-description">Free ship cho đơn hàng nội thành</p>
                        <form class="product-coupon__item-form" action="">
                            <input class="product-coupon__item-input" type="text" value="BFAS10">
                            <input class="product-coupon__item-submit" type="submit" value="Copy">
                        </form>
                    </div>
                </div>

                <div class="wrap-item list-group mt-5">
                    <span class="wrap-item__item-title list-group-item" aria-current="true">
                        Danh mục
                    </span>
                    <?php
                    if (isset($productCategories)) :
                        foreach ($productCategories as $productCategory) :
                            extract($productCategory);
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
                        Có thể bạn thích
                    </span>

                    <?php
                    if (isset($top10RelatedProducts)) :
                        foreach ($top10RelatedProducts as $top10RelatedProduct) :
                            extract($top10RelatedProduct);
                            $url_product = 'index.php?act=product_detail&id=' . $id;
                    ?>
                            <a href="<?= (isset($url_product) && $url_product) ? $url_product : "" ?>" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                                <div class="">
                                    <img class="wrap-item__product-img" src="<?= (isset($image) && $image) ? $image : "" ?>" alt="Hình ảnh sản phẩm">
                                </div>
                                <div class="wrap-item__product-content">
                                    <h2 class="wrap-item__product-title"><?= (isset($name) && $name) ? $name : "Chưa có tên" ?>
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

<!-- <script>
    $(document).ready(function() {
        $("#comment").load("./Views/user/comment/comments.php", {
            productId: "<?= (isset($product['id']) && $product['id']) ? $product['id'] : ""; ?>"
        });
    });
</script> -->