<?php
$page = 'candidate';
include 'includes/header.php';
?>

<div class="space-y-6">
    <!-- Top breadcrumb -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2 text-sm text-gray-400">
            <a href="candidates.php" class="hover:text-blue-600">Danh sách ứng viên</a>
            <span>/</span>
            <span class="text-gray-700 font-semibold">Hồ sơ John Doe</span>
        </div>

        <div class="flex items-center gap-3">
            <button type="button" onclick="openNotification()" class="relative text-gray-500 hover:text-blue-600">
                <i class="fas fa-bell text-lg"></i>
                <span class="absolute -top-2 -right-2 text-[10px] w-5 h-5 rounded-full bg-red-500 text-white flex items-center justify-center">1</span>
            </button>

            <div class="w-9 h-9 rounded-full bg-orange-200 flex items-center justify-center text-sm font-bold text-orange-800">
                JD
            </div>
        </div>
    </div>

    <!-- Main profile card -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
        <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-5">
            <div class="flex gap-4">
                <div class="w-20 h-20 rounded-2xl overflow-hidden bg-slate-200 shrink-0">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=300&auto=format&fit=crop" alt="John Doe" class="w-full h-full object-cover">
                </div>

                <div>
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="text-3xl font-black text-gray-900">John Doe</h1>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">ĐANG HOẠT ĐỘNG</span>
                    </div>

                    <p class="text-gray-500 mt-1 font-medium">Kỹ sư Full Stack Cao cấp</p>

                    <div class="flex flex-wrap items-center gap-x-5 gap-y-2 mt-3 text-sm text-gray-500">
                        <span><i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>San Francisco, CA</span>
                        <span><i class="fas fa-briefcase mr-2 text-blue-500"></i>8+ năm kinh nghiệm</span>
                        <span><i class="fas fa-envelope mr-2 text-blue-500"></i>john.doe@example.com</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="button"
                        onclick="downloadCV()"
                        class="px-4 py-3 bg-white border border-gray-200 rounded-xl font-semibold hover:bg-gray-50">
                    <i class="fas fa-download mr-2"></i> Tải CV
                </button>

                <button type="button"
                        onclick="openInterviewModal('John Doe')"
                        class="px-5 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-xl font-bold shadow-sm">
                    <i class="fas fa-calendar-plus mr-2"></i> Lên lịch phỏng vấn
                </button>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
        <!-- Left -->
        <div class="xl:col-span-3 space-y-5">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-4">Kỹ năng cốt lõi</h3>
                <div class="flex flex-wrap gap-2">
                    <?php
                    $skills = ['React', 'Node.js', 'TypeScript', 'AWS', 'Next.js', 'GraphQL', 'Docker', 'PostgreSQL'];
                    foreach ($skills as $skill):
                    ?>
                        <span class="px-3 py-2 rounded-xl bg-blue-50 text-blue-700 text-sm font-semibold"><?php echo $skill; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-4">Thẻ ứng viên</h3>
                <div class="space-y-2">
                    <button type="button" onclick="demoTag('Cựu nhân viên Google')" class="w-full text-left px-4 py-2 rounded-xl bg-gray-50 hover:bg-blue-50 text-gray-700 font-medium">Cựu nhân viên Google</button>
                    <button type="button" onclick="demoTag('Sẵn sàng làm từ xa')" class="w-full text-left px-4 py-2 rounded-xl bg-gray-50 hover:bg-blue-50 text-gray-700 font-medium">Sẵn sàng làm từ xa</button>
                    <button type="button" onclick="demoTag('Hiệu suất cao')" class="w-full text-left px-4 py-2 rounded-xl bg-gray-50 hover:bg-blue-50 text-gray-700 font-medium">Hiệu suất cao</button>
                    <button type="button" onclick="addNewTag()" class="w-full text-left px-4 py-2 rounded-xl border border-dashed border-gray-300 hover:border-blue-500 text-blue-700 font-semibold">
                        <i class="fas fa-plus mr-2"></i> Thêm thẻ
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-4">Trạng thái sẵn sàng</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Thời gian thông báo</span>
                        <span class="font-bold text-gray-800">2 tuần</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Chuyển nơi ở</span>
                        <span class="font-bold text-gray-800">Có</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Giấy phép lao động</span>
                        <span class="font-bold text-gray-800">Công dân Mỹ</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center -->
        <div class="xl:col-span-6 space-y-5">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-xl font-black text-gray-900 mb-5">Kinh nghiệm làm việc</h2>

                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-2">
                                <div>
                                    <h3 class="font-black text-gray-900">Kỹ sư Phần mềm Cao cấp</h3>
                                    <p class="text-blue-700 font-semibold">Google • Nhóm Nền tảng Đám mây</p>
                                </div>
                                <span class="text-sm text-gray-400 font-medium">2020 - Hiện tại</span>
                            </div>
                            <p class="text-gray-500 mt-2 leading-7">
                                Dẫn dắt việc chuyển đổi các công cụ nội bộ lỗi thời sang kiến trúc micro-services.
                                Quản lý nhóm 4 kỹ sư và giảm 35% độ trễ API.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-2">
                                <div>
                                    <h3 class="font-black text-gray-900">Lập trình viên Full Stack</h3>
                                    <p class="text-purple-700 font-semibold">Stripe • Nền Dashboard</p>
                                </div>
                                <span class="text-sm text-gray-400 font-medium">2017 - 2020</span>
                            </div>
                            <p class="text-gray-500 mt-2 leading-7">
                                Phát triển các bảng điều khiển trực quan hóa tài chính phức tạp bằng React.
                                Tối ưu hóa hiệu suất backend Node.js thêm 40%.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-xl font-black text-gray-900 mb-5">Học vấn</h2>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center shrink-0">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-2">
                                <div>
                                    <h3 class="font-black text-gray-900">Thạc sĩ Khoa học Máy tính</h3>
                                    <p class="text-green-700 font-semibold">Đại học Stanford</p>
                                </div>
                                <span class="text-sm text-gray-400 font-medium">2015 - 2017</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-xl font-black text-gray-900">Xem trước CV</h2>
                    <button type="button" onclick="openCvPreview()" class="text-sm text-blue-700 font-bold hover:underline">
                        <i class="fas fa-expand mr-2"></i>Toàn màn hình
                    </button>
                </div>


                <div onclick="openCvPreview()" class="cursor-pointer border border-gray-200 shadow-sm rounded-2xl bg-white p-6 hover:shadow-md transition group relative overflow-hidden">
                    <!-- Mock CV -->
                    <div class="border-b-2 border-gray-800 pb-4 mb-4">
                        <h1 class="text-2xl font-black text-gray-900 leading-none">John Doe</h1>
                        <p class="text-blue-700 font-semibold text-sm mt-1">Senior Full Stack Developer</p>
                        <div class="flex flex-wrap gap-3 text-[11px] text-gray-500 mt-2">
                            <span><i class="fas fa-envelope mr-1"></i>john.doe@example.com</span>
                            <span><i class="fas fa-phone mr-1"></i>+1 415 555 0192</span>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-[10px] font-black uppercase tracking-widest text-gray-400 border-b border-gray-100 pb-1 mb-2">Summary</h3>
                            <p class="text-[11px] leading-relaxed text-gray-600">Senior Full Stack Developer with 8+ years of experience. Led teams of 4-6 engineers and reduced API latency by 35% at Google.</p>
                        </div>
                        <div>
                            <h3 class="text-[10px] font-black uppercase tracking-widest text-gray-400 border-b border-gray-100 pb-1 mb-2">Experience</h3>
                            <div class="mb-2">
                                <div class="flex justify-between"><p class="text-[11px] font-black">Senior Software Engineer</p><span class="text-[10px] text-gray-400">2020–Now</span></div>
                                <p class="text-[11px] text-blue-600 font-semibold">Google • Cloud Platform</p>
                                <ul class="list-disc list-inside text-[10px] text-gray-600 mt-1 space-y-0.5">
                                    <li>Migrated monolith to microservices</li>
                                    <li>Reduced API latency by 35%</li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex justify-between"><p class="text-[11px] font-black">Full Stack Developer</p><span class="text-[10px] text-gray-400">2017–2020</span></div>
                                <p class="text-[11px] text-purple-600 font-semibold">Stripe • Dashboard</p>
                                <ul class="list-disc list-inside text-[10px] text-gray-600 mt-1 space-y-0.5">
                                    <li>Built dashboards with React & D3.js</li>
                                    <li>Optimized Node.js backend by 40%</li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-[10px] font-black uppercase tracking-widest text-gray-400 border-b border-gray-100 pb-1 mb-2">Education</h3>
                            <div class="flex justify-between"><p class="text-[11px] font-black">M.S. Computer Science</p><span class="text-[10px] text-gray-400">2015–2017</span></div>
                            <p class="text-[11px] text-green-600 font-semibold">Stanford University</p>
                        </div>
                        <div>
                            <h3 class="text-[10px] font-black uppercase tracking-widest text-gray-400 border-b border-gray-100 pb-1 mb-2">Skills</h3>
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded">React</span>
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded">Node.js</span>
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded">TypeScript</span>
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded">AWS</span>
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded">Docker</span>
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-[10px] font-bold rounded">PostgreSQL</span>
                            </div>
                        </div>
                    </div>
                    <!-- Hover overlay -->
                    <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-[1px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl">
                        <span class="px-5 py-2.5 bg-white rounded-xl shadow-lg text-sm font-bold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-expand"></i> Mở rộng
                        </span>
                    </div>
                </div>
                <div class="mt-3 flex items-center justify-between px-1">
                    <span class="text-xs text-gray-400 flex items-center gap-1.5">
                        <i class="far fa-file-pdf text-red-400"></i> Resume_John_Doe_2024.pdf
                    </span>
                    <button onclick="downloadCV()" class="text-xs font-bold text-blue-600 hover:text-blue-800 flex items-center gap-1">
                        <i class="fas fa-download"></i> Tải về
                    </button>
                </div>
            </div>
        </div>

        <!-- Right -->
        <div class="xl:col-span-3 space-y-5">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-4">Bảng điểm phỏng vấn</h3>

                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-semibold text-gray-700">Kỹ năng chuyên môn</span>
                            <span class="font-black text-blue-700">4.8/5.0</span>
                        </div>
                        <div class="h-2 rounded-full bg-gray-100 overflow-hidden">
                            <div class="h-full bg-blue-600 rounded-full" style="width:96%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-semibold text-gray-700">Giao tiếp</span>
                            <span class="font-black text-blue-700">4.2/5.0</span>
                        </div>
                        <div class="h-2 rounded-full bg-gray-100 overflow-hidden">
                            <div class="h-full bg-indigo-500 rounded-full" style="width:84%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="font-semibold text-gray-700">Văn hóa</span>
                            <span class="font-black text-blue-700">4.5/5.0</span>
                        </div>
                        <div class="h-2 rounded-full bg-gray-100 overflow-hidden">
                            <div class="h-full bg-green-500 rounded-full" style="width:90%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-4">Ghi chú gần đây</h3>
                <div class="space-y-4">
                    <div class="p-4 rounded-xl bg-gray-50">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-comment-dots text-green-600"></i>
                            <span class="font-bold text-sm">Sarah Jenkins</span>
                        </div>
                        <p class="text-sm text-gray-500 leading-6">
                            Có thể giải quyết vấn đề thực tế rất tốt. Nên chuyển nhanh qua vòng Senior.
                        </p>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-edit text-blue-600"></i>
                            <span class="font-bold text-sm">Mike Rose</span>
                        </div>
                        <p class="text-sm text-gray-500 leading-6">
                            Kiến thức hệ thống vững. Cần hỏi sâu hơn về khả năng làm việc liên chức năng.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h3 class="text-sm font-black uppercase tracking-wide text-gray-400 mb-4">Đồng đội đang tương tác</h3>
                <div class="space-y-4">
                    <div class="p-4 rounded-xl bg-gray-50">
                        <p class="font-bold text-gray-900">Phỏng vấn kỹ thuật</p>
                        <p class="text-sm text-gray-400 mt-1">Hôm nay, 10:30 AM</p>
                    </div>
                    <div class="p-4 rounded-xl bg-gray-50">
                        <p class="font-bold text-gray-900">Đã xem hồ sơ cùng HR</p>
                        <p class="text-sm text-gray-400 mt-1">Hôm qua, 04:00 PM</p>
                    </div>
                    <div class="p-4 rounded-xl bg-gray-50">
                        <p class="font-bold text-gray-900">Ứng tuyển nội bộ</p>
                        <p class="text-sm text-gray-400 mt-1">5 ngày trước</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Interview modal -->
<div id="interviewModal" class="fixed inset-0 bg-black/40 hidden z-50 items-center justify-center p-4">
    <div class="bg-white w-full max-w-lg rounded-2xl shadow-xl p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-2xl font-black text-gray-900">Lên lịch phỏng vấn</h3>
            <button type="button" onclick="closeInterviewModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Ứng viên</label>
                <input id="candidateNameInput" type="text" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" value="John Doe">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ngày</label>
                    <input id="interviewDateInput" type="date" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Giờ</label>
                    <input id="interviewTimeInput" type="time" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Người phỏng vấn</label>
                <select id="interviewerInput" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Sarah Jenkins</option>
                    <option>Mike Rose</option>
                    <option>Linda Sterling</option>
                    <option>Brian Taylor</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Ghi chú</label>
                <textarea id="interviewNoteInput" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập ghi chú..."></textarea>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <button type="button" onclick="closeInterviewModal()" class="px-5 py-3 rounded-xl border border-gray-200 font-semibold hover:bg-gray-50">Hủy</button>
            <button type="button" onclick="saveInterview()" class="px-5 py-3 rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-bold">Lưu lịch</button>
        </div>
    </div>
</div>

<!-- CV Preview Modal -->
<div id="cvPreviewModal" class="fixed inset-0 bg-black/50 hidden z-50 items-center justify-center p-4">
    <div class="bg-white w-full max-w-4xl rounded-2xl shadow-xl p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-2xl font-black text-gray-900">Resume_John_Doe_2024.pdf</h3>
            <button type="button" onclick="closeCvPreview()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <div class="border-2 border-dashed border-gray-200 rounded-2xl min-h-[620px] flex flex-col items-center justify-center bg-gray-50">
            <i class="far fa-file-pdf text-6xl text-red-400 mb-4"></i>
            <p class="text-xl font-bold text-gray-700">Xem trước CV</p>
            <p class="text-gray-400 mt-2">Bản demo giao diện - chưa kết nối file PDF thật</p>
        </div>
    </div>
</div>

<script>
function openInterviewModal(candidateName = 'John Doe') {
    document.getElementById('candidateNameInput').value = candidateName;
    const modal = document.getElementById('interviewModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeInterviewModal() {
    const modal = document.getElementById('interviewModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function saveInterview() {
    const name = document.getElementById('candidateNameInput').value || 'Ứng viên';
    const date = document.getElementById('interviewDateInput').value || 'chưa chọn ngày';
    const time = document.getElementById('interviewTimeInput').value || 'chưa chọn giờ';
    const interviewer = document.getElementById('interviewerInput').value || 'chưa chọn người phỏng vấn';

    alert(`Đã lên lịch phỏng vấn cho ${name}\nNgày: ${date}\nGiờ: ${time}\nInterviewer: ${interviewer}`);
    closeInterviewModal();
}

function openCvPreview() {
    const modal = document.getElementById('cvPreviewModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeCvPreview() {
    const modal = document.getElementById('cvPreviewModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function downloadCV() {
    alert('Demo: Tải CV của John Doe');
}

function demoTag(tag) {
    alert('Đã chọn thẻ: ' + tag);
}

function addNewTag() {
    const newTag = prompt('Nhập tên thẻ mới:');
    if (newTag && newTag.trim() !== '') {
        alert('Đã thêm thẻ mới: ' + newTag);
    }
}

function openNotification() {
    alert('Bạn có 1 thông báo mới từ hệ thống.');
}
</script>

<?php include 'includes/footer.php'; ?>