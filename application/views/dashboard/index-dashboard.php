<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <?php foreach($totalbayar as $bayar) { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Pembayaran</span>
                  <span class="info-box-number"><?php echo number_format($bayar->total_pendapatan);?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <?php } ?>
            <?php foreach($transaksiaktif as $transaksi) { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Transaksi Aktif</span>
                  <span class="info-box-number"><?php echo number_format($transaksi->transaksi_aktif);?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <?php } ?>
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <?php foreach($transaksiselesai as $selesai) { ?>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Transaksi Selesai</span>
                    <span class="info-box-number"><?php echo number_format($selesai->transaksi_selesai);?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div><!-- /.col -->
            <?php } ?>
            <?php foreach($totalmember as $member) { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Member</span>
                  <span class="info-box-number"><?php echo number_format($member->total_member);?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <?php } ?>
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Transaksi Terbaru</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>No Transaksi</th>
                          <th>Nama Pelanggan</th>
                          <th>Jenis Cuci</th>
                          <th>Berat</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($transaksibaru as $baru){ ?>
                          <tr>
                            <td><a <?php if($baru->status_transaksi == 'Batal') echo 'href=#';?> href="<?php echo base_url('frombayartransaksi/'.$baru->id_transaksi);?>"><?php echo $baru->no_transaksi;?></a></td>
                            <td><?php echo $baru->nama_pelanggan;?></td>
                            <td><?php echo $baru->nama_jenis_laundry;?></td>
                            <td><?php echo number_format($baru->berat_barang);?></td>
                            <td><?php echo $baru->status_transaksi;?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="<?php echo base_url('formaddtransaksi');?>" class="btn btn-sm btn-info btn-flat pull-left">Tambah Transaksi</a>
                  <a href="<?php echo base_url('transaksi');?>" class="btn btn-sm btn-default btn-flat pull-right">Lihat Transaksi</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              <div class="row">
                <div class="col-md-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Member Baru</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                          <?php foreach($listmember as $member) { ?>
                            <li>
                              <img src="<?php echo base_url();?>assets/dist/img/user6-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#"><?php echo $member->nama_pelanggan;?></a>
                              <span class="users-list-date"><?php echo $member->no_telepon_pelanggan;?></span>
                            </li>
                          <?php } ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="<?php echo base_url('masterpelanggan');?>" class="uppercase">Semua Member</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
              
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Mentions</span>
                  <span class="info-box-number">92,050</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                  </div>
                  <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
                </div>
              </div>
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Downloads</span>
                  <span class="info-box-number">114,381</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                </div>
              </div>
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Direct Messages</span>
                  <span class="info-box-number">163,921</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 40%"></div>
                  </div>
                  <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
                </div>
              </div> -->
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Rekap Produk</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                      <?php foreach($rekapproduk as $produk) { ?>
                        <li class="item">
                          <div class="product-img">
                            <img src="<?php echo base_url();?>assets/dist/img/default-50x50.gif" alt="Product Image">
                          </div>
                          <div class="product-info">
                            <a href="javascript::;" class="product-title"><?php echo $produk->nama_jenis_laundry;?> 
                            <span class="label label-warning pull-right"><?php echo number_format($produk->total_transaksi_produk);?></span></a>
                            <span class="product-description">
                              Total transaksi produk
                            </span>
                          </div>
                        </li>
                      <?php } ?>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->