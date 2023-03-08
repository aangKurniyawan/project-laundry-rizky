<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Owner
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Tambah Owner</li>
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
              <h3 class="box-title">Form Tambah Owner</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo base_url('masterowner');?>" class="btn btn-sm btn-success"><i class="fa fa-reply"></i> Kembali</a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php foreach($editowner as $edit) { ?>
                <form action="<?php echo base_url('updateowner');?>" method="POST">
                    <input type="hidden" name="id_owner" value="<?php echo $edit->id_owner;?>" class="form-control" required>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Owner</label>
                                <input type="text" name="nama_owner" value="<?php echo $edit->nama_owner;?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>No Telepon Owner</label>
                                <input type="number" name="no_telepon_owner" value="<?php echo $edit->no_telepon_owner;?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email Owner</label>
                                <input type="email" name="email_owner" value="<?php echo $edit->email_owner;?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Password(kosongkan jika tidak ada perubahan)</label>
                                <input type="password" name="password_owner_baru" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-3">
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