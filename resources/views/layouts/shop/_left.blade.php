<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- search form -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">商铺平台管理</li>
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
                    <li><a href="{{route("activity.index1")}}"><i class="fa fa-circle-o"></i>活动首页 </a></li>
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
                    <li><a href="{{route("order.day")}}"><i class="fa fa-circle-o"></i> 订单统计</a></li>

                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>