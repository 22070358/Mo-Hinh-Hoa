        </main>
    </div>

    <script>
        // Profile dropdown
        const profileButton = document.getElementById("profile-menu-button");
        const profileDropdown = document.getElementById("profile-dropdown");
        const profileChevron = document.getElementById("profile-chevron");

        if (profileButton && profileDropdown) {
            profileButton.addEventListener("click", function (event) {
                event.stopPropagation();
                profileDropdown.classList.toggle("hidden");

                if (profileChevron) {
                    profileChevron.classList.toggle("rotate-180");
                }
            });

            document.addEventListener("click", function (event) {
                if (
                    !profileDropdown.contains(event.target) &&
                    !profileButton.contains(event.target)
                ) {
                    profileDropdown.classList.add("hidden");

                    if (profileChevron) {
                        profileChevron.classList.remove("rotate-180");
                    }
                }
            });
        }

        // Mobile sidebar toggle
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const sidebar = document.getElementById("sidebar");

        if (mobileMenuButton && sidebar) {
            mobileMenuButton.addEventListener("click", function () {
                sidebar.classList.toggle("hidden");
            });
        }
    </script>

    <!-- Demo actions: làm các nút trong prototype bấm được -->
    <script src="/recruitflow/assets/js/demo-actions.js?v=2"></script>
</body>
</html>