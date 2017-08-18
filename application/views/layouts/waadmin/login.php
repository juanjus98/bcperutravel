<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo @$template['title']; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1"><!--Escalable en cualquier dispositivo-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/waadmin.min.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/tagsinput/bootstrap-tagsinput.css') ?>">

    <!-- iCheked-->
    <link href="<?php echo base_url('assets/plugins/icheck/skins/all.css?v=1.0.2') ?>" rel="stylesheet">

    <!-- Chosen-->
    <link href="<?php echo base_url('assets/plugins/chosen/chosen.min.css') ?>" rel="stylesheet">
    <!-- <link rel="stylesheet" href="chosen.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?php echo base_url('assets/icons/favicon.ico') ?>">
    <script type="text/javascript">var base_url='<?php echo base_url($this->config->item('admin_path'));?>';</script>

</head>

<body class="skin-wa">
    <header class="header">
        <a href="<?php echo base_url('waadmin');?>" class="logo">
            <?php echo $this->config->item('admin_name');?>
            <!-- <img src="<?php echo $this->config->item('admin_logo');?>" alt="<?php echo $this->config->item('admin_name');?>"> -->
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation"></nav>
    </header>

    <div class="clearfix"></div>   
    <?php echo @$template['body']; ?>
    <div class="clearfix"></div>

    <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.1.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/tagsinput/bootstrap-tagsinput.js') ?>"></script>
    <script src="<?php echo base_url('assets/plugins/js-cookie/js.cookie.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/icheck/icheck.js?v=1.0.2');?>"></script>
    <script src="<?php echo base_url('assets/plugins/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/chosen/chosen.jquery.min.js');?>"></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/waadmin.min.js'); ?>"></script>

</body>
</html>