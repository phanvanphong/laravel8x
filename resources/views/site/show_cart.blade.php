@extends('master_layout1')
@section('content')

<div class="container">
<div class="col-sm-12" style="padding:0px;">
<section id="cart_items" >
            <div class="heading">
				<h3>GIỎ HÀNG CỦA BẠN: </h3>
				<p>Dưới đây là những sản phẩm bạn đã thêm vào giỏ hàng: </p>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lương</td>
							<td class="total">Tổng tiền</td>
							<td></td>
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
									<input class="cart_quantity_input form-control" width="20%" type="number" name="product_quantity" value="{{$v_content['product_quantity']}}">
									
									<button type="submit" class="btn btn-default"> <i class="fa fa-retweet" aria-hidden="true"></i></button>
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($v_content['product_price'] * $v_content['product_quantity'])}} <sup><small>VNĐ</small></sup></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{route('cart.remove',$v_content['id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

					@endforeach
					@endif
					</tbody>
					</form>
				</table>
			</div>
	</section> <!--/#cart_items-->

	<section id="do_action" style="padding-right:15px;">
			<div class="heading">
				<h3>CỘNG GIỎ HÀNG</h3>
				<p>Dưới đây là chi tiết cộng giỏ hàng của bạn: </p>
			</div>
			<div class="row">
				
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>TẠM TÍNH <span>{{ number_format($total)}} <sup><small>VNĐ</small></sup></span></li>
							<li>GIAO HÀNG <span>Miễn phí giao hàng trên toàn quốc</span></li>
							<li>TỔNG CỘNG <span>{{ number_format($total)}} <sup><small>VNĐ</small></sup></span></li>
						</ul>
							@if($total == 0)
							<a class="btn btn-default check_out" href="{{route('home.index')}}">TIẾP TỤC MUA HÀNG</a>
							@else
							<a class="btn btn-default check_out" href="{{route('home.index')}}">TIẾP TỤC MUA HÀNG</a>
							<a class="btn btn-default check_out" href="{{route('checkout')}}">TIẾN HÀNH THANH TOÁN</a>
							@endif
					</div>
				</div>
			</div>
	</section><!--/#do_action-->

	
	</div>
	</div>
@endsection

	