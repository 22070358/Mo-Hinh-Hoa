<?php
$page = 'jobs';
include 'includes/header.php';

$currentRole = $_SESSION["role"] ?? "hr";
$isManager = $currentRole === "manager";
?>

<div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-gray-900">
            <?php echo $isManager ? "Vị trí cần phê duyệt" : "Vị trí tuyển dụng"; ?>
        </h1>
        <p class="text-gray-500 mt-2">
            <?php echo $isManager ? "Xem, duyệt và phản hồi các yêu cầu tuyển dụng từ HR." : "Quản lý danh sách vị trí tuyển dụng nội bộ."; ?>
        </p>
    </div>

    <?php if (!$isManager): ?>
        <a href="create_job.php" class="inline-flex items-center justify-center px-5 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold shadow-sm">
            <i class="fas fa-plus mr-2"></i> Tạo yêu cầu tuyển dụng
        </a>
    <?php endif; ?>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="relative md:col-span-2">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Tìm kiếm vị trí, phòng ban..." class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl">
        </div>

        <select class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600">
            <option>Tất cả phòng ban</option>
            <option>Engineering</option>
            <option>Marketing</option>
            <option>Sales</option>
        </select>

        <select class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600">
            <option>Tất cả trạng thái</option>
            <option>Đang mở</option>
            <option>Chờ duyệt</option>
            <option>Đã đóng</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
    <?php
    $jobs = [
        ["title" => "Senior Frontend Developer", "dept" => "Engineering", "status" => "Chờ duyệt", "statusClass" => "bg-yellow-100 text-yellow-700", "candidates" => 42, "manager" => "Hiring Manager", "salary" => "25 - 35 triệu"],
        ["title" => "Product Designer", "dept" => "Design", "status" => "Đang mở", "statusClass" => "bg-green-100 text-green-700", "candidates" => 28, "manager" => "Hiring Manager", "salary" => "20 - 30 triệu"],
        ["title" => "Backend Developer", "dept" => "Engineering", "status" => "Chờ duyệt", "statusClass" => "bg-yellow-100 text-yellow-700", "candidates" => 35, "manager" => "Hiring Manager", "salary" => "28 - 40 triệu"],
        ["title" => "Marketing Executive", "dept" => "Marketing", "status" => "Tạm dừng", "statusClass" => "bg-gray-100 text-gray-700", "candidates" => 16, "manager" => "Hiring Manager", "salary" => "15 - 22 triệu"]
    ];
    ?>

    <?php foreach ($jobs as $job): ?>
        <div class="job-card bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <h2 class="text-xl font-black text-gray-900"><?php echo $job["title"]; ?></h2>
                        <span class="status px-3 py-1 rounded-full text-xs font-bold <?php echo $job["statusClass"]; ?>">
                            <?php echo $job["status"]; ?>
                        </span>
                    </div>

                    <p class="text-gray-500 text-sm">
                        <i class="fas fa-building mr-2"></i><?php echo $job["dept"]; ?>
                        <span class="mx-2">•</span>
                        <i class="fas fa-money-bill mr-2"></i><?php echo $job["salary"]; ?>
                    </p>
                </div>

                <button class="text-gray-400 hover:text-blue-700">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>

            <div class="grid grid-cols-3 gap-4 my-6">
                <div class="p-4 rounded-xl bg-blue-50">
                    <p class="text-xs text-blue-500 font-bold">Ứng viên</p>
                    <p class="text-2xl font-black text-blue-800 mt-1"><?php echo $job["candidates"]; ?></p>
                </div>

                <div class="p-4 rounded-xl bg-purple-50">
                    <p class="text-xs text-purple-500 font-bold">Phỏng vấn</p>
                    <p class="text-2xl font-black text-purple-800 mt-1">8</p>
                </div>

                <div class="p-4 rounded-xl bg-green-50">
                    <p class="text-xs text-green-500 font-bold">Offer</p>
                    <p class="text-2xl font-black text-green-800 mt-1">3</p>
                </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-gray-100">
                <div>
                    <p class="text-xs text-gray-400">Hiring Manager</p>
                    <p class="font-bold text-gray-800"><?php echo $job["manager"]; ?></p>
                </div>

                <div class="flex gap-2">
                    <button class="px-4 py-2 rounded-xl bg-gray-100 text-gray-700 font-bold text-sm hover:bg-gray-200">
                        Xem chi tiết
                    </button>

                    <?php if ($isManager): ?>
                        <button class="px-4 py-2 rounded-xl bg-green-600 text-white font-bold text-sm hover:bg-green-700">
                            Duyệt
                        </button>
                        <button class="px-4 py-2 rounded-xl bg-red-50 text-red-600 font-bold text-sm hover:bg-red-100">
                            Từ chối
                        </button>
                    <?php else: ?>
                        <button class="px-4 py-2 rounded-xl bg-blue-700 text-white font-bold text-sm hover:bg-blue-800">
                            Chỉnh sửa
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>