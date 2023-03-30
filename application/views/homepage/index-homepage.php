
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Daftar Produk</span>
                        </div>
                        <ul>
                            <?php foreach($jenislaundry as $jenis) { ?>
                                <li><a href="<?php echo base_url('detailproduk/'.$jenis->id_jenis_laundry);?>"><?php echo $jenis->nama_jenis_laundry;?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__item set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/hero/nyuci.jpg">
                        <div class="hero__text">
                            <span><font color="black">SAHABAT LAUNDRY</font></span>
                            <h2>Layanan <br />100% Cepat</h2>
                            <p><font color="black">Laundry Kiloan dan Satuan</font></p>
                            <!-- <a href="#" class="primary-btn">Pesan Sekarang</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/product/Screenshot_2.png">
                            <!-- <h5><a href="#">Fresh Fruit</a></h5> -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/product/Screenshot_3.png">
                            <!-- <h5><a href="#">Fresh Fruit</a></h5> -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/product/Screenshot_4.png">
                            <!-- <h5><a href="#">Fresh Fruit</a></h5> -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/product/Screenshot_5.png">
                            <!-- <h5><a href="#">Fresh Fruit</a></h5> -->
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/product/Screenshot_6.png">
                            <!-- <h5><a href="#">Fresh Fruit</a></h5> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- Categories Section End -->


    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo base_url();?>assets_homepage/img/banner/Screenshot_10.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo base_url();?>assets_homepage/img/banner/Screenshot_1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>