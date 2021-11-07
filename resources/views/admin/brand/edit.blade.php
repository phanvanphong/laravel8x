@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT THƯƠNG HIỆU SẢN PHẨM
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <form action="{{route('brand.update',$brand->id)}}" method="post">
                                @csrf @method('PUT')
                                <input type="hidden" name="id" value="{{$brand->id}}">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục :</label>
                                    <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                                    @error('brand_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục :</label>
                                    <textarea class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Password" cols="30" rows="5">{{$brand->brand_desc}}</textarea>
                                    @error('brand_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị :</label>
                                    <select name="brand_status" class="form-control input-sm m-bot15">
                                        <?php
                                            if($brand->brand_status == 0){
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

@endsection