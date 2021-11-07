@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT SẢN PHẨM
                        </header>
                        <div class="panel-body">
                            <div>
                                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm :</label>
                                    <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng :</label>
                                    <input type="number" name="product_number" value="{{$product->product_number}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá gốc :</label>
                                    <input type="number" name="product_price_original" value="{{$product->product_price_original}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sản phẩm ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá giảm :</label>
                                    <input type="text" name="product_price" value="{{$product->product_price}}" class="form-control" id="exampleInputEmail1">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Hình ảnh chính :</label>
                                    <input type="text" name="product_image" value="{{$product->product_image}}" class="form-control" id="image" >
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                    Chọn hình ảnh tại đây : 
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelId">
                                            <i class="fa fa-folder-open"></i>
                                        </button>
                                    </span><br>
                                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" width="150px" alt="">
                                    <span>{{$product->product_image}}</span>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Danh sách hình ảnh :</label>
                                    <input type="text" value="{{$product->product_image_list}}" name="product_image_list" class="form-control" id="image_list" >
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                    Chọn danh sách hình ảnh tại đây : 
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_list">
                                            <i class="fa fa-folder-open"></i>
                                        </button>
                                    </span> <br>
                                    <?php 
                                        $string = $product->product_image_list;
                                        // Chuyển string thành json để lấy phần tử
                                        $image_list = json_decode($string);
                                    ?>
                                    <div class="container">
                                        <div class="row">
                                        @foreach($image_list as $img_list)
                                            <div class="col-sm-4">    
                                                <img src="{{URL::to('public/uploads/product/'.$img_list)}}" width="80px" alt="">
                                                <span>{{$img_list}}</span>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm :</label>
                                    <textarea name="product_desc" id="ten">{{$product->product_desc}}</textarea>
                                    <script>CKEDITOR.replace('ten');</script>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thuộc danh mục ?</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cats as $key => $cate)
                                        @if($product->product_cate == $cate->category_id)
                                        <option value="{{$cate->id}}" selected>{{$cate->category_name}}</option>
                                        @else
                                        <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Thuộc thương hiệu ?</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brands as $key => $brand)
                                        @if($product->product_brand == $brand->brand_id)
                                        <option value="{{$brand->id}}" selected>{{$brand->brand_name}}</option>
                                        @else
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị :</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                    <?php
                                            if($product->product_status == 0){
                                                echo '<option value="0" selected>Ẩn</option>';
                                                echo '<option value="1">Hiện</option>';
                                            }else{
                                                echo '<option value="0">Ẩn</option>';
                                                echo '<option value="1" selected>Hiện</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" name="" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                        </div>
                    </section>

            </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-custom" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">THÊM HÌNH ẢNH: </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
            <iframe src="{{url('public/file/dialog.php?field_id=image')}}" style="width:100%;height:500px;overflow-y:auto;border:none;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <button type="button" class="btn btn-primary">LƯU</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modal_list" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-custom" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">THÊM HÌNH ẢNH: </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
            <iframe src="{{url('public/file/dialog.php?field_id=image_list')}}" style="width:100%;height:500px;overflow-y:auto;border:none;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <button type="button" class="btn btn-primary">LƯU</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
@endsection