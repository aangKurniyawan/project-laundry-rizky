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
                        <td>Rp <?php echo number_format($pembayaran->kembalian);?> ,-</td>
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
                <button <?php if($bayar->status_bayar == 'Lunas') echo 'disabled' ;?> class="btn btn-success pull-right" data-toggle="modal" data-target="#modalbayar"><i class="fa fa-credit-card"></i> Pembayaran</button>
              </div>
            </div>
          <?php } ?>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div>

      <?php foreach($bayartransaksi as $posbayar) {?>
      <div class="modal fade" id="modalbayar" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalSayaLabel">Form Bayar Transaksi</h5>
            </div>
            <div class="modal-body">
              <form action="<?php echo base_url('prosesbayar');?>" method="POST">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Total Harga</label>
                      <input type="text" value="<?php echo number_format($posbayar->total_harga);?>" readonly class="form-control" required>
                      <input type="hidden" name="total_harga" value="<?php echo $posbayar->total_harga;?>" readonly class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Metode Pembayaran</label>
                      <select name="id_jenis_bayar" class="select2 form-control" required>
                          <option value="">-Pilih Jenis Pembayaran-</option>
                          <?php foreach($listjenisbayar as $jenis) { ?>
                            <option value="<?php echo $jenis->id_jenis_bayar;?>"><?php echo $jenis->nama_jenis_bayar;?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Total Bayar</label>
                      <input type="number" name="total_bayar"class="form-control" required>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_transaksi" value="<?php echo $posbayar->id_transaksi;?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Proses Bayar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>