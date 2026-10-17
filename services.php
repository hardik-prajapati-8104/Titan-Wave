<?php
include_once('include/services-data.php');

/* ---- Request: search + page ---- */
$perPage = 6;
$q       = isset($_GET['q']) ? trim($_GET['q']) : '';
$page    = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

$all      = array_values(svc_all());
$filtered = array_values(array_filter($all, function ($s) use ($q) {
    if ($q === '') return true;
    $hay = strtolower($s['title'] . ' ' . $s['short'] . ' ' . implode(' ', $s['features']));
    return strpos($hay, strtolower($q)) !== false;
}));

$total      = count($filtered);
$totalPages = max(1, (int)ceil($total / $perPage));
if ($page > $totalPages) $page = $totalPages;
$items = array_slice($filtered, ($page - 1) * $perPage, $perPage);
$from  = $total ? (($page - 1) * $perPage + 1) : 0;
$to    = min($page * $perPage, $total);

/* ---- Results fragment (also returned alone for AJAX requests) ---- */
ob_start();
?>
                <?php if ($q !== ''): ?>
                    <div class="bl-status">
                        <span><?= $total ?> service<?= $total === 1 ? '' : 's' ?> found for &ldquo;<b><?= htmlspecialchars($q) ?></b>&rdquo;</span>
                        <a href="services.php#services">Clear search &times;</a>
                    </div>
                <?php endif; ?>

                <?php if ($items): ?>
                    <div class="grid g3 svc-grid">
                        <?php foreach ($items as $i => $s) echo svc_card($s, ($i % 3) + 1); ?>
                    </div>

                    <?php if ($totalPages > 1): ?>
                        <nav class="pager" aria-label="Services pagination">
                            <?php if ($page > 1): ?>
                                <a href="<?= svc_list_url($q, $page - 1) ?>#services" aria-label="Previous page" rel="prev"><?= svc_icon('left') ?></a>
                            <?php else: ?>
                                <span class="off" aria-hidden="true"><?= svc_icon('left') ?></span>
                            <?php endif; ?>

                            <?php foreach (svc_pages($page, $totalPages) as $n): ?>
                                <?php if ($n === '…'): ?>
                                    <span class="gap">&hellip;</span>
                                <?php else: ?>
                                    <a class="<?= $n === $page ? 'on' : '' ?>" href="<?= svc_list_url($q, $n) ?>#services"<?= $n === $page ? ' aria-current="page"' : '' ?> aria-label="Page <?= $n ?>"><?= $n ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($page < $totalPages): ?>
                                <a href="<?= svc_list_url($q, $page + 1) ?>#services" aria-label="Next page" rel="next"><?= svc_icon('arrow') ?></a>
                            <?php else: ?>
                                <span class="off" aria-hidden="true"><?= svc_icon('arrow') ?></span>
                            <?php endif; ?>
                        </nav>
                    <?php endif; ?>
                    <p class="bl-count">Showing <?= $from ?>&ndash;<?= $to ?> of <?= $total ?> service<?= $total === 1 ? '' : 's' ?></p>
                <?php else: ?>
                    <div class="bl-empty">
                        <h3>No services found</h3>
                        <p>Try a different keyword or browse all of our services.</p>
                        <a class="btn btn-gold" href="services.php#services">View All Services</a>
                    </div>
                <?php endif; ?>
<?php
$resultsHtml = ob_get_clean();
if (isset($_GET['ajax'])) {
    header('Content-Type: text/html; charset=utf-8');
    echo $resultsHtml;
    exit;
}

$pageTitle = 'Our Services | TITAN WAVE';
$pageDesc  = 'Business strategy, international expansion, market research, financial planning and more. Explore the full range of Titan Wave consulting services.';
include_once('elements/header.php');
?>
    <main id="main">

        <section class="banner" style="background-image:url(images/background/4.jpg)">
            <div class="container">
                <h1>Our Services</h1>
                <ul class="crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </section>

        <section class="section" id="services">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">What We Offer</span>
                    <h2>Professional <span>Business Services</span></h2>
                    <p>End-to-end consulting designed to help you plan with clarity and execute with confidence.</p>
                </div>

                <div class="sv-toolbar rv">
                    <p class="sv-total"><b><?= count($all) ?></b> specialist services across strategy, finance, growth and operations</p>
                    <form class="bl-search" id="svSearch" method="get" action="services.php#services" role="search">
                        <input type="search" name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Search services..." aria-label="Search services">
                        <button type="submit" aria-label="Search"><?= svc_icon('search') ?></button>
                    </form>
                </div>

                <div id="svResults" class="bl-results"><?= $resultsHtml ?></div>
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
    /* Services: change page / search without reloading the page (falls back to normal links) */
    (function () {
        var box = document.getElementById('svResults'),
            form = document.getElementById('svSearch'),
            qInput = form ? form.querySelector('input[name="q"]') : null,
            anchor = document.getElementById('services'),
            reqId = 0;
        if (!box || !window.fetch || !window.URL) return;

        function sameList(a) {
            try { return new URL(a.href, location.href).pathname === location.pathname; } catch (e) { return false; }
        }
        function load(url, push) {
            var id = ++reqId, u = new URL(url, location.href);
            u.searchParams.set('ajax', '1');
            box.classList.add('is-loading');
            box.setAttribute('aria-busy', 'true');
            fetch(u.pathname + u.search, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function (r) { if (!r.ok) throw new Error(r.status); return r.text(); })
                .then(function (html) {
                    if (id !== reqId) return;
                    box.innerHTML = html;
                    Array.prototype.forEach.call(box.querySelectorAll('.rv'), function (el) { el.classList.add('in'); });
                    var clean = new URL(url, location.href); clean.searchParams.delete('ajax');
                    if (push) history.pushState({ sv: 1 }, '', clean.pathname + clean.search + '#services');
                    if (qInput) qInput.value = clean.searchParams.get('q') || '';
                    box.classList.remove('is-loading'); box.removeAttribute('aria-busy');
                    if (anchor) {
                        var top = anchor.getBoundingClientRect().top + window.pageYOffset - 90;
                        window.scrollTo({ top: Math.max(top, 0), behavior: 'smooth' });
                    }
                })
                .catch(function () { if (id === reqId) location.href = url; });
        }

        document.addEventListener('click', function (e) {
            var a = e.target.closest ? e.target.closest('.pager a, .bl-status a, .bl-empty a.btn') : null;
            if (!a || !sameList(a) || e.metaKey || e.ctrlKey || e.shiftKey || e.button === 1) return;
            e.preventDefault();
            load(a.href, true);
        });
        if (form) form.addEventListener('submit', function (e) {
            e.preventDefault();
            var v = qInput.value.trim();
            load('services.php' + (v ? '?q=' + encodeURIComponent(v) : ''), true);
        });
        window.addEventListener('popstate', function () { load(location.href, false); });
    })();
    </script>

<?php include_once('elements/footer.php'); ?>
