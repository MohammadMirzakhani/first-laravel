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

      <div class="row" >

          <div class="col-lg-6">
          <div class="card-body">
            @include('back.massage')
            <table class="table">
                <thead>
                    <tr>
                      <th>  نام و نام خانوادگی</th>
                      <th> رشته دانشگاهی</th>
                      <th>مدیریت</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($ourTeams as $ourTeam)
                      <tr>
                        <td>{{$ourTeam->name}}</td>
                        <td>{{$ourTeam->Reshte}}</td>
                        <td>
                            <a href="{{route('admin.OurTeam.edit',$ourTeam->id)}}"><label class="badge badge-info">ویرایش</label></a>
                            <a href="{{route('admin.OurTeam.destroy',$ourTeam->id)}}" onclick="return confirm('آیا آیتم مورد نظر حذف شود؟')"><label class="badge badge-warning">حذف</label></a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
            </table>
          </div>
          {{$ourTeams->links()}}
        </div>

      </div>

      <a href="{{route('admin.OurTeam.create')}}" class="btn btn-dribbble" style="margin-right:20px;border-radius: 8px">دسته بندی جدید</a>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <br></br>\

  @include("back.footer")
    <!-- partial -->
  </div>

@endsection
