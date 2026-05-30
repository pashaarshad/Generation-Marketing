<?php
/**
 * Dedicated Contact Page - Generation Marketing
 */
$page_title = "Contact Us | Generation Marketing - Free Consultation & Audit";
$page_desc = "Have questions? Reach out to Generation Marketing. Call +91 83061 56521 or email info@generationmarketing.in. We offer a free digital audit.";
include_once __DIR__ . '/includes/header.php';

// Get pre-selected plan from URL if present
$selected_plan = isset($_GET['plan']) ? trim($_GET['plan']) : '';
?>

<!-- CONTACT HERO -->
<section class="details-section bg-dark text-white text-center d-flex align-items-center justify-content-center" style="padding: 140px 0 80px; background: linear-gradient(135deg, #0b1120 0%, #111827 100%) !important; position: relative; overflow: hidden;">
    <div class="hero-bg-icons" style="opacity: 0.15;">
        <i class="fas fa-envelope-open icon-float" style="top: 15%; left: 8%; font-size: 3rem;"></i>
        <i class="fas fa-paper-plane icon-float" style="bottom: 15%; right: 12%; font-size: 2.5rem;"></i>
        <i class="fas fa-map-location-dot icon-float" style="top: 45%; left: 82%; font-size: 3rem;"></i>
    </div>
    <div class="container reveal">
        <h1 class="display-4 fw-extrabold mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 800; background: linear-gradient(to right, #ffffff, #93c5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Let's Build Something Great</h1>
        <p class="lead max-w-2xl mx-auto" style="color: rgba(255,255,255,0.8); font-size: 1.25rem;">
            Ready to scale your leads and revenue? Contact our growth experts for a completely free strategy audit.
        </p>
    </div>
</section>

<!-- MAIN CONTACT FORM & CO-ORDINATES -->
<section class="section-padding" id="contact">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form Card -->
            <div class="col-lg-7 reveal">
                <div class="contact-form p-4 p-md-5 bg-white border rounded-4 shadow-sm">
                    <h3 class="fw-bold mb-4" style="color: var(--navy);">Send Us a Message</h3>
                    <form id="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: var(--navy);">Full Name</label>
                                <input type="text" class="form-control px-3 py-2 rounded-3" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: var(--navy);">Email Address</label>
                                <input type="email" class="form-control px-3 py-2 rounded-3" placeholder="your@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: var(--navy);">Phone Number</label>
                                <input type="tel" class="form-control px-3 py-2 rounded-3" placeholder="+91 XXXXX XXXXX" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: var(--navy);">Service Interested In</label>
                                <select class="form-select px-3 py-2 rounded-3" required>
                                    <option value="" disabled>Select a Service</option>
                                    <option <?php echo (empty($selected_plan) ? 'selected' : ''); ?>>Other Service</option>
                                    <option <?php echo ($selected_plan === 'seo-starter' ? 'selected' : ''); ?>>SEO Starter Plan</option>
                                    <option <?php echo ($selected_plan === 'seo-growth' ? 'selected' : ''); ?>>Growth SEO Plan</option>
                                    <option <?php echo ($selected_plan === 'seo-pro' ? 'selected' : ''); ?>>Pro SEO Plan</option>
                                    <option <?php echo ($selected_plan === 'smm-basic' ? 'selected' : ''); ?>>Social Media Basic</option>
                                    <option <?php echo ($selected_plan === 'smm-standard' ? 'selected' : ''); ?>>Social Media Standard</option>
                                    <option <?php echo ($selected_plan === 'smm-premium' ? 'selected' : ''); ?>>Social Media Premium</option>
                                    <option>Google Ads Package</option>
                                    <option>Meta Ad Package</option>
                                    <option>Premium Brand System</option>
                                    <option>Growth Website Plan</option>
                                    <option>E-Commerce Store Setup</option>
                                    <option>Marketplace Setup</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold" style="color: var(--navy);">Tell us about your project</label>
                                <textarea class="form-control px-3 py-2 rounded-3" rows="5" placeholder="Include your website URL (if any) and your main marketing goals..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn-glow text-white border-0 w-100 py-3 rounded-pill fw-bold text-uppercase" style="letter-spacing: 0.5px;">
                                    <i class="fas fa-paper-plane me-2"></i> Send Message & Request Audit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information Cards -->
            <div class="col-lg-5 reveal d-flex flex-column gap-4">
                <div class="contact-info-card p-4 bg-white border rounded-4 shadow-sm flex-grow-1">
                    <h3 class="fw-bold mb-4" style="color: var(--navy);">Get in Touch Directly</h3>
                    
                    <div class="contact-info-item d-flex align-items-start gap-3 mb-4">
                        <div class="icon-circle bg-primary text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; flex-shrink: 0; background-color: var(--primary) !important;">
                            <i class="fas fa-phone fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--navy);">Phone Consultation</h6>
                            <p class="text-muted mb-0"><a href="tel:+918306156521" class="text-decoration-none text-muted">+91 83061 56521</a></p>
                        </div>
                    </div>

                    <div class="contact-info-item d-flex align-items-start gap-3 mb-4">
                        <div class="icon-circle bg-primary text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; flex-shrink: 0; background-color: var(--primary) !important;">
                            <i class="fas fa-envelope fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--navy);">Email Inquiries</h6>
                            <p class="text-muted mb-0"><a href="mailto:info@generationmarketing.in" class="text-decoration-none text-muted">info@generationmarketing.in</a></p>
                        </div>
                    </div>

                    <div class="contact-info-item d-flex align-items-start gap-3 mb-4">
                        <div class="icon-circle bg-primary text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; flex-shrink: 0; background-color: var(--primary) !important;">
                            <i class="fab fa-whatsapp fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--navy);">WhatsApp Support</h6>
                            <p class="text-muted mb-0"><a href="https://wa.me/918306156521" target="_blank" class="text-decoration-none text-muted">Chat with an Expert</a></p>
                        </div>
                    </div>

                    <div class="contact-info-item d-flex align-items-start gap-3">
                        <div class="icon-circle bg-primary text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; flex-shrink: 0; background-color: var(--primary) !important;">
                            <i class="fas fa-map-marker-alt fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--navy);">Office HQ</h6>
                            <p class="text-muted mb-0">Jaipur, Rajasthan, India</p>
                        </div>
                    </div>
                </div>

                <!-- Google Map embedded Container (Premium UI addition) -->
                <div class="contact-info-card p-2 bg-white border rounded-4 shadow-sm overflow-hidden" style="height: 250px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14234.341887309995!2d75.776652!3d26.912434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db40b1234567f%3A0x123456789abcde!2sJaipur%2C%20Rajasthan%2C%20India!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                        class="w-100 h-100 border-0 rounded-3" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
