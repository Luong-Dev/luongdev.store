<?php
include_once './Models/Cart.php';
include_once './Models/product.php';

function cartControl()
{
    if (isset($_SESSION['user']['id']) && $_SESSION['user']['id']) {
        $carts = getCartsOneUser($_SESSION['user']['id']);

        include "./Views/user/layouts/header.php";
        include "./Views/user/cart/index.php";
        include "./Views/user/layouts/footer.php";
    } else {
        $_SESSION['notify']['error'] = "Mã tài khoản của bạn không tồn tại!";
        header("location: " . URL_HOME);
    }
}

function createCartControl()
{
    if (isset($_POST['productId']) && is_numeric($_POST['productId']) && isset($_SESSION['user']['id']) && $_SESSION['user']['id']) {
        $productId = $_POST['productId'];
        $productQuantity = $_POST['productQuantity'];
        $product = getProduct($productId);
        $checkProductInCart = getCartWithOther($productId, $_SESSION['user']['id']);
        if (empty($checkProductInCart) && ($productQuantity > $product['quantity'] || $productQuantity <= 0)) {
            $_SESSION['notify']['error'] = 'Số lượng bạn thêm vượt quá giới hạn cho phép là: ' . $product['quantity'] . ', hoặc không hợp lệ. Vui lòng chọn lại!';
            header("location: index.php?act=product_detail&id=" . $productId);
            exit();
        }
        if ($checkProductInCart) {
            if ($checkProductInCart['quantity'] + $productQuantity > $product['quantity']) {
                $_SESSION['notify']['error'] = 'Sản phẩm đã có trong giỏ hàng. Tổng số lượng vượt quá tồn kho là: ' . $product['quantity'] . 'sản phẩm, vui lòng chọn lại!';
                header("location: index.php?act=product_detail&id=" . $productId);
                exit();
            } else {
                putQuantityCartHaveSum($productQuantity, $checkProductInCart['id']);
                $_SESSION['notify']['success'] = "Sản phẩm đã được bạn thêm trước đó vào giỏ hàng. Chúng tôi đã cộng thêm số lượng cho bạn!";
                header("location: index.php?act=product_detail&id=" . $productId);
                exit();
            }
        }
        postCart($productQuantity, $productId, $_SESSION['user']['id']);
        $_SESSION['notify']['success'] = "Thêm sản phẩm vào giỏ hàng thành công!";
        header("location: index.php?act=product_detail&id=" . $productId);
    } else {
        $_SESSION['notify']['error'] = "Thao tác lỗi, sai mã sản phẩm hoặc chưa đăng nhập!";
        header("location: " . URL_PR_US);
    }
}

function deleteOneProductCart()
{
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $cart = getCart($id);
        if ($cart) {
            deleteCart($id);
            $_SESSION['notify']['success'] = "Xóa sản phẩm thành công!";
            header("location: index.php?act=cart");
        } else {
            $_SESSION['notify']['error'] = "Không tồn tại sản phẩm này trong giỏ hàng";
            header("location: index.php?act=cart");
        }
    } else {
        $_SESSION['notify']['error'] = "Không tồn tại sản phẩm này";
        header("location: index.php?act=cart");
    }
}

function updateOneProductCart()
{
    if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['quantity']) && is_numeric($_GET['quantity'])) {
        $id = $_GET['id'];
        $cart = getCart($id);
        $quantityInput = $_GET['quantity'];
        if (isset($cart) && $cart) {
            $product = getProduct($cart['product_id']);
            if ($quantityInput > $product['quantity'] || $quantityInput <= 0) {
                $_SESSION['notify']['error'] = 'Số lượng bạn chọn đã vượt quá giới hạn cho phép là: ' . $product['quantity'] . ', hoặc không hợp lệ. Vui lòng chọn lại!';
                header("location: index.php?act=cart");
            } else {
                putQuantityCartNoSum($quantityInput, $id);
                $_SESSION['notify']['success'] = 'Cập nhật thành công số lượng sản phẩm: ' . $product['name'];
                header("location: index.php?act=cart");
            }
        } else {
            $_SESSION['notify']['error'] = "Không tồn tại sản phẩm này trong giỏ hàng";
            header("location: index.php?act=cart");
        }
    } else {
        $_SESSION['notify']['error'] = "Link bạn yêu cầu không chính xác! Nên thao tác theo trình tự!";
        header("location: index.php?act=cart");
    }
}
