@extends('web-site.layouts.app')

@php
  use App\User
@endphp

@section('extra-css-files')

  <link rel="stylesheet" type="text/css" href="{{asset('website-assets/styles/contact.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('website-assets/styles/contact_responsive.css')}}">
   <style type="text/css">
       tr:nth-child(even) {background: lavender}
       tr:nth-child(odd) {background: #FFF}
   </style>
@endsection

   @section('main-content')

   <!-- Home -->

   <div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('/')}}">Home</a></li>
                            <li>Teacher Information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>          
   </div>

   <!-- Contact -->

   <div class="contact">
    
    <!-- Contact Info -->

    <div class="contact_info_container">
        <div class="container">
            
                <!-- Contact Form -->
               
                    <div class="contact_form">
                        <form action="{{route('add-to-cart')}}" method="post">
                            @csrf
                            
                        
                        <div class="contact_info_title" style="font-size: 20px;">Teacher Detail</div>
                            <br>
                        <div class="row">
                             <div class="col-lg-4">
                                <div class="course_image">
                                   @if(!empty($teacher->avatar))
                                   <img src="{{asset('website-assets/default/default.jpg')}}" alt="">
                                   @else
                                   <img src="{{asset('users/'.$teacher->avatar)}}" alt="">
                                   @endif
                                </div>
                            </div>

                            <div class="col-lg-8">

                                <div class="col-lg-8">
                                    <div>
                                        <div class="form_title">Id</div>
                                        <input type="text" class="comment_input" readonly="true" value="{{$teacher->id}}">
                                    </div>
                                </div>
                                <br>
                            <div class="col-lg-8">
                                <div>
                                    <div class="form_title">Name</div>
                                    <input type="text" class="comment_input" readonly="true" value="{{$teacher->name}}">
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-8">
                                <div>
                                    <div class="form_title">Email</div>
                                    <input type="text" class="comment_input" readonly= "true" value="{{$teacher->email}}">
                                </div>
                            </div>

                            </div>

                        </div><br> <br>             
                        
                        <div class="contact_info_title" style="font-size: 20px;">Availability Detail</div>
                        <br>
                        @include('message.message')
                        <table class="table table-condensed table-hover">
                           <thead>
                             <tr>
                                <th>Sr.no</th>
                               <th>Class</th>
                               <th>Subject</th>
                               <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                             </tr>
                           </thead>
                           <tbody>
                            @php
                              $counter=0
                            @endphp
                            @forelse($teachers as $teach)
                            <?php

                                $subject=User::getsubject($teach->subject_id);
                                $level=User::getlevel($teach->level_id);
                            ?>
                             <tr>
                                <td>{{++$counter}}</td>
                               <td>{{$level->name}}</td>
                               <td>{{$subject->name}}</td>
                               <td>{{date('d/m/Y',strtotime($teach->start))}} {{date('H:i:s',strtotime($teach->start))}}</td>

                               <td>{{date('d/m/Y',strtotime($teach->end))}} {{date('H:i:s',strtotime($teach->end))}}</td>
                               <td>
                                   <input type="checkbox" name ="avail_id[]" value="{{$teach->id}}"> 
                               </td>
                             </tr>
                             @empty
                             <h2>Record Not Found</h2>
                            @endforelse  
                           </tbody>
                         </table>
                        <br>
                 <input type="hidden" name="user_id" value="@if(Auth::check()) {{  Auth::user()->id }} @endif" id="user">
                 <button type="submit" class="comment_button trans_200">book now</button>
                        
                    </div>
                </form>

              
    
        </div>
    </div>
   </div>


      

    @section('extra-js-files') 
     <script src="{{asset('website-assets/js/contact.js')}}"></script>
    @endsection

   @endsection