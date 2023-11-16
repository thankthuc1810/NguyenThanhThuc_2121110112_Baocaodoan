<?php

use App\Models\Category;
use App\Libraries\Mystring;

$id = $_REQUEST['id'];
$row = Category::find($id);
if ($row == null) {
    Mystring::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi 404']);
    header('location:index.php?option=category&cat=trash');
}
$row->status = 0;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = 1; // Id của người đăng nhập
$row->save(); //Lưu
Mystring::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn thành công']);
header('location:index.php?option=category');
