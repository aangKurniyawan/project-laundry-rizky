<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Transaksi Laundry
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Data Laundry</li>
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
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="box-tools pull-right">
                    <a href="<?php echo base_url('formaddtransaksi');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                  </div>
                  <br>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="10px">No</th>
                        <th>No Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telepon</th>
                        <th>Berat</th>
                        <th>Paket</th>
                        <th>Total Harga</th>
                        <th>Status Bayar</th>
                        <th>Status</th>
                        <th width="150px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        foreach($listtransaksi as $transaksi) {
                      ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $transaksi->no_transaksi;?></td>
                          <td><?php echo $transaksi->nama_pelanggan;?></td>
                          <td><?php echo $transaksi->no_telepon_pelanggan;?></td>
                          <td><?php echo $transaksi->berat_barang;?> Kg</td>
                          <td><?php echo $transaksi->nama_jenis_laundry;?></td>
                          <td><?php echo number_format($transaksi->total_harga);?></td>
                          <td><?php echo $transaksi->status_bayar;?></td>
                          <td><?php echo $transaksi->status_transaksi;?></td>
                          <td>
                            <a class="btn btn-xs btn-success" href="<?php echo base_url('frombayartransaksi/'.$transaksi->id_transaksi);?>"><i class="fa fa-money"></i> Bayar</a>
                            <a <?php if($transaksi->status_bayar == 'Lunas' || $transaksi->status_transaksi == 'Batal') echo 'href=#'  ;?> class="btn btn-xs btn-warning" href="<?php echo base_url('formedittransaksi/'.$transaksi->id_transaksi);?>"><i class="fa fa-edit"></i> Edit</a>
                            <a <?php if($transaksi->status_bayar == 'Lunas' || $transaksi->status_transaksi == 'Batal') echo 'disabled' ;?> class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalhapus_<?php echo $transaksi->id_transaksi;?>"><i class="fa fa-trash"></i> Batal</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th width="10px">No</th>
                        <th>No Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telepon</th>
                        <th>Berat</th>
                        <th>Paket</th>
                        <th>Total Harga</th>
                        <th>Status Bayar</th>
                        <th>Status</th>
                        <th width="90px">Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php foreach($listtransaksi as $hapus) {?>
      <div class="modal fade" id="modalhapus_<?php echo $hapus->id_jenis_laundry;?>" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalSayaLabel">Hapus Data</h5>
            </div>
            <div class="modal-body">
              Data transaksi dengan nomor : <?php echo $hapus->no_transaksi;?> akan dibatalkan
              <br/>
              data tidak bisa dirubah lagi
            </div>
            <div class="modal-footer">
              <form action="<?php echo base_url('bataltransaksi');?>" method="POST">
                <input type="hidden" name="id_transaksi" value="<?php echo $hapus->id_transaksi;?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Batalkan Transaksi</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>