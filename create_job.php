<?php
$page = 'jobs';
include 'includes/header.php';

$currentRole = $_SESSION["role"] ?? "hr";

if ($currentRole === "manager") {
    header("Location: jobs.php");
    exit;
}
?>

<div class="mb-8">
    <a href="jobs.php" class="inline-flex items-center text-blue-700 font-bold text-sm mb-4">
        <i class="fas fa-arrow-left mr-2"></i> Quay lại danh sách vị trí
    </a>

    <h1 class="text-3xl font-black text-gray-900">Tạo yêu cầu tuyển dụng</h1>
    <p class="text-gray-500 mt-2">Điền thông tin vị trí tuyển dụng để gửi Hiring Manager phê duyệt.</p>
</div>

<form class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-5xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Tên vị trí</label>
            <input name="job_title" type="text" value="Senior Frontend Developer" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Phòng ban</label>
            <select name="department" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                <option>Engineering</option>
                <option>Design</option>
                <option>Marketing</option>
                <option>Sales</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Hiring Manager</label>
            <select name="manager" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                <option>Hiring Manager</option>
                <option>Nguyễn Văn B</option>
                <option>Trần Thị C</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Số lượng cần tuyển</label>
            <input name="headcount" type="number" value="2" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Mức lương</label>
            <input name="salary" type="text" value="25 - 35 triệu" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Hạn tuyển dụng</label>
            <input name="deadline" type="date" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
        </div>
    </div>

    <div class="mt-6">
        <label class="block text-sm font-bold text-gray-700 mb-2">Mô tả công việc</label>
        <textarea name="description" rows="5" class="w-full px-4 py-3 border border-gray-200 rounded-xl">Phát triển giao diện web, phối hợp với Product Designer và Backend Developer để xây dựng sản phẩm tuyển dụng nội bộ.</textarea>
    </div>

    <div class="mt-6">
        <label class="block text-sm font-bold text-gray-700 mb-2">Yêu cầu kỹ năng</label>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <label class="p-4 rounded-xl bg-gray-50 border border-gray-100 font-semibold">
                <input type="checkbox" checked class="mr-2 accent-blue-700"> HTML/CSS
            </label>

            <label class="p-4 rounded-xl bg-gray-50 border border-gray-100 font-semibold">
                <input type="checkbox" checked class="mr-2 accent-blue-700"> JavaScript
            </label>

            <label class="p-4 rounded-xl bg-gray-50 border border-gray-100 font-semibold">
                <input type="checkbox" checked class="mr-2 accent-blue-700"> React/Vue
            </label>

            <label class="p-4 rounded-xl bg-gray-50 border border-gray-100 font-semibold">
                <input type="checkbox" class="mr-2 accent-blue-700"> PHP
            </label>

            <label class="p-4 rounded-xl bg-gray-50 border border-gray-100 font-semibold">
                <input type="checkbox" class="mr-2 accent-blue-700"> UI/UX
            </label>

            <label class="p-4 rounded-xl bg-gray-50 border border-gray-100 font-semibold">
                <input type="checkbox" class="mr-2 accent-blue-700"> Teamwork
            </label>
        </div>
    </div>

    <div class="mt-8 flex justify-end gap-4 border-t border-gray-100 pt-6">
        <a href="jobs.php" class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-bold hover:bg-gray-200">Hủy</a>
        <button type="button" class="px-6 py-3 rounded-xl bg-blue-50 text-blue-700 font-bold hover:bg-blue-100">Lưu nháp</button>
        <button type="submit" class="px-8 py-3 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">Gửi phê duyệt</button>
    </div>
</form>

<?php include 'includes/footer.php'; ?>