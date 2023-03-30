<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Advanced form elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">
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

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Transaksi
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Transaksi</a></li>
            <li class="active">Form Transaksi</li>
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
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Transaksi Non Member</a></li>
                  <li><a href="#timeline" data-toggle="tab">Transaksi Member</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form action="<?php echo base_url("inserttransaksinonmember");?>" method="POST">
                          <div class="box-body">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Nama Pelanggan</label>
                                          <input type="text" name="nama_pelanggan" class="form-control" required>
                                      </div><!-- /.form-group -->
                                    
                                      <div class="form-group">
                                          <label>Jenis Paket Laundry</label>
                                          <select name="id_jenis_laundry" class="form-control select2" required style="width: 100%;">
                                              <option>-Pilih Paket-</option>
                                              <?php foreach($listjenislaundry as $jenis){ ?>
                                                <option value="<?php echo $jenis->id_jenis_laundry;?>"><?php echo $jenis->nama_jenis_laundry;?></option>
                                              <?php } ?>
                                          </select>
                                      </div><!-- /.form-group -->
                                  </div><!-- /.col -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>No Telepon</label>
                                          <input type="text" name="no_telepon_pelanggan" class="form-control" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Berat Barang</label>
                                          <input type="number" name="berat_barang" class="form-control" required>
                                      </div>
                                  </div><!-- /.col -->
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Alamat Pelanggan</label>
                                          <input type="text" name="alamat_pelanggan" class="form-control" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Catatan Pelanggan</label>
                                          <input type="text" name="catatan_pelanggan" class="form-control" >
                                      </div>
                                  </div><!-- /.col -->
                                  <div class="col-md-4">
                                      <button type="submit"  class="btn btn-sm btn-primary"> <i class="fa fa-save"></i> Simpan Transaksi </button>
                                  </div>
                              </div><!-- /.row -->
                          </div>
                        </form>
                    </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                      <div class="box-body">
                        <form action="<?php echo base_url('inserttransaksimember');?>" method="POST"> 
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" name="no_telepon_pelanggan" class="form-control" required>
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Jenis Paket Laundry</label>
                                      <select name="id_jenis_laundry" class="form-control select2" required style="width: 100%;">
                                        <option>-Pilih Paket-</option>
                                        <?php foreach($listjenislaundry as $jenis){ ?>
                                          <option value="<?php echo $jenis->id_jenis_laundry;?>"><?php echo $jenis->nama_jenis_laundry;?></option>
                                        <?php } ?>
                                      </select>
                                  </div>
                                </div><!-- /.col -->
                                <div class="col-md-4">
                                <div class="form-group">
                                        <label>Berat Barang</label>
                                        <input type="number" name="berat_barang" class="form-control" required>
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Catatan Pelanggan</label>
                                        <input type="text" name="catatan_pelanggan" class="form-control" >
                                    </div>
                                </div><!-- /.col -->
                                <div class="col-md-4">
                                    <button type="submit"  class="btn btn-sm btn-primary"> <i class="fa fa-save"></i> Simpan Transaksi </button>
                                </div>
                            </div><!-- /.row -->
                        </div>
                        </form>
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div>
      <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url();?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url();?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>