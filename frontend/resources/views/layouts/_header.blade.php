<header class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="{{ route('home') }}">WANGERGOU</a>--}}
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="@if(!strpos(substr(url()->current(), 9), '/')) active @endif">
                    <a href="{{ route('home') }}">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </li>
                <li class="@if(strpos(url()->current(), 'PHP')) active @endif">
                    <a href="{{ route('tag.articles', ['PHP']) }}">PHP</a>
                </li>
                <li class="@if(strpos(url()->current(), 'about')) active @endif">
                    <a href="{{ route('about') }}" >About</a>
                </li>
<!--                <li class="dropdown">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li role="separator" class="divider"></li>-->
<!--                        <li class="dropdown-header">Nav header</li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                        <li><a href="#">One more separated link</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
            <nav>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                  <li>
                    {{--<a href="{{ route('login') }}">登录</a>--}}
                  </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
