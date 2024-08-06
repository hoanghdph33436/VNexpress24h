@extends('fe.index')

@section('title', 'Liên hệ')

@section('main')

<div class="container mt-5">
    <div class="col-12 mb-4">
        <img src="/client/images/shop/lien-he.jpg" width="100%" class="img-fluid rounded" alt="banner">
    </div>

    <div class="row justify-content-center">

        <div class="col-md-10">

            <div class="row gy-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header text-center" style="background-color: #007BFF;">
                            <h3 class="h5 mb-0" style="color: #ffffff;">Liên Hệ Với Chúng Tôi</h3>
                        </div>
                        <div class="card-body" style="background-color: #d1deea;">
                            <form action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label" style="color: #000000;">Họ Tên <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="Nhập họ tên">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label" style="color: #000000;">Email <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="Nhập email">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label" style="color: #000000;">Nội Dung</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Nhập nội dung liên hệ"></textarea>
                                </div>
                                <button type="submit" class="btn text-white w-100" style="background-color: #007BFF;">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header text-center" style="background-color: #28A745;">
                            <h3 class="h5 mb-0" style="color: #ffffff;">Thông Tin Liên Hệ</h3>
                        </div>
                        <div class="card-body" style="background-color: #e0ecf8;">
                            <ul class="list-unstyled mb-4" style="color: #000000;">
                                <li class="mb-3">
                                    <i class="bi bi-geo-alt-fill me-2" style="color: #28A745;"></i>
                                    <strong>Địa chỉ:</strong> 123 Đường ABC, Phường XYZ, Quận 1, TP. Hồ Chí Minh
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-telephone-fill me-2" style="color: #28A745;"></i>
                                    <strong>Điện thoại:</strong> +84 123 456 789
                                </li>
                                <li class="mb-3">
                                    <i class="bi bi-envelope-fill me-2" style="color: #28A745;"></i>
                                    <strong>Email:</strong> contact@yourdomain.com
                                </li>
                            </ul>
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.702477511271!2d105.84117181533488!3d21.003117586012307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab79a5408e17%3A0x52848e9c27e7ad1d!2zMTIzIE1haW4gU3QsIEhhbm9pLCBWaWV0bmFt!5e0!3m2!1sen!2sus!4v1595423468981!5m2!1sen!2sus" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }
    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
    .btn:hover {
        background-color: #28A745 !important;
        border-color: #28A745 !important;
    }
</style>
