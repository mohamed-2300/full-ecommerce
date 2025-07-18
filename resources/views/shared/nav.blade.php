@php
    
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    if ($user !== null) {
        $dashboardRoute = $user->getRedirectRoute();
    }

@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>

        
        
        @auth
        <li class="nav-item">
          <a class="nav-link" href=" {{ route('products.index')}} ">Products</a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link" href=" {{ route($dashboardRoute)}} ">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" {{ route('logout')}} ">Logout</a>
        </li>


        @else
        <li class="nav-item">
          <a class="nav-link" href=" {{ route('login')}} ">Login</a>
        </li>
        
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href=" {{ route('register')}} ">Register</a>
                </li>
            @endif

        @endauth
      </ul>   
  </div>
</nav>