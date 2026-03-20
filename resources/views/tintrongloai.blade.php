@extends('layout')

@section('tieudetrang', ($loaiTin->ten ?? 'Danh mục tin') . ' - Tin tức')

@section('noidung')
<div class="row">
    <div class="col-12">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">{{ $loaiTin->ten ?? 'Danh mục' }}</li>
            </ol>
        </nav>

        {{-- Tiêu đề loại tin --}}
        <h1 class="mb-4">
            <span class="badge bg-success">📂</span> 
            {{ $loaiTin->ten ?? 'Danh mục tin' }}
        </h1>
        
        @if(!empty($loaiTin->moTa))
            <p class="lead text-muted mb-4">{{ $loaiTin->moTa }}</p>
        @endif
    </div>
</div>

<div class="row">
    @if(count($dsTin) > 0)
        @foreach($dsTin as $tin)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    {{-- Hình ảnh --}}
                    @if(!empty($tin->urlHinh))
                        <img src="{{ $tin->urlHinh }}" 
                             class="card-img-top" 
                             alt="{{ $tin->tieuDe }}" 
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <span class="text-white fs-1">📰</span>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        {{-- Tiêu đề với link --}}
                        <h5 class="card-title">
                            <a href="{{ route('tin.chitiet', $tin->id) }}">
                                {{ $tin->tieuDe }}
                            </a>
                        </h5>
                        
                        {{-- Tóm tắt --}}
                        @if(!empty($tin->tomTat))
                            <p class="card-text text-muted">
                                {{ Str::limit($tin->tomTat, 100) }}
                            </p>
                        @endif
                        
                        {{-- Footer card --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('tin.chitiet', $tin->id) }}" 
                               class="btn btn-sm btn-primary">
                                Đọc tiếp →
                            </a>
                            
                            @if(!empty($tin->created_at))
                                <small class="text-muted">
                                    {{ date('d/m/Y', strtotime($tin->created_at)) }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <div class="alert alert-warning text-center">
                <h4>📭 Chưa có tin tức trong danh mục này</h4>
                <p>Vui lòng quay lại sau hoặc xem các danh mục khác!</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-2">
                    ← Về trang chủ
                </a>
            </div>
        </div>
    @endif
</div>

{{-- Hiển thị tổng số tin --}}
@if(count($dsTin) > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="alert alert-info">
                <strong>Tổng số:</strong> {{ count($dsTin) }} tin tức
            </div>
        </div>
    </div>
@endif
@endsection
