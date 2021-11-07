<h2>Xin chào {{$customer_name}}</h2>
<p>
    <b>Bạn đã đặt hàng thành công tại cửa hàng của chúng tôi</b>
</p>
<h4>Thông tin đơn hàng của bạn là:</h4>
<h4>Mã đơn hàng: {{$order->id}}</h4>
<h4>Chi tiết đơn hàng</h4>

<div class="table-responsive cart_info">
			<table border="1" cellspacing="0" cellpadding="10" width="400">
					<thead>
						<tr class="cart_menu">
							<td class="description">Sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lương</td>
							<td class="total">Tổng tiền</td>
						</tr>
					</thead>
					<tbody>
                    <?php
							$total = 0;
					?>
					@foreach($items as $key => $item)
					<?php $total += $item['product_price'] * $item['product_quantity']; ?>
						<tr>
							<td class="cart_description" style="width:100px;">
								<p>{{$item['product_name']}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($item['product_price'])}} <sup><small style="color:#696763">VNĐ</small></sup></p>
							</td>
							<td class="cart_quantity">
								<form action="{{route('cart.update',$item['id'])}}" method="GET">
								<div class="cart_quantity_button">
									<!-- <a class="cart_quantity_up" href=""> + </a> -->
									<p>{{$item['product_quantity']}}</p>
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($item['product_price'] * $item['product_quantity'])}} <sup><small>VNĐ</small></sup></p>
							</td>
		
						</tr>

					@endforeach
					</tbody>
					</form>
				
						<tr>
							<td colspan="3">&nbsp;</td>
							<td colspan="1">
								<table class="table table-condensed total-result">
									
									<tr>
										<td colspan="3"></td>
										<td colspan="1"><b>{{number_format($total)}} <sup><small>VNĐ</small></sup></b></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>