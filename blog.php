<?php
include_once('include/blog-data.php');

/* ---- Request: category / tag / search / page ---- */
$perPage = 6;
$cats    = blog_categories();
$cat     = isset($_GET['cat']) ? trim($_GET['cat']) : '';
$tag     = isset($_GET['tag']) ? trim($_GET['tag']) : '';
$q       = isset($_GET['q'])   ? trim($_GET['q'])   : '';
$page    = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
if ($cat !== '' && !in_array($cat, $cats, true)) $cat = '';

$all      = array_values(blog_all());
$filtered = array_values(array_filter($all, function ($p) use ($cat, $tag, $q) {
    if ($cat !== '' && $p['cat'] !== $cat) return false;
    if ($tag !== '' && !in_array($tag, $p['tags'], true)) return false;
    if ($q !== '') {
        $hay = strtolower($p['title'] . ' ' . $p['excerpt'] . ' ' . $p['cat'] . ' ' . implode(' ', $p['tags']));
        if (strpos($hay, strtolower($q)) === false) return false;
    }
    return true;
}));

/* Featured (latest) post shows only on page 1 of the unfiltered list; the rest paginate */
$isDefault = ($cat === '' && $tag === '' && $q === '');
$featured  = null;
$list      = $filtered;
if ($isDefault && $page === 1 && count($filtered) > 0) {
    $featured = $filtered[0];
}
if ($isDefault && count($filtered) > 0) {
    $list = array_slice($filtered, 1);
}

$total      = count($list);
$totalPages = max(1, (int)ceil($total / $perPage));
if ($page > $totalPages) $page = $totalPages;
$items      = array_slice($list, ($page - 1) * $perPage, $perPage);
$from       = $total ? (($page - 1) * $perPage + 1) : 0;
$to         = min($page * $perPage, $total);

$authors = blog_authors();

/* ---- Results fragment (also returned alone for AJAX requests) ---- */
ob_start();
?>
                <?php if ($tag !== '' || $q !== '' || $cat !== ''): ?>
                    <div class="bl-status">
                        <span>
                            <?= $total ?> article<?= $total === 1 ? '' : 's' ?> found
                            <?php if ($cat !== ''): ?>in <b><?= htmlspecialchars($cat) ?></b><?php endif; ?>
                            <?php if ($tag !== ''): ?>tagged <b><?= htmlspecialchars($tag) ?></b><?php endif; ?>
                            <?php if ($q !== ''): ?>for &ldquo;<b><?= htmlspecialchars($q) ?></b>&rdquo;<?php endif; ?>
                        </span>
                        <a href="blog.php#posts">Clear filters &times;</a>
                    </div>
                <?php endif; ?>

                <?php if ($featured): $fa = $authors[$featured['author']]; $fu = blog_url($featured['slug']); ?>
                    <article class="nf rv wide">
                        <a class="nf-img" href="<?= $fu ?>"><?= blog_img_tag($featured, 1100, null, false) ?><span class="cat"><?= htmlspecialchars($featured['cat']) ?></span></a>
                        <div class="nf-body">
                            <div class="nmeta"><span><?= blog_icon('cal') ?> <?= blog_date($featured['date']) ?></span><span><?= blog_icon('clock') ?> <?= (int)$featured['read'] ?> min read</span></div>
                            <h3><a href="<?= $fu ?>"><?= htmlspecialchars($featured['title']) ?></a></h3>
                            <p><?= htmlspecialchars($featured['excerpt']) ?></p>
                            <div class="nf-foot">
                                <div class="by"><img src="<?= $fa['img'] ?>" alt="" loading="lazy"><span><?= htmlspecialchars($featured['author']) ?></span></div>
                                <a class="link-arrow" href="<?= $fu ?>">Read Article <?= blog_icon('arrow') ?></a>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>

                <?php if ($items): ?>
                    <div class="grid g3" style="margin-top:34px">
                        <?php foreach ($items as $i => $p) echo blog_card($p, ($i % 3) + 1); ?>
                    </div>

                    <?php if ($totalPages > 1): ?>
                        <nav class="pager" aria-label="Blog pagination">
                            <?php if ($page > 1): ?>
                                <a href="<?= blog_list_url($cat, $q, $page - 1, $tag) ?>#posts" aria-label="Previous page"><?= blog_icon('left') ?></a>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <a class="<?= $i === $page ? 'on' : '' ?>" href="<?= blog_list_url($cat, $q, $i, $tag) ?>#posts"<?= $i === $page ? ' aria-current="page"' : '' ?>><?= $i ?></a>
                            <?php endfor; ?>
                            <?php if ($page < $totalPages): ?>
                                <a href="<?= blog_list_url($cat, $q, $page + 1, $tag) ?>#posts" aria-label="Next page"><?= blog_icon('arrow') ?></a>
                            <?php endif; ?>
                        </nav>
                        <p class="bl-count">Showing <?= $from ?>&ndash;<?= $to ?> of <?= $total ?> articles</p>
                    <?php endif; ?>
                <?php elseif (!$featured): ?>
                    <div class="bl-empty">
                        <h3>No articles found</h3>
                        <p>Try a different keyword or browse another category.</p>
                        <a class="btn btn-gold" href="blog.php#posts">View All Articles</a>
                    </div>
                <?php endif; ?>
