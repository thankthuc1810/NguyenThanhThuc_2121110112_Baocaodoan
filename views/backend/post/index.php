<?php
use App\Models\post;
//SELECT * FROM  post 
$dk =[
   ['status','!=',0],
   ['status','!=',0]
   
];
$list = post::where('status','!=',0)
->select('status','id','image','slug')
->orderBy('created_at','DESC')
->get();


?>
<?php require_once'../views/backend/header.php';?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả bài viết</h1>
                     <a href="post_create.html" class="btn btn-sm btn-primary">Thêm bài viết</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header p-2">
                  Noi dung
               </div>
               <div class="card-body p-2">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tiêu đề bài viết</th>
                           <th>Tên danh mục</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if (count($list) > 0):?>
                                 <?php foreach($list as $item):?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <img src="../public/images/<?=$item->image;?>" alt="<?=$item->image;?>">
                           </td>
                           <td>
                              <div class="name">
                              <?=$item->name;?>
                              </div>
                              <div class="function_style">
                              <?php if($item->status==1):?>
                                 <a class=" text-success" href="index.php?option=post&cat=status&id=<?=$item->id;?>">Hiện</a> |
                                       <?php else:?>
                                          <?php endif;?>
                                          <a class=" text-success" href="index.php?option=post&cat=edit&id=<?=$item->id;?>">Chỉnh sửa</a> |
                                 <a class=" text-success" href="index.php?option=post&cat=show&id=<?=$item->id;?>">Chi tiết</a> |
                                 <a class=" text-success" href="index.php?option=post&cat=delete&id=<?=$item->id;?>">Xoá</a>
                              </div>
                           </td>
                           <td><?=$item->slug;?></td>
                        </tr>
                     </tbody>
                     <?php endforeach;?>
                              <?php endif; ?>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once'../views/backend/footer.php';?>