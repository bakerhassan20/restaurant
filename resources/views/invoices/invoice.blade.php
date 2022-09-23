
@extends('layouts.master')

@section('content')





		<div class="p-0 bg1" style="height: 100vh;width: calc(100% - 320px)">
	   	<div class="p-3">
				<p class="float-left cl font-weight-bold mb-0" style="font-size: 130%">Checkout</p>
				<a href="{{Route('home')}}" style="text-decoration: none;color:black;">
					<div id="back-button" class="btn bg-white float-right">Home</div>
				</a>
				<div style="clear: both;"></div>
			</div>
			<div class="px-2" style="width: 800px;height: 300px;margin: auto">
				<table id="get-html-table" class="table bg2 cl">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Qty</th>
							<th scope="col">Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
                          $count = 1;
						?>
						@foreach($table_products as $table_product)

					<tr>
							<td scope="col"><?php echo $count++ ?></td>
							<td scope="col">{{$table_product ->product->name}}</td>
							<td scope="col">{{$table_product ->quanlity}}</td>
							<td scope="col">{{$table_product ->product->price}}$</td>
					</tr>
						@endforeach
					</tbody>
					<thead>
					<tr>
							<th scope="col">Fee</th>
							<th scope="col">Discount</th>
							<th scope="col">Voucher</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
					<tr>
							<td id="fee">{{$fee}}%</td>
							<td id="sale">{{$discount}}%</td>
							<td id="voucher">{{$voucher}}$</td>
							<td id="total">{{$total}}$</td>
						</tr>
					</tbody>
				</table>

				<div style="width: 100%;height: 200px;">
					<div class="float-left bg2" style="width: 47%;height: 50px;display: flex;">
						<input onkeyup="received()"  id="received" class="pl-3" type="number" name="" style="width: 100%;height: 100%;background: none;border: 0;outline: none;color: white" placeholder="Received">
						<div class="text-center" style="width: 50px;height: 50px;">
							<i class="fa fa-money cl" aria-hidden="true" style="line-height: 50px;font-size: 130%"></i>
						</div>
					</div>

					<div class="float-right bg2" style="width: 47%;height: 50px;display: flex;">
					    <input type="hidden"name="" value="{{$total}}" id="total_price">
						<input id="return" class="pl-3" type="" name="" value="{{$total}}$"style="width: 100%;height: 100%;background: none;border: 0;outline: none;color: white" placeholder="Return" disabled>
						<div style="width: 50px;height: 50px;">

						</div>
					</div>


					<div style="clear: both;"></div>
					<div id="finish-button" style="display:none ;">

                       	<form action="{{route('invoices.destroy','test') }}"method="post">
                         {{ csrf_field() }}
                         @method('delete')
                        <input type="hidden" name="tabl_id" value="{{$tabl_id}}">
                        <input type="hidden" name="total" value="{{$total}}">
                        <input type="hidden" name="fee" value="{{$fee}}">
                        <input type="hidden" name="discount" value="{{$discount}}">
                        <input type="hidden" name="voucher" value="{{$voucher}}">
                        <button type="submit" class="btn bg2 cl mt-4 float-left" style="width:22%;">Finish</button>
                      </form>

						<div onclick="print_invoice()" class="js-print-link btn bg2 cl mt-4 float-right" style="width: 20%;"><i class="fa fa-print cl" aria-hidden="true" style="font-size: 130%"></i>
						</div>
					</div>


				</div>
			</div>
		</div>

</div>
</div>
</div>
@endsection




<div id="print" class="mt-2 p-4 shadow-ok" style="width: 350px; height: 500px; display: none;">
	<p class="text-center">16-08-2022 Code Order #3</p>
	<p class="mb-0">PosSystem</p>
	<p class="mb-0">Phone: 01122002942</p>
	<p>Manage : abo baker hassan</p>
	<p class="float-left mb-0 font-weight-bold mb-0" style="width: 50%">Name</p>
	<p class="float-left mb-0 font-weight-bold mb-0" style="width: 25%">Qty</p>
	<p class="float-left mb-0 font-weight-bold mb-0" style="width: 25%">
		</p><p class="float-right mb-0 font-weight-bold mb-0">Price</p>
	<p></p>
	<div style="clear: both;"></div>
	<div>
   @foreach($table_products as $table_product)
		<p class="float-left mb-0" style="width: 50%">{{$table_product ->product->name}}</p>
        <p class="float-left mb-0" style="width: 25%">{{$table_product ->quanlity}}</p>
        <p class="float-left mb-0 bg-danger" style="width: 25%">
		</p>
        <p class="float-right mb-0">{{$table_product ->product->price}}$</p>
		<p></p>
   @endforeach
	</div>
	<p class="float-left mb-0 mt-3">Discount</p>

        <p id="discount-bill" class="float-right mb-0 mt-3">{{$discount}}%</p>


	<div style="clear: both;"></div>
	<p class="float-left mb-0">Fee</p>
	<p id="fee-bill" class="float-right mb-0">{{$fee}}%</p>
	<div style="clear: both;"></div>
	<p class="float-left mb-0">Voucher</p>
	<p id="voucher-bill" class="float-right mb-0">{{$voucher}}$</p>
	<div style="clear: both;"></div>
	<p class="float-left mb-0 font-weight-bold" style="font-size: 130%">Total</p>
	<p id="total-bill" class="float-right mb-0 font-weight-bold" style="font-size: 130%">{{$total}}</p>
	<div style="clear: both;"></div>

	<p class="float-left mb-0 mt-3">Received</p>
	<p id="received-bill" class="float-right mb-0 mt-3">{{$total}}</p>
	<div style="clear: both;"></div>
	<p class="float-left mb-0">Return</p>
	<p id="return-bill" class="float-right mb-0">0$</p>
	<div style="clear: both;"></div>
</div>

<script type="text/javascript">


function received(){
	var received = $("#received").val();
	var total =$("#total_price").val();
	console.log(total);
	$("#received-bill").text(received+'$');
    $("#return").val(total-received*1+'$');
    $("#return-bill").text(-1*(total-received*1)+'$');

	if(total-received*1 <= 0){
        $("#finish-button").show();

    }else{
        $("#finish-button").hide();
    }
}




function print_invoice() {
	$("#checkout-box").hide();
    $("#print").show();
	window.print();
    $("#checkout-box").show();
    $(".hidePrinf").show();
    $("#print").hide();
};

</script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


</div>
</body>
</html>
