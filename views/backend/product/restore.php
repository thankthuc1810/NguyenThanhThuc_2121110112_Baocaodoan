<?php

use App\Models\Product;
use App\Libraries\Mystring;

$id = $_REQUEST['id'];
$row = Product::find($id);
$row->status = 2;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = 1;
$row->save();
Mystring::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
header('location:index.php?option=Product&cat=trash');