<?php
$resultsHtml = ob_get_clean();
if (isset($_GET['ajax'])) {
    header('Content-Type: text/html; charset=utf-8');
    echo $resultsHtml;
    exit;
}
include_once('elements/header.php');
?>

    <main id="main">

        <section class="banner" style="background-image:url(images/background/4.jpg)">
            <div class="container">
                <h1>Latest News</h1>
                <ul class="crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </section>

        <section class="section" id="posts">
            <div class="container">
                <div class="sec-head center rv"><span class="eyebrow">Our Blog</span>
                    <h2>Insights &amp; <span>Articles</span></h2>
                    <p>Expert perspectives on strategy, finance and international growth.</p>
                </div>

                <div class="bl-toolbar rv">
                    <nav class="bl-filter" id="blFilter" aria-label="Filter articles by category">
                        <a class="<?= $cat === '' ? 'on' : '' ?>" href="<?= blog_list_url('', $q) ?>#posts">All</a>
                        <?php foreach ($cats as $c): ?>
                            <a class="<?= $cat === $c ? 'on' : '' ?>" href="<?= blog_list_url($c, $q) ?>#posts"><?= htmlspecialchars($c) ?></a>
                        <?php endforeach; ?>
                    </nav>
                    <form class="bl-search" id="blSearch" method="get" action="blog.php#posts" role="search">
                        <input type="hidden" name="cat" id="blCat" value="<?= htmlspecialchars($cat) ?>">
                        <input type="search" name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Search articles..." aria-label="Search articles">
                        <button type="submit" aria-label="Search"><?= blog_icon('search') ?></button>
                    </form>
                </div>

                <div id="blResults" class="bl-results"><?= $resultsHtml ?></div>
            </div>
        </section>

        <section class="cta" style="background-image:url(images/background/parallax.jpg)">
            <div class="container">
                <div>
                    <h2>Ready to Take Your Business to the Next Level?</h2>
                    <p>Speak with a Titan Wave advisor today and discover a tailored strategy built around your goals.</p>
                </div><a href="contact.php" class="btn btn-white">Get Free Consultation <?= blog_icon('arrow') ?></a>
            </div>
        </section>

    </main>


    <script>
    /* Blog: switch category / page / search without reloading the page */
    (function () {
        var box = document.getElementById('blResults'),
            filter = document.getElementById('blFilter'),
            form = document.getElementById('blSearch'),
            qInput = form ? form.querySelector('input[name="q"]') : null,
            catInput = document.getElementById('blCat'),
            anchor = document.getElementById('posts'),
            reqId = 0;
        if (!box || !window.fetch || !window.URL) return;

        function sameBlog(a) {
            try { var u = new URL(a.href, location.href); return u.pathname === location.pathname; } catch (e) { return false; }
        }

        function syncControls(url) {
            var u = new URL(url, location.href), cat = u.searchParams.get('cat') || '', q = u.searchParams.get('q') || '';
            if (catInput) catInput.value = cat;
            if (qInput) qInput.value = q;
            if (filter) {
                Array.prototype.forEach.call(filter.querySelectorAll('a'), function (a) {
                    var c = new URL(a.href, location.href).searchParams.get('cat') || '';
                    a.classList.toggle('on', c === cat);
                    // keep the search term when switching category
                    var au = new URL(a.href, location.href);
                    if (q) au.searchParams.set('q', q); else au.searchParams.delete('q');
                    a.href = au.pathname + au.search + '#posts';
                });
            }
        }

        function load(url, push) {
            var id = ++reqId, u = new URL(url, location.href);
            u.searchParams.set('ajax', '1');
            box.classList.add('is-loading');
            box.setAttribute('aria-busy', 'true');
            fetch(u.pathname + u.search, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function (r) { if (!r.ok) throw new Error(r.status); return r.text(); })
                .then(function (html) {
                    if (id !== reqId) return;               // a newer click superseded this one
                    box.innerHTML = html;
                    Array.prototype.forEach.call(box.querySelectorAll('.rv'), function (el) { el.classList.add('in'); });
                    var clean = new URL(url, location.href); clean.searchParams.delete('ajax');
                    var final = clean.pathname + clean.search + '#posts';
                    if (push) history.pushState({ bl: 1 }, '', final);
                    syncControls(final);
                    box.classList.remove('is-loading'); box.removeAttribute('aria-busy');
                    if (anchor) {
                        var top = anchor.getBoundingClientRect().top + window.pageYOffset - 90;
                        if (push || true) window.scrollTo({ top: Math.max(top, 0), behavior: 'smooth' });
                    }
                })
                .catch(function () { if (id === reqId) location.href = url; });   // fall back to normal navigation
        }

        // category chips, pagination, "clear filters"
        document.addEventListener('click', function (e) {
            var a = e.target.closest ? e.target.closest('.bl-filter a, .pager a, .bl-status a, .bl-empty a.btn') : null;
            if (!a || !sameBlog(a) || e.metaKey || e.ctrlKey || e.shiftKey || e.button === 1) return;
            e.preventDefault();
            load(a.href, true);
        });

        // search
        if (form) form.addEventListener('submit', function (e) {
            e.preventDefault();
            var p = new URLSearchParams();
            if (catInput && catInput.value) p.set('cat', catInput.value);
            if (qInput && qInput.value.trim()) p.set('q', qInput.value.trim());
            load('blog.php' + (p.toString() ? '?' + p.toString() : ''), true);
        });

        // back / forward buttons
        window.addEventListener('popstate', function () { load(location.href, false); });
    })();
    </script>

<?php include_once('elements/footer.php'); ?>
