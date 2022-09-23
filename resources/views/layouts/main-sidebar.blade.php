

<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="{{URL::asset('assets/js/Home.js')}}"></script>
    <title></title>
</head>
<style type="text/css">

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}


 .alert-success {
    color: #30b34e;
    background-color: #0d120e;
    border-color: #154c22;
}
.alert-danger {
    color: #f30017;
    background-color: #160607;
    border-color: #6c121b;
}

    .dot-pending{
        color: #f8ca30;
    }
    .dot-danger{
        color: #f8728a;
    }
    .dot-success{
        color: #0bcb90;
    }
    *{
        font-family: 'Arvo', serif;
    }
</style>
<body>
   <style type="text/css">
	    .bg1{
			background: #121421;
		}
		.bg2{
			background: #1e202c;
		}
		.bg3{
			background: #292b37;
		}
		.cl{
			color: #ffffff;
		}</style>



<div id="checkout-box" class="container-fluid p-0" style="">
<div class="container-fluid p-0">
		<div class="row m-0">
			<div class="p-2 bg2" style="height: 100vh;width: 320px;">
            <div class="container-fluid p-0">
            <div class="row">
            <div class="col-6">
              <img src="/Attachments/images/favicon1.png" width="80%" height="80%">

            </div>
              <div class="col-6">
			<p class="ml-1 font-weight-bold text-white" style="font-size: 130%">MANAGE</p>

            </div>
            </div>
            </div>





<div class="row m-0" style="">
					<div class="col-12 p-1">
						<div class="bg1 p-2" style="width: 100%;height: 55px;">
							<div class="float-left mr-3 text-center bg3" style="width: 40px;height: 40px;">
								<i class="fa fa-user-circle-o text-white" aria-hidden="true" style="font-size: 160%;line-height: 40px"></i>
							</div>
							<div class="float-left">
								<p class="text-white mb-0">{{Auth::user()->name}}</p>
								<p class="text-white mb-0" style="font-size: 80%;opacity: 0.7">Administrator</p>
							</div>
							<div class="bg2 float-right text-center" style="width: 40px;height: 100%;">
                               <a  class="" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
                                </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

							</div>



						</div>
					</div>
					<div class="col-6 p-1" style="height: 80px;">
                    <a href="{{url('/' . $page='analytics')}}"style="text-decoration:none;">
						<div class="bg1 p-2" style="width: 100%;height: 100%;">
							<p class="text-white mb-0" style="opacity: 0.7">Analytics</p>
							<i class="fa fa-bar-chart text-white float-right" aria-hidden="true" style="font-size: 190%;opacity: 0.5"></i>
						</div>
                    </a>
					</div>

					<div class="col-6 p-1" style="height: 80px;">
					<a href="{{url('/' . $page='Product')}}"style="text-decoration:none;">
						<div class="bg1 p-2" style="width: 100%;height: 100%;">

							<p class="text-white mb-0" style="opacity: 0.7">
							Product</p>
							<i class="fa fa fa-cutlery text-white float-right" aria-hidden="true" style="font-size: 190%;opacity: 0.5"></i>
						</div></a>
					</div>
					<div class="col-6 p-1" style="height: 80px;">
						<div class="bg1 p-2" style="width: 100%;height: 100%;">
							<p class="text-white mb-0" style="opacity: 0.7">Customer</p>
							<i class="fa fa fa-user-plus text-white float-right" aria-hidden="true" style="font-size: 190%;opacity: 0.5"></i>
						</div>
					</div>


					<div class="col-6 p-1" style="height: 80px;">
					<a href="{{url('/' . $page='system')}}"style="text-decoration:none;">
						<div class="bg1 p-2" style="width: 100%;height: 100%;">
							<p class="text-white mb-0" style="opacity: 0.7">System</p>
							<i class="fa fa-cogs text-white float-right" aria-hidden="true" style="font-size: 190%;opacity: 0.5"></i>
						</div>
						</a>
					</div>


					<div class="col-6 p-1" style="height: 80px;">
					<a href="{{url('/' . $page='change_password')}}"style="text-decoration:none;">
						<div class="bg1 p-2" style="width: 100%;height: 100%;">
							<p class="text-white mb-0" style="opacity: 0.7">Account</p>
							<i class="fa fa fa fa-key text-white float-right" aria-hidden="true" style="font-size: 190%;opacity: 0.5"></i>
						</div>
						</a>
					</div>
				</div>
			</div>




















