<?php
include_once('include/blog-data.php');

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$post = blog_find($slug);
if (!$post) {                       // unknown / missing slug: show the latest article instead of an empty page
    $all  = blog_all();
    $post = reset($all);
}

$all     = array_values(blog_all());
$authors = blog_authors();
$author  = $authors[$post['author']];
$counts  = blog_cat_counts();

/* previous / next (list is newest first) */
$idx  = 0;
foreach ($all as $i => $p) { if ($p['slug'] === $post['slug']) { $idx = $i; break; } }
$newer = $idx > 0 ? $all[$idx - 1] : null;
$older = $idx < count($all) - 1 ? $all[$idx + 1] : null;

/* related: same category first, then fill with latest */
$related = [];
foreach ($all as $p) { if ($p['slug'] !== $post['slug'] && $p['cat'] === $post['cat']) $related[] = $p; }
foreach ($all as $p) { if (count($related) >= 3) break; if ($p['slug'] !== $post['slug'] && !in_array($p, $related, true)) $related[] = $p; }
$related = array_slice($related, 0, 3);

/* recent (excluding current) */
$recent = [];
foreach ($all as $p) { if ($p['slug'] !== $post['slug']) $recent[] = $p; if (count($recent) >= 4) break; }

/* share links */
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host   = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$dir    = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
$pageUrl = $scheme . '://' . $host . $dir . '/' . blog_url($post['slug']);
$enc     = rawurlencode($pageUrl);
$encT    = rawurlencode($post['title']);

