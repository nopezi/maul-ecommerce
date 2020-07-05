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
                    <div class="col-md-4 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <?php echo form_open_multipart('admin/aksi_tambah_slide'); ?>
                            <div class="form-horizontal">
                                <div class="form-material">
                                <?php if(!empty($slide[0]->gambar)){?>
                                    <div class="form-group">
                                        <div class="col-12 col-md-8">
                                            <input type="file" name="gambar" class="form-control form-control-line">
                                            <input type="hidden" name="gambar_ada" value="<?=$slide[0]->gambar?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <img src="<?=base_url()?>assets/gambar/<?=$slide[0]->gambar?>" class="img-thumbnail" style="max-height: 300px; max-width: 300px">
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="form-group">
                                        <div class="col-12 col-md-8">
                                            <input type="file" name="gambar" class="form-control form-control-line">
                                        </div>
                                    </div>
                                <?php }?>

                                <?php if(!empty($slide[0]->gambar2)){?>
                                    <div class="form-group">
                                        <div class="col-12 col-md-8">
                                            <input type="file" name="gambar2" class="form-control form-control-line">
                                            <input type="hidden" name="gambar_ada2" value="<?=$slide[0]->gambar2?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <img src="<?=base_url()?>assets/gambar/<?=$slide[0]->gambar2?>" class="img-thumbnail" style="max-height: 300px; max-width: 300px">
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="form-group">
                                        <div class="col-12 col-md-8">
                                            <input type="file" name="gambar2" class="form-control form-control-line">
                                        </div>
                                    </div>
                                <?php }?>
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="<?=base_url('admin/slide')?>" class="btn btn-default">Kembali</a>
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
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
