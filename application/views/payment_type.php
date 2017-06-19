<!DOCTYPE HTML>
<html lang="en-us"  class="default" >
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
        var baseDir = '<?= base_url() ?>';
        var baseUri = '<?= base_url() ?>';
        var blocksearch_type = 'top';
        var blockwishlist_add = 'The product was successfully added to your wishlist';
        var blockwishlist_remove = 'The product was successfully removed from your wishlist';
        var blockwishlist_viewwishlist = 'View your wishlist';
        var comparator_max_item = 3;
        var contentOnly = false;
        var currency = {"id":1,"name":"Dollar","iso_code":"USD","iso_code_num":"840","sign":"$","blank":"0","conversion_rate":"1.000000","deleted":"0","format":"1","decimals":"1","active":"1","prefix":"$ ","suffix":"","id_shop_list":null,"force_id":false};
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
    <script src="<?=base_url()?>js/validate.js" type="text/javascript" ></script>
    <script src="<?=base_url()?>js/authentication.js" type="text/javascript" ></script>
    <script>
        $(function(){
            $("#shipping_address").click(function(){
                if($(this).prop("checked")){
                    var address =  $('<div/>').html("<?= html_escape($cus->address1 ) ?>").text();
                    $("#shipping").val(address);
                }else{
                    $("#shipping").val("");
                }
            });
        });
    </script>
  
</head>
<body id="authentication" class="authentication hide-left-column hide-right-column lang_en  fullwidth header-default">
<section id="page" data-column="col-xs-12 col-sm-6 col-md-4" data-type="grid">
    <!-- Header -->
    <?php $this->load->view('inc/header'); ?>
    <div id="breadcrumb" class="clearfix">
        <div class="container">

            <!-- Breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="" title="Return to Home"><i class="fa fa-home"></i></a>
                <span class="navigation-pipe">&gt;</span> Authentication </div>
            <!-- /Breadcrumb -->
        </div>
    </div>
    <!-- Content -->
    <section id="columns" class="columns-container">
        <div class="container">
            <?php
            $notification = $this->session->flashdata('notification');
            $error = $notification['error'];
            $valid = $notification['success'];
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
            <!-- Steps -->
            <ul class="step clearfix" id="order_step">
                <li class="col-md-2-4 col-xs-12   first">
                    <span><em>01.</em> Summary</span>
                </li>
                <li class="col-md-2-4 col-xs-12 step_todo second">
                    <span><em>02.</em> Sign in</span>
                </li>
                <li class="col-md-2-4 col-xs-12 step_todo  third">
                    <span><em>03.</em> Address</span>
                </li>
                <li class="col-md-2-4 col-xs-12 step_todo  four">
                    <span><em>04.</em> Shipping</span>
                </li>
                <li id="step_end" class="col-md-2-4 col-xs-12 step_current last">
                    <span><em>05.</em> Payment</span>
                </li>
            </ul>
            <!-- /Steps -->


            <div class="row">

                <div id="order-detail-content" class="table_block table-responsive">
                    <table id="cart_summary" class="table table-bordered stock-management-on">
                        <thead>
                        <tr>
                            <th class="cart_product first_item">Product</th>
                            <th class="cart_description item">Description</th>
                            <th class="cart_unit item text-right">Unit price</th>
                            <th class="cart_quantity item text-center">Qty</th>
                            <th class="cart_total item text-right">Total</th>
                        </tr>
                        </thead>
                        <tfoot>

                        <tr class="cart_total_price">
                            <td colspan="4" class="text-right">Total products</td>
                            <td colspan="2" class="price" id="total_product"><?= $this->cart->format_number($this->cart->total() )?> LKR</td>
                        </tr>
                        <!--  <tr style="display: none;">
                            <td colspan="3" class="text-right"> Total gift-wrapping cost </td>
                            <td colspan="2" class="price-discount price" id="total_wrapping"> $0.00 </td>
                          </tr>-->
                        <tr class="cart_total_delivery">
                            <td colspan="4" class="text-right">Total shipping</td>
                            <td colspan="2" class="price" id="total_shipping" > <?= curreny($this->session->userdata("shipping_amount") ) ?> LKR</td>
                        </tr>
                        <!-- <tr class="cart_total_voucher unvisible">
                          <td colspan="3" class="text-right"> Total vouchers </td>
                          <td colspan="2" class="price-discount price" id="total_discount"> 	$0.00 </td>
                        </tr>-->
                        <tr class="cart_total_price">
                            <td colspan="4" class="total_price_container text-right">
                                <span>Total</span>
                                <div class="hookDisplayProductPriceBlock-price"> </div>
                            </td>
                            <td colspan="2"   class="price" id="total_price_container"> <span id="total_price"><?= $this->cart->format_number($this->cart->total()+ $this->session->userdata("shipping_amount")  )?> LKR</span> </td>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php  foreach($this->cart->contents() as $k => $item ): ?>
                            <?php sscanf($item['id'], "%d-%d", $id, $ipa); ?>
                            <tr id="product_7_34_0_0" class="cart_item address_0 <?= $k%2 ==0 ?"odd":"even" ?>">
                                <td class="cart_product">
                                    <a href=""><img width="75" src="<?=base_url('uploads/thumbs')?>/<?=$item['options']['image']?>" alt="<?=$item['name'] ?>" /></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="<?= base_url() ?>product_detail/<?= url_title($item['name']) ?>/<?= $id ?>"><?=$item['name'] ?></a></p>
                                    <small class="cart_ref">SKU : <?= $item['options']['code'] ?>
                                        <?= strlen( $item['options']['color']) ? ",Color :" .$item['options']['color'] :"" ?>
                                        <?= strlen( $item['options']['size']) ? ",Size :" .$item['options']['size'] :"" ?>
                                    </small>	 	</td>
                                <td class="cart_unit" data-title="Unit price">
                                    <ul class="price text-right" id="product_price_<?=$item['rowid'] ?>_34_0">
                                        <li class="price special-price"><?= number_format( $item['price'] , 2 ) ?></li>
                                    </ul>
                                </td>

                                <td class="cart_quantity text-center" data-title="Quantity">
                                    <?=$item['qty'] ?>
                                </td>

                                <td class="cart_total" data-title="Total">
                                    <span class="price pull-right" id="total_product_price_<?=$item['rowid'] ?>"> <?= number_format( $item['subtotal'] , 2 ) ?></span>
                                </td>

                            </tr>
                        <?php  endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div id="HOOK_PAYMENT">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="payment_module">
                                <a class="bankwire" href="<?=base_url()?>cart/order?step=5&payment=1" title="Pay by Credit Cart">
                                    Pay by Credit Card <br/><span>Payment by credit card</span>
                                </a>
                            </p>
                        </div> 
                        <div class="col-xs-12 col-md-6">
                            <p class="payment_module">
                                <a class="cash" href="<?=base_url()?>cart/order?step=5&payment=2" title="Pay by Cash.">
                                    Pay by Cash <br/><span>Cash on delivery</span>
                                </a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php $this->load->view('inc/footer'); ?>
</section>
<!-- #page -->
<p id="back-top"> <a href="#top" title="Scroll To Top"><i class="fa fa-angle-up"></i>Top</a> </p>

</body>
</html>