<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/banner/Screenshot_1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><font color="black">Daftar Produk</font></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi Produk</th>
                                    <th>Harga Per Kg</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($jenislaundry as $jenis){ ?>
                                    <tr>
                                        <td>
                                            <h5><?php echo $jenis->nama_jenis_laundry;?></h5>
                                        </td>
                                        <td>
                                            <h5><?php echo $jenis->deskripsi_jenis_laundry;?></h5>
                                        </td>
                                        <td>
                                            <?php echo number_format($jenis->harga_jenis_laundry) ;?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url("detailproduk/".$jenis->id_jenis_laundry);?>" class="site-btn">Detail</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->