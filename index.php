<?php
	include_once ('include/blog-data.php');
	include_once ('elements/header.php');
?>

    <main id="main">
        <section class="hero">
            <div class="hero-slide" style="background-image:url(images/main-slider/image-2.jpg)"></div>
            <div class="hero-slide" style="background-image:url(images/main-slider/image-3.jpg)"></div>
            <div class="hero-slide" style="background-image:url(images/background/4.jpg)"></div>
            <div class="container">
                <div class="hero-box">
                    <span class="eyebrow">Business Consulting &amp; Growth Partners</span>
                    <h1>Riding the Wave of <span>Business Success</span></h1>
                    <p>Titan Wave helps ambitious companies turn strategy into measurable growth with expert advisory,
                        global market access and tailored solutions.</p>
                    <div class="hero-actions"><a href="services.php" class="btn btn-gold">Our Services <svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a><a href="contact.php" class="btn btn-outline">Contact Us</a></div>
                </div>
            </div>
            <div class="hero-dots"><button aria-label="Slide 1"></button><button aria-label="Slide 2"></button><button
                    aria-label="Slide 3"></button></div>
        </section>

        <section class="strip">
            <div class="container">
                <div class="strip-grid">
                    <div class="strip-item rv">
                        <div class="ico"><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="10" />
                                <circle cx="12" cy="12" r="6" />
                                <circle cx="12" cy="12" r="2" />
                            </svg></div>
                        <div>
                            <h4>Strategic Focus</h4>
                            <p>Plans built around your goals and measurable outcomes.</p>
                        </div>
                    </div>
                    <div class="strip-item rv">
                        <div class="ico"><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="2" y1="12" x2="22" y2="12" />
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                            </svg></div>
                        <div>
                            <h4>Global Reach</h4>
                            <p>A trusted network spanning key international markets.</p>
                        </div>
                    </div>
                    <div class="strip-item rv">
                        <div class="ico"><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                <polyline points="9 12 11 14 15 10" />
                            </svg></div>
                        <div>
                            <h4>Trusted Expertise</h4>
                            <p>Experienced advisors committed to integrity and results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="split">
                    <div class="split-img rv"><img src="images/resource/featured-image-5.jpg"
                            alt="Titan Wave consultant" style="aspect-ratio:4/4.6">
                        <div class="badge-exp"><b>15+</b><span>Years of Experience</span></div>
                    </div>
                    <div class="rv d1"><span class="eyebrow">About Titan Wave</span>
                        <h2 style="font-size:clamp(28px,3.4vw,42px);font-weight:700">We Empower Businesses to <span
                                class="accent">Grow Beyond Borders</span></h2>
                        <p>At Titan Wave we combine deep industry knowledge with a personal, client-first approach. From
                            start-ups to established enterprises, we deliver clear strategy, practical guidance and the
                            global connections you need to grow.</p>
                        <ul class="ticks">
                            <li><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg> Tailored strategies for every business stage</li>
                            <li><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg> International market and partner access</li>
                            <li><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg> Transparent, results-driven collaboration</li>
                        </ul>
                        <a href="about.php" class="btn btn-gold">Discover More <svg class="svg-i " viewBox="0 0 24 24"
                                aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section alt">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Our Services</span>
                    <h2>Solutions Designed for <span>Growth</span></h2>
                    <p>A complete range of consulting services to help you plan, expand and operate with confidence.</p>
                </div>
                <div class="grid g3">

                    <div class="card rv d1"><span class="num">01</span>
                        <div class="ico">
                            <img src="images/icons/Gold Business Growth Chart Icon.png" alt="">
                        </div>
                        <h3>Business Strategy & Advisory</h3>
                        <p>Clear, data-backed roadmaps that align your vision, resources and market position for
                            sustainable growth.</p><a class="link-arrow" href="services-single.php">Learn More <svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a>
                    </div>

                    <div class="card rv d2"><span class="num">02</span>
                        <div class="ico">
                            <img src="images/icons/Global Expansion Globe Pin.png" alt="">
                        </div>
                        <h3>International Expansion</h3>
                        <p>Market-entry planning, partner sourcing and regulatory guidance to help you grow confidently
                            across borders.</p><a class="link-arrow" href="services-single.php">Learn More <svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a>
                    </div>
                    <div class="card rv d3"><span class="num">03</span>
                        <div class="ico">
                            <img src="images/icons/Gold Analytics Report Icon.png" alt="">
                        </div>
                        <h3>Market Research & Analysis</h3>
                        <p>Actionable insight on customers, competitors and trends so every decision rests on solid
                            evidence.</p><a class="link-arrow" href="services-single.php">Learn More <svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a>
                    </div>

                    <div class="card rv d1"><span class="num">04</span>
                        <div class="ico">
                            <img src="images/icons/Golden Coin Stacks with Growth Arrow.png" alt="">
                        </div>
                        <h3>Financial Planning & Investment</h3>
                        <p>Practical financial structuring, budgeting and investment advice built around your business
                            objectives.</p><a class="link-arrow" href="services-single.php">Learn More <svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a>
                    </div>

                    <div class="card rv d2"><span class="num">05</span>
                        <div class="ico">
                            <img src="images/icons/Interlocking Gold Gears Icon.png" alt="">
                        </div>
                        <h3>Operations Optimization</h3>
                        <p>Streamline processes, reduce costs and raise productivity with lean, measurable operating
                            models.</p><a class="link-arrow" href="services-single.php">Learn More <svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a>
                    </div>

                    <div class="card rv d3"><span class="num">06</span>
                        <div class="ico">
                            <img src="images/icons/Global Partnership Handshake Icon.png" alt="">
                        </div>
                        <h3>Partnerships & Networking</h3>
                        <p>Introductions to trusted partners, suppliers and investors across our international business
                            network.</p><a class="link-arrow" href="services-single.php">Learn More <svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="stats" style="background-image:url(images/background/parallax2.jpg)">
            <div class="container">
                <div class="grid g4 stats-grid">
                    <div class="stat rv"><b data-count="350" data-suffix="+">0</b><span>Projects Delivered</span></div>
                    <div class="stat rv"><b data-count="28" data-suffix="+">0</b><span>Countries Served</span></div>
                    <div class="stat rv"><b data-count="120" data-suffix="+">0</b><span>Happy Clients</span></div>
                    <div class="stat rv"><b data-count="15" data-suffix="+">0</b><span>Years Experience</span></div>
                </div>
            </div>
        </section>

         <section class="section why">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Why Choose Us</span>
                    <h2>The Titan Wave <span>Advantage</span></h2>
                    <p>We are committed to professionalism, personalized solutions and long-term partnerships built on trust.</p>
                </div>
                <div class="why-grid">
                    <div class="why-col left rv">
                        <div class="why-item"><div class="ico"><svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg></div><div><span class="why-n">01</span><h4>Proven Excellence</h4><p>A track record of delivering high-quality outcomes for clients across industries.</p></div></div>
                        <div class="why-item"><div class="ico"><svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div><div><span class="why-n">02</span><h4>Dedicated Team</h4><p>Seasoned consultants who work as an extension of your own leadership team.</p></div></div>
                    </div>
                    <div class="why-img rv d1">
                        <img src="images/gallery/10.jpg" alt="Titan Wave consultant at work" loading="lazy">
                        <div class="why-badge"><b>98%</b><span>Client Satisfaction</span></div>
                    </div>
                    <div class="why-col rv d2">
                        <div class="why-item"><div class="ico"><svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div><div><span class="why-n">03</span><h4>Global Network</h4><p>Access to partners, markets and opportunities across the world.</p></div></div>
                        <div class="why-item"><div class="ico"><svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div><div><span class="why-n">04</span><h4>Responsive Support</h4><p>Clear communication and reliable support at every stage of your project.</p></div></div>
                    </div>
                </div>
                <div class="why-cta rv">
                    <p>Ready to experience the Titan Wave difference?</p>
                    <a href="contact.php" class="btn btn-gold">Talk to an Advisor <svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
                </div>
            </div>
        </section>

        <section class="section alt process">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">How We Work</span>
                    <h2>Our Simple <span>4-Step</span> Process</h2>
                </div>
                <div class="grid g4">
                    <div class="step rv d1">
                        <div class="n">01</div>
                        <h4>Discover</h4>
                        <p>We learn your business, goals and challenges in depth.</p>
                    </div>
                    <div class="step rv d2">
                        <div class="n">02</div>
                        <h4>Strategize</h4>
                        <p>Our experts craft a tailored, data-driven roadmap.</p>
                    </div>
                    <div class="step rv d3">
                        <div class="n">03</div>
                        <h4>Implement</h4>
                        <p>We support execution with hands-on guidance.</p>
                    </div>
                    <div class="step rv d1">
                        <div class="n">04</div>
                        <h4>Grow</h4>
                        <p>We measure results and refine for lasting success.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Our Work</span>
                    <h2>Featured <span>Projects</span></h2>
                    <p>A selection of recent engagements where strategy met measurable results.</p>
                </div>
                <div class="grid g3"><a href="#" class="work rv d1" data-full="images/gallery/1.jpg"><img
                            src="images/gallery/1.jpg" alt="Market Entry Strategy" loading="lazy"><span
                            class="zoom"><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Strategy</small>
                            <h4>Market Entry Strategy</h4>
                        </div>
                    </a><a href="#" class="work rv d2" data-full="images/gallery/2.jpg"><img src="images/gallery/2.jpg"
                            alt="Leadership Workshop" loading="lazy"><span class="zoom"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Consulting</small>
                            <h4>Leadership Workshop</h4>
                        </div>
                    </a><a href="#" class="work rv d3" data-full="images/gallery/3.jpg"><img src="images/gallery/3.jpg"
                            alt="Financial Modelling" loading="lazy"><span class="zoom"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Finance</small>
                            <h4>Financial Modelling</h4>
                        </div>
                    </a><a href="#" class="work rv d1" data-full="images/gallery/4.jpg"><img src="images/gallery/4.jpg"
                            alt="Growth Planning" loading="lazy"><span class="zoom"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Strategy</small>
                            <h4>Growth Planning</h4>
                        </div>
                    </a><a href="#" class="work rv d2" data-full="images/gallery/5.jpg"><img src="images/gallery/5.jpg"
                            alt="Analytics Dashboard" loading="lazy"><span class="zoom"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Consulting</small>
                            <h4>Analytics Dashboard</h4>
                        </div>
                    </a><a href="#" class="work rv d3" data-full="images/gallery/6.jpg"><img src="images/gallery/6.jpg"
                            alt="Investment Review" loading="lazy"><span class="zoom"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Finance</small>
                            <h4>Investment Review</h4>
                        </div>
                    </a></div>
            </div>
        </section>

        <div class="lightbox"><button aria-label="Close">&times;</button><img alt=""></div>

        <section class="section alt">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Our Experts</span>
                    <h2>Meet the <span>Team</span></h2>
                    <p>The people behind Titan Wave — experienced, approachable and focused on your success.</p>
                </div>
                <div class="grid g4">
                    <div class="member rv d1">
                        <div class="ph"><img src="images/resource/staff-1.jpg" alt="Anna Peterson" loading="lazy">
                            <div class="soc"><a href="#" aria-label="LinkedIn"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path
                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                        <rect x="2" y="9" width="4" height="12" />
                                        <circle cx="4" cy="4" r="2" />
                                    </svg></a><a href="#" aria-label="Facebook"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                    </svg></a><a href="#" aria-label="X"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <line x1="4" y1="4" x2="20" y2="20" />
                                        <line x1="20" y1="4" x2="4" y2="20" />
                                    </svg></a></div>
                        </div>
                        <div class="txt">
                            <h4>Anna Peterson</h4><span>Chief Executive Officer</span>
                        </div>
                    </div>
                    <div class="member rv d2">
                        <div class="ph"><img src="images/resource/staff-2.jpg" alt="Steven Finch" loading="lazy">
                            <div class="soc"><a href="#" aria-label="LinkedIn"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path
                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                        <rect x="2" y="9" width="4" height="12" />
                                        <circle cx="4" cy="4" r="2" />
                                    </svg></a><a href="#" aria-label="Facebook"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                    </svg></a><a href="#" aria-label="X"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <line x1="4" y1="4" x2="20" y2="20" />
                                        <line x1="20" y1="4" x2="4" y2="20" />
                                    </svg></a></div>
                        </div>
                        <div class="txt">
                            <h4>Steven Finch</h4><span>Head of Strategy</span>
                        </div>
                    </div>
                    <div class="member rv d3">
                        <div class="ph"><img src="images/resource/staff-3.jpg" alt="Garry Miller" loading="lazy">
                            <div class="soc"><a href="#" aria-label="LinkedIn"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path
                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                        <rect x="2" y="9" width="4" height="12" />
                                        <circle cx="4" cy="4" r="2" />
                                    </svg></a><a href="#" aria-label="Facebook"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                    </svg></a><a href="#" aria-label="X"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <line x1="4" y1="4" x2="20" y2="20" />
                                        <line x1="20" y1="4" x2="4" y2="20" />
                                    </svg></a></div>
                        </div>
                        <div class="txt">
                            <h4>Garry Miller</h4><span>Director, International</span>
                        </div>
                    </div>
                    <div class="member rv d1">
                        <div class="ph"><img src="images/resource/staff-4.jpg" alt="Suzie Bates" loading="lazy">
                            <div class="soc"><a href="#" aria-label="LinkedIn"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path
                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                        <rect x="2" y="9" width="4" height="12" />
                                        <circle cx="4" cy="4" r="2" />
                                    </svg></a><a href="#" aria-label="Facebook"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                    </svg></a><a href="#" aria-label="X"><svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <line x1="4" y1="4" x2="20" y2="20" />
                                        <line x1="20" y1="4" x2="4" y2="20" />
                                    </svg></a></div>
                        </div>
                        <div class="txt">
                            <h4>Suzie Bates</h4><span>Senior Consultant</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Testimonials</span>
                    <h2>What Our <span>Clients</span> Say</h2>
                </div>
                <div class="slider rv">
                    <div class="slider-view">
                        <div class="slider-track">
                            <div class="slider-slide">
                                <div class="tcard">
                                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <p>Titan Wave gave us a clear plan for entering two new regions. Their
                                        professionalism and attention to detail were outstanding from day one.</p>
                                    <div class="who"><img src="images/resource/author-1.jpg" alt="John Abraham"
                                            loading="lazy">
                                        <div>
                                            <h5>John Abraham</h5><span>CEO, Nexora Group</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-slide">
                                <div class="tcard">
                                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <p>The market research was thorough and genuinely actionable. We cut our launch risk
                                        and reached profitability months ahead of forecast.</p>
                                    <div class="who"><img src="images/resource/author-2.jpg" alt="Brad Hussey"
                                            loading="lazy">
                                        <div>
                                            <h5>Brad Hussey</h5><span>Founder, BlueStone Trading</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-slide">
                                <div class="tcard">
                                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <p>A reliable, responsive team who treat your business like their own. Their
                                        international network opened doors we could not have opened alone.</p>
                                    <div class="who"><img src="images/resource/author-3.jpg" alt="Brenden Tylor"
                                            loading="lazy">
                                        <div>
                                            <h5>Brenden Tylor</h5><span>Managing Director, Crestline</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-slide">
                                <div class="tcard">
                                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <p>Operational improvements recommended by Titan Wave saved us significant cost
                                        within the first quarter. Highly recommended.</p>
                                    <div class="who"><img src="images/resource/author-4.jpg" alt="John Butler"
                                            loading="lazy">
                                        <div>
                                            <h5>John Butler</h5><span>COO, Apex Logistics</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-slide">
                                <div class="tcard">
                                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <p>Strategic, practical and honest. They tell you what you need to hear and then
                                        help you deliver it.</p>
                                    <div class="who"><img src="images/resource/author-5.jpg" alt="Max Webar"
                                            loading="lazy">
                                        <div>
                                            <h5>Max Webar</h5><span>Director, Orion Ventures</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-slide">
                                <div class="tcard">
                                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                    <p>From the first consultation to implementation, the support was personal and
                                        consistently excellent.</p>
                                    <div class="who"><img src="images/resource/author-6.jpg" alt="Danial Fox"
                                            loading="lazy">
                                        <div>
                                            <h5>Danial Fox</h5><span>Owner, Fox & Partners</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="arrows"><button class="prev" aria-label="Previous"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="19" y1="12" x2="5" y2="12" />
                                <polyline points="12 19 5 12 12 5" />
                            </svg></button><button class="next" aria-label="Next"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg></button></div>
                </div>
            </div>
        </section>

        <section class="section alt">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Latest News</span>
                    <h2>Insights &amp; <span>Articles</span></h2>
                    <p>Fresh perspectives from our consultants on business, markets and growth.</p>
                </div>
                <div class="news-layout">
                    <?php $__news = array_slice(array_values(blog_all()), 0, 4); $__f = $__news[0]; $__fa = blog_authors()[$__f['author']]; $__fu = blog_url($__f['slug']); ?>
                    <article class="nf rv big"><a class="nf-img" href="<?= $__fu ?>"><?= blog_img_tag($__f, 1000) ?><span class="cat"><?= htmlspecialchars($__f['cat']) ?></span></a>
                    <div class="nf-body"><div class="nmeta"><span><?= blog_icon('cal') ?> <?= blog_date($__f['date']) ?></span><span><?= blog_icon('clock') ?> <?= (int)$__f['read'] ?> min read</span></div><h3><a href="<?= $__fu ?>"><?= htmlspecialchars($__f['title']) ?></a></h3><p><?= htmlspecialchars($__f['excerpt']) ?></p>
                    <div class="nf-foot"><div class="by"><img src="<?= $__fa['img'] ?>" alt="" loading="lazy"><span><?= htmlspecialchars($__f['author']) ?></span></div><a class="link-arrow" href="<?= $__fu ?>">Read Article <?= blog_icon('arrow') ?></a></div></div></article>
                    <div class="news-side">
                    <?php foreach (array_slice($__news, 1, 3) as $__i => $__p): $__u = blog_url($__p['slug']); ?>
                        <article class="nmini rv d<?= $__i + 1 ?>"><a class="nmini-img" href="<?= $__u ?>"><?= blog_img_tag($__p, 400) ?></a>
                        <div><span class="cat-text"><?= htmlspecialchars($__p['cat']) ?></span><h4><a href="<?= $__u ?>"><?= htmlspecialchars($__p['title']) ?></a></h4><div class="nmeta"><span><?= blog_icon('cal') ?> <?= blog_date($__p['date']) ?></span><span><?= blog_icon('clock') ?> <?= (int)$__p['read'] ?> min read</span></div></div></article>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="center rv" style="margin-top:48px"><a href="blog.php" class="btn btn-dark">View All Articles <svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a></div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="callback rv">
                    <div class="l"><span class="eyebrow">Request a Call Back</span>
                        <h2>Let&rsquo;s Talk About Your Goals</h2>
                        <p>Leave your details and one of our advisors will contact you shortly.</p>
                        <div>
                            <form data-demo><input class="input" type="text" placeholder="Your Name" required
                                    aria-label="Name"><input class="input" type="email" placeholder="Email Address"
                                    required aria-label="Email"><input class="input" type="tel"
                                    placeholder="Phone Number" aria-label="Phone"><button class="btn btn-gold"
                                    type="submit">Request Call Back <svg class="svg-i " viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                        <polyline points="12 5 19 12 12 19" />
                                    </svg></button></form>
                            <div class="form-msg">Thank you! Our team will be in touch shortly.</div>
                        </div>
                    </div>
                    <div class="r" style="background-image:url(images/background/4.jpg)"></div>
                </div>
            </div>
        </section>

    </main>

<?php
	include_once ('elements/footer.php')
?>