@extends('master_layout1')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#"> THANH TOÁN </a></li>
				</ol>
			</div><!--/breadcrums-->

			
			<div class="checkout-options">
				<h3>THÔNG TIN THANH TOÁN</h3><br>
				<p>Vui lòng điền đầy đủ thông tin để tiến hành thanh toán :</p>
			</div><!--/checkout-options-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12">
						<div class="shopper-info">


							<p>Thông tin khách hàng</p>
							<form action="" method="POST">
								@csrf
								<label for="">Tên khách hàng: </label>
								<input type="text" placeholder="Display Name" name="customer_name" value="{{Auth::guard('cus')->user()->name}}" disabled>
								<label for="">Số điện thoại: </label>
								<input type="text" placeholder="User Name" name="customer_phone" value="{{Auth::guard('cus')->user()->phone}}" disabled>
								<label for="">Địa chỉ giao hàng: </label>
								<input type="text" name="order_delivery_address" placeholder="Nhập địa chỉ giao hàng" required>
								<label for="">Ghi chú đơn hàng: </label>
								<textarea name="order_notes" placeholder="Nhập ghi chú đơn hàng" rows="6" required></textarea>

								@if(session('cart') == null)
								<a href="{{route('home.index')}}">
								<button type="button" style="float:right; padding:5px 25px;font-size:15px;" class="btn btn-default check_out">TIẾP TỤC MUA HÀNG</button>
								</a>
								@else
								<button type="submit" style="float:right; padding:5px 25px;font-size:15px;" class="btn btn-default check_out">ĐẶT HÀNG</button>
								@endif
							</form>
							
						</div>
					</div>			
				</div>
			</div><br>
			<div class="checkout-options">
				<h3>XEM LẠI GIỎ HÀNG</h3><br>
				<p>Vui lòng xem lại giỏ hàng trước khi thanh toán :</p>
			</div><!--/checkout-options-->

			<div class="table-responsive cart_info">
			<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lương</td>
							<td class="total">Tổng tiền</td>
						</tr>
					</thead>
					<tbody>
					
							<?php
									$content = session('cart');
									$total = 0;
							?>
							@if($content == null)
							<tr>
								<td colspan="6"><h4>GIỎ HÀNG CỦA BẠN ĐANG TRỐNG</h4></td>
							</tr>
							@else
							@foreach($content as $v_content)
							<?php $total += $v_content['product_price'] * $v_content['product_quantity']; ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content['product_image'])}}" width="100px;" alt=""></a>
							</td>
							<td class="cart_description">
								<p style="font-size:17px;font-weight:bold;">{{$v_content['product_name']}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content['product_price'])}} <sup><small style="color:#696763">VNĐ</small></sup></p>
							</td>
							<td class="cart_quantity">
								<form action="{{route('cart.update',$v_content['id'])}}" method="GET">
								<div class="cart_quantity_button">
									<!-- <a class="cart_quantity_up" href=""> + </a> -->
									<input class="cart_quantity_input form-control" width="20%" type="number" name="product_quantity" value="{{$v_content['product_quantity']}}" disabled>
									
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($v_content['product_price'] * $v_content['product_quantity'])}} <sup><small>VNĐ</small></sup></p>
							</td>
		
						</tr>

					@endforeach
					@endif
					</tbody>
					</form>
				
						<tr>
							<td colspan="3">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Tạm tính</td>
										<td> {{number_format($total)}} <sup><small>VNĐ</small></sup></td>
									</tr>
									<tr>
										<td>Thuế VAT</td>
										<td>Không có</td>
									</tr>
									<tr class="shipping-cost">
										<td>Phí ship</td>
										<td>Miễn phí</td>										
									</tr>
									<tr>
										<td>Tổng cộng</td>
										<td><span>{{number_format($total)}} <sup><small>VNĐ</small></sup></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

@endsection