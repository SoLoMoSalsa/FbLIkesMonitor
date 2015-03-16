<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FBLikesMonitor-Solomosalsa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="assets/css/style.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style type="text/css">
        .dos {
            background: rgba(0, 0, 0, 0.90);
            padding: 0px 0px 0px 0px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.3);
            z-index: 99;
        }
        .navbar-nav {
            margin: 0;
            /*font-family: roboto-light;*/
            font-size: 15px;
        }
        
        
        .dos .navbar-nav > li > a:hover, .navbar-nav .active {
            color: #fdcf08;
            transition: 0.4s;
        }
        .navbar-nav .active {
            /*font-family: roboto-regl;
*/            font-size: 15px;
        }
        .dos .navbar-nav > .active > a, .dos .navbar-nav > .active > a:hover {
            color: #fdcf08;
            background-color: transparent;
            text-align: center;
            transition: 0.4s;
        }
        .dos .navbar-toggle {
            border-color: #17181D;
        }
        .dos .navbar-toggle:hover {
            background-color: #17181D;
            border-color: #17181D;
            transition: 0.4s;
        }
        .navbar-inverse .navbar-nav >li>a {
            color: white;
            text-align: center;
        }

        button:hover .icon-bar.lev1, button:hover .icon-bar.lev2, button:hover .icon-bar.lev3{
            background-color: #fdcf08;
            transition: 0.4s;
        } 

        button:focus .icon-bar.lev1, button:focus .icon-bar.lev2, button:focus .icon-bar.lev3{
            background-color: #fdcf08;
            transition: 0.4s;
        } 

        .navbar-inverse .navbar-toggle:hover, .navbar-inverse .navbar-toggle:focus {
            background-color: #17181D!important;
            transition: 0.4s;
            /*prevents from focus to change on icon-bar*/
        }
        .change-toggle {
            float: left;
        }
        /*navbar ends********************************************************/

        .resp_img_fix {
            width: 100%;
        }
        .contact_button {
            display: inline-block;
            margin-top: -41px;
            padding: 5px;
            margin-right: 10px;
            border: 3px solid #fdcf08;
            background-color: #17181D;
            color: white;
            width: 95px;
        }
        .contact_button:hover {
            background-color: #fdcf08;
            color: black;
            transition: 0.4s;
        }
        .navbar-nav .contact_hide:hover {
          background-color: #ffd544!important;
          color: black!important;
          cursor: pointer;
          transition: 0.4s;
        }
    </style>
</head>

<body>
<div id="navbar" class="navbar navbar-inverse navbar-fixed-top dos" role="banner" style="top: 0px;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle change-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar lev1"></span>
                <span class="icon-bar lev2"></span>
                <span class="icon-bar lev3"></span>
            </button>
            <a href="http://www.solomosalsa.com/" class="navbar-brand">
                <img class="logo" src="http://www.solomosalsa.com/assets/img/SOLOMO_LOGO.svg" alt="solomo logo">
            </a><h1 class="pull-left title">/ Facebook Likes Monitor</h1>
            <!-- <button type="button" class="contact_button pull-right" data-toggle="modal" data-target="#myModal">Contact</button> -->
            <div class="navbar-collapse collapse navbar-responsive-collapse ">
                <ul class="nav navbar-nav navbar-right selectors">
                    <li><a href="http://www.solomosalsa.com/about" onclick="_gaq.push(['_trackEvent', 'solomo-website', 'navbar-click', 'tab-about']);">About</a>
                    </li>
                    <li><a href="http://www.solomosalsa.com/services" onclick="_gaq.push(['_trackEvent', 'solomo-website', 'navbar-click', 'tab-services']);">Services</a>
                    </li>
                    <li><a href="http://www.solomosalsa.com/clients" onclick="_gaq.push(['_trackEvent', 'solomo-website', 'navbar-click', 'tab-clients']);">Clients</a>
                    </li>
                    <li><a href="http://www.solomosalsa.com/careers" onclick="_gaq.push(['_trackEvent', 'solomo-website', 'navbar-click', 'tab-careers']);">Careers</a>
                    </li>
                    <li><a href="http://www.solomosalsa.com/blog" onclick="_gaq.push(['_trackEvent', 'solomo-website', 'navbar-click', 'tab-blog']);">Blog</a>
                    </li>
                    <li><a href="http://www.solomosalsa.com/#myModal" onclick="_gaq.push(['_trackEvent', 'solomo-website', 'navbar-click', 'tab-contact']);">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pull-left title-description"><p>We bring you the Facebook Pages Likes monitor in our crusade against fake likes and the ilk!
Read more about Facebook's announcement about removing non-active users from the likes count on their blog.
Got any questions or feedback? We are at idea@solomosalsa.com .</p></div>
        <div id="navbar" class="filter-category pull-right">
                <div class="bs-example" data-example-ids="select-form-control">
                    <form id="category_form">
                      <select class="form-control category-filter" name="category" onchange="submit()">Celebrity
                     </select>
                    </form>
                  </div>
            </div>
    </div>
<!-- -->

<?php /*
    <nav class="navbar navbar-fixed-top navbar-inverse top-nav-bar">
        <div class="container">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="#"><img src="http://www.solomosalsa.com/assets/img/SOLOMO_LOGO.svg">
                </a>
            <div id="navbar" class="filter-category pull-right">
                <div class="bs-example" data-example-ids="select-form-control">
                    <form id="category_form">
                      <select class="form-control category-filter" name="category" onchange="submit()">Celebrity
                     </select>
                    </form>
                  </div>
            </div>

            </div>
            
            <!-- /.nav-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
*/?>

    <div class="container content">
    <div id="loader" style="width:800px; margin:0 auto;">
       <!-- <img src="indicator.gif"/> -->
     </div>
        <div class="row">
            
            <div id="no-more-tables">
                <table class="col-md-12 col-bg-12 col-sm-12 table-condensed cf fblikes-table">
 <!--                    <thead class="cf">
                        <tr>
                            <th class="menu-right">Date </th>
                            <th class="numeric">11 Mar '15</th>
                            <th class="numeric">12 Mar '15</th>
                            <th class="numeric">13 Mar '15</th>
                            <th class="numeric">14 Mar '15</th>
                            <th class="numeric">15 Mar '15</th>
                            <th class="numeric">16 Mar '15</th>
                            <th class="numeric">%age Change </th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody> -->
                </table>
            </div>
        </div>
    </div>
<div class="footer">
            <p class="text-center">© 2014-2015 Solomo Media Pvt. Ltd. All rights reserved.</p>
        </div>
</body>
      
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/stupidtable.min.js"></script>
</html>
