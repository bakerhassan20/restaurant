<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">



	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="{{URL::asset('assets/js/Home.js')}}"></script>

    <title></title>
</head>
<style type="text/css">

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
<div class="container-fluid p-0">
	<div class="row m-0">
		<div class="p-2 bg2" style="height:100hv;width: 320px;">
			<p class="ml-1 font-weight-bold cl" style="font-size: 130%">Orders</p>
			<div id="cart-box" style="">
				<div id="cart-item" style="height: calc(100vh - 250px);width: 100%;">
                 @foreach($reservation as $reserve)
				<div class="p-2 bg1 mb-2" style="height: 67px;width: 100%">
				<div class="mr-2 float-left" style="width: 50px;height: 50px;background: green">
				<img src="/Attachments/images/{{$reserve->product->image}}" width="100%" height="100%">
				</div>
				<div class="float-left">
				<p class="cl mb-1" style="width: 110px;overflow-y: hidden;height: 22px;">{{$reserve->product->name}}</p>
				<div style="display: flex;">


				<form action="{{url('/' . $page='UpQuanlity')}}" method="post">
				{{ csrf_field() }}
				<input type="hidden"name="product_id"value="{{$reserve->product->id}}">
			    <input type="hidden"name="table_id"value="{{$table_id}}">
				<button type="submit"class="bg3 cl text-center" style="width: 25px;height: 23px;font-size: 80%"> + </button>
	            </form>


				<div class="text-center cl" style="width: 20px;height: 20px;font-size: 95%">{{$reserve->quanlity}}</div>

                @if($reserve->quanlity == 1)
				<div class="bg3 cl text-center" style="width: 20px;height: 20px;font-size: 80%">
				-
				</div>
				@else
				<form action="{{url('/' . $page='DowQuanlity')}}" method="post">
				{{ csrf_field() }}
				<input type="hidden"name="product_id"value="{{$reserve->product->id}}">
			    <input type="hidden"name="table_id"value="{{$table_id}}">
				<button type="submit"class="bg3 cl text-center" style="width: 25px;height: 23px;font-size: 80%"> - </button>
	            </form>
                @endif

				</div>
				</div>
				<form action="{{ route('reserve.destroy', 'delete') }}"method="post">
				{{ method_field('delete') }}
                {{ csrf_field() }}
				<div class="float-right" style="height: 50px;width: 120px">
				<div class="float-right bg3 text-center" style="width: 20px;height: 100%">
				<input type="hidden"name="product_id"value="{{$reserve->product->id}}">
			    <input type="hidden"name="table_id"value="{{$table_id}}">
				<button type="submit"class="cl bg-dark" style="line-height: 50px">x</button>
				</div>
	            </form>
				<p class="float-right font-weight-bold cl mr-2" style="font-size: 130%;line-height: 50px">{{ $reserve->quanlity * $reserve->product->price}}$</p>
				<input type="hidden"value="{{ $reserve->quanlity * $reserve->product->price}}" id="quanlity">
				</div>
				<div style="clear: both;"></div>
				</div>
				@endforeach
		        </div>
				<div style="width: 100%;height: 160px">

				<p id="voucher-text" class="cl float-left mb-1">Voucher</p>
				<input id="input-code" type="" name="" class="float-left" style="border:0;outline:none;display: none;">
				<div id="voucher-box" onclick="EnterCode()" class="float-right bg3 text-center cl" style="width: 20px;height: 20px;font-size: 85%">
					<i id="add-button" class="fa fa-plus" aria-hidden="true"></i>
					<i id="submit-button" class="fa fa-check" aria-hidden="true" style="display: none;"></i>
				</div>
				<div id="voucher-ok" class="float-right text-center cl" style="display: none;">



					<p id="text-number" class="mb-0 float-left"></p>
					<p id="icon-money" class="mb-0 float-left">$</p>
				</div>
				<div style="clear: both;"></div>
				@foreach($discount as $dis)
				<p class="cl float-left mb-1">{{$dis->name}}</p>
				<p class="cl float-right mb-1">%</p>
				<p id="discount-text" class="cl float-right mb-1">{{$dis->percent}}</p>
				@endforeach
					<div style="clear: both;"></div>
				@foreach($fee as $fe)
				<p class="cl float-left mb-1">{{$fe->name}}</p>
					<p class="cl float-right mb-1">%</p>
					<p id="Fee-text" class="cl float-right mb-1">{{$fe->percent}}</p>
					<div style="clear: both;"></div>
				@endforeach

				<p class="cl float-left mb-1" style="font-size: 130%">Total</p>

               <p id="total-text" class="cl float-right mb-1" style="font-size: 130%"></p>

				<div style="clear: both;"></div>
	<form action="{{url('/' . $page='invoice')}}"method="post">
	    {{ csrf_field() }}
			<input type="hidden" name="tabl_id" value="{{$table_id}}">
			<input type="hidden" name="total" value="" id="total_input">
            <input type="hidden" name="voucher" value="" id="voucher_input">
            <input type="hidden" name="discount" value="" id="discount_input">
            <input type="hidden" name="fee" value="" id="fee_input">

		<button type="submit" class="btn text-dark" style="margin:15px 15px 15px 30px;width: 220px;border-radius: 3;background-color: coral;">Checkout</button>

	 </form>
			</div>
			</div>
		    </div>


		<div class="p-0 bg1" style="height: 100vh;width: calc(100% - 320px)">
			<div class="p-3">


			    <a href="{{Route('home')}}" style="text-decoration: none;color:black;">
					<div id="back-button" class="btn bg-white float-right">Home</div>
				</a>


				<div id="food-filter" class="bg2 ml-5 float-left text-center" style="margin-right:10px;width: 100px; height: 50px;">
                <a href="{{ URL('reservation/food/'.$table_id)}}"style="text-decoration:none;">
					<p class="cl" style="line-height: 49px">Food</p>
                </a>
				</div>
				<div id="drink-filter" class="bg2 ml-2 float-left text-center" style="width: 100px; height: 50px;">
                <a href="{{ URL('reservation/drink/'.$table_id)}}"style="text-decoration:none;">
					<p class="cl" style="line-height: 49px">Drink</p>
                </a>
				</div>
				<div style="clear: both;"></div>
			</div>


		     @foreach($products as $product)

			 <form action="{{url('/' . $page='creatreservation')}}" method="post">
			    {{ csrf_field() }}
				<div class="p-1 float-left">

					<input type="hidden"name="product_id"value="{{$product -> id}}">
					<input type="hidden"name="table_id"value="{{$table_id}}">
				<button class="bg-dark"style="padding: 0;outline-style: none;" type="submit">

				<div class="bg2 text-center p-2" style="width: 240px;height: 100px;">
				<div class="float-left" style="width: 90px;height: 100%;background: green">
				<img src="/Attachments/images/{{$product->image}}" width="100%" height="100%">
				</div>
				<p class="cl mb-0 mt-2"id="product_name" style="height: 45px;overflow-y: hidden;">{{$product -> name}}</p>
				<p class="cl" id="product_price" >{{$product -> price}}$</p>
				</div>
				</button>
				</div>
				</form>
			@endforeach

			</div>
		</div>
	</div>
