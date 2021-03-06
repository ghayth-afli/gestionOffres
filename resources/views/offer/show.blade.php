@extends('layouts.AdminLTE.index')

@section('icon_page', 'plus')

@section('title', 'Add Offer')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('offer.index') }}" class="link_menu_page">
			<i class="fa fa-user"></i> Offers
		</a>								
	</li>

@endsection

@section('content')    
        
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Offer Details.
            <small class="pull-right">Date: {{$offer->created_at}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Title :</strong><br>
            {{$offer->title}}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Company Name :</strong><br>
            {{$offer->company}}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Offer ID:</b> #{{$offer->id}}<br>
        </div>
        <div class="col-sm-4 invoice-col">
          @if($offer->status == "Available")
            @foreach($offer->users as $user)
                  <b>Published By:{{$user->name}}</b> <br>
            @endforeach
          @endif

          @if($offer->status == "Not Available")
              @foreach($offer->users as $user)
                @foreach($user->roles as $role)
                  @if($role->label == "sales manager")
                    <b>Published By:{{$user->name}}</b> <br>
                  @endif
                @endforeach
              @endforeach
              @foreach($offer->users as $user)
                @foreach($user->roles as $role)
                  @if($role->label == "Project Manager")
                    <b>Accepted By:{{$user->name}}</b> <br>
                  @endif
                @endforeach
              @endforeach
          @endif

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             Description.
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
        <div class="col-xs-6">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          {{$offer->description}}
          </p>
        </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->
      <center><iframe src="{{ asset("img/offers/pdf/".$offer->filePath)}}" height="500" width="700"></iframe></center>
      <!-- this row will not appear when printing -->

      <div class="row no-print">
        <div class="col-xs-12">

          @if($offer->status == "Available")
            @foreach(Auth::user()->roles as $role)
              @if($role->label == "Project Manager")
                <a href="{{route('offer.accept',$offer->id)}}">
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-check"></i> Accept
                </button>
                </a>
              @endif
            @endforeach
          @else
            @foreach($offer->users as $user)
              @if($user->id == Auth::user()->id)
                <a href="{{route('offer.refuse',$offer->id)}}">
                  <button type="button" class="btn btn-danger pull-right"><i class="fa fa-ban"></i> Refuse</button>
                </a>
              @endif
            @endforeach
          @endif
        </div>
      </div>


    </section>  

@endsection

@section('layout_js')
    
    <script> 
        $(function(){             
            $('.select2').select2({
                "language": {
                    "noResults": function(){
                        return "Nenhum registro encontrado.";
                    }
                }
            }); 
        }); 

    </script>

@endsection