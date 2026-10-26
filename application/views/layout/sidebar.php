<!-- ============================================================ -->
<!-- SIDEBAR - VERSI SIMPEL DAN RAPI                               -->
<!-- ============================================================ -->
<style>
    /* ========== SIDEBAR STYLES ========== */
    .sidebar-wrapper {
        min-height: 100vh;
        background: #1a2035;
        padding: 0;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        overflow-y: auto;
        z-index: 999;
        transition: all 0.3s ease;
        border-right: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* ========== SIDEBAR HEADER ========== */
    .sidebar-header {
        padding: 25px 20px 20px 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }

    .sidebar-header .brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sidebar-header .brand .logo-icon {
        font-size: 28px;
        color: #4e73df;
    }

    .sidebar-header .brand .brand-text .app-name {
        color: #ffffff;
        font-size: 20px;
        font-weight: 700;
        margin: 0;
    }

    .sidebar-header .brand .brand-text .app-name span {
        color: #4e73df;
    }

    .sidebar-header .brand .brand-text .app-sub {
        color: rgba(255, 255, 255, 0.4);
        font-size: 10px;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin: 0;
    }

    /* ========== USER PROFILE ========== */
    .user-profile {
        padding: 20px 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .user-profile .avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        flex-shrink: 0;
    }

    .user-profile .user-info .name {
        color: #ffffff;
        font-size: 15px;
        font-weight: 600;
        margin: 0;
    }

    .user-profile .user-info .role {
        color: rgba(255, 255, 255, 0.5);
        font-size: 12px;
        margin: 0;
    }

    /* ========== NAVIGATION ========== */
    .sidebar-nav {
        padding: 10px 12px 20px 12px;
    }

    .sidebar-nav .nav-label {
        color: rgba(255, 255, 255, 0.25);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        padding: 16px 14px 8px 14px;
        font-weight: 700;
    }

    .sidebar-nav .nav {
        display: flex;
        flex-direction: column;
        gap: 2px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-nav .nav li {
        list-style: none;
    }

    .sidebar-nav .nav li a {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 11px 16px;
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.25s ease;
        position: relative;
        cursor: pointer;
    }

    .sidebar-nav .nav li a .nav-icon {
        font-size: 18px;
        width: 24px;
        text-align: center;
        flex-shrink: 0;
        color: rgba(255, 255, 255, 0.4);
    }

    .sidebar-nav .nav li a .nav-text {
        flex: 1;
    }

    .sidebar-nav .nav li a .nav-arrow {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.3);
        transition: transform 0.3s ease;
    }

    .sidebar-nav .nav li a:hover {
        background: rgba(255, 255, 255, 0.06);
        color: #ffffff;
    }

    .sidebar-nav .nav li a:hover .nav-icon {
        color: rgba(255, 255, 255, 0.8);
    }

    .sidebar-nav .nav li a.active {
        background: rgba(78, 115, 223, 0.15);
        color: #4e73df;
    }

    .sidebar-nav .nav li a.active .nav-icon {
        color: #4e73df;
    }

    .sidebar-nav .nav li a.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 24px;
        background: #4e73df;
        border-radius: 0 4px 4px 0;
    }

    /* ========== SUB MENU ========== */
    .sidebar-nav .sub-menu {
        display: none;
        padding-left: 12px;
        margin-top: 2px;
        list-style: none;
    }

    .sidebar-nav .sub-menu.open {
        display: block;
    }

    .sidebar-nav .sub-menu li a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 16px 8px 46px;
        color: rgba(255, 255, 255, 0.4);
        text-decoration: none;
        font-size: 13px;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .sidebar-nav .sub-menu li a:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.05);
    }

    .sidebar-nav .sub-menu li a.active {
        color: #4e73df;
        background: rgba(78, 115, 223, 0.1);
    }

    .sidebar-nav .sub-menu li a .sub-icon {
        font-size: 14px;
        width: 20px;
        text-align: center;
    }

    /* ========== LOGOUT ========== */
    .sidebar-nav .nav li a.logout-link {
        margin-top: 8px;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        padding-top: 16px;
        color: rgba(255, 255, 255, 0.4);
    }

    .sidebar-nav .nav li a.logout-link:hover {
        color: #e74a3b;
        background: rgba(231, 74, 59, 0.1);
    }

    .sidebar-nav .nav li a.logout-link:hover .nav-icon {
        color: #e74a3b;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .sidebar-wrapper {
            left: -280px;
            width: 280px;
        }

        .sidebar-wrapper.open {
            left: 0;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        .sidebar-overlay.open {
            display: block;
        }

        .sidebar-toggle {
            display: block;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
            background: #1a2035;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 20px;
            cursor: pointer;
        }
    }

    @media (min-width: 769px) {
        .sidebar-toggle {
            display: none !important;
        }
        .sidebar-overlay {
            display: none !important;
        }
    }

    /* ========== SCROLLBAR ========== */
    .sidebar-wrapper::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar-wrapper::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.2);
    }
</style>

<!-- ============================================================ -->
<!-- SIDEBAR TOGGLE (Mobile)                                       -->
<!-- ============================================================ -->
<button class="sidebar-toggle" id="sidebarToggle">
    ☰
