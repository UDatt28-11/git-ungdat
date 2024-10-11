<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUản lí danh mục </title>
</head>

<body>
    <h2>Thêm Danh mục</h2>
    <form action="?act=them-nhan-vien" method="POST">
        <label for="">Nhập tên danh mục</label>
        <br>
        <input type="text" name="ten_danh_muc" placeholder="Vui lòng nhập tên danh mục">
        <span style="color: red;">
            <?= !empty($_SESSION['error']['ten_danh_muc']) ?$_SESSION['error']['ten_danh_muc']: ''?>
        </span> <br> <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>