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
                            <div id='calendar'></div>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function () {

            $('#calendar').fullCalendar({
                allDaySlot: false,
                slotDuration: '00:30',
                defaultView: 'agendaWeek',
                events: [
                        @foreach($availabilities as $availability)
                            {
                                "id": "{{$availability->id}}",
                                "title": "{{$availability->subject->name}}",
                                "start": "{{$availability->start}}",
                                "end": "{{$availability->end}}"
                            }
                            @if(!$loop->last)
                             ,
                            @endif
                        @endforeach
                ],
                eventClick: function(event, jsEvent, view) {
                    $('#ask_modal').modal('toggle');

                    $(".modal-content .modal-footer form").attr("action", "{{config('voyager.user.redirect')}}/{{$dataType->slug}}/" + event.id);
                    $(".modal-content .modal-footer a").attr("href", "{{config('voyager.user.redirect')}}/{{$dataType->slug}}/" + event.id + "/edit");
                }
            });
        });
    </script>
@stop
