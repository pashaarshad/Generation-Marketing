<?php
/**
 * Dedicated Pricing Page - Generation Marketing
 */
$page_title = "Pricing & Plans | Generation Marketing - Digital Marketing Packages";
$page_desc = "View our transparent pricing options. Google Ads, Meta Ads cost, and competitive SEO packages starting from ₹8,000/month. No hidden fees.";
include_once __DIR__ . '/includes/header.php';
?>

<!-- PRICING HERO -->
<section class="details-section bg-dark text-white text-center d-flex align-items-center justify-content-center" style="padding: 140px 0 80px; background: linear-gradient(135deg, #0b1120 0%, #111827 100%) !important; position: relative; overflow: hidden;">
    <div class="hero-bg-icons" style="opacity: 0.15;">
        <i class="fas fa-wallet icon-float" style="top: 15%; left: 12%; font-size: 3rem;"></i>
        <i class="fas fa-tag icon-float" style="bottom: 20%; right: 15%; font-size: 2.5rem;"></i>
        <i class="fas fa-shield-halved icon-float" style="top: 50%; left: 80%; font-size: 3rem;"></i>
    </div>
    <div class="container reveal">
        <h1 class="display-4 fw-extrabold mb-3" style="font-family: 'Poppins', sans-serif; font-weight: 800; background: linear-gradient(to right, #ffffff, #93c5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Transparent Pricing Plans</h1>
        <p class="lead max-w-2xl mx-auto" style="color: rgba(255,255,255,0.8); font-size: 1.25rem;">
            Affordable, results-focused marketing plans designed to deliver maximum ROI for your investment.
        </p>
    </div>
</section>