</div>
<?php

?>
<script>

	var element =document.querySelectorAll("#quanlity");
	var total = 0;
	for(var i=0; i<element.length;i++){
		total = total + parseInt(element[i].value);
	}


       var discount = document.getElementById("discount-text").textContent;
       document.getElementById("discount_input").value = parseInt(discount);
       var after_discount = total*(100 - parseInt(discount))/100;

       var fee = document.getElementById("Fee-text").textContent;
       document.getElementById("fee_input").value = parseInt(fee);
       var afrter_fee = total*parseInt(fee)/100;

       total = after_discount + afrter_fee;

		document.getElementById("total-text").innerHTML =total;
		document.getElementById("total_input").value =total;


	function EnterCode(){
	$("#voucher-text").hide();
	$("#input-code").show();
	$("#add-button").hide();
	$("#submit-button").show();
}
$(document).ready(function(){

	$("#submit-button").on('click',function(){
		var inputCode = $("#input-code").val();
		$.ajax({
			url: "{{url('/' . $page='voucher')}}",
			type: 'get',
			data:{
			       'code' : inputCode,
	        	},
				dataType : 'json',
		    success: function(data){

			// console.log(data.data[0])
		        $("#voucher-text").show();
				$("#voucher-text").text(inputCode);
				$("#submit-button").hide();
				$("#add-button").show();
				$("#input-code").hide();
				$("#text-number").show();
				$("#add-button").hide();
				$("#voucher-box").hide();
				$("#voucher-ok").show();
				$("#text-number").text(data.data[0]['price']);

          document.getElementById("total-text").innerHTML -= data.data[0]['price'] ;
		  document.getElementById("total_input").value -= data.data[0]['price'];
          document.getElementById("voucher_input").value = data.data[0]['price'];
           console.log(document.getElementById("voucher_input").value)
			}
		});
	})
});






</script>

</html>
