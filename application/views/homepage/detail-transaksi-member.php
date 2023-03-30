<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/banner/Screenshot_1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><font color="black">Form Insert Member</font></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Form Pemesanan Laundry</h4>
                <?php if($this->session->flashdata('berhasil')){ ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!</strong> <?php echo $this->session->flashdata('berhasil'); ?>
                    </div>

                    <?php } else if($this->session->flashdata('gagal')){  ?>

                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> <?php echo $this->session->flashdata('gagal'); ?>
                    </div>

                <?php }?>
                <?php foreach($detailtransaksi as $detail){ ?>
                    <form action="<?php echo base_url('inserttransaksipelanggan');?>" method="POST">
                        <input type="hidden" name="id_jenis_laundry" value="<?php echo $detail->id_jenis_laundry;?>" readonly>
                        <input type="hidden" name="id_pelanggan" value="<?php echo $this->session->userdata('session_id');?>" readonly>
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Nama Pelanggan<span>*</span></p>
                                            <input type="text"  value="<?php echo $detail->nama_pelanggan;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>No Telepon<span>*</span></p>
                                            <input type="number" value="<?php echo $detail->no_telepon_pelanggan;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email Pelanggan<span>*</span></p>
                                            <input type="text"  value="<?php echo $detail->email_pelanggan;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Alamat Pelanggan<span>*</span></p>
                                            <input type="text" value="<?php echo $detail->alamat_pelanggan;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Catatan Pesanan<span>*</span></p>
                                    <input type="text" value="<?php echo $detail->catatan_pelanggan;?>" readonly>
                                </div>
                                <!-- <div class="checkout__input">
                                    <button type="submit" class="site-btn">Kirim Pesanan</button>
                                </div> -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="checkout__order">
                                    <h4>Pesanan Anda #<?php echo $detail->no_transaksi;?></h4>
                                    <div class="checkout__order__products">Products <span>Total</span></div>
                                    <ul>
                                        <li>Nama Paket <span><?php echo $detail->nama_jenis_laundry;?></span></li>
                                        <li>Harga Paket <span>Rp. <?php echo number_format($detail->harga_jenis_laundry);?></span></li>
                                        <li>Berat Barang <span><?php echo number_format($detail->berat_barang);?> Kg</span></li>
                                    </ul>
                                    <div class="checkout__order__subtotal">Total Harga <span>Rp <?php echo number_format($detail->total_harga);?></span></div>
                                    <div class="checkout__order__total">Status Transaksi : <?php echo $detail->status_transaksi;?> </div>
                                    <center><img src="<?php echo base_url();?>assets_homepage/img/scan.png"></center>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->