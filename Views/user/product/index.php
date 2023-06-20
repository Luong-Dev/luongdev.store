<main>
    <div class="breadcrumb-css__background">
        <div class="container">
            <nav aria-label="breadcrumb-css breadcrumb ">
                <ol class=" breadcrumb-css__wrap breadcrumb">
                    <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=" class="breadcrumb-css__item-link">Trang
                            chủ</a></li>
                    <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">Tất cả sản phẩm</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
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
        <div class="product wrap__main mt-5 mb-5">
            <section class="product wrap__main-left">
                <div class="product-home">
                    <div class="product-main__wrap-top">
                        <p class="product-main__title">TẤT CẢ SẢN PHẨM</p>
                        <div class="product-main__dropdown dropdown">
                            <button class="product-main__dropdown-btn btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Sắp xếp sản phẩm
                            </button>
                            <ul class="product-main__dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="product-main__dropdown-item dropdown-item" href="#">A -> Z</a></li>
                                <li><a class="product-main__dropdown-item dropdown-item" href="#">Z -> A</a></li>
                                <li><a class="product-main__dropdown-item dropdown-item" href="#">Giá tăng dần</a></li>
                                <li><a class="product-main__dropdown-item dropdown-item" href="#">Giá giảm dần</a></li>
                                <li><a class="product-main__dropdown-item dropdown-item" href="#">Hàng mới nhất</a></li>
                                <li><a class="product-main__dropdown-item dropdown-item" href="#">Hàng cũ nhất</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if (isset($products) && !empty($products)) : ?>
                        <div class="grid-col-4 mt-5">
                            <?php foreach ($products as $product) :
                                extract($product);
                                if (isset($id)) {
                                    $detail = 'index.php?act=product_detail&id=' . $id;
                                }
                            ?>
                                <div class="card border-0 shadow rounded" style="width: 100%; ">
                                    <a href="<?= isset($detail) ? $detail : '' ?>" class="text-deco-none card__wrap-image">
                                        <img src="<?= isset($image) ? $image : '' ?>" class="card-img-top" alt="Hình ảnh sản phẩm">
                                        <?php
                                        $percent = 0;
                                        if (isset($sale_price) && $sale_price >= 0) :
                                            $percent = ceil(($regular_price - $sale_price) / $regular_price * 100);
                                        ?>
                                            <i class="card__price-sale-image">- <?= $percent ?>%</i>
                                        <?php endif; ?>
                                    </a>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="<?= isset($detail) ? $detail : '' ?>" class="card__name text-deco-none"><?= isset($name) ? $name : '' ?></a></h3>
                                        <p class="card__price mt-3">
                                            <?php if (isset($sale_price) && $sale_price >= 0) : ?>
                                                <span class="card__price-sale"><?= number_format($sale_price, 0, ",", ".") ?><u>đ</u></span>
                                                <span class="card__price-regular text-deco-line-th"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                            <?php else : ?>
                                                <span class="card__price-sale"><?= (isset($regular_price) && $regular_price >= 0) ? number_format($regular_price, 0, ",", ".")  : ""; ?><u>đ</u></span>
                                            <?php endif; ?>
                                        </p>
                                        <p class="m-0 p-0">Lượt xem: <?= isset($view_number) ? $view_number : '' ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <p class="text-center fw-bold fs-1 text-danger mt-5 mb-5">Không có sản phẩm nào!</p>
                    <?php endif; ?>

                    <div class="mt-5 d-flex justify-content-center">
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

                    <!-- <div class="mt-4 pagination d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link js-prev-page" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @for ($i = 0; $i < $pagi_quantity; $i++) <li class="page-item">
                                    <a class="page-link" href="/admin/employees/{{ $i + 1 }}">{{ $i + 1 }}</a>
                                    </li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link js-next-page" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </section>
            <aside class="product wrap__main-right">
                <div class="wrap-item list-group">
                    <span class="wrap-item__item-title list-group-item" aria-current="true">
                        Danh mục
                    </span>
                    <?php if (isset($productCategories) && $productCategories) :
                        foreach ($productCategories as $key => $productCategory) :
                            extract($productCategory);
                    ?>
                            <a href="index.php?act=products&product_category_id=<?= (isset($id) && $id) ? $id : ""; ?>" class="wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                                <?= isset($name) ? $name : '' ?>
                                <span class=" wrap-item__item-count badge  rounded-pill"> <?= isset($quantity_product) ? $quantity_product : '' ?></span>
                            </a>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- <div class="filter-pro__wrap mt-5 rounded">
                    <div class="filter-pro__wrap-item">
                        <h3 class="filter-pro__title">CHỌN MỨC GIÁ</h3>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500">
                            <label class="filter-pro__label form-check-label" for="flexCheck500">
                                Dưới 500k
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500-1000">
                            <label class="filter-pro__label form-check-label" for="flexCheck500-1000">
                                Từ 500k - 1 triệu
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck1000-2000">
                            <label class="filter-pro__label form-check-label" for="flexCheck1000-2000">
                                Từ 1 triệu - 2 triệu
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck2000-5000">
                            <label class="filter-pro__label form-check-label" for="flexCheck2000-5000">
                                Từ 2 triệu - 5 triệu
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck5000Min">
                            <label class="filter-pro__label form-check-label" for="flexCheck5000Min">
                                Trên 5 triệu
                            </label>
                        </div>
                    </div>
                    <div class="filter-pro__wrap-item">
                        <h3 class="filter-pro__title">Màu phổ biến</h3>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500">
                            <label class="filter-pro__label form-check-label" for="flexCheck500">
                                Trắng
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500-1000">
                            <label class="filter-pro__label form-check-label" for="flexCheck500-1000">
                                Đen
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck1000-2000">
                            <label class="filter-pro__label form-check-label" for="flexCheck1000-2000">
                                Hồng
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck2000-5000">
                            <label class="filter-pro__label form-check-label" for="flexCheck2000-5000">
                                Xanh
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck5000Min">
                            <label class="filter-pro__label form-check-label" for="flexCheck5000Min">
                                Cam
                            </label>
                        </div>
                    </div>
                    <div class="filter-pro__wrap-item">
                        <h3 class="filter-pro__title">Kiểu vải</h3>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500">
                            <label class="filter-pro__label form-check-label" for="flexCheck500">
                                Vải cotton
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500-1000">
                            <label class="filter-pro__label form-check-label" for="flexCheck500-1000">
                                Vải kaki
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck1000-2000">
                            <label class="filter-pro__label form-check-label" for="flexCheck1000-2000">
                                Vải jeans
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck2000-5000">
                            <label class="filter-pro__label form-check-label" for="flexCheck2000-5000">
                                Vải len
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck5000Min">
                            <label class="filter-pro__label form-check-label" for="flexCheck5000Min">
                                Vải kate
                            </label>
                        </div>
                    </div>
                </div> -->

                <div class="wrap-item list-group mt-5">
                    <span class="wrap-item__item-title list-group-item" aria-current="true">
                        Sản Phẩm Mới
                    </span>
                    <?php if (isset($top10NewProducts) && $top10NewProducts) :
                        foreach ($top10NewProducts as $key => $top10NewProduct) :
                            extract($top10NewProduct);
                            $url_product = 'index.php?act=product_detail&id=' . $id;
                    ?>
                            <a href="<?= (isset($url_product) && $url_product) ? $url_product : "" ?>" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
                                <div class="">
                                    <img class="wrap-item__product-img" src="<?= defined('URL_WEB') && $image ? URL_WEB . $image : '' ?>" alt="Hình ảnh sản phẩm">
                                </div>
                                <div class="wrap-item__product-content">
                                    <h2 class="wrap-item__product-title"> <?= isset($name) ? $name : '' ?></h2>
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

                <div class="filter-pro__wrap mt-5 rounded">
                    <div class="filter-pro__wrap-item">
                        <h3 class="filter-pro__title">CHỌN MỨC GIÁ</h3>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500">
                            <label class="filter-pro__label form-check-label" for="flexCheck500">
                                Dưới 500k
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500-1000">
                            <label class="filter-pro__label form-check-label" for="flexCheck500-1000">
                                Từ 500k - 1 triệu
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck1000-2000">
                            <label class="filter-pro__label form-check-label" for="flexCheck1000-2000">
                                Từ 1 triệu - 2 triệu
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck2000-5000">
                            <label class="filter-pro__label form-check-label" for="flexCheck2000-5000">
                                Từ 2 triệu - 5 triệu
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck5000Min">
                            <label class="filter-pro__label form-check-label" for="flexCheck5000Min">
                                Trên 5 triệu
                            </label>
                        </div>
                    </div>
                    <div class="filter-pro__wrap-item">
                        <h3 class="filter-pro__title">Màu phổ biến</h3>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500">
                            <label class="filter-pro__label form-check-label" for="flexCheck500">
                                Trắng
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500-1000">
                            <label class="filter-pro__label form-check-label" for="flexCheck500-1000">
                                Đen
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck1000-2000">
                            <label class="filter-pro__label form-check-label" for="flexCheck1000-2000">
                                Hồng
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck2000-5000">
                            <label class="filter-pro__label form-check-label" for="flexCheck2000-5000">
                                Xanh
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck5000Min">
                            <label class="filter-pro__label form-check-label" for="flexCheck5000Min">
                                Cam
                            </label>
                        </div>
                    </div>
                    <div class="filter-pro__wrap-item">
                        <h3 class="filter-pro__title">Kiểu vải</h3>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500">
                            <label class="filter-pro__label form-check-label" for="flexCheck500">
                                Vải cotton
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck500-1000">
                            <label class="filter-pro__label form-check-label" for="flexCheck500-1000">
                                Vải kaki
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck1000-2000">
                            <label class="filter-pro__label form-check-label" for="flexCheck1000-2000">
                                Vải jeans
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck2000-5000">
                            <label class="filter-pro__label form-check-label" for="flexCheck2000-5000">
                                Vải len
                            </label>
                        </div>
                        <div class="filter-pro__item form-check">
                            <input class="filter-pro__check form-check-input" type="checkbox" value="" id="flexCheck5000Min">
                            <label class="filter-pro__label form-check-label" for="flexCheck5000Min">
                                Vải kate
                            </label>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>