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
   <script src="https://js.stripe.com/v3/"></script>
         <style type="text/css">
       .StripeElement {
       box-sizing: border-box;
       width: 100%;
       height: 40px;

       padding: 10px 12px;

       border: 1px solid transparent;
       border-radius: 4px;
       background-color: white;

       box-shadow: 0 1px 3px 0 #e6ebf1;
       -webkit-transition: box-shadow 150ms ease;
       transition: box-shadow 150ms ease;
     }

     .StripeElement--focus {
       box-shadow: 0 1px 3px 0 #cfd7df;
     }

     .StripeElement--invalid {
       border-color: #fa755a;
     }

     .StripeElement--webkit-autofill {
       background-color: #fefde5 !important;
     }
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
                        <form action="{{route('checkout')}}" method="post" id="payment-form">
                         @csrf
                        <div class="contact_info_title" style="font-size: 20px;">Cart Items</div>
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
                                
                             </tr>
                           </thead>
                           <tbody>
                            @php
                              $counter=0;
                              $pr=0
                            @endphp
                            @forelse($items as $teach)
                            <?php

                                $subject=User::getsubject($teach->subject_id);
                                $level=User::getlevel($teach->level_id);

                                $pr=$pr+$teach->course_price;
                            ?>
                             <tr>
                                <td>{{++$counter}}</td>
                               <td>{{$level->name}}</td>
                               <td>{{$subject->name}}</td>
                               <td>{{date('d/m/Y',strtotime($teach->start))}} {{date('H:i:s',strtotime($teach->start))}}</td>

                               <td>{{date('d/m/Y',strtotime($teach->end))}} {{date('H:i:s',strtotime($teach->end))}}</td>
                              
                             </tr>
                             @empty
                             <h2>Record Not Found</h2>
                            @endforelse  
                           </tbody>
                         </table>
                        <br>
                         <div class="contact_info_title" style="font-size: 20px;">Credit Card</div>
                       <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                      </div>
                      <br>
                      <input type="hidden" name="prices" value="{{$pr}}">
                 <button type="submit" class="comment_button trans_200">checkout</button>
                        
                    </div>
                </form>

              
    
        </div>
    </div>
   </div>


      

    @section('extra-js-files') 
     <script src="{{asset('website-assets/js/contact.js')}}"></script>
     <script type="text/javascript">
       

  // Create a Stripe client.
var stripe = Stripe('pk_test_K8g2rxo49bgOIjFxsFai0ZK100Oh3Rzzmn');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
     </script>
    @endsection

   @endsection