<?php
$page = 'kanban';
include 'includes/header.php';

$currentRole = $_SESSION["role"] ?? "hr";

if ($currentRole === "manager") {
    header("Location: candidate_profile.php");
    exit;
}
?>

<div class="mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
            Bảng Kanban:
            <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-md border border-blue-200">Đang tuyển</span>
        </h1>
        <p class="text-sm text-gray-500 mt-1">Quản lý quy trình ứng viên bằng cách kéo thả giữa các cột.</p>
    </div>
    <div class="flex items-center gap-3 w-full sm:w-auto">
        <div class="relative flex-1 sm:w-64">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
            <input type="text" placeholder="Tìm ứng viên..." class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none transition-all">
        </div>
        <button class="bg-white border border-gray-300 text-gray-700 p-2 rounded-lg hover:bg-gray-50 transition-colors" title="Bộ lọc">
            <i class="fas fa-filter"></i>
        </button>
        <button class="px-4 py-2 bg-blue-700 hover:bg-blue-800 text-white rounded-lg text-sm font-semibold transition-colors flex items-center gap-2 shadow-sm">
            <i class="fas fa-plus"></i> Thêm ứng viên
        </button>
    </div>
</div>

<div class="flex gap-5 overflow-x-auto pb-4 min-h-[calc(100vh-220px)] items-start">

    <!-- Cột 1: Nộp hồ sơ -->
    <div class="kanban-column w-72 flex-shrink-0 bg-gray-100/50 rounded-xl flex flex-col max-h-full border border-gray-200">
        <div class="p-3 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-xl">
            <h3 class="font-semibold text-gray-700 text-sm flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-blue-500"></div> Nộp hồ sơ
            </h3>
            <span class="kanban-count bg-gray-200 text-gray-600 text-xs font-bold px-2 py-0.5 rounded-full">3</span>
        </div>

        <div class="kanban-drop-zone p-3 flex-1 overflow-y-auto space-y-3 min-h-[60px] transition-colors rounded-b-xl">
            <!-- Card: Maya Patel -->
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex justify-between items-start mb-2">
                    <span class="bg-purple-50 text-purple-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider border border-purple-100">Mới</span>
                    <button class="text-gray-400 hover:text-gray-700 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fas fa-ellipsis-h"></i></button>
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="https://ui-avatars.com/api/?name=Maya+Patel&background=random" alt="Maya Patel" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Maya Patel</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Frontend Developer</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[10px] font-bold border border-blue-100">React</span>
                    <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-bold border border-purple-100">TypeScript</span>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span class="flex items-center gap-1"><i class="far fa-clock"></i> 2 giờ trước</span>
                    <span class="text-green-600 font-medium"><i class="fas fa-paperclip"></i> CV.pdf</span>
                </div>
            </div>

            <!-- Card: Lê Văn C -->
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex items-center gap-3 mb-3 mt-1">
                    <img src="https://ui-avatars.com/api/?name=Le+Van+C&background=random" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Lê Văn C</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Frontend Developer</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[10px] font-bold border border-blue-100">Vue.js</span>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span class="flex items-center gap-1"><i class="far fa-clock"></i> Hôm qua</span>
                </div>
            </div>

            <!-- Card: Trần Thị B -->
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex items-center gap-3 mb-3 mt-1">
                    <img src="https://ui-avatars.com/api/?name=Tran+Thi+B&background=random" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Trần Thị B</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Frontend Developer</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-bold border border-purple-100">UI/UX</span>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span class="flex items-center gap-1"><i class="far fa-clock"></i> 3 ngày trước</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột 2: Sàng lọc -->
    <div class="kanban-column w-72 flex-shrink-0 bg-gray-100/50 rounded-xl flex flex-col max-h-full border border-gray-200">
        <div class="p-3 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-xl">
            <h3 class="font-semibold text-gray-700 text-sm flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-indigo-500"></div> Sàng lọc
            </h3>
            <span class="kanban-count bg-gray-200 text-gray-600 text-xs font-bold px-2 py-0.5 rounded-full">2</span>
        </div>

        <div class="kanban-drop-zone p-3 flex-1 overflow-y-auto space-y-3 min-h-[60px] transition-colors rounded-b-xl">
            <!-- Card: Nguyễn Minh -->
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex justify-between items-start mb-2">
                    <span class="bg-indigo-50 text-indigo-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider border border-indigo-100">Đang xem xét</span>
                    <button class="text-gray-400 hover:text-gray-700 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fas fa-ellipsis-h"></i></button>
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="https://ui-avatars.com/api/?name=Nguyen+Minh&background=random" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Nguyễn Minh</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Frontend Developer</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[10px] font-bold border border-blue-100">React</span>
                    <span class="px-2 py-0.5 rounded-md bg-green-50 text-green-700 text-[10px] font-bold border border-green-100">Node.js</span>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span class="flex items-center gap-1"><i class="far fa-clock"></i> 1 ngày trước</span>
                    <span class="text-green-600 font-medium"><i class="fas fa-paperclip"></i> CV.pdf</span>
                </div>
            </div>

            <!-- Card: Hoàng Anh -->
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex items-center gap-3 mb-3 mt-1">
                    <img src="https://ui-avatars.com/api/?name=Hoang+Anh&background=random" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Hoàng Anh</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Frontend Developer</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <span class="px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 text-[10px] font-bold border border-purple-100">UI</span>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span class="flex items-center gap-1"><i class="far fa-clock"></i> 2 ngày trước</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột 3: Phỏng vấn -->
    <div class="kanban-column w-72 flex-shrink-0 bg-gray-100/50 rounded-xl flex flex-col max-h-full border border-gray-200">
        <div class="p-3 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-xl">
            <h3 class="font-semibold text-gray-700 text-sm flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-yellow-500"></div> Phỏng vấn
            </h3>
            <span class="kanban-count bg-gray-200 text-gray-600 text-xs font-bold px-2 py-0.5 rounded-full">2</span>
        </div>

        <div class="kanban-drop-zone p-3 flex-1 overflow-y-auto space-y-3 min-h-[60px] transition-colors rounded-b-xl">
            <!-- Card: Tuấn Anh -->
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex justify-between items-start mb-2">
                    <span class="bg-yellow-50 text-yellow-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider border border-yellow-100">Sắp PV</span>
                    <button class="text-gray-400 hover:text-gray-700 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fas fa-ellipsis-h"></i></button>
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="https://ui-avatars.com/api/?name=Tuan+Anh&background=random" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Tuấn Anh</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Frontend Developer</p>
                    </div>
                </div>
                <div class="bg-blue-50 text-blue-700 rounded text-xs p-2 mb-2 flex items-center gap-2 font-medium">
                    <i class="fas fa-calendar-alt"></i> 10:00, 30/04/2026
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span>Interviewer: H.Manager</span>
                </div>
            </div>

            <!-- Card: Sarah Lee -->
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex items-center gap-3 mb-3 mt-1">
                    <img src="https://ui-avatars.com/api/?name=Sarah+Lee&background=random" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Sarah Lee</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Middle Developer</p>
                    </div>
                </div>
                <div class="bg-blue-50 text-blue-700 rounded text-xs p-2 mb-2 flex items-center gap-2 font-medium">
                    <i class="fas fa-calendar-alt"></i> 14:00, 01/05/2026
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span>Interviewer: H.Manager</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột 4: Offer -->
    <div class="kanban-column w-72 flex-shrink-0 bg-gray-100/50 rounded-xl flex flex-col max-h-full border border-gray-200">
        <div class="p-3 border-b border-gray-200 flex justify-between items-center bg-gray-50 rounded-t-xl">
            <h3 class="font-semibold text-gray-700 text-sm flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-orange-500"></div> Thương lượng (Offer)
            </h3>
            <span class="kanban-count bg-gray-200 text-gray-600 text-xs font-bold px-2 py-0.5 rounded-full">1</span>
        </div>
        <div class="kanban-drop-zone p-3 flex-1 overflow-y-auto space-y-3 min-h-[60px] transition-colors rounded-b-xl">
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-gray-200 cursor-grab hover:border-blue-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex justify-between items-start mb-2">
                    <span class="bg-green-50 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider border border-green-100">Đã gửi Offer</span>
                    <button class="text-gray-400 hover:text-gray-700 opacity-0 group-hover:opacity-100 transition-opacity"><i class="fas fa-ellipsis-h"></i></button>
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="https://ui-avatars.com/api/?name=Pham+Quoc+Huy&background=random" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Phạm Quốc Huy</a>
                        </h4>
                        <div class="flex text-yellow-400 text-[10px] mt-1">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span class="flex items-center gap-1"><i class="fas fa-envelope"></i> Chờ phản hồi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cột 5: Đã tuyển -->
    <div class="kanban-column w-72 flex-shrink-0 bg-gray-100/50 rounded-xl flex flex-col max-h-full border border-green-200 border-dashed">
        <div class="p-3 border-b border-gray-200 flex justify-between items-center bg-green-50/50 rounded-t-xl">
            <h3 class="font-semibold text-green-700 text-sm flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-green-500"></div> Đã nhận việc
            </h3>
            <span class="kanban-count bg-white text-green-600 text-xs font-bold px-2 py-0.5 rounded-full border border-green-100">1</span>
        </div>
        <div class="kanban-drop-zone p-3 flex-1 overflow-y-auto space-y-3 min-h-[60px] transition-colors rounded-b-xl">
            <div class="kanban-card bg-white p-3.5 rounded-lg shadow-sm border border-green-100 cursor-grab hover:border-green-300 hover:shadow-md transition-all group" draggable="true">
                <div class="flex justify-between items-start mb-2">
                    <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase tracking-wider border border-green-200">Đã nhận</span>
                </div>
                <div class="flex items-center gap-3 mb-3">
                    <img src="https://ui-avatars.com/api/?name=Tran+Thi+B&background=d1fae5&color=065f46" class="w-10 h-10 rounded-full border border-gray-100">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 leading-tight">
                            <a href="candidate_profile.php" class="hover:text-blue-600 transition-colors">Trần Thị B</a>
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Frontend Developer</p>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-100 pt-2 mt-1">
                    <span class="flex items-center gap-1 text-green-600 font-medium"><i class="fas fa-check-circle"></i> Bắt đầu 01/05/2026</span>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Get all drop zones (the card containers inside each column)
    const dropZones = document.querySelectorAll('.kanban-drop-zone');
    const allCards = document.querySelectorAll('.kanban-card');
    let draggedCard = null;

    // --- DRAG START ---
    allCards.forEach(card => {
        card.addEventListener('dragstart', function (e) {
            draggedCard = this;
            this.classList.add('opacity-40', 'scale-95');
            e.dataTransfer.effectAllowed = 'move';
            // Highlight all drop zones
            dropZones.forEach(zone => {
                if (zone !== this.parentElement) {
                    zone.classList.add('ring-2', 'ring-blue-300', 'ring-dashed', 'bg-blue-50/50');
                }
            });
        });

        card.addEventListener('dragend', function () {
            this.classList.remove('opacity-40', 'scale-95');
            draggedCard = null;
            // Remove all highlights
            dropZones.forEach(zone => {
                zone.classList.remove('ring-2', 'ring-blue-300', 'ring-dashed', 'bg-blue-50/50', 'bg-blue-100/60');
            });
        });
    });

    // --- DROP ZONES ---
    dropZones.forEach(zone => {
        zone.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
            this.classList.add('bg-blue-100/60');
        });

        zone.addEventListener('dragleave', function () {
            this.classList.remove('bg-blue-100/60');
        });

        zone.addEventListener('drop', function (e) {
            e.preventDefault();
            this.classList.remove('bg-blue-100/60');

            if (draggedCard && this !== draggedCard.parentElement) {
                // Move card to new column
                this.appendChild(draggedCard);
                // Update counts for all columns
                updateAllCounts();
                // Flash animation on moved card
                draggedCard.classList.add('ring-2', 'ring-green-400');
                setTimeout(() => {
                    draggedCard.classList.remove('ring-2', 'ring-green-400');
                }, 800);
            }
        });
    });

    // --- UPDATE COLUMN COUNTS ---
    function updateAllCounts() {
        document.querySelectorAll('.kanban-column').forEach(col => {
            const cards = col.querySelector('.kanban-drop-zone').querySelectorAll('.kanban-card').length;
            const badge = col.querySelector('.kanban-count');
            if (badge) badge.textContent = cards;
        });
    }
});
</script>

<?php include 'includes/footer.php'; ?>