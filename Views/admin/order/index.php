<div class="container">
    <div class="my-5 row flex align-items-center">
        <h1 class="">Danh sách đơn hàng:</h1>
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
    <div class="table mb-5">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th class="ps-5 py-4 fs-4">Mã đơn hàng</th>
                    <th class="py-4 fs-4">Số sản phẩm</th>
                    <th class="py-4 fs-4">Giá trị đơn</th>
                    <th class="py-4 fs-4">Ship</th>
                    <th class="py-4 fs-4">Tổng thanh toán</th>
                    <th class="py-4 fs-4">Trạng thái</th>
                    <th class="py-4 fs-4">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($orders) && $orders) : ?>
                    <?php foreach ($orders as $key => $order) :
                        extract($order);
                        if (isset($order_code)) {
                            $detail = "index.php?act=admin_order_details&id=" . $order_code;
                            $edit = "index.php?act=admin_orders_edit&id=" . $order_code;
                        }
                    ?>
                        <tr>
                            <td class="ps-5"><?= isset($order_code) ? $order_code : "" ?></td>
                            <td class="text-center"><?= isset($quantity_product) ? $quantity_product : "" ?></td>
                            <td><?= isset($price_total) ? number_format($price_total, 0, ",", ".") : "" ?></td>
                            <td><?= isset($ship) ? number_format($ship, 0, ",", ".") : "" ?></td>
                            <td><?= isset($payment_price) ? number_format($payment_price, 0, ",", ".") : "" ?></td>
                            <td>
                                <?php if (defined('AR_STATUS_OD') && is_array(AR_STATUS_OD) && AR_STATUS_OD) :
                                    foreach (AR_STATUS_OD as $key => $item) : ?>
                                        <?= isset($status) && $status == $key ? $item : "" ?>
                                <?php endforeach;
                                endif; ?>
                            </td>
                            <td>
                                <a href="<?= isset($detail) ? $detail : "" ?>" class="btn btn-sm btn-primary">Chi tiết đơn hàng</a>
                                <a href="<?= isset($edit) ? $edit : "" ?>" class="btn btn-sm btn-outline-success">Cập nhật trạng thái</a>
                            </td>
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
</div>