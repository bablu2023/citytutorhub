document.addEventListener('DOMContentLoaded', () => {
    // Booking Form Submission
    document.getElementById('booking-form')?.addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = e.target;
        const feedback = document.getElementById('booking-feedback');
        const formData = new FormData(form);
        try {
            const response = await fetch('contact.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            feedback.textContent = result.message;
            feedback.className = `form-error-message ${result.status === 'success' ? 'text-success' : 'text-danger'}`;
            if (result.status === 'success') form.reset();
        } catch (error) {
            feedback.textContent = 'An error occurred. Please try again.';
            feedback.className = 'form-error-message text-danger';
        }
    });

    // Tutor Registration Form Submission
    document.getElementById('tutor-form')?.addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = e.target;
        const feedback = document.getElementById('tutor-feedback');
        const formData = new FormData(form);
        try {
            const response = await fetch('register.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            feedback.textContent = result.message;
            feedback.className = `form-error-message ${result.status === 'success' ? 'text-success' : 'text-danger'}`;
            if (result.status === 'success') form.reset();
        } catch (error) {
            feedback.textContent = 'An error occurred. Please try again.';
            feedback.className = 'form-error-message text-danger';
        }
    });

    // Newsletter Form Submission
    document.getElementById('newsletter-form')?.addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = e.target;
        const feedback = document.getElementById('newsletter-feedback');
        const formData = new FormData(form);
        try {
            const response = await fetch('contact.php', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            feedback.textContent = result.message;
            feedback.className = `form-error-message ${result.status === 'success' ? 'text-success' : 'text-danger'}`;
            if (result.status === 'success') form.reset();
        } catch (error) {
            feedback.textContent = 'An error occurred. Please try again.';
            feedback.className = 'form-error-message text-danger';
        }
    });

    // Tutor Search
    document.getElementById('tutor-search-form')?.addEventListener('submit', async (e) => {
        e.preventDefault();
        const form = e.target;
        const results = document.getElementById('tutor-results');
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();
        try {
            const response = await fetch(`search.php?${params}`);
            const tutors = await response.json();
            results.innerHTML = tutors.map(tutor => `
                <div class="col-md-4 mb-4">
                    <div class="tutor-profile-box" tabindex="0">
                        <h3>${tutor.name}</h3>
                        <p>Subject: ${tutor.subject}</p>
                        <p>City: ${tutor.city}</p>
                        <div class="hover-overlay">
                            <p>${tutor.qualifications}</p>
                            <a href="profile.php?id=${tutor.id}" class="btn cta-button">View Profile</a>
                        </div>
                    </div>
                </div>
            `).join('');
        } catch (error) {
            results.innerHTML = '<p class="text-danger">Error fetching tutors. Please try again.</p>';
        }
    });

    // Accessibility for Tutor and Service Hover Effects
    document.querySelectorAll('.tutor-profile-box, .tutorBox, .service-box').forEach(box => {
        box.addEventListener('focus', () => {
            const overlay = box.querySelector('.hover-overlay');
            if (overlay) {
                overlay.style.opacity = '1';
                overlay.style.pointerEvents = 'auto';
            }
        });
        box.addEventListener('blur', () => {
            const overlay = box.querySelector('.hover-overlay');
            if (overlay) {
                overlay.style.opacity = '0';
                overlay.style.pointerEvents = 'none';
            }
        });
    });
});