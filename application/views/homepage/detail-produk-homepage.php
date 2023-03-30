  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/banner/Screenshot_1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><font color="black">Detail Produk</font></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <?php foreach($detailproduk as $detail) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large"
                                    src="<?php echo base_url();?>assets_homepage/img/hero/nyuci.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3><?php echo $detail->nama_jenis_laundry;?></h3>
                            <div class="product__details__price">Rp.<?php echo number_format($detail->harga_jenis_laundry);?>,- /Kg</div>
                            <p><?php echo $detail->deskripsi_jenis_laundry;?></p>
                            <a href="<?php echo base_url('forminserttransaksimember/'.$this->uri->segment(2));?>" class="primary-btn">Pilih Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
    <!-- Product Details Section End -->