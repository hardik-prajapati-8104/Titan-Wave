<?php
/* Friendly 404 page. .htaccess sends every unknown (non-asset) URL here. */
http_response_code(404);
header('X-Robots-Tag: noindex');

/* The page may be served from a deeper URL (e.g. /foo/bar), so make relative css/js/image paths resolve from this folder */
$scheme   = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$dir      = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$baseHref = $scheme . '://' . $_SERVER['HTTP_HOST'] . $dir . '/';

$pageTitle = 'Page Not Found | TITAN WAVE';
$pageDesc  = 'The page you are looking for could not be found.';
include_once('elements/header.php');
?>
    <main id="main">

        <section class="banner" style="background-image:url(images/background/4.jpg)">
            <div class="container">
                <h1>Page Not Found</h1>
                <ul class="crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li>404</li>
                </ul>
            </div>
        </section>

        <section class="section">
            <div class="container" style="text-align:center;max-width:720px">
                <div style="font-size:clamp(90px,18vw,170px);font-weight:700;line-height:1;color:var(--gold)">404</div>
                <h2 style="margin:10px 0 14px">Oops! This page doesn&rsquo;t exist</h2>
                <p>The page may have been moved, renamed or never existed. Use one of the links below to get back on track.</p>
                <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;margin-top:30px">
                    <a href="index.php" class="btn btn-gold">Back to Home</a>
                    <a href="services.php" class="btn btn-dark">Our Services</a>
                    <a href="contact.php" class="btn btn-dark">Contact Us</a>
                </div>
            </div>
        </section>

    </main>

<?php include_once('elements/footer.php'); ?>
