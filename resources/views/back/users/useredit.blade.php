@extends('back.index')
@section('title')
ویرایش کاربر
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">پنل مدیریت</h4>
          </div>
        </div>

      </div>
      <!-- Page Title Header Ends-->
      <center>
      <div class="row">
         <div class="col-lg-12">
             <form action="{{route('admin.users.update',$user->id)}}" method="PUT">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">نام و نام خانوادگی</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">ایمیل</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{old('email')}}">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>  <div class="form-group">
                        <label for="phone">تلفن همراه</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            value="{{old('phone')}}">
                        @error('phone')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="title">رمز ورود</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">تکرار رمز ورود</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation">
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="title"></label>
                        <button type="submit" class="btn btn-success"> ویرایش پروفایل</button>
                        <a href="{{route('admin.users')}}" class="btn btn-info" style="padding-left:45px; font-size-lenght:55px;">بازگشت</a>
                    </div>


                </form>

        </div>

      </div>

    </center>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
  @include("back.footer")
    <!-- partial -->
  </div>
@endsection
