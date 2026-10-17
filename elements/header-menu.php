<?php $__cur = basename($_SERVER['PHP_SELF']); ?>

    <a class="skip" href="<?= isset($baseHref) ? htmlspecialchars($_SERVER['REQUEST_URI']) : '' ?>#main">Skip to content</a>

    <div class="preloader"><i></i></div>

    <div class="topbar">
        <div class="container">

            <ul>

                <li>
                    <svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg> 
                    Manhattan, New York, USA
                </li>

                <li>
                    <svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg> 
                    <a href="tel:+18001234567">+1 (800) 123-4567</a>
                </li>

                <li>
                    <svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg> 
                    <a href="mailto: support@thetitanwave.com"> support@thetitanwave.com</a>
                </li>

            </ul>

            <div class="social">
                <a href="#" aria-label="LinkedIn">
                    <svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                        <rect x="2" y="9" width="4" height="12" />
                        <circle cx="4" cy="4" r="2" />
                    </svg>
                </a>

                <a href="#" aria-label="Facebook">
                    <svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                    </svg>
                </a>

                <a href="#" aria-label="X">
                    <svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                        <line x1="4" y1="4" x2="20" y2="20" />
                        <line x1="20" y1="4" x2="4" y2="20" />
                    </svg>
                </a>

                <a href="#" aria-label="Instagram">
                    <svg class="svg-i " viewBox="0 0 24 24"
                        aria-hidden="true">
                        <rect x="2" y="2" width="20" height="20" rx="5" />
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                    </svg>
                </a>
            </div>

        </div>
    </div>

    <header class="header">

        <div class="container">

            <a class="logo" href="index.php" aria-label="Titan Wave home">
                <img class="logo-img" src="images/logo.png" alt="Titan Wave" width="150" height="56">
            </a>

            <ul class="nav" id="nav">
                <li><a href="index.php"<?= $__cur === 'index.php' ? ' class="active"' : '' ?>>Home</a></li>
                <li><a href="about.php"<?= $__cur === 'about.php' ? ' class="active"' : '' ?>>About</a></li>
                <li><a href="services.php"<?= in_array($__cur, ['services.php','services-single.php']) ? ' class="active"' : '' ?>>Services</a></li>
                <li><a href="gallery.php"<?= $__cur === 'gallery.php' ? ' class="active"' : '' ?>>Projects</a></li>
                <li><a href="blog.php"<?= in_array($__cur, ['blog.php','blog-single.php']) ? ' class="active"' : '' ?>>Blog</a></li>
                <li>

                    <a href="javascript:void(0);" aria-haspopup="true" aria-expanded="false">Pages 
                        <svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </a>

                    <div class="sub">
                        <a href="faq.php">FAQ's</a>
                        <a href="testimonial.php">Testimonials</a>
                        <a href="privacy-policy.php">Privacy Policy</a>
                        <a href="terms-conditions.php">Terms & Conditions</a>
                    </div>

                </li>

                <li><a href="contact.php"<?= $__cur === 'contact.php' ? ' class="active"' : '' ?>>Contact</a></li>
                <li class="nav-cta"><a href="contact.php" class="btn btn-gold">Get a Quote</a></li>
            </ul>

            <a href="contact.php" class="btn btn-gold btn-sm">Get a Quote</a>
            <button class="burger" aria-label="Toggle menu" aria-expanded="false"><span></span><span></span><span></span></button>

        </div>
        
    </header>
    