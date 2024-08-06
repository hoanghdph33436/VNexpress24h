@extends('admin.master')

@section('title', 'Danh Sách')

@section('title-page', 'Danh Sách Tin')

@section('main-content')
    <section class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ $message }}
            </div>
        @endif

        <!-- Default box -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('product.create') }}" class="btn btn-success">+ Thêm mới Loại Tin</a>
                        <a href="" class="btn btn-primary"><i class="fa fa-trash"></i> Thùng Rác</a>
                    </div>


                    <div class="box-tools "style="margin-top: 30px" >
                        <form action="{{ route('product.index') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{ request()->search }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tiêu Đề</th>
                                <th>Tóm Tắt</th>
                                <th>Hình ảnh</th>
                                <th>Danh Mục</th>
                                {{-- <th>Chi Tiết</th> --}}
                                <th>Ngày Tạo</th>
                                {{-- <th>Danh Mục</th> --}}
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->tomtat }}</td>
                                    <td><img src="{{ asset('storage/images') }}/{{ $item->image }}" width="150px"></td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $item) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Update</a>
                                        <form action="{{ route('product.destroy', $item) }}" method="POST" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn Chắc Muốn Xóa?')"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Chưa Có Dữ Liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
                <!-- /.box-body -->
                {{ $products->links() }}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
    </section>
@endsection
