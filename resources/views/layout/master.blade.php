<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	
   <meta name="viewport" content="width=device-width, initial-scale=.5">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
	 
</head>
<body>
      @if(Session::has('jobseeker_email'))
          @include('layout.auth_jobseeker_header');
      @elseif(Session::has('jobholder_username'))
          @include ('layout.auth_jobholder_header');
      @endif

  <div class="container-fluid" >
  	<div class="row" style="" id="app">
  		<div class="col-md-3" style="background-color: white; border-color: black;">

  		 @yield('aside_bar')
     
  		</div>
  		<div class="col-md-7">
  			
  			<div style=" margin-top:-20px;width: 100%; height: 450px; background-color: #f8f8f8;overflow:auto;">
  				
          @yield('message_section')

  			</div>
  		</div>

  	</div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">
         <div class="input-group">
          <input type="text" id="message_submit" class="form-control" placeholder="Enter your message">
          <span class="input-group-addon" id="basic-addon2">Send</span>
    </div>
      </div>
    </div>
     
  </div>
</body>
</html>

<script type="text/javascript">
$("#message_submit").keypress(function(event) {
	var message = document.getElementById('message_submit').value;
   if (event.which == 13) {
    	if (message.length>0) {
    		  event.preventDefault();
    		   $.ajaxSetup({
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                       });
               $.ajax({
                   url: 'submit_message',
                   type: "POST",
                   data: {
        	              // "_token" : $('meta[name=_token]').attr('content'),
                           message: message
                         },
                   success: function (return_message) {
                              console.log(return_message);
                         }
                       });

    	}
      
    }
});

</script>
<script type="text/javascript" src="{{url('js/app.js')}}"></script>
