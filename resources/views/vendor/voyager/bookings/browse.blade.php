@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->getTranslatedAttribute('display_name_plural') }}
        </h1>
        @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            @if($isAdmin)
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Student</th>
                                            <th>Teacher</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->id}}</td>
                                            <td>{{$booking->user->name}}</td>
                                            <td>{{$booking->availability->teacher->name}}</td>
                                            <td>{{$booking->availability->start}}</td>
                                            <td>{{$booking->availability->end}}</td>
                                            <td>{{$booking->status}}</td>
                                            <td>{{$booking->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            @if($isStudent)
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Teacher</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->id}}</td>
                                            <td>{{$booking->availability->teacher->name}}</td>
                                            <td>{{$booking->availability->start}}</td>
                                            <td>{{$booking->availability->end}}</td>
                                            <td>{{$booking->status}}</td>
                                            <td>{{$booking->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            @if($isTeacher)
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Student</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->id}}</td>
                                            <td>{{$booking->user->name}}</td>
                                            <td>{{$booking->availability->start}}</td>
                                            <td>{{$booking->availability->end}}</td>
                                            <td>{{$booking->status}}</td>
                                            <td>{{$booking->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Single delete modal --}}
    <div class="modal modal-primary fade" tabindex="-1" id="ask_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> {{ __('Do you want to edit or delete') }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-left delete-confirm" value="{{ __('Delete') }}">
                    </form>
                <a href="#" class="btn btn-primary pull-right">{{ __('Edit') }}</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <style>

    </style>
@stop

@section('javascript')

@stop
