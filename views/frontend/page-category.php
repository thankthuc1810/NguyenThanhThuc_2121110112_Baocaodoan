<?php

use App\Models\Post;

$slug = $_REQUEST['cat'];
$page = Post::where([['slug', '=', $slug], ['type', '=', 'page'], ['status', '=', 1]])->first();

?>

<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
   <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
         <ol class="breadcrumb py-2 my-0">
            <li class="breadcrumb-item">
               <a class="text-main" href="index.php">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               Trang đơn
            </li>

         </ol>
      </nav>
   </div>
</section>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <ul class="list-group mb-3 list-page">
               <li class="list-group-item bg-main py-3">Các trang khác</li>
               <li class="list-group-item">
                  <a href="post_page.html">Chính sách mua hàng</a>
               </li>
               <li class="list-group-item">
                  <a href="post_page.html">Chính sách vận chuyển</a>
               </li>
               <li class="list-group-item">
                  <a href="post_page.html">Chính sách đổi trả</a>
               </li>
               <li class="list-group-item">
                  <a href="post_page.html">Chính sách bảo hành</a>
               </li>
            </ul>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <?php if ($page) : ?>
               <h1 class="fs-2 text-main"><?= $page->title; ?></h1>
               <p><?= $page->detail; ?></p>
            <?php else : ?>
               <p>Chào mừng bạn đến với trang web của chúng tôi - điểm đến tuyệt vời cho những người đam mê trang sức và muốn tìm kiếm những mảnh ghép đẹp nhất để tôn lên vẻ đẹp và phong cách cá nhân của mình. Chúng tôi tự hào giới thiệu đến bạn một không gian mua sắm trực tuyến độc đáo, nơi bạn có thể khám phá và lựa chọn từ một bộ sưu tập trang sức đa dạng và đẹp mắt.

                  Về Chúng Tôi
                  Chúng tôi là đội ngũ đam mê trang sức, cam kết mang đến cho khách hàng những sản phẩm chất lượng cao với thiết kế độc đáo và phong cách đa dạng. Tại trang web của chúng tôi, bạn sẽ không chỉ tìm thấy những chiếc vòng cổ, dây chuyền, nhẫn và bông tai đẹp mắt mà còn trải nghiệm sự chăm sóc tận tâm và dịch vụ chuyên nghiệp từ đội ngũ chăm sóc khách hàng của chúng tôi.

                  Bộ Sưu Tập Đa Dạng
                  Chúng tôi hiểu rằng mỗi người đều có phong cách và sở thích riêng biệt. Vì vậy, chúng tôi tự hào mang đến cho bạn một bộ sưu tập đa dạng với các kiểu dáng từ truyền thống đến hiện đại, từ trang trí nhẹ nhàng đến cá tính và nổi bật. Bạn sẽ dễ dàng tìm thấy sản phẩm phản ánh cá tính và phong cách của mình.

                  Chất Lượng và Độ Tin Cậy
                  Chúng tôi cam kết đảm bảo chất lượng cao cho tất cả các sản phẩm trên trang web của mình. Mỗi mảnh trang sức được chế tác tỉ mỉ từ các nguyên liệu chọn lọc, mang lại độ bền và vẻ đẹp lâu dài. Chúng tôi tin rằng sự tin tưởng của bạn là quan trọng nhất, và vì vậy, chúng tôi luôn nỗ lực để đáp ứng mọi mong đợi của khách hàng.

                  Dịch Vụ Chăm Sóc Khách Hàng
                  Sự hài lòng của khách hàng là ưu tiên hàng đầu của chúng tôi. Đội ngũ chăm sóc khách hàng của chúng tôi luôn sẵn lòng hỗ trợ bạn trong quá trình mua sắm và trả lời mọi thắc mắc của bạn. Chúng tôi không chỉ cung cấp sản phẩm tốt, mà còn mang đến trải nghiệm mua sắm trực tuyến thuận lợi và thoải mái.

                  Khám Phá và Mua Sắm Ngay Hôm Nay
                  Hãy để chúng tôi là người đồng hành trong hành trình tìm kiếm những mảnh trang sức đẹp nhất cho phong cách của bạn. Dù bạn là người yêu thích sự thanh lịch, truyền thống, hay phóng khoáng, trang web của chúng tôi sẽ là địa điểm lý tưởng để bạn thỏa sức sáng tạo và biến ý tưởng thành hiện thực.

                  Hãy khám phá bộ sưu tập của chúng tôi ngay hôm nay và tạo nên những khoảnh khắc đẹp bằng những mảnh trang sức tuyệt vời từ trang web của chúng tôi..</p>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>
<?php require_once "views/frontend/footer.php"; ?>