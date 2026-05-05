<?php
$page = 'reports';
include 'includes/header.php';

$currentRole = $_SESSION["role"] ?? "hr";
$isManager = $currentRole === "manager";
?>

<div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-gray-900">Báo cáo & Phân tích chuyên sâu</h1>
        <p class="text-gray-500 mt-2">
            <?php echo $isManager ? "Theo dõi hiệu quả tuyển dụng của các vị trí phụ trách." : "Theo dõi hiệu quả tuyển dụng, nguồn ứng viên và năng suất HR."; ?>
        </p>
    </div>

    <button class="px-5 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold">
        <i class="fas fa-download mr-2"></i> Xuất báo cáo
    </button>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <select class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600">
            <option>30 ngày qua</option>
            <option>7 ngày qua</option>
            <option>Quý này</option>
        </select>

        <select class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600">
            <option>Tất cả phòng ban</option>
            <option>Engineering</option>
            <option>Marketing</option>
        </select>

        <select class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600">
            <option>Tất cả vị trí</option>
            <option>Frontend Developer</option>
            <option>Backend Developer</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <p class="text-gray-500 font-medium">Thời gian tuyển TB</p>
        <h2 class="text-3xl font-black mt-2">18 ngày</h2>
        <p class="text-sm text-green-600 font-bold mt-3">↓ 2 ngày</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <p class="text-gray-500 font-medium">Chi phí mỗi lượt tuyển</p>
        <h2 class="text-3xl font-black mt-2">12.500.000</h2>
        <p class="text-sm text-green-600 font-bold mt-3">↓ 5%</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <p class="text-gray-500 font-medium">Tổng ứng viên mới</p>
        <h2 class="text-3xl font-black mt-2">1,248</h2>
        <p class="text-sm text-blue-600 font-bold mt-3">+24%</p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <p class="text-gray-500 font-medium">Tỷ lệ nhận việc</p>
        <h2 class="text-3xl font-black mt-2">85.4%</h2>
        <p class="text-sm text-yellow-600 font-bold mt-3">-1.2%</p>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
    <section class="xl:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h2 class="text-xl font-black mb-6">Phễu tuyển dụng chi tiết</h2>

        <div class="space-y-5">
            <div>
                <div class="flex justify-between text-sm font-bold mb-2">
                    <span>Tìm kiếm (Sourcing)</span>
                    <span>1,248 (100%)</span>
                </div>
                <div class="h-8 rounded-xl bg-gray-100">
                    <div class="h-8 rounded-xl bg-blue-800 w-full"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-sm font-bold mb-2">
                    <span>Sàng lọc (Screening)</span>
                    <span>842 (67.4%)</span>
                </div>
                <div class="h-8 rounded-xl bg-gray-100">
                    <div class="h-8 rounded-xl bg-blue-700 w-[67%]"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-sm font-bold mb-2">
                    <span>Phỏng vấn (Interview)</span>
                    <span>320 (25.6%)</span>
                </div>
                <div class="h-8 rounded-xl bg-gray-100">
                    <div class="h-8 rounded-xl bg-blue-500 w-[26%]"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-sm font-bold mb-2">
                    <span>Mời nhận việc (Offer)</span>
                    <span>45 (3.6%)</span>
                </div>
                <div class="h-8 rounded-xl bg-gray-100">
                    <div class="h-8 rounded-xl bg-yellow-500 w-[9%]"></div>
                </div>
            </div>

            <div>
                <div class="flex justify-between text-sm font-bold mb-2">
                    <span>Đã thuê (Hired)</span>
                    <span>38 (3.0%)</span>
                </div>
                <div class="h-8 rounded-xl bg-gray-100">
                    <div class="h-8 rounded-xl bg-green-500 w-[7%]"></div>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h2 class="text-xl font-black mb-6">Nguồn ứng viên</h2>

        <div class="w-48 h-48 rounded-full mx-auto mb-8"
             style="background: conic-gradient(#1d4ed8 0 45%, #10b981 45% 70%, #f59e0b 70% 88%, #94a3b8 88% 100%);">
            <div class="w-32 h-32 rounded-full bg-white relative left-8 top-8 flex flex-col items-center justify-center">
                <p class="text-2xl font-black">1.2K</p>
                <p class="text-xs text-gray-500">Tổng cộng</p>
            </div>
        </div>

        <div class="space-y-3">
            <div class="flex justify-between text-sm">
                <span><i class="fas fa-circle text-blue-700 mr-2"></i>LinkedIn</span>
                <b>45%</b>
            </div>

            <div class="flex justify-between text-sm">
                <span><i class="fas fa-circle text-green-500 mr-2"></i>Referral</span>
                <b>25%</b>
            </div>

            <div class="flex justify-between text-sm">
                <span><i class="fas fa-circle text-yellow-500 mr-2"></i>Direct</span>
                <b>18%</b>
            </div>

            <div class="flex justify-between text-sm">
                <span><i class="fas fa-circle text-gray-400 mr-2"></i>Website</span>
                <b>12%</b>
            </div>
        </div>
    </aside>
</div>

<section class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-black">Năng suất chuyên viên tuyển dụng</h2>
        <button class="text-blue-700 font-bold text-sm">Xem chi tiết</button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-xs text-gray-400 uppercase border-b">
                    <th class="py-3">Chuyên viên</th>
                    <th class="py-3">Hồ sơ đã xử lý</th>
                    <th class="py-3">Phỏng vấn</th>
                    <th class="py-3">Đã tuyển</th>
                    <th class="py-3">Tỷ lệ chuyển đổi</th>
                    <th class="py-3">Đánh giá</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b">
                    <td class="py-4 font-bold">Lê Thị B</td>
                    <td class="py-4">342</td>
                    <td class="py-4">86</td>
                    <td class="py-4 text-green-600 font-bold">12</td>
                    <td class="py-4">3.5%</td>
                    <td class="py-4 text-yellow-500">★★★★★</td>
                </tr>

                <tr>
                    <td class="py-4 font-bold">Nguyễn Văn A</td>
                    <td class="py-4">295</td>
                    <td class="py-4">74</td>
                    <td class="py-4 text-green-600 font-bold">9</td>
                    <td class="py-4">3.0%</td>
                    <td class="py-4 text-yellow-500">★★★★☆</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<?php include 'includes/footer.php'; ?>