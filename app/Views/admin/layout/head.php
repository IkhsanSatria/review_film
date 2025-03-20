<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Website Review Film</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="<?php echo base_url();?>/assets/admin2/assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="<?php echo base_url();?>/assets/admin2/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["<?php echo base_url();?>/assets/admin2/assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin2/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin2/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin2/assets/css/kaiadmin.min.css" />
    
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
     <?php if(isset($dasbor)){ ?>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/admin2/assets/css/demo.css" />
    <?php } ?>
   
     <script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
        <script src="<?php echo base_url(); ?>/assets/template/js/jquery-2.2.3.min.js"></script>
  </head>
  <body>
  <div class="wrapper">
