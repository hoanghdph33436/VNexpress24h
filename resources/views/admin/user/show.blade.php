@extends('admin.master')

@section('title', 'Chi Tiết Người Dùng')

@section('title-page', 'Chi Tiết Người Dùng')

@section('main-content')
    <section class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Thông Tin Người Dùng: {{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Tên Người Dùng:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Vai Trò:</strong> {{ $user->role == 1 ? 'Admin' : 'User' }}</p>
                <p><strong>Trạng Thái:</strong> {{ $user->status == 1 ? 'Hoạt động' : 'Ngừng hoạt động' }}</p>
                <p><strong>Ngày Tạo:</strong> {{ $user->created_at->format('d-m-Y H:i:s') }}</p>
                <p><strong>Ngày Cập Nhật:</strong> {{ $user->updated_at->format('d-m-Y H:i:s') }}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Trở Lại</a>
                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update</a>
            </div>
        </div>
    </section>
@endsection
