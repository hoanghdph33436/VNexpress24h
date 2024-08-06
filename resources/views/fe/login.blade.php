@extends('fe.index')

@section('title', 'Đăng Nhập')

@section('main')
<section class="section pb-0 mb-5">
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Đăng Nhập</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Nhập Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Email...." required>
                            </div>
                            <div class="form-group">
                                <label for="password">Nhập Mật Khẩu:</label>
                                <input type="password" name="password" class="form-control" placeholder="Mật Khẩu...." required>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                                <a href="{{ route('password.request') }}" class="btn btn-link">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
