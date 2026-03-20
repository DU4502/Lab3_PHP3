@extends('layout')

@section('tieudetrang', $tin->tieuDe ?? 'Chi tiết tin tức')

@section('noidung')
<div class="row">
    <div class="col-lg-8 mx-auto">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                @if(!empty($tin->idLT))
                    <li class="breadcrumb-item">
                        <a href="{{ route('tin.loai', $tin->idLT) }}">
                            @php
                                $tenLoai = DB::table('loaitin')->where('id', $tin->idLT)->value('ten');
                            @endphp
                            {{ $tenLoai ?? 'Loại tin' }}
                        </a>
                    </li>
                @endif
                <li class="breadcrumb-item active">Chi tiết</li>
            </ol>
        </nav>

        {{-- Nội dung chi tiết tin --}}
        <article class="card">
            <div class="card-body p-4">
                {{-- Tiêu đề --}}
                <h1 class="card-title mb-3">{{ $tin->tieuDe }}</h1>
                
                {{-- Thông tin meta --}}
                <div class="text-muted mb-4 pb-3 border-bottom">
                    @if(!empty($tin->created_at))
                        <span class="me-3">
                            📅 {{ date('d/m/Y H:i', strtotime($tin->created_at)) }}
                        </span>
                    @endif
                    
                    @if(!empty($tin->xem))
                        <span>
                            👁️ {{ number_format($tin->xem) }} lượt xem
                        </span>
                    @endif
                </div>
                
                {{-- Hình ảnh --}}
                @if(!empty($tin->urlHinh))
                    <div class="text-center mb-4">
                        <img src="{{ $tin->urlHinh }}" 
                             alt="{{ $tin->tieuDe }}" 
                             class="img-fluid rounded"
                             style="max-height: 500px; object-fit: cover;">
                    </div>
                @endif
                
                {{-- Tóm tắt --}}
                @if(!empty($tin->tomTat))
                    <div class="lead mb-4 p-3 bg-light rounded">
                        <strong>{{ $tin->tomTat }}</strong>
                    </div>
                @endif
                
                {{-- Nội dung chính --}}
                <div class="content">
                    @if(!empty($tin->noiDung))
                        {!! nl2br(e($tin->noiDung)) !!}
                    @else
                        <p class="text-muted">Nội dung đang được cập nhật...</p>
                    @endif
                </div>
                
                {{-- Nút quay lại --}}
                <div class="mt-4 pt-3 border-top">
                    <a href="javascript:history.back()" class="btn btn-secondary">
                        ← Quay lại
                    </a>
                    
                    @if(!empty($tin->idLT))
                        <a href="{{ route('tin.loai', $tin->idLT) }}" class="btn btn-primary">
                            Xem tin cùng chuyên mục
                        </a>
                    @endif
                </div>
            </div>
        </article>
    </div>
</div>
@endsection
