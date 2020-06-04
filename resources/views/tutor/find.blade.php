@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Search Tutors')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-search"></i>
        Search Tutors
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
                        <div class="col-md-6">
                            <form role="form"
                                class="form-edit-add"
                                action="{{ route('search_availabilities') }}"
                                method="get">

                                <div class="panel-body">
                                	<div class="form-group col-md-12">
                                		<label class="control-label" for="name">Level</label>
                                		<select class="form-control select2" name="role">
									        @foreach($levels as $level)
									        	<option value="{{$level->id}}">{{$level->name}}</option>
									        @endforeach
									    </select>
                                	</div>
                                	<div class="form-group col-md-12">
                                		<label class="control-label" for="name">Subject</label>
                                		<select class="form-control select2" name="subject">
									        @foreach($subjects as $subject)
									        	<option value="{{$subject->id}}">{{$subject->name}}</option>
									        @endforeach
									    </select>
                                	</div>
                                </div>

                                
                                <div class="panel-footer">
                                    @section('submit-buttons')
                                        <button type="submit" class="btn btn-primary save">Search</button>
                                    @stop
                                    @yield('submit-buttons')
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
