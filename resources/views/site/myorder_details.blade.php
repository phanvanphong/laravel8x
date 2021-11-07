@extends('master_layout1')
@section('content')

<div class="container">
<div class="col-sm-12" style="padding:0px;">
<section id="cart_items" >
            <div class="heading">
            <?php $total = 0; ?>
			
				<h3>CHI TIẾT ĐƠN HÀNG SỐ: {{$myorder_id}} </h3>
				<p>Dưới đây là những sản phẩm bạn mua: </p>
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
					@foreach($myorder_details as $key => $v_content)
					<?php $total += $v_content->order_price * $v_content->order_number; ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->product_image)}}" width="100px;" alt=""></a>
							</td>
							<td class="cart_description">
								<p style="font-size:17px;font-weight:bold;">{{$v_content->product_name}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->order_price)}} <sup><small style="color:#696763">VNĐ</small></sup></p>
							</td>
							<td class="cart_quantity">
                                <p style="font-size:15px;">{{$v_content->order_number}}</p>
							</td>
							<td class="cart_total">
								<p style="font-size:18px;" class="cart_total_price">{{number_format($v_content->order_price * $v_content->order_number)}} <sup><small>VNĐ</small></sup></p>
							</td>
							
						</tr>

					@endforeach
                    <tr>
                        <td colspan="4" class="text text-center"> <h4>TỔNG CỘNG</h4> </td>
                        <td colspan="4"> <h4>{{number_format($total)}} <sup><small style="color:#696763">VNĐ</small></sup></h4></td>
                    </tr>
					</tbody>
					</form>
				</table>
			</div>
	</section> <!--/#cart_items-->


	
	</div>
	</div>
@endsection

	