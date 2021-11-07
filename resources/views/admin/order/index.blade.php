@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ DANH MỤC SẢN PHẨM
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
            <th>Mã hóa đơn</th>
            <th>Tên khách hàng</th>
            <th>Ngày mua</th>
            <th>Ghi chú</th>
            <th>Tình trạng</th>
            <th style="width:130px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$dt->id}}</td>
            <td>{{$dt->customer->name}}</td>
            <td>{{$dt->order_date}}</td>
            <td>{{$dt->order_notes}}</td>
            <td>
            <form action="{{route('order.update',$dt->id)}}" method="post"> 
            @csrf @method('PUT')
            <div class="form-group">
              <div class="row">
                <div class="col-sm-9">
                <select class="form-control" name="order_status" id="sel1">
                  @if($dt->order_status == 0)
                    <option value="0" selected>Đang xử lý</option>
                    <option value="1">Đang giao hàng</option>
                    <option value="2">Đã thanh toán</option>
                  @elseif($dt->order_status == 1)
                    <option value="0">Đang xử lý</option>
                    <option value="1" selected>Đang giao hàng</option>
                    <option value="2">Đã thanh toán</option>
                  @elseif($dt->order_status == 2)
                    <option value="0">Đang xử lý</option>
                    <option value="1">Đang giao hàng</option>
                    <option value="2" selected>Đã thanh toán</option>
                  @endif
                  </select>
                </div>
                <div class="col-sm-3">
               
                
                <button type="submit" class="btn btn-default"> <i class="fa fa-retweet" aria-hidden="true"></i></button>
                </form> 
									<!-- <a class="cart_quantity_down" href=""> - </a> -->
               <td>
                </div>
              </div>
              
              
              <a href="{{route('orderdetails',$dt->id)}}">XEM CHI TIẾT</a>
            </td>
          </tr>
          @endforeach
          
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

              <div>
                {{$data->appends(request()->all())->links()}}
              </div>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection