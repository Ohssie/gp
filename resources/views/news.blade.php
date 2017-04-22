
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>CitiSumo</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="Baljit Singh" /> 
    <link rel="shortcut icon" href="/assets/citisumo.jpg"> 
    <link rel="stylesheet" href="/home/css/styles.css" />
</head> 
<body>

    <!-- Page Wrapper -->
    <div id="page-wrapper" class="page-wrapper">

        <!-- Main Content -->
        <section class="main-content">

            <!-- Navigation Bar -->
            <nav id="main-nav" class="main-nav colored-menu">

                <div class="container">

                    <!-- Logo Container -->
                    <div class="logo-container">
                        <a href="/" class="logo">
                            <i class="pe-7s-cash"></i>
                            <p>CitiSumo</p>
                        </a>
                    </div>

                    <!-- Right Side Links -->
                    <div class="right-links">

                        <!-- Menu Start -->
                        <ul id="menu" class="menu">

                            <!-- Menu Item -->
                            <li><a href="/" class="menu-item">Home</a></li>

                            <li>
                                <a href="/account/signup" class="button button-sm button-primary">Sign Up</a>
                            </li>
                            
                            <li>
                                <a href="/account/login" class="button button-sm button-primary">Log In</a>
                            </li>
                            
                            <li><a href="/how_it_works" class="button button-sm button-primary">How It Works</a></li>

                        </ul>

                    </div>

                </div>
                
            </nav>
            <!--// Navigation Bar -->

            <!-- Page title -->
            <header class="page-title">

                <div class="container">

                    <div class="row">

                        <h1>Latest News</h1>

                    </div><!-- //row -->
                    
                </div><!-- //container -->
                
            </header>
            <!-- //page title -->

            <!-- Services -->
            <div id="services" class="pt80 pb40 services">

                <div class="container">

                    <div class="row">
                        @foreach($news as $news)
                            <div class="mb40 col-md-8 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                
                                <div class="service-box">
    
                                    <div class="info">
                                        <h4>{{ $news->type }}</h4>
                                        <a href="#"></a>
                                        <p>{{ $news->description }}</p>
                                        
                                    </div><!-- //info -->
                                    
                                </div><!-- //service box -->
    
                            </div>
                        @endforeach
                    </div><!-- //row -->

                </div><!-- //container -->
                 
            </div>
            <!-- //Services -->

            <!-- footer -->
            <footer class="footer">

                <div class="container">

                    <div class="row">
                        <div class="col-xs-12 sub-footer">
                            <p>Copyright &copy; <?php echo date('Y') ?> All Rights Reserved, CitiSumo.</p>
                            <ul class="list-cc">
                                <li><a href="https://www.facebook.com/Citisumo"><p>Contact us on Facebook</p></a></li>
                                <li><a href="https://www.facebook.com/Citisumo"><img class="icon icons8-Facebook" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABoklEQVRoQ2NkGOKAcYi7n2HUAwMdg6MxMOhjwDZgWwATw798BkZGB7o69v//A/8YmCYe3uC1AZ+9eJOQfcDW+cBsnkBXh6NZ9v8/Q+OhDd4NuNyA0wPgkGf8v34gHQ+z++//f45HNvgewOYWnB6wC9x6AChpPxg88J+B4eCh9d5YkzBOD9gHbgXqGzzg4HpvrG4d9QC94mjQxICHowyDu6M0g6GOMIbfHYK24QyPQeGBlgpjBhszcZyOHNQeAIV8Ra4e3hQ3qD0wodmCwUBbaOh64MA6LwzH13ScZThy6iVR5cCA5wFsHsCXZNB9NeoBouIZj6IhGQPYHI3Lj1++/WHwidk1uOoBUjxw4eo7hoLaE0PXA2u2PGCYMu/a0PXAgpW3GUAYFxgthUZkKYTs6SFZjI56ACkERjPxaCbG0pwebY0CkwXdhlVGi9GBHtgajQFSY2DID+4O+eF1UMVlF7BlASMjYzyllRgl+sme4IBZahOw2YGJkamB3nMFoDmBf///NeCa2IC5b3SWkpLkQQ29ozFAjVCkxIzRGKAk9KihFwDVMwpA7Un58gAAAABJRU5ErkJggg=="></a></li>
                                <!--<li><img src="https://maxcdn.icons8.com/Color/PNG/48/Finance/discover-48.png" title="Visa" alt="credit"></li>
                                <li><img src="https://maxcdn.icons8.com/Color/PNG/48/Finance/paypal-48.png" title="Visa" alt="credit"></li>
                                <li><img src="https://maxcdn.icons8.com/Color/PNG/48/Finance/am_ex-48.png" title="Visa" alt="credit"></li>
                                <li><img src="https://maxcdn.icons8.com/Color/PNG/48/Finance/google_wallet-48.png" title="Visa" alt="credit"></li>
                                <li><img src="https://maxcdn.icons8.com/Color/PNG/48/Finance/bitcoin-48.png" title="Visa" alt="credit"></li>-->
                            </ul>
                        </div>

                    </div><!-- //row -->
                    
                </div><!-- //container -->
                 
            </footer>
            <!-- //footer -->

        </section>
        <!-- //Main Content -->

    </div>
    <!-- // Page Wrapper -->


    <!-- Plugins -->
    <script src="/home/js/jquery-3.0.0.min.js"></script>
    <script src="/home/js/bootstrap.min.js"></script>
    <script src="/home/js/modernizr.custom.js"></script>
    <script src="/home/js/prettify.js"></script>
    <script src="/home/js/classie.js"></script>
    <script src="/home/js/jquery.slicknav.js"></script>
    <script src="/home/js/slick.min.js"></script>
    <script src="/home/js/all.js"></script>


</body>
</html>