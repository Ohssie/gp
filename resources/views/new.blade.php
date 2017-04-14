<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>CitiSumo</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" /> 
    <link rel="shortcut icon" href="/assets/citisumo.jpg"> 
    <link rel="stylesheet" href="/home/css/styles.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head> 
<body>

    <!-- Page Wrapper -->
    <div id="page-wrapper" class="page-wrapper">
        <!-- Main Content -->
        <div class="main-content">
            <!-- Navigation Bar -->
            <nav id="main-nav" class="main-nav transparent-light">
                <div class="container">
                    <!-- Logo Container -->
                    <div class="logo-container">
                        <a href="/" class="logo">
                            <!--<img src="/assets/citisumo.jpg" alt="CitiSumo" width="50" height="100" class="logo-img">-->
                            <p>CitiSumo</p>
                        </a>
                    </div>

                    <!-- Right Side Links -->
                    <div class="right-links">
                        <!-- Menu Start -->
                        <ul id="menu" class="menu">
                            <!-- Menu Item -->
                            <li><a href="#" class="menu-item">Home</a></li>
                            
                            <li><a href="/account/signup" class="button button-sm button-primary">Sign Up</a></li>

                            <li>
                                <a href="/account/login" class="button button-sm button-primary">Log In</a>
                            </li>

                        </ul>

                    </div>

                </div>
                
            </nav>
            <!--// Navigation Bar -->

            <!-- hero section -->
            <header class="hero-section">

                <div class="container-fluid">

                    <div class="row">

                        <div class="hero-slider">

                            <div class="bg-img bg-img-1 color-overlay">
                                <div class="hero-center col-md-8 col-sm-10 col-xs-12">
                                    <span>Welcome to CitiSumo</span>
                                    <h1>We Fund Dreams</h1>
                                </div>
                                <img src="/home/images/utility/bg-chart.png" class="chart" alt="chart">
                            </div>

                            <div class="bg-img bg-img-3 color-overlay">
                                <div class="hero-center col-md-8 col-sm-10 col-xs-12">
                                    <span>What we do</span>
                                    <h1>Financially Empowering</h1>
                                </div>
                                 <img src="/home/images/utility/bg-chart.png" class="chart" alt="chart">
                            </div>
                              
                        </div>

                    </div><!-- //row -->
                    
                </div><!-- //container -->

                <a href="#packages" class="mouse-box">
                    <div class="mouse"></div>
                </a>
                 
            </header>
            <!-- //hero section -->

            <!-- Pricing Tables -->
            <div class="pt80 pb80" id="packages">

                <div class="container">
                    
                    <h3 class="section-sub">get to know our</h3>
                    <h2 class="section-title">Packages Overview</h2>
                    
                    @foreach($packages as $package)
                    <div class="mb40 col-md-3 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                        <div class="price-box">
                            <a href="/account/signup" class="button button-md button-secondary">Sign Up</a>
                            <div class="price-container">
                                
                                <h5>{{ $package->package_name }}</h5>
                                
                                <div class="price-holder">
                                	@if( strlen(substr($package->cost, 0, -3)) == 4 )
                                    	<h6 class="price"><span class="symbol">N</span>{{ $package->cost[0] }}<span class="duration">thousand</span></h6>
                                    @elseif( strlen(substr($package->cost, 0, -3)) == 5 )
                                    	<h6 class="price"><span class="symbol">N</span>{{ substr($package->cost, 0, 2) }}<span class="duration">thousand</span></h6>
                                    @elseif( strlen(substr($package->cost, 0, -3)) == 6 )	
                                    	<h6 class="price"><span class="symbol">N</span>{{ substr($package->cost, 0, 3) }}<span class="duration">thousand</span></h6>
                                    @endif
                                    <!--substr(string,start,length)-->
                                </div>
                                
                                <p>{{ $package->description }}</p>

                                <i class="pe-7s-cash"></i>
                                
                            </div>
                            <div class="features-list">

                                <h6>Package Features</h6>

                                <ul>
                                    <li>{{ $package->size }}:1 Matrix</li>
                                    <li>Auto Assign</li>
                                    <li>Pay Out/In Option</li>
                                    <li>Referral Wallet</li>
                                    <li>Cash Out</li>
                                    <li>WildCard Auto Recycle</li>
                                    
                                    @if( strlen(substr($package->cost, 0, -3)) == 4 )
                                    	<li>N{{$package->cost[0] * 2 }},000 Return Investment</li>
                                    @elseif( strlen(substr($package->cost, 0, -3)) == 5 )
                                    	<li>N{{ substr($package->cost, 0, 2) * 2 }},000 Return Investment</li>
                                    @elseif( strlen(substr($package->cost, 0, -3)) == 6 )
                                    	<li>N{{ substr($package->cost, 0, 3) * 2 }},000 Return Investment</li>
                                    @endif
                                </ul>
                                <!--<p class="features-footer">Your credit card will not be charged</p>-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                 
            </div>
            <!-- //Pricing Tables -->

            <!-- icon boxes -->
            @if($news)
            <div class="services pt100 pb100 bg-color-1">

                <div class="container">

                    <div class="row">
                        @foreach($news as $news)
                            <div class="mb-sm-40 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                <div class="icon-box-1">
    
                                    <!--<i class="pe-7s-headphones color-white"></i>-->
    
                                    <h4 class="color-white">{{ $news->title }}</h4>
    
                                    <p class="color-white opacity-08">{{ $news->description }}</p>
    
                                </div>   
                            </div>
                        @endforeach
                    </div>
                    
                    <br/>
                    
                    @if( count($updates) > 3 )
                        <div class="row">
                            <div class="mb-sm-40 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                <div class="icon-box-1">
    
                                </div>
                            </div>
                            
                            <div class="mb-sm-40 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                <div class="icon-box-1">
                                    <a href="/all/news" class="button button-sm button-primary">Read more...</a>
                                </div>
                            </div>
    
                            <div class="mb-sm-40 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                                <div class="icon-box-1">
    
                                </div>
                            </div>
    
                        </div>
                    @endif
                    
                </div><!-- //container -->
                 
            </div>
            @endif
            <!-- //icon boxes -->

            <!-- text with side image -->
            <div class="bg-white pt80 pb80">

                <div class="container">

                    <div class="table">

                        <div class="row">
                            
                            <div class="mb-sm-40 col-md-5 col-sm-12 col-xs-12 side">
                               <h3 class="section-title  mb20">About Us.</h3>
                               <p class="opacity-08">CitiSumo was coined by a team of great minded individuals who had always wanted to eradicate poverty in all levels and create a world where there would be no status quo(EQUALITY)..This great platform was given birth with the sole purpose of empowering the world financially.</p>
                               <br/>
                               <p class="opacity-08">Invest in a strong and protected platform today, get back 200% interest within 7days.. CitiSumo a reliable ponzi you all don't wanna miss out on.. Unlike others you can contact the support center and get replied that same day as our customer care is very effective and capable of solving your problems within 24hours.</p>
                            </div>

                            <div class="col-md-6 col-md-push-1 col-sm-12 col-xs-12 content">

                                <img src="/home/images/services/img-4.jpg" class="w100" alt="image">
                                
                            </div>

                        </div><!-- //row -->

                    </div>
                    
                </div><!-- //container -->
                 
            </div>
            <!-- //text with side image -->

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
            

        </div>
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
