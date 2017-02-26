<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=COMPANYNAME?> - BUS Intergration System</title>
     <!-- jQuery -->
    <script src="<?=VENDORS?>jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="<?=CSS?>bootstrap.min.css" rel="stylesheet">
    <link href="<?=CSS?>color-palette.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=VENDORS?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=VENDORS?>nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?=CSS?>custom.css" rel="stylesheet">
    <!-- Bootstrap DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"> 
    <style type="text/css">
      .smallBIS { font-size: 40%; }
      .top10BIS { margin-top: 10px; }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=BASEURL?>" class="site_title col-xs-12 top10BIS">
                 <div class="col-xs-12"><div class="row"><img src="<?=IMAGES?>LOGO-BIS_grey.png" class="img-responsive center-block"></div></div>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

                <ul class="nav side-menu">
                
                  <?php if($accessMenus) : ?>
                    <?php foreach ($accessMenus as $menus): ?>
                      <?php 
                        if($menus['child']) {
                          $arrowDown = '<span class="fa fa-chevron-down"></span>';
                        } else {
                          $arrowDown = "";
                        }

                        if($menus['parent']['apps_menu_url'] != "#" && $menus['parent']['apps_menu_url'] !="#") {
                          $aUrl = '<a href="'.BASEURL.$menus['parent']['apps_menu_url'].'" >';
                        } else {
                          $aUrl = '<a>';
                        }
                      ?>
                      <li><?=$aUrl?><i class="<?=$menus['parent']['apps_menu_icon']?>"></i><?=$menus['parent']['apps_menu_name']?> <?=$arrowDown?></a>
                        <?php if ($menus['child']) : ?>
                          <ul class="nav child_menu">
                            <?php foreach ($menus['child'] as $child) : ?>
                            <li><a href="<?=BASEURL?><?=$child['apps_menu_url']?>"><?=$child['apps_menu_name']?></a></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  <?php endif; ?>
                    <li><a href="<?=BASEURL?>pages/contact"><i class="fa fa-phone-square"></i>&nbsp;Hubungi Kami</a>
                    <li><a href="<?=BASEURL?>logout"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user fa-lg"></i>&nbsp;<?=COMPANYNAME?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=BASEURL?>logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            

            <div class="clearfix"></div>

            <div class="row">
              <?=$contents?>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            BIS OPERATOR DASHBOARD dikembangkan Oleh PT. Media Baru Digital &copy;<?=date('Y');?>. www.bosbis.com
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="<?=JS?>bootstrap.min.js"></script>
     <!-- Modal Bot -->
    <script type="text/javascript" src="<?=JS?>modalbot.js"></script>
    <!-- FastClick -->
    <script src="<?=VENDORS?>fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=VENDORS?>nprogress/nprogress.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=JS?>custom.min.js"></script>
    <!-- Datatables JS -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
  </body>
</html>
