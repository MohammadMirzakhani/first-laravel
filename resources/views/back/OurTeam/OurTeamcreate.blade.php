@extends('back.index')
@section('title')
عضو جدید
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title"> عضو جدید  </h4>
          </div>
        </div>
      </div>
      <!-- Page Title Header Ends-->
      <center>
      <div class="row" style="margin: auto;">
         <div class="col-lg-6">
             <form action="{{route('admin.OurTeam.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">نام من</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{old('name')}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Reshte">رشته دانشگاهی</label>
                        <input type="name" class="form-control @error('Reshte') is-invalid @enderror" name="Reshte"
                            value="{{old('Reshte')}}">
                        @error('Reshte')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">توضیحات</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                            value="{{old('description')}}">
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="path"> عکس من</label>
                        <input type="file" class="form-control @error('path') is-invalid @enderror" name="path"
                            >
                        @error('path')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title"></label>
                        <button type="submit" class="btn btn-success"> ذخیره </button>
                        <a href="{{route('admin.OurTeam')}}" class="btn btn-info" style="padding-left:45px; font-size-lenght:55px;">بازگشت</a>
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
