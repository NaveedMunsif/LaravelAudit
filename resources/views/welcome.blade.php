<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polished</title>
    <!-- <link rel="stylesheet" href="http://localhost:3000/css/bootstrap4/dist/css/bootstrap-custom.css?v=datetime"> -->
    <link rel="stylesheet" href="polished.min.css">
    <!-- <link rel="stylesheet" href="polaris-navbar.css"> -->
    <link rel="stylesheet" href="iconic/css/open-iconic-bootstrap.min.css">

    <style>
        .grid-highlight {
            padding-top: 1rem;
            padding-bottom: 1rem;
            background-color: #5c6ac4;
            border: 1px solid #202e78;
            color: #fff;
        }

        hr {
            margin: 6rem 0;
        }

        hr+.display-3,
        hr+.display-2+.display-3 {
            margin-bottom: 2rem;
        }
    </style>
    <script type="text/javascript">
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
    </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '564839313686027');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=564839313686027&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body>

<nav class="navbar bg-primary-dark navbar-expand p-0">
    <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="index.html">
        <img src="assets/polished-logo-small.png" alt="logo" width="42px">
        Polished</a>
    <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
    </button>

    <input class="border-dark bg-primary-darkest form-control d-none d-md-block w-50 ml-3 mr-2" type="text" placeholder="Search" aria-label="Search">
    <div class="dropdown d-none d-md-block">
        <img class="d-none d-lg-inline rounded-circle ml-1" width="32px" src="assets/azamuddin.jpg" alt="MA"/>
        <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
            Muhammad Azamuddin
        </button>
        <div class="dropdown-menu dropdown-menu-right" id="navbar-dropdown">
            <a href="#" class="dropdown-item">Profile</a>
            <a href="#" class="dropdown-item">Setting</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">Sign Out</a>
        </div>
    </div>
</nav>

<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">

            <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
                <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" />
                <li class="active"><a href="home.html"><span class="oi oi-home"></span> Home</a></li>
                <li><a href="dashboard.html"><span class="oi oi-dashboard"></span> Dashboard</a></li>
                <li><a href="charts.html"><span class="oi oi-pie-chart"></span> Charts</a></li>
                <li><a href="widgets.html"><span class="oi oi-puzzle-piece"></span></span> Widget / UI</a></li>
                <li><a href="forms.html"><span class="oi oi-browser"></span> Forms</a></li>
                <li><a href="buttons.html"><span class="oi oi-plus"></span> Buttons</a></li>
                <li><a href="table.html"><span class="oi oi-spreadsheet"></span> Table</a></li>
                <li><a href="colors.html"><span class="oi oi-sun"></span> Colors</a></li>
                <li><a href="font-sizes.html"><span class="oi oi-text"></span> Font Sizes</a></li>
                <div class="pt-4">
                    <a href="#" class="pl-3 fs-smallest fw-bold text-muted">LAYOUT OPTIONS </a>
                    <ul class="list-unstyled">
                        <li class=""><a href="two-columns.html"><span class="oi oi-vertical-align-top"></span>Two Columns</a></li>
                        <li class=""><a href="one-column.html"><span class="oi oi-monitor"></span>One Column</a></li>
                    </ul>
                </div>
                <div class="d-block d-md-none">
                    <div class="dropdown-divider"></div>
                    <li><a href="#"> Profile</a></li>
                    <li><a href="#"> Setting</a></li>
                    <li><a href="#"> Sign Out</a></li>
                </div>
            </ul>
            <div class="pl-3 d-none d-md-block position-fixed" style="bottom: 0px">
                <span class="oi oi-cog"></span> Setting
            </div>
        </div>
        <div class="col-lg-10 col-md-9">

            <div class="row">

                <div class="col-lg-7 pl-3 pt-2 pb-2 pr-2" style="background-image: url(assets/main.png) !important; background-size: 80% ; background-repeat: no-repeat; background-position: 15rem -5rem">
                    <div class="greeting mt-4 pl-4">
                        <h3>
                            Good Evening, Manda
                        </h3>
                        <h4 class="text-muted w-50 fw-normal">
                            Here's what's happening with your store today.
                        </h4>
                    </div>

                    <div class="row store-insight pl-4">
                        <div class="col-5">
                            <div>Today's Sales</div>
                            <h4 class="fw-normal">
                                $8900.00
                            </h4>
                        </div>
                        <div class="col-5">
                            <div>Today's Visits</div>
                            <h4 class="fw-normal">
                                37849
                            </h4>
                        </div>

                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card border-warning-light m-4 p-2 bg-warning-light shadow-sm">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-warning-light">
                                        <span class="d-block mb-2 fw-bold"> 10 tips to increase sales!.</span>
                                        <p>
                                            Here are some basic steps you can take to improve your sales performance, reduce your cost of selling, and ensure your great business.
                                        </p>
                                        <a href="#" class="btn btn-link text-primary pl-0">Learn more</a>
                                    </li>
                                    <li class="list-group-item bg-warning-light">
                                        <span class="d-block mb-2 fw-bold"> Get more customers!</span>
                                        <p>
                                            Learn how to get more customers with this step-by-step guide from expert marketers!
                                        </p>
                                        <a href="#" class="btn btn-link text-primary pl-0">Learn more</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-5 pt-2 pb-2 bg-white shadow-sm border-left border-white">

                    <div class="row p-4">
                        <div class="col-md-6 mb-1 mb-sm-0">
                            <select class="form-control" name="" id="">
                                <option value="1">All Channel</option>
                                <option value="2">Front store</option>
                                <option value="3">Mobile</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control" name="" id="">
                                <option value="1">Today</option>
                                <option value="2">Last 7 Days</option>
                                <option value="3">This Month</option>
                            </select>
                        </div>
                    </div>
                    <hr class="m-0">

                    <div class="row p-4">
                        <div class="col-md-6">
                            <small class="fw-bold">TOTAL SALES</small>
                            <h4 class="fw-normal">$33,400.00</h4>
                        </div>
                        <div class="col-md-6 text-right text-muted">
                            <span class="d-block">Jun 1</span>
                            <span>239 orders</span>
                        </div>
                    </div>

                    <small class="fw-bold mx-4">TOTAL SALES BY CHANNEL</small>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <span style="text-decoration: none !important">Front Store</span>
                                    <h5 class="mt-2">$44,430.00</h5>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#" class="btn btn-link text-right d-block p-0">View dashboard</a>
                                    <span class="text-muted">445,342 orders</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <span style="text-decoration: none !important">Mobile Store</span>
                                    <h5 class="mt-2">$3,932.00</h5>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#" class="btn btn-link text-right d-block p-0">View dashboard</a>
                                    <span class="text-muted">32,322 orders</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <nav class="navbar-shopify navbar-expand">
  <a class="navbar-brand col-sm-2 bg-dark" href="#">Polished</a>

  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent2">
  <ul class="navbar-nav">
    <li class="col-lg-3"></li>
    <form class="form-inline">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search">
    </form>
  </ul>
  <ul class="navbar-nav my-2 my-lg-0 col-4">
    <li class="nav-item dropdown">
      <a class=" nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        Muhammad Azamuddin
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item " href="#">Action</a>
        <a class="dropdown-item " href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item " href="#">Logout</a>
      </div>
    </li>
  </ul>
</div>
</nav> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
