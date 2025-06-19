<main>
    <div class="about-details pt-40 pb-40">
        <div class="container">
            <div class="row">
                <!-- Kolom kiri: Our Mission & Our Vision -->
                <div class="col-lg-7">
                    <div class="about-details-cap mb-50">
                        <h4>Sejarah</h4>
                        <p style="text-align: justify;"><?=nl2br($pengaturan['sejarah'])?></p>
                    </div>
                </div>
                <!-- Kolom kanan: Gambar -->
                <div class="offset-xl-1 col-lg-4 d-flex align-items-start">
                    <?php if(!empty($pengaturan)):?>
                    <img src="<?=base_url('uploads/pengaturan/'.$pengaturan['gambar'])?>" alt="About Image" style="width: 100%; height: 950px; object-fit: cover; object-position: center; border-radius:20px">
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                                    </div>
                                                    <div class="whates-caption whates-caption2">
                                                        <h4 style="text-align: center;"><a href="#">Visi</a></h4>
                                                        <p style="text-align: justify;"><?=nl2br($pengaturan['visi'])?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <img src="assets/img/gallery/whats_news_details2.png" alt="">
                                                    </div>
                                                    <div class="whates-caption whates-caption2">
                                                        <h4 style="text-align:center"><a href="#">Misi</a></h4>
                                                        <?php
                                                        $misi_items = explode("\n", $pengaturan['misi']);
                                                        ?>
                                                        <ol style="text-align: justify; padding-left: 1.5em;">
                                                            <?php foreach ($misi_items as $item): ?>
                                                                <?php if (trim($item) !== ''): ?>
                                                                    <li style="text-indent: -1.2em; padding-left: 1.2em;"><?=htmlspecialchars($item)?></li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ol>
                                                    </div>
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
            </div>
        </div>
    </div>
    <!-- Team Start -->
    <div class="team-area">
        <div class="container">
            <div class="row">
                <div class="cl-xl-7 col-lg-12 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittles mb-40 mt-40">
                        <h2 style="text-align:center">Pejabat Struktural</h2>
                    </div> 
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="<?=base_url('uploads/pejabat/'.$pejabat['gambar'])?>" alt="" style="height:400px; object-fit:cover; object-position: center; box-shadow:1px 10px 20px 0px rgba(42,34,123,0.1)">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#"><?=$pejabat['nama']?></a></h3>
                            <span><?=$pejabat['detail']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <?php foreach($kasi as $k):?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="<?=base_url('uploads/pejabat/'.$k['gambar'])?>" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#"><?=$k['nama']?></a></h3>
                            <span><?=$k['detail']?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- Team End -->