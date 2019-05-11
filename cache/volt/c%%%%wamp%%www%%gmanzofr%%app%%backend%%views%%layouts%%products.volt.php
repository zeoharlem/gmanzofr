<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="utf-8" />

    <title>Manager</title>
    <meta name="description" content="Backend Manager">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    <!--end::Web font -->

    <!--begin::Base Styles -->


    <!--begin::Page Vendors -->
    <link href="<?= $this->url->get('assets/b/vendors/custom/fullcalendar/fullcalendar.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->


    <link href="<?= $this->url->get('assets/b/vendors/base/vendors.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= $this->url->get('assets/b/demo/demo6/base/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->

    <link href="<?= $this->url->get('assets/b/vendors/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?= $this->url->get('assets/b/demo/demo6/media/img/logo/favicon.ico') ?>" />

</head>
    <!-- end::Head -->

<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default"  >

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

<?= $this->partial('partials/header') ?>

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <?= $this->partial('partials/sidebar') ?>

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            
<div class="m-subheader-search">
	<h2 class="m-subheader-search__title">
		Products
		<span class="m-subheader-search__desc">Online Shoping Management</span>
	</h2>

</div>
    <div class="m-content">
        <?= $this->getContent() ?>
    </div>

        </div>
    </div>

</div>
<!-- end:: Page -->


<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->

<script src="<?= $this->url->get('assets/b/vendors/base/vendors.bundle.js') ?>" type="text/javascript"></script>
<script src="<?= $this->url->get('assets/b/demo/demo6/base/scripts.bundle.js') ?>" type="text/javascript"></script>
<!--end::Base Scripts -->


<!--begin::Page Vendors -->
<script src="<?= $this->url->get('assets/b/vendors/custom/fullcalendar/fullcalendar.bundle.js') ?>" type="text/javascript"></script>
<!--end::Page Vendors -->

<!--begin::Page Snippets -->
<script src="<?= $this->url->get('assets/b/app/js/dashboard.js') ?>" type="text/javascript"></script>
<!--end::Page Snippets -->

<?= $this->assets->outputJs('footer') ?>
</body>
<!-- end::Body -->

</html>