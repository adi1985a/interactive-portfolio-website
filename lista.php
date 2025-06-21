<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Users List - Adrian Lesniak</title>
    <meta name="description" content="Modern users list with sorting and search functionality.">
    <meta name="keywords" content="users, list, management, web development">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Adrian Lesniak">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --text-light: #ffffff;
            --text-dark: #2d3748;
            --bg-dark: #1a202c;
            --card-bg: rgba(255, 255, 255, 0.1);
            --glass-bg: rgba(255, 255, 255, 0.05);
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --danger-color: #f56565;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 50%, var(--accent-color) 100%);
            min-height: 100vh;
            color: var(--text-light);
            overflow-x: hidden;
        }

        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Navbar */
        .navbar {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-light) !important;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            color: var(--text-light) !important;
        }

        /* Header Section */
        .header-section {
            padding: 120px 0 60px 0;
            text-align: center;
        }

        .header-title {
            font-family: 'Orbitron', monospace;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, var(--accent-color), var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
        }

        /* Search and Filter Section */
        .search-section {
            padding: 2rem 0;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            margin: 2rem 0;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-light);
            padding: 0.75rem 1rem;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent-color);
            box-shadow: 0 0 20px rgba(240, 147, 251, 0.3);
            color: var(--text-light);
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .sort-btn {
            background: var(--glass-bg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-light);
            padding: 0.75rem 1.5rem;
            margin: 0.5rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-weight: 500;
        }

        .sort-btn:hover,
        .sort-btn.active {
            background: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(240, 147, 251, 0.3);
            color: var(--text-light);
        }

        /* Table Styles */
        .table-container {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            margin: 2rem 0;
        }

        .table {
            margin: 0;
            color: var(--text-light);
        }

        .table thead th {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            padding: 1.5rem 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .table thead th:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .table thead th.sortable::after {
            content: '\f0dc';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 1rem;
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .table thead th.sortable.asc::after {
            content: '\f0de';
            opacity: 1;
            color: var(--accent-color);
        }

        .table thead th.sortable.desc::after {
            content: '\f0dd';
            opacity: 1;
            color: var(--accent-color);
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 1.5rem 1rem;
            border: none;
            vertical-align: middle;
        }

        .user-id {
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            min-width: 50px;
            text-align: center;
        }

        .user-name {
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .user-status {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            text-transform: uppercase;
        }

        .status-active {
            background: var(--success-color);
            color: white;
        }

        .status-inactive {
            background: var(--danger-color);
            color: white;
        }

        .status-pending {
            background: var(--warning-color);
            color: white;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0;
        }

        .pagination-btn {
            background: var(--glass-bg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-light);
            padding: 0.5rem 1rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            text-decoration: none;
        }

        .pagination-btn:hover,
        .pagination-btn.active {
            background: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
            color: var(--text-light);
            text-decoration: none;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        /* Stats Section */
        .stats-section {
            padding: 3rem 0;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            margin: 2rem 0;
        }

        .stat-item {
            text-align: center;
            padding: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
        }

        /* Footer */
        footer {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem 0;
            margin-top: 4rem;
        }

        .footer-content {
            text-align: center;
        }

        .social-links {
            margin-bottom: 1rem;
        }

        .social-link {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 0.5rem;
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
            color: var(--text-light);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-title {
                font-size: 2.5rem;
            }
            
            .table-responsive {
                border-radius: 15px;
            }
            
            .table thead th,
            .table tbody td {
                padding: 1rem 0.5rem;
                font-size: 0.9rem;
            }
            
            .user-name {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
            }
            
            .sort-btn {
                margin: 0.25rem;
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }

        /* Loading Animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--bg-dark);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s;
        }

        .loading.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid var(--accent-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Animation for table rows */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table tbody tr {
            animation: fadeInUp 0.5s ease forwards;
        }

        .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .table tbody tr:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>

<body>
    <!-- Loading Screen -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Animated Background -->
    <div class="animated-bg"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-code me-2"></i>Adrian Lesniak
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="galeria.php">
                            <i class="fas fa-images me-1"></i>Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="lista.php">
                            <i class="fas fa-users me-1"></i>Users List
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <section class="header-section">
        <div class="container">
            <h1 class="header-title" data-aos="fade-up">Users List</h1>
            <p class="header-subtitle" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-users me-2"></i>Manage and browse users list with advanced features
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="20">0</div>
                        <div class="stat-label">Users</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="15">0</div>
                        <div class="stat-label">Active</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="3">0</div>
                        <div class="stat-label">Pending</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="2">0</div>
                        <div class="stat-label">Inactive</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="search-section">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="fas fa-search text-light"></i>
                        </span>
                        <input type="text" class="form-control search-input" id="searchInput" 
                               placeholder="Search users..." autocomplete="off">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap justify-content-md-end">
                        <button class="sort-btn" data-sort="id">
                            <i class="fas fa-sort-numeric-down me-2"></i>Sort by ID
                        </button>
                        <button class="sort-btn" data-sort="name">
                            <i class="fas fa-sort-alpha-down me-2"></i>Sort by Name
                        </button>
                        <button class="sort-btn" data-sort="status">
                            <i class="fas fa-filter me-2"></i>Filter Status
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Table Section -->
    <section class="table-section">
        <div class="container">
            <div class="table-container" data-aos="fade-up" data-aos-delay="300">
                <div class="table-responsive">
                    <table class="table" id="usersTable">
                        <thead>
                            <tr>
                                <th class="sortable" data-sort="id">
                                    <i class="fas fa-hashtag me-2"></i>ID
                                </th>
                                <th class="sortable" data-sort="name">
                                    <i class="fas fa-user me-2"></i>Name
                                </th>
                                <th class="sortable" data-sort="status">
                                    <i class="fas fa-circle me-2"></i>Status
                                </th>
                                <th>
                                    <i class="fas fa-cog me-2"></i>Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            <?php
                            $lines = file('Lista.txt');
                            $users = [];
                            
                            // Parse users from file
                            foreach ($lines as $index => $line) {
                                $name = trim($line);
                                if (!empty($name)) {
                                    $users[] = [
                                        'id' => $index + 1,
                                        'name' => $name,
                                        'status' => ['active', 'pending', 'inactive'][array_rand(['active', 'pending', 'inactive'])]
                                    ];
                                }
                            }

                            // Generate additional users for demonstration
                            $additionalNames = [
                                'John Smith', 'Anna Johnson', 'Peter Wilson', 'Maria Davis',
                                'Thomas Brown', 'Katherine Miller', 'Andrew Garcia',
                                'Madeline Rodriguez', 'Michael Martinez', 'Joanna Anderson'
                            ];

                            foreach ($additionalNames as $name) {
                                $users[] = [
                                    'id' => count($users) + 1,
                                    'name' => $name,
                                    'status' => ['active', 'pending', 'inactive'][array_rand(['active', 'pending', 'inactive'])]
                                ];
                            }

                            // Display users
                            foreach ($users as $user) {
                                $statusClass = 'status-' . $user['status'];
                                $statusText = ucfirst($user['status']);
                                $initials = strtoupper(substr($user['name'], 0, 2));
                                
                                echo '<tr data-id="' . $user['id'] . '" data-name="' . strtolower($user['name']) . '" data-status="' . $user['status'] . '">';
                                echo '<td><span class="user-id">' . $user['id'] . '</span></td>';
                                echo '<td>';
                                echo '<div class="user-name">';
                                echo '<div class="user-avatar">' . $initials . '</div>';
                                echo '<span>' . $user['name'] . '</span>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td><span class="user-status ' . $statusClass . '">' . $statusText . '</span></td>';
                                echo '<td>';
                                echo '<button class="btn btn-sm btn-outline-light me-1" onclick="editUser(' . $user['id'] . ')" title="Edit">';
                                echo '<i class="fas fa-edit"></i>';
                                echo '</button>';
                                echo '<button class="btn btn-sm btn-outline-danger" onclick="deleteUser(' . $user['id'] . ')" title="Delete">';
                                echo '<i class="fas fa-trash"></i>';
                                echo '</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination-container" id="pagination">
                <button class="pagination-btn" id="prevPage" disabled>
                    <i class="fas fa-chevron-left me-1"></i>Previous
                </button>
                <span class="text-light">Page <span id="currentPage">1</span> of <span id="totalPages">1</span></span>
                <button class="pagination-btn" id="nextPage">
                    Next<i class="fas fa-chevron-right ms-1"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="social-links">
                    <a href="#" class="social-link" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="social-link" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="social-link" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="mailto:adr.lesniak@gmail.com" class="social-link" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
                <p>&copy; 2024 Adrian Leśniak. All rights reserved.</p>
                <p style="font-size: 0.9rem; opacity: 0.8;">
                    Users list created with <i class="fas fa-heart text-danger"></i> and <i class="fas fa-users text-warning"></i>
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Loading Screen
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loading').classList.add('hidden');
            }, 1000);
        });

        // Global variables
        let currentSort = { field: 'id', direction: 'asc' };
        let currentFilter = 'all';
        let currentPage = 1;
        const itemsPerPage = 10;
        let allUsers = [];

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            // Get all users from table
            const rows = document.querySelectorAll('#usersTableBody tr');
            allUsers = Array.from(rows).map(row => ({
                id: parseInt(row.dataset.id),
                name: row.dataset.name,
                status: row.dataset.status,
                element: row
            }));

            // Initialize functionality
            initializeSearch();
            initializeSorting();
            initializePagination();
            animateStats();
        });

        // Search functionality
        function initializeSearch() {
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                filterUsers(searchTerm);
            });
        }

        function filterUsers(searchTerm) {
            const rows = document.querySelectorAll('#usersTableBody tr');
            let visibleCount = 0;

            rows.forEach(row => {
                const name = row.dataset.name;
                const matches = name.includes(searchTerm);
                row.style.display = matches ? 'table-row' : 'none';
                if (matches) visibleCount++;
            });

            updateStats(visibleCount);
            currentPage = 1;
            updatePagination();
        }

        // Sorting functionality
        function initializeSorting() {
            const sortButtons = document.querySelectorAll('.sort-btn');
            const sortableHeaders = document.querySelectorAll('.sortable');

            sortButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const sortField = this.dataset.sort;
                    sortUsers(sortField);
                    
                    // Update button states
                    sortButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            sortableHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const sortField = this.dataset.sort;
                    sortUsers(sortField);
                });
            });
        }

        function sortUsers(field) {
            const tbody = document.getElementById('usersTableBody');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            // Update sort direction
            if (currentSort.field === field) {
                currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
            } else {
                currentSort.field = field;
                currentSort.direction = 'asc';
            }

            // Sort rows
            rows.sort((a, b) => {
                let aValue, bValue;

                switch (field) {
                    case 'id':
                        aValue = parseInt(a.dataset.id);
                        bValue = parseInt(b.dataset.id);
                        break;
                    case 'name':
                        aValue = a.dataset.name;
                        bValue = b.dataset.name;
                        break;
                    case 'status':
                        aValue = a.dataset.status;
                        bValue = b.dataset.status;
                        break;
                    default:
                        return 0;
                }

                if (currentSort.direction === 'asc') {
                    return aValue > bValue ? 1 : -1;
                } else {
                    return aValue < bValue ? 1 : -1;
                }
            });

            // Update table
            rows.forEach(row => tbody.appendChild(row));

            // Update header indicators
            updateSortIndicators(field);
        }

        function updateSortIndicators(field) {
            const headers = document.querySelectorAll('.sortable');
            headers.forEach(header => {
                header.classList.remove('asc', 'desc');
                if (header.dataset.sort === field) {
                    header.classList.add(currentSort.direction);
                }
            });
        }

        // Pagination functionality
        function initializePagination() {
            const prevBtn = document.getElementById('prevPage');
            const nextBtn = document.getElementById('nextPage');

            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    updatePagination();
                }
            });

            nextBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(getVisibleUsers().length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    updatePagination();
                }
            });

            updatePagination();
        }

        function updatePagination() {
            const visibleUsers = getVisibleUsers();
            const totalPages = Math.ceil(visibleUsers.length / itemsPerPage);
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            // Show/hide rows based on current page
            visibleUsers.forEach((user, index) => {
                user.element.style.display = (index >= startIndex && index < endIndex) ? 'table-row' : 'none';
            });

            // Update pagination controls
            document.getElementById('currentPage').textContent = currentPage;
            document.getElementById('totalPages').textContent = totalPages;
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = currentPage === totalPages;
        }

        function getVisibleUsers() {
            return allUsers.filter(user => user.element.style.display !== 'none');
        }

        // Statistics animation
        function animateStats() {
            const stats = document.querySelectorAll('.stat-number');
            stats.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-count'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    stat.textContent = Math.floor(current);
                }, 16);
            });
        }

        function updateStats(visibleCount) {
            const totalStats = document.querySelector('.stat-number[data-count="20"]');
            if (totalStats) {
                totalStats.textContent = visibleCount;
            }
        }

        // User actions
        function editUser(id) {
            const user = allUsers.find(u => u.id === id);
            if (user) {
                alert(`Editing user: ${user.name}`);
                // Here you would typically open a modal or form for editing
            }
        }

        function deleteUser(id) {
            const user = allUsers.find(u => u.id === id);
            if (user && confirm(`Are you sure you want to delete user: ${user.name}?`)) {
                user.element.remove();
                allUsers = allUsers.filter(u => u.id !== id);
                updateStats(allUsers.length);
                updatePagination();
            }
        }

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch (e.key) {
                    case 'f':
                        e.preventDefault();
                        document.getElementById('searchInput').focus();
                        break;
                    case 's':
                        e.preventDefault();
                        // Save functionality could be added here
                        break;
                }
            }
        });

        // Add tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>

</html> 