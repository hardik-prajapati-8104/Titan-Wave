<?php
/* Titan Wave — blog data + helpers (single source for blog.php and blog-single.php) */

function blog_categories()
{
    return ['Strategy', 'Startups', 'Consulting', 'Finance', 'Expansion', 'Careers'];
}

function blog_authors()
{
    return [
        'Anna Peterson' => ['img' => 'images/resource/author-1.jpg', 'role' => 'Senior Strategy Consultant', 'bio' => 'Anna advises growing companies on strategy, operating models and organisational design.'],
        'Steven Finch'  => ['img' => 'images/resource/author-2.jpg', 'role' => 'Head of Market Entry', 'bio' => 'Steven helps businesses choose, enter and win in new international markets.'],
        'Garry Miller'  => ['img' => 'images/resource/author-3.jpg', 'role' => 'Principal Advisor', 'bio' => 'Garry works with leadership teams on resilience, risk and long-term planning.'],
        'Suzie Bates'   => ['img' => 'images/resource/author-4.jpg', 'role' => 'Financial Planning Lead', 'bio' => 'Suzie specialises in funding strategy, cash-flow management and financial planning.'],
    ];
}

/* Unsplash image URL. $w = width in px. Falls back to a local image if it fails to load (see onerror in templates). */
function blog_img($post, $w = 900)
{
    return 'https://images.unsplash.com/' . $post['photo'] . '?auto=format&fit=crop&w=' . (int)$w . '&q=80';
}
function blog_fallback($post)
{
    return 'images/resource/news-' . $post['fb'] . '.jpg';
}
function blog_img_tag($post, $w = 900, $alt = null, $lazy = true, $class = '')
{
    $alt = htmlspecialchars($alt === null ? $post['title'] : $alt);
    return '<img' . ($class ? ' class="' . $class . '"' : '') . ' src="' . blog_img($post, $w) . '" alt="' . $alt . '"'
        . ($lazy ? ' loading="lazy"' : '') . ' onerror="this.onerror=null;this.src=\'' . blog_fallback($post) . '\'">';
}

