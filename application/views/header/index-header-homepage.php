<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member | Dashboard</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_homepage/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="<?php echo base_url();?>assets_homepage/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="<?php echo base_url('formloginmember');?>"  <?php if($this->session->userdata('masuk') == TRUE) echo 'hidden' ;?>><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li <?php if($this->uri->segment(1) == 'homepage') echo 'class="active"';?>><a href="<?php echo base_url('homepage');?>">Beranda</a></li>
                <li <?php if($this->uri->segment(1) == 'produk') echo 'class="active"';?>><a href="<?php echo base_url('produk');?>">Produk</a></li>
                <li <?php if($this->uri->segment(1) == 'transaksimember') echo 'class="active"';?>><a href="<?php echo base_url('transaksimember');?>">Transaksi</a></li>
                <li <?php if($this->uri->segment(1) == 'kontak') echo 'class="active"';?>><a href="<?php echo base_url('kontak');?>">Kontak</a></li>
                <li <?php if($this->session->userdata('masuk') == TRUE) echo 'hidden' ;?> <?php if($this->uri->segment(1) == 'daftar') echo 'class="active"';?>><a href="<?php echo base_url('daftar');?>">Daftar</a></li>
                <li <?php if($this->session->userdata('masuk') != TRUE) echo 'hidden' ;?>><a href="<?php echo base_url('logoutmember');?>">Logout</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <!-- <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            </ul>
        </div> -->
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@laundry.com</li>
                                <li>089731913979</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__auth">
                                <a href="<?php echo base_url('formloginmember');?>"  <?php if($this->session->userdata('masuk') == TRUE) echo 'hidden' ;?>><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="<?php echo base_url();?>assets_homepage/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li <?php if($this->uri->segment(1) == 'homepage') echo 'class="active"';?>><a href="<?php echo base_url('homepage');?>">Beranda</a></li>
                            <li <?php if($this->uri->segment(1) == 'produk') echo 'class="active"';?>><a href="<?php echo base_url('produk');?>">Produk</a></li>
                            <li <?php if($this->uri->segment(1) == 'transaksimember') echo 'class="active"';?>><a href="<?php echo base_url('transaksimember');?>">Transaksi</a></li>
                            <li <?php if($this->uri->segment(1) == 'kontak') echo 'class="active"';?>><a href="<?php echo base_url('kontak');?>">Kontak</a></li>
                            <li <?php if($this->session->userdata('masuk') == TRUE) echo 'hidden' ;?> <?php if($this->uri->segment(1) == 'daftar') echo 'class="active"';?>><a href="<?php echo base_url('daftar');?>">Daftar</a></li>
                            <li <?php if($this->session->userdata('masuk') != TRUE) echo 'hidden' ;?>><a href="<?php echo base_url('logoutmember');?>">Logout</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- <div class="col-lg-1">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
