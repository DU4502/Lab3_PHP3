# Lab 3 Laravel - Blade Template & Query Builder

## 📋 Mô tả
Project Laravel sử dụng Blade Template và Query Builder để xây dựng website tin tức.

## 🎯 Yêu cầu đã hoàn thành

### ✅ Bài 1: Controller + Route + View
- **TinController** với 3 functions:
  - `index()` - Trang chủ
  - `chitiet($id)` - Chi tiết tin
  - `tintrongloai($idLT)` - Tin theo loại

### ✅ Bài 2: Layout Blade
- Layout chính với Bootstrap 5
- Header, Nav, Main, Footer
- Sử dụng `@yield`, `@extends`, `@section`

### ✅ Bài 3: Query Builder
- Lấy dữ liệu từ database bằng `DB::table()`
- Không sử dụng Eloquent

### ✅ Bài 4: Menu động
- Menu lấy từ bảng `loaitin`
- Sử dụng `@include('menu')`

## 🚀 Cài đặt

### 1. Cấu hình database
```bash
# Copy file .env
cp .env.example .env

# Sửa thông tin database trong .env
DB_DATABASE=la_news
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Tạo database
```sql
CREATE DATABASE la_news CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 3. Chạy migration
```bash
php artisan migrate
```

### 4. Seed dữ liệu mẫu
```bash
php artisan db:seed
```

### 5. Chạy server
```bash
php artisan serve
```

Truy cập: http://localhost:8000

## 📁 Cấu trúc file

```
app/Http/Controllers/
└── TinController.php          # Controller chính

routes/
└── web.php                    # Định nghĩa routes

resources/views/
├── layout.blade.php           # Layout chính
├── menu.blade.php             # Menu động
├── home.blade.php             # Trang chủ
├── chitiet.blade.php          # Chi tiết tin
└── tintrongloai.blade.php     # Tin theo loại

database/
├── migrations/                # Migration files
└── seeders/
    └── DatabaseSeeder.php     # Dữ liệu mẫu
```

## 🔗 Routes

| Method | URI | Action | Name |
|--------|-----|--------|------|
| GET | / | index | home |
| GET | /tin/{id} | chitiet | tin.chitiet |
| GET | /cat/{idLT} | tintrongloai | tin.loai |

## 💾 Database Schema

### Bảng `loaitin`
- id
- ten
- moTa
- thuTu
- AnHien

### Bảng `tin`
- id
- idLT (foreign key)
- tieuDe
- tomTat
- noiDung
- urlHinh
- xem
- noiBat

## 🎨 Tính năng

- ✅ Responsive với Bootstrap 5
- ✅ Menu động từ database
- ✅ Hiển thị danh sách tin
- ✅ Chi tiết tin tức
- ✅ Lọc tin theo loại
- ✅ Breadcrumb navigation
- ✅ Hover effects
- ✅ Card layout đẹp mắt

## 📝 Lưu ý

- Sử dụng Query Builder (`DB::table()`)
- Không sử dụng Eloquent Model
- Code có comment đầy đủ
- Tuân thủ chuẩn Laravel
