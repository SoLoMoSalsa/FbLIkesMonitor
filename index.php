<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>No more tables (responsive table) - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="assets/css/style.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    window.alert = function() {};
    var defaultCSS = document.getElementById('bootstrap-css');

    function changeCSS(css) {
        if (css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
        else $('head > link').filter(':first').replaceWith(defaultCSS);
    }
    $(document).ready(function() {
        var iframe_height = parseInt($('html').height());
        window.parent.postMessage(iframe_height, 'http://bootsnipp.com');
    });
    </script>
</head>

<body>
    <nav class="navbar navbar-fixed-top navbar-inverse top-nav-bar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="http://www.solomosalsa.com/assets/img/SOLOMO_LOGO.svg">
                </a>
            </div>
            <div id="navbar" class="filter-category pull-right">
                <div class="bs-example" data-example-ids="select-form-control" style="  width: 300px;">
                    <form>
                      <select class="form-control" name="category" onchange="submit()">
                        <option >--Select Cateory--</option>
                        <option <?php if($_GET['category']== 'e-Commerce'){echo 'selected';} ?> >e-Commerce</option>
                        <option <?php if($_GET['category']== 'Entertainment'){echo 'selected';} ?> >Entertainment</option>
                        <option <?php if($_GET['category']== 'Fashion/Lifestyle Brands'){echo 'selected';} ?> >Fashion/Lifestyle Brands</option>
                        <option <?php if($_GET['category']== 'FMCG'){echo 'selected';} ?> >FMCG</option>
                        <option <?php if($_GET['category']== 'Food/Drink'){echo 'selected';} ?> >Food/Drink</option>
                        <option <?php if($_GET['category']== 'Liquor'){echo 'selected';} ?> >Liquor</option>
                        <option <?php if($_GET['category']== 'Media/Publishing/Internet'){echo 'selected';} ?> >Media/Publishing/Internet</option>
                        <option <?php if($_GET['category']== 'Mobile Phones'){echo 'selected';} ?> >Mobile Phones</option>
                        <option <?php if($_GET['category']== 'TV Channels'){echo 'selected';} ?> >TV Channels</option>
                        <option <?php if($_GET['category']== 'TV Show'){echo 'selected';} ?> >TV Show</option>


                      </select>
                    </form>
                  </div>
            </div>
            <!-- /.nav-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->


    <div class="container content">
        <div class="row">
            
            <div id="no-more-tables">
                <table class="col-md-12 table-condensed cf fblikes-table">
                    <thead class="cf">
                        <tr>
                            <th class="menu-right">Date </th>
                            <th class="numeric">11 Mar '15</th>
                            <th class="numeric">12 Mar '15</th>
                            <th class="numeric">13 Mar '15</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
        <?php
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];    
        }
        else
            $page = 1;
        
        if($page == 1)
            $prev = 1;
        else
            $prev = $page -1;
        if($page == 7)
            $next = 7;
        else
            $next = $page +1;
        if(!isset($_GET['category']))
        {
        ?>
        <div class="pagination-container">
        	<ul class="pagination pagination-lg">
        	        <?php 
                        echo '<li><a href="?page='.$prev.'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
                    ?>
        	        <li <?php if($page == 1){echo 'class="active"';} ?> ><a href="?page=1">1</a></li>
        	        <li <?php if($page == 2){echo 'class="active"';} ?> ><a href="?page=2">2</a></li>
        	        <li <?php if($page == 3){echo 'class="active"';} ?> ><a href="?page=3">3</a></li>
        	        <li <?php if($page == 4){echo 'class="active"';} ?> ><a href="?page=4">4</a></li>
        	        <li <?php if($page == 5){echo 'class="active"';} ?> ><a href="?page=5">5</a></li>
                    <li <?php if($page == 6){echo 'class="active"';} ?> ><a href="?page=6">6</a></li>
                    <li <?php if($page == 7){echo 'class="active"';} ?> ><a href="?page=7">7</a></li>
        	        <?php 
                        echo '<li><a href="?page='.$next.'" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                    ?>
        	      </ul>
        </div>
        <?php
}
        ?>

    </div>
<div class="footer">
            <p class="text-center">© 2014-2015 Solomo Media Pvt. Ltd. All rights reserved.</p>
        </div>
</body>
    <script src="assets/js/script.js"></script>
</html>
