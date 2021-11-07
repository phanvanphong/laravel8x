@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM MỚI THÀNH VIÊN
                        </header>
                        
                        <div class="panel-body">
                            <div>
                                <form action="{{route('user.store')}}" method="post">
                                @csrf 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thành viên :</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục ..." >
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email :</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục ..." >
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu :</label>
                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục ..." >
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button type="submit" name="" class="btn btn-info">Thêm mới</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>

@endsection