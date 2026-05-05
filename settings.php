<?php
session_start();

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

$currentRole = $_SESSION["role"] ?? "hr";
$currentEmail = $_SESSION["email"] ?? "hr@recruitpro.com";

if (!in_array($currentRole, ["admin", "hr"])) {
    header("Location: dashboard.php");
    exit;
}

$userInfo = [
    "admin" => ["name" => "Admin", "role" => "Administrator", "avatar" => "Admin"],
    "hr" => ["name" => "Nguyễn Văn A", "role" => "Recruiter", "avatar" => "Nguyễn Văn A"]
];

$currentUser = $userInfo[$currentRole] ?? $userInfo["hr"];
$avatarName = urlencode($currentUser["avatar"]);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cấu hình Hệ thống - RecruitPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-active { color:#1d4ed8; border-bottom:2px solid #1d4ed8; }
        .tab-inactive { color:#6b7280; border-bottom:2px solid transparent; }
        .dark-preview { background:#111827; color:#f9fafb; }
    </style>
</head>

<body class="min-h-screen text-gray-900">
<header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-50">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white">
            <i class="fas fa-sliders-h"></i>
        </div>
        <h1 class="text-xl font-extrabold">Cấu hình Hệ thống</h1>
    </div>

    <nav class="hidden md:flex items-center gap-8 text-sm font-semibold h-full">
        <button data-tab="general" class="main-tab tab-inactive h-full px-1">Chung</button>
        <button data-tab="workflow" class="main-tab tab-active h-full px-1">Quy trình</button>
        <button data-tab="rbac" class="main-tab tab-inactive h-full px-1">Phân quyền (RBAC)</button>
        <button data-tab="notification" class="main-tab tab-inactive h-full px-1">Thông báo</button>
    </nav>

    <div class="flex items-center gap-4">
        <a href="dashboard.php" class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold">
            <i class="fas fa-arrow-left"></i> Về Dashboard
        </a>

        <button id="themeBtn" class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-600">
            <i class="fas fa-sun"></i>
        </button>

        <button id="notificationBtn" class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-600">
            <i class="fas fa-bell"></i>
        </button>

        <div class="relative group">
            <button>
                <img src="https://ui-avatars.com/api/?name=<?php echo $avatarName; ?>&background=2563EB&color=fff"
                     class="w-10 h-10 rounded-full border border-gray-200">
            </button>
            <div class="hidden group-hover:block absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                <div class="px-4 py-3 border-b border-gray-100">
                    <p class="text-sm font-bold"><?php echo htmlspecialchars($currentUser["name"]); ?></p>
                    <p class="text-xs text-gray-500"><?php echo htmlspecialchars($currentUser["role"]); ?></p>
                    <p class="text-xs text-gray-400 truncate"><?php echo htmlspecialchars($currentEmail); ?></p>
                </div>
                <a href="dashboard.php" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 font-medium">
                    <i class="fas fa-chart-pie w-5 text-gray-400"></i> Dashboard
                </a>
                <a href="logout.php" class="flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-medium">
                    <i class="fas fa-sign-out-alt w-5 text-red-500"></i> Đăng xuất
                </a>
            </div>
        </div>
    </div>
</header>

<main class="max-w-6xl mx-auto px-8 py-10">

    <section id="tab-general" class="tab-content">
        <div class="mb-8">
            <h2 class="text-4xl font-black">Cấu hình Chung</h2>
            <p class="text-gray-500 mt-3">Quản lý thông tin cơ bản của hệ thống tuyển dụng.</p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-3xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên hệ thống</label>
                    <input id="systemNameInput" type="text" value="RecruitPro" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên công ty</label>
                    <input id="companyNameInput" type="text" value="RecruitFlow Company" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email hệ thống</label>
                    <input id="systemEmailInput" type="email" value="<?php echo htmlspecialchars($currentEmail); ?>" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Múi giờ</label>
                    <select id="timezoneInput" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                        <option>Asia/Ho_Chi_Minh</option>
                        <option>UTC</option>
                        <option>Asia/Tokyo</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                <button class="reset-btn px-6 py-3 rounded-xl text-gray-500 font-bold hover:bg-gray-100">Thiết lập lại</button>
                <button class="save-btn px-8 py-3 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">Lưu cấu hình</button>
            </div>
        </div>
    </section>

    <section id="tab-workflow" class="tab-content active">
        <div class="flex items-start justify-between mb-8">
            <div>
                <h2 class="text-4xl font-black">Tùy chỉnh Quy trình</h2>
                <p class="text-gray-500 mt-3">Xác định luồng quy trình tuyển dụng và tự động hóa các tác vụ lặp lại.</p>
            </div>
            <button id="createWorkflowBtn" class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg">
                <i class="fas fa-plus mr-2"></i> Tạo Quy trình Mới
            </button>
        </div>

        <div class="flex items-center gap-10 border-b border-gray-200 mb-8">
            <button class="sub-tab pb-4 text-blue-700 border-b-2 border-blue-700 font-bold text-sm" data-subtab="candidate">Quy trình Ứng viên</button>
            <button class="sub-tab pb-4 text-gray-500 border-b-2 border-transparent hover:text-blue-700 font-semibold text-sm" data-subtab="request">Giai đoạn Yêu cầu</button>
            <button class="sub-tab pb-4 text-gray-500 border-b-2 border-transparent hover:text-blue-700 font-semibold text-sm" data-subtab="onboarding">Onboarding</button>
        </div>

        <div id="subtab-candidate" class="subtab-content">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <section class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-extrabold text-lg"><i class="fas fa-bars text-blue-700 mr-2"></i>Quản lý các giai đoạn</h3>
                        <span id="stageCountText" class="text-xs font-bold text-gray-400 uppercase tracking-widest">Đã xác định 4 giai đoạn</span>
                    </div>

                    <div id="stageList" class="space-y-4">
                        <div class="stage-card bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center justify-between" data-email="1" data-calendar="0" data-scorecard="0">
                            <div class="flex items-center gap-4"><i class="fas fa-grip-vertical text-gray-300"></i><div><h4 class="stage-name font-extrabold text-lg">Tìm kiếm ứng viên</h4><p class="stage-automation text-sm text-gray-500 mt-1"><i class="fas fa-bolt text-gray-400 mr-1"></i> 1 Hành động tự động</p></div></div>
                            <div class="flex items-center gap-4 text-gray-400"><button class="config-stage-btn hover:text-blue-600"><i class="fas fa-cog"></i></button><button class="delete-stage-btn hover:text-red-500"><i class="fas fa-trash-alt"></i></button></div>
                        </div>

                        <div class="stage-card bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center justify-between" data-email="0" data-calendar="0" data-scorecard="0">
                            <div class="flex items-center gap-4"><i class="fas fa-grip-vertical text-gray-300"></i><div><h4 class="stage-name font-extrabold text-lg">Sàng lọc</h4><p class="stage-automation text-sm text-gray-500 mt-1"><i class="fas fa-bolt text-gray-400 mr-1"></i> 0 Hành động tự động</p></div></div>
                            <div class="flex items-center gap-4 text-gray-400"><button class="config-stage-btn hover:text-blue-600"><i class="fas fa-cog"></i></button><button class="delete-stage-btn hover:text-red-500"><i class="fas fa-trash-alt"></i></button></div>
                        </div>

                        <div class="stage-card bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center justify-between" data-email="1" data-calendar="1" data-scorecard="1">
                            <div class="flex items-center gap-4"><i class="fas fa-grip-vertical text-gray-300"></i><div><h4 class="stage-name font-extrabold text-lg">Phỏng vấn</h4><p class="stage-automation text-sm text-gray-500 mt-1"><i class="fas fa-bolt text-gray-400 mr-1"></i> 3 Hành động tự động</p></div></div>
                            <div class="flex items-center gap-4 text-gray-400"><button class="config-stage-btn w-9 h-9 bg-blue-50 text-blue-700 rounded-xl"><i class="fas fa-cog"></i></button><button class="delete-stage-btn hover:text-red-500"><i class="fas fa-trash-alt"></i></button></div>
                        </div>

                        <div class="stage-card bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center justify-between" data-email="1" data-calendar="0" data-scorecard="0">
                            <div class="flex items-center gap-4"><i class="fas fa-grip-vertical text-gray-300"></i><div><h4 class="stage-name font-extrabold text-lg">Đề nghị (Offer)</h4><p class="stage-automation text-sm text-gray-500 mt-1"><i class="fas fa-bolt text-gray-400 mr-1"></i> 2 Hành động tự động</p></div></div>
                            <div class="flex items-center gap-4 text-gray-400"><button class="config-stage-btn hover:text-blue-600"><i class="fas fa-cog"></i></button><button class="delete-stage-btn hover:text-red-500"><i class="fas fa-trash-alt"></i></button></div>
                        </div>
                    </div>

                    <button id="addStageBtn" class="w-full mt-4 border-2 border-dashed border-gray-200 rounded-2xl p-5 text-gray-400 hover:text-blue-700 hover:border-blue-200 font-bold">
                        <i class="fas fa-plus-circle mr-2"></i> Thêm Giai đoạn Mới
                    </button>
                </section>

                <aside class="space-y-6">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="text-lg font-extrabold mb-5"><i class="fas fa-magic text-blue-700 mr-2"></i>Tự động hóa: Phỏng vấn</h3>

                        <div class="space-y-3">
                            <label class="bg-gray-50 rounded-xl p-4 flex items-center justify-between cursor-pointer">
                                <div><p class="font-bold text-sm">Gửi Email mời</p><p class="text-xs text-gray-500">Gửi khi vào giai đoạn</p></div>
                                <input id="sideAutoEmail" type="checkbox" checked class="w-5 h-5 accent-blue-700">
                            </label>
                            <label class="bg-gray-50 rounded-xl p-4 flex items-center justify-between cursor-pointer">
                                <div><p class="font-bold text-sm">Đồng bộ Lịch</p><p class="text-xs text-gray-500">Tự động tìm khung giờ</p></div>
                                <input id="sideAutoCalendar" type="checkbox" checked class="w-5 h-5 accent-blue-700">
                            </label>
                            <label class="bg-gray-50 rounded-xl p-4 flex items-center justify-between cursor-pointer">
                                <div><p class="font-bold text-sm">Tạo Scorecard</p><p class="text-xs text-gray-500">Tạo mẫu đánh giá</p></div>
                                <input id="sideAutoScorecard" type="checkbox" checked class="w-5 h-5 accent-blue-700">
                            </label>
                        </div>

                        <button id="automationBtn" class="w-full mt-5 py-3 rounded-xl bg-blue-50 text-blue-700 font-bold text-sm hover:bg-blue-100">Cấu hình Tự động hóa</button>
                    </div>

                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="text-lg font-extrabold mb-2">Phân quyền truy cập</h3>
                        <p class="text-sm text-gray-500 mb-5">Xác định vai trò nào có thể chuyển ứng viên sang giai đoạn này.</p>
                        <div class="space-y-4">
                            <label class="flex items-center justify-between text-sm font-semibold cursor-pointer"><span>Tuyển dụng (Recruiter)</span><input id="permRecruiter" type="checkbox" checked class="w-5 h-5 accent-blue-700"></label>
                            <label class="flex items-center justify-between text-sm font-semibold cursor-pointer"><span>Quản lý (Hiring Manager)</span><input id="permManager" type="checkbox" checked class="w-5 h-5 accent-blue-700"></label>
                            <label class="flex items-center justify-between text-sm font-semibold cursor-pointer"><span>Chỉ Admin (Admin Only)</span><input id="permAdmin" type="checkbox" class="w-5 h-5 accent-blue-700"></label>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="flex justify-end gap-5 mt-12 pt-8 border-t border-gray-200">
                <button class="reset-btn px-6 py-3 rounded-xl text-gray-500 font-bold hover:bg-gray-100">Thiết lập lại</button>
                <button class="save-btn px-8 py-3 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">Lưu cấu hình</button>
            </div>
        </div>

        <div id="subtab-request" class="subtab-content hidden">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                <h3 class="text-2xl font-extrabold mb-3">Giai đoạn Yêu cầu</h3>
                <p class="text-gray-500 mb-6">Cấu hình quy trình tạo, duyệt và đăng yêu cầu tuyển dụng.</p>
                <div class="space-y-4">
                    <div class="p-5 rounded-xl border bg-gray-50"><h4 class="font-bold">Tạo yêu cầu tuyển dụng</h4><p class="text-sm text-gray-500 mt-1">HR tạo thông tin vị trí, mô tả công việc và ngân sách.</p></div>
                    <div class="p-5 rounded-xl border bg-gray-50"><h4 class="font-bold">Phê duyệt yêu cầu</h4><p class="text-sm text-gray-500 mt-1">Hiring Manager duyệt yêu cầu trước khi đăng tin.</p></div>
                    <div class="p-5 rounded-xl border bg-gray-50"><h4 class="font-bold">Đăng tin tuyển dụng</h4><p class="text-sm text-gray-500 mt-1">Yêu cầu đã duyệt được đăng lên hệ thống tuyển dụng.</p></div>
                </div>
            </div>
        </div>

        <div id="subtab-onboarding" class="subtab-content hidden">
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                <h3 class="text-2xl font-extrabold mb-3">Onboarding</h3>
                <p class="text-gray-500 mb-6">Mô phỏng quy trình sau khi ứng viên chấp nhận offer.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-5 rounded-xl bg-blue-50 text-blue-700 font-bold">1. Gửi email chào mừng</div>
                    <div class="p-5 rounded-xl bg-green-50 text-green-700 font-bold">2. Chuẩn bị tài khoản</div>
                    <div class="p-5 rounded-xl bg-purple-50 text-purple-700 font-bold">3. Hoàn tất hồ sơ</div>
                </div>
            </div>
        </div>
    </section>

    <section id="tab-rbac" class="tab-content">
        <div class="mb-8">
            <h2 class="text-4xl font-black">Phân quyền (RBAC)</h2>
            <p class="text-gray-500 mt-3">Quản lý vai trò và quyền truy cập trong hệ thống.</p>
        </div>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-extrabold">Danh sách vai trò</h3>
                <button id="addRoleBtn" class="bg-blue-50 text-blue-700 px-5 py-3 rounded-xl font-bold hover:bg-blue-100"><i class="fas fa-plus mr-2"></i> Thêm vai trò</button>
            </div>
            <div id="roleList" class="space-y-4">
                <div class="role-card flex justify-between items-center p-5 rounded-xl border bg-gray-50"><div><h4 class="role-name font-extrabold">HR Specialist</h4><p class="role-desc text-sm text-gray-500">Quản lý ứng viên, lịch phỏng vấn, pipeline và offer</p></div><button class="edit-role-btn text-blue-700 font-bold">Chỉnh sửa</button></div>
                <div class="role-card flex justify-between items-center p-5 rounded-xl border bg-gray-50"><div><h4 class="role-name font-extrabold">Hiring Manager</h4><p class="role-desc text-sm text-gray-500">Duyệt yêu cầu tuyển dụng và đánh giá ứng viên</p></div><button class="edit-role-btn text-blue-700 font-bold">Chỉnh sửa</button></div>
            </div>
        </div>
    </section>

    <section id="tab-notification" class="tab-content">
        <div class="mb-8">
            <h2 class="text-4xl font-black">Thông báo</h2>
            <p class="text-gray-500 mt-3">Cấu hình email và thông báo tự động.</p>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <div class="space-y-4">
                <label class="flex items-center justify-between p-5 rounded-xl bg-gray-50 border cursor-pointer"><div><h4 class="font-extrabold">Gửi email mời phỏng vấn</h4><p class="text-sm text-gray-500">Tự động gửi khi ứng viên vào vòng phỏng vấn.</p></div><input id="notiInterviewEmail" type="checkbox" checked class="w-5 h-5 accent-blue-700"></label>
                <label class="flex items-center justify-between p-5 rounded-xl bg-gray-50 border cursor-pointer"><div><h4 class="font-extrabold">Thông báo khi có ứng viên mới</h4><p class="text-sm text-gray-500">Gửi thông báo cho recruiter khi có hồ sơ mới.</p></div><input id="notiNewCandidate" type="checkbox" checked class="w-5 h-5 accent-blue-700"></label>
                <label class="flex items-center justify-between p-5 rounded-xl bg-gray-50 border cursor-pointer"><div><h4 class="font-extrabold">Thông báo offer</h4><p class="text-sm text-gray-500">Thông báo khi ứng viên phản hồi offer.</p></div><input id="notiOffer" type="checkbox" class="w-5 h-5 accent-blue-700"></label>
            </div>
            <div class="flex justify-end gap-5 mt-8 pt-6 border-t border-gray-200">
                <button class="reset-btn px-6 py-3 rounded-xl text-gray-500 font-bold hover:bg-gray-100">Thiết lập lại</button>
                <button class="save-btn px-8 py-3 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">Lưu cấu hình</button>
            </div>
        </div>
    </section>
</main>

<div id="demoModal" class="hidden fixed inset-0 bg-black/40 z-[100] flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 id="modalTitle" class="text-xl font-extrabold">Thông báo</h3>
            <button id="closeModalBtn" class="text-gray-400 hover:text-gray-700"><i class="fas fa-times"></i></button>
        </div>
        <div id="modalText" class="text-gray-600 leading-relaxed"></div>
        <div class="flex justify-end mt-6">
            <button id="okModalBtn" class="px-5 py-2.5 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">OK</button>
        </div>
    </div>
</div>

<div id="stageConfigModal" class="hidden fixed inset-0 bg-black/40 z-[110] flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-xl font-extrabold">Cấu hình giai đoạn</h3>
            <button id="closeStageModalBtn" class="text-gray-400 hover:text-gray-700"><i class="fas fa-times"></i></button>
        </div>

        <input type="hidden" id="editingStageIndex">
        <div class="space-y-5">
            <div><label class="block text-sm font-bold text-gray-700 mb-2">Tên giai đoạn</label><input id="stageNameInput" type="text" class="w-full px-4 py-3 border border-gray-200 rounded-xl" placeholder="VD: Phỏng vấn HR"></div>
            <div><label class="block text-sm font-bold text-gray-700 mb-2">Số hành động tự động</label><input id="stageAutomationInput" type="number" min="0" class="w-full px-4 py-3 border border-gray-200 rounded-xl" placeholder="VD: 2"></div>
            <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                <p class="text-sm font-extrabold text-gray-800">Tự động hóa</p>
                <label class="flex items-center justify-between text-sm font-semibold"><span>Gửi email mời</span><input id="autoEmailInput" type="checkbox" class="w-5 h-5 accent-blue-700"></label>
                <label class="flex items-center justify-between text-sm font-semibold"><span>Đồng bộ lịch</span><input id="autoCalendarInput" type="checkbox" class="w-5 h-5 accent-blue-700"></label>
                <label class="flex items-center justify-between text-sm font-semibold"><span>Tạo scorecard</span><input id="autoScorecardInput" type="checkbox" class="w-5 h-5 accent-blue-700"></label>
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <button id="cancelStageBtn" class="px-5 py-2.5 rounded-xl text-gray-600 font-bold hover:bg-gray-100">Hủy</button>
            <button id="saveStageBtn" class="px-6 py-2.5 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">Lưu giai đoạn</button>
        </div>
    </div>
</div>

<script>
const STORAGE_KEY = "recruitflow_pipeline_stages";
const GENERAL_KEY = "recruitflow_general_settings";
const NOTI_KEY = "recruitflow_notification_settings";
const SIDE_AUTO_KEY = "recruitflow_side_automation";
const PERMISSION_KEY = "recruitflow_permissions";

function showModal(title, html) {
    document.getElementById("modalTitle").textContent = title;
    document.getElementById("modalText").innerHTML = html;
    document.getElementById("demoModal").classList.remove("hidden");
}
function closeModal() { document.getElementById("demoModal").classList.add("hidden"); }
function closeStageModal() { document.getElementById("stageConfigModal").classList.add("hidden"); }

function updateStageCount() {
    const count = document.querySelectorAll(".stage-card").length;
    const text = document.getElementById("stageCountText");
    if (text) text.textContent = "Đã xác định " + count + " giai đoạn";
}

function createStageCard(stageName, automationCount = 0, options = {}) {
    const newStage = document.createElement("div");
    newStage.className = "stage-card bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center justify-between";
    newStage.dataset.email = options.email ? "1" : "0";
    newStage.dataset.calendar = options.calendar ? "1" : "0";
    newStage.dataset.scorecard = options.scorecard ? "1" : "0";
    newStage.innerHTML = `
        <div class="flex items-center gap-4">
            <i class="fas fa-grip-vertical text-gray-300"></i>
            <div>
                <h4 class="stage-name font-extrabold text-lg">${stageName}</h4>
                <p class="stage-automation text-sm text-gray-500 mt-1"><i class="fas fa-bolt text-gray-400 mr-1"></i> ${automationCount} Hành động tự động</p>
            </div>
        </div>
        <div class="flex items-center gap-4 text-gray-400">
            <button class="config-stage-btn hover:text-blue-600"><i class="fas fa-cog"></i></button>
            <button class="delete-stage-btn hover:text-red-500"><i class="fas fa-trash-alt"></i></button>
        </div>`;
    return newStage;
}

function getStageData() {
    return Array.from(document.querySelectorAll(".stage-card")).map(card => {
        const name = card.querySelector(".stage-name")?.textContent.trim() || "";
        const automationText = card.querySelector(".stage-automation")?.textContent || "0";
        const automation = parseInt(automationText.match(/\d+/)?.[0] || "0");
        return { name, automation, email: card.dataset.email === "1", calendar: card.dataset.calendar === "1", scorecard: card.dataset.scorecard === "1" };
    });
}
function saveStagesToStorage() { localStorage.setItem(STORAGE_KEY, JSON.stringify(getStageData())); }
function loadStagesFromStorage() {
    const saved = localStorage.getItem(STORAGE_KEY);
    if (!saved) return;
    const data = JSON.parse(saved);
    const stageList = document.getElementById("stageList");
    stageList.innerHTML = "";
    data.forEach(stage => stageList.appendChild(createStageCard(stage.name, stage.automation, stage)));
}

function saveGeneralSettings() {
    localStorage.setItem(GENERAL_KEY, JSON.stringify({
        systemName: document.getElementById("systemNameInput").value,
        companyName: document.getElementById("companyNameInput").value,
        email: document.getElementById("systemEmailInput").value,
        timezone: document.getElementById("timezoneInput").value
    }));
}
function loadGeneralSettings() {
    const saved = localStorage.getItem(GENERAL_KEY);
    if (!saved) return;
    const data = JSON.parse(saved);
    document.getElementById("systemNameInput").value = data.systemName || "RecruitPro";
    document.getElementById("companyNameInput").value = data.companyName || "RecruitFlow Company";
    document.getElementById("systemEmailInput").value = data.email || "";
    document.getElementById("timezoneInput").value = data.timezone || "Asia/Ho_Chi_Minh";
}

function saveNotificationSettings() {
    localStorage.setItem(NOTI_KEY, JSON.stringify({
        interviewEmail: document.getElementById("notiInterviewEmail").checked,
        newCandidate: document.getElementById("notiNewCandidate").checked,
        offer: document.getElementById("notiOffer").checked
    }));
}
function loadNotificationSettings() {
    const saved = localStorage.getItem(NOTI_KEY);
    if (!saved) return;
    const data = JSON.parse(saved);
    document.getElementById("notiInterviewEmail").checked = !!data.interviewEmail;
    document.getElementById("notiNewCandidate").checked = !!data.newCandidate;
    document.getElementById("notiOffer").checked = !!data.offer;
}

function saveSideAutomation() {
    localStorage.setItem(SIDE_AUTO_KEY, JSON.stringify({
        email: document.getElementById("sideAutoEmail").checked,
        calendar: document.getElementById("sideAutoCalendar").checked,
        scorecard: document.getElementById("sideAutoScorecard").checked
    }));
}
function loadSideAutomation() {
    const saved = localStorage.getItem(SIDE_AUTO_KEY);
    if (!saved) return;
    const data = JSON.parse(saved);
    document.getElementById("sideAutoEmail").checked = !!data.email;
    document.getElementById("sideAutoCalendar").checked = !!data.calendar;
    document.getElementById("sideAutoScorecard").checked = !!data.scorecard;
}

function savePermissions() {
    localStorage.setItem(PERMISSION_KEY, JSON.stringify({
        recruiter: document.getElementById("permRecruiter").checked,
        manager: document.getElementById("permManager").checked,
        admin: document.getElementById("permAdmin").checked
    }));
}
function loadPermissions() {
    const saved = localStorage.getItem(PERMISSION_KEY);
    if (!saved) return;
    const data = JSON.parse(saved);
    document.getElementById("permRecruiter").checked = !!data.recruiter;
    document.getElementById("permManager").checked = !!data.manager;
    document.getElementById("permAdmin").checked = !!data.admin;
}
function saveAllSettings() {
    saveStagesToStorage(); saveGeneralSettings(); saveNotificationSettings(); saveSideAutomation(); savePermissions();
}

function openStageConfig(card) {
    const cards = Array.from(document.querySelectorAll(".stage-card"));
    const index = cards.indexOf(card);
    const automationText = card.querySelector(".stage-automation")?.textContent || "0";
    const automation = parseInt(automationText.match(/\d+/)?.[0] || "0");

    document.getElementById("editingStageIndex").value = index;
    document.getElementById("stageNameInput").value = card.querySelector(".stage-name")?.textContent.trim() || "";
    document.getElementById("stageAutomationInput").value = automation;
    document.getElementById("autoEmailInput").checked = card.dataset.email === "1";
    document.getElementById("autoCalendarInput").checked = card.dataset.calendar === "1";
    document.getElementById("autoScorecardInput").checked = card.dataset.scorecard === "1";
    document.getElementById("stageConfigModal").classList.remove("hidden");
}

function saveStageConfig() {
    const index = parseInt(document.getElementById("editingStageIndex").value);
    const card = document.querySelectorAll(".stage-card")[index];
    if (!card) return;

    const name = document.getElementById("stageNameInput").value.trim();
    const automation = parseInt(document.getElementById("stageAutomationInput").value || "0");
    if (!name) { showModal("Thiếu thông tin", "Vui lòng nhập tên giai đoạn."); return; }

    card.querySelector(".stage-name").textContent = name;
    card.querySelector(".stage-automation").innerHTML = `<i class="fas fa-bolt text-gray-400 mr-1"></i> ${automation} Hành động tự động`;
    card.dataset.email = document.getElementById("autoEmailInput").checked ? "1" : "0";
    card.dataset.calendar = document.getElementById("autoCalendarInput").checked ? "1" : "0";
    card.dataset.scorecard = document.getElementById("autoScorecardInput").checked ? "1" : "0";

    saveStagesToStorage();
    closeStageModal();
    showModal("Đã lưu", "Cấu hình giai đoạn đã được cập nhật.");
}

function openAutomationConfig() {
    showModal("Cấu hình tự động hóa", `
        <div class="space-y-4 text-left">
            <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div><p class="font-bold">Gửi email mời phỏng vấn</p><p class="text-sm text-gray-500">Tự động gửi email khi ứng viên vào vòng phỏng vấn.</p></div>
                <input id="modalAutoEmail" type="checkbox" ${document.getElementById("sideAutoEmail").checked ? "checked" : ""} class="w-5 h-5 accent-blue-700">
            </label>
            <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div><p class="font-bold">Đồng bộ lịch phỏng vấn</p><p class="text-sm text-gray-500">Tự động tìm khung giờ và tạo lịch phỏng vấn.</p></div>
                <input id="modalAutoCalendar" type="checkbox" ${document.getElementById("sideAutoCalendar").checked ? "checked" : ""} class="w-5 h-5 accent-blue-700">
            </label>
            <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div><p class="font-bold">Tạo scorecard</p><p class="text-sm text-gray-500">Tạo mẫu đánh giá cho interviewer.</p></div>
                <input id="modalAutoScorecard" type="checkbox" ${document.getElementById("sideAutoScorecard").checked ? "checked" : ""} class="w-5 h-5 accent-blue-700">
            </label>
            <button onclick="saveAutomationModal()" class="w-full mt-2 py-3 bg-blue-700 text-white rounded-xl font-bold">Lưu tự động hóa</button>
        </div>`);
}
function saveAutomationModal() {
    document.getElementById("sideAutoEmail").checked = document.getElementById("modalAutoEmail").checked;
    document.getElementById("sideAutoCalendar").checked = document.getElementById("modalAutoCalendar").checked;
    document.getElementById("sideAutoScorecard").checked = document.getElementById("modalAutoScorecard").checked;
    saveSideAutomation();
    showModal("Đã lưu", "Cấu hình tự động hóa đã được lưu.");
}

function openAddRoleForm() {
    showModal("Thêm vai trò mới", `
        <div class="space-y-4 text-left">
            <div><label class="block text-sm font-bold text-gray-700 mb-2">Tên vai trò</label><input id="newRoleName" type="text" placeholder="VD: HR Assistant" class="w-full px-4 py-3 border border-gray-200 rounded-xl"></div>
            <div><label class="block text-sm font-bold text-gray-700 mb-2">Mô tả quyền</label><textarea id="newRoleDesc" placeholder="VD: Hỗ trợ quản lý hồ sơ ứng viên" class="w-full px-4 py-3 border border-gray-200 rounded-xl"></textarea></div>
            <button onclick="saveNewRole()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">Lưu vai trò</button>
        </div>`);
}
function saveNewRole() {
    const name = document.getElementById("newRoleName")?.value.trim();
    const desc = document.getElementById("newRoleDesc")?.value.trim();
    if (!name) { showModal("Thiếu thông tin", "Vui lòng nhập tên vai trò."); return; }

    const roleCard = document.createElement("div");
    roleCard.className = "role-card flex justify-between items-center p-5 rounded-xl border bg-gray-50";
    roleCard.innerHTML = `<div><h4 class="role-name font-extrabold">${name}</h4><p class="role-desc text-sm text-gray-500">${desc || "Vai trò mới trong hệ thống"}</p></div><button class="edit-role-btn text-blue-700 font-bold">Chỉnh sửa</button>`;
    document.getElementById("roleList").appendChild(roleCard);
    showModal("Đã thêm vai trò", `Vai trò <b>${name}</b> đã được thêm vào hệ thống demo.`);
}

function openEditRoleForm(roleCard) {
    const roleName = roleCard.querySelector(".role-name")?.textContent.trim() || "Role";
    const roleDesc = roleCard.querySelector(".role-desc")?.textContent.trim() || "";
    roleCard.dataset.editing = "1";
    showModal("Chỉnh sửa vai trò", `
        <div class="space-y-4 text-left">
            <div><label class="block text-sm font-bold text-gray-700 mb-2">Tên vai trò</label><input id="editRoleName" type="text" value="${roleName}" class="w-full px-4 py-3 border border-gray-200 rounded-xl"></div>
            <div><label class="block text-sm font-bold text-gray-700 mb-2">Mô tả quyền</label><textarea id="editRoleDesc" class="w-full px-4 py-3 border border-gray-200 rounded-xl">${roleDesc}</textarea></div>
            <div class="space-y-3 bg-gray-50 p-4 rounded-xl">
                <label class="flex justify-between font-semibold">Xem ứng viên <input type="checkbox" checked class="w-5 h-5 accent-blue-700"></label>
                <label class="flex justify-between font-semibold">Sửa pipeline <input type="checkbox" checked class="w-5 h-5 accent-blue-700"></label>
                <label class="flex justify-between font-semibold">Duyệt offer <input type="checkbox" class="w-5 h-5 accent-blue-700"></label>
            </div>
            <button onclick="saveEditedRole()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">Lưu thay đổi</button>
        </div>`);
}
function saveEditedRole() {
    const editingCard = document.querySelector('.role-card[data-editing="1"]');
    if (!editingCard) return;
    const name = document.getElementById("editRoleName")?.value.trim();
    const desc = document.getElementById("editRoleDesc")?.value.trim();
    if (!name) { showModal("Thiếu thông tin", "Vui lòng nhập tên vai trò."); return; }

    editingCard.querySelector(".role-name").textContent = name;
    editingCard.querySelector(".role-desc").textContent = desc || "Không có mô tả";
    delete editingCard.dataset.editing;
    showModal("Đã lưu", "Vai trò đã được cập nhật trong hệ thống demo.");
}

function openNotificationConfig() {
    showModal("Cấu hình thông báo", `
        <div class="space-y-4 text-left">
            <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div><p class="font-bold">Email mời phỏng vấn</p><p class="text-sm text-gray-500">Gửi email khi ứng viên được lên lịch.</p></div>
                <input id="modalNotiInterview" type="checkbox" ${document.getElementById("notiInterviewEmail").checked ? "checked" : ""} class="w-5 h-5 accent-blue-700">
            </label>
            <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div><p class="font-bold">Thông báo ứng viên mới</p><p class="text-sm text-gray-500">Báo cho HR khi có hồ sơ mới.</p></div>
                <input id="modalNotiCandidate" type="checkbox" ${document.getElementById("notiNewCandidate").checked ? "checked" : ""} class="w-5 h-5 accent-blue-700">
            </label>
            <label class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div><p class="font-bold">Thông báo offer</p><p class="text-sm text-gray-500">Báo khi ứng viên phản hồi offer.</p></div>
                <input id="modalNotiOffer" type="checkbox" ${document.getElementById("notiOffer").checked ? "checked" : ""} class="w-5 h-5 accent-blue-700">
            </label>
            <button onclick="saveNotificationModal()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">Lưu thông báo</button>
        </div>`);
}
function saveNotificationModal() {
    document.getElementById("notiInterviewEmail").checked = document.getElementById("modalNotiInterview").checked;
    document.getElementById("notiNewCandidate").checked = document.getElementById("modalNotiCandidate").checked;
    document.getElementById("notiOffer").checked = document.getElementById("modalNotiOffer").checked;
    saveNotificationSettings();
    showModal("Đã lưu", "Cấu hình thông báo đã được lưu.");
}

document.addEventListener("DOMContentLoaded", function () {
    loadStagesFromStorage(); loadGeneralSettings(); loadNotificationSettings(); loadSideAutomation(); loadPermissions(); updateStageCount();

    document.querySelectorAll(".main-tab").forEach(tab => {
        tab.addEventListener("click", function () {
            const target = this.dataset.tab;
            document.querySelectorAll(".main-tab").forEach(item => { item.classList.remove("tab-active"); item.classList.add("tab-inactive"); });
            this.classList.remove("tab-inactive"); this.classList.add("tab-active");
            document.querySelectorAll(".tab-content").forEach(content => content.classList.remove("active"));
            document.getElementById("tab-" + target).classList.add("active");
        });
    });

    document.querySelectorAll(".sub-tab").forEach(tab => {
        tab.addEventListener("click", function () {
            const target = this.dataset.subtab;
            document.querySelectorAll(".sub-tab").forEach(item => {
                item.classList.remove("text-blue-700", "border-blue-700", "font-bold");
                item.classList.add("text-gray-500", "border-transparent", "font-semibold");
            });
            this.classList.remove("text-gray-500", "border-transparent", "font-semibold");
            this.classList.add("text-blue-700", "border-blue-700", "font-bold");
            document.querySelectorAll(".subtab-content").forEach(content => content.classList.add("hidden"));
            document.getElementById("subtab-" + target).classList.remove("hidden");
        });
    });

    document.getElementById("closeModalBtn")?.addEventListener("click", closeModal);
    document.getElementById("okModalBtn")?.addEventListener("click", closeModal);
    document.getElementById("closeStageModalBtn")?.addEventListener("click", closeStageModal);
    document.getElementById("cancelStageBtn")?.addEventListener("click", closeStageModal);
    document.getElementById("saveStageBtn")?.addEventListener("click", saveStageConfig);

    document.getElementById("createWorkflowBtn")?.addEventListener("click", function () {
        const workflowName = prompt("Nhập tên quy trình mới:");
        if (!workflowName || workflowName.trim() === "") return;
        document.getElementById("stageList").appendChild(createStageCard(workflowName.trim(), 0));
        updateStageCount(); saveStagesToStorage();
        showModal("Tạo thành công", "Đã thêm quy trình/giai đoạn mới: " + workflowName.trim());
    });

    document.getElementById("addStageBtn")?.addEventListener("click", function () {
        const stageName = prompt("Nhập tên giai đoạn mới:");
        if (!stageName || stageName.trim() === "") return;
        document.getElementById("stageList").appendChild(createStageCard(stageName.trim(), 0));
        updateStageCount(); saveStagesToStorage();
        showModal("Đã thêm giai đoạn", "Giai đoạn mới đã được thêm vào quy trình.");
    });

    document.getElementById("automationBtn")?.addEventListener("click", openAutomationConfig);
    document.getElementById("addRoleBtn")?.addEventListener("click", openAddRoleForm);
    document.getElementById("notificationBtn")?.addEventListener("click", openNotificationConfig);

    document.getElementById("themeBtn")?.addEventListener("click", function () {
        showModal("Giao diện", `
            <div class="space-y-3 text-left">
                <button onclick="document.body.classList.remove('dark-preview'); showModal('Đã đổi giao diện', 'Đang sử dụng giao diện sáng.')" class="w-full py-3 bg-gray-100 rounded-xl font-bold">Giao diện sáng</button>
                <button onclick="document.body.classList.add('dark-preview'); showModal('Đã đổi giao diện', 'Đang sử dụng giao diện tối mô phỏng.')" class="w-full py-3 bg-gray-800 text-white rounded-xl font-bold">Giao diện tối</button>
            </div>`);
    });

    document.querySelectorAll("#sideAutoEmail, #sideAutoCalendar, #sideAutoScorecard").forEach(input => input.addEventListener("change", saveSideAutomation));
    document.querySelectorAll("#permRecruiter, #permManager, #permAdmin").forEach(input => input.addEventListener("change", savePermissions));
    document.querySelectorAll("#notiInterviewEmail, #notiNewCandidate, #notiOffer").forEach(input => input.addEventListener("change", saveNotificationSettings));

    document.addEventListener("click", function (e) {
        const configBtn = e.target.closest(".config-stage-btn");
        const deleteBtn = e.target.closest(".delete-stage-btn");
        const saveBtn = e.target.closest(".save-btn");
        const resetBtn = e.target.closest(".reset-btn");
        const editRoleBtn = e.target.closest(".edit-role-btn");

        if (configBtn) openStageConfig(configBtn.closest(".stage-card"));

        if (deleteBtn) {
            const card = deleteBtn.closest(".stage-card");
            if (confirm("Bạn có muốn xóa giai đoạn này không?")) {
                card?.remove(); updateStageCount(); saveStagesToStorage();
            }
        }

        if (saveBtn) { saveAllSettings(); showModal("Lưu thành công", "Cấu hình đã được lưu thành công."); }

        if (resetBtn) {
            if (confirm("Bạn có muốn thiết lập lại cấu hình ban đầu không?")) {
                localStorage.removeItem(STORAGE_KEY); localStorage.removeItem(GENERAL_KEY); localStorage.removeItem(NOTI_KEY); localStorage.removeItem(SIDE_AUTO_KEY); localStorage.removeItem(PERMISSION_KEY);
                location.reload();
            }
        }

        if (editRoleBtn) openEditRoleForm(editRoleBtn.closest(".role-card"));
    });
});
</script>

</body>
</html>