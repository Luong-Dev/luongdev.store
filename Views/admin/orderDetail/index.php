<div class="container">
    <div class="my-3 row flex align-items-center">
        <h1 class="">Chi tiết đơn hàng: <?= isset($orderCode) ? $orderCode : "" ?></h1>
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
    <?php if (isset($order) && $order) : ?>
        <div class="row mb-2">
            <div class="col-md-6">
                <p class="my-2">Tên: <?= isset($order['name']) ? $order['name'] : "" ?></p>
                <p class="my-2">Số điện thoại: <?= isset($order['phone_number']) ? $order['phone_number'] : "" ?></p>
                <p class="my-2">Địa chỉ: <?= isset($order['address']) ? $order['address'] : "" ?></p>
                <p class="my-2">Trạng thái:
                    <?php if (defined('AR_STATUS_OD') && is_array(AR_STATUS_OD) && AR_STATUS_OD) :
                        foreach (AR_STATUS_OD as $key => $item) : ?>
                            <?= isset($order['status']) && $order['status'] == $key ? $item : "" ?>
                    <?php endforeach;
                    endif; ?>
                </p>
                <p class="my-2">Ngày đặt: <?= isset($order['created_at']) ? $order['created_at'] : "" ?></p>
            </div>
            <div class="col-md-6">
                <p class="my-2">Tổng tiền: <?= isset($order['price_total']) ? number_format($order['price_total'], 0, ",", ".") : "" ?></p>
                <p class="my-2">Tiền ship: <?= isset($order['ship']) ? number_format($order['ship'], 0, ",", ".") : "" ?></p>
                <p class="my-2">Tổng thanh toán: <?= isset($order['payment_price']) ? number_format($order['payment_price'], 0, ",", ".") : "" ?></p>
                <p class="my-2">Ngày giao: <?= isset($order['delivery_time']) ? $order['delivery_time'] : "Chưa cập nhật" ?></p>
            </div>
        </div>
    <?php endif; ?>

    <div class="table mb-5">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th class="ps-5 py-2 fs-3">Tên sản phẩm</th>
                    <th class=" py-2 fs-3">Hình ảnh</th>
                    <th class=" py-2 fs-3">Size, Màu</th>
                    <th class="py-2 fs-3">Số lượng</th>
                    <th class="py-2 fs-3">Giá gốc</th>
                    <th class="py-2 fs-3">Giá giảm</th>
                    <th class="py-2 fs-3">Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($orderDetails) && $orderDetails) :
                    foreach ($orderDetails as $key => $orderDetail) :
                        extract($orderDetail);
                ?>
                        <tr>
                            <td class="ps-5"><a href="index.php?act=product_detail&id=<?= isset($id) ? $id : '' ?>"><?= isset($name) ? $name : "" ?></a></td>
                            <td><img src="<?= isset($image) ? $image : "" ?>" alt="Hình ảnh" style="height: 50px;"></td>
                            <td>
                                <p><?= isset($color) ? $color : "" ?></p>
                                <p><?= isset($size) ? $size . ' Inch' : "" ?></p>
                            </td>
                            <td><?= isset($quantity) ? $quantity : "" ?></td>
                            <td><?= isset($regular_price) ? number_format($regular_price, 0, ",", ".") : "" ?></td>
                            <td><?= isset($sale_price) ? number_format($sale_price, 0, ",", ".") : "" ?></td>
                            <td><?= isset($price_total) ? number_format($price_total, 0, ",", ".") : "" ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger text-center fw-bold fs-2">Chưa có sản phẩm nào!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <a href="index.php?act=admin_orders" name="add-new" class="btn btn-primary">Quay lại</a>
    </div>
</div>