@extends('fe.index')

@section('title', 'Trang Chủ')

@section('main')
@include('fe.layouts.slide')
    <section class="section pb-0 mb-5" style="padding-top: 50px; background-color: #f5f8f7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <h2 class="h3 section-title">Tin Mới Nhất</h2>
                    @foreach ($newProduct as $item)

                    <article class="card mb-4">
                        <div class="row card-body">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <div class="post-slider slider-sm">
                                    <img src="{{ asset('storage/images') }}/{{ $item->image }}" class="card-img"
                                        alt="post-thumb" style="height:200px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h3 class="h4 mb-3"><a class="post-title"
                                        href="{{ route('detail', $item->slug) }}">{{ $item->name }}</a>
                                </h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <i
                                            class="ti-calendar"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-tag"></i>{{ $item->category->name }}
                                    </li>
                                </ul>
                                <p> {{ $item->tomtat }}</p>
                            </div>
                        </div>
                    </article>

                    @endforeach

                    {{ $newProduct->links('vendor.pagination.custom-pagination') }} <!-- Phân trang -->
                </div>
                <aside class="col-lg-4 sidebar-home">
                    <!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Tin Tức Nổi Bật</h4>
                        @foreach ($featuredProduct as $item)
                            <article class="widget-card">
                                <div class="d-flex">
                                    <img class="card-img-sm" src="{{ asset('storage/images/' . $item->image) }}">
                                    <div class="ml-3">
                                        <h5><a class="post-title" href="{{ route('detail', $item->slug) }}">{{ $item->tomtat }}</a></h5>
                                        <ul class="card-meta list-inline mb-0">
                                            <li class="list-inline-item mb-0">
                                                <i class="ti-calendar"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>

        </div>
    </section>
@endsection
