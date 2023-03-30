<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url();?>assets_homepage/img/banner/Screenshot_1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><font color="black">Riwayat Transaksi</font></h2>
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
                                    <th class="shoping__product">Produk</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Pembayaran<th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transaksimember as $transaksi){ ?>
                                   
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <a href="<?php echo base_url('detailtransaksimember/'.$transaksi->no_transaksi);?>">
                                                    <img src="<?php echo base_url();?>assets_homepage/img/cart/Screenshot_2.png" alt="">
                                                    <h5><?php echo $transaksi->nama_jenis_laundry;?></h5>
                                                </a>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?php echo $transaksi->tgl_transaksi;?>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?php echo $transaksi->harga_paket;?>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?php echo $transaksi->berat_barang;?>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <?php echo number_format($transaksi->total_harga);?>
                                            </td>
                                            <td class="shoping__cart__total">
                                                <?php echo $transaksi->status_transaksi;?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <?php echo $transaksi->status_bayar;?>
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