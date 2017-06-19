<!DOCTYPE HTML>
<html lang="en-us" class="default">
<head>
    <?php $this->load->view('inc/head'); ?>
    <script type="text/javascript">
        var CUSTOMIZE_TEXTFIELD = 1;
        var FancyboxI18nClose = 'Close';
        var FancyboxI18nNext = 'Next';
        var FancyboxI18nPrev = 'Previous';
        var added_to_wishlist = 'The product was successfully added to your wishlist.';
        var ajax_allowed = true;
        var ajaxsearch = true;
        var baseDir = '';
        var baseUri = '';
        var blocksearch_type = 'top';
        var blockwishlist_add = 'The product was successfully added to your wishlist';
        var blockwishlist_remove = 'The product was successfully removed from your wishlist';
        var blockwishlist_viewwishlist = 'View your wishlist';
        var comparator_max_item = 3;
        var comparedProductsIds = [];
        var contentOnly = false;
        var currency = {
            "id": 1,
            "name": "Dollar",
            "iso_code": "USD",
            "iso_code_num": "840",
            "sign": "$",
            "blank": "0",
            "conversion_rate": "1.000000",
            "deleted": "0",
            "format": "1",
            "decimals": "1",
            "active": "1",
            "prefix": "$ ",
            "suffix": "",
            "id_shop_list": null,
            "force_id": false
        };
        var currencyBlank = 0;
        var currencyFormat = 1;
        var currencyRate = 1;
        var currencySign = '$';
        var customizationIdMessage = 'Customization #';
        var delete_txt = 'Delete';
        var displayList = false;
        var freeProductTranslation = 'Free!';
        var freeShippingTranslation = 'Free shipping!';
        var generated_date = 1459225386;
        var hasDeliveryAddress = false;
        var highDPI = false;
        var homeslider_loop = 1;
        var homeslider_pause = 3000;
        var homeslider_speed = 500;
        var homeslider_width = 779;
        var id_lang = 1;
        var img_dir = '';
        var instantsearch = false;
        var isGuest = 0;
        var isLogged = 0;
        var isMobile = false;
        var loggin_required = 'You must be logged in to manage your wishlist.';
        var max_item = 'You cannot add more than 3 product(s) to the product comparison';
        var min_item = 'Please select at least one product';
        var mywishlist_url = '';
        var page_name = 'index';
        var placeholder_blocknewsletter = 'Enter your e-mail';
        var priceDisplayMethod = 1;
        var priceDisplayPrecision = 2;
        var quickView = true;
        var removingLinkText = 'remove this product from my cart';
        var roundMode = 2;
        var search_url = '';
        var static_token = '9dd6a1e80ac1c982bcb37309d9ae779d';
        var toBeDetermined = 'To be determined';
        var token = '1354b54ecf644944597f0fde0365978a';
        var usingSecureMode = false;
        var wishlistProductsIds = false;
    </script>
    <?php $this->load->view('inc/head_js'); ?>

    <style>
        .contact-form-box {
            padding: 23px 0 0 0;
            margin: 0 0 30px 0;
            -webkit-box-shadow: rgba(0, 0, 0, 0.17) 0 3px 20px;
            box-shadow: rgba(0, 0, 0, 0.17) 0 3px 20px;
        }

        .contact-form-box fieldset {
            padding: 0 19px 21px 19px;
            background: url(http://demo4leotheme.com/prestashop/leo_emarket_demo/themes/leo_emarket/css/../img/form-contact-shadow.png) center bottom no-repeat;
        }

        fieldset {
            padding: 0;
            margin: 0;
            border: 0;
            min-width: 0;
        }

        .contact-form-box textarea.form-control {
            height: 252px;
        }

        .contact_add .home i {
            font-size: 24px;
            background-color: #CCC;
            border-radius: 50px;
            padding: 10px;
        }

        .contact_add .home {
            margin-bottom: 20px;
        }

        .contact_add .home span {
            font-size: 22px;

        }

        .contact_add p {
            margin-top: 14px;
        }
    </style>


</head>
<body id="authentication" class="authentication hide-left-column hide-right-column lang_en  fullwidth header-default">
<section id="page" data-column="col-xs-12 col-sm-6 col-md-4" data-type="grid">
    <!-- Header -->
    <?php $this->load->view('inc/header'); ?>
    <div id="breadcrumb" class="clearfix">
        <div class="container">

            <!-- Breadcrumb -->
            <div class="breadcrumb clearfix"><a class="home" href="" title="Return to Home"><i
                        class="fa fa-home"></i></a> <span class="navigation-pipe">&gt;</span>Contact us
            </div>
            <!-- /Breadcrumb -->

        </div>
    </div>
    <!-- Content -->
    <section id="columns" class="columns-container">
        <div class="container">
            <div class="row">

                <!-- Center -->
                <section id="center_column" class="col-md-12">
                    <h1 class="page-heading bottom-indent">
                        Contact us</h1>

                    <div class="col-md-4">
                        <ul class="contact_add">
                            <li class="home">
                                <img src="<?= base_url() ?>images/phone.png" width="44" height="44"/>
                                <span>Call us </span>

                                <p>You can call us for support you or to place an order, track your order or make a
                                    complaint etc. Over the

                                    phone with our friendly <a href="https://www.luxuryhandcraft.com/"> <strong>www.luxuryhandcraft.com</strong>
                                    </a> customer service team based in  Sri Lanka.</p>

                                <p><strong>Tele: +9400-000-0000 / Hotline +9400-000-0000</strong></p>

                            </li>
                            <li class="home">
                                <img src="<?= base_url() ?>images/email.png" width="44" height="44"/>
                                <span>Email us </span>

                                <p>Should you have any inquiries about your order or need more information about our
                                    products, please

                                    free feel to email is at <a href="support@luxuryhandcraft.com"><strong>support@luxuryhandcraft.com</strong></a>
                                    or just use the web form below.</p>


                            </li>

                            <li class="home">
                                <img src="<?= base_url() ?>images/location.png" width="44" height="44"/>
                                <span>Visit us</span>

                                <p>We warmly welcome to visit us at the given address and Google map for your
                                    queries.<br/>
                                    <strong>
                                        Luxury Hand Craft Online Shop,

                                        #04, Colombo Road, Galle
                                        Radawana,Gampaha, Sri Lanka..</strong>
                                </p>


                            </li>


                        </ul>

                    </div>
                    <div class="col-md-8">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0989976046276!2d80.08455121415159!3d6.997621919412717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2fff0e8e8cdd3%3A0xdc9fd660a6a8d7a!2sRTR+Inc!5e0!3m2!1sen!2slk!4v1497889339240" width="100%" height="480" frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>


                </section>
            </div>
            <br/><br/>

            <div class="row">

                <!-- Center -->
                <section id="center_column" class="col-md-12">


                    <?php
                    $error = isset($error) ? $error : $this->session->flashdata('error');
                    $valid = $this->session->flashdata('valid');
                    if (isset($valid)) $error = $valid;
                    if (isset($error)): ?>
                        <div
                            class="alert <?= isset($valid) ? 'alert-success' : 'alert-danger' ?> alert-dismissable fade in ">
                            <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                            <?= $error ?>
                        </div>
                    <?php endif; ?>


                    <form action="" method="post" class="contact-form-box">
                        <fieldset>
                            <h3 class="page-subheading">send a message</h3>

                            <div class="clearfix">
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group selector1">
                                        <label for="id_contact">Name</label>
                                        <input class="form-control grey validate" required type="text" id="email"
                                               name="name" data-validate="isEmail" value=""/>
                                    </div>
                                    <div class="form-group selector1">
                                        <label for="id_contact">Phone</label>
                                        <input class="form-control grey validate" type="text" id="phone" name="phone"
                                               data-validate="isEmail" value=""/>
                                    </div>
                                    <p id="desc_contact0" class="desc_contact">&nbsp;</p>

                                    <p id="desc_contact2" class="desc_contact contact-title unvisible">
                                        <i class="fa fa-comment-alt"></i>For any question about a product, an order
                                    </p>

                                    <p id="desc_contact1" class="desc_contact contact-title unvisible">
                                        <i class="fa fa-comment-alt"></i>If a technical problem occurs on this website
                                    </p>

                                    <p class="form-group">
                                        <label for="email">Email address</label>
                                        <input class="form-control grey validate" required type="email" id="email"
                                               name="email" data-validate="isEmail" value=""/>
                                    </p>

                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" id="message" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="submit">
                                <button type="submit" name="submitMessage" id="submitMessage"
                                        class="button btn btn-outline button-medium"><span>Send</span></button>
                            </div>
                        </fieldset>
                    </form>


                </section>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php $this->load->view('inc/footer'); ?>
</section>
<!-- #page -->
<p id="back-top"><a href="#top" title="Scroll To Top"><i class="fa fa-angle-up"></i>Top</a></p>

</body>
</html>