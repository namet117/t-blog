<nav class="t-header fixed-top w-100 navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">
      <i class="bi-house"></i>
    </a>

    <div class="d-block d-md-none">
      <form class="form-inline my-2 my-lg-0" action="/search" method="post">
        <div class="input-group input-group-sm">
          <input type="search" class="form-control">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit"><i class="bi-search"></i></button>
          </div>
        </div>
      </form>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <i class="bi-list"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto d-flex align-items-center">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item d-none d-md-block">
          <form class="form-inline my-2 my-lg-0" action="" method="get">
            <div class="input-group input-group-sm">
              <input type="search" class="form-control" name="keyword">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="bi-search"></i></button>
              </div>
            </div>
          </form>
        </li>
      </ul>
      <div class="navbar-nav dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="http://tb.himg.baidu.com/sys/portrait/item/9218e586b0e58fa6e5af926d03" alt="Avatar" class="rounded-circle">
          name.T
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/users">个人中心</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout">退出登录</a>
        </div>
      </div>
    </div>
  </div>
</nav>
