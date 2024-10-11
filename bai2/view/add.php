<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí người dùng</title>
</head>

<body>
    <h2>Thêm Chức Vụ Mới</h2>
    <form action="?act=themNgDung" method="POST" enctype="multipart/form-data">
        hinh ảnh đại diện <br>
        <input type="file" name="anh_dai_dien"> <br>

        Họ Và Tên : <br>
        <input type="text" name="ho_ten" placeholder="nhập họ và tên"> <br>
        <span>
            <?= !empty($_SESSION['error']['ho_ten']) ? $_SESSION['error']['ho_ten'] : '' ?>
        </span> <br> <br>

        nhập email : <br>
        <input type="text" name="email" placeholder="nhập email"> <br>
        <span>
            <?= !empty($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '' ?>
        </span> <br> <br>

        ngày sinh: <br>
        <input type="text" name="ngay_sinh" placeholder="nhập ngày sinh"> <br>
        <span>
            <?= !empty($_SESSION['error']['ngay_sinh']) ? $_SESSION['error']['ngay_sinh'] : '' ?>
        </span> <br> <br>

        số điện thoại : <br>
        <input type="text" name="so_dien_thoai" placeholder="nhập  số điện thoại"> <br>
        <span>
            <?= !empty($_SESSION['error']['so_dien_thoai']) ? $_SESSION['error']['so_dien_thoai'] : '' ?>
        </span> <br> <br>

        Địa chỉ : <br>
        <input type="text" name="dia_chi" placeholder="nhập Địa chỉ "> <br>
        <span>
            <?= !empty($_SESSION['error']['dia_chi']) ? $_SESSION['error']['dia_chi'] : '' ?>
        </span> <br> <br>

        <label for="">giới tính:</label>
        <select name="gioi_tinh" id="">
            <option value="0">nữ</option>
            <option value="1">nam</option>
        </select>

        mật khẩu : <br>
        <input type="password" name="mat_khau" placeholder="nhập password"> <br>
        <span>
            <?= !empty($_SESSION['error']['mat_khau']) ? $_SESSION['error']['mat_khau'] : '' ?>
        </span> <br> <br>


        chức vụ ID : <br>
        <input type="text" name="chuc_vu_id" placeholder="nhập tên chức vụ"> <br>
        <span>
            <?= !empty($_SESSION['error']['chuc_vu_id']) ? $_SESSION['error']['chuc_vu_id'] : '' ?>
        </span> <br> <br>

        trạng thái: <br>
        <input type="text" name="trang_thai" placeholder="nhập tên chức vụ"> <br>
        <span>
            <?= !empty($_SESSION['error']['trang_thai']) ? $_SESSION['error']['trang_thai'] : '' ?>
        </span> <br> <br>
        <button type="submit">thêm người dùng</button>
    </form>
</body>

</html>