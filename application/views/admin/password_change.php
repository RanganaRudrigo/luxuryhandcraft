<!DOCTYPE >
<html  >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php $this->load->view('admin/inc/head') ?>
    <!-- bootstrap switches -->
    <link href="<?= base_url() ?>assets/lib/bootstrap-switch/build/css/bootstrap3/bootstrap-switch.css"
          rel="stylesheet">
    <!-- multiselect, tagging -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/select2/select2.css">
    <!-- main stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" media="screen">

    <!-- date range picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/lib/bootstrap-daterangepicker/daterangepicker-bs3.css">

    <style>
        .img-grid2 li {
            width: 50%;
        }
        .panel-primary {
            border-color: #428bca !important; ;
        }
        #room_list .panel {
            border:  1px solid #d0d0d0;
        }
        #room_list .col-lg-4 {
            margin: 0 0 10px 0 ;
        }
    </style>

</head>
<body class="side_nav_hover">
<!-- top bar -->
<?php $this->load->view('admin/inc/header') ?>
<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <fieldset>
                                <legend><span>Password Reset  </span>

                                    <div class="site_nav">
                                        <a href="<?= base_url() ?>admin">Dashboard</a>
                                        &raquo; Password Reset
                                    </div>
                                </legend>

                            </fieldset>

                            <?php
                            $error = isset($error) ? $error : $this->session->flashdata('error');
                            $valid = $this->session->flashdata('valid');

                            if (isset($valid)) $error = $valid;

                            if (isset($error)) {
                                ?>
                                <div
                                    class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    <?= $error ?>
                                </div>
                                <?php
                            }


                            ?>

                            <form data-parsley-validate method="post">

                                <div class="tabbable "> 
                                    <div class="tab-content">
                                        <div id="prod_tab_general" class="tab-pane active">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name"> New Password </label>
                                                        <input type="password" id="name" name="password"
                                                               value=""
                                                               class="form-control" data-parsley-required="true">
														<?= form_error('password') ?>
                                                    </div>
 

                                                    <div class="form-group">
                                                        <label for="code"> Confirm Password</label>
                                                        <input type="password" id="code" name="passconf"  
                                                               value=""
                                                               class="form-control" data-parsley-required="true"> 
<?= form_error('passconf') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix" ></div>
                                             
                                                 
 

                                        </div>

                                         
                                         

                                    </div>
                                </div>
                                <div class="clearfix" ></div>

                                <div class="form-sep">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- side navigation -->
    <?php $this->load->view('admin/inc/nav') ?>

    <!-- right slidebar -->
    <div id="slidebar">
        <div id="slidebar_content">

        </div>
    </div>
</div>
<?php $this->load->view('admin/inc/foot') ?>
<!-- wysiwg editor -->
<script src="<?= base_url() ?>assets/lib/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/lib/ckeditor/adapters/jquery.js"></script>

 

</body>


</html>
