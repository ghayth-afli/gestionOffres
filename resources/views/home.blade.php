@extends('layouts.AdminLTE.index')

@section('icon_page', 'dashboard')

@section('title', 'Dashboard ')

@section('menu_pagina')	

@section('content')
  <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$nbUsers}}</h3>

            <p>Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('user') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{$nbOffer}}</h3>

          <p>Offers</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('offer.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{$nbOfferAcc}}<sup style="font-size: 20px"></sup></h3>

          <p>Available Offers</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{$nbOfferRef}}</h3>

          <p>Not Available Offers</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <!-- /.nav-tabs-custom -->

      <!-- Chat box -->
        <livewire:chat />
      <!-- /.box (chat box) -->
    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
      <!-- Calendar -->
      <div class="box box-solid bg-green-gradient">
        <div class="box-header">
          <i class="fa fa-calendar"></i>

          <h3 class="box-title">Calendar</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            <div class="btn-group">
              <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bars"></i></button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="#">Add new event</a></li>
                <li><a href="#">Clear events</a></li>
                <li class="divider"></li>
                <li><a href="#">View calendar</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>        
      </div>
      <!-- /.box -->

    </section>
    <!-- right col -->
  </div>
  <!-- /.row -->
@endsection