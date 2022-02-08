@extends('back.index')
@section('title')
ویرایش اعضا
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">   ویرایش  اعضا   </h4>
          </div>
        </div>

      </div>
      <!-- Page Title Header Ends-->
      <center>
      <div class="row">
        <div class="col-lg-6">
            <form action="{{route('admin.OurTeam.update')}}" method="POST">
                   @csrf
                   <div class="form-group">
                       <label for="title">نام دسته بندی</label>
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
                       <label for="Image"> عکس من</label>
                       <input type="file" class="form-control @error('Image') is-invalid @enderror" name="Image"
                           value="{{old('Image')}}">
                       @error('Image')
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

