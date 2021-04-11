@extends('admin.layout')
@section('content')
<section class="content" style="padding-top: 15px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count($regency) }}</h3>
                        <p>Quản lý chức vụ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('chuc-vu') }}" class="small-box-footer">Quản lý <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count($department) }}</h3>
                        <p>Quản lý phòng ban</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('phong-ban') }}" class="small-box-footer">Quản lý <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ count($task) }}</h3>
                        <p>Quản lý dự án</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('cong-viec') }}" class="small-box-footer">Quản lý <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count($user) }}</h3>
                        <p>Ban quản trị</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('user') }}" class="small-box-footer">Quản lý <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
  </section>
  @endsection()
