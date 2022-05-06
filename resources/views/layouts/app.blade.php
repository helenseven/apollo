<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">
    <link rel="icon" href="img/logo.png" type="image/png">
    <meta name="csrf-param" content="_csrf-frontend">
    <meta name="csrf-token" content="diywBnrefiln8UehLqrSeONCfYVCeJr3xzlOLoy-IU8_AdVOOIQcEDWidIx8_oc-sR0wxw0P_bC9SyBNu8xpAA==">
    <title>Apollo</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" text="text/css">
    <link rel="stylesheet" href="{{asset('css/media.css')}}" text="text/css" media="only screen and (max-width: 1200px)">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
</head>

<body id="page-top">

    <!-- WRAPPER -->
    <div id="wrapper">
        <ul id="accordionSidebar" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion ">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <img src="{{asset('img/logo.png')}}" height="48px" alt="">
                    <span>Apollo</span>
                </div>
            </a>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#w2-collapse4" aria-expanded="false" aria-controls="w2-collapse4">
                    <span>Список</span>
                </a>
                <div id="w2-collapse4" class="menu collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/list/group">Академ. групи</a>
                        <a class="collapse-item" href="/list/chair">Кафедри</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#w2-collapse2" aria-expanded="false" aria-controls="w2-collapse2">
                    <span>Успішність</span>
                </a>
                <div id="w2-collapse2" class="menu collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/progress/rating">Загальний рейтинг</a>
                        <a class="collapse-item" href="/progress/scholarship_rating">Стипендіальний рейтинг</a>
                        <a class="collapse-item" href="/progress/statistics">Статистика</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#w2-collapse3" aria-expanded="false" aria-controls="w2-collapse3">
                    <span>Робочий план</span>
                </a>
                <div id="w2-collapse3" class="menu collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/workplan/speciality">Спеціальності</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#w2-collapse1" aria-expanded="false" aria-controls="w2-collapse1">
                    <span>Наукові бали</span>
                </a>
                <div id="w2-collapse1" class="menu collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/scientificactivity/rules">Правила нарахування</a>
                        <a class="collapse-item" href="/scientificactivity/accrued_points">Нараховані бали</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#w2-collapse1" aria-expanded="false" aria-controls="w2-collapse1">
                    <span>Творчі бали</span>
                </a>
                <div id="w2-collapse1" class="menu collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/creativework/rules">Правила нарахування</a>
                        <a class="collapse-item" href="/creativework/accrued_points">Нараховані бали</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#w2-collapse5" aria-expanded="false" aria-controls="w2-collapse5">
                    <span>Інше</span>
                </a>
                <div id="w2-collapse5" class="menu collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/other/information">Довідка</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
        </ul>
        <!-- END WRAPPER -->

        <!-- NAVIGATION -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand topbar mb-3 static-top shadow" role="navigation">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-avto dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" href="../app/index.html" data-toggle="dropdown">Українська
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="active dropdown-item" href="../app/index.html">Українська</a>
                            </div>
                        </li>

                        <li class="topbar-divider d-none d-sm-block"></li>
                        <li class="nav-avto dropdown no-arrow">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Авторизація
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/login">
                                    <i class="mr-2 fas fa-sign-in-alt"></i>Увійти
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- END NAVIGATION -->
                <div class="container-fluid">
                    <h1 class="h3 mb-1 text-green-800" style="display:none">Академ. групи </h1>
                    <nav aria-label="breadcrumb">
                    </nav>

                    <div id="w1">
                        <div id="w2" class="card shadow mb-2">
                            <div class="card-body">
                            @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- FOOTER -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © 2022 by Apollo</span>
                    </div>
                </div>
            </footer>
            <!-- END FOOTER -->
        </div>


        <div id="spinner" class="apl-spinner card shadow mb-2" style="display:none">
            <div class="card-body">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Завантаження...</span>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/ecb2f78/jquery.min.js?v=1588632646"></script>
    <script src="/assets/d9dd0041/yii.js?v=1620301475"></script>
    <script src="/assets/4420c17e/sb-admin-2.min.js?v=1621512450"></script>
    <script src="/assets/f66ead70/js/bootstrap.bundle.js?v=1621513650"></script>
    <script>
        jQuery(document).on('pjax:start', function() {
            $('#spinner').show();
        });
        jQuery(document).on('pjax:end', function() {
            $('#spinner').hide();
        });
        jQuery(document).on('ajaxStart', function() {
            $('#spinner').show();
        });
        jQuery(document).on('ajaxComplete', function() {
            $('#spinner').hide();
        });
    </script>
</body>

</html>