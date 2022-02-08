@extends('back.index')
@section('title')
 مطلب جدید
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title"> مطلب جدید  </h4>
          </div>
        </div>

      </div>
      <!-- Page Title Header Ends-->
      <center>
      <div class="row" style="margin: auto;">
         <div class="col-lg-12">
             <form action="{{route('admin.articles.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">نام مطلب</label>
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
                    </div>
                    <div class="form-group">
                        <label for="title">محتوای مطلب </label>
                        <textarea name="description" id="editor" cols="20" rows="10" class="form-control @error('description') is-invalid @enderror ">
                           {{old('description')}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title"> نویسنده :{{Auth::user()->name}}</label>
                        <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                    </div>
                    <div class="form-group">
                        <label for="title"> وضعیت</label>
                        <select name="status" id="" class="form-control">
                            <option value="0">منتشر نشده</option>
                            <option value="1">منتشر شده</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title"> انتخاب دسته بندی ها</label>
                        <div id="output"></div>

                        <select name="categories[]" id="" class="form-control"  multiple>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}} </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="title"></label>
                        <button type="submit" class="btn btn-success"> ذخیره </button>
                        <a href="{{route('admin.articles')}}" class="btn btn-info" style="padding-left:45px; font-size-lenght:55px;">بازگشت</a>
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
