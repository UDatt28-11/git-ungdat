<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí người dùng</title>
</head>

<body>
    <h2>Sửa Thông Tin Người Dùng</h2>
    <form action="?act=updateNGDUng" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$update['id']?>">


        <input type="text" name="old_img" value="<?php echo $update['anh_dai_dien'];  ?>" hidden>
        Hình ảnh đại diện <br>
        <input type="file" name="anh_dai_dien"><br>


        Họ Và Tên: <br>
        <input type="text" name="ho_ten" placeholder="Nhập họ tên" value="<?=$update['ho_ten']?>"><br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['ho_ten']) ? $_SESSION['error']['ho_ten'] : '' ?>
        </span> <br> <br>

        Nhập email: <br>
        <input type="text" name="email" placeholder="Nhập email" value="<?=$update['email']?>"> <br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '' ?>
        </span> <br> <br>

        Ngày sinh: <br>
        <input type="date" name="ngay_sinh" placeholder="Nhập ngày sinh" value="<?=$update['ngay_sinh']?>"> <br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['ngay_sinh']) ? $_SESSION['error']['ngay_sinh'] : '' ?>
        </span> <br> <br>

        Số điện thoại: <br>
        <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại" value="<?=$update['so_dien_thoai']?>">
        <br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['so_dien_thoai']) ? $_SESSION['error']['so_dien_thoai'] : '' ?>
        </span> <br> <br>

        Địa chỉ: <br>
        <input type="text" name="dia_chi" placeholder="Nhập địa chỉ" value="<?=$update['dia_chi']?>"> <br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['dia_chi']) ? $_SESSION['error']['dia_chi'] : '' ?>
        </span> <br> <br>

        <label for="">Giới tính:</label>
        <select name="gioi_tinh" id="">
            <option value="0" <?= $update['gioi_tinh'] == 0 ? 'selected' : '' ?>>Nữ</option>
            <option value="1" <?= $update['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nam</option>
        </select> <br> <br>

        Mật khẩu: <br>
        <input type="password" name="mat_khau" placeholder="Nhập password" value="<?=$update['mat_khau']?>"> <br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['mat_khau']) ? $_SESSION['error']['mat_khau'] : '' ?>
        </span> <br> <br>



        Chức vụ ID: <br>
        <input type="text" name="chuc_vu_id" placeholder="Nhập chức vụ ID" value="<?=$update['chuc_vu_id']?>"> <br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['chuc_vu_id']) ? $_SESSION['error']['chuc_vu_id'] : '' ?>
        </span> <br> <br>

        Trạng thái: <br>
        <input type="text" name="trang_thai" placeholder="Nhập trạng thái" value="<?=$update['trang_thai']?>"> <br>
        <span style="color:red;">
            <?= !empty($_SESSION['error']['trang_thai']) ? $_SESSION['error']['trang_thai'] : '' ?>
        </span> <br> <br>

        <button type="submit">Cập nhật</button>
    </form>
</body>

</html>