<div class="container" style="margin-top:80px; margin-bottom: 100px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <!--Carousel Wrapper-->
                            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                                <!--Indicators-->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                                </ol>
                                <!--/.Indicators-->
                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">
                                    <!--First slide-->
                                    <div class="carousel-item active">
                                    <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/am250p-black.jpeg"
                                        alt="First slide">
                                    </div>
                                    <!--/First slide-->
                                    <!--Second slide-->
                                    <div class="carousel-item">
                                    <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/am250p-blue.jpeg"
                                        alt="Second slide">
                                    </div>
                                    <!--/Second slide-->
                                    <!--Third slide-->
                                    <div class="carousel-item">
                                    <img class="d-block w-100" src="https://distrodakwah.id/assets/uploads/featured_image/utama/am250p-red.jpeg"
                                        alt="Third slide">
                                    </div>
                                    <!--/Third slide-->
                                </div>
                                <!--/.Slides-->
                                <!--Controls-->
                                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <!--/.Controls-->
                            </div>
                            <!--/.Carousel Wrapper-->
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <!-- <div class="row"> -->
                                <form action="<?=base_url('home/order_product/')?>jaket" method="post">
                                    <div class="form-row">
                                    <div class="col-12">
                                        <p class="h6">Judul Produk</p>
                                        <hr>
                                    </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <select class="mdb-select md-form" id="barang" name="warna" onchange="price()">
                                                <option value="" disabled selected>Pilih Warna</option>
                                                <option value="Rp. 10.000">Abu Misty</option>
                                                <option value="Rp. 30.000">Biru</option>
                                                <option value="Rp. 50.000">Hitam</option>
                                            </select>
                                            <label for="">Pilih Color/Warna</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12">
                                            <select class="mdb-select md-form" name="ukuran">
                                                <option value="" disabled selected>Pilih Ukuran</option>
                                                <option value="Rp. 10.000">M</option>
                                                <option value="Rp. 30.000">L</option>
                                                <option value="Rp. 50.000">XL</option>
                                            </select>
                                            <label for="">Pilih Ukuran</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12"> -->
                                        <div class="form-row">
                                            <div class="col-12 col-md-1 col-lg-1">
                                                <label for="">Quantity</label>
                                                <div class="def-number-input number-input safari_only">
                                                    <button onclick="this.parentNode.querySelector('input[name=quantity]').stepDown()" class="minus"></button>
                                                    <input class="quantity" min="0"  name="quantity" value="1" type="number">
                                                    <button onclick="this.parentNode.querySelector('input[name=quantity]').stepUp()" class="plus"></button>
                                                </div>
                                                <!-- <div class="md-form">
                                                    <input type="number" class="form-control" id="angka" onkeyup="sum();">
                                                </div> -->
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-5 offset-md-5">
                                                <div id="tampil"></div>
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                    <!-- <div class="col-12 col-md-12 col-lg-12"> -->
                                        <button type="submit" class="col-12 btn btn-sm btn-success btn-rounded">Next</button>
                                        <!-- <a href="https://api.whatsapp.com/send?phone=6281943214722&text=Assalamualaikum min, saya mau pesan ini *Nama Produk* : AM250P - Nikmat Tuhanmu *Warna* : Hitam *Ukuran* : M *Qty* 1pcs&source=&data=" class="btn btn-md btn-success btn-rounded col-lg-12">
                                        Pesan via Whatsapp
                                        </a> -->
                                    <!-- </div> -->
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('content/footer'); ?>
<script type="text/javascript">
    // Material Select Initialization
    $(document).ready(function() {
    $('.mdb-select').materialSelect();
    });

    function price() {
        var tes = document.getElementById("barang").value;
            // document.getElementById("harga").value=tes;
            var html =  '<label for="">Harga</label>'+
                        '<p class="text-danger h6">'+tes+'</p>';
            $('#tampil').html(html);
            console.log(tes);
    }
    function sum(){
        // this.parentNode.querySelector('input[name=quantity]').stepDown()
        var data = document.getElementById("tambah").value;
        console.log(data);
        document.getElementById('angka').value;
        console.log('ada');
    }
</script>