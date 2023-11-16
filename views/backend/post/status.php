<?php

use App\Models\Post;
use App\Libraries\Mystring;

$id = $_REQUEST['id'];
$row = Post::find($id);
if ($row == null) {
    Mystring::set_flash('message', ['type' => 'danger', 'msg' => 'Lỗi 404']);
    header('location:index.php?option=Post');
}
$row->status = ($row['status'] == 1) ? 2 : 1;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = 1;
$row->save();
Mystring::set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);
header('location:index.php?option=Post');