@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">




        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Welcome Box</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-wrench"></i></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body text-center">

            <img style="border-radius: 5px; box-shadow: 1px 1px 10px #000000" src="{{ asset('') }}assets/img/backgrounds/hrm.jpg">

            <!-- /.row -->
          </div>
          <!-- ./box-body -->
          <div class="box-footer">
            <!-- /.row -->
          </div>
          <!-- /.box-footer -->
        </div>





          <div class="row">
          <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                  <div class="inner">
                      <div class="pending_order_qty">Pending Order</div>

                      <p>$ {{ $grandPendingValue }}</p>
                      <p>{{ $grandPendingQty }} Pcs</p>

                  </div>
                  <div class="icon">
                      <i class="ion ion-bag"></i>
                  </div>
                  <a id="cnclOrder" href="javascript:void(0);" class="small-box-footer">View Pending Order <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                  <div class="inner">
                      <h3>53<sup style="font-size: 20px">%</sup></h3>

                      <p>Bounce Rate</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                  <div class="inner">
                      <h3>44</h3>

                      <p>User Registrations</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                  <div class="inner">
                      <h3>65</h3>

                      <p>Unique Visitors</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>
          <!-- ./col -->
      </div>











        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Info boxes -->

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
  @endsection