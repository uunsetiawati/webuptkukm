<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <?php if(!empty($slider)):?>
                                <?php foreach($slider as $s):?>
                                    <!-- Single -->
                                    <div class="single-slider">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img"> 
                                                <?php if(!empty($s['gambar'] && !empty(FCPATH.'uploads/slider/' . $s['gambar']))):?>
                                                    <img src="<?=base_url('/uploads/slider/'.$s['gambar'])?>" alt="" style="height: 600px; object-fit: cover;">
                                                <?php else: ?>
                                                    <img src="<?=base_url('/uploads/default/gedungupt.jpg')?>" alt="" style="height: 600px; object-fit: cover;">
                                                <?php endif;?>
                                                <div class="trend-top-cap">
                                                    <h2><a href="" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms"><?=$s['judul']?></a></h2>
                                                    <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms"><?=$s['deskripsi']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php else: ?>
                                <div class="single-slider">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img"> 
                                            <img src="<?=base_url('/uploads/default/gedungupt.jpg')?>" alt="slider" style="height: 600px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-20">
                                    <div class="trend-top-img">
                                        <?php if(!empty($pengumuman)):?>
                                            <?php foreach($pengumuman as $p):?>
                                                <?php if(!empty($p['gambar'] && !empty(FCPATH.'uploads/pengumuman/' . $p['gambar']))):?>
                                                    <img src="<?=base_url('uploads/pengumuman/' . $p['gambar'])?>" alt="" style="height: 375px; object-fit: cover;">
                                                    <?php else:?>
                                                        <img src="<?=base_url('uploads/default/gedungupt.jpg')?>" alt="" style="height: 375px; object-fit: cover;">
                                                    <?php endif;?>
                                                    <div class="trend-top-cap trend-top-cap2">
                                                        <h2><a href=""><?=$p['judul']?></a></h2>
                                                    </div>
                                            <?php endforeach;?> 
                                        <?php else:?>
                                            <img src="<?=base_url('uploads/default/gedungupt.jpg')?>" alt="" style="height: 375px; object-fit: cover;">
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-cap trend-top-cap2" style="border-radius: 20px; overflow: hidden; box-shadow: 1px 10px 10px rgba(0, 0, 0, 0.2);">
                                        <?php if(!empty($pengumuman)):?>
                                            <?php foreach($pengumuman as $p):?>   
                                                <?php if(!empty($p['yt'])):?>
                                                    <iframe width="100%" height="200" 
                                                        src="<?=$p['yt']?>" 
                                                        title="YouTube video player" frameborder="0" 
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                        allowfullscreen>
                                                    </iframe>
                                                    <?php else:?>
                                                    <iframe width="100%" height="200" 
                                                        src="https://www.youtube.com/embed/bAssKbDzHdk?si=NJx8XdZoJxzG-RPO" 
                                                        title="YouTube video player" frameborder="0" 
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                        allowfullscreen>
                                                    </iframe>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-20 pb-20 gray-bg">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper mb-30">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-6">
                                <div class="section-tittle mb-30">
                                    <h3>Berita Terbaru</h3>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="properties__button">
                                    <!--Nav Button  -->                                            
                                    <nav>                                                 
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Koperasi</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">UKM</a>                                        
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <?php if(!empty($posting)):?>
                                                    <div class="whates-img">
                                                        <img src="<?=base_url('/uploads/thumbnails/'.$posting['thumbnail'])?>" alt="">
                                                    </div>
                                                    <?php else:?>
                                                    <div class="whates-img">
                                                        <img src="<?=base_url('/uploads/thumbnails/gedungupt.jpg')?>" alt="">
                                                    </div>
                                                    <?php endif;?>
                                                    <?php
                                                    if(!empty($posting)){
                                                    $isi = strip_tags($posting['isi']); // hilangkan tag HTML
                                                    $maxLength = 200; // jumlah karakter yang ditampilkan

                                                    if (strlen($isi) > $maxLength) {
                                                        $short = substr($isi, 0, $maxLength) . '...';
                                                    } else {
                                                        $short = $isi;
                                                    }
                                                    ?>
                                                    <div class="whates-caption">
                                                        <h4><a href="<?=base_url('home/details/'.$posting['slug'])?>"><?=$posting['judul']?></a></h4>
                                                        <span>by <?=$posting['penulis']?>   -   <?=tanggal_indo($posting['created_at'])?></span>
                                                        <p><?=$short?></p>
                                                        <a href="<?= base_url('home/details/' . $posting['slug']) ?>" style="color: #a8bc3c; display: inline-block;">Baca Selengkapnya</a>
                                                    </div>
                                                    <?php }else{ echo "";}?>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    <?php if(!empty($koperasi)):?>
                                                    <?php foreach($koperasi as $row):?>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <?php if(!empty($row['thumbnail']) && !empty(FCPATH.'uploads/thumbnails/' . $row['thumbnail'])):?>
                                                            <div class="whats-right-img">
                                                                <img src="<?=base_url('uploads/thumbnails/'.$row['thumbnail'])?>" alt="">
                                                            </div>
                                                                <?php else: echo "Tidak Ada Gambar";
                                                                endif;?>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb"><?=$row['jenis']?></span>
                                                                <h4><a href="<?=base_url('home/details/'.$row['slug'])?>"><?=$row['judul']?></a></h4>
                                                                <p><?=tanggal_indo($row['created_at'])?></p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach;?>
                                                    <?php else: echo""; endif?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card two -->
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-7">
                                                <div class="whats-news-single mb-40">
                                                    <?php if(!empty($postingukm)):?>
                                                    <div class="whates-img">
                                                        <img src="<?=base_url('/uploads/thumbnails/'.$postingukm['thumbnail'])?>" alt="">
                                                    </div>
                                                    <?php else:?> 
                                                    <div class="whates-img">
                                                        <img src="<?=base_url('/uploads/default/gedungupt.jpg')?>" alt="">
                                                    </div>
                                                    <?php endif;?>
                                                    <?php
                                                    if(!empty($postingukm)){
                                                    $isiukm = strip_tags($postingukm['isi']); // hilangkan tag HTML
                                                    $maxLength = 200; // jumlah karakter yang ditampilkan

                                                        if (strlen($isiukm) > $maxLength) {
                                                            $shortukm = substr($isiukm, 0, $maxLength) . '...';
                                                        } else {
                                                            $shortukm = $isiukm;
                                                        }
                                                    ?>
                                                    <div class="whates-caption">
                                                        <h4><a href="<?= base_url('home/details/' . $postingukm['slug']) ?>"><?=$postingukm['judul']?></a></h4>
                                                        <span><?= $postingukm['penulis']?>   -   <?=tanggal_indo($postingukm['created_at'])?></span>
                                                        <p><?=$shortukm?></p>
                                                        <a href="<?= base_url('home/details/' . $postingukm['slug']) ?>" style="color: #a8bc3c; display: inline-block;">Baca Selengkapnya</a>
                                                    </div>
                                                    <?php  }else{ echo "";}?>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-5 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    <?php if(!empty($ukm)):?>
                                                    <?php foreach($ukm as $row):?>
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <?php if(!empty($row['thumbnail']) && !empty(FCPATH.'uploads/thumbnails/' . $row['thumbnail'])):?>
                                                            <div class="whats-right-img">
                                                                <img src="<?=base_url('uploads/thumbnails/'.$row['thumbnail'])?>" alt="">
                                                            </div>
                                                                <?php else: echo "Tidak Ada Gambar";
                                                                endif;?>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb"><?=$row['jenis']?></span>
                                                                <h4><a href="<?=base_url('home/details/'.$row['slug'])?>"><?=$row['judul']?></a></h4>
                                                                <p><?=tanggal_indo($row['created_at'])?></p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach;?>
                                                    <?php else : echo ""; endif;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- End Nav Card -->
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-4">
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Literasi KUKM</h4>
                        </div>                        
                        <!-- Single -->
                        <?php if(!empty($literasi)):?>
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <img src="<?=base_url('uploads/thumbnails/'.$literasi['thumbnail'])?>" alt="" style="width: 150px; object-fit: cover;">
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="latest_news.html"><?=$literasi['judul']?></a></h4>
                                <p><?=tanggal_indo($literasi['created_at'])?></p>
                            </div>
                        </div>   
                        <?php else:?>
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="<?=base_url('uploads/default/gedungupt.jpg')?>" alt="" style="width: 150px; object-fit: cover;">
                                </div>
                            </div>
                        <?php endif;?>                     
                    </div>
                    
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Pena Pedia</h4>
                        </div>
                        <!-- Details -->
                        <?php if(!empty($postingpena)):?>
                            <div class="most-recent mb-40">
                                <div class="most-recent-img">
                                    <?php if(!empty($postingpena['thumbnail'])):?>
                                    <img src="<?=base_url('uploads/thumbnails/'.$postingpena['thumbnail'])?>" alt="" style="height: 200px; object-fit: cover;">
                                    <?php else:?>
                                    <img src="<?=base_url('uploads/default/gedungupt.jpg')?>" alt="" style="height: 200px; object-fit: cover;">  
                                    <?php endif;?>
                                    <div class="most-recent-cap">
                                        <span class="bgbeg">Selengkapnya</span>
                                        <h4><a href="latest_news.html"><?=$postingpena['judul']?></a></h4>
                                        <p><?=$postingpena['penulis']?>  |  <?=tanggal_indo($postingpena['created_at'])?></p>
                                    </div>
                                </div>
                            </div>
                            <?php else:?>
                            <div class="most-recent mb-40">
                                <div class="most-recent-img">                                    
                                    <img src="<?=base_url('uploads/default/gedungupt.jpg')?>" alt="" style="height: 200px; object-fit: cover;"> 
                                </div>
                            </div>  
                        <?php endif;?>
                        <!-- Single -->
                        <?php if(!empty($pena)):?>
                            <?php foreach($pena as $p):?>
                                <div class="most-recent-single">                            
                                    <div class="most-recent-images">
                                        <?php if(!empty($p['thumbnail'])):?>
                                        <img src="<?=base_url('uploads/thumbnails/'.$p['thumbnail'])?>" alt="" style="width: 150px; object-fit:cover;">
                                        <?php else:?>
                                        <img src="<?=base_url('uploads/default/gedungupt.jpg')?>" alt="" style="width: 150px; object-fit:cover;">  
                                        <?php endif;?> 
                                    </div>
                                    <div class="most-recent-capt">
                                        <h4><a href="latest_news.html"><?=$p['judul']?></a></h4>
                                        <p><?=$p['penulis']?>  |  <?=tanggal_indo($p['created_at'])?></p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php else:?>
                            <div class="most-recent-single">
                                <div class="most-recent-images">
                                    <img src="<?=base_url('uploads/default/gedungupt.jpg')?>" alt="" style="width: 150px; object-fit:cover;">  
                                </div>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    
    <!--  Recent Articles start -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Bilik UMKM</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            <!-- Single -->

                            <?php if(!empty($bilik)):?>
                                <?php foreach($bilik as $b):?>
                                    <div class="single-recent">
                                        <div class="what-img">
                                            <img src="<?=base_url('uploads/thumbnails/'.$b['thumbnail'])?>" style="height:300px;object-fit:cover" alt="">
                                        </div>
                                        <div class="what-cap">
                                            <h4><a href="#" > <h4><a href="<?=base_url('home/details/'.$b['slug'])?>"><?=$b['judul']?></a></h4></a></h4>
                                            <P><?=tanggal_indo($b['created_at'])?></P>
                                            <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="fas fa-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                    <?php endif;?>



                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>           
    <!--Recent Articles End -->
    <br>
    
</main>
