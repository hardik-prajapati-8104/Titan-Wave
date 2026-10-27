<?php
include_once('include/services-data.php');
$pageTitle = 'Contact Us | TITAN WAVE';
$pageDesc  = 'Get in touch with Titan Wave. Call, email or send us a message and our team will respond within one business day.';
include_once('elements/header.php');
?>

    <main id="main">

        <section class="banner" style="background-image:url(images/background/4.jpg)">
            <div class="container">
                <h1>Contact Us</h1>
                <ul class="crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </section>

        <!-- Contact details -->
        <section class="section ct-top">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Contact Us</span>
                    <h2>Let&rsquo;s Start a <span>Conversation</span></h2>
                    <p>Questions about our services or ready to begin? Reach us any way that suits you.</p>
                </div>
                <div class="ct-cards">
                    <a class="info-card ct-card rv d1" href="https://www.google.com/maps/search/?api=1&amp;query=Manhattan%2C+New+York%2C+USA" target="_blank" rel="noopener">
                        <div class="ico"><svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                        <div class="ct-txt">
                            <h4>Visit Us</h4>
                            <p>IFZA Business Park, DDP ,45137 - 001 ,A1 - 3641379065 Dubai Silicon Oasis, Dubai, UAE</p>
                            <span class="ct-act">Get directions</span>
                        </div>
                    </a>
                    <a class="info-card ct-card rv d2" href="tel:+971569487710">
                        <div class="ico"><svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
                        <div class="ct-txt">
                            <h4>Call Us</h4>
                            <p>+971569487710<br>Mon &ndash; Fri, 9:00 &ndash; 18:00</p>
                            <span class="ct-act">Call now</span>
                        </div>
                    </a>
                    <a class="info-card ct-card rv d3" href="mailto: support@thetitanwave.com">
                        <div class="ico"><svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
                        <div class="ct-txt">
                            <h4>Email Us</h4>
                            <p> support@thetitanwave.com<br>www.titanwave.com</p>
                            <span class="ct-act">Send an email</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Form + map -->
        <section class="section alt ct-main">
            <div class="container">
                <div class="ct-grid">

                    <div class="rv">
                        <div class="form-box ct-form">
                            <span class="eyebrow">Get In Touch</span>
                            <h2>Send Us a Message</h2>
                            <p>Fill in the form and our team will respond within one business day.</p>
                            <form data-demo>
                                <div class="form-grid">
                                    <div>
                                        <label class="f" for="n">Full Name <i>*</i></label>
                                        <input class="input" id="n" name="name" type="text" autocomplete="name" placeholder="John Smith" required>
                                    </div>
                                    <div>
                                        <label class="f" for="e">Email <i>*</i></label>
                                        <input class="input" id="e" name="email" type="email" autocomplete="email" inputmode="email" placeholder="you@company.com" required>
                                    </div>
                                    <div>
                                        <label class="f" for="p">Phone</label>
                                        <input class="input" id="p" name="phone" type="tel" autocomplete="tel" inputmode="tel" placeholder="+1 (800) 000-0000">
                                    </div>
                                    <div>
                                        <label class="f" for="sv">Service of Interest</label>
                                        <select class="input" id="sv" name="service">
                                            <option value="">Select a service</option>
                                            <?php foreach (svc_all() as $sv): ?>
                                                <option value="<?= htmlspecialchars($sv['slug']) ?>"><?= htmlspecialchars($sv['title']) ?></option>
                                            <?php endforeach; ?>
                                            <option value="other">Something else</option>
                                        </select>
                                    </div>
                                    <div class="full">
                                        <label class="f" for="s">Subject</label>
                                        <input class="input" id="s" name="subject" type="text" placeholder="How can we help?">
                                    </div>
                                    <div class="full">
                                        <label class="f" for="m">Message <i>*</i></label>
                                        <textarea class="input" id="m" name="message" placeholder="Tell us a little about your business and what you need..." required></textarea>
                                    </div>
                                    <div class="full ct-submit">
                                        <button class="btn btn-gold" type="submit">Send Message <svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></button>
                                        <small>We respect your privacy and never share your details.</small>
                                    </div>
                                </div>
                            </form>
                            <div class="form-msg" role="status">Thank you! Your message has been received &mdash; we&rsquo;ll be in touch soon.</div>
                        </div>
                    </div>

                    <div class="ct-side rv d1">
                        <div class="map ct-map"><iframe title="Titan Wave location map" loading="lazy"
                                src="https://www.openstreetmap.org/export/embed.php?bbox=-74.03%2C40.70%2C-73.92%2C40.80&amp;layer=mapnik"></iframe>
                        </div>
                        <div class="ct-hours">
                            <div>
                                <h4>Office Hours</h4>
                                <p>Mon &ndash; Fri: 9:00 &ndash; 18:00<br>Sat &ndash; Sun: Closed</p>
                            </div>
                            <a class="btn btn-dark btn-sm" href="https://www.google.com/maps/search/?api=1&amp;query=Manhattan%2C+New+York%2C+USA" target="_blank" rel="noopener">Open in Maps</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

<?php include_once('elements/footer.php'); ?>
