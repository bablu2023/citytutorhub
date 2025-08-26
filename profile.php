<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM tutors WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $tutor = $result->fetch_assoc();
    } else {
        die("Tutor not found.");
    }
    $stmt->close();
} else {
    die("No tutor ID provided.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tutor['name']); ?> - Tutor Profile</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1E3A8A;
            --secondary: #3B82F6;
            --background: #F8F9FA;
            --text: #212529;
            --white: #FFFFFF;
            --transition: all 0.3s ease;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            background-color: var(--background);
            transition: var(--transition);
        }
        .navbar {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            transition: background-color 0.3s ease, opacity 0.3s ease;
        }
        .navbar.scrolled {
            background: rgba(30, 58, 138, 0.9);
        }
        .navbar-brand, .nav-link {
            color: var(--white) !important;
            font-weight: 600;
            position: relative;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--secondary) !important;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--white);
            animation: underline 0.3s ease forwards;
        }
        @keyframes underline {
            from { width: 0; }
            to { width: 100%; }
        }
        .card {
            border: none;
            border-radius: 12px;
            transition: var(--transition);
        }
        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        .modal-content {
            border-radius: 12px;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: var(--transition);
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 8px;
            transition: var(--transition);
        }
        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: scale(1.05);
        }
        .form-control, .form-control:focus {
            border-radius: 8px;
            border-color: #CED4DA;
            box-shadow: none;
            transition: var(--transition);
        }
        .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        .alert {
            animation: alertFadeIn 0.5s ease-in-out;
            border-radius: 8px;
        }
        @keyframes alertFadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        button:focus, a:focus {
            outline: 2px solid var(--secondary);
            outline-offset: 2px;
        }
        h1, h2, h3 {
            letter-spacing: 0.025em;
            font-weight: 700;
        }
        .navbar-toggler {
            border: none;
            padding: 8px;
            position: relative;
        }
        .navbar-toggler-icon {
            background-image: none;
            width: 24px;
            height: 2px;
            background: var(--white);
            position: relative;
            transition: var(--transition);
        }
        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: var(--white);
            transition: var(--transition);
        }
        .navbar-toggler-icon::before {
            top: -8px;
        }
        .navbar-toggler-icon::after {
            top: 8px;
        }
        .navbar-toggler.active .navbar-toggler-icon {
            background: transparent;
        }
        .navbar-toggler.active .navbar-toggler-icon::before {
            transform: rotate(45deg);
            top: 0;
        }
        .navbar-toggler.active .navbar-toggler-icon::after {
            transform: rotate(-45deg);
            top: 0;
        }
        [data-theme="dark"] {
            --background: #1F2937;
            --text: #F8F9FA;
        }
        .theme-toggle {
            transition: var(--transition);
        }
        .theme-toggle:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md sticky-top shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">CityTutorHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register as Tutor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn theme-toggle text-white p-2" id="theme-toggle" aria-label="Toggle theme">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5 py-md-6 fade-in">
        <div class="container">
            <h2 class="display-5 fw-bold mb-5 text-center">Tutor Profile</h2>
            <div class="card mx-auto" style="max-width: 500px;">
                <div class="card-body">
                    <h3 class="card-title h4 mb-4"><?php echo htmlspecialchars($tutor['name']); ?></h3>
                    <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($tutor['email']); ?></p>
                    <p class="card-text"><strong>City:</strong> <?php echo htmlspecialchars($tutor['city']); ?></p>
                    <p class="card-text"><strong>Subject:</strong> <?php echo htmlspecialchars($tutor['subject']); ?></p>
                    <p class="card-text"><strong>Bio:</strong> <?php echo nl2br(htmlspecialchars($tutor['bio'])); ?></p>
                    <button id="contact-tutor" class="btn btn-primary btn-lg mt-4" data-bs-toggle="modal" data-bs-target="#contactModal">Contact Tutor</button>
                </div>
            </div>
            <div id="contact-feedback" class="mt-4 mx-auto" style="max-width: 500px;"></div>
        </div>
    </section>
    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact <?php echo htmlspecialchars($tutor['name']); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tutor-contact-form">
                        <div class="mb-4">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required aria-label="Name">
                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required aria-label="Email">
                        </div>
                        <div class="mb-4">
                            <textarea name="message" class="form-control" placeholder="Your Message" rows="4" required aria-label="Message"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                    <div id="modal-feedback" class="mt-4"></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-gradient-to-r from-[var(--primary)] to-[var(--secondary)] text-white py-4 text-center">
        <p>&copy; 2025 CityTutorHub. All rights reserved.</p>
    </footer>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Debounce Function
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Navbar Toggler
        const navbarToggler = document.querySelector('.navbar-toggler');
        let isToggling = false;
        const toggleNavbar = debounce(() => {
            if (isToggling) return;
            isToggling = true;
            navbarToggler.classList.toggle('active');
            setTimeout(() => { isToggling = false; }, 300);
        }, 300);
        navbarToggler.addEventListener('click', toggleNavbar);

        // Active Nav Link Highlighting
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            if (link.href === window.location.href.split('?')[0]) {
                link.classList.add('active');
            }
            link.addEventListener('click', () => {
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
                const navbarCollapse = document.querySelector('#navbarNav');
                if (navbarCollapse.classList.contains('show')) {
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                    navbarToggler.classList.remove('active');
                }
            });
        });

        // Scroll-Based Navbar Opacity
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // IntersectionObserver for Fade-In
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.dataset.theme = document.body.dataset.theme === 'dark' ? 'light' : 'dark';
        });

        // Contact Form Submission
        function showAlert(containerId, message, type) {
            const feedbackDiv = document.getElementById(containerId);
            feedbackDiv.innerHTML = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
        }

        document.getElementById('tutor-contact-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            formData.append('tutor_email', '<?php echo htmlspecialchars($tutor['email']); ?>');
            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok: ' + response.statusText);
                    return response.json();
                })
                .then(data => {
                    showAlert('modal-feedback', data.message, data.status === 'success' ? 'success' : 'danger');
                    if (data.status === 'success') {
                        e.target.reset();
                        setTimeout(() => {
                            bootstrap.Modal.getInstance(document.getElementById('contactModal')).hide();
                            document.getElementById('modal-feedback').innerHTML = '';
                        }, 2000);
                    }
                })
                .catch(error => {
                    console.error('Tutor Contact Error:', error);
                    showAlert('modal-feedback', 'An error occurred: ' + error.message, 'danger');
                });
        });
    </script>
</body>
</html>