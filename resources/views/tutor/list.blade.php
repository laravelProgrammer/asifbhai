@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.profile-card {
			box-shadow: 0 6px 10px rgba(0,0,0,.1) !important;
			border:1px solid #EEE !important;
		}
		.profile-card:hover{
			box-shadow: 0 6px 10px rgba(0,0,0,.5) !important;
		}
		.ptb-20{
			padding-top: 40px !important;
			padding-bottom: 40px !important;
		}
		.pt-4{
			padding-top:4px !important;
		}
		.pl-0{
			padding-left:0px !important;
		}
		.pt-25{
			padding-top:25px !important;
		}
	</style>    
@stop

@section('page_title', 'List Tutors')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i>
        List Tutors
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body ptb-20">
                            	@foreach($availabilities as $availability)
	                            	<div class="col-md-4">
	                            		<a href="{{route('voyager.availabilities.show', $availability->id)}}">
		                            		<div class="panel profile-card">
		                            			<div class="panel-header">
		                            				<img src="{{asset('storage/'.$availability->teacher->avatar)}}" width="100%" height="250px">
		                            			</div>
		                            			<div class="panel-body pt-25">
		                            				 <div class="row">
		                            				 	<div class="col-md-3">
		                            				 		<img src="{{asset('storage/users/default.png')}}" width="100%">
		                            				 	</div>
		                            				 	<div class="col-md-8 pt-4 pl-0">
		                            				 		<h4>{{$availability->teacher->name}}</h4>
		                            				 		<p>Software Engineer</p>
		                            				 	</div>
		                            				 </div>
		                            				 Body
		                            			</div>
		                            			<div class="panel-footer">
		                            				 footer
		                            			</div>
		                            		</div>
		                            	</a>
	                            	</div>
                            	@endforeach
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

