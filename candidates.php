<?php
$page = 'candidate';
include 'includes/header.php';
?>

<div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-gray-900">Danh sách ứng viên</h1>
        <p class="text-gray-500 mt-2">Quản lý toàn bộ hồ sơ ứng viên trong hệ thống.</p>
    </div>
    <button class="px-5 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold shadow-sm flex items-center gap-2">
        <i class="fas fa-plus"></i> Thêm ứng viên
    </button>
</div>

<!-- Filter Bar -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="relative md:col-span-2">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" placeholder="Tìm tên, email, vị trí..." class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <select class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600 text-sm">
            <option>Tất cả vị trí</option>
            <option>Frontend Developer</option>
            <option>Backend Developer</option>
            <option>Product Designer</option>
            <option>Full Stack Developer</option>
        </select>
        <select class="px-4 py-3 border border-gray-200 rounded-xl text-gray-600 text-sm">
            <option>Tất cả trạng thái</option>
            <option>Nộp hồ sơ</option>
            <option>Sàng lọc</option>
            <option>Phỏng vấn</option>
            <option>Offer</option>
            <option>Đã tuyển</option>
        </select>
    </div>
</div>

<!-- Candidate Table -->
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 bg-gray-50/50">
                    <th class="text-left px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs">Ứng viên</th>
                    <th class="text-left px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs">Vị trí</th>
                    <th class="text-left px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs">Trạng thái</th>
                    <th class="text-left px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs">Kỹ năng</th>
                    <th class="text-left px-6 py-4 font-bold text-gray-500 uppercase tracking-wider text-xs">Cập nhật</th>
                    <th class="px-6 py-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php
                $candidates = [
                    ["name" => "John Doe", "email" => "john.doe@example.com", "role" => "Full Stack Developer", "status" => "Phỏng vấn", "statusClass" => "bg-yellow-100 text-yellow-700", "skills" => ["React", "Node.js", "TypeScript"], "updated" => "Hôm nay", "exp" => "8+"],
                    ["name" => "Maya Patel", "email" => "maya.p@example.com", "role" => "Frontend Developer", "status" => "Sàng lọc", "statusClass" => "bg-blue-100 text-blue-700", "skills" => ["React", "TypeScript", "Tailwind"], "updated" => "2 giờ trước", "exp" => "3"],
                    ["name" => "Lê Văn C", "email" => "levanc@example.com", "role" => "Frontend Developer", "status" => "Nộp hồ sơ", "statusClass" => "bg-gray-100 text-gray-700", "skills" => ["Vue.js", "CSS"], "updated" => "Hôm qua", "exp" => "2"],
                    ["name" => "Trần Thị B", "email" => "tranthib@example.com", "role" => "Frontend Developer", "status" => "Đã tuyển", "statusClass" => "bg-green-100 text-green-700", "skills" => ["UI/UX", "Figma", "React"], "updated" => "3 ngày trước", "exp" => "4"],
                    ["name" => "Nguyễn Minh", "email" => "nguyenminh@example.com", "role" => "Frontend Developer", "status" => "Sàng lọc", "statusClass" => "bg-blue-100 text-blue-700", "skills" => ["React", "Node.js"], "updated" => "1 ngày trước", "exp" => "2"],
                    ["name" => "Hoàng Anh", "email" => "hoanganh@example.com", "role" => "Frontend Developer", "status" => "Nộp hồ sơ", "statusClass" => "bg-gray-100 text-gray-700", "skills" => ["UI/UX"], "updated" => "2 ngày trước", "exp" => "1"],
                    ["name" => "Tuấn Anh", "email" => "tuananh@example.com", "role" => "Frontend Developer", "status" => "Phỏng vấn", "statusClass" => "bg-yellow-100 text-yellow-700", "skills" => ["React", "TypeScript"], "updated" => "3 ngày trước", "exp" => "3"],
                    ["name" => "Sarah Lee", "email" => "sarah.lee@example.com", "role" => "Middle Developer", "status" => "Phỏng vấn", "statusClass" => "bg-yellow-100 text-yellow-700", "skills" => ["Vue.js", "Golang"], "updated" => "4 ngày trước", "exp" => "4"],
                    ["name" => "Phạm Quốc Huy", "email" => "phamquochuy@example.com", "role" => "Frontend Developer", "status" => "Offer", "statusClass" => "bg-orange-100 text-orange-700", "skills" => ["React", "Next.js", "AWS"], "updated" => "5 ngày trước", "exp" => "5"],
                ];
                ?>

                <?php foreach ($candidates as $c): ?>
                <tr class="hover:bg-gray-50/80 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($c['name']); ?>&background=eff6ff&color=1d4ed8"
                                 alt="<?php echo htmlspecialchars($c['name']); ?>"
                                 class="w-10 h-10 rounded-full border border-gray-200 shrink-0">
                            <div>
                                <a href="candidate_profile.php" class="font-bold text-gray-900 hover:text-blue-700 transition-colors">
                                    <?php echo htmlspecialchars($c['name']); ?>
                                </a>
                                <p class="text-xs text-gray-400 mt-0.5"><?php echo htmlspecialchars($c['email']); ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div>
                            <p class="font-semibold text-gray-800"><?php echo htmlspecialchars($c['role']); ?></p>
                            <p class="text-xs text-gray-400 mt-0.5"><?php echo $c['exp']; ?> năm kinh nghiệm</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold <?php echo $c['statusClass']; ?>">
                            <?php echo htmlspecialchars($c['status']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1.5">
                            <?php foreach (array_slice($c['skills'], 0, 2) as $skill): ?>
                            <span class="px-2 py-0.5 rounded-lg bg-blue-50 text-blue-700 text-xs font-semibold border border-blue-100">
                                <?php echo htmlspecialchars($skill); ?>
                            </span>
                            <?php endforeach; ?>
                            <?php if (count($c['skills']) > 2): ?>
                            <span class="px-2 py-0.5 rounded-lg bg-gray-100 text-gray-500 text-xs font-semibold">
                                +<?php echo count($c['skills']) - 2; ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-xs text-gray-400"><?php echo $c['updated']; ?></span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="candidate_profile.php"
                           class="opacity-0 group-hover:opacity-100 transition-opacity px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg text-xs font-bold">
                            Xem hồ sơ
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
        <p class="text-sm text-gray-500">Hiển thị <span class="font-bold text-gray-900">9</span> / <span class="font-bold text-gray-900">73</span> ứng viên</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 text-sm font-medium disabled:opacity-40" disabled>
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-3 py-2 rounded-lg bg-blue-700 text-white text-sm font-bold">1</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm font-medium">2</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm font-medium">3</button>
            <span class="text-gray-400">...</span>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm font-medium">8</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 text-sm font-medium">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
