@extends('web-site.layouts.app')

@php
  use App\User
@endphp

@section('extra-css-files')

  <link rel="stylesheet" type="text/css" href="{{asset('website-assets/styles/contact.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('website-assets/styles/contact_responsive.css')}}">

@endsection

   @section('main-content')
     <br><br><br><br><br>
<div class="contact">
  

     <div class="contact_info_container">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
          </div>
          <!-- Contact Form -->
          <div class="col-lg-6">
            <div class="contact_form">
              @include('message.message')
              <div class="contact_info_title">Login Form</div>
              <form action="{{route('login')}}" class="comment_form" method="post">
                @csrf
                
                <div>
                  <div class="form_title">Email</div>
                  <input type="email" class="comment_input" required="required" name="email">
                </div>

                <div>
                  <div class="form_title">Password</div>
                  <input type="password" class="comment_input" required="required" name="password">
                </div>
               
                <div>
                  <button type="submit" class="comment_button trans_200">submit</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
    @section('extra-js-files') 
     <script src="{{asset('website-assets/js/contact.js')}}"></script>
    @endsection

   @endsection