</button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ============================================================ -->
<!-- SIDEBAR WRAPPER                                              -->
<!-- ============================================================ -->
<div class="sidebar-wrapper" id="sidebarWrapper">
    
    <!-- ========== HEADER ========== -->
    <div class="sidebar-header">
        <div class="brand">
            <span class="logo-icon">📊</span>
            <div class="brand-text">
                <h4 class="app-name">My<span>App</span></h4>
                <p class="app-sub">ADMINISTRATION PANEL</p>
            </div>
        </div>
    </div>

    <!-- ========== USER PROFILE ========== -->
    <?php 
        $username = $this->session->userdata('username') ?: 'Guest';
        $role = $this->session->userdata('role') ?: 'user';
        $inisial = strtoupper(substr($username, 0, 1));
        $roleLabel = $role == 'admin' ? 'Administrator' : 'User';
    ?>
    <div class="user-profile">
        <div class="avatar"><?= $inisial ?></div>
        <div class="user-info">
            <p class="name"><?= htmlspecialchars($username) ?></p>
            <p class="role"><?= $roleLabel ?></p>
        </div>
    </div>

    <!-- ========== NAVIGATION ========== -->
    <div class="sidebar-nav">
        <div class="nav-label">MAIN MENU</div>
        <ul class="nav">
            <li>
                <a href="<?= base_url('dashboard') ?>" class="<?= (uri_string() == 'dashboard' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                    <span class="nav-icon">📊</span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-icon">👤</span>
                    <span class="nav-text">Profile</span>
                </a>
            </li>
            
            <div class="nav-label" style="margin-top: 8px;">MANAGEMENT</div>
            
            <!-- ===== MENU USERS (dengan submenu) ===== -->
            <li>
                <a href="#" class="has-submenu <?= (uri_string() == 'dashboard' && ($this->uri->segment(2) == 'add' || $this->uri->segment(2) == 'edit')) ? 'active' : '' ?>" onclick="toggleSubmenu(event, 'userMenu')">
                    <span class="nav-icon">👥</span>
                    <span class="nav-text">Users</span>
                    <span class="nav-arrow">▼</span>
                </a>
                <ul class="sub-menu <?= (uri_string() == 'dashboard' && ($this->uri->segment(2) == 'add' || $this->uri->segment(2) == 'edit')) ? 'open' : '' ?>" id="userMenu">
                    <li>
                        <a href="<?= base_url('dashboard') ?>" class="<?= (uri_string() == 'dashboard' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                            <span class="sub-icon">📋</span> List User
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('dashboard/add') ?>" class="<?= (uri_string() == 'dashboard' && $this->uri->segment(2) == 'add') ? 'active' : '' ?>">
                            <span class="sub-icon">➕</span> Add User
                        </a>
                    </li>
                </ul>
            </li>
            
           <!-- ===== MENU MAHASISWA (dengan submenu) ===== -->
<li>
    <a href="#" class="has-submenu <?= (uri_string() == 'mhs' || $this->uri->segment(1) == 'mhs') ? 'active' : '' ?>" onclick="toggleSubmenu(event, 'mhsMenu')">
        <span class="nav-icon">🎓</span>
        <span class="nav-text">Mahasiswa</span>
        <span class="nav-arrow">▼</span>
    </a>
    <ul class="sub-menu <?= (uri_string() == 'mhs' || $this->uri->segment(1) == 'mhs') ? 'open' : '' ?>" id="mhsMenu">
        <li>
            <a href="<?= base_url('mhs') ?>" class="<?= (uri_string() == 'mhs' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                <span class="sub-icon">📋</span> List Mahasiswa
            </a>
        </li>
        <li>
            <a href="<?= base_url('mhs/print_data') ?>" class="<?= (uri_string() == 'mhs/print_data') ? 'active' : '' ?>">
                <span class="sub-icon">🖨️</span> Print Laporan
            </a>
        </li>
    </ul>
</li>
            
            <!-- ========== LOGOUT ========== -->
            <li>
                <a href="<?= base_url('auth/logout') ?>" class="logout-link">
                    <span class="nav-icon">🚪</span>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- ============================================================ -->
<!-- JAVASCRIPT                                                    -->
<!-- ============================================================ -->
<script>
    // ========== TOGGLE SIDEBAR (Mobile) ==========
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarWrapper = document.getElementById('sidebarWrapper');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        sidebarWrapper.classList.add('open');
        sidebarOverlay.classList.add('open');
        sidebarToggle.innerHTML = '✕';
    }

    function closeSidebar() {
        sidebarWrapper.classList.remove('open');
        sidebarOverlay.classList.remove('open');
        sidebarToggle.innerHTML = '☰';
    }

    sidebarToggle.addEventListener('click', function() {
        if (sidebarWrapper.classList.contains('open')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    sidebarOverlay.addEventListener('click', closeSidebar);

    // ========== TOGGLE SUBMENU ==========
    function toggleSubmenu(event, menuId) {
        event.preventDefault();
        event.stopPropagation();
        const submenu = document.getElementById(menuId);
        const parent = event.currentTarget;
        const arrow = parent.querySelector('.nav-arrow');

        if (submenu.classList.contains('open')) {
            submenu.classList.remove('open');
            if (arrow) {
                arrow.style.transform = 'rotate(0deg)';
                arrow.textContent = '▼';
            }
        } else {
            submenu.classList.add('open');
            if (arrow) {
                arrow.style.transform = 'rotate(180deg)';
                arrow.textContent = '▲';
            }
        }
    }

    // ========== CLOSE SIDEBAR ON LINK CLICK (Mobile) ==========
    document.querySelectorAll('.sidebar-nav .nav li a:not(.has-submenu)').forEach(function(link) {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                closeSidebar();
            }
        });
    });

    // ========== CLOSE SIDEBAR ON RESIZE ==========
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768 && sidebarWrapper.classList.contains('open')) {
            closeSidebar();
        }
    });
</script>