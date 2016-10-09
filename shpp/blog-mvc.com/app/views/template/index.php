<!DOCTYPE html>
<!--suppress ALL -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Test</title>
    <!--    <base href="--><? //=$_SERVER['DOCUMENT_ROOT'];?><!--/blog-mvc.com/app/views/template/">-->
    <base href="/../<?= SITE_NAME; ?>/public/">
    <meta name="keywords" content=""/> <!-- keywords for this site -->
    <meta name="description" content=""/> <!-- description for this site -->

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu-ver.css">

    <link type="text/css" id="bs-css" href="car/css/bootstrap-cerulean.min.css" rel="stylesheet"/>
    <link type="text/css" href="car/css/charisma-app.css" rel="stylesheet"/>
    <link type="text/css" href="car/css/jquery.noty.css" rel="stylesheet"/>

    <link type="text/css" href="car/css/noty_theme_default.css" rel="stylesheet">
    <link type="text/css" href="car/css/elfinder.min.css" rel="stylesheet">
    <link type="text/css" href="car/css/elfinder.theme.css" rel="stylesheet">

    <link type="text/css" href="car/css/uploadify.css" rel="stylesheet">


</head>
<body>
<div class="wrapper">
    <!-- start header -->

    <div id="header">
        <header class="header">
            <!-- start site name -->
            <div id="site-name">

                <!-- for use with logo -->
                <h2>Blog site </h2>

            </div>
            <!-- end site name -->
            <div>
                <div id="header-menu-div">
                    <p>

                    <input type="submit" value="go" id="search-submit" name="search-submit"/>
                    <input type="text" id="search-input" name="search-input" size="12" placeholder="Search..."/>
                    </p>
                </div>
            </div>
        </header>
    </div>
    <!-- end header -->
    <div class="middle">
        <div class="container">
            <main class="content">
                <?= $content; ?>
            </main><!-- .content -->
        </div><!-- .container-->
    </div>

    <!-- start left sidebar -->
    <aside class="left-sidebar">
        <!-- start vertical menu -->
        <div class="container-menu">
            <div id='cssmenu'>
                <ul>
                    <li class='has-sub'><a href='../'><span><i class="glyphicon glyphicon-home">&#8195;</i>Home</span></a></li>
                    <li class='has-sub'><a href='../posts-new/'><span><i class="glyphicon glyphicon-pencil">&#8195;</i>Form</span></a>
                    </li>
                    <li class='has-sub'><a href='../pdf/'><span><i class="glyphicon glyphicon-random">&#8195;</i>Merge pdf file</span></a>
                    </li>
                    <li class='has-sub'><a href='../upc/'><span><i class="glyphicon glyphicon-magnet">&#8195;</i>UPC generator</span></a>
                    </li>
                    <li class='has-sub'><a href='../test/'><span><i class="glyphicon glyphicon-envelope">&#8195;</i>Chat</span></a>
                    </li>
                    <!--                    <li class='has-sub'><a href='../form-commit/'><span>Commit</span></a></li>-->

                    <li class='has-sub'><a href='../test2/'><span><i class="glyphicon glyphicon-retweet">&#8195;</i>Forum</span></a>
                    </li>
                    <li class='has-sub'><a href='../registration/'><span><i class="glyphicon glyphicon-user">&#8195;</i>Registration</span></a>
                    </li>
                    <li class='has-sub'><a href='../about/'><span><i class="glyphicon glyphicon-info-sign">&#8195;</i>About Us</span></a>
                    </li>
                </ul>

            </div>
            <!-- end vertical menu -->

            <!-- start footer left sidebars -->

            <!-- end footer left sidebars -->
    </aside>
    <!-- start left sidebar -->

</div><!-- .middle-->
</div>
<!-- wrapper -->

<footer class="footer">
    Made in ret284<br>
    e-mail: gromret@gmail.com&#8195;<?php print_r(date('Y')); ?>
</footer><!-- footer -->

</body>
</html>

