<?php
$page = 'calendar';
include 'includes/header.php';
?>

<div class="space-y-6">
    <!-- Top bar -->
    <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-3xl font-black text-gray-900">Lịch Phỏng vấn</h1>
                <div class="flex items-center gap-2 ml-3">
                    <button type="button" class="px-3 py-1.5 text-sm rounded-lg bg-blue-700 text-white font-semibold">Tháng</button>
                    <button type="button" class="px-3 py-1.5 text-sm rounded-lg bg-gray-100 text-gray-600 font-semibold hover:bg-gray-200">Tuần</button>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Tìm kiếm ứng viên..." class="pl-11 pr-4 py-3 w-72 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="button" onclick="openScheduleModal()" class="px-5 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold shadow-sm">
                <i class="fas fa-calendar-plus mr-2"></i> Đặt lịch phỏng vấn
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
        <!-- Left sidebar small -->
        <div class="xl:col-span-2 space-y-5">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-3">Tải trọng người phỏng vấn</h3>
                <div class="text-sm text-gray-500 mb-4">75% nhân sự đang sẵn sàng tuần này</div>

                <div class="flex items-center gap-3 p-3 rounded-xl bg-blue-50">
                    <div class="w-10 h-10 rounded-full bg-blue-200 text-blue-700 flex items-center justify-center font-bold">M</div>
                    <div>
                        <p class="font-bold text-gray-900 text-sm">Marcus Chen</p>
                        <p class="text-xs text-gray-500">Chuyên viên tuyển dụng C...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar main -->
        <div class="xl:col-span-7 bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-4">
                    <h2 class="text-2xl font-black text-gray-900">Tháng 10, 2026</h2>
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="changeMonth('prev')" class="w-8 h-8 rounded-lg border border-gray-200 hover:bg-gray-50 flex items-center justify-center">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                        <button type="button" onclick="changeMonth('next')" class="w-8 h-8 rounded-lg border border-gray-200 hover:bg-gray-50 flex items-center justify-center">
                            <i class="fas fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-4 text-xs font-semibold text-gray-500">
                    <span class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>Vòng cuối</span>
                    <span class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>Sơ loại</span>
                    <span class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-orange-400"></span>Kỹ thuật</span>
                </div>
            </div>

            <!-- Week headers -->
            <div class="grid grid-cols-7 text-center text-xs font-bold text-gray-400 mb-2">
                <div class="py-2">CN</div>
                <div class="py-2">T2</div>
                <div class="py-2">T3</div>
                <div class="py-2">T4</div>
                <div class="py-2">T5</div>
                <div class="py-2">T6</div>
                <div class="py-2">T7</div>
            </div>

            <!-- Calendar grid -->
            <div class="grid grid-cols-7 border border-gray-100 rounded-2xl overflow-hidden">
                <?php
                $days = [
                    24,25,26,27,28,29,30,
                    1,2,3,4,5,6,7,
                    8,9,10,11,12,13,14,
                    15,16,17,18,19,20,21
                ];

                foreach ($days as $index => $day):
                    $isPrevMonth = $index < 7;
                    $classes = $isPrevMonth ? 'text-gray-300 bg-gray-50' : 'text-gray-800 bg-white';
                ?>
                    <div class="min-h-[120px] border border-gray-100 p-2 relative <?php echo $classes; ?>">
                        <div class="text-sm font-bold mb-2"><?php echo $day; ?></div>

                        <?php if ($day == 5): ?>
                            <div onclick="viewEvent('Phỏng vấn James Miller - 8:00 AM')" class="cursor-pointer mb-1 text-[11px] rounded-md px-2 py-1 bg-blue-100 text-blue-700 font-semibold">
                                8:00 - James M.
                            </div>
                            <div onclick="viewEvent('Phỏng vấn Linda Sterling - 4:00 PM')" class="cursor-pointer mb-1 text-[11px] rounded-md px-2 py-1 bg-green-100 text-green-700 font-semibold">
                                4:00 - Sarah Co.
                            </div>
                            <div onclick="viewEvent('Phỏng vấn kỹ thuật - 9:00 AM')" class="cursor-pointer text-[11px] rounded-md px-2 py-1 bg-emerald-100 text-emerald-700 font-semibold">
                                9:00 - Nhóm kỹ...
                            </div>
                        <?php endif; ?>

                        <?php if ($day == 11): ?>
                            <div onclick="viewEvent('Phỏng vấn kỹ thuật Backend - 11:00 AM')" class="cursor-pointer text-[11px] rounded-md px-2 py-1 bg-orange-100 text-orange-700 font-semibold">
                                11:00 - B.J. kỹ...
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Right sidebar -->
        <div class="xl:col-span-3 space-y-5">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-black text-gray-900">Chờ lên lịch</h3>
                    <span class="text-xs text-gray-400 font-semibold">Ứng viên đang chờ</span>
                </div>

                <div class="space-y-4">
                    <div class="p-4 rounded-xl bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold">JM</div>
                                <div>
                                    <p class="font-bold text-gray-900">James Miller</p>
                                    <p class="text-xs text-gray-500">Thực tập UX cao cấp</p>
                                </div>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700 font-bold">Vòng cuối</span>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <button type="button" onclick="openScheduleModal('James Miller')" class="text-blue-700 font-bold text-sm hover:underline">Lên lịch</button>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center font-bold">LS</div>
                                <div>
                                    <p class="font-bold text-gray-900">Linda Sterling</p>
                                    <p class="text-xs text-gray-500">Kỹ sư iOS</p>
                                </div>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 font-bold">Kỹ thuật</span>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <button type="button" onclick="openScheduleModal('Linda Sterling')" class="text-blue-700 font-bold text-sm hover:underline">Lên lịch</button>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-700 flex items-center justify-center font-bold">BT</div>
                                <div>
                                    <p class="font-bold text-gray-900">Brian Taylor</p>
                                    <p class="text-xs text-gray-500">Chuyên viên Sales</p>
                                </div>
                            </div>
                            <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-600 font-bold">Mới</span>
                        </div>
                        <div class="mt-3 flex justify-end">
                            <button type="button" onclick="openScheduleModal('Brian Taylor')" class="text-blue-700 font-bold text-sm hover:underline">Lên lịch</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-4">Tình trạng nhân sự hôm nay</h3>

                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50">
                        <span class="font-semibold text-gray-700">Sarah Jennings</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">Đang rảnh</span>
                    </div>

                    <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50">
                        <span class="font-semibold text-gray-700">Mark Wilson</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">Đang bận</span>
                    </div>
                </div>

                <button type="button" onclick="showAllSlots()" class="w-full mt-4 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold">
                    Xem tất cả lịch trống
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="scheduleModal" class="fixed inset-0 bg-black/40 hidden z-50 items-center justify-center p-4">
    <div class="bg-white w-full max-w-lg rounded-2xl shadow-xl p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-2xl font-black text-gray-900">Đặt lịch phỏng vấn</h3>
            <button type="button" onclick="closeScheduleModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Ứng viên</label>
                <input id="scheduleCandidate" type="text" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập tên ứng viên">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ngày</label>
                    <input id="scheduleDate" type="date" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Giờ</label>
                    <input id="scheduleTime" type="time" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Hình thức</label>
                <select id="scheduleType" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Online - Google Meet</option>
                    <option>Offline - Văn phòng</option>
                    <option>Phone Screening</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Người phỏng vấn</label>
                <select id="scheduleInterviewer" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Sarah Jennings</option>
                    <option>Mark Wilson</option>
                    <option>Mike Rose</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <button type="button" onclick="closeScheduleModal()" class="px-5 py-3 rounded-xl border border-gray-200 font-semibold hover:bg-gray-50">Hủy</button>
            <button type="button" onclick="saveSchedule()" class="px-5 py-3 rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-bold">Lưu lịch</button>
        </div>
    </div>
