<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">首页</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/about">关于我们<span class="sr-only">(current)</span></a></li>
                <li><a href="/help" class="active">帮助</a></li>
                @foreach(\App\Models\Nav::where("pid","0")->get() as $nav)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$nav->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach(\App\Models\Nav::where("pid",$nav->id)->orderBy("sort","desc")->get() as $n)
                            <li><a href="{{route($n->url)}}">{{$n->name}}</a></li>
                    @endforeach
                    </ul>
                </li>
                    @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @auth("admin")
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">欢迎您:{{\Illuminate\Support\Facades\Auth::guard("admin")->user()->name}}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route("admin.update",\Illuminate\Support\Facades\Auth::guard("admin")->user()->id)}}">修改密码</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route("admin.loginout")}}">注销登录</a></li>
                        </ul>
                    </li>
                @endauth

                @guest("admin")
                        <li><a href="{{route("admin.login")}}">登录</a></li>
                @endguest


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>