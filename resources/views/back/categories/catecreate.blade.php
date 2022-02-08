@extends('back.index')
@section('title')
دسته بندی جدید
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title"> دسته بندی جدید  </h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <center>
      <div class="row" style="margin: auto;">
         <div class="col-lg-6">
             <form action="{{route('admin.categories.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">نام دسته بندی</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">نام مستعار_slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                            value="{{old('slug')}}">
                        @error('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    <div class="form-group">
                        <label for="title"></label>
                        <button type="submit" class="btn btn-success"> ذخیره </button>
                        <a href="{{route('admin.categories')}}" class="btn btn-info" style="padding-left:45px; font-size-lenght:55px;">بازگشت</a>
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
