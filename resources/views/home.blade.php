@extends('layout')

@section('tieudetrang', 'Trang chủ - Tin tức mới nhất')

@section('noidung')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">
            <span class="badge bg-primary">📰</span> Tin tức mới nhất
        </h1>
    </div>
</div>

<div class="row">
    @if(count($dsTin) > 0)
        @foreach($dsTin as $tin)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    @if(!empty($tin->urlHinh))
                        <img src="{{ $tin->urlHinh }}" class="card-img-top" alt="{{ $tin->tieuDe }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-white fs-1">📰</span>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('tin.chitiet', $tin->id) }}">
                                {{ $tin->tieuDe }}
                            </a>
                        </h5>
                        
                        @if(!empty($tin->tomTat))
                            <p class="card-text text-muted">
                                {{ Str::limit($tin->tomTat, 100) }}
                            </p>
                        @endif
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('tin.chitiet', $tin->id) }}" class="btn btn-sm btn-primary">
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
            <div class="alert alert-info text-center">
                <h4>📭 Chưa có tin tức nào</h4>
                <p>Vui lòng quay lại sau!</p>
            </div>
        </div>
    @endif
</div>
@endsection
