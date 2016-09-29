<!DOCTYPE html>
<!--suppress ALL -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Title index</title>
    <meta name="keywords" content=""/> <!-- keywords for this site -->
    <meta name="description" content=""/> <!-- description for this site -->
    <link rel="stylesheet" type="text/css" href="<?= DIR; ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= DIR; ?>css/menu-ver.css">



    <link id="bs-css" href="<?= DIR; ?>car/css/bootstrap-cerulean.min.css" rel="stylesheet"/>
    <link href="<?= DIR; ?>car/css/charisma-app.css" rel="stylesheet"/>
    <link href="<?= DIR; ?>car/css/jquery.noty.css" rel="stylesheet"/>


    <link href="<?= DIR; ?>car/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet">
    <link href="<?= DIR; ?>car/bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet"
          media="print">
    <link href="<?= DIR; ?>car/bower_components/chosen/chosen.min.css" rel="stylesheet">
    <link href="<?= DIR; ?>car/bower_components/colorbox/example3/colorbox.css" rel="stylesheet">
    <link href="<?= DIR; ?>car/bower_components/responsive-tables/responsive-tables.css" rel="stylesheet">
    <link href="<?= DIR; ?>car/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css" rel="stylesheet">

    <link href="<?= DIR; ?>car/css/noty_theme_default.css" rel="stylesheet">
    <link href="<?= DIR; ?>car/css/elfinder.min.css" rel="stylesheet">
    <link href="<?= DIR; ?>car/css/elfinder.theme.css" rel="stylesheet">

    <link href="<?= DIR; ?>car/css/uploadify.css" rel="stylesheet">
    <link href="<?= DIR; ?>car/css/animate.min.css" rel="stylesheet">

    <script src="<?= DIR; ?>bower_components/jquery/jquery.min.js"></script>
    
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
                <?= $obj->getContent(); ?>
            </main><!-- .content -->
        </div><!-- .container-->
    </div>

    <!-- start left sidebar -->
    <aside class="left-sidebar">
        <!-- start vertical menu -->
        <div class="container-menu">
            <div id='cssmenu'>
                <ul>
                    <li class='has-sub'><a href='./'><span>Главная</span></a></li>
                    <li class='has-sub'><a href='form'><span>Форма</span></a></li>
                    <li class='has-sub'><a href='pdf'><span>Робота с pdf</span></a></li>
                    <li class='has-sub'><a href='upc'><span>UPC генератор</span></a></li>
                    <li class='has-sub'><a href='registration'><span>Registration</span></a></li>
                    <li class='has-sub'><a href='test'><span>Test page</span></a></li>
                    <li class='has-sub'><a href='test2'><span>Test page 2</span></a></li>
                    <li class='has-sub'><a href='?page=form-commit'><span>Commit</span></a></li>
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
    e-mail: gromret@gmail.com&#8195;<?php print_r(date(Y)) ?>
</footer><!-- footer -->

</body>
</html>