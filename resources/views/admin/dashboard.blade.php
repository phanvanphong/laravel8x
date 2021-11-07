@extends('admin_layout')
@section('admin_content')

<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Mặt hàng</h4>
					<h3>{{$product_items}}</h3>
					<p>hiện có trong danh sách sản phẩm</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Khách hàng</h4>
						<h3>{{$customer_count}}</h3>
						<p>đã đăng ký tài khoản tại shop</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn hàng</h4>
						<h3>{{$order_count}}</h3>
						<p>khách hàng đã đặt hàng tại shop</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sản phẩm</h4>
						<h3>{{$product_count}}</h3>
						<p> hiện đang có trong kho hàng</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
		
	<!--//agileinfo-grap-->

    <div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
      ĐƠN HÀNG MỚI NHẤT
    </div>
    <div class="table-responsive">
        <br>
       <form action="" method="get" class="form-inline" role="form">
            <div class="form-group">
            <label for="usr">Từ ngày:</label>
            <input type="date" class="form-control" name="date_form" id="usr">
            </div>
            <div class="form-group">
            <label for="pwd">đến ngày:</label>
            <input type="date" class="form-control" name="date_to" id="pwd">
            </div>
            <button type="submit" class="btn btn-primary">Lọc</button>
       </form>

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày mua</th>
            <th>Tình trạng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order_new as $dt)
          <tr>
            <td>{{$dt->id}}</td>
            <td>{{$dt->cus->name}}</td>
            <td>{{$dt->order_date}}</td>
            <td>
            @if($dt->order_status == 0)
                  <?php echo 'Đang xử lý' ?> 
                  @elseif($dt->order_status == 1)
                  <?php echo 'Đang giao hàng' ?> 
                  @elseif($dt->order_status == 2)
                  <?php echo 'Đã thanh toán' ?> 
            @endif
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
</div>

    <!-- <br><br>
    <div class="panel-heading">
     THỐNG KÊ DOANH THU
    </div>
    <div id="myfirstchart" style="height: 250px;"></div>
</div>
</section>




<script>

new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: {{$customer_count}} },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script> -->
@endsection