<!-- MAIN PRICING SECTION -->
<section class="section-padding" id="pricing">
    <div class="container">
        <!-- SEO PLANS -->
        <div class="section-header text-center reveal">
            <h2>Search Engine <span style="color:var(--primary)">Optimization</span> Plans</h2>
            <p class="subtitle">Increase organic rankings, website authority, and qualified organic traffic.</p>
            <div class="accent-line mx-auto"></div>
        </div>

        <div class="row g-4 mb-5 justify-content-center">
            <!-- SEO Starter -->
            <div class="col-md-4 reveal">
                <div class="pricing-card h-100 p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-3 fs-1 text-primary"><i class="fas fa-seedling"></i></div>
                    <h4 class="fw-bold" style="color: var(--navy);">SEO Starter</h4>
                    <p class="plan-desc text-muted mb-3">Perfect for Local Business & Beginners</p>
                    <div class="price fw-extrabold" style="font-size: 2.5rem; color: var(--navy);"><span class="currency" style="font-size: 1.5rem; vertical-align: super; font-weight: 700;">₹</span>8,000</div>
                    <div class="billing text-muted mb-4">/month</div>
                    <ul class="features-list list-unstyled mb-4 text-start ps-3" style="color: var(--gray); font-size: 0.95rem; line-height: 2;">
                        <li><i class="fas fa-check text-success me-2"></i>Website SEO Audit</li>
                        <li><i class="fas fa-check text-success me-2"></i>10-15 Keywords Research</li>
                        <li><i class="fas fa-check text-success me-2"></i>On-Page SEO Optimization</li>
                        <li><i class="fas fa-check text-success me-2"></i>Google My Business Setup</li>
                        <li><i class="fas fa-check text-success me-2"></i>5 Basic Backlinks</li>
                        <li><i class="fas fa-check text-success me-2"></i>Monthly Report</li>
                    </ul>
                    <a href="contact.php?plan=seo-starter" class="btn btn-outline-primary rounded-pill px-4 py-2 w-100 fw-bold">Get Started</a>
                </div>
            </div>
            <!-- SEO Growth -->
            <div class="col-md-4 reveal">
                <div class="pricing-card featured h-100 p-4 bg-white rounded-4 border-primary border shadow text-center position-relative transition-all hover-translate-y" style="border-width: 2px !important;">
                    <div class="popular-badge position-absolute top-0 start-50 translate-middle badge bg-primary text-white px-3 py-2 fw-bold text-uppercase" style="border-radius: 20px; font-size: 0.75rem; letter-spacing: 0.5px;">★ Recommended</div>
                    <div class="plan-icon mb-3 fs-1 text-primary mt-2"><i class="fas fa-chart-line"></i></div>
                    <h4 class="fw-bold" style="color: var(--navy);">Growth SEO</h4>
                    <p class="plan-desc text-muted mb-3">For Growing Brands & Service Providers</p>
                    <div class="price fw-extrabold" style="font-size: 2.5rem; color: var(--navy);"><span class="currency" style="font-size: 1.5rem; vertical-align: super; font-weight: 700;">₹</span>15,000</div>
                    <div class="billing text-muted mb-4">/month</div>
                    <ul class="features-list list-unstyled mb-4 text-start ps-3" style="color: var(--gray); font-size: 0.95rem; line-height: 2;">
                        <li><i class="fas fa-check text-success me-2"></i>20-30 Advanced Keywords</li>
                        <li><i class="fas fa-check text-success me-2"></i>Full On-Page Optimization</li>
                        <li><i class="fas fa-check text-success me-2"></i>Technical SEO</li>
                        <li><i class="fas fa-check text-success me-2"></i>10-15 Quality Backlinks</li>
                        <li><i class="fas fa-check text-success me-2"></i>Content & Competitor Audit</li>
                        <li><i class="fas fa-check text-success me-2"></i>Weekly Report + Strategy Call</li>
                    </ul>
                    <a href="contact.php?plan=seo-growth" class="btn btn-primary rounded-pill px-4 py-2 w-100 fw-bold" style="background-color: var(--primary); border: none;">Get Started</a>
                </div>
            </div>
            <!-- SEO Pro -->
            <div class="col-md-4 reveal">
                <div class="pricing-card h-100 p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-3 fs-1 text-primary"><i class="fas fa-crown"></i></div>
                    <h4 class="fw-bold" style="color: var(--navy);">Pro SEO</h4>
                    <p class="plan-desc text-muted mb-3">For E-Commerce & Dominating Brands</p>
                    <div class="price fw-extrabold" style="font-size: 2.5rem; color: var(--navy);"><span class="currency" style="font-size: 1.5rem; vertical-align: super; font-weight: 700;">₹</span>25,000</div>
                    <div class="billing text-muted mb-4">/month</div>
                    <ul class="features-list list-unstyled mb-4 text-start ps-3" style="color: var(--gray); font-size: 0.95rem; line-height: 2;">
                        <li><i class="fas fa-check text-success me-2"></i>40-60 Keywords Target</li>
                        <li><i class="fas fa-check text-success me-2"></i>Complete Website SEO</li>
                        <li><i class="fas fa-check text-success me-2"></i>Advanced Technical Schema</li>
                        <li><i class="fas fa-check text-success me-2"></i>20-30 Premium Backlinks</li>
                        <li><i class="fas fa-check text-success me-2"></i>Blog Copywriting & Optimization</li>
                        <li><i class="fas fa-check text-success me-2"></i>Dedicated Support Specialist</li>
                    </ul>
                    <a href="contact.php?plan=seo-pro" class="btn btn-outline-primary rounded-pill px-4 py-2 w-100 fw-bold">Get Started</a>
                </div>
            </div>
        </div>

        <!-- SOCIAL MEDIA MANAGEMENT -->
        <div class="section-header text-center reveal mt-5">
            <h2>Social Media <span style="color:var(--primary)">Management</span></h2>
            <p class="subtitle">Dominate grids, gain loyal followers, and drive organic social leads.</p>
            <div class="accent-line mx-auto"></div>
        </div>

        <div class="row g-4 mb-5 justify-content-center">
            <!-- SMM Basic -->
            <div class="col-md-4 reveal">
                <div class="pricing-card h-100 p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-3 fs-1 text-primary"><i class="fas fa-thumbs-up"></i></div>
                    <h4 class="fw-bold" style="color: var(--navy);">Basic Plan</h4>
                    <p class="plan-desc text-muted mb-3">Keep Grid Active & Professional</p>
                    <div class="price fw-extrabold" style="font-size: 2.5rem; color: var(--navy);"><span class="currency" style="font-size: 1.5rem; vertical-align: super; font-weight: 700;">₹</span>7,999</div>
                    <div class="billing text-muted mb-4">/month</div>
                    <ul class="features-list list-unstyled mb-4 text-start ps-3" style="color: var(--gray); font-size: 0.95rem; line-height: 2;">
                        <li><i class="fas fa-check text-success me-2"></i>12 Posts (Graphics + Reels)</li>
                        <li><i class="fas fa-check text-success me-2"></i>Grid Design & Branding</li>
                        <li><i class="fas fa-check text-success me-2"></i>Caption & Hashtag Writing</li>
                        <li><i class="fas fa-check text-success me-2"></i>1 Platform (Instagram/FB)</li>
                    </ul>
                    <a href="contact.php?plan=smm-basic" class="btn btn-outline-primary rounded-pill px-4 py-2 w-100 fw-bold">Get Started</a>
                </div>
            </div>
            <!-- SMM Standard -->
            <div class="col-md-4 reveal">
                <div class="pricing-card featured h-100 p-4 bg-white rounded-4 border-primary border shadow text-center position-relative transition-all hover-translate-y" style="border-width: 2px !important;">
                    <div class="popular-badge position-absolute top-0 start-50 translate-middle badge bg-primary text-white px-3 py-2 fw-bold text-uppercase" style="border-radius: 20px; font-size: 0.75rem; letter-spacing: 0.5px;">🔥 Most Popular</div>
                    <div class="plan-icon mb-3 fs-1 text-primary mt-2"><i class="fas fa-fire"></i></div>
                    <h4 class="fw-bold" style="color: var(--navy);">Standard Plan</h4>
                    <p class="plan-desc text-muted mb-3">Accelerate Organic Engagement</p>
                    <div class="price fw-extrabold" style="font-size: 2.5rem; color: var(--navy);"><span class="currency" style="font-size: 1.5rem; vertical-align: super; font-weight: 700;">₹</span>9,999</div>
                    <div class="billing text-muted mb-4">/month</div>
                    <ul class="features-list list-unstyled mb-4 text-start ps-3" style="color: var(--gray); font-size: 0.95rem; line-height: 2;">
                        <li><i class="fas fa-check text-success me-2"></i>20 Posts (Graphics + Reels)</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i>Premium Reel Video Editing</li>
                        <li><i class="fas fa-check text-success me-2"></i>Growth Strategy & Hashtags</li>
                        <li><i class="fas fa-check text-success me-2"></i>2 Platforms (Instagram + FB)</li>
                        <li><i class="fas fa-check text-success me-2"></i>Cohesive Monthly Calendar</li>
                    </ul>
                    <a href="contact.php?plan=smm-standard" class="btn btn-primary rounded-pill px-4 py-2 w-100 fw-bold" style="background-color: var(--primary); border: none;">Get Started</a>
                </div>
            </div>
            <!-- SMM Premium -->
            <div class="col-md-4 reveal">
                <div class="pricing-card h-100 p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-3 fs-1 text-primary"><i class="fas fa-gem"></i></div>
                    <h4 class="fw-bold" style="color: var(--navy);">Premium Plan</h4>
                    <p class="plan-desc text-muted mb-3">Total Social Domination & LeadGen</p>
                    <div class="price fw-extrabold" style="font-size: 2.5rem; color: var(--navy);"><span class="currency" style="font-size: 1.5rem; vertical-align: super; font-weight: 700;">₹</span>14,999</div>
                    <div class="billing text-muted mb-4">/month</div>
                    <ul class="features-list list-unstyled mb-4 text-start ps-3" style="color: var(--gray); font-size: 0.95rem; line-height: 2;">
                        <li><i class="fas fa-check text-success me-2"></i>30 Posts (Daily Content)</li>
                        <li><i class="fas fa-check text-success me-2"></i>Full DM & Review Management</li>
                        <li><i class="fas fa-check text-success me-2"></i>Custom reel scripting & branding</li>
                        <li><i class="fas fa-check text-success me-2"></i>2+ Platforms</li>
                        <li><i class="fas fa-check text-success me-2"></i>Dedicated Creator Manager</li>
                    </ul>
                    <a href="contact.php?plan=smm-premium" class="btn btn-outline-primary rounded-pill px-4 py-2 w-100 fw-bold">Get Started</a>
                </div>
            </div>
        </div>

        <!-- ADS & FLAT ONE-TIME SERVICES -->
        <div class="section-header text-center reveal mt-5">
            <h2>Ads & <span style="color:var(--primary)">One-Time</span> Packages</h2>
            <p class="subtitle">Drive quick leads with Paid Ads or get your premium brand ecosystem deployed.</p>
            <div class="accent-line mx-auto"></div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-3 reveal">
                <div class="pricing-card p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-2 fs-2 text-primary"><i class="fab fa-google"></i></div>
                    <h5 class="fw-bold" style="color: var(--navy);">Google Ads</h5>
                    <div class="price fw-bold mb-1" style="font-size: 1.8rem; color: var(--navy);"><span style="font-size: 1.1rem; vertical-align: super;">₹</span>15,000</div>
                    <div class="billing text-muted mb-3">/month</div>
                    <a href="service-details.php?id=google-ads-package" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 fw-bold">Details</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal">
                <div class="pricing-card p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-2 fs-2 text-primary"><i class="fab fa-meta"></i></div>
                    <h5 class="fw-bold" style="color: var(--navy);">Meta Ads</h5>
                    <div class="price fw-bold mb-1" style="font-size: 1.8rem; color: var(--navy);"><span style="font-size: 1.1rem; vertical-align: super;">₹</span>15,000</div>
                    <div class="billing text-muted mb-3">/month</div>
                    <a href="service-details.php?id=meta-ad-package" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 fw-bold">Details</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal">
                <div class="pricing-card p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-2 fs-2 text-primary"><i class="fas fa-palette"></i></div>
                    <h5 class="fw-bold" style="color: var(--navy);">Brand System</h5>
                    <div class="price fw-bold mb-1" style="font-size: 1.8rem; color: var(--navy);"><span style="font-size: 1.1rem; vertical-align: super;">₹</span>35,000</div>
                    <div class="billing text-muted mb-3">one-time</div>
                    <a href="service-details.php?id=premium-brand-system" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 fw-bold">Details</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 reveal">
                <div class="pricing-card p-4 bg-white rounded-4 border shadow-sm text-center transition-all hover-translate-y">
                    <div class="plan-icon mb-2 fs-2 text-primary"><i class="fas fa-laptop-code"></i></div>
                    <h5 class="fw-bold" style="color: var(--navy);">Website Plan</h5>
                    <div class="price fw-bold mb-1" style="font-size: 1.8rem; color: var(--navy);"><span style="font-size: 1.1rem; vertical-align: super;">₹</span>15,000</div>
                    <div class="billing text-muted mb-3">one-time</div>
                    <a href="service-details.php?id=growth-website-plan" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 fw-bold">Details</a>
                </div>
            </div>
        </div>

        <!-- NEW INTERACTIVE PLANS COMPARISON TABLE (UI/UX Upgrade) -->
        <div class="section-header text-center reveal mt-5 pt-4">
            <h2>Detailed Package <span style="color:var(--primary)">Comparison</span></h2>
            <p class="subtitle">Compare core features side-by-side to make the right strategic decision.</p>
            <div class="accent-line mx-auto"></div>
        </div>

        <div class="table-responsive reveal mt-4">
            <table class="table table-bordered bg-white shadow-sm rounded-4" style="border-radius: 12px; overflow: hidden; vertical-align: middle;">
                <thead>
                    <tr class="bg-dark text-white text-center">
                        <th class="py-3 text-start ps-4" style="background: var(--navy) !important; color: white;">Features Included</th>
                        <th class="py-3" style="background: var(--navy) !important; color: white; width: 22%;">SEO Starter Plan</th>
                        <th class="py-3" style="background: var(--primary) !important; color: white; width: 22%;">Growth SEO Plan</th>
                        <th class="py-3" style="background: var(--navy) !important; color: white; width: 22%;">Pro SEO Plan</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-size: 0.95rem;">
                    <tr>
                        <td class="text-start ps-4 fw-bold" style="color: var(--navy);">Target Keywords</td>
                        <td>10 - 15 Keywords</td>
                        <td class="fw-bold" style="color: var(--primary);">20 - 30 Keywords</td>
                        <td>40 - 60 Keywords</td>
                    </tr>
                    <tr>
                        <td class="text-start ps-4 fw-bold" style="color: var(--navy);">Technical SEO Audit</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> Basic</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> Advanced</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> Comprehensive</td>
                    </tr>
                    <tr>
                        <td class="text-start ps-4 fw-bold" style="color: var(--navy);">On-Page Meta Optimizations</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i></td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i></td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start ps-4 fw-bold" style="color: var(--navy);">Monthly Backlink Building</td>
                        <td>5 Quality Links</td>
                        <td class="fw-bold" style="color: var(--primary);">10 - 15 Quality Links</td>
                        <td>20 - 30 Premium Links</td>
                    </tr>
                    <tr>
                        <td class="text-start ps-4 fw-bold" style="color: var(--navy);">Google My Business (GMB)</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> Setup</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> Active Optimizations</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> Full Reputation Mgmt</td>
                    </tr>
                    <tr>
                        <td class="text-start ps-4 fw-bold" style="color: var(--navy);">Blog Copywriting</td>
                        <td><i class="fas fa-times-circle text-danger fs-5"></i></td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> (1 Post/mo)</td>
                        <td><i class="fas fa-check-circle text-success fs-5"></i> (4 Posts/mo)</td>
                    </tr>
                    <tr>
                        <td class="text-start ps-4 fw-bold" style="color: var(--navy);">Reporting Frequency</td>
                        <td>Monthly Reports</td>
                        <td class="fw-bold" style="color: var(--primary);">Weekly Reports</td>
                        <td>Weekly Reports & Calls</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- FAQ ACCORDION -->
        <div class="section-header text-center reveal mt-5 pt-4">
            <h2>Frequently Asked <span style="color:var(--primary)">Questions</span></h2>
            <p class="subtitle">Answers to common queries regarding our billing cycles, setup, and deliverables.</p>
            <div class="accent-line mx-auto"></div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-9 reveal">
                <div class="accordion terms-accordion" id="pricingFAQAccordion">
                    <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f1">
                                How often am I billed for digital services?
                            </button>
                        </h2>
                        <div id="f1" class="accordion-collapse collapse" data-bs-parent="#pricingFAQAccordion">
                            <div class="accordion-body">
                                All recurring services (SEO plans, paid campaign management, social media plans) are billed on a monthly basis, in advance. One-time services like Brand Strategy and Custom Website Development require a 50% advance to kick off the project, and the final 50% upon delivery.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f2">
                                Are third-party ad spend budgets included in the pricing?
                            </button>
                        </h2>
                        <div id="f2" class="accordion-collapse collapse" data-bs-parent="#pricingFAQAccordion">
                            <div class="accordion-body">
                                No, our packages only cover agency setup, monitoring, ad design, and optimization fees. The actual advertising budget spent on Google Ads or Meta Ads is billed directly to your corporate credit card by Google or Meta.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm rounded-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f3">
                                Is there a minimum contract commitment length?
                            </button>
                        </h2>
                        <div id="f3" class="accordion-collapse collapse" data-bs-parent="#pricingFAQAccordion">
                            <div class="accordion-body">
                                For Paid Ads and Social Media, we operate on a month-to-month basis with no long-term lock-in. For organic SEO plans, we recommend a minimum commitment of 3 to 6 months, as organic indexing and domain authority building require time to manifest in solid search results.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
