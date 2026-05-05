<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

$currentRole = $_SESSION["role"] ?? "hr";
$currentEmail = $_SESSION["email"] ?? "hr@recruitpro.com";

$userInfo = [
    "admin" => [
        "name" => "Admin",
        "role" => "Administrator",
        "avatar" => "Admin",
        "subtitle" => "Quản trị hệ thống"
    ],
    "hr" => [
        "name" => "Nguyễn Văn A",
        "role" => "Recruiter",
        "avatar" => "Nguyễn Văn A",
        "subtitle" => "HR Manager"
    ],
    "manager" => [
        "name" => "Hiring Manager",
        "role" => "Hiring Manager",
        "avatar" => "Hiring Manager",
        "subtitle" => "Quản lý tuyển dụng"
    ],
    "interviewer" => [
        "name" => "Interviewer",
        "role" => "Interviewer",
        "avatar" => "Interviewer",
        "subtitle" => "Người phỏng vấn"
    ]
];

$currentUser = $userInfo[$currentRole] ?? $userInfo["hr"];
$avatarName = urlencode($currentUser["avatar"]);

if (!isset($page)) {
    $page = "";
}

function navClass($page, $current) {
    return ($page === $current)
        ? "bg-blue-50 text-blue-700"
        : "text-gray-600 hover:bg-gray-50 hover:text-gray-900";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecruitPro - Recruitment Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
    </style>
</head>

<body class="flex h-screen overflow-hidden text-gray-800">

    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col hidden md:flex z-10 shadow-sm">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <div class="flex items-center gap-2 text-blue-600">
                <i class="fas fa-layer-group text-2xl"></i>
                <div>
                    <span class="text-xl font-bold tracking-tight block leading-tight">RecruitPro</span>
                    <span class="text-xs text-gray-400 font-medium">
                        <?php echo ($currentRole === "admin") ? "Quản trị hệ thống" : "Quản trị HR"; ?>
                    </span>
                </div>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-3">

            <?php if ($currentRole === "hr"): ?>
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Tuyển dụng</p>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="dashboard.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'dashboard'); ?>">
                            <i class="fas fa-chart-pie w-6"></i> Tổng quan
                        </a>
                    </li>
                    <li>
                        <a href="jobs.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'jobs'); ?>">
                            <i class="fas fa-briefcase w-6"></i> Vị trí
                        </a>
                    </li>
                    <li>
                        <a href="kanban.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'kanban'); ?>">
                            <i class="fas fa-columns w-6"></i> Quy trình
                        </a>
                    </li>
                    <li>
                        <a href="candidates.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'candidate'); ?>">
                            <i class="fas fa-users w-6"></i> Ứng viên
                        </a>
                    </li>
                    <li>
                        <a href="calendar.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'calendar'); ?>">
                            <i class="fas fa-calendar-alt w-6"></i> Lịch phỏng vấn
                        </a>
                    </li>
                    <li>
                        <a href="reports.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'reports'); ?>">
                            <i class="fas fa-chart-line w-6"></i> Báo cáo
                        </a>
                    </li>
                    <li>
                        <a href="settings.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'settings'); ?>">
                            <i class="fas fa-cog w-6"></i> Cài đặt
                        </a>
                    </li>
                </ul>

            <?php elseif ($currentRole === "admin"): ?>
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Quản trị</p>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="settings.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'settings'); ?>">
                            <i class="fas fa-cog w-6"></i> Cài đặt
                        </a>
                    </li>
                    <li>
                        <a href="reports.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'reports'); ?>">
                            <i class="fas fa-chart-line w-6"></i> Báo cáo
                        </a>
                    </li>
                </ul>

            <?php elseif ($currentRole === "manager"): ?>
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Hiring Manager</p>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="jobs.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'jobs'); ?>">
                            <i class="fas fa-briefcase w-6"></i> Vị trí cần duyệt
                        </a>
                    </li>
                    <li>
                        <a href="candidates.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'candidate'); ?>">
                            <i class="fas fa-user-check w-6"></i> Hồ sơ ứng viên
                        </a>
                    </li>
                    <li>
                        <a href="calendar.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'calendar'); ?>">
                            <i class="fas fa-calendar-alt w-6"></i> Lịch phỏng vấn
                        </a>
                    </li>
                </ul>

            <?php elseif ($currentRole === "interviewer"): ?>
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Phỏng vấn</p>
                <ul class="space-y-1 mb-6">
                    <li>
                        <a href="calendar.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'calendar'); ?>">
                            <i class="fas fa-calendar-alt w-6"></i> Lịch phỏng vấn
                        </a>
                    </li>
                    <li>
                        <a href="candidates.php" class="flex items-center px-3 py-2.5 rounded-lg font-medium transition-colors <?php echo navClass($page, 'candidate'); ?>">
                            <i class="fas fa-star-half-alt w-6"></i> Đánh giá ứng viên
                        </a>
                    </li>
                </ul>
            <?php endif; ?>

        </nav>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10 shadow-sm">
            <div class="flex items-center">
                <button class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <div class="hidden md:block relative ml-4">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input
                        type="text"
                        placeholder="Tìm kiếm ứng viên, vị trí..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-72 transition-all"
                    >
                </div>
            </div>

            <div class="flex items-center space-x-5">
                <button class="text-gray-400 hover:text-blue-600 transition-colors relative">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border-2 border-white">3</span>
                </button>

                <div class="h-8 w-px bg-gray-200"></div>

                <div class="relative">
                    <button id="profile-menu-button" class="flex items-center cursor-pointer hover:bg-gray-50 p-1 rounded-lg transition-colors focus:outline-none w-full text-left">
                        <img
                            src="https://ui-avatars.com/api/?name=<?php echo $avatarName; ?>&background=2563EB&color=fff"
                            alt="Avatar"
                            class="h-8 w-8 rounded-full border border-gray-200 object-cover"
                        >

                        <div class="ml-3 hidden md:block">
                            <p class="text-sm font-semibold text-gray-700 leading-tight">
                                <?php echo htmlspecialchars($currentUser["name"]); ?>
                            </p>
                            <p class="text-xs text-gray-500">
                                <?php echo htmlspecialchars($currentUser["role"]); ?>
                            </p>
                        </div>

                        <i class="fas fa-chevron-down ml-3 text-xs text-gray-400 transition-transform duration-200" id="profile-chevron"></i>
                    </button>

                    <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-1.5 z-50 transform origin-top-right transition-all">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-900">
                                <?php echo htmlspecialchars($currentUser["name"]); ?>
                            </p>
                            <p class="text-xs text-gray-500 truncate">
                                <?php echo htmlspecialchars($currentEmail); ?>
                            </p>
                        </div>

                        <?php if ($currentRole === "admin" || $currentRole === "hr"): ?>
                            <a href="settings.php" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-cog w-5 text-gray-400"></i> Cài đặt
                            </a>
                        <?php else: ?>
                            <a href="candidate_profile.php" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-user-circle w-5 text-gray-400"></i> Hồ sơ của tôi
                            </a>
                        <?php endif; ?>

                        <hr class="my-1 border-gray-100">

                        <a href="logout.php" class="flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-medium transition-colors">
                            <i class="fas fa-sign-out-alt w-5 text-red-500"></i> Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 relative">