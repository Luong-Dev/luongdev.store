<div class="breadcrumb-css__background">
    <div class="container">
        <nav aria-label="breadcrumb-css breadcrumb ">
            <ol class=" breadcrumb-css__wrap breadcrumb">
                <li class="breadcrumb-css__item breadcrumb-item"><a href="index.php?act=products" class="breadcrumb-css__item-link">Trang
                        chủ</a></li>
                <li class="breadcrumb-css__item breadcrumb-css__item--active breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="product wrap__main mt-5 mb-5">
        <section class="product-detail wrap__main-left">
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
            <?php if (isset($carts) && $carts) : ?>
                <div class=" header-cart__have-product--cart header-cart__have-product">
                    <h4 class="header-cart__have-product-tittle">GIỎ HÀNG</h4>
                    <!-- <div class="header-cart__have-product-list">
                        <div class="header-have-product-item">
                            <a href="" class="header-have-product-item__link">
                                <img src="" alt="" class="header-have-product-item__img">
                            </a>
                            <div class="have-product-item__container">
                                <div class="have-product-item__wrap-tittle">
                                    <a href="" class="have-product-item__tittle">Áo cotton dáng ôm free size viền cổ phối
                                        màu in họa
                                        tiết chữ</a>
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
                    </div> -->
                    <form action="index.php?act=order_create" method="post" class="px-3">
                        <table class="table table-bordered table-hover my-4">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Phân loại</th>
                                    <th scope="col">Số lượng mua</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Tổng</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $allPrice = 0;
                                foreach ($carts as $key => $cart) :
                                    extract($cart);
                                    if (isset($sale_price) && $sale_price >= 0) {
                                        $allPrice += $sale_price * $cart_quantity;
                                    } else {
                                        $allPrice += $regular_price * $cart_quantity;
                                    }
                                ?>
                                    <tr>
                                        <td scope="row"><?= $key + 1 ?></td>
                                        <td>
                                            <a href="index.php?act=product_detail&id=<?= isset($product_id) ? $product_id : '' ?>">
                                                <p><?= isset($name) ? $name : '' ?></p>
                                                <div class="text-center">
                                                    <img src="<?= isset($image) ? $image : '' ?>" alt="" style="height: 30px;">
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <p><?= isset($color) ? $color : '' ?></p>
                                            <p><?= isset($size) ? $size . ' Inch' : '' ?></p>
                                        </td>
                                        <td style="max-width: 200px">
                                            <div class="input-group">
                                                <button class="btn btn-outline-secondary bg-secondary" type="button" id="minus-btn-<?= $key ?>">-</button>
                                                <!-- <input style="width: 20px;" type="number" class="form-control text-center" id="quantity-<?= $key ?>" name="quantity_<?= isset($cart_id) ? $cart_id : '' ?>" value="<?= isset($cart_quantity) ? $cart_quantity : '' ?>"> -->
                                                <input style="width: 20px;" type="number" class="form-control text-center" id="quantity-<?= $key ?>" name="quantity_19" value="<?= isset($cart_quantity) ? $cart_quantity : '' ?>">
                                                <button class="btn btn-outline-secondary bg-secondary" type="button" id="plus-btn-<?= $key ?>">+</button>
                                            </div>
                                            <p class="<?= isset($cart_quantity) && isset($product_quantity) && $cart_quantity > $product_quantity ? 'text-danger' : 'text-success' ?> mt-2">
                                                Mua tối đa:
                                                <?= isset($product_quantity) ? $product_quantity : '' ?>Sản phẩm
                                            </p>
                                            <?php if (isset($status) && $status != 1) : ?>
                                                <span class="text-danger mt-2">Sản phẩm hiện không có sẵn để bán, hãy xóa khỏi giỏ!</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($sale_price)) : ?>
                                                <?= number_format($sale_price, 0, ',', '.') ?><u>đ</u>
                                            <?php else : ?>
                                                <?= number_format($regular_price, 0, ',', '.') ?><u>đ</u>
                                            <?php endif; ?>
                                        </td>
                                        <td id="js-all-price">
                                            <?php if (isset($sale_price)) : ?>
                                                <?= number_format($cart_quantity * $sale_price, 0, ',', '.') ?><u>đ</u>
                                            <?php else : ?>
                                                <?= number_format($cart_quantity * $regular_price, 0, ',', '.') ?><u>đ</u>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <input hidden type="text" id="js-product-detail-id-<?= $key ?>" value="<?= isset($cart_id) ? $cart_id : '' ?>">
                                            <a href="" class="btn btn-danger bg-success btn-sm" id="js-update-one-cart-<?= $key ?>">Cập nhật</a>
                                            <a href="index.php?act=cart_one_delete&id=<?= isset($cart_id) ? $cart_id : '' ?>" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-danger bg-danger btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="10" class="">
                                        <div class="header-cart__have-product-price-all">
                                            <span class="header-cart__have-product-price-tittle text-success">Tổng tiền:</span>
                                            <span class="header-cart__have-product-price-number"><?= number_format($allPrice, 0, ',', '.') ?><u>đ</u></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="info-user">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleName" class="form-label">Họ và tên</label>
                                        <input name="name" type="text" class="form-control" id="exampleName" value="<?= isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : '' ?>">
                                        <p class="text-danger"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleAddress" class="form-label">Địa chỉ</label>
                                        <textarea name="address" id="" class="form-control" cols="30" rows="1" id="exampleAddress"><?= isset($_SESSION['user']['address']) ? $_SESSION['user']['address'] : '' ?></textarea>
                                        <p class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="examplePhoneNumber" class="form-label">Số điện thoại</label>
                                        <input name="phoneNumber" type="text" class="form-control" id="examplePhoneNumber" value="<?= isset($_SESSION['user']['phone_number']) ? $_SESSION['user']['phone_number'] : '' ?>">
                                        <p class="text-danger"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleNote" class="form-label">Ghi chú</label>
                                        <textarea name="note" id="" class="form-control" cols="30" rows="1" id="exampleNote"></textarea>
                                        <p class="text-danger"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button name="create" type="submit" class="header-cart__have-product-btn btn">THANH TOÁN</button>
                    </form>
                </div>
            <?php else : ?>
                <div class="header-cart__not-product--cart header-cart__not-product">
                    <i class="header-cart__not-product-icon ti-shopping-cart"></i>
                    <p class="header-cart__not-product-description">Không có sản phẩm nào trong giỏ hàng của bạn</p>
                    <a class="header-cart__not-product-link" href="index.php?act=products">Vào trang sản phẩm</a>
                </div>
            <?php endif; ?>




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
                    Có thể bạn thích
                </span>
                <a href="#" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
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
                </a>
                <a href="#" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
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
                </a>
                <a href="#" class="wrap-item__product wrap-item__item-link list-group-item d-flex justify-content-between align-items-start">
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
                </a>

            </div>
        </aside>
    </div>
