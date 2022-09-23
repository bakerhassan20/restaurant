

@extends('layouts.master')

@section('content')


<div class="p-0 bg1" style="height: 100vh;width: calc(100% - 320px)">
			<div class="p-3">
				<p class="float-left cl font-weight-bold mb-0" style="font-size: 130%">Analytics</p>
				<a href="{{Route('home')}}" style="text-decoration: none;color:black;">
					<div id="back-button" class="btn bg-white float-right">Home</div>
				</a>
				<div style="clear: both;"></div>
			</div>
			<div class="dropdown text-center">

				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Choose Time
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="{{ route('day') }}">One day ago</a>
					<a class="dropdown-item" href="{{ route('mounth') }}">Month</a>
					<a class="dropdown-item" href="{{url('/' . $page='analytics')}}">All</a>
				</div>
			</div>
			<div style="height: calc(100vh - 120px);overflow-y: auto;">

                    @foreach($orders as $order)
			    	<div class="px-2" style="width: 800px;margin: auto"><div class="btn bg2 cl">
					{{ $order->created_at}}
					</div>
					<table class="table bg2 cl">

					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Qty</th>
							<th scope="col">Price</th>
						</tr>
					</thead>
					<tbody>
                @foreach($order->product as $pro)
						<tr>
							<th scope="row">1</th>
							<td>{{$pro->name}}</td>
							<td>{{$pro->pivot->quantity}}</td>
							<td>{{$pro->price}}$</td>
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
							<td id="fee">{{ $order->fee}}%</td>
							<td id="sale">{{ $order->discount}}%</td>
							<td id="voucher">{{ $order->voucher}}$</td>
							<td id="total">{{ $order->total}}$</td>
						</tr>
					</tbody>

					</table></div>
            @endforeach

			</div>
		</div>



@endsection
</div>
</body>
</html>
