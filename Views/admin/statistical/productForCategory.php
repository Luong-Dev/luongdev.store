<!-- <title>Biểu đồ</title> -->
<main class="container mt-5 mb-5">
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
    <h1 class="mt-5">Thống kê hàng hóa theo từng loại</h1>
    <div class="table mt-4">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th class="ps-5">Tên loại</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($chartWithProductCategories) && !empty($chartWithProductCategories)) : ?>
                    <?php foreach ($chartWithProductCategories as $key => $chartWithProductCategory) :
                        extract($chartWithProductCategory);
                    ?>
                        <tr>
                            <td class="ps-5"><?= isset($name) ? $name : "" ?></td>
                            <td><?= isset($product_quantity) ? $product_quantity : "" ?></td>
                            <td><?= isset($max_price) ? $max_price : "Không có" ?></td>
                            <td><?= isset($min_price) ? $min_price : "Không có" ?></td>
                            <td><?= isset($avg_price) ? $avg_price : "Không có" ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="12" class="text-danger text-center fw-bold fs-2">Chưa có loại hàng nào!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- biểu đồ chart-->
    <div id="chart_div"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php if (isset($chartWithProductCategories) && !empty($chartWithProductCategories)) :
                    foreach ($chartWithProductCategories as $chartWithProductCategory) :
                        extract($chartWithProductCategory);
                ?>['<?= isset($name) ? $name : '' ?>', <?= isset($product_quantity) ? $product_quantity : 0 ?>],
                <?php
                    endforeach;
                endif;
                ?>
                // ['Mushrooms', 4],
                // ['Onions', 3],
                // ['Olives', 2],
                // ['Zucchini', 0],
                // ['Pepperoni', 0]
            ]);
            // Set chart options
            var options = {
                'title': 'Biểu đồ thống kê hàng hóa theo từng loại',
                is3D: true,
                width: 1200,
                height: 500,
                sliceVisibilityThreshold: 0
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</main>