</div>

<script>
function openScheduleModal(candidateName = '') {
    document.getElementById('scheduleCandidate').value = candidateName;
    const modal = document.getElementById('scheduleModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeScheduleModal() {
    const modal = document.getElementById('scheduleModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function saveSchedule() {
    const name = document.getElementById('scheduleCandidate').value || 'Ứng viên';
    const date = document.getElementById('scheduleDate').value || 'chưa chọn ngày';
    const time = document.getElementById('scheduleTime').value || 'chưa chọn giờ';
    const type = document.getElementById('scheduleType').value || '';
    const interviewer = document.getElementById('scheduleInterviewer').value || '';

    alert(`Đã tạo lịch phỏng vấn\nỨng viên: ${name}\nNgày: ${date}\nGiờ: ${time}\nHình thức: ${type}\nNgười phỏng vấn: ${interviewer}`);
    closeScheduleModal();
}

function viewEvent(eventName) {
    alert('Chi tiết lịch: ' + eventName);
}

function showAllSlots() {
    alert('Demo: Hiển thị tất cả khung giờ còn trống.');
}

function changeMonth(direction) {
    if (direction === 'prev') {
        alert('Demo: Chuyển sang tháng trước');
    } else {
        alert('Demo: Chuyển sang tháng sau');
    }
}
</script>

<?php include 'includes/footer.php'; ?>