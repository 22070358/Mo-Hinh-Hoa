<<<<<<< HEAD
console.log("demo-actions loaded");

(function () {
    function createModal() {
        if (document.getElementById("globalDemoModal")) return;

        const modal = document.createElement("div");
        modal.id = "globalDemoModal";
        modal.className = "fixed inset-0 bg-black/40 z-[9999] flex items-center justify-center px-4";
        modal.style.display = "none";

        modal.innerHTML = `
            <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 id="globalModalTitle" class="text-xl font-extrabold text-gray-900">Thông báo</h3>
                    <button type="button" id="globalModalClose" class="text-gray-400 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div id="globalModalContent" class="text-gray-600 leading-relaxed"></div>

                <div class="flex justify-end mt-6">
                    <button type="button" id="globalModalOk" class="px-5 py-2.5 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">
                        OK
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        document.getElementById("globalModalClose").addEventListener("click", hideModal);
        document.getElementById("globalModalOk").addEventListener("click", hideModal);

        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                hideModal();
            }
        });
    }

    function showModal(title, content) {
        createModal();

        const modal = document.getElementById("globalDemoModal");
        const titleEl = document.getElementById("globalModalTitle");
        const contentEl = document.getElementById("globalModalContent");

        if (titleEl) titleEl.textContent = title;
        if (contentEl) contentEl.innerHTML = content;
        if (modal) modal.style.display = "flex";
    }

    function hideModal() {
        const modal = document.getElementById("globalDemoModal");
        if (modal) {
            modal.style.display = "none";
        }
    }

    function showToast(message) {
        let toast = document.getElementById("demoToast");

        if (!toast) {
            toast = document.createElement("div");
            toast.id = "demoToast";
            toast.className = "fixed bottom-6 right-6 z-[10000] bg-gray-900 text-white px-5 py-3 rounded-xl shadow-xl text-sm font-semibold";
            toast.style.display = "none";
            document.body.appendChild(toast);
        }

        toast.textContent = message;
        toast.style.display = "block";

        setTimeout(function () {
            toast.style.display = "none";
        }, 1800);
    }

    function textOf(el) {
        return (el.textContent || "").trim().toLowerCase();
    }

    function nearestBox(el) {
        return el.closest("tr, .stage-card, .role-card, .candidate-card, .job-card, .bg-white, .rounded-2xl");
    }

    function openCreateForm() {
        showModal("Tạo mới", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên / Tiêu đề</label>
                    <input id="demoCreateName" type="text" placeholder="Nhập nội dung..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Mô tả</label>
                    <textarea id="demoCreateDesc" placeholder="Nhập mô tả..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl"></textarea>
                </div>

                <button type="button" onclick="window.demoSaveCreate()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Lưu
                </button>
            </div>
        `);
    }

    window.demoSaveCreate = function () {
        const name = document.getElementById("demoCreateName")?.value.trim();
        const desc = document.getElementById("demoCreateDesc")?.value.trim();

        if (!name) {
            showModal("Thiếu thông tin", "Vui lòng nhập tên hoặc tiêu đề.");
            return;
        }

        showModal("Tạo thành công", `
            <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                <p class="font-bold text-blue-800">${name}</p>
                <p class="text-sm text-blue-700 mt-1">${desc || "Không có mô tả."}</p>
            </div>
        `);
    };

    function openEditForm(target) {
        const title =
            target?.querySelector("h1, h2, h3, h4, .stage-name, .role-name, .font-bold, .font-extrabold")?.textContent?.trim()
            || "Nội dung";

        const desc =
            target?.querySelector("p, .text-gray-500, .role-desc")?.textContent?.trim()
            || "";

        if (target) target.setAttribute("data-editing", "1");

        showModal("Chỉnh sửa", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên / Tiêu đề</label>
                    <input id="demoEditTitle" type="text" value="${title}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Mô tả</label>
                    <textarea id="demoEditDesc"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">${desc}</textarea>
                </div>

                <button type="button" onclick="window.demoSaveEdit()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Lưu thay đổi
                </button>
            </div>
        `);
    }

    window.demoSaveEdit = function () {
        const target = document.querySelector("[data-editing='1']");
        const newTitle = document.getElementById("demoEditTitle")?.value.trim();
        const newDesc = document.getElementById("demoEditDesc")?.value.trim();

        if (!target || !newTitle) {
            showModal("Thiếu thông tin", "Không thể lưu vì thiếu dữ liệu.");
            return;
        }

        const titleEl = target.querySelector("h1, h2, h3, h4, .stage-name, .role-name, .font-bold, .font-extrabold");
        const descEl = target.querySelector("p, .text-gray-500, .role-desc");

        if (titleEl) titleEl.textContent = newTitle;
        if (descEl) descEl.textContent = newDesc;

        target.removeAttribute("data-editing");
        showModal("Đã lưu", "Nội dung đã được cập nhật trên giao diện demo.");
    };

    function viewDetails(target) {
        const title =
            target?.querySelector("h1, h2, h3, h4, .font-bold, .font-extrabold")?.textContent?.trim()
            || "Chi tiết";

        const desc =
            target?.querySelector("p, .text-gray-500")?.textContent?.trim()
            || "Thông tin chi tiết đang được mô phỏng trong prototype.";

        showModal("Chi tiết", `
            <div class="space-y-4 text-left">
                <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                    <p class="font-extrabold text-blue-800">${title}</p>
                    <p class="text-sm text-blue-700 mt-2">${desc}</p>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="p-4 rounded-xl bg-gray-50">
                        <p class="text-xs text-gray-500">Trạng thái</p>
                        <p class="font-bold text-gray-800">Đang xử lý</p>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50">
                        <p class="text-xs text-gray-500">Cập nhật</p>
                        <p class="font-bold text-gray-800">Hôm nay</p>
                    </div>
                </div>
            </div>
        `);
    }

    function deleteItem(button) {
        const target = nearestBox(button);

        if (!target) {
            showModal("Xóa", "Chức năng xóa đã được kích hoạt.");
            return;
        }

        if (confirm("Bạn có chắc muốn xóa mục này không?")) {
            target.remove();
            showToast("Đã xóa thành công.");
        }
    }

    function approveItem(button) {
        const target = nearestBox(button);

        if (target) {
            const status = target.querySelector(".status, .badge");
            if (status) {
                status.textContent = "Đã duyệt";
                status.className = "status px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold";
            }
        }

        showModal("Đã duyệt", "Yêu cầu đã được duyệt thành công.");
    }

    function rejectItem(button) {
        const target = nearestBox(button);
        window.currentRejectTarget = target;

        showModal("Từ chối yêu cầu", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lý do từ chối</label>
                    <textarea id="rejectReason" placeholder="Nhập lý do..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl"></textarea>
                </div>

                <button type="button" onclick="window.demoConfirmReject()" class="w-full py-3 bg-red-600 text-white rounded-xl font-bold">
                    Xác nhận từ chối
                </button>
            </div>
        `);
    }

    window.demoConfirmReject = function () {
        if (window.currentRejectTarget) {
            const status = window.currentRejectTarget.querySelector(".status, .badge");
            if (status) {
                status.textContent = "Đã từ chối";
                status.className = "status px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold";
            }
        }

        const reason = document.getElementById("rejectReason")?.value.trim();
        showModal("Đã từ chối", reason ? `Lý do: ${reason}` : "Yêu cầu đã được từ chối.");
    };

    function scheduleInterview() {
        showModal("Lên lịch phỏng vấn", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ngày phỏng vấn</label>
                    <input type="date" id="scheduleDate" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Giờ phỏng vấn</label>
                    <input type="time" id="scheduleTime" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Người tham gia</label>
                    <input type="text" id="scheduleMembers" placeholder="VD: HR, Hiring Manager"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <button type="button" onclick="window.demoSaveSchedule()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Lưu lịch phỏng vấn
                </button>
            </div>
        `);
    }

    window.demoSaveSchedule = function () {
        const date = document.getElementById("scheduleDate")?.value;
        const time = document.getElementById("scheduleTime")?.value;
        const members = document.getElementById("scheduleMembers")?.value.trim();

        showModal("Đã lên lịch", `
            <div class="p-4 rounded-xl bg-blue-50 border border-blue-100 text-blue-800">
                <p><b>Ngày:</b> ${date || "Chưa chọn"}</p>
                <p><b>Giờ:</b> ${time || "Chưa chọn"}</p>
                <p><b>Người tham gia:</b> ${members || "Chưa nhập"}</p>
            </div>
        `);
    };

    function evaluateCandidate() {
        showModal("Đánh giá ứng viên", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Điểm đánh giá</label>
                    <select id="scoreInput" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                        <option>5 - Excellent</option>
                        <option>4 - Good</option>
                        <option>3 - Average</option>
                        <option>2 - Weak</option>
                        <option>1 - Reject</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nhận xét</label>
                    <textarea id="feedbackInput" placeholder="Nhập nhận xét..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl"></textarea>
                </div>

                <button type="button" onclick="window.demoSaveEvaluation()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Gửi đánh giá
                </button>
            </div>
        `);
    }

    window.demoSaveEvaluation = function () {
        const score = document.getElementById("scoreInput")?.value;
        const feedback = document.getElementById("feedbackInput")?.value.trim();

        showModal("Đã gửi đánh giá", `
            <div class="p-4 rounded-xl bg-green-50 border border-green-100 text-green-800">
                <p><b>Điểm:</b> ${score}</p>
                <p><b>Nhận xét:</b> ${feedback || "Không có nhận xét."}</p>
            </div>
        `);
    };

    function exportReport() {
        const rows = [
            ["Report", "Recruitment Analytics"],
            ["Generated At", new Date().toLocaleString()],
            ["Total Candidates", "1248"],
            ["Open Jobs", "24"],
            ["Interviews", "18"]
        ];

        const csv = rows.map(row => row.join(",")).join("\n");
        const blob = new Blob([csv], { type: "text/csv" });
        const url = URL.createObjectURL(blob);

        const a = document.createElement("a");
        a.href = url;
        a.download = "recruitment-report.csv";
        a.click();

        URL.revokeObjectURL(url);
        showToast("Đã xuất báo cáo demo.");
    }

    function handleButton(button) {
        const text = textOf(button);
        const target = nearestBox(button);

        if (button.id === "globalModalClose" || button.id === "globalModalOk") return;

        if (
            text.includes("tạo") ||
            text.includes("thêm") ||
            text.includes("add") ||
            text.includes("create") ||
            text.includes("new")
        ) {
            openCreateForm();
            return;
        }

        if (
            text.includes("sửa") ||
            text.includes("chỉnh sửa") ||
            text.includes("edit") ||
            button.querySelector(".fa-edit") ||
            button.querySelector(".fa-pen") ||
            button.querySelector(".fa-cog")
        ) {
            openEditForm(target);
            return;
        }

        if (
            text.includes("xóa") ||
            text.includes("delete") ||
            text.includes("remove") ||
            button.querySelector(".fa-trash") ||
            button.querySelector(".fa-trash-alt")
        ) {
            deleteItem(button);
            return;
        }

        if (
            text.includes("duyệt") ||
            text.includes("approve") ||
            text.includes("accept")
        ) {
            approveItem(button);
            return;
        }

        if (
            text.includes("từ chối") ||
            text.includes("reject") ||
            text.includes("decline")
        ) {
            rejectItem(button);
            return;
        }

        if (
            text.includes("lịch") ||
            text.includes("schedule")
        ) {
            scheduleInterview();
            return;
        }

        if (
            text.includes("đánh giá") ||
            text.includes("evaluate") ||
            text.includes("scorecard") ||
            text.includes("feedback")
        ) {
            evaluateCandidate();
            return;
        }

        if (
            text.includes("xuất") ||
            text.includes("export") ||
            text.includes("download")
        ) {
            exportReport();
            return;
        }

        if (
            text.includes("lưu") ||
            text.includes("save") ||
            text.includes("submit")
        ) {
            showModal("Đã lưu", "Thao tác đã được lưu thành công trong giao diện demo.");
            return;
        }

        if (
            text.includes("xem") ||
            text.includes("view") ||
            text.includes("details") ||
            text.includes("chi tiết")
        ) {
            viewDetails(target);
            return;
        }

        showModal("Chức năng demo", "Chức năng này đã được kích hoạt trong prototype.");
    }

    function init() {
        console.log("demo-actions init");

        document.querySelectorAll("input[type='checkbox']").forEach(input => {
            input.addEventListener("change", function () {
                showToast(input.checked ? "Đã bật tùy chọn." : "Đã tắt tùy chọn.");
            });
        });

        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", function (e) {
                if (form.closest("#loginForm") || form.getAttribute("action") === "login.php") return;

                e.preventDefault();
                showModal("Đã lưu", "Biểu mẫu đã được lưu thành công trong giao diện demo.");
            });
        });

        document.addEventListener("click", function (e) {
            const button = e.target.closest("button");
            const link = e.target.closest("a");

            if (button) {
                if (button.id === "globalModalClose" || button.id === "globalModalOk") return;

                if (button.type === "submit") {
                    const form = button.closest("form");
                    if (form && form.getAttribute("action") === "login.php") return;
                }

                e.preventDefault();
                handleButton(button);
                return;
            }

            if (link) {
                const href = link.getAttribute("href");

                if (!href || href === "#") {
                    e.preventDefault();
                    showModal("Chức năng demo", "Mục này đang được mô phỏng ở mức giao diện.");
                }
            }
        });
    }

    document.addEventListener("DOMContentLoaded", init);
