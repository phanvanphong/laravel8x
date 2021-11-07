@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      CHI TIẾT ĐƠN HÀNG
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Xóa</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">OK</button>                
      </div>
      <div class="col-sm-4">
      </div>

       <!-- CHECK TÌM KIẾM -->
       <div class="col-sm-3">
        <form action="" >
        <div class="input-group">
          <input type="text" name="key" class="input-sm form-control">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
          </span>
        </div>
        </form>
      </div>
      
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
          @foreach($order_details as $key => $order_d)
            <?php $total += $order_d->order_number*$order_d->order_price ?>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$order_d->product_name}}</td>
            <td>
                <img src="{{URL::to('public/uploads/product/'.$order_d->product_image)}}" width="100px" alt="">
            </td>
            <td>{{$order_d->product_number}}</td>
            <td>{{number_format($order_d->order_price)}}</td>
            <td>{{number_format($order_d->order_number*$order_d->order_price)}}</td>
          </tr>
          @endforeach
          <tr>
              <td colspan="5" style="font-size:18px;text-align:center;font-weight:bolder;color:black;">TỔNG TIỀN</td>
              <td colspan="1" style="font-size:18px;font-weight:bolder;color:black;"><?php echo number_format($total) ?> <sup><small style="color:black;">VNĐ</small></sup> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
        </div>
        <div class="col-sm-7 text-right text-center-xs">    
          
              
          <!-- <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul> -->
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection