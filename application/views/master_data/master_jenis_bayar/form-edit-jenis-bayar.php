<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Jenis Bayar
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Tambah Jenis Bayar</li>
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

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Jenis Bayar</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo base_url('masterjenisbayar');?>" class="btn btn-sm btn-success"><i class="fa fa-reply"></i> Kembali</a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php foreach($editjenisbayar as $edit) { ?>
                    <form action="<?php echo base_url('updatejenisbayar');?>" method="POST">
                        <input type="hidden" name="id_jenis_bayar" value="<?php echo $edit->id_jenis_bayar;?>" class="form-control" required>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nama Jenis bayar</label>
                                    <input type="text" name="nama_jenis_bayar" value="<?php echo $edit->nama_jenis_bayar;?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding-top:25px;!importan">
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-sm btn-primary"> <i class="fa fa-save"></i> Simpan Data </button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->