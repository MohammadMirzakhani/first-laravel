@extends('back.index')
@section('title')
آموزش لاراول _ پنل مدیریت
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

      <div class="row">
          <div class="col-lg-12">
          <div class="card-body">
            @include('back.massage')
            <table class="table">
                <thead>
                    <tr>
                      <th>نام</th>
                      <th>ایمیل</th>
                      <th>تلفن</th>
                      <th>نقش</th>
                      <th>وضعیت</th>
                      <th>مدیریت</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                      @switch($user->role)
                          @case(1)
                         @php
                              $role="مدیر";
                         @endphp
                              @break
                          @case(2)
                          @php
                              $role="کاربر";
                          @endphp
                              @break
                          @default
                      @endswitch
                      @switch ($user->status)
                        @case(1)
                           @php
                           $url=route('admin.users.updatestatus',$user->id);
                               $status='<a href="'.$url.'"><label class="badge badge-success">فعال</label></a>';
                           @endphp
                        @break
                        @case(2)
                           @php
                           $url=route('admin.users.updatestatus',$user->id);
                                $status='<a href="'.$url.'"> <label class="badge badge-warning"> نیمه فعال </label> </a>';
                           @endphp
                        @break
                        @case(3)
                           @php
                           $url=route('admin.users.updatestatus',$user->id);
                                $status='<a href="'.$url.'"> <label class="badge badge-danger"> غیر فعال </label> </a>';
                           @endphp
                        @break
                       @endswitch
                      <tr>
                        <td>
                            @if ($user->status==1)
                            {{$user->name.'    😁'}}
                            @else
                            {{$user->name.'    😘'}}
                            @endif
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$role}}</td>
                        <td>{!!$status!!}</td>
                        <td>
                            <a href={{route('admin.users.edit',Auth::user()->id)}}><label class="badge badge-info">ویرایش</label></a>
                            <a href={{route('admin.users.delete',Auth::user()->id)}} onclick="return confirm('آیا آیتم مورد نظر حذف شود؟')"><label class="badge badge-warning">حذف</label></a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
            </table>
          </div>
          {{$users->links()}}
        </div>
        <a href="{{route('admin.categories.create')}}" class=""></a>
      </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
  @include("back.footer")
    <!-- partial -->
  </div>
@endsection
