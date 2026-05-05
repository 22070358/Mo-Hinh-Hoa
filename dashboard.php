<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$page = 'dashboard';
include 'includes/header.php';

$currentRole = $_SESSION["role"] ?? "hr";

if ($currentRole === "manager") {
    header("Location: jobs.php");
    exit;
}
?>

<div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-gray-900">Dashboard Tuyển dụng</h1>
        <p class="text-gray-500 mt-2">Tổng quan quy trình tuyển dụng nội bộ trong 30 ngày qua.</p>
    </div>

    <div class="flex items-center gap-3">
        <select class="px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm font-semibold text-gray-600">
            <option>30 ngày qua</option>
            <option>7 ngày qua</option>
            <option>Quý này</option>
        </select>

        <button type="button" class="px-5 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold shadow-sm">
            <i class="fas fa-download mr-2"></i> Xuất báo cáo
        </button>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500 font-medium">Tổng Ứng viên</p>
                <h2 class="text-4xl font-black mt-2">1,248</h2>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                <i class="fas fa-users text-xl"></i>
            </div>
        </div>
        <p class="mt-5 text-sm text-gray-400">
            <span class="text-green-600 font-bold">↑ 12%</span> so với tháng trước
        </p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500 font-medium">Vị trí đang mở</p>
                <h2 class="text-4xl font-black mt-2">24</h2>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center">
                <i class="fas fa-briefcase text-xl"></i>
            </div>
        </div>
        <p class="mt-5 text-sm text-gray-400">
            <span class="text-green-600 font-bold">↑ 3</span> vị trí mới tuần này
        </p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500 font-medium">Phỏng vấn sắp tới</p>
                <h2 class="text-4xl font-black mt-2">18</h2>
            </div>
            <div class="w-12 h-12 rounded-xl bg-yellow-50 text-yellow-700 flex items-center justify-center">
                <i class="fas fa-calendar-check text-xl"></i>
            </div>
        </div>
        <p class="mt-5 text-sm text-gray-400">
            <span class="text-yellow-600 font-bold">5</span> lịch hôm nay
        </p>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-gray-500 font-medium">Đã tuyển dụng</p>
                <h2 class="text-4xl font-black mt-2">42</h2>
            </div>
            <div class="w-12 h-12 rounded-xl bg-green-50 text-green-700 flex items-center justify-center">
                <i class="fas fa-user-check text-xl"></i>
            </div>
        </div>
        <p class="mt-5 text-sm text-gray-400">
            <span class="text-red-500 font-bold">↓ 2%</span> so với tháng trước
        </p>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    <section class="xl:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-xl font-black">Phễu Tuyển Dụng (Pipeline)</h2>
                <p class="text-gray-500 text-sm mt-1">Tỷ lệ chuyển đổi qua các vòng</p>
            </div>

            <button type="button" class="text-gray-400 hover:text-blue-700">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>

        <div class="space-y-4 max-w-2xl mx-auto">
            <div class="bg-blue-800 text-white rounded-xl px-6 py-4 flex justify-between font-bold" style="width:100%;">
                <span>100% &nbsp;&nbsp; Nộp hồ sơ</span>
                <span>1,248</span>
            </div>

            <div class="bg-blue-700 text-white rounded-xl px-6 py-4 flex justify-between font-bold mx-auto" style="width:86%;">
                <span>45% &nbsp;&nbsp; Sơ loại</span>
                <span>560</span>
            </div>

            <div class="bg-blue-600 text-white rounded-xl px-6 py-4 flex justify-between font-bold mx-auto" style="width:70%;">
                <span>15% &nbsp;&nbsp; Phỏng vấn</span>
                <span>187</span>
            </div>

            <div class="bg-blue-400 text-white rounded-xl px-6 py-4 flex justify-between font-bold mx-auto" style="width:55%;">
                <span>5% &nbsp;&nbsp; Đề nghị (Offer)</span>
                <span>62</span>
            </div>

            <div class="bg-green-500 text-white rounded-xl px-6 py-4 flex justify-between font-bold mx-auto" style="width:42%;">
                <span>3% &nbsp;&nbsp; Đã tuyển</span>
                <span>42</span>
            </div>
        </div>
    </section>

    <aside class="space-y-6">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-black">Hoạt động gần đây</h2>
                <button type="button" class="text-sm text-blue-700 font-bold">Tất cả</button>
            </div>

            <div class="space-y-5">
                <div class="candidate-card flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <p class="font-bold">Trần Thị B đã nhận việc</p>
                        <p class="text-gray-400 text-sm mt-1">2 giờ trước</p>
                    </div>
                </div>

                <div class="candidate-card flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div>
                        <p class="font-bold">Lê Văn C nộp hồ sơ mới</p>
                        <p class="text-gray-400 text-sm mt-1">5 giờ trước</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-black">Phỏng vấn sắp tới</h2>
                <a href="calendar.php" class="text-sm text-blue-700 font-bold">Xem lịch</a>
            </div>

            <div class="space-y-4">
                <div class="candidate-card p-4 rounded-xl bg-gray-50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold">
                            MP
                        </div>
                        <div>
                            <p class="font-bold">Maya Patel</p>
                            <p class="text-xs text-gray-500">Frontend Developer</p>
                        </div>
                    </div>

                    <button type="button" class="text-blue-700 font-bold text-sm">Xem</button>
                </div>

                <div class="candidate-card p-4 rounded-xl bg-gray-50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-700 flex items-center justify-center font-bold">
                            TA
                        </div>
                        <div>
                            <p class="font-bold">Tuấn Anh</p>
                            <p class="text-xs text-gray-500">Backend Developer</p>
                        </div>
                    </div>

                    <button type="button" class="text-blue-700 font-bold text-sm">Lên lịch</button>
                </div>
            </div>
        </div>
    </aside>
</div>

<?php include 'includes/footer.php'; ?>