function blog_all()
{
    static $posts = null;
    if ($posts !== null) return $posts;

    $p = [];
    $add = function ($slug, $title, $cat, $date, $read, $author, $photo, $fb, $excerpt, $intro, $points, $quote, $tags) use (&$p) {
        $p[$slug] = compact('slug', 'title', 'cat', 'date', 'read', 'author', 'photo', 'fb', 'excerpt', 'intro', 'points', 'quote', 'tags');
    };

    $add('how-to-handle-a-growing-business', 'How To Handle A Growing Business', 'Strategy', '2026-10-12', 5, 'Anna Peterson',
        'photo-1522071820081-009f0129c71c', 1,
        'Growth is the goal of every business, yet it brings stretched teams and strained cash flow. Learn how to plan for it before it arrives.',
        'Growth is the goal of every business, yet it often brings its own challenges: stretched teams, strained cash flow and processes that no longer fit. Handling growth well means planning for it before it arrives.',
        [['Build Scalable Processes', 'Document your core workflows and automate repeatable tasks so that quality stays consistent as volume increases.'],
         ['Protect Your Cash Flow', 'Expansion consumes working capital. Forecast regularly, manage receivables closely and secure funding options early.'],
         ['Invest in People', 'Hire for the business you are becoming, not only the one you are today, and develop leaders who can carry your culture forward.'],
         ['Keep the Customer Close', 'As you scale, keep listening. Customer feedback is the best compass for where to grow next.']],
        'Growth without structure is just chaos at a larger scale.', ['Strategy', 'Growth', 'Business']);

    $add('do-you-want-to-start-a-business', 'Do You Want To Start A Business?', 'Startups', '2026-09-28', 4, 'Steven Finch',
        'photo-1531482615713-2afd69097998', 2,
        'A practical checklist covering the ideas, funding and first steps every new founder should work through before launching.',
        'Starting a business is exciting, but excitement alone does not pay the bills. A clear checklist helps you move from a promising idea to a launch you can sustain.',
        [['Validate the Idea', 'Talk to potential customers before you build anything. Real conversations reveal whether the problem is painful enough to pay to solve.'],
         ['Plan the Money', 'Estimate start-up costs, set a realistic runway and decide early whether you will self-fund, borrow or raise investment.'],
         ['Choose the Right Structure', 'Your legal structure affects tax, liability and future fundraising, so take advice before you register.'],
         ['Launch Small, Learn Fast', 'Release a simple first version, measure what customers actually do and improve in short cycles.']],
        'A good plan today beats a perfect plan next year.', ['Startups', 'Planning', 'Funding']);

    $add('business-consulting-and-preparation', 'Business Consulting and Preparation', 'Consulting', '2026-09-15', 6, 'Garry Miller',
        'photo-1552664730-d307ca884978', 3,
        'What to prepare before engaging a consultant so you get clear answers, faster decisions and a better return on the engagement.',
        'The value you get from a consultant depends heavily on how well you prepare. A little groundwork up front saves weeks of discovery later.',
        [['Define the Problem', 'Write down the decision you need to make or the result you want. A sharp brief produces sharp advice.'],
         ['Gather Your Data', 'Financials, customer data and process documents let a consultant start analysing on day one instead of day twenty.'],
         ['Align Your Team', 'Agree internally who owns the engagement and who must approve decisions so recommendations turn into action.']],
        'Consultants accelerate decisions; they cannot replace ownership.', ['Consulting', 'Preparation', 'Advisory']);

    $add('small-business-loans-and-funding-options', 'Small Business Loans & Funding Options', 'Finance', '2026-09-03', 5, 'Suzie Bates',
        'photo-1554224155-6726b3ff858f', 4,
        'A plain-language guide to loans, grants and investor funding, and how to choose the right option for your stage of growth.',
        'Choosing how to fund your business is one of the most important decisions you will make. Each option carries a different cost, level of control and expectation.',
        [['Bank Loans and Credit Lines', 'Predictable repayments and no loss of ownership, but they require a track record and often security.'],
         ['Grants and Public Programmes', 'Non-dilutive and attractive, though competitive and usually tied to specific goals or sectors.'],
         ['Investor Funding', 'Brings capital and expertise in exchange for equity. Best suited to businesses with high, fast growth potential.']],
        'The cheapest money is the money that fits your stage of growth.', ['Finance', 'Loans', 'Funding']);

    $add('a-degree-for-business-management-worth-it', 'A Degree for Business Management: Worth It?', 'Careers', '2026-08-22', 7, 'Anna Peterson',
        'photo-1523240795612-9a054b0db644', 5,
        'We weigh formal qualifications against hands-on experience for aspiring managers and business owners.',
        'Few career questions divide opinion like this one. The honest answer is that a degree is a tool, and its value depends on what you plan to build with it.',
        [['What a Degree Gives You', 'A structured grounding in finance, operations and strategy, plus a network and a credential that opens doors.'],
         ['What Experience Gives You', 'Judgement, speed and resilience that only come from handling real customers, budgets and mistakes.'],
         ['The Practical Middle Path', 'Many leaders combine both: work first, then study part-time to formalise what they already know.']],
        'Qualifications open the door; results keep you in the room.', ['Careers', 'Education', 'Management']);

    $add('practical-ways-to-expand-into-new-markets', 'Practical Ways to Expand into New Markets', 'Expansion', '2026-08-09', 6, 'Steven Finch',
        'photo-1517048676732-d65bc937f952', 6,
        'Market selection, partners and regulation: the key questions to answer before taking your business across borders.',
        'Entering a new market multiplies both opportunity and risk. The businesses that succeed treat expansion as a series of tested steps, not a single leap.',
        [['Choose the Market with Data', 'Compare demand, competition, cost to serve and regulation before you commit resources.'],
         ['Find the Right Partners', 'Local distributors, advisers and agencies shorten the learning curve and build early credibility.'],
         ['Pilot Before You Scale', 'Test with a small team or a limited offer, learn what the market really wants, then invest further.']],
        'Go where you can win, not just where you can sell.', ['Expansion', 'Markets', 'International']);

    $add('building-a-resilient-business-strategy', 'Building a Resilient Business Strategy', 'Strategy', '2026-07-25', 5, 'Garry Miller',
        'photo-1521791136064-7986c2920216', 7,
        'How to stress-test your plans, diversify risk and keep your business adaptable when markets shift.',
        'Resilient businesses are not the ones that avoid disruption; they are the ones that have prepared for it. Strategy should be built to bend without breaking.',
        [['Stress-Test Your Plan', 'Ask what happens if revenue drops 20%, a key supplier fails or a major client leaves. Build responses in advance.'],
         ['Diversify Deliberately', 'Spread risk across customers, products, suppliers and markets so no single event can threaten the business.'],
         ['Keep Decisions Flexible', 'Set review points and triggers so you can change course early, before problems become expensive.']],
        'Resilience is built in calm weather.', ['Strategy', 'Risk', 'Resilience']);

    $add('how-to-write-a-business-plan-that-works', 'How to Write a Business Plan That Actually Works', 'Startups', '2026-07-10', 6, 'Steven Finch',
        'photo-1456324504439-367cee3b3c32', 1,
        'Skip the 50-page document. Here is how to build a lean plan that guides decisions and convinces investors.',
        'A business plan is only useful if you use it. The best plans are short, specific and revisited often.',
        [['Start with the Customer', 'Describe who you serve, the problem you solve and why they will choose you over the alternatives.'],
         ['Show the Numbers', 'Include simple projections for revenue, costs and cash so readers can see how the business makes money.'],
         ['Make It a Living Document', 'Review quarterly and update assumptions as you learn. A plan that never changes is probably being ignored.']],
        'A plan is a hypothesis you intend to test.', ['Startups', 'Business Plan', 'Planning']);

    $add('when-to-hire-your-first-business-consultant', 'When to Hire Your First Business Consultant', 'Consulting', '2026-06-27', 4, 'Garry Miller',
        'photo-1573164713714-d95e436ab8d3', 2,
        'Five signals that outside expertise will pay for itself, and how to tell when you can manage on your own.',
        'Bringing in a consultant is an investment. Knowing the right moment makes the difference between a costly detour and a genuine shortcut.',
        [['You Are Facing a Decision You Have Not Made Before', 'New markets, acquisitions or restructuring benefit from people who have seen them many times.'],
         ['Your Team Lacks Capacity or Skills', 'A consultant adds focused capability for a defined period without a permanent hire.'],
         ['You Need an Objective View', 'Outsiders can challenge assumptions that insiders have stopped noticing.']],
        'The right advice at the right moment is the best return you can buy.', ['Consulting', 'Advisory', 'Decisions']);

    $add('cash-flow-forecasting-for-growing-companies', 'Cash Flow Forecasting for Growing Companies', 'Finance', '2026-06-12', 6, 'Suzie Bates',
        'photo-1460925895917-afdab827c52f', 3,
        'Profitable companies still run out of cash. A simple rolling forecast keeps you ahead of the gap.',
        'Many healthy businesses fail not because they are unprofitable, but because cash arrives later than bills. Forecasting closes that gap.',
        [['Use a Rolling 13-Week View', 'Update it weekly with real receipts and payments so it always shows the next quarter clearly.'],
         ['Watch Receivables Closely', 'Invoice promptly, set clear terms and follow up early. Late payment is the most common cash-flow drain.'],
         ['Plan for Both Cases', 'Build a best case and a cautious case so you know when to cut spending or arrange extra funding.']],
        'Revenue is vanity, profit is sanity, cash is reality.', ['Finance', 'Cash Flow', 'Forecasting']);

    $add('entering-the-asian-market-first-steps', 'Entering the Asian Market: First Steps', 'Expansion', '2026-05-30', 7, 'Steven Finch',
        'photo-1486406146926-c627a92ad1ab', 4,
        'Asia is not one market. Learn how to prioritise countries, adapt your offer and avoid early missteps.',
        'Asia offers extraordinary growth, but it is a collection of very different markets. Success starts with choosing where to begin.',
        [['Prioritise by Fit', 'Rank countries on market size, ease of doing business, competition and how well your offer matches local demand.'],
         ['Adapt, Do Not Just Translate', 'Pricing, payment methods, channels and messaging often need local redesign, not just a language change.'],
         ['Respect Regulation and Relationships', 'Understand licensing and trade rules early, and invest time in building trusted local relationships.']],
        'Local understanding is the real entry ticket.', ['Expansion', 'Asia', 'Markets']);

    $add('leadership-lessons-from-high-growth-teams', 'Leadership Lessons from High-Growth Teams', 'Strategy', '2026-05-14', 5, 'Anna Peterson',
        'photo-1600880292203-757bb62b4baf', 5,
        'What the fastest-growing teams do differently when it comes to clarity, ownership and communication.',
        'High-growth teams share a handful of habits. None of them require a large budget, but all of them require consistency.',
        [['Make Priorities Obvious', 'Everyone should be able to state the top three goals for the quarter and how their work supports them.'],
         ['Give Real Ownership', 'Clear owners and decision rights speed things up and build accountability.'],
         ['Communicate Early and Honestly', 'Share bad news quickly. Problems raised early are cheap; problems discovered late are not.']],
        'Clarity is the most underrated growth strategy.', ['Strategy', 'Leadership', 'Teams']);

    $add('seven-funding-mistakes-new-founders-make', 'Seven Funding Mistakes New Founders Make', 'Startups', '2026-04-28', 5, 'Suzie Bates',
        'photo-1553877522-43269d4ea984', 6,
        'Raising too early, too late or from the wrong people can cost you the company. Here is what to avoid.',
        'Funding decisions shape a company for years. Most mistakes are avoidable with preparation and a clear view of your goals.',
        [['Raising Without a Clear Use of Funds', 'Investors want to see exactly what the money will achieve and by when.'],
         ['Ignoring Terms for the Valuation', 'Headline valuation matters less than control, liquidation preferences and future dilution.'],
         ['Choosing Money Over Fit', 'The right investor brings expertise and introductions, not just a cheque.']],
        'Take money from people you would also take advice from.', ['Startups', 'Funding', 'Investors']);

    $add('how-to-measure-the-roi-of-consulting', 'How to Measure the ROI of Consulting', 'Consulting', '2026-04-11', 6, 'Garry Miller',
        'photo-1551288049-bebda4e38f71', 7,
        'Agree the measures before the engagement starts, and you will always know whether it was worth it.',
        'Return on consulting is easy to claim and hard to prove unless you decide how to measure it in advance.',
        [['Set Baselines First', 'Capture today’s numbers for cost, speed or revenue so improvements can be measured honestly.'],
         ['Link Work to Outcomes', 'Tie each deliverable to a business result, not just an activity or a report.'],
         ['Review After Six Months', 'Many benefits take time to appear. Revisit the results once changes have had room to work.']],
        'What gets measured gets improved, and what gets agreed gets delivered.', ['Consulting', 'ROI', 'Measurement']);

    $add('understanding-business-tax-planning-basics', 'Understanding Business Tax Planning Basics', 'Finance', '2026-03-26', 5, 'Suzie Bates',
        'photo-1579621970563-ebec7560ff3e', 1,
        'Good tax planning is about timing and structure, not loopholes. Learn the fundamentals every owner should know.',
        'Tax is one of the largest costs most businesses face, yet it is often handled at the last minute. Planning ahead brings both savings and certainty.',
        [['Know Your Obligations', 'Understand which taxes apply to your structure and sector, and calendar every deadline.'],
         ['Keep Clean Records', 'Organised books make filing faster, reduce errors and support you if you are ever audited.'],
         ['Plan with a Professional', 'A qualified adviser can identify reliefs and structures that suit your situation and stay within the rules.']],
        'Tax planning is a year-round habit, not a year-end task.', ['Finance', 'Tax', 'Planning']);

    $add('building-a-remote-first-international-team', 'Building a Remote-First International Team', 'Expansion', '2026-03-09', 6, 'Anna Peterson',
        'photo-1531538606174-0f90ff5dce83', 2,
        'Hiring across borders widens your talent pool, but only if contracts, culture and time zones are handled well.',
        'A distributed team can unlock talent and reduce cost, but it needs deliberate design to work as one team.',
        [['Get Contracts and Compliance Right', 'Employment law, tax and benefits differ by country. Use local advice or a trusted employer-of-record service.'],
         ['Design for Time Zones', 'Favour written communication and agree a few hours of overlap for real-time collaboration.'],
         ['Build Culture on Purpose', 'Shared rituals, clear documentation and regular in-person meetups keep people connected.']],
        'Distance is a design problem, not a limit.', ['Expansion', 'Remote Work', 'Hiring']);

    $add('how-to-prepare-for-a-management-interview', 'How to Prepare for a Management Interview', 'Careers', '2026-02-20', 4, 'Garry Miller',
        'photo-1565688534245-05d6b5be184a', 3,
        'Managers are hired for judgement. Here is how to show yours with clear examples and measurable results.',
        'Management interviews test how you think, not just what you have done. Preparation turns experience into convincing evidence.',
        [['Prepare Specific Stories', 'Choose examples that show you leading change, resolving conflict and delivering a measurable result.'],
         ['Understand the Business', 'Research the company’s market, challenges and goals so your answers address their real needs.'],
         ['Ask Sharp Questions', 'Thoughtful questions about priorities and expectations show you are already thinking like a leader.']],
        'Be specific: evidence beats adjectives every time.', ['Careers', 'Interview', 'Management']);

    $add('customer-retention-is-the-new-growth-engine', 'Customer Retention Is the New Growth Engine', 'Strategy', '2026-02-02', 5, 'Anna Peterson',
        'photo-1556761175-5973dc0f32e7', 4,
        'Winning a new customer costs far more than keeping one. Build a strategy that rewards loyalty.',
        'Acquisition gets the headlines, but retention drives profit. Small improvements in loyalty compound into large gains over time.',
        [['Know Why Customers Leave', 'Ask them. Exit conversations reveal fixable problems that numbers alone hide.'],
         ['Deliver Early Value', 'The first 90 days decide long-term loyalty. Make onboarding simple and results visible quickly.'],
         ['Reward Loyalty', 'Recognise long-term customers with better service, early access or tailored offers.']],
        'The best marketing is a customer who stays.', ['Strategy', 'Customers', 'Retention']);

    $add('starting-a-small-business-with-limited-capital', 'Starting a Small Business with Limited Capital', 'Startups', '2026-01-15', 5, 'Steven Finch',
        'photo-1504384308090-c894fdcc538d', 5,
        'You do not need a large budget to begin. Focus on the few things that earn revenue first.',
        'Limited capital forces useful discipline. Many strong companies began with very little and grew by reinvesting early income.',
        [['Sell Before You Build', 'Pre-sell or run a pilot to prove demand before spending on inventory, tools or premises.'],
         ['Keep Fixed Costs Low', 'Use flexible, pay-as-you-go services so costs rise only when revenue does.'],
         ['Reinvest Early Profit', 'Put the first earnings back into what is working rather than expanding too soon.']],
        'Constraints are often the best strategists.', ['Startups', 'Bootstrapping', 'Small Business']);

    uasort($p, function ($a, $b) { return strcmp($b['date'], $a['date']); });
    return $posts = $p;
}

