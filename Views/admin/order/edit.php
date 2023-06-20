<div class="container">
    <?php
    extract($order);
    ?>
    <h1 class="mb-5">Cập nhật trạng thái đơn hàng: "<?= isset($order_code) ? $order_code : "" ?>"</h1>
    <form action="index.php?act=admin_orders_update" class="form" method="POST">
        <div class=" mb-3">
            <label for="exampleStatus" class="form-label">Trạng thái đơn hàng:</label>
            <select name="status" class="form-select" id="exampleStatus" aria-label="Default select example">
                <option value="" selected style="display: none;">Mở chọn trạng thái tài khoản</option>
                <?php if (defined('AR_STATUS_OD') && is_array(AR_STATUS_OD) && AR_STATUS_OD) :
                    foreach (AR_STATUS_OD as $key => $item) : ?>
                        <option value="<?= $key ?>" <?= isset($status) && $status == $key ? "selected" : "" ?>> <?= $item ?></option>
                <?php endforeach;
                endif; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleDeliveryTime" class="form-label">Thời gian hoàn thành giao hàng: <span class="text-danger">Hãy chọn khi đơn hàng đã được giao!</span></label>
            <input value="<?= isset($delivery_time) ? $delivery_time : "" ?>" type="date" name="deliveryTime" id="exampleDeliveryTime" class="form-control">
        </div>
        <div class="mb-3">
            <input type="hidden" name="code" class="form-control" value="<?= isset($order_code) ? $order_code : "" ?>">
            <input type="submit" name="update" value="Cập nhật" onclick="return confirm('Bạn có muốn cập nhật không')" class="btn btn-primary"></input>
            <input type="reset" class="btn btn-outline-danger" value="Nhập lại"></input>
            <a href="index.php?act=admin_orders" class="btn btn-outline-success">Danh sách</a>
        </div>
</div>
</form>
</div>