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
                        <?php if(!empty($this->session->flashdata("gagal"))): ?>
                        <div class="alert alert-danger alert-dismissible show" role="alert">
                        <?=$this->session->flashdata("gagal"); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <?php endif; ?>
                        <?php echo form_open_multipart('admin/aksi_edit_produk'); ?>
                            <div class="form-horizontal">
                                <div class="form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Nama Produk</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="id_produk" value="<?=$produk[0]->id_produk?>">
                                        <input type="text" name="nama_produk" placeholder="" class="form-control form-control-line" value="<?=$produk[0]->nama_produk?>" required> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Kategori</label>
                                    <div class="col-sm-12">
                                        <select name="kategori" class="form-control form-control-line" required>
                                            <?php 
                                            foreach($kategori as $k2):
                                                if($k2->id_kategori == $produk[0]->id_kategori):
                                            ?>
                                            <option value="<?=$k2->id_kategori?>"><?=$k2->kategori?></option>
                                            <?php 
                                                endif;
                                            endforeach;
                                            ?>
                                        <?php foreach($kategori as $k): ?>
                                            <option value="<?=$k->id_kategori?>"><?=$k->kategori?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Sub Kategori</label>
                                    <div class="col-sm-12">
                                    
                                        <select name="sub_kategori" class="form-control form-control-line">
                                        <?php 
                                        if(!empty($produk[0]->sub_kategori)){
                                        ?>
                                            <option value="<?=$produk[0]->sub_kategori?>"><?=$produk[0]->sub_kategori?></option>
                                        <?php }else{ ?>
                                            <option value="">Pilih Sub Kategori</option>
                                        <?php }?>
                                        <?php 
                                        foreach($kategori as $k){
                                            $sub_kategori = explode(',', $k->sub_kategori);
                                            foreach($sub_kategori as $sub_k){ 
                                        ?>
                                            <option><?=$sub_k?></option>
                                        <?php }} ?>
                                        </select>
                                    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Harga</label>
                                    <div class="col-md-12">
                                        <input type="number" name="harga" placeholder="0" class="form-control form-control-line" value="<?=$produk[0]->harga?>" required> 
                                    </div>
                                </div>
                            <?php 
                            $ukuran = explode(',', $produk[0]->ukuran); 
                            $harga_ukuran = explode(',', $produk[0]->harga_ukuran);
                            ?>
                            <?php for($y=0; $y < sizeof($ukuran); $y++): ?>
                                <?php if($y < 1){ ?>
                                <div class="form-group after-add-more-ukuran">
                                
                                    <div class="col-12 col-md-5 col-lg-2">
                                        <label for="">Ukuran</label>
                                        <input type="text" name="ukuran[]" value="<?=$ukuran[$y]?>" class="form-control form-control-line"> 
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-2">
                                        <label for="">Harga</label>
                                        <input type="number" name="harga_ukuran[]" value="<?=$harga_ukuran[$y]?>" class="form-control form-control-line">
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-2">
                                        <button class="btn btn-sm btn-info btn-rounded add-more-ukuran" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                                <?php }else{ ?>
                                    <div class="form-group muncul-ukuran">
                                    <div class="col-md-2">
                                        <!-- <label for="">Ukuran</label> -->
                                        <input type="text" name="ukuran[]" value="<?=$ukuran[$y]?>" class="form-control form-control-line"> 
                                    </div>
                                    <div class="col-md-2">
                                        <!-- <label for="">Harga</label> -->
                                        <input type="number" name="harga_ukuran[]" value="<?=$harga_ukuran[$y]?>" class="form-control form-control-line">
                                    </div>
                                    <div class="col-md-2"> 
                                        <button class="btn btn-sm btn-danger btn-rounded remove-ukuran" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php endfor;?>

                            <?php if(!empty($produk->foto)): ?>
                                <?php for($i=0; $i < sizeof($produk[0]->foto); $i++): ?>
                                <?php if($i < 1){ ?>
                                <div class="form-group after-add-more">
                                    <label class="col-md-12" for="upload-foto">Gambar</label>
                                    <div class="col-md-4">
                                        <input type="file" name="file[]" class="form-control form-control-line">
                                        <input type="hidden" name="file[]" value="<?=$produk[0]->foto[$i]?>"> 
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-sm btn-info btn-rounded add-more" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="<?=base_url()?>assets/gambar/<?=$produk[0]->foto[$i]?>" class="img-thumbnail" style="max-height: 100px; max-width: 100px">
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="form-group muncul" style="margin-top:10px">
                                    <div class="col-12 col-md-4">
                                        <input type="file" name="file[]" class="form-control form-control-line" placeholder="Enter Name Here">
                                        <input type="hidden" name="file[]" value="<?=$produk[0]->foto[$i]?>">
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <button class="btn btn-sm btn-danger btn-rounded remove" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="<?=base_url()?>assets/gambar/<?=$produk[0]->foto[$i]?>" class="img-thumbnail" style="max-height: 100px; max-width: 100px">
                                    </div>
                                </div>
                                <?php } ?>
                            <?php endfor; ?>
                            <?php else:?>
                                <label class="col-12 col-md-12" for="upload-foto">Gambar</label>
                                <div class="col-md-4">
                                    <input type="file" name="file[]" class="form-control form-control-line" required> 
                                    <!-- <input type="file" name="file[]" class="form-control form-control-line" required multiple> --> 
                                </div>
                            <?php endif;?>
                                <div class="form-group">
                                    <label class="col-md-12">Keterangan Produk</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" name="keterangan" required>
<?=$produk[0]->keterangan?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <a href="<?=base_url('admin/produk')?>" class="btn btn-default">Kembali</a>
                                        <!-- <button class="btn btn-success" type="submit">Simpan</button> -->
                                        <input type="submit" name="upload" class="btn btn-info" value="Simpan">
                                    </div>
                                </div>
                                </div>
                            </div>    
                        <?php echo form_close(); ?>
                        <!-- ukuran dan harga ukuran -->
                            <div class="copy-ukuran hidden">
                                <div class="form-group muncul-ukuran">
                                    <div class="col-md-2">
                                        <input type="text" name="ukuran[]" placeholder="" class="form-control form-control-line"> 
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="harga_ukuran[]" placeholder="" class="form-control form-control-line">
                                    </div>
                                    <div class="col-md-2"> 
                                        <button class="btn btn-sm btn-danger btn-rounded remove-ukuran" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <!-- ukuran dan harga ukuran -->
                        <!-- gambar -->
                            <div class="copy hidden">
                                <div class="form-group muncul" style="margin-top:10px">
                                    <div class="col-12 col-md-4">
                                        <input type="file" name="file[]" class="form-control form-control-line" placeholder="Enter Name Here">
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <button class="btn btn-sm btn-danger btn-rounded remove" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <!-- gambar -->
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
    <script type="text/javascript">
        $(document).ready(function(){
            // harga dan ukuran
            $(".add-more-ukuran").click(function(){ 
                var html = $(".copy-ukuran").html();
                $(".after-add-more-ukuran").after(html);
            });
            $("body").on("click",".remove-ukuran",function(){ 
                $(this).parents(".muncul-ukuran").remove();
            });
            // harga dan ukuran
            
            // gambar
            $(".add-more").click(function(){
                // console.log('ada'); 
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });
            $("body").on("click",".remove",function(){ 
                $(this).parents(".muncul").remove();
            });
            // gambar
        });
    </script>
</body>

</html>