function blog_find($slug)
{
    $all = blog_all();
    return isset($all[$slug]) ? $all[$slug] : null;
}

function blog_date($d, $long = false)
{
    return date($long ? 'F d, Y' : 'M d, Y', strtotime($d));
}

function blog_url($slug)
{
    return 'blog-single.php?slug=' . urlencode($slug);
}

/* Build a blog.php URL keeping chosen filters */
function blog_list_url($cat = '', $q = '', $page = 1, $tag = '')
{
    $args = [];
    if ($cat !== '') $args['cat'] = $cat;
    if ($tag !== '') $args['tag'] = $tag;
    if ($q !== '') $args['q'] = $q;
    if ($page > 1) $args['page'] = $page;
    return 'blog.php' . ($args ? '?' . http_build_query($args) : '');
}

function blog_cat_counts()
{
    $out = array_fill_keys(blog_categories(), 0);
    foreach (blog_all() as $p) {
        if (isset($out[$p['cat']])) $out[$p['cat']]++;
    }
    return $out;
}

function blog_all_tags()
{
    $tags = [];
    foreach (blog_all() as $p) foreach ($p['tags'] as $t) $tags[$t] = ($tags[$t] ?? 0) + 1;
    arsort($tags);
    return array_slice(array_keys($tags), 0, 12);
}

