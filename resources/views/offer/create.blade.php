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
        
    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">	
                    <form action="{{ route('offer.store') }}" method="post" enctype="multipart/form-data">
					  @csrf
                        <input type="hidden" name="active" value="1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="nome">Title</label>
                                    <input type="text" name="title" class="form-control"  placeholder="Title" required=""  autofocus>
                                    @if($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                                    <label for="nome">Company</label>
                                    <input type="text" name="company" class="form-control" placeholder="Company" required="" >
                                    @if($errors->has('company'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
                                    @if($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('filePath') ? 'has-error' : '' }}">
                                <label for="filePath">Cahier De Charge</label>
                                <input type="file" id="filePath" name="filePath">
                                @if($errors->has('filePath'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('filePath') }}</strong>
                                            </span>
                                @endif
                            </div>

                            <div class="col-lg-6"></div> 
                            <div class="col-lg-6">
                               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>    

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