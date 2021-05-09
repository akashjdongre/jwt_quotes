<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="color: #000;"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">{{ Auth::guard('admin')->user()->name }}</a>
            <!--<div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="">hello</a>
            </div>-->
        </li>
    </ul>

</nav>
