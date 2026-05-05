<?php
session_start();

$users = [
    "hr@recruitpro.com" => [
        "password" => "hr123",
        "role" => "hr",
        "name" => "Nguyễn Văn A",
        "redirect" => "dashboard.php"
    ],
    "manager@recruitpro.com" => [
        "password" => "manager123",
        "role" => "manager",
        "name" => "Hiring Manager",
        "redirect" => "jobs.php"
    ]
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (isset($users[$email]) && $users[$email]["password"] === $password) {
        $_SESSION["logged_in"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["role"] = $users[$email]["role"];
        $_SESSION["name"] = $users[$email]["name"];

        header("Location: " . $users[$email]["redirect"]);
        exit;
    } else {
        $error = "Email hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - RecruitPro</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .login-bg {
            background:
                linear-gradient(rgba(29, 78, 216, 0.88), rgba(29, 78, 216, 0.88)),
                url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">

<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">

    <!-- LEFT BRANDING -->
    <section class="login-bg hidden lg:flex flex-col justify-between p-16 text-white">
        <div>
            <div class="flex items-center gap-4 mb-20">
                <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center border border-white/30">
                    <i class="fas fa-layer-group text-2xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold">RecruitPro</h1>
            </div>

            <h2 class="text-6xl font-black leading-tight tracking-tight drop-shadow-lg">
                Tìm kiếm tài năng,<br>
                Xây dựng tương lai.
            </h2>

            <p class="mt-8 text-xl leading-relaxed text-blue-50 max-w-xl">
                Hệ thống quản lý quy trình tuyển dụng nội bộ, hỗ trợ HR Specialist và Hiring Manager phối hợp hiệu quả.
            </p>

            <div class="mt-14 pt-10 border-t border-white/20 flex gap-16">
                <div>
                    <p class="text-3xl font-black">500+</p>
                    <p class="text-blue-100 mt-1">Vị trí đã tuyển</p>
                </div>
                <div>
                    <p class="text-3xl font-black">12k+</p>
                    <p class="text-blue-100 mt-1">Hồ sơ ứng viên</p>
                </div>
            </div>
        </div>

        <p class="text-blue-100">
            Internal Recruitment Process Management System.
        </p>
    </section>

    <!-- RIGHT LOGIN FORM -->
    <section class="flex items-center justify-center px-6 py-12 bg-white">
        <div class="w-full max-w-md">

            <div class="lg:hidden flex items-center gap-3 mb-10">
                <div class="w-11 h-11 rounded-xl bg-blue-700 text-white flex items-center justify-center">
                    <i class="fas fa-layer-group text-xl"></i>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-900">RecruitPro</h1>
            </div>

            <div class="mb-10">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight">Chào mừng trở lại</h2>
                <p class="text-gray-500 mt-3 text-lg">Vui lòng nhập thông tin để truy cập</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100 text-red-600 text-sm font-semibold">
                    <i class="fas fa-circle-exclamation mr-2"></i>
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="login.php" class="space-y-6">

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email công việc</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            type="email"
                            name="email"
                            required
                            placeholder="name@company.com"
                            class="w-full pl-12 pr-4 py-4 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-gray-800"
                        >
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-bold text-gray-700">Mật khẩu</label>
                        <button type="button" class="text-sm font-bold text-blue-700 hover:text-blue-800">
                            Quên mật khẩu?
                        </button>
                    </div>

                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input
                            id="passwordInput"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="w-full pl-12 pr-12 py-4 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-gray-800"
                        >
                        <button type="button" id="togglePassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember" type="checkbox" class="w-5 h-5 rounded border-gray-300 accent-blue-700">
                    <label for="remember" class="ml-3 text-sm text-gray-600">Ghi nhớ đăng nhập</label>
                </div>

                <button
                    type="submit"
                    class="w-full py-4 rounded-xl bg-blue-700 hover:bg-blue-800 text-white font-extrabold shadow-lg shadow-blue-700/25 transition"
                >
                    Đăng nhập hệ thống
                </button>
            </form>

            <div class="mt-8 p-5 rounded-2xl bg-blue-50 border border-blue-100">
                <p class="font-extrabold text-blue-800 mb-3">Tài khoản demo:</p>

                <div class="space-y-1 text-sm text-blue-700 leading-relaxed">
                    <p><b>HR Specialist:</b> hr@recruitpro.com / hr123</p>
                    <p><b>Hiring Manager:</b> manager@recruitpro.com / manager123</p>
                </div>
            </div>

            <p class="text-center text-gray-400 mt-10 text-sm">
                © 2026 RecruitPro. All rights reserved.
            </p>
        </div>
    </section>
</div>

<script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("passwordInput");

    togglePassword.addEventListener("click", function () {
        const isPassword = passwordInput.type === "password";
        passwordInput.type = isPassword ? "text" : "password";

        this.innerHTML = isPassword
            ? '<i class="fas fa-eye-slash"></i>'
            : '<i class="fas fa-eye"></i>';
    });
</script>

</body>
</html>