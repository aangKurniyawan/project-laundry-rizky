<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Invoice
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Invoice</li>
          </ol>
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
        </section>

        <!-- Main content -->
        <section class="invoice">
          <?php foreach($bayartransaksi as $bayar) { ?>
            <!-- title row -->
            <div class="row">
              <div class="col-xs-12">
                <h2 class="page-header">
                  <i class="fa fa-globe"></i> Detail Transaksi
                  <div class="box-tools pull-right">
                    <a href="<?php echo base_url('transaksi');?>" class="btn btn-sm btn-success"><i class="fa fa-reply"></i> Kembali</a>
                  </div>
                </h2>
                
              </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>Admin, Inc.</strong><br>
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Phone: (804) 123-5432<br>
                  Email: info@almasaeedstudio.com
                </address>
              </div><!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong><?php echo $bayar->nama_pelanggan;?></strong><br>
                  <?php echo $bayar->alamat_pelanggan;?><br>
                  No HP: <?php echo $bayar->no_telepon_pelanggan;?><br>
                  Email: <?php echo $bayar->email_pelanggan;?>
                </address>
              </div><!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice #<?php echo $bayar->no_transaksi;?></b><br>
                <b>Tgl Transaksi:</b> <?php echo $bayar->tgl_transaksi;?>
              </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Paket</th>
                      <th>Harga Paket</th>
                      <th>Berat Barang</th>
                      <th>Catatan</th>
                      <th>Total Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach($bayartransaksi as $laundry) { 
                    ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $laundry->nama_jenis_laundry;?></td>
                        <td><?php echo number_format($laundry->harga_jenis_laundry);?></td>
                        <td><?php echo number_format($laundry->berat_barang);?> Kg</td>
                        <td><?php echo $laundry->catatan_pelanggan;?></td>
                        <td><?php echo number_format($laundry->total_harga);?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-xs-6">
                <p class="lead">Keterangan:</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  Mohon untuk mengecek kembali data transaksi, dan pastikan tidak ada kesalahan transaksi maupun kesalahan pada saat pengembalian barang pelanggan
                </p>
              </div><!-- /.col -->
              <?php foreach($datapembayaran as $pembayaran) { ?>
                <div class="col-xs-6">
                  <p class="lead">Tgl Pembayaran <?php echo $pembayaran->tgl_bayar;?></p>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Total Harga:</th>
                        <td>Rp <?php echo number_format($pembayaran->total_pembayaran);?> ,-</td>
                      </tr>
                      <tr>
                        <th>Total Bayar : </th>
                        <td>Rp <?php echo number_format($pembayaran->total_pembayaran);?> ,-</td>
                      </tr>
                      <tr>
                        <th>Kembalian:</th>
                        <td>Rp <?php echo number_format($pembayaran->total_pembayaran);?> ,-</td>
                      </tr>
                      <tr>
                        <th>Status Pembayaran:</th>
                        <td><?php echo $pembayaran->status_bayar;?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              <?php } ?>
            </div>

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-xs-12">
                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Pembayaran</button>
              </div>
            </div>
          <?php } ?>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div>