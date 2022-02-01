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
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Title :</strong><br>
            Site web<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Company Name :</strong><br>
            TAC-TIC<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Offer ID:</b> #1<br>
        </div>
        <div class="col-sm-4 invoice-col">
          <b>Published By:</b> Ahmed<br>
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
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-6">

          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Caher De Charge
                </button>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-check"></i> Accept
          </button>
          
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