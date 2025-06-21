<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Gallery - Adrian Lesniak</title>
    <meta name="description" content="Modern photo gallery with filters and effects." />
    <meta name="keywords" content="gallery, photos, portfolio, design" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="Adrian Lesniak" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
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

        /* Filter Buttons */
        .filter-section {
            padding: 2rem 0;
            text-align: center;
        }

        .filter-btn {
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

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(240, 147, 251, 0.3);
            color: var(--text-light);
        }

        /* Gallery Grid */
        .gallery-section {
            padding: 2rem 0 4rem 0;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem 0;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: var(--accent-color);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.8), rgba(240, 147, 251, 0.8));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay-content {
            text-align: center;
            color: white;
        }

        .gallery-overlay-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .gallery-overlay-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .gallery-overlay-category {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Category Badge */
        .category-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            z-index: 2;
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
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }
            
            .filter-btn {
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

        /* Lightbox Customization */
        .lb-data .lb-caption {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .lb-nav a.lb-prev,
        .lb-nav a.lb-next {
            opacity: 0.8;
        }

        .lb-nav a.lb-prev:hover,
        .lb-nav a.lb-next:hover {
            opacity: 1;
        }
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
                        <a class="nav-link active" href="galeria.php">
                            <i class="fas fa-images me-1"></i>Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista.php">
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
            <h1 class="header-title" data-aos="fade-up">Photo Gallery</h1>
            <p class="header-subtitle" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-camera me-2"></i>Browse a collection of beautiful photos from different categories
            </p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-buttons" data-aos="fade-up" data-aos-delay="300">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th me-2"></i>All
                </button>
                <button class="filter-btn" data-filter="nature">
                    <i class="fas fa-tree me-2"></i>Nature
                </button>
                <button class="filter-btn" data-filter="city">
                    <i class="fas fa-city me-2"></i>City
                </button>
                <button class="filter-btn" data-filter="abstract">
                    <i class="fas fa-palette me-2"></i>Abstract
                </button>
                <button class="filter-btn" data-filter="technology">
                    <i class="fas fa-microchip me-2"></i>Technology
                </button>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="25">0</div>
                        <div class="stat-label">Photos</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="5">0</div>
                        <div class="stat-label">Categories</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="100">0</div>
                        <div class="stat-label">% Quality</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-count="2024">0</div>
                        <div class="stat-label">Year</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="gallery-grid" id="galleryGrid">
                <?php
                // Mixed images from local folder and Internet
                $images = [
                    // Local images
                    ['src' => 'img/1.jpg', 'category' => 'nature', 'title' => 'Beautiful Landscape', 'alt' => 'Natural landscape'],
                    ['src' => 'img/2.jpg', 'category' => 'city', 'title' => 'Modern City', 'alt' => 'Urban architecture'],
                    ['src' => 'img/3.jpg', 'category' => 'abstract', 'title' => 'Abstract Forms', 'alt' => 'Abstract art'],
                    ['src' => 'img/4.jpg', 'category' => 'technology', 'title' => 'Future Technology', 'alt' => 'Technological innovations'],
                    ['src' => 'img/5.jpg', 'category' => 'nature', 'title' => 'Wild Nature', 'alt' => 'Nature'],
                    ['src' => 'img/6.jpg', 'category' => 'city', 'title' => 'City Life', 'alt' => 'City'],
                    ['src' => 'img/7.jpg', 'category' => 'abstract', 'title' => 'Colorful Patterns', 'alt' => 'Patterns'],
                    ['src' => 'img/8.jpg', 'category' => 'technology', 'title' => 'Digital World', 'alt' => 'Digitalization'],
                    ['src' => 'img/9.jpg', 'category' => 'nature', 'title' => 'Mountain Views', 'alt' => 'Mountains'],
                    ['src' => 'img/10.jpg', 'category' => 'city', 'title' => 'Skyscrapers', 'alt' => 'Architecture'],
                    
                    // Images from Internet
                    ['src' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop', 'category' => 'nature', 'title' => 'Mountain Landscape', 'alt' => 'Mountains'],
                    ['src' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=400&h=300&fit=crop', 'category' => 'city', 'title' => 'Modern Architecture', 'alt' => 'Architecture'],
                    ['src' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop', 'category' => 'technology', 'title' => 'AI Technology', 'alt' => 'Artificial Intelligence'],
                    ['src' => 'https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=400&h=300&fit=crop', 'category' => 'abstract', 'title' => 'Abstract Colors', 'alt' => 'Colors'],
                    ['src' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop', 'category' => 'nature', 'title' => 'Wild Nature', 'alt' => 'Nature'],
                    ['src' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=400&h=300&fit=crop', 'category' => 'city', 'title' => 'City at Night', 'alt' => 'Night City'],
                    ['src' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop', 'category' => 'technology', 'title' => 'Digital Future', 'alt' => 'Future'],
                    ['src' => 'https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=400&h=300&fit=crop', 'category' => 'abstract', 'title' => 'Modern Art', 'alt' => 'Art'],
                    ['src' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop', 'category' => 'nature', 'title' => 'Lake', 'alt' => 'Water'],
                    ['src' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=400&h=300&fit=crop', 'category' => 'city', 'title' => 'Bridge', 'alt' => 'Infrastructure'],
                    ['src' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop', 'category' => 'technology', 'title' => 'Robotics', 'alt' => 'Robots'],
                    ['src' => 'https://images.unsplash.com/photo-1541701494587-cb58502866ab?w=400&h=300&fit=crop', 'category' => 'abstract', 'title' => 'Geometry', 'alt' => 'Shapes'],
                    ['src' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop', 'category' => 'nature', 'title' => 'Forest', 'alt' => 'Trees'],
                    ['src' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?w=400&h=300&fit=crop', 'category' => 'city', 'title' => 'City Square', 'alt' => 'Urban Space']
                ];

                $categoryIcons = [
                    'nature' => 'fas fa-tree',
                    'city' => 'fas fa-city',
                    'abstract' => 'fas fa-palette',
                    'technology' => 'fas fa-microchip'
                ];

                $categoryNames = [
                    'nature' => 'Nature',
                    'city' => 'City',
                    'abstract' => 'Abstract',
                    'technology' => 'Technology'
                ];

                foreach ($images as $index => $image) {
                    $category = $image['category'];
                    $icon = $categoryIcons[$category] ?? 'fas fa-image';
                    $categoryName = $categoryNames[$category] ?? 'Other';
                    
                    echo '<div class="gallery-item" data-category="' . $category . '" data-aos="fade-up" data-aos-delay="' . ($index * 100) . '">';
                    echo '<div class="category-badge">' . $categoryName . '</div>';
                    echo '<a href="' . $image['src'] . '" data-lightbox="gallery" data-title="' . $image['title'] . '">';
                    echo '<img src="' . $image['src'] . '" alt="' . $image['alt'] . '" loading="lazy">';
                    echo '<div class="gallery-overlay">';
                    echo '<div class="gallery-overlay-content">';
                    echo '<div class="gallery-overlay-icon"><i class="' . $icon . '"></i></div>';
                    echo '<div class="gallery-overlay-title">' . $image['title'] . '</div>';
                    echo '<div class="gallery-overlay-category">' . $categoryName . '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
                ?>
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
                    <a href="#" class="social-link" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="mailto:adrian.lesniak@email.com" class="social-link" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
                <p>&copy; 2024 Adrian Leśniak. All rights reserved.</p>
                <p style="font-size: 0.9rem; opacity: 0.8;">
                    Gallery created with <i class="fas fa-heart text-danger"></i> and <i class="fas fa-camera text-warning"></i>
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
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

        // Filter Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    
                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter gallery items
                    galleryItems.forEach(item => {
                        const category = item.getAttribute('data-category');
                        
                        if (filter === 'all' || category === filter) {
                            item.style.display = 'block';
                            item.style.animation = 'fadeIn 0.5s ease';
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Update stats
                    updateStats(filter);
                });
            });

            // Animate stats
            animateStats();
        });

        // Animate Statistics
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

        // Update stats based on filter
        function updateStats(filter) {
            const totalItems = document.querySelectorAll('.gallery-item').length;
            const visibleItems = document.querySelectorAll('.gallery-item[style*="block"]').length;
            
            const statsContainer = document.querySelector('.stat-number[data-count="25"]');
            if (statsContainer) {
                statsContainer.textContent = visibleItems;
            }
        }

        // Lightbox configuration
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': 'Photo %1 of %2',
            'fadeDuration': 300,
            'imageFadeDuration': 300
        });

        // Add hover effects to gallery items
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Add keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                // Close lightbox if open
                if (document.querySelector('.lb-outerContainer')) {
                    document.querySelector('.lb-close').click();
                }
            }
        });

        // Add lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    </script>
</body>

</html> 