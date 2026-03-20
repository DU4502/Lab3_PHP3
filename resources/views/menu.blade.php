{{-- Menu động lấy từ database --}}
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        {{-- Link trang chủ --}}
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                🏠 Trang chủ
            </a>
        </li>
        
        {{-- Lấy danh sách loại tin từ database --}}
        @php
            $dsLoaiTin = DB::table('loaitin')
                ->where('AnHien', 1)
                ->orderBy('thuTu', 'asc')
                ->get();
        @endphp
        
        {{-- Hiển thị menu các loại tin --}}
        @foreach($dsLoaiTin as $loai)
            <li class="nav-item">
                <a class="nav-link {{ Request::is('cat/'.$loai->id) ? 'active' : '' }}" 
                   href="{{ route('tin.loai', $loai->id) }}">
                    {{ $loai->ten }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
