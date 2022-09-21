

@extends('layouts.master')

@section('content')


<br><br><br>

<!-- header -->
<div class="p-0 bg1" style="height: 100vh;width: calc(100% - 320px)">
			<div class="p-3">
				<p class="float-left cl font-weight-bold mb-0" style="font-size: 130%">System</p>
				@if (session()->has('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert"style="width:319px; position: absolute; z-index: 999;margin-left:398px">
						<strong>{{ session()->get('success') }}</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif	
				@if ($errors->any())
				<div class="alert alert-danger"style="  width: 314px;
														position: absolute;
														z-index: 999;
														margin-left: 389px;
														max-height: 100%;">
						<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
						</ul>
					  </div>
				@endif


				<a href="{{Route('home')}}" style="text-decoration: none;color:black;">
					<div id="back-button" class="btn bg-white float-right">Home</div>
				</a>
				<div style="clear: both;"></div>
			</div>

			<div style="height: calc(100vh - 120px);overflow-y: auto;">
				<div class="row m-0" >

					<div class="col-6 p-0">
						<div class="row m-0 p-2">
							<div class="col-12 p-2">
								<div class="p-2 cl bg2">
									<form action="{{url('/' . $page='updatetheme')}}" method="post" enctype='multipart/form-data'>
									{{ csrf_field() }}
									<p class="text-center" style="font-size: 130%">Theme</p>
										<div class="row m-0">
											<div class="col-6 p-0 mt-2">
												<label>Background 1</label><br>
												<input id="color1" type="color" value="{{$theme->color1}}"name="color1">	<br>
												</div><div class="col-6 p-0 mt-2">
												<label>Background 2</label><br>
												<input id="color2" type="color" value="{{$theme->color2}}"name="color2">	<br>
												</div><div class="col-6 p-0 mt-2">
												<label>Background 3</label><br>
												<input id="color3" type="color" value="{{$theme->color3}}" name="color3">	<br>
												</div><div class="col-6 p-0 mt-2">
												<label>Text</label><br>
												<input id="color4" type="color" value="{{$theme->color4}}" name="color4">	<br>
												</div>		
										</div>
										<div>
<button type="submit" class="form-control mt-3 float-left" style="width: 70%"
onclick="ChangColor(`#ffffff`,`{{$theme->color2}}`,`{{$theme->color3}}`,`{{$theme->color4}}`)">Change color</button>

											<div class="btn float-right bg-white mt-3 text-dark" onclick="SetDefaultColor()">Set Default</div>
											<div style="clear: both;"></div>
										</div>									
									</form>
								</div>
							</div>

							<div class="col-12 p-2">
								<div class="p-2 cl bg2">
									<p class="text-center" style="font-size: 130%">Fee</p>
									<div style="clear: both;"></div>
									<div class="row m-0">
										<table class="table bg2 cl">
											<thead>
												<tr>
													<th scope="col">Name</th>
													<th scope="col">Percent</th>
													<th scope="col">Method</th>
												</tr>
											</thead>
											<tbody>
												@foreach($fee as $fe)
												<tr>
													<td>{{$fe->name }}</td>
													<td>{{$fe->percent}}%</td>
													<td>
		<div class="btn bg-white text-dark" onclick="ChangeFee({{$fe->id }},`{{$fe->name }}`,{{$fe->percent }})">Edit</div>
													</td>
                                                </tr>
													@endforeach	
										      </tbody>
										</table>
									</div>
									<form id="form-fee" action="{{url('/' . $page='fee')}}" method="post" style="display: none;">
									{{ csrf_field() }}
										<div style="display: flex;">
											<input id="idFee"  type="" name="id" style="display: none;">
											<div class="px-2" style="width: 30%">
												<label>Name</label><br>
												<input id="nameFee" type="" class="form-control" name="name" >
											</div>
											<div  class="px-2" style="width: 30%">
												<label>percent</label><br>
												<input id="priceFee" type="" class="form-control" name="percent">
											</div>
											<div  class="px-2" style="width: 30%">
												<button type="submit" class="btn" style="margin-top: 32px">Edit fee</button>
											</div>
										</div>									
									</form>
								</div>
							</div>

							<div class="col-12 p-2">
								<div class="p-2 cl bg2">
									<p class="text-center" style="font-size: 130%">Table</p>
									<div style="clear: both;"></div>
									<div class="row m-0">
										<table class="table bg2 cl">
											<thead>
												<tr>
													<th scope="col">Code</th>
													<th scope="col">Type</th>
													<th scope="col">Method</th>
												</tr>
											</thead>
											<tbody>
												@foreach($tables as $table)
												<tr>
													<td>{{$table->table_number}}</td>
													@if($table->type == 1)
													<td>Normal</td>
													@else
													<td>Vip</td>
													@endif
													<td>
													<div class="btn bg-white text-dark float-left mr-2" onclick="EditTable({{$table->id}},{{$table->table_number}},{{$table->type}})">Edit</div>
													<form action="{{ route('table.destroy', 'delete') }}" method="post"
													style="text-decoration: none;color:black;">
													{{ method_field('delete') }}
													{{ csrf_field() }}
													<input type="hidden" name="id" value="{{$table->id}}">
													<button type='submit'class="btn bg-white text-dark">Delete</button>

											</form>
											</td>
                                                    </tr>
													@endforeach
													</tbody>
										</table>
									</div>
									<form id="form-edit-table" action="{{url('/' . $page='EditTable')}}" method="post" style="display: none;">
									{{ csrf_field() }}
										<div style="display: flex;">
											<input id="idTable"  type="" name="idTable" style="display: none;">
											<div class="px-2" style="width: 30%">
												<label>Number</label><br>
												<input id="numberTable" type="" class="form-control" name="numberTable">
											</div>
											<div  class="px-2" style="width: 30%">
												<label>Type</label><br>
												<select id="typeTable" class="form-control" name="typeTable">
													<option value="1">Normal</option>
												
													<option value="2">Vip</option>
												</select>
											</div>
											<div  class="px-2" style="width: 30%">
												<button type="submit" class="btn" style="margin-top: 32px">Edit Table</button>
											</div>
										</div>									
									</form>
									<form id="form-add-table" action="{{url('/' . $page='createTable')}}" method="post">
									{{ csrf_field() }}
										<div style="display: flex;">
											
											<div class="px-2" style="width: 30%">
												<label>Number</label><br>
												<input type="" class="form-control" name="numberTable">
											</div>
											<div  class="px-2" style="width: 30%">
												<label>Type</label><br>
												<select class="form-control" name="typeTable">
													<option value="1">Normal</option>
													<option value="2">Vip</option>
												</select>
											</div>
											<div  class="px-2" style="width: 30%">
												<button type="submit" class="btn" style="margin-top: 32px">Add Table</button>
											</div>
										</div>									
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 p-2">
						<div class="col-12 p-2">
							<div class="p-2 cl bg2">
								<p class="text-center" style="font-size: 130%">Voucher</p>
								<div style="clear: both;"></div>
								<div class="row m-0">
									<table class="table bg2 cl">
										<thead>
											<tr>
												<th scope="col">Code</th>
												<th scope="col">Price</th>
												<th scope="col">Method</th>
											</tr>
										</thead>
										<tbody>
											@foreach($vouchers as $voucher)
											<tr>
												<td>{{$voucher->code}}</td>
												<td>{{$voucher->price}}</td>
												<td>
											
                     
												<form action="{{ route('Voucher.destroy', 'test') }}" method="post"
												style="text-decoration: none;color:black;">
												{{ method_field('delete') }}
                                                {{ csrf_field() }}
												<input type="hidden" name="id" value="{{$voucher->id}}">
												<button type='submit'class="btn bg-white text-dark">Delete</button>

							                    </form>
												</td>
											</tr>
												@endforeach
											</tbody>
									</table>
								</div>
								<form action="{{url('/' . $page='createVoucher')}}" method="POST">
								{{ csrf_field() }}
								
									<div style="display: flex;">
										<div class="px-2" style="width: 30%">
											<label>Code</label><br>
											<input type="text" class="form-control" name="code">
										</div>
										<div  class="px-2" style="width: 30%">
											<label>Price</label><br>
											<input type="number" class="form-control" name="price">
										</div>
										<div  class="px-2" style="width: 30%">
											<button type="submit" class="btn" style="margin-top: 32px">Add Voucher</button>
										</div>
									</div>									
								</form>
							</div>
						</div>

						<div class="col-12 p-2">
							<div class="p-2 cl bg2">
								<p class="text-center" style="font-size: 130%">Discount</p>
								<div style="clear: both;"></div>
								<div class="row m-0">
									<table class="table bg2 cl">
										<thead>
											<tr>
												<th scope="col">Name</th>
												<th scope="col">Percent</th>
												<th scope="col">Method</th>
											</tr>
										</thead>
										<tbody>
											@foreach($discount as $dis)
											<tr>
												<td>{{$dis->name}}</td>
												<td>{{$dis->percent}}%</td>
												<td>
												<div class="btn bg-white text-dark" onclick="ChangeDiscount({{$dis->id}},`{{$dis->name}}`,{{$dis->percent}})">Edit</div>

												</td>	
												@endforeach	
												</tbody>
									</table>
								</div>
								<form id="form-discount" action="{{url('/' . $page='discount')}}" method="post" style="display: none;">
								{{ csrf_field() }}
									<div style="display: flex;">
										<input id="idDiscount"  type="" name="id" style="display: none;">
										<div class="px-2" style="width: 30%">
											<label>Name</label><br>
											<input id="nameDiscount" type="" class="form-control" name="name">
										</div>
										<div  class="px-2" style="width: 30%">
											<label>Percent</label><br>
											<input id="priceDiscount" type="" class="form-control" name="percent">
										</div>
										<div  class="px-2" style="width: 30%">
											<button type="submit" class="btn" style="margin-top: 32px">Edit Discount</button>
										</div>
									</div>									
								</form>
							</div>
						</div>
					</div>
				


				</div>
			</div>

		</div>

</div>
</div>
</div>
</div>


@endsection

<script type="text/javascript">
	
	function SetDefaultColor(){
		$("#color1").val('#121421');
		$("#color2").val('#1e202c');
		$("#color3").val('#292b37');
		$("#color4").val('#ffffff');
	}

	function ChangeFee(id,name,percent){
		$("#form-fee").show();
		$("#idFee").val(id);
		$("#nameFee").val(name);
		$("#priceFee").val(percent);
	}

	function ChangeDiscount(id,name,price){
		$("#form-discount").show();
		$("#idDiscount").val(id);
		$("#nameDiscount").val(name);
		$("#priceDiscount").val(price);
	}

	
		function EditTable(id,number,type){
		
		$("#form-edit-table").show();
	    $("#numberTable").val(number);
	    $("#typeTable").val(type);
	    $("#idTable").val(id);		
			}

</script>

<script src="{{URL::asset('assets/js/Home.js')}}"></script>

<script
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous">
</script>

</html>

