<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('backend/core/header'); ?>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <?php $this->load->view('backend/core/menu'); ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?=$halaman?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <?php if(!empty($this->session->flashdata("gagal"))):?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?=$this->session->flashdata("gagal");?>
                        </div>
                    <?php endif;?>
                        <ol class="breadcrumb">
                            <li><a href="#"><?=$halaman?></a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                <div class="row">
                <?php $i=0; foreach($slide as $s): ?>
                    <div class="col-12 col-md-2 col-lg-4">
                    <a type="button" data-toggle="modal" data-target=".bs-example-modal-sm<?=$s->id_slide?>">
                        <img src="<?=base_url()?>assets/gambar/<?=$s->gambar?>" class="img-responsive img-rounded">
                    </a>
                    </div>
                <?php $i++; endforeach;?>
                <?php 
                    if($i < 3){
                ?>
                    <div class="col-12 col-md-4">
                        <!-- <a href="<?=base_url('admin/tambah_slide')?>">
                            <p class="h1"><i class="fa fa-plus"></i></p>
                        </a> -->
                        <a type="button" data-toggle="modal" data-target=".bs-example-modal-sm">
                        <p class="h1"><i class="fa fa-plus"></i></p>
                        </a>
                    </div>
                </div>
                <?php } ?>

                <!-- tambah gambar -->
                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">Tambah Gambar
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <?php echo form_open_multipart('admin/aksi_tambah_slide'); ?>
                            <div class="modal-body">
                                <input type="file" name="gambar" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Upload</button>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- tambah gambar -->

                <!-- edit gambar -->
                <?php foreach($slide as $s): ?>
                <div class="modal fade bs-example-modal-sm<?=$s->id_slide?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">Edit gambar
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <?php echo form_open_multipart('admin/aksi_edit_slide'); ?>
                            <div class="modal-body">
                                <img src="<?=base_url()?>assets/gambar/<?=$s->gambar?>" class="img-responsive">
                                <div class="form-group mt-2">
                                    <div class="col-12">
                                    <input type="hidden" name="id_slide" value="<?=$s->id_slide?>">
                                    <input type="file" name="gambar" class="form-control form-control-line" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Upload</button>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <!-- edit gambar -->

            </div>
            <!-- /.container-fluid -->
            <?php $this->load->view('backend/core/footer'); ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php $this->load->view('backend/core/jquery'); ?>
</body>

</html>
