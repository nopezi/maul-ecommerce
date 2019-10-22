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
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <form class="form-horizontal form-material" action="<?=base_url('admin/aksi_tambah_kategori')?>" method="post">
                            <div class="form-group">
                                <label class="col-md-12">Kategori</label>
                                <div class="col-md-12">
                                    <input type="text" name="kategori" placeholder="" class="form-control form-control-line" required> 
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-12">Sub Kategori</label>
                                <div class="col-md-12">
                                    <input type="text" name="sub_kategori" placeholder="" class="form-control form-control-line"> 
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-12">Sub Kategori</label>
                                <div class="col-md-12">
                                    <!-- <input type="text" name="sub_kategori" placeholder="" class="form-control form-control-line chips chips-placeholder" data-role="tagsinput" id="fasilitas"> -->
                                    <input type="text" name="sub_kategori" id="fasilitas" class="form-control chips chips-placeholder" data-role="tagsinput"> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="<?=base_url('admin/kategori')?>" class="btn btn-info">Kembali</a>
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
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
