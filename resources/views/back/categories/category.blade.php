@extends('back.index')
@section('title')
آموزش لاراول _ پنل دسته بندی ها
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title"> پنل دسته بندی ها </h4>
          </div>
        </div>

      </div>
      <!-- Page Title Header Ends-->

      <div class="row">
          <div class="col-lg-12">
          <div class="card-body">
            @include('back.massage')
            <table class="table">
                <thead>
                    <tr>
                      <th>  نام دسته بندی</th>
                      <th>نام مستعار</th>
                      <th>مدیریت</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit',$category->id)}}"><label class="badge badge-info">ویرایش</label></a>
                            <a href="{{route('admin.categories.destroy',$category->id)}}" onclick="return confirm('آیا آیتم مورد نظر حذف شود؟')"><label class="badge badge-warning">حذف</label></a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
            </table>
          </div>
          {{$categories->links()}}
        </div>
      </div>
      <a href="{{route('admin.categories.create')}}" class="btn btn-dribbble" style="margin-right:20px;border-radius: 8px">دسته بندی جدید</a>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <br></br>
  @include("back.footer")
    <!-- partial -->
  </div>
@endsection