include_once('elements/header.php');
?>

    <main id="main">

        <div class="bl-progress" aria-hidden="true"><span id="blProgress"></span></div>

        <section class="banner" style="background-image:url(images/background/4.jpg)">
            <div class="container">
                <h1>Blog Details</h1>
                <ul class="crumbs">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><?= htmlspecialchars($post['title']) ?></li>
                </ul>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="layout">

                    <article class="article bl-article rv" id="blArticle">
                        <div class="hero-img"><?= blog_img_tag($post, 1200, $post['title'], false) ?>
                            <a class="bl-badge" href="<?= blog_list_url($post['cat']) ?>#posts"><?= htmlspecialchars($post['cat']) ?></a>
                        </div>

                        <div class="bl-meta">
                            <span><?= blog_icon('user') ?> <?= htmlspecialchars($post['author']) ?></span>
                            <span><?= blog_icon('cal') ?> <?= blog_date($post['date'], true) ?></span>
                            <span><?= blog_icon('clock') ?> <?= (int)$post['read'] ?> min read</span>
                            <span><?= blog_icon('chat') ?> 2 Comments</span>
                        </div>

                        <h2 class="bl-title"><?= htmlspecialchars($post['title']) ?></h2>
                        <p class="bl-lead"><?= htmlspecialchars($post['intro']) ?></p>

                        <div class="bl-takeaways">
                            <h4>Key Takeaways</h4>
                            <ul>
                                <?php foreach ($post['points'] as $pt): ?>
                                    <li><?= blog_icon('check') ?> <?= htmlspecialchars($pt[0]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <?php foreach ($post['points'] as $n => $pt): ?>
                            <h3><?= $n + 1 ?>. <?= htmlspecialchars($pt[0]) ?></h3>
                            <p><?= htmlspecialchars($pt[1]) ?></p>
                            <?php if ($n === 0): ?>
                                <blockquote>&ldquo;<?= htmlspecialchars($post['quote']) ?>&rdquo;</blockquote>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <div class="share">
                            <div class="tags">
                                <?php foreach ($post['tags'] as $t): ?>
                                    <a href="<?= blog_list_url('', '', 1, $t) ?>#posts"><?= htmlspecialchars($t) ?></a>
                                <?php endforeach; ?>
                            </div>
                            <div class="soc">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $enc ?>" target="_blank" rel="noopener" aria-label="Share on Facebook"><?= blog_icon('fb') ?></a>
                                <a href="https://twitter.com/intent/tweet?url=<?= $enc ?>&amp;text=<?= $encT ?>" target="_blank" rel="noopener" aria-label="Share on X"><?= blog_icon('x') ?></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $enc ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><?= blog_icon('in') ?></a>
                                <a href="#" data-copy="<?= htmlspecialchars($pageUrl) ?>" aria-label="Copy link" title="Copy link"><?= blog_icon('link') ?></a>
                            </div>
                        </div>

                        <div class="bl-author">
                            <img src="<?= $author['img'] ?>" alt="<?= htmlspecialchars($post['author']) ?>">
                            <div>
                                <small>Written by</small>
                                <h4><?= htmlspecialchars($post['author']) ?></h4>
                                <span><?= htmlspecialchars($author['role']) ?></span>
                                <p><?= htmlspecialchars($author['bio']) ?></p>
                            </div>
                        </div>

                        <nav class="bl-pn" aria-label="More articles">
                            <?php if ($newer): ?>
                                <a class="bl-pn-prev" href="<?= blog_url($newer['slug']) ?>">
                                    <small><?= blog_icon('left') ?> Newer Article</small>
                                    <b><?= htmlspecialchars($newer['title']) ?></b>
                                </a>
                            <?php else: ?><span></span><?php endif; ?>
                            <?php if ($older): ?>
                                <a class="bl-pn-next" href="<?= blog_url($older['slug']) ?>">
                                    <small>Older Article <?= blog_icon('arrow') ?></small>
                                    <b><?= htmlspecialchars($older['title']) ?></b>
                                </a>
                            <?php else: ?><span></span><?php endif; ?>
                        </nav>

                        <h3>Comments (02)</h3>
                        <div class="comment"><img src="images/resource/author-1.jpg" alt="">
                            <div>
                                <h5>Stuart Bailey</h5><small>October 13, 2026</small>
                                <p>A very practical read. The advice here is exactly what we needed as we plan the next phase of our business.</p>
                            </div>
                        </div>
                        <div class="comment"><img src="images/resource/author-2.jpg" alt="">
                            <div>
                                <h5>Aaron Finch</h5><small>October 13, 2026</small>
                                <p>Great insights. Looking forward to more articles on international expansion.</p>
                            </div>
                        </div>

                        <h3 style="margin-top:44px">Post Your Comment</h3>
                        <div class="form-box" style="padding:34px;box-shadow:none;border:1px solid var(--line);border-top:5px solid var(--gold)">
                            <form data-demo>
                                <div class="form-grid">
                                    <input class="input" placeholder="Your Name" required aria-label="Name">
                                    <input class="input" type="email" placeholder="Email Address" required aria-label="Email">
                                    <textarea class="input full" placeholder="Your Comment" required aria-label="Comment"></textarea>
                                    <div class="full"><button class="btn btn-gold" type="submit">Post Comment <?= blog_icon('arrow') ?></button></div>
                                </div>
                            </form>
                            <div class="form-msg">Thank you! Your comment has been submitted for review.</div>
                        </div>
                    </article>

                    <aside class="side">
                        <div class="widget">
                            <h4>Search</h4>
                            <form class="sfield" method="get" action="blog.php#posts" role="search">
                                <input type="text" name="q" placeholder="Search keyword" aria-label="Search" required>
                                <button aria-label="Search"><?= blog_icon('search') ?></button>
                            </form>
                        </div>

                        <div class="widget">
                            <h4>Categories</h4>
                            <ul class="list">
                                <?php foreach ($counts as $c => $n): ?>
                                    <li><a class="<?= $c === $post['cat'] ? 'active' : '' ?>" href="<?= blog_list_url($c) ?>#posts"><span><?= htmlspecialchars($c) ?> <em class="bl-n">(<?= $n ?>)</em></span> <?= blog_icon('arrow') ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="widget">
                            <h4>Recent Posts</h4>
                            <?php foreach ($recent as $rp): ?>
                                <a class="recent" href="<?= blog_url($rp['slug']) ?>">
                                    <?= blog_img_tag($rp, 160, '') ?>
                                    <div>
                                        <h5><?= htmlspecialchars($rp['title']) ?></h5>
                                        <small><?= blog_date($rp['date']) ?></small>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>

                        <div class="widget">
                            <h4>Tags</h4>
                            <div class="tags">
                                <?php foreach (blog_all_tags() as $t): ?>
                                    <a href="<?= blog_list_url('', '', 1, $t) ?>#posts"><?= htmlspecialchars($t) ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="widget help-widget">
                            <h4>Need Expert Advice?</h4>
                            <p>Talk to a Titan Wave advisor about your next step.</p>
                            <a class="btn btn-gold btn-sm" href="contact.php" style="margin-top:14px">Get a Free Quote</a>
                        </div>
                    </aside>

                </div>

                <?php if ($related): ?>
                    <div class="bl-related">
                        <div class="sec-head center"><span class="eyebrow">Keep Reading</span>
                            <h2>Related <span>Articles</span></h2>
                        </div>
                        <div class="grid g3">
                            <?php foreach ($related as $i => $rp) echo blog_card($rp, $i + 1); ?>
                        </div>
                    </div>
                <?php endif; ?>
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
    (function () {
        var bar = document.getElementById('blProgress'), art = document.getElementById('blArticle');
        function prog() {
            if (!bar || !art) return;
            var r = art.getBoundingClientRect(), h = art.offsetHeight - window.innerHeight * .6;
            var p = Math.min(Math.max((-r.top + 120) / Math.max(h, 1), 0), 1);
            bar.style.width = (p * 100) + '%';
        }
        window.addEventListener('scroll', prog, { passive: true }); prog();

        document.querySelectorAll('[data-copy]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                var t = a.getAttribute('data-copy');
                function done() { a.classList.add('copied'); setTimeout(function () { a.classList.remove('copied'); }, 1600); }
                if (navigator.clipboard) navigator.clipboard.writeText(t).then(done);
                else { var i = document.createElement('input'); i.value = t; document.body.appendChild(i); i.select(); document.execCommand('copy'); document.body.removeChild(i); done(); }
            });
        });
    })();
    </script>

<?php include_once('elements/footer.php'); ?>
