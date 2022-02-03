@extends('layouts.AdminLTE.index')

@section('icon_page', 'user')

@section('title', 'Offers')

@section('menu_pagina')	
		
	<li role="presentation">
		<a href="{{ route('offer.create') }}" class="link_menu_page">
			<i class="fa fa-plus"></i> Add
		</a>								
	</li>

@endsection

@section('content')    
        

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Company Name</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offers as $offer)
                  @if($offer->status == "Available")
                    <tr>
                      <td>{{$offer->title}}</td>
                      <td>{{$offer->company}}
                      </td>
                      <td>{{substr($offer->description,0,70)."..."}}</td>
                      <td> {{$offer->created_at}} </td>
                      <td><span class="label label-success">{{$offer->status}}</span></td>
                      <td class="text-center"> 
                          <a class="btn btn-default  btn-xs" href="{{ route('offer.show',$offer->id) }}" title="See Offer"><i class="fa fa-eye">   </i></a>
                          @if (Auth::user()->can('create-offer', 'edit-offer', 'destroy-offer'))
                            <a class="btn btn-warning  btn-xs" href="{{ route('offer.edit',$offer->id) }}" title="Edit Offer"><i class="fa fa-pencil"></i></a> 
                            <a href="javascript:;" onclick="document.getElementById({{$offer->id}}).submit();" title="Delete Offer" data-toggle="modal" data-target="#modal-delete-2"><i class="fa fa-trash"></i></a> 
                            <form action="{{ route('offer.destroy',$offer->id) }}" method="post" id={{$offer->id}}>
                              @csrf
                              @method('DELETE')
                            </form>
                          @endif
                        </td>
                    </tr>
                  @else
                    <tr>
                      <td>{{$offer->title}}</td>
                      <td>{{$offer->company}}
                      </td>
                      <td>{{substr($offer->description,0,70)."..."}}</td>
                      <td> {{$offer->created_at}}</td>
                      <td><span class="label label-danger">{{$offer->status}}</span></td>
                      <td class="text-center"> 
                          <a class="btn btn-default  btn-xs" href="{{ route('offer.show',$offer->id) }}" title="See Offer"><i class="fa fa-eye">   </i></a>
                          @if (Auth::user()->can('create-offer', 'edit-offer', 'destroy-offer'))
                            <a class="btn btn-warning  btn-xs" href="{{ route('offer.edit',$offer->id) }}" title="Edit Offer"><i class="fa fa-pencil"></i></a> 
                            <a href="javascript:;" onclick="document.getElementById({{$offer->id}}).submit();" title="Delete Offer" data-toggle="modal" data-target="#modal-delete-2"><i class="fa fa-trash"></i></a> 
                            <form action="{{ route('offer.destroy',$offer->id) }}" method="post" id={{$offer->id}}>
                              @csrf
                              @method('DELETE')
                            </form>
                          @endif
                        </td>
                    </tr>
                  @endif
                  
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Company Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('layout_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- jQuery 3 -->
    <script src="{{ asset('assets/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script>
    <!-- page script -->

    <script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>

@endsection

@include('layouts.AdminLTE._includes._data_tables')