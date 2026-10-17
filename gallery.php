<?php
	include_once ('elements/header.php')
?>

    
    <main id="main">

        <section class="banner" style="background-image:url(images/background/4.jpg)">
            <div class="container">
                <h1>Our Projects</h1>
                <ul class="crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li>Projects</li>
                </ul>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Portfolio</span>
                    <h2>Our Recent <span>Work</span></h2>
                    <p>Browse by category to see how we have helped clients plan, grow and succeed.</p>
                </div>
                <div class="filters rv"><button class="on" data-filter="all">All</button><button
                        data-filter="Strategy">Strategy</button><button
                        data-filter="Consulting">Consulting</button><button data-filter="Finance">Finance</button></div>
                <div class="grid g3"><a href="#" class="work rv d1" data-cat="Strategy"
                        data-full="images/gallery/1.jpg"><img src="images/gallery/1.jpg" alt="Market Entry Strategy"
                            loading="lazy"><span class="zoom"><svg class="svg-i " viewBox="0 0 24 24"
                                aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Strategy</small>
                            <h4>Market Entry Strategy</h4>
                        </div>
                    </a><a href="#" class="work rv d2" data-cat="Consulting" data-full="images/gallery/2.jpg"><img
                            src="images/gallery/2.jpg" alt="Leadership Workshop" loading="lazy"><span class="zoom"><svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Consulting</small>
                            <h4>Leadership Workshop</h4>
                        </div>
                    </a><a href="#" class="work rv d3" data-cat="Finance" data-full="images/gallery/3.jpg"><img
                            src="images/gallery/3.jpg" alt="Financial Modelling" loading="lazy"><span class="zoom"><svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Finance</small>
                            <h4>Financial Modelling</h4>
                        </div>
                    </a><a href="#" class="work rv d1" data-cat="Strategy" data-full="images/gallery/4.jpg"><img
                            src="images/gallery/4.jpg" alt="Growth Planning" loading="lazy"><span class="zoom"><svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Strategy</small>
                            <h4>Growth Planning</h4>
                        </div>
                    </a><a href="#" class="work rv d2" data-cat="Consulting" data-full="images/gallery/5.jpg"><img
                            src="images/gallery/5.jpg" alt="Analytics Dashboard" loading="lazy"><span class="zoom"><svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Consulting</small>
                            <h4>Analytics Dashboard</h4>
                        </div>
                    </a><a href="#" class="work rv d3" data-cat="Finance" data-full="images/gallery/6.jpg"><img
                            src="images/gallery/6.jpg" alt="Investment Review" loading="lazy"><span class="zoom"><svg
                                class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Finance</small>
                            <h4>Investment Review</h4>
                        </div>
                    </a><a href="#" class="work rv d1" data-cat="Strategy" data-full="images/resource/news-7.jpg"><img
                            src="images/resource/news-7.jpg" alt="Corporate Roundtable" loading="lazy"><span
                            class="zoom"><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Strategy</small>
                            <h4>Corporate Roundtable</h4>
                        </div>
                    </a><a href="#" class="work rv d2" data-cat="Consulting"
                        data-full="images/resource/service-2.jpg"><img src="images/resource/service-2.jpg"
                            alt="Client Advisory Session" loading="lazy"><span class="zoom"><svg class="svg-i "
                                viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Consulting</small>
                            <h4>Client Advisory Session</h4>
                        </div>
                    </a><a href="#" class="work rv d3" data-cat="Finance" data-full="images/resource/service-3.jpg"><img
                            src="images/resource/service-3.jpg" alt="Quarterly Performance Review" loading="lazy"><span
                            class="zoom"><svg class="svg-i " viewBox="0 0 24 24" aria-hidden="true">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg></span>
                        <div class="work-info"><small>Finance</small>
                            <h4>Quarterly Performance Review</h4>
                        </div>
                    </a></div>
            </div>
        </section>

        <div class="lightbox"><button aria-label="Close">&times;</button><img alt=""></div>
        <section class="cta" style="background-image:url(images/background/parallax.jpg)">
            <div class="container">
                <div>
                    <h2>Ready to Take Your Business to the Next Level?</h2>
                    <p>Speak with a Titan Wave advisor today and discover a tailored strategy built around your goals.
                    </p>
                </div><a href="contact.php" class="btn btn-white">Get Free Consultation <svg class="svg-i "
                        viewBox="0 0 24 24" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg></a>
            </div>
        </section>

    </main>

    <?php
        include_once ('elements/footer.php')
    ?>