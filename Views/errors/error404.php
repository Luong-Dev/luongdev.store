<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Không tồn tại đường link</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 pt-5 text-center">
        <?php if (isset($_SESSION['notify']['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['notify']['success'] ?>
                <button type="button" class="btn-close bg-success" style="padding: 13px 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <h2 class="mt-5 pt-5 text-danger">Không tồn tại đường link này!</h2>
        <p class="mt-3 text-danger">Vui lòng kiểm tra lại đường link!</p>
        <a href="index.php">Quay lại</a>
    </div>
</body>

</html>