</div>


<script>
    var cartQuantity = <?= isset($carts) ? sizeof($carts) : 0 ?>;
    console.log(cartQuantity);
    if (cartQuantity && cartQuantity > 0) {
        for (let i = 0; i < cartQuantity; i++) {
            window['minusButton' + i] = document.getElementById(`minus-btn-${i}`);
            window['plusButton' + i] = document.getElementById(`plus-btn-${i}`);
            window['quantity' + i] = document.getElementById(`quantity-${i}`);
            window['oneCart' + i] = document.querySelector(`#js-update-one-cart-${i}`);
            window['productDetailId-' + i] = document.querySelector(`#js-product-detail-id-${i}`);

            // Xử lý sự kiện khi người dùng nhấp vào nút tăng giảm số lượng
            window['minusButton' + i].addEventListener("click", function() {
                if (window['quantity' + i].value > 1) {
                    window['quantity' + i].value = parseInt(window['quantity' + i].value) - 1;
                }
            });

            // viết lại card 
            window['plusButton' + i].addEventListener("click", function() {
                window['quantity' + i].value = parseInt(window['quantity' + i].value) + 1;
            });

            window['oneCart' + i].addEventListener("click", function() {
                // alert(window['quantity' + i].value);
                // alert(window['productDetailId-' + i].value);
                window['oneCart' + i].href = `index.php?act=cart_one_update&id=${window['productDetailId-' + i].value}&quantity=${window['quantity' + i].value}`;
            });
        }
    }
</script>