@extends('master_layout')
@section('content')

					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">SẢN PHẨM CÙNG LOẠI</h2>
						@foreach($product_new as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
											<h2> {{number_format($pro->product_price)}} <sup><small style="color:#696763">VNĐ</small></sup> 
											<del style="font-size:17px;padding-left:35px;color:#8C8C88"> {{number_format($pro->product_price_original)}}
											<sup><small style="color:#696763">VNĐ</small></sup>
											</del>	 
											</h2>
											<p>{{$pro->product_name}}</p>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{number_format($pro->product_price)}} <sup><small style="color:white">VNĐ</small></sup></h2>
												<p>{{$pro->product_name}}</p>
												<a href="{{route('details_product',[$pro->id,$pro->product_cate])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>XEM CHI TIẾT</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i> Thêm yêu thích</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Thêm giỏ hàng</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
					</div><!--features_items-->
				
@endsection
	