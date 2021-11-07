@extends('master_layout')
@section('content')

					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">SẢN PHẨM NỔI BẬT</h2>
						@foreach($product_new as $pro)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<img src="public/uploads/product/{{$pro->product_image}}" alt="" />
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
										<li><a href=""><i class="fa fa-plus-square"></i> Thêm yêu thích</a></li>
										@if($pro->product_number == 0)
										<li><a href="#" disabled><i class="fa fa-plus-square"></i>Đã hết hàng</a></li>
										@else
										<li><a href="{{route('cart.add',[$pro->id])}}"><i class="fa fa-plus-square"></i>Thêm giỏ hàng</a></li>
										@endif
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
					</div><!--features_items-->
					

					<div class="features_items">
					<img src="{{url('public')}}/frontend/images/quangcao5.jpg" width="100%" alt="" />
					</div><br><br>
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">SẢN PHẨM TRENDING</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($product_trend_price as $prodesc)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="public/uploads/product/{{$prodesc->product_image}}" alt="" />
													<h2>{{number_format($prodesc->product_price)}} <sup><small style="color:#696763">VNĐ</small></sup>
													<del style="font-size:17px;padding-left:35px;color:#8C8C88"> {{number_format($prodesc->product_price_original)}}
													<sup><small style="color:#696763">VNĐ</small></sup>
													</del>	
													</h2>
													<p>{{$prodesc->product_name}}</p>
													<a href="{{route('details_product',[$prodesc->id,$prodesc->product_cate])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>XEM CHI TIẾT</a>
												</div>
												
											</div>
										</div>
									</div>
									@endforeach
								
								</div>
								<div class="item">
								@foreach($product_trend_price_original as $proasc)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="public/uploads/product/{{$proasc->product_image}}" alt="" />
													<h2>{{number_format($proasc->product_price)}} <sup><small style="color:#696763">VNĐ</small></sup>
													<del style="font-size:17px;padding-left:35px;color:#8C8C88"> {{number_format($proasc->product_price_original)}}
													<sup><small style="color:#696763">VNĐ</small></sup>
													</del>	
													</h2>
													<p>{{$proasc->product_name}}</p>
													<a href="{{route('details_product',[$proasc->id,$proasc->product_cate])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>XEM CHI TIẾT</a>
												</div>
												
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection
	