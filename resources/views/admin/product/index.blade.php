@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ SẢN PHẨM
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
            <th>Giá gốc</th>
            <th>Giá giảm</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Số lượng</th>
            <th style="width:85px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$dt->product_name}}</td>
            <td>{{number_format($dt->product_price_original)}}</td>
            <td>{{number_format($dt->product_price)}}</td>
            <td><img src="{{URL::to('public/uploads/product/'.$dt->product_image)}}" width="100px" alt=""></td>
            <td>{{$dt->cate->category_name}}</td>
            <td>{{$dt->brand->brand_name}}</td>
            <td>{{$dt->product_number}}</td>
            <td>
              <div class="row">
                  <div class="col-sm-6" style="padding:0px;">
                    <form action="{{route('product.edit',$dt->id)}}" method="POST">
                      @csrf @method('GET')  
                      <button class="btn btn-sm btn-success"> 
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </button>
                    </form>
                  </div>
                  <div class="col-sm-6" style="padding:0px;">
                    <form action="{{route('product.destroy',$dt->id)}}" method="POST">
                      @csrf @method('DELETE')   
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"> 
                      <i class="fa fa-trash" aria-hidden="true"></i>
                      </button>
                    </form>
                  </div>
              </div>
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
          
               <div>
                {{$data->appends(request()->all())->links()}}
              </div>
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