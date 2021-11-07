@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM MỚI SẢN PHẨM
                        </header>
                        <div class="panel-body">
                            <div >
                                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm :</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm ...">
                                    @error('product_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm :</label>
                                    <input type="number" name="product_number" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng sản phẩm ...">
                                    @error('product_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm :</label>
                                    <input type="number" name="product_price_original" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sản phẩm ...">
                                    @error('product_price_original')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá giảm :</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá giảm ...">
                                    @error('product_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Hình ảnh chính :</label>
                                    <input type="text" name="product_image" class="form-control" id="image">
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                    Chọn hình ảnh tại đây : 
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modelId">
                                            <i class="fa fa-folder-open"></i>
                                        </button>
                                    </span>
                                    @error('product_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Danh sách hình ảnh :</label>
                                    <input type="text" name="product_image_list" class="form-control" id="image_list">
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                    Chọn danh sách hình ảnh tại đây : 
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_list">
                                            <i class="fa fa-folder-open"></i>
                                        </button>
                                    </span>
                                    @error('product_image_list')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm :</label>
                                    <textarea name="product_desc" id="ten"></textarea>
                                    <script>CKEDITOR.replace('ten');</script>
                                    @error('product_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Thuộc danh mục ?</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cats as $key => $cate)
                                        <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Thuộc thương hiệu ?</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brands as $key => $brand)                                     
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị :</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1" selected>Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" name="" class="btn btn-info">Thêm mới</button>
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