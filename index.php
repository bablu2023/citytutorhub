<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityTutorHub - Find Your Perfect Tutor</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js" defer></script>
    
    
</head>
<body>
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

    <!-- Replace the #services section in index.php with this -->
<section id="services" class="services fade-in-scale">
    <div class="container text-center">
        <h1>Our Services</h1>
        <div class="deviderLine mx-auto"></div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="service-box" tabindex="0">
                    <h3>Online Tutoring</h3>
                    <p>Learn from anywhere with our expert tutors.</p>
                    <div class="hover-overlay">
                        <p>Flexible scheduling and personalized lessons.</p>
                        <a href="#booking" class="btn cta-button">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-box" tabindex="0">
                    <h3>In-Person Tutoring</h3>
                    <p>Face-to-face sessions in your city.</p>
                    <div class="hover-overlay">
                        <p>Hands-on learning with local experts.</p>
                        <a href="#booking" class="btn cta-button">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-box" tabindex="0">
                    <h3>Group Classes</h3>
                    <p>Join peers for interactive group sessions.</p>
                    <div class="hover-overlay">
                        <p>Collaborative learning for better results.</p>
                        <a href="#booking" class="btn cta-button">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<!-- Add this modal structure in index.php (e.g., after #services or in tutor profiles) -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceModalLabel">Online Tutoring Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="https://via.placeholder.com/100?text=Service" alt="Service Image">
                <p>Experience flexible and personalized online tutoring with our expert instructors.</p>
                <div class="hover-overlay">
                    <p>Book a session today and start learning!</p>
                    <a href="#booking" class="btn cta-button">Book Now</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Update #services section to match new CSS -->
<section id="services" class="servicesBox fade-in-up">
    <div class="container text-center">
        <h1>Our Services</h1>
        <div class="deviderLine mx-auto"></div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="servBox" tabindex="0">
                    <img src="https://via.placeholder.com/70?text=Online" alt="Online Tutoring">
                    <h3>Online Tutoring</h3>
                    <p>Learn from anywhere with our expert tutors.</p>
                    <div class="hover-overlay">
                        <p>Flexible scheduling and personalized lessons.</p>
                        <button type="button" class="btn cta-button" data-bs-toggle="modal" data-bs-target="#serviceModal">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="servBox" tabindex="0">
                    <img src="https://via.placeholder.com/70?text=In-Person" alt="In-Person Tutoring">
                    <h3>In-Person Tutoring</h3>
                    <p>Face-to-face sessions in your city.</p>
                    <div class="hover-overlay">
                        <p>Hands-on learning with local experts.</p>
                        <button type="button" class="btn cta-button" data-bs-toggle="modal" data-bs-target="#serviceModal">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="servBox" tabindex="0">
                    <img src="https://via.placeholder.com/70?text=Group" alt="Group Classes">
                    <h3>Group Classes</h3>
                    <p>Join peers for interactive group sessions.</p>
                    <div class="hover-overlay">
                        <p>Collaborative learning for better results.</p>
                        <button type="button" class="btn cta-button" data-bs-toggle="modal" data-bs-target="#serviceModal">Learn More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                                    <div class="hover-overlay">
                                        <p>Expert in advanced calculus and algebra.</p>
                                        <a href="profile.php?id=1" class="btn">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <img src="https://via.placeholder.com/120x120?text=Anil" alt="Prof. Anil Kumar">
                                    <h3>Prof. Anil Kumar</h3>
                                    <p>MSc in Chemistry, expert in science education.<br>Certifications: STEM Certified</p>
                                    <div class="hover-overlay">
                                        <p>Specializes in organic chemistry.</p>
                                        <a href="profile.php?id=2" class="btn">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="tutorBox fade-in-scale">
                                    <img src="https://via.placeholder.com/120x120?text=Riya" alt="Ms. Riya Patel">
                                    <h3>Ms. Riya Patel</h3>
                                    <p>MA in English, specializes in language tutoring.<br>Certifications: TEFL Certified</p>
                                    <div class="hover-overlay">
                                        <p>Expert in creative writing and literature.</p>
                                        <a href="profile.php?id=3" class="btn">View Profile</a>
                                    </div>
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
                        <div class="hover-overlay">
                            <p>Expert in quantum mechanics and IB curriculum.</p>
                            <a href="#booking" class="btn">Book with Dr. Smith</a>
                            <a href="profile.php?id=1" class="btn">View Bio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section id="booking" class="booking fade-in-scale">
        <div class="container text-center">
            <h1>Book Your Tutoring Appointment</h1>
            <div class="deviderLine mx-auto"></div>
            <form id="booking-form" action="contact.php" method="POST" class="mx-auto" enctype="multipart/form-data">
                <input type="hidden" name="form_type" value="booking">
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

    <section id="tutor-registration" class="tutor-registration fade-in-scale">
        <div class="container text-center">
            <h1>Register as a Tutor</h1>
            <div class="deviderLine mx-auto"></div>
            <form id="tutor-registration-form" action="register.php" method="POST" class="mx-auto" enctype="multipart/form-data">
                <input type="hidden" name="form_type" value="tutor_registration">
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

    <section id="newsletter" class="newsletter fade-in-scale">
        <div class="container text-center">
            <h4>Subscribe to Our Newsletter</h4>
            <p>Stay informed about our updates and educational resources.</p>
            <form id="newsletter-form" action="contact.php" method="POST" class="mx-auto">
                <input type="hidden" name="form_type" value="newsletter">
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

    <div id="back2Top" title="Back to top">↑</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
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

        const navbarToggler = document.querySelector('.navbar-toggler');
        let isToggling = false;
        const toggleNavbar = debounce(() => {
            if (isToggling) return;
            isToggling = true;
            navbarToggler.classList.toggle('active');
            setTimeout(() => { isToggling = false; }, 300);
        }, 300);
        navbarToggler.addEventListener('click', toggleNavbar);

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

        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        const backToTop = document.getElementById('back2Top');
        window.addEventListener('scroll', () => {
            backToTop.style.display = window.scrollY > 200 ? 'block' : 'none';
        });
        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

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

        const themeToggle = document.getElementById('theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.dataset.theme = document.body.dataset.theme === 'dark' ? 'light' : 'dark';
        });

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
                                    <div class="tutor-profile-box fade-in-scale" tabindex="0">
                                        <img src="https://via.placeholder.com/100x100?text=${tutor.name[0]}" alt="${tutor.name}">
                                        <h3>${tutor.name}</h3>
                                        <p><strong>Subjects:</strong> ${tutor.subject}</p>
                                        <p><strong>City:</strong> ${tutor.city}</p>
                                        <p><strong>Qualifications:</strong> ${tutor.qualifications || 'Not specified'}</p>
                                        <div class="hover-overlay">
                                            <p>View ${tutor.name}'s full profile for more details.</p>
                                            <a href="profile.php?id=${tutor.id}" class="btn">View Profile</a>
                                        </div>
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
                .then(response => response.json())
                .then(data => {
                    showAlert('booking-feedback', data.message, data.status === 'success' ? 'success' : 'danger');
                    if (data.status === 'success') {
                        e.target.reset();
                    }
                })
                .catch(error => {
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
                .then(response => response.json())
                .then(data => {
                    showAlert('tutor-registration-feedback', data.message, data.status === 'success' ? 'success' : 'danger');
                    if (data.status === 'success') {
                        e.target.reset();
                    }
                })
                .catch(error => {
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
                .then(response => response.json())
                .then(data => {
                    showAlert('newsletter-feedback', data.message, data.status === 'success' ? 'success' : 'danger');
                    if (data.status === 'success') {
                        e.target.reset();
                    }
                })
                .catch(error => {
                    showAlert('newsletter-feedback', 'An error occurred: ' + error.message, 'danger');
                });
        });

        document.querySelectorAll('.tutor-profile-box').forEach(box => {
            box.addEventListener('focus', () => {
                box.querySelector('.hover-overlay').style.opacity = '1';
                box.querySelector('.hover-overlay').style.pointerEvents = 'auto';
            });
            box.addEventListener('blur', () => {
                box.querySelector('.hover-overlay').style.opacity = '0';
                box.querySelector('.hover-overlay').style.pointerEvents = 'none';
            });
        });
    </script>
</body>
</html>