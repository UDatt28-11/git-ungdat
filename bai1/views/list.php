<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Danh Sách Nhân Viên</h2>
    <a href="?act=form-add"><button>thêm nhân viên</button></a>
    <table border="1">
        <thead>
            <th>id</th>
            <th>tên chức vụ</th>
            <th>thao tác</th>
        </thead>
        <tbody>
            <?php foreach($listChucVu as $key=>$list): ?>
            <tr>
                <td><?=$key+1?></td>
                <td><?=$list['ten_chuc_vu']?></td>
                <td>
                    <a href="?act=edit-nhan-vien&id=<?= $list['id'] ?>">
                        <button>Sửa</button>
                    </a>
                    <form action="?act=delete-chuc-vu" method="POST"
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