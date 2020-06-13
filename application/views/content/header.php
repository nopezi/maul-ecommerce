<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qaiza Shop</title>
    <link rel='icon' href='https://img.icons8.com/officel/16/000000/lock.png' type='image/x-icon' />
    <!-- <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontawesome-free-5.10.1-web/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/mdb.min.css" rel="stylesheet">
    <!-- style -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto"rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.scss">
</head>
<body>

<nav class="navbar lighten-5 mb-5 navbar-expand-lg fixed-top  white">
  <!-- Collapse button -->
  <button class="navbar-toggler text-success" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-align-justify"></i>
  </button>

  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <!-- <a href="<?=base_url()?>" class="nav-link text-success"><i class="fas fa-shopping-bag"></i> MaulShop</a> -->
            <a href="<?=base_url()?>" class="nav-link text-success">
            <img src="<?=base_url()?>assets/img/logo-maul.jpg" width="60" height="30" alt="mdb logo">
            </a>
        </li>
    </ul>
    <!-- <ul class="navbar-nav mr-auto justify-content-center">
      <li class="nav-item nav-center">
            <a href="<?=base_url('home/lengan_panjang')?>" class="nav-link text-success">Lengan Panjang</a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url('home/lengan_pendek')?>" class="nav-link text-success">Lengan Pendek</a>
        </li>
        <li class="nav-item">
            <a href="<?=base_url('home/hoodie')?>" class="nav-link text-success">Hoodie</a>
        </li>
    </ul> -->

    <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
               <a class="nav-link waves-effect waves-light" href="#">Home <span class="sr-only">(current)</span></a>
            </li> -->
    <?php foreach($kategori as $k): ?>
    <?php $sub_kategori = explode(',', $k->sub_kategori); ?>
        <li class="nav-item dropdown text-success">
            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$k->kategori?></a>
            <div class="dropdown-menu dropdown-info" aria-labelledby="navbarDropdownMenuLink">
              <?php foreach($sub_kategori as $sk): ?>
                <a class="dropdown-item waves-effect waves-light text-success" href="<?=base_url('home/sk')?>?sk=<?=$sk?>"><?=$sk?></a>
                <!-- <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a> -->
              <?php endforeach;?>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
        <form class="form-inline" action="<?=base_url('home/search')?>" method="get">
            <div class="md-form my-0 text-success">
                <input name="s" class="form-control mr-sm-2" type="text" placeholder="Search Produk" aria-label="Search">
            </div>
        </form>

  </div>

</nav>