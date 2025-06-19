<main>
    <!-- Whats New Start -->
    <section class="whats-news-area pt-20 pb-20 gray-bg">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-7">
                    <div class="whats-news-wrapper mb-30">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-6">
                                <div class="section-tittle mb-30">
                                    <h3>Sijawara+</h3>
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
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <img src="<?=base_url('/uploads/default/sijawaralanding.png')?>" alt="">
                                                    </div>
                                                    <div class="col-xl-6 col-lg-12 pb-55">
                                                        <div class="whates-caption">
                                                            <h4 style="font-style:underline"><a href="https://sijawara.uptkukm.id/" style="text-decoration: underline;">Website Sijawara+</a></h4>
                                                        </div>
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
                <div class="col-lg-5">                    
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-30">
                            <h3>E-Perpus</h3>
                            <h5>Aplikasi E-Perpustakaan</h5>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="whates-img">
                                <img src="<?=base_url('uploads/default/eperpus.png')?>" alt="" style="width: 100%; object-fit: cover;">  
                                <div class="most-recent-cap">
                                    <h4><a href="latest_news.html"></a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-30">
                            <h4>E-Perpus Sijawara+</h4>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-20">
                            <div class="whates-img">
                                <img src="<?=base_url('uploads/default/eperpusinstall.png')?>" alt="" style="height: 150px; object-fit: cover;">  
                                <div class="most-recent-cap">
                                    <h4><a href="latest_news.html"></a></h4>
                                </div>
                            </div>
                            <div class="whates-caption">
                                <h4 style="font-style:underline"><a href="https://sijawara.uptkukm.id/" style="text-decoration: underline;">E-Perpus Sijawara+</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <?php if (session()->getFlashdata('success')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- card one -->      
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-caption whates-caption2">
                                                    <h4><a href="#">Pengaduan</a></h4>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>                                       
                                </div>
                            <!-- End Nav Card -->
                            </div>
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->      
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <form action="<?= base_url('home/layanan')?>" enctype="multipart/form-data" class="form-contact contact_form" method="post">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="pesan" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control valid" name="nama" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <button type="submit" class="button button-contactForm boxed-btn">Kirim</button>
                                                </div>
                                            </form>
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
    </section>
    <!-- Whats New End -->
    
    
    
</main>
