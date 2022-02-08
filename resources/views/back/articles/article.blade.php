@extends('back.index')
@section('title')
  آموزش لاراول _ پنل مدیریت مطالب
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مدیریت مطالب</h4>
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
                      <th>   نام</th>
                      <th>نام مستعار</th>
                      <th>نویسنده </th>
                      <th>دسته بندی </th>
                      <th> بازدید</th>
                      <th> وضعیت</th>
                      <th>مدیریت</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($articles as $article)
                      @switch ($article->status)
                      @case(1)
                         @php
                         $url=route('admin.articles.updatestatus',$article->id);
                             $status='<a href="'.$url.'"><label class="badge badge-success">منتشر شده</label></a>';
                         @endphp
                      @break
                      @case(0)
                         @php
                         $url=route('admin.articles.updatestatus',$article->id);
                              $status='<a href="'.$url.'"> <label class="badge badge-danger"> منتشر نشده </label> </a>';
                         @endphp
                      @break
                     @endswitch
                      <tr>
                        <td>{{$article->name}}</td>
                        <td>{{$article->slug}}</td>
                        <td>{{$article->user->name}}</td>
                        <td>
                            @foreach ($article->categories as $category)
                             <span class="badge badge-pill badge-primary">{{$category->name}}</span>
                            @endforeach
                        </td>
                        <td>{{$article->hits}}</td>
                        <td>{!!$status!!}</td>
                        <td>
                            <a href="{{route('admin.articles.edit',$article->id)}}"><label class="badge badge-info">ویرایش</label></a>
                            <a href="{{route('admin.articles.destroy',$article->id)}}" onclick="return confirm('آیا آیتم مورد نظر حذف شود؟')"><label class="badge badge-warning">حذف</label></a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
            </table>
          </div>
          {{$articles->links()}}
        </div>
      </div>
      <a href="{{route('admin.articles.create')}}" class="btn btn-dribbble" style="margin-right:20px;border-radius: 8px"> مطلب جدید</a>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <br></br>
  @include("back.footer")
    <!-- partial -->
  </div>
@endsection
