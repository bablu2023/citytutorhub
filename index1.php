<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityTutorHub - Find Your Perfect Tutor</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* CSS Variables */
        :root {
            --teal: #005566;
            --teal-dark: #003d4d;
            --teal-hover: #004d59;
            --coral: #ff6f61;
            --coral-dark: #e55a50;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --dark-bg: #003d4d;
            --darker-bg: #002a36;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            --hover-shadow: 0 8px 24px rgba(255, 111, 97, 0.3);
            --transition: all 0.3s ease;
            --glass-bg: rgba(255, 255, 255, 0.2);
            --glass-blur: blur(15px);
            --glass-border: 1px solid rgba(255, 255, 255, 0.3);
            --text-color: #333;
            --dark-text: #ffffff;
            --dark-bg-alt: #1a2525;
            --error-color: #d32f2f;
            --success-color: #2e7d32;
        }
        [data-theme="dark"] {
            --light-bg: #1e2a2a;
            --white: #2a3a3a;
            --text-color: #e0e0e0;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            --hover-shadow: 0 8px 24px rgba(255, 111, 97, 0.4);
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: 1px solid rgba(255, 255, 255, 0.2);
        }
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.8;
            color: var(--text-color);
            background-color: var(--light-bg);
            margin: 0;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        /* Animations */
        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        @keyframes liftAndGlow {
            0% { transform: translateY(0); box-shadow: var(--shadow); }
            50% { transform: translateY(-6px); box-shadow: 0 10px 20px rgba(255, 111, 97, 0.3); }
            100% { transform: translateY(0); box-shadow: var(--shadow); }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        @keyframes errorPulse {
            0% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); opacity: 0.8; }
        }
        .fade-in-scale {
            opacity: 0;
            animation: fadeInScale 0.5s ease-out forwards;
        }
        .fade-in-scale:nth-child(2) { animation-delay: 0.1s; }
        .fade-in-scale:nth-child(3) { animation-delay: 0.2s; }
        .fade-in-scale:nth-child(4) { animation-delay: 0.3s; }
        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--teal), var(--teal-hover));
            padding: 1rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar.scrolled {
            background: rgba(0, 85, 102, 0.9);
        }
        .navbar-brand img {
            height: 40px;
            transition: var(--transition);
        }
        .navbar-brand img:hover {
            transform: scale(1.1);
        }
        .nav-link {
            color: var(--white) !important;
            font-weight: 500;
            margin-left: 1.5rem;
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            transition: var(--transition);
            position: relative;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--coral) !important;
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
        .navbar-nav .cta-button {
            background-color: var(--coral);
            color: var(--white);
            padding: 0.6rem 1.8rem;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: var(--shadow);
        }
        .navbar-nav .cta-button:hover {
            background-color: var(--coral-dark);
            transform: scale(1.02);
            box-shadow: var(--hover-shadow);
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
        .theme-toggle {
            background: none;
            border: none;
            color: var(--white);
            font-size: 1.2rem;
            cursor: pointer;
            margin-left: 1rem;
            transition: var(--transition);
        }
        .theme-toggle:hover {
            transform: scale(1.1);
        }
        /* Form Styling */
        .form-group {
            position: relative;
            margin-bottom: 1.8rem;
        }
        .form-control {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            background: var(--white);
            color: var(--text-color);
            transition: var(--transition);
        }
        .form-control:focus {
            border-color: var(--coral);
            box-shadow: 0 0 8px rgba(255, 111, 97, 0.3);
            outline: none;
        }
        .form-control:not(:placeholder-shown) + .form-control-label,
        .form-control:focus + .form-control-label {
            transform: translateY(-2.8rem) scale(0.85);
            color: var(--coral);
            background: var(--white);
            padding: 0 0.5rem;
        }
        .form-control-label {
            position: absolute;
            top: 0.9rem;
            left: 1.2rem;
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            color: #666;
            transition: var(--transition);
            pointer-events: none;
        }
        .form-control:invalid:not(:focus):not(:placeholder-shown) {
            border-color: var(--error-color);
            animation: shake 0.3s ease-in-out;
        }
        .form-control:valid:not(:focus):not(:placeholder-shown) {
            border-color: var(--success-color);
        }
        select.form-control {
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"><path fill="%23005566" d="M7 10l5 5 5-5z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 1.2rem center;
            background-size: 12px;
            padding-right: 2.5rem;
        }
        select.form-control:focus {
            border-color: var(--coral);
            box-shadow: 0 0 8px rgba(255, 111, 97, 0.3);
        }
        input[type="file"].form-control {
            padding: 0.6rem 1.2rem;
        }
        input[type="file"]::-webkit-file-upload-button {
            background: var(--coral);
            color: var(--white);
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
        }
        input[type="file"]::-webkit-file-upload-button:hover {
            background: var(--coral-dark);
            transform: scale(1.02);
        }
        .form-error {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.4rem;
            display: none;
        }
        .form-control.error + .form-error {
            display: block;
        }
        .form-error-message {
            display: none;
            color: var(--error-color);
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            background: rgba(211, 47, 47, 0.15);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            border: 1px solid var(--error-color);
            animation: errorPulse 0.5s ease-in-out 2;
        }
        .form-error-message.show {
            display: block;
        }
        .btn, .cta-button {
            background-color: var(--coral);
            color: var(--white);
            border: none;
            padding: 0.9rem 2.5rem;
            border-radius: 8px;
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            transition: var(--transition);
            box-shadow: var(--shadow);
        }
        .btn:hover, .cta-button:hover {
            background-color: var(--coral-dark);
            transform: scale(1.02);
            box-shadow: var(--hover-shadow);
        }
        /* Hero Section */
        .bannerBox {
            background: linear-gradient(135deg, rgba(0, 85, 102, 0.9), rgba(0, 85, 102, 0.7)), url('https://via.placeholder.com/1200x600?text=Virtual+Classroom') no-repeat center center/cover;
            padding: 7rem 1rem;
            color: var(--white);
        }
        .bannerBox h1 {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 700;
            color: var(--coral);
            margin-bottom: 1.5rem;
        }
        .bannerBox h2 {
            font-size: clamp(1.2rem, 3vw, 1.8rem);
            font-weight: 500;
            margin-bottom: 1.5rem;
        }
        .bannerBox p {
            font-size: clamp(1rem, 2.5vw, 1.2rem);
            max-width: 600px;
            font-weight: 300;
        }
        .tagBox {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            padding: 1.2rem;
            margin: 0.5rem;
            border-radius: 10px;
            color: var(--white);
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        .tagBox:hover {
            transform: translateY(-8px);
        }
        .tagBox h4 {
            color: var(--coral);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        /* About Section */
        .aboutUs {
            padding: 6rem 1rem;
            background-color: var(--white);
        }
        .aboutUs h1 {
            color: var(--coral);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: clamp(1.5rem, 4vw, 2rem);
        }
        .deviderLine {
            width: 70px;
            height: 6px;
            background: linear-gradient(to right, var(--coral), var(--coral-dark));
            margin: 0.5rem 0;
        }
        .aboutUs p {
            max-width: 600px;
            font-weight: 300;
            font-size: clamp(0.95rem, 2.5vw, 1rem);
        }
        .quotes {
            margin-top: 1.5rem;
            font-style: italic;
            color: #555;
            font-size: clamp(0.9rem, 2.5vw, 1rem);
        }
        /* Services Section */
        .servicesBox {
            padding: 5rem 1rem;
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
            text-align: center;
        }
        .servicesBox h1 {
            color: var(--coral);
            margin-bottom: 2.5rem;
            font-size: clamp(1.8rem, 4vw, 2.2rem);
        }
        .servBox {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .servBox:hover {
            animation: pulse 0.5s ease-in-out;
            box-shadow: var(--hover-shadow);
        }
        .servBox img {
            height: 70px;
            width: auto;
            margin-bottom: 0.8rem;
            transition: var(--transition);
        }
        .servBox img:hover {
            transform: scale(1.1);
        }
        .servBox h3 {
            color: var(--teal);
            font-weight: 600;
            font-size: clamp(1.2rem, 2.5vw, 1.4rem);
        }
        .servBox p {
            font-size: clamp(0.85rem, 2.5vw, 0.95rem);
            flex-grow: 1;
        }
        /* Modal */
        .modal-content {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            border-radius: 12px;
            color: var(--text-color);
        }
        .modal-title {
            color: var(--coral);
            font-weight: 600;
            font-size: clamp(1.4rem, 3vw, 1.6rem);
        }
        .modal-body img {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            transition: var(--transition);
        }
        .modal-body img:hover {
            transform: scale(1.05);
        }
        .modal-body p {
            font-size: clamp(0.85rem, 2.5vw, 0.95rem);
            max-width: 360px;
        }
        /* Carousel */
        .carousel-inner {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            border-radius: 12px;
            padding: 1.2rem;
        }
        .carousel-item {
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
            opacity: 0.8;
        }
        .carousel-item.active {
            opacity: 1;
            transform: scale(1.05);
        }
        .carousel-control-prev, .carousel-control-next {
            background: rgba(0, 85, 102, 0.6);
            border-radius: 12px;
            width: 4%;
            opacity: 0.7;
            transition: var(--transition);
        }
        .carousel-control-prev:hover, .carousel-control-next:hover {
            background: var(--teal-dark);
            opacity: 1;
            transform: scale(1.1);
        }
        /* Tutors Section */
        .tutors {
            padding: 5rem 1rem;
            background-color: var(--white);
            text-align: center;
        }
        .tutors h1 {
            color: var(--coral);
            margin-bottom: 2.5rem;
            font-size: clamp(1.8rem, 4vw, 2.2rem);
        }
        .tutorBox {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .tutorBox:hover {
            transform: translateY(-8px);
            box-shadow: var(--hover-shadow);
        }
        .tutorBox img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 0.8rem;
            transition: var(--transition);
        }
        .tutorBox img:hover {
            transform: scale(1.1);
        }
        .tutorBox h3 {
            color: var(--teal);
            font-weight: 600;
            font-size: clamp(1.2rem, 2.5vw, 1.4rem);
        }
        .tutorBox p {
            font-size: clamp(0.85rem, 2.5vw, 0.95rem);
            flex-grow: 1;
        }
        /* Tutor Profiles Section */
        .tutor-profiles {
            padding: 5rem 1rem;
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
        }
        .tutor-profiles h1 {
            color: var(--coral);
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: clamp(1.8rem, 4vw, 2.2rem);
        }
        .tutor-profile-box {
            background: var(--glass-bg);
            backdrop-filter: var(--glass-blur);
            border: var(--glass-border);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            min-height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .tutor-profile-box:hover {
            animation: liftAndGlow 0.5s ease-in-out;
            box-shadow: var(--hover-shadow);
        }
        .tutor-profile-box img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 0.8rem;
            transition: var(--transition);
        }
        .tutor-profile-box img:hover {
            transform: scale(1.1);
        }
        .tutor-profile-box h3 {
            color: var(--teal);
            font-weight: 600;
            font-size: clamp(1.2rem, 2.5vw, 1.4rem);
        }
        .tutor-profile-box p {
            font-size: clamp(0.85rem, 2.5vw, 0.95rem);
            flex-grow: 1;
        }
        .tutor-filter {
            max-width: 1000px;
            margin: 0 auto 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }
        .tutor-filter .form-group {
            flex: 1 1 200px;
            max-width: 260px;
        }
        #noTutorsMessage {
            display: none;
            text-align: center;
            color: var(--error-color);
            font-size: clamp(0.9rem, 2.5vw, 1rem);
            margin-top: 1.5rem;
        }
        /* Testimonials Section */
        .testimonials {
            padding: 5rem 1rem;
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
        }
        .testimonials h1 {
            color: var(--coral);
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: clamp(1.8rem, 4vw, 2.2rem);
        }
        /* Booking Section */
        .booking {
            padding: 5rem 1rem;
            background-color: var(--white);
            text-align: center;
        }
        .booking h1 {
            color: var(--coral);
            margin-bottom: 2rem;
            font-size: clamp(1.8rem, 4vw, 2.2rem);
        }
        .booking form {
            max-width: 600px;
            margin: 0 auto;
        }
        /* Tutor Registration Section */
        .tutor-registration {
            padding: 5rem 1rem;
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
            text-align: center;
        }
        .tutor-registration h1 {
            color: var(--coral);
            margin-bottom: 2rem;
            font-size: clamp(1.8rem, 4vw, 2.2rem);
        }
        .tutor-registration form {
            max-width: 600px;
            margin: 0 auto;
        }
        /* Newsletter Section */
        .newsletter {
            padding: 5rem 1rem;
            background: linear-gradient(135deg, var(--teal), var(--teal-hover));
            color: var(--white);
            text-align: center;
        }
        .newsletter h4 {
            margin-bottom: 1.5rem;
            font-size: clamp(1.2rem, 2.5vw, 1.4rem);
        }
        .newsletter form {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 0;
        }
        .newsletter .form-control {
            border-radius: 8px 0 0 8px;
            border-right: none;
        }
        .newsletter .btn {
            border-radius: 0 8px 8px 0;
        }
        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-bg), var(--darker-bg));
            color: var(--white);
            padding: 4rem 1rem;
        }
        .footerLinks h4 {
            color: var(--coral);
            margin-bottom: 1.5rem;
            font-size: clamp(1.2rem, 2.5vw, 1.4rem);
        }
        .footerLinks a {
            color: var(--white);
            text-decoration: none;
            transition: var(--transition);
        }
        .footerLinks a:hover {
            color: var(--coral);
            transform: translateX(5px);
        }
        .officeAddress ul li {
            display: flex;
            align-items: center;
            font-size: clamp(0.85rem, 2.5vw, 0.95rem);
        }
        .copyRight {
            background-color: var(--darker-bg);
            padding: 1.5rem 0;
            text-align: center;
            font-size: clamp(0.85rem, 2.5vw, 0.95rem);
        }
        /* Back to Top */
        #back2Top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--coral);
            color: var(--white);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            display: none;
            cursor: pointer;
            z-index: 1000;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        #back2Top:hover {
            background-color: var(--coral-dark);
            transform: scale(1.02);
            box-shadow: var(--hover-shadow);
        }
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .bannerBox { padding: 4rem 1rem; }
            .bannerBox h1 { font-size: clamp(1.5rem, 4vw, 2rem); }
            .bannerBox h2 { font-size: clamp(1rem, 3vw, 1.5rem); }
            .bannerBox p { font-size: clamp(0.9rem, 2.5vw, 1rem); }
            .navbar-nav { text-align: center; }
            .navbar-nav .nav-item { margin: 0.75rem 0; }
            .servicesBox, .tutor-profiles { padding: 3rem 0.8rem; }
            .servicesBox .row, .tutor-profiles .row { flex-direction: column; gap: 0.8rem; }
            .servBox, .tutor-profile-box { flex: 0 0 100%; max-width: 100%; min-height: 260px; }
            .tutor-filter { flex-direction: column; }
            .newsletter form, .booking form, .tutor-registration form { flex-direction: column; }
            .newsletter .form-control, .booking .form-control, .tutor-registration .form-control { border-radius: 8px; margin-bottom: 0.75rem; border: 1px solid #ccc; }
            .newsletter .btn, .booking .btn, .tutor-registration .btn { border-radius: 8px; }
        }
        @media (max-width: 576px) {
            .navbar-brand img { height: 32px; }
            .nav-link { font-size: clamp(0.8rem, 2.5vw, 0.9rem); }
            .servBox img, .tutor-profile-box img { width: 80px; height: 80px; }
        }
        @media (min-width: 1200px) {
            .container { max-width: 1600px; }
            .bannerBox { padding: 8rem 2rem; }
            .servicesBox, .tutor-profiles { padding: 6rem 2rem; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md sticky-top shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="https://via.placeholder.com/40x40?text=CTH" alt="CityTutorHub Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#services" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="#services" data-bs-toggle="modal" data-bs-target="#tutoringModal">Tutoring</a></li>
                            <li><a class="dropdown-item" href="#services" data-bs-toggle="modal" data-bs-target="#assessmentsModal">Assessments</a></li>
                            <li><a class="dropdown-item" href="#services" data-bs-toggle="modal" data-bs-target="#scoringModal">Scoring</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cta-button" href="#booking">Book Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Become a Tutor</a>
                    </li>
                    <li class="nav-item">
                        <button class="theme-toggle" id="theme-toggle" aria-label="Toggle theme">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="bannerBox fade-in-scale">
        <div class="container text-center">
            <h1>Personalized Tutoring with CityTutorHub</h1>
            <h2>Learn from Expert Tutors Anytime, Anywhere</h2>
            <p>CityTutorHub offers cutting-edge virtual and in-person tutoring in Math, English, Science, and more, tailored to your needs.</p>
            <a href="#booking" class="btn cta-button mt-4">Book an Appointment</a>
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="tagBox fade-in-scale">
                        <h4>1403</h4>
                        <p>Members</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tagBox fade-in-scale">
                        <h4>327</h4>
                        <p>Courses</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tagBox fade-in-scale">
                        <h4>120</h4>
                        <p>Tutors</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="aboutUs fade-in-scale">
        <div class="container">
            <h1>About CityTutorHub</h1>
            <div class="deviderLine"></div>
            <p>CityTutorHub is led by experienced educators with over three decades in the education industry. Our team, including PhD doctors and subject specialists, offers 20 years of teaching expertise across subjects like English, Mathematics, Biology, and Chemistry.</p>
            <div class="quotes">
                <p>“Live as if you were to die tomorrow. Learn as if you were to live forever.” - Mahatma Gandhi</p>
                <p>“Wisdom begins with wonder.” - Socrates</p>
            </div>
            <a href="#about" class="btn mt-4">Read More</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="servicesBox fade-in-scale">
        <div class="container text-center">
            <h1>Our Services</h1>
            <div class="deviderLine mx-auto"></div>
            <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="servBox fade-in-scale">
                                    <img src="https://via.placeholder.com/70x70?text=Tutoring" alt="Tutoring">
                                    <h3>Tutoring</h3>
                                    <p>One-to-one online and in-person tutoring in over 24 subjects using state-of-the-art virtual classrooms.</p>
                                    <a href="#services" class="btn" data-bs-toggle="modal" data-bs-target="#tutoringModal">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="servBox fade-in-scale">
                                    <img src="https://via.placeholder.com/70x70?text=Assessments" alt="Assessments">
                                    <h3>Assessments</h3>
                                    <p>Personalized assessments to identify knowledge gaps and tailor learning plans for students.</p>
                                    <a href="#services" class="btn" data-bs-toggle="modal" data-bs-target="#assessmentsModal">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="servBox fade-in-scale">
                                    <img src="https://via.placeholder.com/70x70?text=Scoring" alt="Scoring">
                                    <h3>Scoring</h3>
                                    <p>Rubric-supported scoring for student responses, ensuring accurate and fair evaluations.</p>
                                    <a href="#services" class="btn" data-bs-toggle="modal" data-bs-target="#scoringModal">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="servBox fade-in-scale">
                                    <img src="https://via.placeholder.com/70x70?text=Tutoring" alt="Tutoring">
                                    <h3>Tutoring</h3>
                                    <p>One-to-one online and in-person tutoring in over 24 subjects using state-of-the-art virtual classrooms.</p>
                                    <a href="#services" class="btn" data-bs-toggle="modal" data-bs-target="#tutoringModal">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="servBox fade-in-scale">
                                    <img src="https://via.placeholder.com/70x70?text=Assessments" alt="Assessments">
                                    <h3>Assessments</h3>
                                    <p>Personalized assessments to identify knowledge gaps and tailor learning plans for students.</p>
                                    <a href="#services" class="btn" data-bs-toggle="modal" data-bs-target="#assessmentsModal">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="servBox fade-in-scale">
                                    <img src="https://via.placeholder.com/70x70?text=Scoring" alt="Scoring">
                                    <h3>Scoring</h3>
                                    <p>Rubric-supported scoring for student responses, ensuring accurate and fair evaluations.</p>
                                    <a href="#services" class="btn" data-bs-toggle="modal" data-bs-target="#scoringModal">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Service Modals -->
    <div class="modal fade" id="tutoringModal" tabindex="-1" aria-labelledby="tutoringModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tutoringModalLabel">Tutoring</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/100x100?text=Tutoring" alt="Tutoring">
                    <p>One-to-one online and in-person tutoring in over 24 subjects using state-of-the-art virtual classrooms.</p>
                    <a href="#booking" class="btn">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="assessmentsModal" tabindex="-1" aria-labelledby="assessmentsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assessmentsModalLabel">Assessments</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/100x100?text=Assessments" alt="Assessments">
                    <p>Personalized assessments to identify knowledge gaps and tailor learning plans for students.</p>
                    <a href="#booking" class="btn">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="scoringModal" tabindex="-1" aria-labelledby="scoringModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scoringModalLabel">Scoring</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/100x100?text=Scoring" alt="Scoring">
                    <p>Rubric-supported scoring for student responses, ensuring accurate and fair evaluations.</p>
                    <a href="#booking" class="btn">Book Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tutors Section -->
    <section id="tutors" class="tutors fade-in-scale">
        <div class="container text-center">
            <h1>Meet Our Expert Tutors</h1>
            <div class="deviderLine mx-auto"></div>
            <div id="tutorCarousel" class="carousel slide tutor-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <img src="https://via.placeholder.com/120x120?text=Priya" alt="Dr. Priya Sharma">
                                    <h3>Dr. Priya Sharma</h3>
                                    <p>PhD in Mathematics, 15 years of teaching experience.<br>Certifications: CBSE, ICSE Expert</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <img src="https://via.placeholder.com/120x120?text=Anil" alt="Prof. Anil Kumar">
                                    <h3>Prof. Anil Kumar</h3>
                                    <p>MSc in Chemistry, expert in science education.<br>Certifications: STEM Certified</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <img src="https://via.placeholder.com/120x120?text=Riya" alt="Ms. Riya Patel">
                                    <h3>Ms. Riya Patel</h3>
                                    <p>MA in English, specializes in language tutoring.<br>Certifications: TEFL Certified</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#tutorCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#tutorCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p class="mt-4">1403 Members | 327 Courses | 120 Tutors</p>
        </div>
    </section>

    <!-- Tutor Profiles Section -->
    <section id="tutor-profiles" class="tutor-profiles fade-in-scale">
        <div class="container text-center">
            <h1>Tutor Profiles</h1>
            <div class="deviderLine mx-auto"></div>
            <div class="tutor-filter mb-4">
                <div class="form-group">
                    <select id="cityFilter" class="form-control">
                        <option value="">All Cities</option>
                        <option>Delhi</option>
                        <option>Mumbai</option>
                        <option>Bangalore</option>
                        <option>Chennai</option>
                        <option>Kolkata</option>
                    </select>
                    <label class="form-control-label">Select City</label>
                </div>
                <div class="form-group">
                    <select id="subjectFilter" class="form-control">
                        <option value="">All Subjects</option>
                        <option>Mathematics</option>
                        <option>Chemistry</option>
                        <option>English</option>
                        <option>Physics</option>
                    </select>
                    <label class="form-control-label">Select Subject</label>
                </div>
                <div class="form-group">
                    <input type="text" id="nameFilter" class="form-control" placeholder="Tutor Name">
                    <label class="form-control-label">Tutor Name</label>
                </div>
                <button id="searchTutors" class="btn">Search Tutors</button>
                <button id="resetFilters" class="btn">Reset</button>
            </div>
            <div id="tutorResults" class="row"></div>
            <p id="noTutorsMessage">No tutors found matching your criteria.</p>
        </div>
    </section>

    <!-- Tutor Profile Demo Section -->
    <section id="tutor-profile-demo" class="tutor-profile-demo fade-in-scale">
        <div class="container text-center">
            <h1>Tutor Profile Demo</h1>
            <div class="deviderLine mx-auto"></div>
            <p>Explore how our tutor profiles look and interact with a sample below.</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="tutor-profile-box fade-in-scale">
                        <img src="https://via.placeholder.com/100x100?text=Jane" alt="Dr. Jane Smith">
                        <h3>Dr. Jane Smith</h3>
                        <p><strong>Qualifications:</strong> PhD in Physics</p>
                        <p><strong>Subjects:</strong> Mechanics, Electromagnetism</p>
                        <p><strong>Certifications:</strong> IB Certified</p>
                        <p><strong>City:</strong> Online</p>
                        <p><strong>Experience:</strong> 12 years of teaching physics to high school students.</p>
                        <a href="#booking" class="btn">Book with Dr. Smith</a>
                        <a href="profile.php?id=1" class="btn">View Bio</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials fade-in-scale">
        <div class="container text-center">
            <h1>Client Testimonials</h1>
            <div class="deviderLine mx-auto"></div>
            <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <p>“CityTutorHub’s virtual classroom made learning engaging and effective!”</p>
                                    <p><strong>Tutoring Client</strong></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <p>“The personalized approach helped my child excel in Math!”</p>
                                    <p><strong>Parent</strong></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <p>“The tutors are patient and knowledgeable. My grades improved significantly!”</p>
                                    <p><strong>Student</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="booking fade-in-scale">
        <div class="container text-center">
            <h1>Book Your Tutoring Appointment</h1>
            <div class="deviderLine mx-auto"></div>
            <form id="booking-form" class="mx-auto">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    <label class="form-control-label">Your Name</label>
                    <div class="form-error">Please enter your name.</div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    <label class="form-control-label">Your Email</label>
                    <div class="form-error">Please enter a valid email.</div>
                </div>
                <div class="form-group">
                    <select name="subject" class="form-control" required>
                        <option value="">Select Subject</option>
                        <option>Mathematics</option>
                        <option>English</option>
                        <option>Science</option>
                        <option>History</option>
                    </select>
                    <label class="form-control-label">Select Subject</label>
                    <div class="form-error">Please select a subject.</div>
                </div>
                <div class="form-group">
                    <select name="grade" class="form-control" required>
                        <option value="">Select Grade</option>
                        <option>Primary</option>
                        <option>Secondary</option>
                        <option>Higher</option>
                    </select>
                    <label class="form-control-label">Select Grade</label>
                    <div class="form-error">Please select a grade.</div>
                </div>
                <div class="form-group">
                    <select name="city" class="form-control" required>
                        <option value="">Select City</option>
                        <option>Online</option>
                        <option>Delhi</option>
                        <option>Mumbai</option>
                        <option>Bangalore</option>
                        <option>Chennai</option>
                        <option>Kolkata</option>
                    </select>
                    <label class="form-control-label">Select City</label>
                    <div class="form-error">Please select a city.</div>
                </div>
                <div class="form-group">
                    <input type="date" name="date" class="form-control" required>
                    <label class="form-control-label">Preferred Date</label>
                    <div class="form-error">Please select a date.</div>
                </div>
                <div class="form-group">
                    <input type="time" name="time" class="form-control" required>
                    <label class="form-control-label">Preferred Time</label>
                    <div class="form-error">Please select a time.</div>
                </div>
                <button type="submit" class="btn cta-button">Book Appointment</button>
                <div id="booking-feedback" class="form-error-message"></div>
            </form>
            <p class="mt-4">Note: Integrate with Calendly for full scheduling functionality.</p>
        </div>
    </section>

    <!-- Tutor Registration Section -->
    <section id="tutor-registration" class="tutor-registration fade-in-scale">
        <div class="container text-center">
            <h1>Register as a Tutor</h1>
            <div class="deviderLine mx-auto"></div>
            <form id="tutor-registration-form" class="mx-auto">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    <label class="form-control-label">Your Name</label>
                    <div class="form-error">Please enter your name.</div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    <label class="form-control-label">Your Email</label>
                    <div class="form-error">Please enter a valid email.</div>
                </div>
                <div class="form-group">
                    <input type="text" name="subject" class="form-control" placeholder="Subject Expertise" required>
                    <label class="form-control-label">Subject Expertise (e.g., Math, English)</label>
                    <div class="form-error">Please enter your subject expertise.</div>
                </div>
                <div class="form-group">
                    <input type="text" name="qualifications" class="form-control" placeholder="Qualifications" required>
                    <label class="form-control-label">Qualifications (e.g., MSc, PhD)</label>
                    <div class="form-error">Please enter your qualifications.</div>
                </div>
                <div class="form-group">
                    <select name="city" class="form-control" required>
                        <option value="">Select City</option>
                        <option>Delhi</option>
                        <option>Mumbai</option>
                        <option>Bangalore</option>
                        <option>Chennai</option>
                        <option>Kolkata</option>
                    </select>
                    <label class="form-control-label">Select City</label>
                    <div class="form-error">Please select a city.</div>
                </div>
                <div class="form-group">
                    <input type="file" name="resume" class="form-control" accept=".pdf" required>
                    <label class="form-control-label">Upload Resume (PDF)</label>
                    <div class="form-error">Please upload a PDF resume.</div>
                </div>
                <button type="submit" class="btn cta-button">Register as Tutor</button>
                <div id="tutor-registration-feedback" class="form-error-message"></div>
            </form>
            <p class="mt-4">Join our team of expert tutors and make a difference!</p>
        </div>
    </section>

    <!-- Resources Section -->
    <section id="resources" class="resources fade-in-scale">
        <div class="container text-center">
            <h1>Resources & Blog</h1>
            <div class="deviderLine mx-auto"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="tutorBox fade-in-scale">
                        <img src="https://via.placeholder.com/120x120?text=Math" alt="Math Tips">
                        <h3>Study Tips for Math</h3>
                        <p>Free guide to improve your math skills with practical tips and strategies.</p>
                        <a href="#resources" class="btn">Read More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tutorBox fade-in-scale">
                        <img src="https://via.placeholder.com/120x120?text=Science" alt="Science Experiments">
                        <h3>Science Experiments at Home</h3>
                        <p>Engaging activities to learn science concepts from the comfort of home.</p>
                        <a href="#resources" class="btn">Read More</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tutorBox fade-in-scale">
                        <img src="https://via.placeholder.com/120x120?text=Quiz" alt="Quiz">
                        <h3>Try Our Quick Quiz</h3>
                        <p>Test your knowledge with our interactive quiz feature.</p>
                        <a href="#resources" class="btn">Start Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section id="newsletter" class="newsletter fade-in-scale">
        <div class="container text-center">
            <h4>Subscribe to Our Newsletter</h4>
            <p>Stay informed about our updates and educational resources.</p>
            <form id="newsletter-form" class="mx-auto">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    <label class="form-control-label">Enter Email</label>
                    <div class="form-error">Please enter a valid email.</div>
                </div>
                <button type="submit" class="btn cta-button">Subscribe</button>
                <div id="newsletter-feedback" class="form-error-message"></div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footerLinks">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#services" data-bs-toggle="modal" data-bs-target="#tutoringModal">Tutoring</a></li>
                        <li><a href="#services" data-bs-toggle="modal" data-bs-target="#assessmentsModal">Assessments</a></li>
                        <li><a href="#services" data-bs-toggle="modal" data-bs-target="#scoringModal">Scoring</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footerLinks">
                    <h4>Odd Links</h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4 officeAddress">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><img src="https://via.placeholder.com/20x20?text=Phone" alt="Phone"> +91-11-66509601</li>
                        <li><img src="https://via.placeholder.com/20x20?text=Email" alt="Email"> info@citytutorhub.com</li>
                        <li><img src="https://via.placeholder.com/20x20?text=Address" alt="Address"> F-4, Okhla Industrial Area, Phase-I, New Delhi - 110020, India</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyRight">
            <p>Copyright © 2025 CityTutorHub. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Back to Top -->
    <div id="back2Top" title="Back to top">↑</div>

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

        // Smooth Scroll and Navbar Close
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior: 'smooth' });
                const navbarCollapse = document.querySelector('#navbarNav');
                if (navbarCollapse.classList.contains('show')) {
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                    navbarToggler.classList.remove('active');
                }
            });
        });

        // Active Nav Link Highlighting
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            if (link.href === window.location.href) {
                link.classList.add('active');
            }
            link.addEventListener('click', () => {
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
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

        // Back to Top
        const backToTop = document.getElementById('back2Top');
        window.addEventListener('scroll', () => {
            backToTop.style.display = window.scrollY > 200 ? 'block' : 'none';
        });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // IntersectionObserver for Animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    if (!entry.target.classList.contains('servBox') && !entry.target.classList.contains('tutorBox') && !entry.target.classList.contains('tutor-profile-box')) {
                        observer.unobserve(entry.target);
                    }
                }
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.fade-in-scale').forEach(el => observer.observe(el));

        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.dataset.theme = document.body.dataset.theme === 'dark' ? 'light' : 'dark';
        });

        // Tutor Search
        function debounceSearch() {
            const city = document.getElementById('cityFilter').value;
            const subject = document.getElementById('subjectFilter').value;
            const name = document.getElementById('nameFilter').value;
            fetch(`search.php?city=${encodeURIComponent(city)}&subject=${encodeURIComponent(subject)}&name=${encodeURIComponent(name)}`)
                .then(response => {
                    if (!response.ok) throw new Error('Search failed: ' + response.statusText);
                    return response.json();
                })
                .then(data => {
                    const resultsDiv = document.getElementById('tutorResults');
                    const noTutorsMessage = document.getElementById('noTutorsMessage');
                    resultsDiv.innerHTML = '';
                    if (data.length > 0) {
                        noTutorsMessage.style.display = 'none';
                        data.forEach(tutor => {
                            const tutorCard = `
                                <div class="col-md-4">
                                    <div class="tutor-profile-box fade-in-scale">
                                        <img src="https://via.placeholder.com/100x100?text=${tutor.name[0]}" alt="${tutor.name}">
                                        <h3>${tutor.name}</h3>
                                        <p><strong>Subjects:</strong> ${tutor.subject}</p>
                                        <p><strong>City:</strong> ${tutor.city}</p>
                                        <p><strong>Qualifications:</strong> ${tutor.qualifications || 'Not specified'}</p>
                                        <a href="profile.php?id=${tutor.id}" class="btn">View Profile</a>
                                    </div>
                                </div>`;
                            resultsDiv.innerHTML += tutorCard;
                            observer.observe(resultsDiv.lastElementChild.querySelector('.tutor-profile-box'));
                        });
                    } else {
                        noTutorsMessage.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Search Error:', error);
                    document.getElementById('tutorResults').innerHTML = `<div class="alert alert-danger" role="alert">Error fetching results: ${error.message}</div>`;
                });
        }

        document.getElementById('cityFilter').addEventListener('change', debounceSearch);
        document.getElementById('subjectFilter').addEventListener('change', debounceSearch);
        document.getElementById('nameFilter').addEventListener('input', debounceSearch);
        document.getElementById('searchTutors').addEventListener('click', debounceSearch);
        document.getElementById('resetFilters').addEventListener('click', () => {
            document.getElementById('cityFilter').value = '';
            document.getElementById('subjectFilter').value = '';
            document.getElementById('nameFilter').value = '';
            debounceSearch();
        });

        // Form Submission
        function showAlert(containerId, message, type) {
            const feedbackDiv = document.getElementById(containerId);
            feedbackDiv.innerHTML = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
            feedbackDiv.classList.add('show');
        }

        document.getElementById('booking-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok: ' + response.statusText);
                    return response.json();
                })
                .then(data => {
                    showAlert('booking-feedback', data.message, data.status === 'success' ? 'success' : 'danger');
                    if (data.status === 'success') {
                        e.target.reset();
                    }
                })
                .catch(error => {
                    console.error('Booking Form Error:', error);
                    showAlert('booking-feedback', 'An error occurred: ' + error.message, 'danger');
                });
        });

        document.getElementById('tutor-registration-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('register.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok: ' + response.statusText);
                    return response.json();
                })
                .then(data => {
                    showAlert('tutor-registration-feedback', data.message, data.status === 'success' ? 'success' : 'danger');
                    if (data.status === 'success') {
                        e.target.reset();
                    }
                })
                .catch(error => {
                    console.error('Tutor Registration Error:', error);
                    showAlert('tutor-registration-feedback', 'An error occurred: ' + error.message, 'danger');
                });
        });

        document.getElementById('newsletter-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok: ' + response.statusText);
                    return response.json();
                })
                .then(data => {
                    showAlert('newsletter-feedback', data.message, data.status === 'success' ? 'success' : 'danger');
                    if (data.status === 'success') {
                        e.target.reset();
                    }
                })
                .catch(error => {
                    console.error('Newsletter Form Error:', error);
                    showAlert('newsletter-feedback', 'An error occurred: ' + error.message, 'danger');
                });
        });
    </script>
</body>
</html>