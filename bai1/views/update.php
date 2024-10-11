<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh saschh người dùng</title>
</head>

<body>
    <h2>Sửa Chức Vụ</h2>
    <form action="?act=update-nhan-vien" method="POST">
        <input type="hidden" name="id" value="<?= $update['id'] ?>">
        nhập tên chức vụ : <br>
        <input type="text" name="ten_chuc_vu" placeholder="nhập tên chức vụ" value="<?=$update['ten_chuc_vu']?>">
        <span>
            <?= !empty($_SESSION['error']['ten_chuc_vu']) ?$_SESSION['error']['ten_chuc_vu']: ''?>
        </span> <br> <br>
        <button type="submit">Cập nhật chức vụ</button>
    </form>
</body>

</html>