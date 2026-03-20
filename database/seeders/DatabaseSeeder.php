<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed dữ liệu mẫu cho database
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ
        DB::table('tin')->truncate();
        DB::table('loaitin')->truncate();

        // Thêm dữ liệu loại tin
        $loaiTinIds = [];
        $loaiTinIds[] = DB::table('loaitin')->insertGetId([
            'ten' => 'Thời sự',
            'moTa' => 'Tin tức thời sự trong nước và quốc tế',
            'thuTu' => 1,
            'AnHien' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $loaiTinIds[] = DB::table('loaitin')->insertGetId([
            'ten' => 'Công nghệ',
            'moTa' => 'Tin tức về công nghệ, khoa học',
            'thuTu' => 2,
            'AnHien' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $loaiTinIds[] = DB::table('loaitin')->insertGetId([
            'ten' => 'Thể thao',
            'moTa' => 'Tin tức thể thao trong và ngoài nước',
            'thuTu' => 3,
            'AnHien' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $loaiTinIds[] = DB::table('loaitin')->insertGetId([
            'ten' => 'Giải trí',
            'moTa' => 'Tin tức giải trí, showbiz',
            'thuTu' => 4,
            'AnHien' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thêm dữ liệu tin tức mẫu
        $tinData = [
            [
                'idLT' => $loaiTinIds[0],
                'tieuDe' => 'Chính phủ ban hành chính sách mới hỗ trợ doanh nghiệp',
                'tomTat' => 'Chính phủ vừa công bố gói hỗ trợ mới nhằm giúp doanh nghiệp vượt qua khó khăn.',
                'noiDung' => 'Theo thông báo chính thức, Chính phủ đã ban hành nhiều chính sách ưu đãi nhằm hỗ trợ doanh nghiệp trong giai đoạn khó khăn. Các chính sách bao gồm giảm thuế, hỗ trợ vốn vay với lãi suất ưu đãi, và đơn giản hóa thủ tục hành chính.',
                'urlHinh' => 'https://via.placeholder.com/800x400/007bff/ffffff?text=Thoi+Su',
                'xem' => 1250,
            ],
            [
                'idLT' => $loaiTinIds[1],
                'tieuDe' => 'AI và Machine Learning đang thay đổi thế giới',
                'tomTat' => 'Trí tuệ nhân tạo đang tạo ra cuộc cách mạng trong mọi lĩnh vực của cuộc sống.',
                'noiDung' => 'Công nghệ AI và Machine Learning đang phát triển với tốc độ chóng mặt. Từ y tế, giáo dục đến kinh doanh, AI đang mang lại những thay đổi tích cực và nâng cao hiệu quả công việc.',
                'urlHinh' => 'https://via.placeholder.com/800x400/28a745/ffffff?text=Cong+Nghe',
                'xem' => 2340,
            ],
            [
                'idLT' => $loaiTinIds[2],
                'tieuDe' => 'Đội tuyển Việt Nam giành chiến thắng ấn tượng',
                'tomTat' => 'Với màn trình diễn xuất sắc, đội tuyển Việt Nam đã giành chiến thắng 3-0.',
                'noiDung' => 'Trong trận đấu diễn ra tối qua, đội tuyển Việt Nam đã có màn thể hiện vượt trội với 3 bàn thắng đẹp mắt. Chiến thắng này giúp Việt Nam vững vàng ở vị trí đầu bảng.',
                'urlHinh' => 'https://via.placeholder.com/800x400/dc3545/ffffff?text=The+Thao',
                'xem' => 3450,
            ],
            [
                'idLT' => $loaiTinIds[3],
                'tieuDe' => 'Phim mới của đạo diễn nổi tiếng ra mắt',
                'tomTat' => 'Bộ phim được mong đợi nhất năm chính thức công chiếu tại các rạp.',
                'noiDung' => 'Sau nhiều tháng chờ đợi, bộ phim mới của đạo diễn nổi tiếng đã chính thức ra mắt khán giả. Với dàn diễn viên hùng hậu và kỹ xảo đỉnh cao, phim hứa hẹn sẽ là bom tấn của năm.',
                'urlHinh' => 'https://via.placeholder.com/800x400/ffc107/ffffff?text=Giai+Tri',
                'xem' => 1890,
            ],
            [
                'idLT' => $loaiTinIds[1],
                'tieuDe' => 'Laravel 11 ra mắt với nhiều tính năng mới',
                'tomTat' => 'Phiên bản Laravel 11 mang đến nhiều cải tiến về hiệu suất và bảo mật.',
                'noiDung' => 'Laravel 11 đã chính thức được phát hành với nhiều tính năng mới hấp dẫn. Các nhà phát triển có thể tận dụng các công cụ mạnh mẽ hơn để xây dựng ứng dụng web hiện đại.',
                'urlHinh' => 'https://via.placeholder.com/800x400/28a745/ffffff?text=Laravel+11',
                'xem' => 980,
            ],
        ];

        foreach ($tinData as $tin) {
            DB::table('tin')->insert(array_merge($tin, [
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ]));
        }
    }
}
