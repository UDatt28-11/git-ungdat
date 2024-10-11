<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
</head>

<body>
    <h2>Sửa Danh Mục</h2>
    <form action="?act=update-nhan-vien" method="POST">
        <input type="hidden" name="id" value="<?= $update['id'] ?>">
        Nhập tên danh mục : <br>
        <br>
        <input type="text" name="ten_danh_muc" placeholder="nhập tên danh mục" value="<?=$update['ten_danh_muc']?>">
        <span>
            <?= !empty($_SESSION['error']['ten_danh_muc']) ?$_SESSION['error']['ten_danh_muc']: ''?>
        </span> <br> <br>
        <button type="submit">Cập nhật Danh Mục</button>
    </form>
</body>

</html>