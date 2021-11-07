@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM MỚI THƯƠNG HIỆU SẢN PHẨM
                        </header>
                        <div class="panel-body">
                            <div>
                            <form action="{{route('brand.store')}}" method="post">
                                @csrf 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu :</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thương hiệu ..." >
                                    @error('brand_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu :</label>
                                    <textarea class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu ..." cols="30" rows="5" ></textarea>
                                    @error('brand_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị :</label>
                                    <select name="brand_status" class="form-control input-sm m-bot15">
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

@endsection