@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT DANH MỤC SẢN PHẨM
                        </header>
                        <div class="panel-body">
                           
                            <div class="position-center">
                                <form action="{{route('category.update',$category->id)}}" method="post">
                                @csrf @method('PUT')
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục :</label>
                                    <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                                    @error('category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục :</label>
                                    <textarea class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Password" cols="30" rows="5">{{$category->category_desc}}</textarea>
                                    @error('category_desc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị :</label>
                                    <select name="category_status" class="form-control input-sm m-bot15">
                                        <?php
                                            if($category->category_status == 0){
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