=======
console.log("demo-actions loaded");

(function () {
    function createModal() {
        if (document.getElementById("globalDemoModal")) return;

        const modal = document.createElement("div");
        modal.id = "globalDemoModal";
        modal.className = "fixed inset-0 bg-black/40 z-[9999] flex items-center justify-center px-4";
        modal.style.display = "none";

        modal.innerHTML = `
            <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 id="globalModalTitle" class="text-xl font-extrabold text-gray-900">Thông báo</h3>
                    <button type="button" id="globalModalClose" class="text-gray-400 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div id="globalModalContent" class="text-gray-600 leading-relaxed"></div>

                <div class="flex justify-end mt-6">
                    <button type="button" id="globalModalOk" class="px-5 py-2.5 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800">
                        OK
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        document.getElementById("globalModalClose").addEventListener("click", hideModal);
        document.getElementById("globalModalOk").addEventListener("click", hideModal);

        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                hideModal();
            }
        });
    }

    function showModal(title, content) {
        createModal();

        const modal = document.getElementById("globalDemoModal");
        const titleEl = document.getElementById("globalModalTitle");
        const contentEl = document.getElementById("globalModalContent");

        if (titleEl) titleEl.textContent = title;
        if (contentEl) contentEl.innerHTML = content;
        if (modal) modal.style.display = "flex";
    }

    function hideModal() {
        const modal = document.getElementById("globalDemoModal");
        if (modal) {
            modal.style.display = "none";
        }
    }

    function showToast(message) {
        let toast = document.getElementById("demoToast");

        if (!toast) {
            toast = document.createElement("div");
            toast.id = "demoToast";
            toast.className = "fixed bottom-6 right-6 z-[10000] bg-gray-900 text-white px-5 py-3 rounded-xl shadow-xl text-sm font-semibold";
            toast.style.display = "none";
            document.body.appendChild(toast);
        }

        toast.textContent = message;
        toast.style.display = "block";

        setTimeout(function () {
            toast.style.display = "none";
        }, 1800);
    }

    function textOf(el) {
        return (el.textContent || "").trim().toLowerCase();
    }

    function nearestBox(el) {
        return el.closest("tr, .stage-card, .role-card, .candidate-card, .job-card, .bg-white, .rounded-2xl");
    }

    function openCreateForm() {
        showModal("Tạo mới", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên / Tiêu đề</label>
                    <input id="demoCreateName" type="text" placeholder="Nhập nội dung..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Mô tả</label>
                    <textarea id="demoCreateDesc" placeholder="Nhập mô tả..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl"></textarea>
                </div>

                <button type="button" onclick="window.demoSaveCreate()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Lưu
                </button>
            </div>
        `);
    }

    window.demoSaveCreate = function () {
        const name = document.getElementById("demoCreateName")?.value.trim();
        const desc = document.getElementById("demoCreateDesc")?.value.trim();

        if (!name) {
            showModal("Thiếu thông tin", "Vui lòng nhập tên hoặc tiêu đề.");
            return;
        }

        showModal("Tạo thành công", `
            <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                <p class="font-bold text-blue-800">${name}</p>
                <p class="text-sm text-blue-700 mt-1">${desc || "Không có mô tả."}</p>
            </div>
        `);
    };

    function openEditForm(target) {
        const title =
            target?.querySelector("h1, h2, h3, h4, .stage-name, .role-name, .font-bold, .font-extrabold")?.textContent?.trim()
            || "Nội dung";

        const desc =
            target?.querySelector("p, .text-gray-500, .role-desc")?.textContent?.trim()
            || "";

        if (target) target.setAttribute("data-editing", "1");

        showModal("Chỉnh sửa", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên / Tiêu đề</label>
                    <input id="demoEditTitle" type="text" value="${title}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Mô tả</label>
                    <textarea id="demoEditDesc"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">${desc}</textarea>
                </div>

                <button type="button" onclick="window.demoSaveEdit()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Lưu thay đổi
                </button>
            </div>
        `);
    }

    window.demoSaveEdit = function () {
        const target = document.querySelector("[data-editing='1']");
        const newTitle = document.getElementById("demoEditTitle")?.value.trim();
        const newDesc = document.getElementById("demoEditDesc")?.value.trim();

        if (!target || !newTitle) {
            showModal("Thiếu thông tin", "Không thể lưu vì thiếu dữ liệu.");
            return;
        }

        const titleEl = target.querySelector("h1, h2, h3, h4, .stage-name, .role-name, .font-bold, .font-extrabold");
        const descEl = target.querySelector("p, .text-gray-500, .role-desc");

        if (titleEl) titleEl.textContent = newTitle;
        if (descEl) descEl.textContent = newDesc;

        target.removeAttribute("data-editing");
        showModal("Đã lưu", "Nội dung đã được cập nhật trên giao diện demo.");
    };

    function viewDetails(target) {
        const title =
            target?.querySelector("h1, h2, h3, h4, .font-bold, .font-extrabold")?.textContent?.trim()
            || "Chi tiết";

        const desc =
            target?.querySelector("p, .text-gray-500")?.textContent?.trim()
            || "Thông tin chi tiết đang được mô phỏng trong prototype.";

        showModal("Chi tiết", `
            <div class="space-y-4 text-left">
                <div class="p-4 rounded-xl bg-blue-50 border border-blue-100">
                    <p class="font-extrabold text-blue-800">${title}</p>
                    <p class="text-sm text-blue-700 mt-2">${desc}</p>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="p-4 rounded-xl bg-gray-50">
                        <p class="text-xs text-gray-500">Trạng thái</p>
                        <p class="font-bold text-gray-800">Đang xử lý</p>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-50">
                        <p class="text-xs text-gray-500">Cập nhật</p>
                        <p class="font-bold text-gray-800">Hôm nay</p>
                    </div>
                </div>
            </div>
        `);
    }

    function deleteItem(button) {
        const target = nearestBox(button);

        if (!target) {
            showModal("Xóa", "Chức năng xóa đã được kích hoạt.");
            return;
        }

        if (confirm("Bạn có chắc muốn xóa mục này không?")) {
            target.remove();
            showToast("Đã xóa thành công.");
        }
    }

    function approveItem(button) {
        const target = nearestBox(button);

        if (target) {
            const status = target.querySelector(".status, .badge");
            if (status) {
                status.textContent = "Đã duyệt";
                status.className = "status px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold";
            }
        }

        showModal("Đã duyệt", "Yêu cầu đã được duyệt thành công.");
    }

    function rejectItem(button) {
        const target = nearestBox(button);
        window.currentRejectTarget = target;

        showModal("Từ chối yêu cầu", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lý do từ chối</label>
                    <textarea id="rejectReason" placeholder="Nhập lý do..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl"></textarea>
                </div>

                <button type="button" onclick="window.demoConfirmReject()" class="w-full py-3 bg-red-600 text-white rounded-xl font-bold">
                    Xác nhận từ chối
                </button>
            </div>
        `);
    }

    window.demoConfirmReject = function () {
        if (window.currentRejectTarget) {
            const status = window.currentRejectTarget.querySelector(".status, .badge");
            if (status) {
                status.textContent = "Đã từ chối";
                status.className = "status px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold";
            }
        }

        const reason = document.getElementById("rejectReason")?.value.trim();
        showModal("Đã từ chối", reason ? `Lý do: ${reason}` : "Yêu cầu đã được từ chối.");
    };

    function scheduleInterview() {
        showModal("Lên lịch phỏng vấn", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ngày phỏng vấn</label>
                    <input type="date" id="scheduleDate" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Giờ phỏng vấn</label>
                    <input type="time" id="scheduleTime" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Người tham gia</label>
                    <input type="text" id="scheduleMembers" placeholder="VD: HR, Hiring Manager"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                </div>

                <button type="button" onclick="window.demoSaveSchedule()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Lưu lịch phỏng vấn
                </button>
            </div>
        `);
    }

    window.demoSaveSchedule = function () {
        const date = document.getElementById("scheduleDate")?.value;
        const time = document.getElementById("scheduleTime")?.value;
        const members = document.getElementById("scheduleMembers")?.value.trim();

        showModal("Đã lên lịch", `
            <div class="p-4 rounded-xl bg-blue-50 border border-blue-100 text-blue-800">
                <p><b>Ngày:</b> ${date || "Chưa chọn"}</p>
                <p><b>Giờ:</b> ${time || "Chưa chọn"}</p>
                <p><b>Người tham gia:</b> ${members || "Chưa nhập"}</p>
            </div>
        `);
    };

    function evaluateCandidate() {
        showModal("Đánh giá ứng viên", `
            <div class="space-y-4 text-left">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Điểm đánh giá</label>
                    <select id="scoreInput" class="w-full px-4 py-3 border border-gray-200 rounded-xl">
                        <option>5 - Excellent</option>
                        <option>4 - Good</option>
                        <option>3 - Average</option>
                        <option>2 - Weak</option>
                        <option>1 - Reject</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nhận xét</label>
                    <textarea id="feedbackInput" placeholder="Nhập nhận xét..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl"></textarea>
                </div>

                <button type="button" onclick="window.demoSaveEvaluation()" class="w-full py-3 bg-blue-700 text-white rounded-xl font-bold">
                    Gửi đánh giá
                </button>
            </div>
        `);
    }

    window.demoSaveEvaluation = function () {
        const score = document.getElementById("scoreInput")?.value;
        const feedback = document.getElementById("feedbackInput")?.value.trim();

        showModal("Đã gửi đánh giá", `
            <div class="p-4 rounded-xl bg-green-50 border border-green-100 text-green-800">
                <p><b>Điểm:</b> ${score}</p>
                <p><b>Nhận xét:</b> ${feedback || "Không có nhận xét."}</p>
            </div>
        `);
    };

    function exportReport() {
        const rows = [
            ["Report", "Recruitment Analytics"],
            ["Generated At", new Date().toLocaleString()],
            ["Total Candidates", "1248"],
            ["Open Jobs", "24"],
            ["Interviews", "18"]
        ];

        const csv = rows.map(row => row.join(",")).join("\n");
        const blob = new Blob([csv], { type: "text/csv" });
        const url = URL.createObjectURL(blob);

        const a = document.createElement("a");
        a.href = url;
        a.download = "recruitment-report.csv";
        a.click();

        URL.revokeObjectURL(url);
        showToast("Đã xuất báo cáo demo.");
    }

    function handleButton(button) {
        const text = textOf(button);
        const target = nearestBox(button);

        if (button.id === "globalModalClose" || button.id === "globalModalOk") return;

        if (
            text.includes("tạo") ||
            text.includes("thêm") ||
            text.includes("add") ||
            text.includes("create") ||
            text.includes("new")
        ) {
            openCreateForm();
            return;
        }

        if (
            text.includes("sửa") ||
            text.includes("chỉnh sửa") ||
            text.includes("edit") ||
            button.querySelector(".fa-edit") ||
            button.querySelector(".fa-pen") ||
            button.querySelector(".fa-cog")
        ) {
            openEditForm(target);
            return;
        }

        if (
            text.includes("xóa") ||
            text.includes("delete") ||
            text.includes("remove") ||
            button.querySelector(".fa-trash") ||
            button.querySelector(".fa-trash-alt")
        ) {
            deleteItem(button);
            return;
        }

        if (
            text.includes("duyệt") ||
            text.includes("approve") ||
            text.includes("accept")
        ) {
            approveItem(button);
            return;
        }

        if (
            text.includes("từ chối") ||
            text.includes("reject") ||
            text.includes("decline")
        ) {
            rejectItem(button);
            return;
        }

        if (
            text.includes("lịch") ||
            text.includes("schedule")
        ) {
            scheduleInterview();
            return;
        }

        if (
            text.includes("đánh giá") ||
            text.includes("evaluate") ||
            text.includes("scorecard") ||
            text.includes("feedback")
        ) {
            evaluateCandidate();
            return;
        }

        if (
            text.includes("xuất") ||
            text.includes("export") ||
            text.includes("download")
        ) {
            exportReport();
            return;
        }

        if (
            text.includes("lưu") ||
            text.includes("save") ||
            text.includes("submit")
        ) {
            showModal("Đã lưu", "Thao tác đã được lưu thành công trong giao diện demo.");
            return;
        }

        if (
            text.includes("xem") ||
            text.includes("view") ||
            text.includes("details") ||
            text.includes("chi tiết")
        ) {
            viewDetails(target);
            return;
        }

        showModal("Chức năng demo", "Chức năng này đã được kích hoạt trong prototype.");
    }

    function init() {
        console.log("demo-actions init");

        document.querySelectorAll("input[type='checkbox']").forEach(input => {
            input.addEventListener("change", function () {
                showToast(input.checked ? "Đã bật tùy chọn." : "Đã tắt tùy chọn.");
            });
        });

        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", function (e) {
                if (form.closest("#loginForm") || form.getAttribute("action") === "login.php") return;

                e.preventDefault();
                showModal("Đã lưu", "Biểu mẫu đã được lưu thành công trong giao diện demo.");
            });
        });

        document.addEventListener("click", function (e) {
            const button = e.target.closest("button");
            const link = e.target.closest("a");

            if (button) {
                if (button.id === "globalModalClose" || button.id === "globalModalOk") return;

                if (button.type === "submit") {
                    const form = button.closest("form");
                    if (form && form.getAttribute("action") === "login.php") return;
                }

                e.preventDefault();
                handleButton(button);
                return;
            }

            if (link) {
                const href = link.getAttribute("href");

                if (!href || href === "#") {
                    e.preventDefault();
                    showModal("Chức năng demo", "Mục này đang được mô phỏng ở mức giao diện.");
                }
            }
        });
    }

    document.addEventListener("DOMContentLoaded", init);
>>>>>>> debf96eafae2153de85b9026cb21641b7df21ad0
})();