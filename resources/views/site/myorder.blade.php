@extends('master_layout1')
@section('content')

<div class="container">
<div class="col-sm-12" style="padding:0px;">
<section id="cart_items" >
            <div class="heading">
				<h3>ĐƠN HÀNG CỦA BẠN: </h3>
				<p>Dưới đây là những đơn hàng mà bạn đã đặt mua: </p>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">STT</td>
							<td class="description">Tên khách hàng</td>
							<td class="price">Ngày mua</td>
							<td class="quantity">Tình trạng</td>
							<td class="total">Chi tiết</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
					<?php
							$stt = 0;
					?>
					@if($order == null)
					<tr>
						<td colspan="6"><h4>HIỆN TẠI CHƯA CÓ ĐƠN HÀNG NÀO</h4></td>
					</tr>
					@else
					@foreach($order as $v_order)
						<tr>
							<td class="cart_product">
                                {{$stt+=1}}
							</td>
							<td class="cart_description">
                                {{$v_order->cus->name}}
							</td>
							<td class="cart_price">
                                {{$v_order->order_date}}
							</td>
							<td class="cart_quantity">
								<?php
                                if($v_order->order_status == 0){
                                    echo 'Đang xử lý';
                                }elseif($v_order->order_status == 1){
                                    echo 'Đang giao hàng';
                                }else{
                                    echo 'Đã thanh toán';
                                }            
                                ?>
							</td>
							<td class="cart_total">
                                <a href="{{route('myorder_details',$v_order->id)}}">Xem chi tiết</a>
							</td>
						</tr>
					@endforeach
					@endif
					</tbody>
					</form>
				</table>
                <div>
                {{$order->appends(request()->all())->links()}}
              </div>
			</div>
	</section> <!--/#cart_items-->


	
	</div>
	</div>
@endsection

	