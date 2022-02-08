@extends('front.index')
@section('content')

<section id="hero" class="clearfix">


    <main id="main">
        <main class="container main2">

            <nav aria-label="breadcrumb " style="float: right;direction:rtl">
              <ol class="breadcrumb bgcolor">
                <li class="breadcrumb-item" ><a href="#">خانه</a></li>
                <li class="breadcrumb-item active" aria-current="page">ورود</li>
              </ol>
            </nav>
          </main>
          <br></br><br></br>
        <div class="d-flex justify-content-center">
            <form action="{{route('login')}}" method="POST">
                @csrf


                <div class="form-group">
                    <center><label for="title">ایمیل</label></center>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div><br>

                <div class="form-group">
                <center><label for="title">رمز ورود</label></center>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div><br>

                <div class="form-group">
                <center>  <label for="title">مرا بخاطر بسپار</label></center>
                <center> <input type="checkbox" class="form-check-input" name="remember"></center>

                </div><br>

                <div class="form-group">
                <center>  <label for="title"></label>
                    <button type="submit" class="btn btn-success">ورود</button></center>
                </div><br>
                <br></br>
            </form>



        </div>

    </main>
@endsection


