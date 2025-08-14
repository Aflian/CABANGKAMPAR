<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC IMM Kampar - Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-maroon: #800020;
            --dark-maroon: #5d0017;
            --light-maroon: #a6002a;
            --accent-gold: #ffd700;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Header Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-maroon) 0%, var(--dark-maroon) 100%);
            padding: 1rem 0;
            box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
            backdrop-filter: blur(10px);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 15px;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: var(--accent-gold) !important;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: var(--accent-gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-maroon) 0%, var(--dark-maroon) 50%, var(--light-maroon) 100%);
            min-height: 70vh;
            display: flex;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--accent-gold) 0%, #ffed4e 100%);
            border: none;
            color: var(--dark-maroon);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 215, 0, 0.4);
            color: var(--dark-maroon);
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 80px 0;
            box-shadow: 0 -5px 20px rgba(0,0,0,0.1);
        }

        .stats-card {
            background: linear-gradient(135deg, var(--primary-maroon) 0%, var(--dark-maroon) 100%);
            color: white;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.6s ease;
            opacity: 0;
        }

        .stats-card:hover::before {
            opacity: 1;
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }

        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(128, 0, 32, 0.3);
        }

        .stats-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--accent-gold);
            margin-bottom: 10px;
        }

        .stats-label {
            font-size: 1.1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stats-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--accent-gold);
        }

        /* Section Styles */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-maroon);
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-maroon), var(--accent-gold));
            border-radius: 2px;
        }

        /* Posts Section */
        .posts-section {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .post-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .post-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .post-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-maroon), var(--light-maroon));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .post-content {
            padding: 25px;
        }

        .post-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-maroon);
            margin-bottom: 15px;
        }

        .post-excerpt {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .post-date {
            color: #999;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Structure Section */
        .structure-section {
            padding: 80px 0;
            background: white;
        }

        .org-chart {
            max-width: 800px;
            margin: 0 auto;
        }

        .position-card {
            background: linear-gradient(135deg, var(--primary-maroon) 0%, var(--dark-maroon) 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            margin: 10px;
            transition: all 0.3s ease;
        }

        .position-card:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(128, 0, 32, 0.3);
        }

        .position-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: var(--accent-gold);
        }

        .position-name {
            font-size: 1rem;
            font-weight: 500;
        }

        /* Komisariat Section */
        .komisariat-section {
            background: #f8f9fa;
            padding: 80px 0;
        }

        .komisariat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            height: 100%;
        }

        .komisariat-card:hover {
            border-color: var(--primary-maroon);
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(128, 0, 32, 0.2);
        }

        .komisariat-icon {
            font-size: 4rem;
            color: var(--primary-maroon);
            margin-bottom: 20px;
        }

        .komisariat-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-maroon);
            margin-bottom: 15px;
        }

        .komisariat-info {
            color: #666;
            line-height: 1.6;
        }

        /* Activities Section */
        .activities-section {
            padding: 80px 0;
            background: white;
        }

        .activity-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .activity-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-maroon), var(--accent-gold));
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        .activity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border-color: var(--primary-maroon);
        }

        .activity-card:hover::before {
            transform: translateY(0);
        }

        .activity-icon {
            font-size: 3.5rem;
            color: var(--primary-maroon);
            margin-bottom: 20px;
        }

        .activity-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-maroon);
            margin-bottom: 15px;
        }

        .activity-description {
            color: #666;
            line-height: 1.7;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--dark-maroon) 0%, var(--primary-maroon) 100%);
            color: white;
            padding: 50px 0 30px 0;
        }

        .footer h5 {
            color: var(--accent-gold);
            font-weight: 600;
            margin-bottom: 20px;
        }

        .footer a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer a:hover {
            color: var(--accent-gold);
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--accent-gold);
            color: var(--dark-maroon);
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .stats-card {
                margin-bottom: 30px;
            }

            .position-card {
                margin-bottom: 20px;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    @include('component.nav')
    <!-- Hero Section -->
    @include('component.hero')
    {{-- COROUSEL SECTION --}}
    @include('component.slider')
    {{-- COROUSEL SECTION --}}
    <!-- Stats/Rekap Kader Section -->
    @include('component.stat')
    <!-- Posts Section -->
    @include('component.post')
    <!-- Struktur Organisasi -->
    @include('component.struktur')
    <!-- Komisariat Section -->
    @include('component.komisariat')
    <!-- Kegiatan Kader Section -->
    @include('component.kegiatan')
    <!-- Footer -->
    @include('component.footer')
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'linear-gradient(135deg, var(--primary-maroon) 0%, var(--dark-maroon) 100%)';
                navbar.style.boxShadow = '0 4px 15px rgba(128, 0, 32, 0.4)';
            } else {
                navbar.style.background = 'linear-gradient(135deg, var(--primary-maroon) 0%, var(--dark-maroon) 100%)';
                navbar.style.boxShadow = '0 4px 15px rgba(128, 0, 32, 0.3)';
            }
        });

        // Counter animation for stats
        function animateCounter(element, start, end, duration) {
            let startTime = null;
            const step = (timestamp) => {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                const current = Math.floor(progress * (end - start) + start);
                element.textContent = current;
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            };
            requestAnimationFrame(step);
        }

        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-on-scroll');

                    // Animate counters when stats section is visible
                    if (entry.target.classList.contains('stats-section')) {
                        const counters = entry.target.querySelectorAll('.stats-number');
                        counters.forEach(counter => {
                            const target = parseInt(counter.textContent);
                            counter.textContent = '0';
                            animateCounter(counter, 0, target, 2000);
                        });
                    }
                }
            });
        }, { threshold: 0.1 });

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });

        // Add active class to navbar items on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.pageYOffset >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        // Add hover effect for cards
        document.querySelectorAll('.stats-card, .post-card, .position-card, .komisariat-card, .activity-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Loading animation
        window.addEventListener('load', function() {
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease-in-out';
                document.body.style.opacity = '1';
            }, 100);
        });
    </script>
</body>
</html>