<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Multipurpose Business and Admin HTML5 Template" />
    <meta name="description" content="Smartshop - Multipurpose eCommerce Template" />

    <!-- title  -->
   <?php  
   $title="Tienda en Linea -OSS";
     $rutaProd= base_url()."assets/";
   ?>
    <title><?php echo $title?></title>

    <!-- favicon -->
     <link href="<?php echo base_url(); ?>application/assets/img/logos/favicon.png" rel="icon" type="image/png">
   
    <link rel="apple-touch-icon"  href="<?php echo base_url(); ?>assets/img/logos/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/img/logos/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114"  href="<?php echo base_url(); ?>assets/img/logos/apple-touch-icon-114x114.png">

    <!-- plugins -->
    
     <!--link rel="stylesheet"  href="<!--?php echo base_url(); ?>assets/css/plugins/bootstrap.min.css"-->
    <link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/plugins.css">

    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css" >
<script>
function searchFilter(page_num){
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('ventas/ajaxPaginationData/'); ?>'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function(){
            $('.loading').show();
        },
        success: function(html){
            $('#dataList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>
</head>

<body>

    <!-- start page loading -->
    <div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>
    <!-- end page loading -->

    <!-- start main-wrapper section -->
    <div class="main-wrapper mp-pusher" id="mp-pusher">

        <!-- start header section -->
        <header class="fixed header-light-nav">

            <div id="top-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 col-md-6">
                            <div class="top-bar-info">
                                <ul>
                                    <li><a href="tel:01234567890"><i class="ti-mobile"></i><span class="d-none d-md-inline-block padding-10px-left">(+123) 456 7890</span></a></li>
                                    <li><a href="mailto:addyour@emailhere"><i class="ti-email"></i><span class="d-none d-md-inline-block padding-10px-left">addyour@emailhere</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-9 col-md-6">
                            <ul class="top-nav">
                                <li class="nav-item dropdown">
                                    <a href="shop-product-grid.html#" data-toggle="dropdown" class="dropdown-toggle"><i class="far fa-user"></i></a>
                                    <ul class="dropdown-menu padding-20px-all">
                                        <li class="margin-10px-bottom">
                                            <div class="media align-items-center">
                                                <img class="width-40px rounded-circle mr-3" src="img/avatar/01.png" alt="...">
                                                <div class="media-body">Nancy Miller</div>
                                            </div>

                                        </li>
                                        <li>
                                            <a href="shop-product-grid.html#!" class="dropdown-item">My Profile</a>
                                        </li>
                                        <li>
                                            <a href="shop-product-grid.html#!" class="dropdown-item">Order List</a>
                                        </li>
                                        <li>
                                            <a href="shop-product-grid.html#!" class="dropdown-item">Log Out</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a href="shop-product-grid.html#!"><i class="far fa-heart"></i></a></li>
                                <li>
                                    <select>
                                        <option>English</option>
                                        <option>Deutsch</option>
                                        <option>Italiano</option>
                                    </select>
                                </li>
                                <li>
                                    <select>
                                        <option>$ USD</option>
                                        <option>€ EUR</option>
                                        <option>£ UKP</option>
                                        <option>¥ JPY</option>
                                    </select>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-default">

                <!-- start top search -->
                <div class="top-search bg-theme">
                    <div class="container-fluid">
                        <form class="search-form" action="shop-product-grid.html#!" method="GET">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search font-size18 xs-font-size16 text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search"><i class="fas fa-times font-size18 line-height-28 margin-5px-top"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->

                <div class="container-fluid no-padding">
                    <div class="row align-items-center no-gutters">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light no-padding">

                                    <!-- category toggler -->
                                    <a href="shop-product-grid.html#!" id="trigger" class="menu-trigger"><i class="ti-menu"></i></a>
                                    <!-- end category toggler -->

                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="home-shop-1.html" class="navbar-brand logodefault"><img id="logo" src="img/logos/logo.png" alt="logo"></a>
                                        <!-- end logo -->
                                    </div>

                                    <!-- menu toggler -->
                                    <div class="navbar-toggler"></div>
                                    <!-- end menu toggler -->

                                    <!-- menu area -->
                                    <ul class="navbar-nav mx-auto" id="nav" style="display: none;">

                                        <li><a href="shop-product-grid.html#!">Home</a>
                                            <ul>
                                                <li><a href="home-shop-1.html">Home 01</a></li>
                                                <li><a href="home-shop-2.html">Home 02</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-product-grid.html#!">Pages</a>
                                            <ul>
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="contact-us.html">Contacts</a></li>
                                                <li><a href="help-faq.html">Help / FAQ</a></li>
                                                <li><a href="product-comparison.html">Product Comparison</a></li>
                                                <li><a href="order-tracking.html">Order Tracking</a></li>
                                                <li><a href="order-tracking-detail.html">Order Tracking Detail</a></li>
                                                <li><a href="search-results.html">Search Results</a></li>
                                                <li><a href="404-page.html">404 Not Found</a></li>
                                                <li><a href="comingsoon.html">Coming Soon</a></li>
                                                <li><a href="newsletter.html">Newsletter</a></li>
                                                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-product-grid.html#!">Account</a>
                                            <ul>
                                                <li><a href="login-register.html">Login / Register</a></li>
                                                <li><a href="account-password-recovery.html">Password Recovery</a></li>
                                                <li><a href="account-orders.html">Orders List</a></li>
                                                <li><a href="account-wishlist.html">Wishlist</a></li>
                                                <li><a href="account-profile.html">Profile Page</a></li>
                                                <li><a href="account-address.html">Contact / Shipping Address</a></li>
                                                <li><a href="account-tickets.html">My Tickets</a></li>
                                                <li><a href="account-single-ticket.html">Single Ticket</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-product-grid.html#!">Mega Menu</a>
                                            <ul class="row megamenu">
                                                <li class="col-lg-3 col-sm-12">
                                                    <span class="margin-10px-bottom display-block sm-no-margin sm-padding-10px-tb sm-padding-30px-lr text-uppercase sub-title">Categories 01</span>
                                                    <ul>
                                                        <li><a href="shop-product-grid.html#!">Internal SSD</a></li>
                                                        <li><a href="shop-product-grid.html#!">Memory Cards</a></li>
                                                        <li><a href="shop-product-grid.html#!">Home Theatres</a></li>
                                                        <li><a href="shop-product-grid.html#!">Unique Routers</a></li>
                                                        <li><a href="shop-product-grid.html#!">Security cameras</a></li>
                                                        <li><a href="shop-product-grid.html#!">Effective Laptops</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 col-sm-12">
                                                    <span class="margin-10px-bottom display-block sm-no-margin sm-padding-10px-tb sm-padding-30px-lr text-uppercase sub-title">Categories 02</span>
                                                    <ul>
                                                        <li><a href="shop-product-grid.html#!">Winterwear</a></li>
                                                        <li><a href="shop-product-grid.html#!">Sportswear</a></li>
                                                        <li><a href="shop-product-grid.html#!">Innerwear</a></li>
                                                        <li><a href="shop-product-grid.html#!">Ethnic Wear</a></li>
                                                        <li><a href="shop-product-grid.html#!">Cotton Lounge Wear</a></li>
                                                        <li><a href="shop-product-grid.html#!">Essential Swimwear</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 col-sm-12">
                                                    <span class="margin-10px-bottom display-block sm-no-margin sm-padding-10px-tb sm-padding-30px-lr text-uppercase sub-title">Categories 03</span>
                                                    <ul>
                                                        <li><a href="shop-product-grid.html#!">Computer Speakers</a></li>
                                                        <li><a href="shop-product-grid.html#!">Compact Headphones</a></li>
                                                        <li><a href="shop-product-grid.html#!">Best Choice Printers</a></li>
                                                        <li><a href="shop-product-grid.html#!">PC Gaming</a></li>
                                                        <li><a href="shop-product-grid.html#!">Power banks</a></li>
                                                        <li><a href="shop-product-grid.html#!">Musical Instruments</a></li>
                                                    </ul>
                                                </li>
                                                <li class="col-lg-3 col-sm-12 sm-display-none">
                                                    <span class="margin-10px-bottom display-block sm-no-margin sm-padding-10px-tb sm-padding-30px-lr text-uppercase sub-title">Current Offers</span>

                                                    <div class="offer-slider owl-carousel owl-theme">

                                                        <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-01.jpg);">
                                                            <div class="offer-text">
                                                                <h6 class="margin-5px-bottom text-white font-weight-500">Men's</h6>
                                                                <h4 class="font-size36 md-font-size32 sm-font-size30 font-weight-500"><a href="shop-product-grid.html#!">Up to 50% Off</a></h4>
                                                                <p>Lorem ipsum dolor sit amet consectetur</p>
                                                                <a class="butn-style2 small" href="shop-product-grid.html#!"><span>Buy Now</span></a>
                                                            </div>
                                                        </div>

                                                        <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-02.jpg);">
                                                            <div class="offer-text">
                                                                <h6 class="margin-5px-bottom text-white font-weight-500">Women's</h6>
                                                                <h4 class="font-size36 md-font-size32 sm-font-size30 font-weight-500"><a href="shop-product-grid.html#!" class="text-white">Up to 70% Off</a></h4>
                                                                <p>Lorem ipsum dolor sit amet consectetur</p>
                                                                <a class="butn-style2 small" href="shop-product-grid.html#!"><span>Buy Now</span></a>
                                                            </div>
                                                        </div>

                                                        <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-03.jpg);">
                                                            <div class="offer-text">
                                                                <h6 class="margin-5px-bottom text-white font-weight-500">Electronics</h6>
                                                                <h4 class="font-size36 md-font-size32 sm-font-size30 font-weight-500"><a href="shop-product-grid.html#!" class="text-white">Mega Sale</a></h4>
                                                                <p>Lorem ipsum dolor sit amet consectetur</p>
                                                                <a class="butn-style2 small" href="shop-product-grid.html#!"><span>Buy Now</span></a>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </li>

                                            </ul>
                                        </li>
                                        <li><a href="shop-product-grid.html#!">Blog</a>
                                            <ul>
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-right-sidebar.html">Blog List Right Sidebar</a></li>
                                                <li><a href="blog-left-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a href="blog-full-width.html">Blog Full Width</a></li>
                                                <li><a href="blog-post.html">Blog Post</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-product-grid.html#!">Shop</a>
                                            <ul>
                                                <li><a href="shop-categories.html">Shop Categories</a></li>
                                                <li><a href="shop-product-grid.html">Product Grid</a></li>
                                                <li><a href="shop-product-list.html">Product List</a></li>
                                                <li><a href="shop-product-full-three-coulmn.html">Product Three Coulmns</a></li>
                                                <li><a href="shop-product-full-four-coulmn.html">Product Four Coulmns</a></li>
                                                <li><a href="shop-product-detail.html">Product Detail</a></li>
                                                <li><a href="shop-cart.html">Shop Cart</a></li>
                                                <li><a href="shop-checkout-address.html">Shop Checkout</a>
                                                    <ul>
                                                        <li><a href="shop-checkout-address.html">Address</a></li>
                                                        <li><a href="shop-checkout-shipping.html">Shipping</a></li>
                                                        <li><a href="shop-checkout-payment.html">Payment</a></li>
                                                        <li><a href="shop-checkout-review.html">Review</a></li>
                                                        <li><a href="checkout-complete.html">Complete</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="shop-product-grid.html#!">Elements</a>
                                            <ul>
                                                <li><a href="accordions.html">Aaccordions</a></li>
                                                <li><a href="alerts.html">Alerts</a></li>
                                                <li><a href="buttons.html">Buttons</a></li>
                                                <li><a href="carousel-slider.html">Carousel Slider</a></li>
                                                <li><a href="countdown.html">Countdown</a></li>
                                                <li><a href="forms.html">Forms</a></li>
                                                <li><a href="google-map.html">Google Map</a></li>
                                                <li><a href="progress-bars.html">Progress Bars</a></li>
                                                <li><a href="tables.html">Tables</a></li>
                                                <li><a href="tabs.html">Tabs</a></li>
                                                <li><a href="typography.html">Typography</a></li>
                                                <li><a href="responsive-videos.html">Responsive-videos</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!-- end menu area -->

                                    <!-- start attribute navigation -->
                                    <div class="attr-nav sm-no-margin-right sm-margin-75px-right">
                                        <ul>
                                            <li class="dropdown sm-margin-20px-right">
                                                <a href="shop-product-grid.html#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="ti-bag"></i>
                                                    <span class="badge bg-theme">3</span>
                                                </a>
                                                <ul class="dropdown-menu cart-list">
                                                    <li>
                                                        <a href="shop-product-grid.html#!" class="photo"><img src="img/products/cart-thumbs/cart-thumb-01.jpg" class="cart-thumb" alt="..." /></a>
                                                        <h6><a href="shop-product-grid.html#!">Men's Football Boots </a></h6>
                                                        <p>2x - <span class="price">$30.00</span></p>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-grid.html#!" class="photo"><img src="img/products/cart-thumbs/cart-thumb-02.jpg" class="cart-thumb" alt="..." /></a>
                                                        <h6><a href="shop-product-grid.html#!">Sun Protection Cap</a></h6>
                                                        <p>1x - <span class="price">$10.20</span></p>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-grid.html#!" class="photo"><img src="img/products/cart-thumbs/cart-thumb-03.jpg" class="cart-thumb" alt="..." /></a>
                                                        <h6><a href="shop-product-grid.html#!">Heel Character Shoes</a></h6>
                                                        <p>2x - <span class="price">$39.00</span></p>
                                                    </li>
                                                    <li class="total bg-theme">
                                                        <span class="foat-left"><strong>Total</strong>: $79.20</span>
                                                        <a href="shop-cart.html" class="butn-style2 small white float-right w-auto"><span>View Cart</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="search"><a href="shop-product-grid.html#!"><i class="ti-search"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- end attribute navigation -->

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </header>
        <!-- end header section -->

        <!-- category mp-menu -->
        <div id="mp-menu" class="mp-menu">
            <div class="mp-level">
                <h2>All Categories</h2>
                <ul>
                    <li class="mp-has-sub">
                        <a href="shop-product-grid.html#">Devices</a>
                        <div class="mp-level">
                            <h2>Devices</h2>
                            <a class="mp-back" href="shop-product-grid.html#">back</a>
                            <ul>
                                <li class="mp-has-sub">
                                    <a href="shop-product-grid.html#">Mobiles Phones</a>
                                    <div class="mp-level">
                                        <h2>Mobile Phones</h2>
                                        <a class="mp-back" href="shop-product-grid.html#">back</a>
                                        <ul>
                                            <li><a href="shop-product-grid.html#">Apple Mobile</a></li>
                                            <li><a href="shop-product-grid.html#">OnePlus Mobile</a></li>
                                            <li><a href="shop-product-grid.html#">Lenovo Mobile</a></li>
                                            <li><a href="shop-product-grid.html#">Micromax Mobile</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mp-has-sub">
                                    <a href="shop-product-grid.html#">Laptops</a>
                                    <div class="mp-level">
                                        <h2>Laptops</h2>
                                        <a class="mp-back" href="shop-product-grid.html#">back</a>
                                        <ul>
                                            <li><a href="shop-product-grid.html#">Thin Laptops</a></li>
                                            <li><a href="shop-product-grid.html#">2-in-1 Laptops</a></li>
                                            <li><a href="shop-product-grid.html#">Gaming Laptops</a></li>
                                            <li><a href="shop-product-grid.html#">Budget Laptops</a></li>
                                            <li><a href="shop-product-grid.html#">Light Laptops</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mp-has-sub">
                                    <a href="shop-product-grid.html#">Televisions</a>
                                    <div class="mp-level">
                                        <h2>Televisions</h2>
                                        <a class="mp-back" href="shop-product-grid.html#">back</a>
                                        <ul>
                                            <li><a href="shop-product-grid.html#">Smart TV</a></li>
                                            <li><a href="shop-product-grid.html#">Full HD TV</a></li>
                                            <li><a href="shop-product-grid.html#">Android TV</a></li>
                                            <li><a href="shop-product-grid.html#">4K TV</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mp-has-sub">
                        <a href="shop-product-grid.html#">Beauty &amp; Health</a>
                        <div class="mp-level">
                            <h2>Beauty &amp; Health</h2>
                            <a class="mp-back" href="shop-product-grid.html#">back</a>
                            <ul>
                                <li><a href="shop-product-grid.html#">Grooming</a></li>
                                <li><a href="shop-product-grid.html#">Luxury Beauty</a></li>
                                <li><a href="shop-product-grid.html#">Make-up</a></li>
                                <li><a href="shop-product-grid.html#">Personal Care</a></li>
                                <li><a href="shop-product-grid.html#">Nutrition Care</a></li>
                                <li><a href="shop-product-grid.html#">Health Care</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mp-has-sub">
                        <a href="shop-product-grid.html#">Store</a>
                        <div class="mp-level">
                            <h2>Store</h2>
                            <a class="mp-back" href="shop-product-grid.html#">back</a>
                            <ul>
                                <li class="mp-has-sub">
                                    <a class="icon icon-t-shirt" href="shop-product-grid.html#">Clothes</a>
                                    <div class="mp-level">
                                        <h2 class="icon icon-t-shirt">Clothes</h2>
                                        <a class="mp-back" href="shop-product-grid.html#">back</a>
                                        <ul>
                                            <li>
                                                <a class="icon icon-female" href="shop-product-grid.html#">Women's Clothing</a>
                                            </li>
                                            <li>
                                                <a class="icon icon-male" href="shop-product-grid.html#">Men's Clothing</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a class="icon icon-diamond" href="shop-product-grid.html#">Watches</a>
                                </li>
                                <li>
                                    <a class="icon icon-music" href="shop-product-grid.html#">Shoes</a>
                                </li>
                                <li>
                                    <a class="icon icon-food" href="shop-product-grid.html#">Jewellery</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="shop-product-grid.html#">Books &amp; Audible</a></li>
                    <li><a href="shop-product-grid.html#">Movies &amp; Games</a></li>
                </ul>

            </div>
        </div>
        <!-- end category mp-menu -->

        <!-- start page title section -->
        <section class="page-title-section bg-img cover-background" data-background="img/bg/page-title.jpg">
            <div class="container">

                <div class="title-info">
                    <h1> Productos Disponibles</h1></div>
                <div class="breadcrumbs-info">
                    <ul>
                        <li><a href="home-shop-1.html">Home</a></li>
                        <li><a href="shop-product-grid.html#!">Productos</a></li>
                    </ul>
                </div>

            </div>
        </section>
        <!-- end page title section -->

        <!-- start product-grid section -->
        <section>
            <div class="container">
                <div class="row">
                    <!-- start sidebar panel -->
                    <div class="col-lg-3 col-12 side-bar order-2 order-lg-1">
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div id="accordion" class="accordion-style2">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Shirts</button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="shop-product-grid.html#!">Casual Shirts</a></li>
                                                <li><a href="shop-product-grid.html#!">Formal Shirts</a></li>
                                                <li><a href="shop-product-grid.html#!">Longline Shirts</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Jeans
                                    </button>
                                  </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="shop-product-grid.html#!">Regular Jeans</a></li>
                                                <li><a href="shop-product-grid.html#!">Denim Jeans</a></li>
                                                <li><a href="shop-product-grid.html#!">Low Rise Jeans</a></li>
                                                <li><a href="shop-product-grid.html#!">Mid Rise Denims</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Shoes
                                    </button>
                                  </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="shop-product-grid.html#!">Sports Shoes</a></li>
                                                <li><a href="shop-product-grid.html#!">Wedding Shoes</a></li>
                                                <li><a href="shop-product-grid.html#!">Loafers Shoes</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                      T-Shirts
                                    </button>
                                  </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="shop-product-grid.html#!">Polo T-Shirt</a></li>
                                                <li><a href="shop-product-grid.html#!">V-neck T-Shirt</a></li>
                                                <li><a href="shop-product-grid.html#!">Striped T-Shirt</a></li>
                                                <li><a href="shop-product-grid.html#!">Graphic T-Shirt</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                      Mobile
                                    </button>
                                  </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="shop-product-grid.html#!">Intex</a></li>
                                                <li><a href="shop-product-grid.html#!">Google</a></li>
                                                <li><a href="shop-product-grid.html#!">Samsung</a></li>
                                                <li><a href="shop-product-grid.html#!">Apple</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <div class="widget-title">
                                <h5>Price Range</h5>
                            </div>
                            <input type="text" class="price-range" name="my_range" value="">
                            <a href="shop-product-grid.html#!" class="butn-style2 small margin-30px-top">Filter</a>
                        </div>

                        <div class="widget">

                            <div class="widget-title">
                                <h5>Popular Products</h5>
                            </div>

                            <div class="media margin-20px-bottom">
                                <img class="mr-3" src="img/products/thumbs/thumb-06.jpg" alt="...">
                                <div class="media-body">
                                    <a href="shop-product-grid.html#!" class="margin-5px-bottom font-weight-600 text-extra-dark-gray">Men's Football Boots</a>
                                    <span class="d-block">$15.00</span>
                                </div>
                            </div>

                            <div class="media margin-20px-bottom">
								
                                <img class="mr-3" src="<?php echo $rutaProd?>thumbs/thumb-01.jpg" alt="...">
                                <div class="media-body">
                                    <a href="shop-product-grid.html#!" class="margin-5px-bottom font-weight-600 text-extra-dark-gray">Leather Motorcycle Gloves</a>
                                    <span class="d-block">$12.10</span>
                                </div>
                            </div>

                            <div class="media">
                                <img class="mr-3" src="<?php echo $rutaProd?>thumbs/thumb-02.jpg" alt="...">
                                <div class="media-body">
                                    <a href="shop-product-grid.html#!" class="margin-5px-bottom font-weight-600 text-extra-dark-gray"> Sun Protection Cap </a>
                                    <span class="d-block">$10.20</span>
                                </div>
                            </div>

                        </div>

                        <div class="widget">

                            <div class="widget-title">
                                <h5>Select by Discount</h5>
                            </div>

                            <ul class="list-discount">

                                <li class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="ten_pecentage">
                                    <label class="custom-control-label text-left" for="ten_pecentage">10% off or more</label>
                                </li>

                                <li class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="twenty_pecentage">
                                    <label class="custom-control-label text-left" for="twenty_pecentage">20% off or more</label>
                                </li>

                                <li class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="thirty_pecentage">
                                    <label class="custom-control-label text-left" for="thirty_pecentage">30% off or more</label>
                                </li>

                                <li class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="fourty_pecentage">
                                    <label class="custom-control-label text-left" for="fourty_pecentage">40% off or more</label>
                                </li>

                            </ul>
                        </div>

                        <div class="offer-slider owl-carousel owl-theme">

                            <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-01.jpg);">
                                <div class="offer-text">
                                    <h6 class="margin-5px-bottom text-white font-weight-500">Men's</h6>
                                    <h4 class="font-size36 md-font-size32 sm-font-size30 font-weight-500"><a href="shop-product-grid.html#!">Up to 50% Off</a></h4>
                                    <p>Lorem ipsum dolor sit amet consectetur</p>
                                    <a class="butn-style2 small" href="shop-product-grid.html#!"><span>Buy Now</span></a>
                                </div>
                            </div>

                            <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-02.jpg);">
                                <div class="offer-text">
                                    <h6 class="margin-5px-bottom text-white font-weight-500">Women's</h6>
                                    <h4 class="font-size36 md-font-size32 sm-font-size30 font-weight-500"><a href="shop-product-grid.html#!" class="text-white">Up to 70% Off</a></h4>
                                    <p>Lorem ipsum dolor sit amet consectetur</p>
                                    <a class="butn-style2 small" href="shop-product-grid.html#!"><span>Buy Now</span></a>
                                </div>
                            </div>

                            <div class="offer-banner-slider" style="background-image:url(img/offer-banner/offer-slide-03.jpg);">
                                <div class="offer-text">
                                    <h6 class="margin-5px-bottom text-white font-weight-500">Electronics</h6>
                                    <h4 class="font-size36 md-font-size32 sm-font-size30 font-weight-500"><a href="shop-product-grid.html#!" class="text-white">Mega Sale Offer</a></h4>
                                    <p>Lorem ipsum dolor sit amet consectetur</p>
                                    <a class="butn-style2 small" href="shop-product-grid.html#!"><span>Buy Now</span></a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- end sidebar panel -->

                    <!-- start right panel section -->
                    <div class="col-lg-9 col-12 padding-30px-left md-padding-15px-lr order-1 order-lg-2 sm-margin-35px-bottom">

                        <div class="row no-gutters align-items-center bg-light-gray rounded padding-15px-all margin-35px-bottom">

                            <div class="xs-text-center"><?php echo $numrows?> registros &nbsp;&nbsp;<span>Buscar:</span> </div>

                            <div class="col-12 col-md">

                                <div class="row col-12" >
									
										
									 <div class="col-8">
										<input type="text" id="keywords" placeholder="Escriba la descripcion de busqueda" onkeyup="searchFilter();"/>
									</div>

                                    <div class="col-4">
											<select id="sortBy" onchange="searchFilter();">
											<option value="">Ordenar por Descripcion</option>
											<option value="asc">Ascendente</option>
											<option value="desc">Descendente</option>
											</select>									
                                    </div>

                                
                                </div>

                            </div>

                        </div>

                        <div class="row justify-content-center" id="dataList">
							<?php for ($i=0;$i<3; $i++){ ?>  
								<?php foreach($productos as $producto){
									$rutaImgProd=$rutaProd.$producto['imagen'];
									if ($producto['imagen']==""){
										$rutaImgProd=$rutaProd."img/productos/no_disponible.png";
									}								
								?>
								<div class="col-11 col-sm-6 col-xl-4 margin-30px-bottom"><!--div producto-->
									<div class="product-grid">
                                    <div class="product-img">
                                        <a href="shop-product-detail.html">		
                                            <div class="label-offer bg-red">Comprar! </div>
                                            <img src="<?php echo img_exist($rutaImgProd);?>" />
                                        </a>
                                    </div>
                                    <div class="product-description">										
                                       <a href="shop-product-detail.html">
											<?php 
											$desc_array=cadenaenlineas(trim($producto['descripcion']),24,4);											
											$tmplinea = array();
											$n=0;				
											foreach($desc_array as $total_txt1){												
												echo $total_txt1."<br>";
												$n++;
											}
											if($n<=4){
												salto($n);
											}
											?>
                                        </a>
                                        <h4 class="price">
                                                       <span class="regular-price line-through">$<?php echo $producto['precio']?></span>
                                                        <span class="offer-price">$ <?php echo $producto['precio']?></span>
                                        </h4>
                                    </div>
                                    <div class="product-buttons">
                                        <ul>
                                            <li><a href="shop-product-grid.html#!" class="btn-link" title="A Lista de Deseos"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-product-grid.html#!" class="btn-link" title="Agregar a CArro"><i class="fas fa-shopping-cart"></i></a></li>                                           
                                            <li><a href="shop-product-grid.html#!" class="btn-link" title="Add To Compare"><i class="fas fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--fin div producto-->                           
                            	<?php }?>
							<?php }?>
						<div class="row col-12- col-lg">	
                       <div class="pagination text-small text-uppercase text-extra-dark-gray margin-20px-top sm-margin-15px-top">
							<ul> 
								<!-- Render pagination links -->
								<?php echo $this->ajax_pagination->create_links(); ?>
							</ul>
						</div>
                        </div>
					

 </div>
                      

                    </div>
                    <!-- end right panel section -->

                </div>
            </div>
  
        <!-- end product-grid section -->
 </section>
        <!-- start footer section -->
        <footer class="classic-footer bordered">

            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 sm-margin-40px-bottom">
                        <h3>Contact Us</h3>
                        <ul class="list-style margin-10px-bottom">
                            <li>
                                <strong>Address:</strong><span class="padding-5px-left">74 Guild Street 542B, Town MT.</span>
                            </li>
                            <li>
                                <strong>Phone: </strong><span class="padding-5px-left">(+44) 123 456 789</span>
                            </li>
                            <li>
                                <strong>Email: </strong><span class="padding-5px-left">addyour@emailhere</span>
                            </li>
                        </ul>

                        <ul class="list-style-two no-margin-bottom">
                            <li>
                                <a href="shop-product-grid.html#!"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="shop-product-grid.html#!"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="shop-product-grid.html#!"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                            <li>
                                <a href="shop-product-grid.html#!"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 sm-margin-40px-bottom">

                        <div class="row">
                            <div class="col-md-6 col-6 no-padding-right xs-padding-15px-right">
                                <h3>Quick Links</h3>
                                <ul class="list-style">
                                    <li><a href="shop-product-grid.html#!">News</a></li>
                                    <li><a href="shop-product-grid.html#!">History</a></li>
                                    <li><a href="shop-product-grid.html#!">Our shop</a></li>
                                    <li><a href="shop-product-grid.html#!">Secure shopping</a></li>
                                    <li><a href="shop-product-grid.html#!">Privacy policy</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-6 no-padding-right xs-padding-15px-right">
                                <h3>My Account</h3>
                                <ul class="list-style">
                                    <li><a href="shop-product-grid.html#!">My Account</a></li>
                                    <li><a href="shop-product-grid.html#!">Order History</a></li>
                                    <li><a href="shop-product-grid.html#!">Wish List</a></li>
                                    <li><a href="shop-product-grid.html#!">Newsletter</a></li>
                                    <li><a href="shop-product-grid.html#!">Returns</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="padding-30px-left sm-no-padding-left">

                            <div class="row">
                                <div class="col-lg-12 col-md-6 margin-35px-bottom sm-no-margin-bottom xs-margin-40px-bottom">
                                    <h3>News Letter</h3>
                                    <form method="post">
                                        <div class="form-group footer-subscribe">
                                            <input type="email" placeholder="Subscribe with us" id="email" class="form-control">
                                            <a href="shop-product-grid.html#!" class="butn-style2"><span>Join</span></a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <h3>Download Our Mobile Apps</h3>
                                    <div class="text-left">
                                        <a href="shop-product-grid.html#!" class="btn bordered text-left xs-margin-5px-left xs-margin-5px-top md-margin-10px-bottom sm-no-margin-bottom">
                                            <span class="media align-items-center">
                                        <span class="fab fa-apple font-size24 padding-15px-right"></span>
                                            <span class="media-body">
                                            <span class="d-block font-size12">Download on the</span>
                                            <strong>App Store</strong>
                                            </span>
                                            </span>
                                        </a>

                                        <a href="shop-product-grid.html#!" class="btn bordered text-left margin-5px-left md-no-margin-left sm-margin-5px-left xs-margin-5px-top">
                                            <span class="media align-items-center">
                                        <span class="fab fa-google-play font-size24 padding-15px-right"></span>
                                            <span class="media-body">
                                            <span class="d-block font-size12">Get it on</span>
                                            <strong>Google Play</strong>
                                            </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="footer-bottom padding-25px-tb margin-70px-top sm-margin-50px-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 xs-margin-15px-bottom">
                            <div class="xs-text-center">
                                <p>&copy; 2020 Smartshop is Powered by Chitrakoot Web</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-style-17 text-right sm-text-center">
                                <li><img src="img/content/payment-options/visa.png" alt="..."></li>
                                <li><img src="img/content/payment-options/mastercard.png" alt="..."></li>
                                <li><img src="img/content/payment-options/paypal.png" alt="..."></li>
                                <li><img src="img/content/payment-options/amex.png" alt="..."></li>
                                <li><img src="img/content/payment-options/discover.png" alt="..."></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- end footer section -->

    </div>
    <!-- end main-wrapper section -->

    <!-- start scroll to top -->
    <a href="shop-product-grid.html#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jQuery -->
 
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery-migrate.min.js"></script>

    <!-- Java script -->
    <script src="<?= base_url(); ?>assets/js/core.min.js"></script>

    <!-- custom scripts -->
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <!--script>var base_url = '<!--?php echo base_url() ?>';</script-->
    <!-- all js include end -->
 <?php   
function cadenaenlineas( $text, $width = '32', $lines = '10', $break = '\n', $cut = 0 ) {
      $wrappedarr = array();
      $wrappedtext = wordwrap( $text, $width, $break , true );
       $wrappedtext = trim( $wrappedtext );
      $arr = explode( $break, $wrappedtext );
     return $arr;
}
function salto($n){
	$ln=4-$n;
	for($i=0;$i<$ln;$i++){
	 echo "&nbsp;"."<br>";
 }
	}
	function img_exist($url = NULL)
{
    if (!$url) return FALSE;
$rutaProd= base_url()."assets/";
    $noimage = 'img/productos/no_disponible.png';
    $noimage=$rutaProd."img/productos/no_disponible.png";
    $headers = get_headers($url);
    return stripos($headers[0], "200 OK") ? $url : $noimage;
}
?>
</body>

</html>
