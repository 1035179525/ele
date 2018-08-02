<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>个人主页</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route("user.index")}}"><i class="fa fa-circle-o"></i> 主页列表</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>菜品分类管理</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route("menucategory.index")}}"><i class="fa fa-circle-o"></i> 菜品分类列表</a></li>
                    <li><a href="{{route("menucategory.add")}}"><i class="fa fa-circle-o"></i>菜品分类添加</a></li>
                </ul>
            </li>
            <li>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>菜品</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route("menu.index")}}"><i class="fa fa-circle-o"></i> 菜品列表</a></li>
                    <li><a href="{{route("menu.add")}}"><i class="fa fa-circle-o"></i> 菜品添加</a></li>
                    <li><a href="{{route("menu.day")}}"><i class="fa fa-circle-o"></i> 菜品按天统计</a></li>
                    <li><a href="{{route("menu.month")}}"><i class="fa fa-circle-o"></i> 菜品按月统计</a></li>
                    <li><a href="{{route("menu.year")}}"><i class="fa fa-circle-o"></i> 菜品按年统计</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>活动列表</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route("activity.index")}}"><i class="fa fa-circle-o"></i>活动首页 </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>订单管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route("order.index")}}"><i class="fa fa-circle-o"></i> 订单首页</a></li>
                    <li><a href="{{route("order.day")}}"><i class="fa fa-circle-o"></i> 订单按日统计</a></li>
                    <li><a href="{{route("order.month")}}"><i class="fa fa-circle-o"></i> 订单按月统计</a></li>
                    <li><a href="{{route("order.year")}}"><i class="fa fa-circle-o"></i> 订单按年统计</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="/pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="/pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                </a>
            </li>
            <li>
                <a href="/pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="/pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="/pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="/pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="/pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="/pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="/pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li><a href="/pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="/pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i> Level One
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>