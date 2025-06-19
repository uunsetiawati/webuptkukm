<!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?=base_url('uploads/thumbnails/'.$postdetail['thumbnail'])?>" style="height:500px;object-fit:cover;width:100%;border-radius: 20px; overflow: hidden; box-shadow: 1px 10px 10px rgba(0, 0, 0, 0.2);" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?=$postdetail['judul']?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> <?=$postdetail['penulis']?></a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i> <?=tanggal_indo($postdetail['created_at'])?></a></li>
                     </ul>
                     <p class="excert">
                        <?=$postdetail['isi']?>
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title"><?=$title?></h3>
                     <?php foreach($postberita as $pb):?>
                     <div class="media post_item">
                        <img src="<?=base_url('uploads/thumbnails/'.$pb['thumbnail'])?>" style="width:100px;object-fit:cover; border-radius:10px" alt="post">
                        <div class="media-body">
                           <a href="<?=base_url('home/details/'.$pb['slug'])?>">
                              <h3><?=$pb['judul']?></h3>
                           </a>
                           <p><?=tanggal_indo($pb['created_at'])?></p>
                        </div>
                     </div>
                     <?php endforeach;?>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->