/* Small inline icons */
function blog_icon($name)
{
    $i = [
        'cal'   => '<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>',
        'clock' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'user'  => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        'tag'   => '<path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/>',
        'chat'  => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>',
        'arrow' => '<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>',
        'left'  => '<line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>',
        'search'=> '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
        'fb'    => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        'x'     => '<line x1="4" y1="4" x2="20" y2="20"/><line x1="20" y1="4" x2="4" y2="20"/>',
        'in'    => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/>',
        'link'  => '<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>',
        'check' => '<polyline points="20 6 9 17 4 12"/>',
    ];
    return '<svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true">' . ($i[$name] ?? '') . '</svg>';
}

/* One card for the grid */
function blog_card($p, $delay = 1)
{
    $authors = blog_authors();
    $a = $authors[$p['author']] ?? ['img' => 'images/resource/author-1.jpg'];
    $u = blog_url($p['slug']);
    ob_start(); ?>
    <article class="ncard rv d<?= (int)$delay ?>">
        <a class="ncard-img" href="<?= $u ?>"><?= blog_img_tag($p, 700) ?><span class="cat"><?= htmlspecialchars($p['cat']) ?></span></a>
        <div class="ncard-body">
            <div class="nmeta"><span><?= blog_icon('cal') ?> <?= blog_date($p['date']) ?></span><span><?= blog_icon('clock') ?> <?= (int)$p['read'] ?> min read</span></div>
            <h3><a href="<?= $u ?>"><?= htmlspecialchars($p['title']) ?></a></h3>
            <p><?= htmlspecialchars($p['excerpt']) ?></p>
            <div class="nf-foot">
                <div class="by"><img src="<?= $a['img'] ?>" alt="" loading="lazy"><span><?= htmlspecialchars($p['author']) ?></span></div>
                <a class="round-arrow" href="<?= $u ?>" aria-label="Read <?= htmlspecialchars($p['title']) ?>"><?= blog_icon('arrow') ?></a>
            </div>
        </div>
    </article>
    <?php
    return ob_get_clean();
}
