<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Danh Sách Người Dùng</h2>
    <a href="?act=from-them-ng-dung"><button>Thêm người dùng</button></a>
    <br>
    <br>
    <table border="1">
        <thead>
            <th>Id</th>
            <th>Hình ảnh đại diện</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Ngày Sinh</th>
            <th>Số Điện Thoại</th>
            <th>Địa Chỉ</th>
            <th>Giới Tính</th>
            <th>Mật Khẩu</th>
            <th>Chức Vụ Id</th>
            <th>Thạng thai</th>
            <th>Thao Tác</th>
        </thead>
        <tbody>
            <?php foreach($nguoiDung as $key=>$list): ?>
            <tr>
                <td><?=$key+1?></td>
                <td><img src="<?=$list['anh_dai_dien']?> " style="width: 80px" alt=""></td>
                <td><?=$list['ho_ten']?></td>
                <td><?=$list['email']?></td>
                <td><?=$list['ngay_sinh']?></td>
                <td><?=$list['so_dien_thoai']?></td>
                <td><?=$list['dia_chi']?></td>
                <td><?=$list['gioi_tinh'] == 1 ? "Nam" : "Nữ"?></td>
                <td><?=$list['mat_khau']?></td>
                <td><?=$list['chuc_vu']?></td>
                <td><?=$list['trang_thai']?></td>
                <td>
                    <a href="?act=edit&id=<?= $list['id'] ?>">
                        <button>Sửa</button>
                    </a>
                    <form action="?act=delete-ng-dung" method="POST"
                        onsubmit="return confirm('Bạn có đồng ý xóa không?')" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>">
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
    </table>
</body>

</html>