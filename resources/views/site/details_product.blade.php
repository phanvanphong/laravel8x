@extends('master_layout')
@section('content')

<div class="product-details"><!--product-details-->
    @foreach($details_product as $details_pro)
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('public/uploads/product/'.$details_pro->product_image)}}" alt="" />
								<!-- <h3>ZOOM</h3> -->
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
									<?php 
                                        $string = $details_pro->product_image_list;
                                        // Chuyển string thành json để lấy phần tử
                                        $image_list = json_decode($string);
                                    ?>

								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										@foreach($image_list as $img_list)
										  <a href=""><img src="{{URL::to('public/uploads/product/'.$img_list)}}" width="27%" alt="" /></a>
										  @endforeach
										</div>
										<div class="item">
										@foreach($image_list as $img_list)
										  <a href=""><img src="{{URL::to('public/uploads/product/'.$img_list)}}" width="27%" alt="" /></a>
										  @endforeach
										</div>				
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
                            <img src="public/uploads/product/{{$details_pro->product_image}}" alt="" />
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<!-- <img src="{{url('public')}}/frontend/images/new.jpg" class="newarrival" alt="" /> -->
								<p style="font-size:30px; font-weight:bolder;color:black;">{{$details_pro->product_name}}</p>
								<p>Mã sản phẩm: <b>{{$details_pro->brand->brand_name}}-{{$details_pro->id}}</b> </p>
								
								<h1>
                                <del style="font-size:20px;padding-right:10px;color:#8C8C88"> {{number_format($details_pro->product_price_original)}}
									<sup><small style="color:#696763">VNĐ</small></sup>
									</del>	    
                                {{number_format($details_pro->product_price)}} <sup><small style="color:#696763">VNĐ</small></sup> 
								</h1>
                                <p>Các sản phẩm của BIGSHOES thích hợp sử dụng trong mọi thời tiết và địa hình, đặc biệt là trong những ngày mưa. Phần đế được ép nhiệt nên cực bền sau thời gian sử dụng, kết hợp với da công nghiệp tạo ra kiểu dáng trẻ trung sang trọng đem lại sự hài lòng tuyệt đối cho quý khách hàng.</p>
								<span>
                                <div class="form-group">
									@if($details_pro->product_number == 0)
										<button type="submit" class="btn btn-fefault cart" disabled>
											<i class="fa fa-shopping-cart"></i>
											SẢN PHẨM HIỆN HẾT HÀNG
										</button>
									@else
									<a href="{{route('cart.add',[$details_pro->id])}}">
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											THÊM GIỎ HÀNG
										</button>
									</a>
									@endif
                                </div>
									
									
								</span>
								<p style="padding:5px 0px;"><b>Số lượng còn:</b> {{$details_pro->product_number}}</p>
								<p style="padding:5px 0px;"><b>Danh mục:</b> {{$details_pro->cate->category_name}}</p>
								<p style="padding:5px 0px;"><b>Thương hiệu:</b> {{$details_pro->brand->brand_name}}</p>
								<p style="padding:5px 0px;"><b>Size giày:</b> 28, 29, 30, 31, 32</p>
								<a href="#"><img src="{{url('public')}}/frontend/images/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
						
					</div><!---->
			
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">MÔ TẢ</a></li>
								
								<li class="active"><a href="#reviews" data-toggle="tab">ĐÁNH GIÁ</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-12" style="padding:0px 20px;">
                                    <h4>Đặc điểm: </h4>
                                    <p> + Kiểu dáng: Giày sneaker, giày thể thao <br>
                                        + Độ cao: 3cm <br>
                                        + Kích cỡ: 28-32 <br>
                                        + Chất liệu vải da, dễ làm sạch, êm chân <br>
                                        + Đế đúc cao su nguyên khối, chắc chắn.
                                    </p>
                                    <h4>Hướng dẫn chọn size: </h4>
                                    <p>
                                    <img src="{{url('public')}}/frontend/images/size1.png" width="90%" alt="">
                                    <img src="{{url('public')}}/frontend/images/size2.png" width="90%" alt="">
                                    </p>
                                </div>
							</div>
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									@if($comment === NULL)
									<h4>Chưa có đánh giá nào của khách hàng ! </h4>
									@else
									<h4>Những đánh giá của khách hàng: </h4>
									@foreach($comment as $v_comment)
									<div class="row">
										<div class="col-sm-4">
											<b><i>{{$v_comment->cus->name}}</i></b>
										</div>
										<div class="col-sm-8 text-right">
											<i>{{$v_comment->content}} <br>
												{{$v_comment->created_at}}
											</i>
										</div>
									</div>
									@endforeach
									<br>
									@endif

									<p>Vui lòng cho biết nhận xét và đánh giá về sản phẩm này ở form bên dưới: </p>
									<p><b>Thêm đánh giá: </b></p>
								@if(isset(Auth::guard('cus')->user()->id))
									<form action="" method="post">
										@csrf
										<input type="hidden" name="customer_id" value="{{Auth::guard('cus')->user()->id}}">
										<input type="hidden" name="product_id" value="{{$details_pro->id}}">
										<textarea name="content" placeholder="Đánh giá về sản phẩm tại đây ..." ></textarea>
										<b>Xếp hạng:  </b> <img src="{{url('public')}}/frontend/images/rating.png" alt="" />
										<button type="submit" class="btn btn-default pull-right">
											GỬI
										</button>
									</form>
								@else
									<form action="#" method="post">
											<textarea disabled name="" placeholder="Đánh giá về sản phẩm tại đây ..." ></textarea>
											<b>Xếp hạng:  </b> <img src="{{url('public')}}/frontend/images/rating.png" alt="" />
											<button disabled type="button" class="btn btn-default pull-right">
												ĐĂNG NHẬP ĐỂ BÌNH LUẬN
											</button>
										</form>
								@endif
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					@endforeach
					
				<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">SẢN PHẨM LIÊN QUAN</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($related_product as $related_pro)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{URL::to('public/uploads/product/'.$related_pro->product_image)}}" alt="" />
													<h2>{{number_format($related_pro->product_price)}} <sup><small style="color:#696763">VNĐ</small></sup>
													<del style="font-size:17px;padding-left:35px;color:#8C8C88"> {{number_format($related_pro->product_price_original)}}
													<sup><small style="color:#696763">VNĐ</small></sup>
													</del>	
													</h2>
													<p>{{$related_pro->product_name}}</p>
													<a href="{{route('details_product',[$related_pro->id,$related_pro->product_cate])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>XEM CHI TIẾT</a>
												</div>
												
											</div>
										</div>
									</div>
									@endforeach
								
								</div>
							</div>
							
						</div>
					</div><!--/recommended_items-->
@endsection
	