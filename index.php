<?php

session_start();

include_once "./Controllers/Controller.php";
include_once "./Controllers/HomeController.php";
include_once "./Controllers/ProductCategoryController.php";
include_once "./Controllers/ProductController.php";
include_once "./Controllers/CartController.php";
include_once "./Controllers/OrderController.php";
include_once "./Controllers/OrderDetailController.php";
include_once "./Controllers/AccountController.php";
include_once "./Controllers/CommentController.php";
include_once "./Controllers/StatisticalController.php";

// mỗi lần về index đều phải check tài khoản và quyền của session
if (isset($_SESSION['user'])) {
    confirmAuthUser();
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // Pages Admin
    switch ($act) {
        case 'admin':
            checkRoleAdmin();
            homeAdminControl();
            break;

            // product_category
        case 'admin_product_categories':
            checkRoleAdmin();
            productCategoriesControl();
            break;

        case 'admin_product_categories_create':
            checkRoleAdmin();
            createProductCategoryControl();
            break;

            // case 'admin_product_categories_store':
            //     storeProductCategoryControl();
            //     break;

        case 'admin_product_categories_delete':
            checkRoleAdmin();
            deleteProductCategoryControl();
            break;

        case 'admin_product_categories_edit':
            checkRoleAdmin();
            editProductCategoryControl();
            break;

        case 'admin_product_categories_update':
            checkRoleAdmin();
            updateProductCategoryControl();
            break;

            // product
        case 'admin_products':
            checkRoleAdmin();
            productsControl();
            break;

        case 'admin_products_create':
            checkRoleAdmin();
            createProductControl();
            break;

        case 'admin_products_delete':
            checkRoleAdmin();
            deleteProductControl();
            break;

        case 'admin_products_edit':
            checkRoleAdmin();
            editProductControl();
            break;

        case 'admin_products_update':
            checkRoleAdmin();
            updateProductControl();
            break;

        case 'admin_products_detail':
            checkRoleAdmin();
            detailProductControl();
            break;

            // Account
        case 'admin_accounts':
            checkRoleAdmin();
            accountsControl();
            break;

        case 'admin_accounts_create':
            checkRoleAdmin();
            createAccountControl();
            break;

        case 'admin_accounts_delete':
            checkRoleAdmin();
            deleteAccountControl();
            break;

        case 'admin_accounts_edit':
            checkRoleAdmin();
            editAccountControl();
            break;

        case 'admin_accounts_update':
            checkRoleAdmin();
            updateAccountControl();
            break;

            // Order
        case 'admin_orders':
            checkRoleAdmin();
            ordersControl();
            break;

        case 'admin_orders_edit':
            checkRoleAdmin();
            editOrdersControl();
            break;

        case 'admin_orders_update':
            checkRoleAdmin();
            updateOrdersControl();
            break;

        case 'admin_order_details':
            checkRoleAdmin();
            orderDetailsControl();
            break;





            // comment
        case 'admin_comments':
            checkRoleAdmin();
            commentsControl();
            break;

        case 'admin_comments_detail':
            checkRoleAdmin();
            detailCommentControl();
            break;

        case 'admin_comments_delete':
            checkRoleAdmin();
            deleteCommentControl();
            break;

            // statistical

        case 'statistical':
            checkRoleAdmin();
            statisticalControl();
            break;



            // Pages User
        case '':
            homeUserControl();
            break;

        case 'products':
            productUserControl();
            break;

        case 'product_detail':
            productDetailUserControl();
            break;

        case 'contacts':
            include "./Views/user/layouts/header.php";
            include "./Views/user/layouts/footer.php";
            break;

        case 'sales':
            include "./Views/user/layouts/header.php";
            include "./Views/user/layouts/footer.php";
            break;

        case 'wishlist':
            include "./Views/user/layouts/header.php";
            include "./Views/user/layouts/footer.php";
            break;

            // cart
        case 'cart':
            checkRoleFull();
            cartControl();
            break;

        case 'cart_create':
            checkRoleFull();
            createCartControl();
            break;

        case 'cart_one_delete':
            checkRoleFull();
            deleteOneProductCartControl();
            break;

        case 'cart_one_update':
            checkRoleFull();
            updateOneProductCartControl();
            break;

            // Order
        case 'order':
            checkRoleFull();
            orderControl();
            break;


        case 'order_create':
            checkRoleFull();
            createOrderControl();
            break;



        case 'order_change':
            checkRoleFull();
            changeOrderControl();
            break;


            // order detail
        case 'order_detail':
            checkRoleFull();
            OrderDetailsUserControl();
            break;


            // hình ảnh user bình luận
            // thống kê đơn hàng
            // validate
            // check ràng buộc khi xóa các thứ liên quan, chú ý chỗ order với order detail đã bị mất ràng buộc
            // lọc
            // tìm kiếm
            // phân trang


            // account
        case 'register':
            checkUseLogged();
            registerAccountControl();
            break;

        case 'login':
            checkUseLogged();
            loginAccountControl();
            break;

        case 'login_submit':
            checkUseLogged();
            loginSubmitAccountControl();
            break;

        case 'account_logout':
            checkRoleFull();
            logoutAccountControl();
            break;

        case 'profile':
            checkRoleFull();
            profileControl();
            break;

        case 'update_profile':
            checkRoleFull();
            updateProfileControl();
            break;

        case 'edit_password':
            checkRoleFull();
            editPassword();
            break;

        case 'update_password':
            checkRoleFull();
            updatePassword();
            break;

        case 'forgot_password':
            checkUseLogged();
            forgotPassword();
            break;

        case 'confirm_email':
            checkUseLogged();
            confirmEmail();
            break;

        case 'confirm_verification_code':
            checkUseLogged();
            confirmVerificationCode();
            break;

        case 'verification_code':
            checkUseLogged();
            verificationCode();
            break;

        case 'edit_password_forgot':
            checkUseLogged();
            editPasswordForgot();
            break;

        case 'update_password_forgot':
            checkUseLogged();
            updatePasswordForgot();
            break;



        default:

            include "./Views/errors/error404.php";
            break;
    }
} else {
    homeUserControl();
}
