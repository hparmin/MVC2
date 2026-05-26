<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>php tutorial || blog project || arminhajipour.ir </title>
    <link
            rel="stylesheet"
            href="<?php echo $this->asset('css/bootstrap-icons.css'); ?>"/>
    <link href="<?php echo $this->asset('css/bootstrap-min.css'); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo $this->asset('css/style.css'); ?>"/>
</head>
<body>
<div class="container py-3">
    <header
            class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="<?php echo $this->url(''); ?>" class="fs-4 fw-medium link-body-emphasis text-decoration-none">
            arminhajipour.ir
        </a>
        <nav class="d-inline-flex mt-2 mt-md-0 ">
            <?php foreach ($categories as $category): ?>
                <a class="<?php if (false){echo "fw-bold"; } ?>  me-3 py-2 link-body-emphasis text-decoration-none"
                   href="<?php $this->url("categories/archive/$category->id"); ?>"><?php echo $category->title; ?></a>
            <?php endforeach; ?>
        </nav>
        <div class="me-md-auto login-register-header-link">
            <?php if (isset($_SESSION['login'])) { ?>
                <a href="<?php $this->url('panel'); ?>">حساب کاربری</a>
            <?php } else { ?>
                <a href="<?php $this->url('users/login'); ?>">ورود</a>
                <a href="<?php $this->url('users/register'); ?>">عضویت</a>
            <?php } ?>
        </div>
    </header>
