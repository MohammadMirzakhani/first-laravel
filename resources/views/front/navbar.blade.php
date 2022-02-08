<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<header id="header" class="fixed-top d-flex align-items-center header-transparent">

    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Rapid</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last float-right order-lg-0" style="direction:rtl">
        <ul>
          <li><a class="nav-link scrollto active " href="#hero">خانه</a></li>
          <li class="dropdown"><a href="#"><span>فرم کاربری</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @auth
                <li><a href="{{route('porofile',auth()->user()->id)}}">پروفایل کاربری</a></li>
                @if (auth()->user()->role==1)
                <li><a href="{{route('admin.index')}}">پنل مدیریت</a></li>
                @endif
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                 <button type="submit" class="btn btn-icons">خروج</button>
              </form>
                @else
                <li><a href="{{route('register')}}">ثبت نام</a></li>
                <li><a href="{{route('login')}}">ورود</a></li>
                @endauth
            </ul>
           </li>
          <li><a class="nav-link scrollto" href="#services">خدمات</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">نمومه کارها</a></li>
          <li><a class="nav-link scrollto" href="#team">تیم ما</a></li>
          <li><a class="nav-link scrollto" href="#about">درباره ما</a></li>
          <li><a class="nav-link scrollto" href="#footer">تماس با ما</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
