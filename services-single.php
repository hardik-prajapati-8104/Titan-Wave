<?php
include_once('include/services-data.php');

/* ---- Which service? (?slug=...) — no slug shows the first one, an unknown slug goes back to the list ---- */
$all  = svc_all();
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
if ($slug === '') {
    $keys = array_keys($all);
    $slug = $keys[0];
}
$s = svc_get($slug);
if (!$s) {
    header('Location: services.php');
    exit;
}

/* Previous / next / related */
$keys = array_keys($all);
$idx  = array_search($slug, $keys, true);
$prev = $all[$keys[($idx - 1 + count($keys)) % count($keys)]];
$next = $all[$keys[($idx + 1) % count($keys)]];
$related = [];
for ($k = 1; $k <= 3; $k++) $related[] = $all[$keys[($idx + $k) % count($keys)]];

$pageTitle = $s['title'] . ' | TITAN WAVE';
$pageDesc  = $s['short'];
include_once('elements/header.php');
?>

    <main id="main">

        <section class="banner" style="background-image:url(images/background/4.jpg)">
            <div class="container">
                <h1><?= htmlspecialchars($s['title']) ?></h1>
                <ul class="crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><?= htmlspecialchars($s['title']) ?></li>
                </ul>
            </div>
        </section>

        <section class="section" id="svTop">
            <div class="container">
                <div class="layout left">

                    <aside class="side sv-side">
                        <div class="widget">
                            <h4>All Services</h4>
                            <ul class="list">
                                <?php foreach ($all as $item): ?>
                                    <li><a href="<?= svc_url($item['slug']) ?>"<?= $item['slug'] === $slug ? ' class="active" aria-current="page"' : '' ?>><?= htmlspecialchars($item['title']) ?> <?= svc_icon('arrow') ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="widget">
                            <h4>Our Brochure</h4>
                            <p>Download our company profile to learn more about our services.</p>
                            <a href="contact.php" class="btn btn-gold btn-sm" style="width:100%;justify-content:center;margin-bottom:12px"><?= svc_icon('file') ?> Download PDF</a>
                            <a href="contact.php" class="btn btn-dark btn-sm" style="width:100%;justify-content:center"><?= svc_icon('file') ?> Download DOC</a>
                        </div>
                        <div class="widget help-widget">
                            <h4>Need Help?</h4>
                            <p>Talk to a Titan Wave advisor about your requirements.</p>
                            <a class="big" href="tel:+18001234567">+971569487710</a>
                            <a href="contact.php" class="btn btn-gold btn-sm">Request a Quote</a>
                        </div>
                    </aside>

                    <div class="article sv-article rv" id="svArticle">

                        <figure class="hero-img sv-hero">
                            <?= svc_img_tag($s, 1200, $s['title'], false, 675) ?>
                            <figcaption class="sv-badge"><?= svc_icon($s['icon']) ?> Service <?= str_pad((string)$s['no'], 2, '0', STR_PAD_LEFT) ?></figcaption>
                        </figure>

                        <div class="sv-meta">
                            <span><?= svc_icon('clock') ?> Typical duration: <b><?= htmlspecialchars($s['dur']) ?></b></span>
                            <span><?= svc_icon('check') ?> Tailored to your business</span>
                            <span><?= svc_icon('users') ?> Dedicated expert team</span>
                        </div>

                        <h2 class="sv-title"><?= htmlspecialchars($s['heading']) ?></h2>
                        <p class="sv-lead"><?= htmlspecialchars($s['intro'][0]) ?></p>
                        <?php for ($i = 1; $i < count($s['intro']); $i++): ?>
                            <p><?= htmlspecialchars($s['intro'][$i]) ?></p>
                        <?php endfor; ?>

                        <div class="sv-stats">
                            <?php foreach ($s['stats'] as $st): ?>
                                <div><b><?= htmlspecialchars($st[0]) ?></b><span><?= htmlspecialchars($st[1]) ?></span></div>
                            <?php endforeach; ?>
                        </div>

                        <h3>What&rsquo;s Included</h3>
                        <ul class="benefits sv-features">
                            <?php foreach ($s['features'] as $f): ?>
                                <li><?= svc_icon('check') ?><span><?= htmlspecialchars($f) ?></span></li>
                            <?php endforeach; ?>
                        </ul>

                        <h3>How It Works</h3>
                        <ol class="sv-steps">
                            <?php foreach (svc_process() as $n => $step): ?>
                                <li>
                                    <span class="sv-n"><?= $n + 1 ?></span>
                                    <div><h4><?= htmlspecialchars($step[0]) ?></h4><p><?= htmlspecialchars($step[1]) ?></p></div>
                                </li>
                            <?php endforeach; ?>
                        </ol>

                        <blockquote>&ldquo;<?= htmlspecialchars($s['quote']) ?>&rdquo;</blockquote>

                        <h3>Key Benefits</h3>
                        <div class="grid g2 sv-benefits">
                            <?php foreach ($s['benefits'] as $b): ?>
                                <div class="feat">
                                    <div class="ico"><?= svc_icon('check') ?></div>
                                    <div>
                                        <h4><?= htmlspecialchars($b[0]) ?></h4>
                                        <p><?= htmlspecialchars($b[1]) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <h3>Frequently Asked Questions</h3>
                        <div class="sv-faq">
                            <?php foreach ($s['faqs'] as $n => $fq): ?>
                                <details<?= $n === 0 ? ' open' : '' ?>>
                                    <summary><?= htmlspecialchars($fq[0]) ?><?= svc_icon('plus') ?></summary>
                                    <p><?= htmlspecialchars($fq[1]) ?></p>
                                </details>
                            <?php endforeach; ?>
                        </div>

                        <div class="sv-actions">
                            <a href="contact.php" class="btn btn-gold">Request a Quote <?= svc_icon('arrow') ?></a>
                            <a href="tel:+18001234567" class="btn btn-dark"><?= svc_icon('phone') ?> +971569487710</a>
                        </div>

                        <nav class="bl-pn sv-pn" aria-label="More services">
                            <a href="<?= svc_url($prev['slug']) ?>" rel="prev"><small><?= svc_icon('left') ?> Previous Service</small><b><?= htmlspecialchars($prev['title']) ?></b></a>
                            <a href="<?= svc_url($next['slug']) ?>" rel="next" class="bl-pn-next"><small>Next Service <?= svc_icon('arrow') ?></small><b><?= htmlspecialchars($next['title']) ?></b></a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="section alt" id="svRelated">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Explore More</span>
                    <h2>Related <span>Services</span></h2>
                </div>
                <div class="grid g3 svc-grid">
                    <?php foreach ($related as $i => $r) echo svc_card($r, $i + 1); ?>
                </div>
                <div class="center" style="text-align:center;margin-top:44px"><a href="services.php" class="btn btn-gold">View All Services <?= svc_icon('arrow') ?></a></div>
            </div>
        </section>

        <section class="cta" style="background-image:url(images/background/parallax.jpg)">
            <div class="container">
                <div>
                    <h2>Ready to Take Your Business to the Next Level?</h2>
                    <p>Speak with a Titan Wave advisor today and discover a tailored strategy built around your goals.
                    </p>
                </div><a href="contact.php" class="btn btn-white">Get Free Consultation <?= svc_icon('arrow') ?></a>
            </div>
        </section>

    </main>

    <script>
    /* Services detail: switch service without reloading the page (falls back to normal links) */
    (function () {
        if (!window.fetch || !window.DOMParser || !window.URL) return;
        var reqId = 0;

        function showAll(root) {
            // the root itself is a .rv element too (the article), so reveal it as well as its children
            if (root.classList && root.classList.contains('rv')) root.classList.add('in');
            Array.prototype.forEach.call(root.querySelectorAll('.rv'), function (el) { el.classList.add('in'); });
        }
        function setActive(slug) {
            Array.prototype.forEach.call(document.querySelectorAll('.sv-side .list a'), function (a) {
                var on = new URL(a.href, location.href).searchParams.get('slug') === slug;
                a.classList.toggle('active', on);
                if (on) a.setAttribute('aria-current', 'page'); else a.removeAttribute('aria-current');
            });
        }
        function load(url, push) {
            var id = ++reqId,
                art = document.getElementById('svArticle'),
                u = new URL(url, location.href);
            if (art) art.classList.add('is-loading');
            fetch(u.pathname + u.search, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function (r) { if (!r.ok) throw new Error(r.status); return r.text(); })
                .then(function (html) {
                    if (id !== reqId) return;
                    var doc = new DOMParser().parseFromString(html, 'text/html'),
                        nArt = doc.getElementById('svArticle');
                    if (!nArt) throw new Error('bad response');

                    // banner (title + breadcrumb)
                    var oB = document.querySelector('.banner .container'), nB = doc.querySelector('.banner .container');
                    if (oB && nB) oB.innerHTML = nB.innerHTML;
                    // article
                    document.getElementById('svArticle').replaceWith(nArt);
                    nArt.classList.remove('is-loading');
                    showAll(nArt);
                    // related services
                    var oR = document.getElementById('svRelated'), nR = doc.getElementById('svRelated');
                    if (oR && nR) { oR.innerHTML = nR.innerHTML; showAll(oR); }
                    // title + description
                    document.title = doc.title;
                    var oD = document.querySelector('meta[name="description"]'), nD = doc.querySelector('meta[name="description"]');
                    if (oD && nD) oD.setAttribute('content', nD.getAttribute('content'));

                    var slug = new URL(url, location.href).searchParams.get('slug') || '';
                    setActive(slug);
                    if (push) history.pushState({ sv: 1 }, '', u.pathname + u.search);

                    var top = document.getElementById('svTop');
                    if (top) {
                        var y = top.getBoundingClientRect().top + window.pageYOffset - 20;
                        window.scrollTo({ top: Math.max(y, 0), behavior: 'smooth' });
                    }
                })
                .catch(function () { if (id === reqId) location.href = url; });
        }

        document.addEventListener('click', function (e) {
            var a = e.target.closest ? e.target.closest('.sv-side .list a, .sv-pn a, #svRelated .svc-card a') : null;
            if (!a || e.metaKey || e.ctrlKey || e.shiftKey || e.button === 1) return;
            var u;
            try { u = new URL(a.href, location.href); } catch (err) { return; }
            if (u.pathname !== location.pathname) return;
            e.preventDefault();
            if (u.search === location.search) return;   // already showing this service
            load(a.href, true);
        });
        window.addEventListener('popstate', function () { load(location.href, false); });
    })();
    </script>

<?php include_once('elements/footer.php'); ?>
