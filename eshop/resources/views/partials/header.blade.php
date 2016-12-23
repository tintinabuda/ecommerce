<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('product.index') }}">GuitarShop</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ route('product.index') }}"">Home</a></li>
      <li><a href="#">About</a></li>
    </ul>s
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="{{ route('product.shoppingCart') }}">
          <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
        </a>
      </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Account<span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if(Auth::check())
              <li><a href="{{ route('user.profile') }}">Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('user.logout') }}">Logout</a></li>
            @else
              <li><a href="{{ route('user.signup') }}">Sign Up</a></li>
              <li><a href="{{ route('user.signin') }}">Sign In</a></li>
            @endif
          </ul>
        </li>
    </ul>
  </div>
</nav>