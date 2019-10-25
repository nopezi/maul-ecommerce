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
                            <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select class="form-control pull-right row b-none">
                                    <option>March 2017</option>
                                    <option>April 2017</option>
                                    <option>May 2017</option>
                                    <option>June 2017</option>
                                    <option>July 2017</option>
                                </select>
                            </div>
                            <!-- <h3 class="box-title">Recent sales</h3> -->
                            <?php 
                            for($y=0; $y < sizeof($semua_kategori); $y++){
                                $hasil = $y;
                            } 
                            ?>
                            <?php if($hasil <= 4):?>
                            <a href="<?=base_url('admin/tambah_kategori')?>" class="btn btn-info"><i class="fa fa-plus-square-o"></i></a>
                            <?php endif;?>
                            <!-- <div class="table-responsive"> -->
                                <table class="table table-hover" id="dtBasicExample" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>KATEGORI</th>
                                            <th>SUB KATEGORI</th>
                                            <!-- <th>DATE</th> -->
                                            <th>SETTING</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; foreach($semua_kategori as $sk): ?>
                                        <tr>
                                            <td><?=++$i?></td>
                                            <td class="txt-oflo"><?=ucwords($sk->kategori)?></td>
                                            <td>
                                            <?php 
                                                $sub_kategori = explode(',', $sk->sub_kategori);
                                                foreach($sub_kategori as $sub_k){
                                                    echo ucwords($sub_k).'<br>';
                                                }
                                            ?>
                                            </td>
                                            <!-- <td class="txt-oflo">April 18, 2017</td> -->
                                            <td>
                                                <a href="<?=base_url('admin/edit_kategori')?>/<?=$sk->id_kategori?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <!-- <a href="<?//=base_url('admin/hapus_kategori')?>/<?=$sk->id_kategori?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <!-- </div> -->
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
