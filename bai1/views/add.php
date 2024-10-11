<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUản lí nhân viên </title>
</head>

<body>
    <h2>Thêm Nhân Viên</h2>
    <form action="?act=them-nhan-vien" method="POST">
        <label for="">Nhập tên chức vụ</label>
        <br>
        <input type="text" name="ten_chuc_vu" placeholder="Vui lòng nhập tên chức vụ">
        <span style="color: red;">
            <?= !empty($_SESSION['error']['ten_chuc_vu']) ?$_SESSION['error']['ten_chuc_vu']: ''?>
        </span> <br> <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>