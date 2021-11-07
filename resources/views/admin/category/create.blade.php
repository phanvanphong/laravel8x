@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM MỚI DANH MỤC SẢN PHẨM
                        </header>
                        
                        <div class="panel-body">
                            <div>
                                <form action="{{route('category.store')}}" method="post">
                                @csrf 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục :</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục ..." >
                                    @error('category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục :</label>
                                    <textarea class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Nhập mô tả danh mục ..." cols="30" rows="5" ></textarea>
                                    @error('category_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị :</label>
                                    <select name="category_status" class="form-control input-sm m-bot15">
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