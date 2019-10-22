<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maul Shop</title>
    <link rel='icon' href='https://img.icons8.com/officel/16/000000/lock.png' type='image/x-icon' />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
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
            <a href="<?=base_url()?>" class="nav-link text-success"><i class="fas fa-shopping-bag"></i> MaulShop</a>
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
  </div>

</nav>