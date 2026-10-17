<?php
/* Titan Wave — services data + helpers (single source for services.php and services-single.php)
   To add a service: copy one $add(...) block below and give it a unique slug. Listing, pagination,
   sidebar, prev/next and "related services" all update automatically. */

/* ---------- Icons (24x24 stroke icons, same style as the rest of the site) ---------- */
function svc_icon($name)
{
    $i = [
        'trend'   => '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>',
        'globe'   => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
        'bars'    => '<line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/>',
        'wallet'  => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'gear'    => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>',
        'users'   => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'shield'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
        'cpu'     => '<rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/>',
        'award'   => '<circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/>',
        'layers'  => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
        'leaf'    => '<path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>',
        'rocket'  => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        'arrow'   => '<line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>',
        'left'    => '<line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>',
        'check'   => '<polyline points="20 6 9 17 4 12"/>',
        'search'  => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
        'file'    => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>',
        'phone'   => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'clock'   => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'plus'    => '<line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>',
    ];
    return '<svg class="svg-i" viewBox="0 0 24 24" aria-hidden="true">' . ($i[$name] ?? '') . '</svg>';
}

/* ---------- Images: Unsplash first, local file if it fails to load ---------- */
function svc_img_url($s, $w = 800)
{
    return 'https://images.unsplash.com/' . $s['photo'] . '?auto=format&fit=crop&w=' . (int)$w . '&q=80';
}
function svc_img_tag($s, $w = 800, $alt = null, $lazy = true, $h = null)
{
    $alt = htmlspecialchars($alt === null ? $s['title'] : $alt);
    $h   = $h ?: (int)round($w * 9 / 16);
    return '<img src="' . svc_img_url($s, $w) . '" alt="' . $alt . '" width="' . (int)$w . '" height="' . (int)$h . '"'
        . ($lazy ? ' loading="lazy"' : '') . ' decoding="async"'
        . ' onerror="this.onerror=null;this.src=\'' . $s['fb'] . '\'">';
}

/* ---------- URLs ---------- */
function svc_url($slug)
{
    return 'services-single.php?slug=' . urlencode($slug);
}
function svc_list_url($q = '', $page = 1)
{
    $args = [];
    if ($q !== '') $args['q'] = $q;
    if ($page > 1) $args['page'] = $page;
    return 'services.php' . ($args ? '?' . http_build_query($args) : '');
}

/* Compact page list: 1 … 4 5 6 … 12 */
function svc_pages($page, $total)
{
    if ($total <= 7) return range(1, $total);
    $out = [1];
    $from = max(2, $page - 1);
    $to   = min($total - 1, $page + 1);
    if ($from > 2) $out[] = '…';
    for ($i = $from; $i <= $to; $i++) $out[] = $i;
    if ($to < $total - 1) $out[] = '…';
    $out[] = $total;
    return $out;
}

/* ---------- Shared "how we work" steps shown on every detail page ---------- */
function svc_process()
{
    return [
        ['Discover',   'We study your business, goals, numbers and market in depth.'],
        ['Design',     'Our experts shape a tailored, data-driven plan with clear priorities.'],
        ['Deliver',    'We work alongside your team to put the plan into action.'],
        ['Optimize',   'We measure results, learn and refine for lasting success.'],
    ];
}

/* ---------- The services ---------- */
function svc_all()
{
    static $list = null;
    if ($list !== null) return $list;

    $p = [];
    $n = 0;
    $add = function ($slug, $title, $icon, $photo, $short, $heading, $intro, $features, $quote, $benefits, $stats, $faqs, $dur) use (&$p, &$n) {
        $n++;
        $fbs = ['images/resource/service-2.jpg', 'images/resource/service-3.jpg', 'images/resource/service-4.jpg',
                'images/gallery/3.jpg', 'images/gallery/5.jpg', 'images/gallery/2.jpg', 'images/gallery/1.jpg',
                'images/gallery/4.jpg', 'images/gallery/6.jpg', 'images/gallery/10.jpg'];
        $fb = $fbs[($n - 1) % count($fbs)];
        $p[$slug] = compact('slug', 'title', 'icon', 'photo', 'fb', 'short', 'heading', 'intro', 'features', 'quote', 'benefits', 'stats', 'faqs', 'dur') + ['no' => $n];
    };

    $add('business-strategy-advisory', 'Business Strategy & Advisory', 'trend', 'photo-1522071820081-009f0129c71c',
        'Clear, data-backed roadmaps that align your vision, resources and market position for sustainable growth.',
        'Strategy That Turns Vision into Results',
        ['Every successful business starts with a clear direction. Our Business Strategy & Advisory service helps you define where you want to go, understand the market you operate in, and build a practical plan to get there.',
         'Working closely with your leadership team, we analyze your strengths, opportunities and risks, then translate our findings into a roadmap with defined priorities, owners and timelines.'],
        ['Comprehensive business and market diagnostics', 'Tailored growth roadmaps with clear milestones', 'Competitive positioning and differentiation strategy',
         'KPI frameworks to track progress and ROI', 'Hands-on support through implementation', 'Ongoing review and optimization'],
        'The right strategy doesn’t just point the way — it gives your whole organization the confidence to move.',
        [['Clarity', 'Replace guesswork with a focused plan your whole team can follow.'], ['Speed', 'Move faster with prioritized actions and proven frameworks.'],
         ['Confidence', 'Make decisions backed by data and expert experience.'], ['Results', 'Track measurable improvements in growth and profitability.']],
        [['120+', 'Strategies delivered'], ['92%', 'Client retention'], ['3x', 'Average growth target met']],
        [['How long does a strategy engagement take?', 'Most engagements run 6 to 12 weeks, depending on the size of your business and the number of markets involved. We agree a clear timeline before we start.'],
         ['Will you help us carry out the plan?', 'Yes. Many clients keep us on for implementation support, from setting up KPIs to coaching the leadership team through the first quarters.'],
         ['Do you work with small and mid-sized companies?', 'Absolutely. We scale the scope and depth of the work to fit your stage, from founder-led businesses to established groups.']],
        '6–12 weeks');

    $add('international-expansion', 'International Expansion', 'globe', 'photo-1486406146926-c627a92ad1ab',
        'Market-entry planning, partner sourcing and regulatory guidance to help you grow confidently across borders.',
        'Enter New Markets with Confidence',
        ['Expanding abroad opens large opportunities, but each new market comes with its own regulations, competitors and customer expectations. We help you choose the right markets and enter them the right way.',
         'From feasibility studies to local partner introductions and launch planning, our team manages the groundwork so you can focus on serving your new customers.'],
        ['Market attractiveness and entry-mode assessment', 'Regulatory, tax and compliance guidance', 'Local partner and distributor sourcing',
         'Go-to-market and pricing strategy by country', 'Launch planning and on-the-ground support', 'Post-entry performance reviews'],
        'The best international moves are not the fastest ones — they are the best prepared.',
        [['Lower Risk', 'Test assumptions early and avoid costly market-entry mistakes.'], ['Local Insight', 'Benefit from experts who understand each market’s culture and rules.'],
         ['Faster Launch', 'Use ready partner networks and proven entry playbooks.'], ['Scalable Growth', 'Build a structure that supports further expansion.']],
        [['35+', 'Countries supported'], ['60+', 'Market entries'], ['85%', 'Launch on schedule']],
        [['Which markets can you support?', 'We advise on markets across North America, Europe, the Middle East, Africa and Asia, and bring in local specialists wherever needed.'],
         ['Do you handle legal registration?', 'We coordinate with trusted legal and tax partners in each country so that company set-up and compliance are handled properly.']],
        '8–16 weeks');

    $add('market-research-analysis', 'Market Research & Analysis', 'bars', 'photo-1460925895917-afdab827c52f',
        'Actionable insight on customers, competitors and trends so every decision rests on solid evidence.',
        'Decisions Backed by Real Evidence',
        ['Good decisions start with good information. Our research team combines primary research, industry data and competitor analysis to give you a clear, unbiased picture of your market.',
         'We turn raw findings into plain-language insight and recommendations you can act on straight away.'],
        ['Customer surveys, interviews and segmentation', 'Competitor benchmarking and positioning maps', 'Market sizing and demand forecasting',
         'Pricing and willingness-to-pay studies', 'Trend and opportunity scans', 'Executive-ready reports and dashboards'],
        'Without data you are just another person with an opinion.',
        [['Know Your Customer', 'Understand who buys, why they buy and what makes them switch.'], ['Spot Gaps', 'Find under-served segments before your competitors do.'],
         ['Reduce Risk', 'Validate ideas before you invest in building or launching them.'], ['Stay Ahead', 'Track shifts in demand and technology as they happen.']],
        [['500+', 'Studies completed'], ['40+', 'Industries covered'], ['4 wks', 'Typical turnaround']],
        [['Do you run primary research?', 'Yes. We design and run surveys, interviews and focus groups, and combine them with trusted secondary data sources.'],
         ['Can we get regular updates?', 'We offer quarterly market monitoring packages that keep your insight fresh without a new project each time.']],
        '3–6 weeks');

    $add('financial-planning-investment', 'Financial Planning & Investment', 'wallet', 'photo-1554224155-6726b3ff858f',
        'Practical financial structuring, budgeting and investment advice built around your business objectives.',
        'Financial Plans Built for Growth',
        ['Strong finances give you room to grow. We help you structure your capital, plan your cash flow and make investment decisions that match your long-term goals.',
         'Our advisors work with your finance team to build models that are simple to maintain and robust enough to stand up in front of investors and lenders.'],
        ['Budgeting, forecasting and cash-flow planning', 'Capital structure and funding strategy', 'Investment appraisal and business-case modelling',
         'Investor-ready financial models and decks', 'Cost-reduction and margin analysis', 'Quarterly financial reviews'],
        'Cash flow is the oxygen of business — plan for it like your growth depends on it.',
        [['Visibility', 'See where your money comes from and where it goes, month by month.'], ['Better Funding', 'Approach lenders and investors with numbers they can trust.'],
         ['Higher Margins', 'Identify cost leaks and reinvest the savings into growth.'], ['Peace of Mind', 'Plan ahead for the good times and the tight ones.']],
        [['$250M+', 'Funding supported'], ['150+', 'Financial models built'], ['18%', 'Average cost saving']],
        [['Do you manage our investments?', 'We advise on strategy and structure and introduce you to licensed partners; we do not hold client funds.'],
         ['Can you help us raise capital?', 'Yes. We prepare your financial model, pitch material and investor targeting, and support you through due diligence.']],
        '4–10 weeks');

    $add('operations-optimization', 'Operations Optimization', 'gear', 'photo-1565688534245-05d6b5be184a',
        'Streamline processes, reduce costs and raise productivity with lean, measurable operating models.',
        'Run Leaner, Faster and Smarter',
        ['Inefficient processes quietly drain time and money. We map how work really flows through your business and redesign it to remove waste, delays and rework.',
         'Using lean principles and practical tools, we help your teams deliver more with the resources they already have.'],
        ['End-to-end process mapping and bottleneck analysis', 'Lean and continuous-improvement programs', 'Supply-chain and procurement review',
         'Workflow automation opportunities', 'Performance dashboards and KPIs', 'Team training and change support'],
        'Efficiency is doing things right; effectiveness is doing the right things. Great operations do both.',
        [['Lower Costs', 'Cut waste and duplicated effort across departments.'], ['Higher Output', 'Increase throughput without adding headcount.'],
         ['Better Quality', 'Standardize the way work is done to reduce errors.'], ['Happier Teams', 'Give people clear processes and the tools to follow them.']],
        [['25%', 'Average productivity gain'], ['90+', 'Processes redesigned'], ['12 wks', 'Typical payback']],
        [['Will this disrupt our daily work?', 'No. We introduce changes in small, tested steps and work around your busiest periods.'],
         ['How do we know it is working?', 'We set baseline measures at the start and report against them every month, so improvements are visible and proven.']],
        '8–14 weeks');

    $add('partnerships-networking', 'Partnerships & Networking', 'users', 'photo-1521791136064-7986c2920216',
        'Introductions to trusted partners, suppliers and investors across our international business network.',
        'The Right Relationships Open Doors',
        ['Behind every strong business is a strong network. We connect you with vetted partners, suppliers, distributors and investors who share your goals and values.',
         'Beyond the introduction, we help you structure the relationship so that both sides benefit and the partnership lasts.'],
        ['Partner profiling and target-list building', 'Introductions to vetted suppliers and distributors', 'Investor and lender matchmaking',
         'Negotiation support and term-sheet guidance', 'Joint-venture and alliance structuring', 'Access to Titan Wave business events'],
        'Alone we can do so little; together we can do so much.',
        [['Trusted Contacts', 'Work with partners we know and have already vetted.'], ['Faster Deals', 'Skip months of cold outreach with warm introductions.'],
         ['Better Terms', 'Negotiate from a position of knowledge and strength.'], ['Long-term Value', 'Build alliances that keep paying off.']],
        [['800+', 'Partner network'], ['120+', 'Introductions per year'], ['70%', 'Lead to agreements']],
        [['How do you vet partners?', 'We check reputation, financial health, references and cultural fit before any introduction is made.'],
         ['Is there a fee per introduction?', 'Fees are agreed up front as part of your engagement, so there are no surprises.']],
        'Ongoing');

    $add('risk-management-compliance', 'Risk Management & Compliance', 'shield', 'photo-1553877522-43269d4ea984',
        'Identify, measure and reduce the risks that could slow your business, with policies your team can follow.',
        'Protect What You Have Built',
        ['Every business faces risk, from market swings to regulation and operational failures. We help you see the risks early, rank them honestly and put sensible controls in place.',
         'Our approach keeps compliance practical: clear policies, simple processes and training your people will actually use.'],
        ['Enterprise risk assessment and risk register', 'Policy, governance and controls framework', 'Regulatory compliance reviews',
         'Business-continuity and crisis planning', 'Vendor and third-party risk checks', 'Staff awareness training'],
        'Risk is not something to be avoided — it is something to be understood and managed.',
        [['Early Warning', 'Spot issues before they turn into costly problems.'], ['Compliance Ready', 'Stay aligned with changing rules and standards.'],
         ['Resilience', 'Keep operating when the unexpected happens.'], ['Trust', 'Show clients and investors that your house is in order.']],
        [['70+', 'Risk reviews'], ['99%', 'Audit pass rate'], ['24h', 'Incident support']],
        [['Do you replace our legal team?', 'No. We work with your lawyers and auditors and focus on the practical side of managing risk day to day.'],
         ['Can you help after an incident?', 'Yes. We can support response, root-cause analysis and recovery planning.']],
        '4–8 weeks');

    $add('digital-transformation', 'Digital Transformation', 'cpu', 'photo-1531482615713-2afd69097998',
        'Modernize your tools, data and ways of working so your business is faster, smarter and easier to scale.',
        'Technology That Serves Your Strategy',
        ['Technology should make your business simpler, not more complicated. We help you choose, implement and adopt the digital tools that fit your goals and budget.',
         'We start with your processes and people, not products, so every investment solves a real business problem.'],
        ['Digital maturity assessment and roadmap', 'Software and vendor selection', 'CRM, ERP and workflow implementation support',
         'Data strategy and reporting dashboards', 'Automation of repetitive tasks', 'Training and adoption programs'],
        'Digital transformation is not about technology — it is about people using technology to work better.',
        [['Efficiency', 'Automate manual work and free your team for higher-value tasks.'], ['Insight', 'Turn scattered data into clear, timely reporting.'],
         ['Customer Experience', 'Serve customers faster across every channel.'], ['Scalability', 'Build systems that grow with you.']],
        [['60+', 'Systems implemented'], ['35%', 'Less manual work'], ['95%', 'User adoption']],
        [['Do you sell software?', 'No. We are vendor-neutral and recommend whatever fits your needs best.'],
         ['How do you keep staff on board?', 'We involve your teams from the start and provide hands-on training so new tools are welcomed, not resisted.']],
        '10–20 weeks');

    $add('talent-organizational-development', 'Talent & Organizational Development', 'award', 'photo-1552664730-d307ca884978',
        'Build the structure, leaders and culture your business needs to perform and keep its best people.',
        'Great Businesses Are Built on Great People',
        ['The strongest strategy fails without the right people to carry it out. We help you design the organization, develop your leaders and create a culture where talented people want to stay.',
         'Our programs are practical and tailored, combining assessment, coaching and clear career pathways.'],
        ['Organization design and role clarity', 'Leadership assessment and coaching', 'Hiring strategy and onboarding frameworks',
         'Performance management and incentives', 'Culture and engagement surveys', 'Succession planning'],
        'Culture eats strategy for breakfast — so let’s build one that works for you.',
        [['Stronger Leaders', 'Develop managers who inspire and deliver.'], ['Lower Turnover', 'Keep the people who matter most.'],
         ['Alignment', 'Make sure everyone knows where the business is heading.'], ['Performance', 'Reward the behaviors that drive results.']],
        [['200+', 'Leaders coached'], ['30%', 'Lower attrition'], ['45+', 'Org redesigns']],
        [['Can you support small teams?', 'Yes. We adapt programs to teams of any size, from ten people to ten thousand.'],
         ['Do you offer ongoing coaching?', 'We offer monthly coaching packages for leaders after the initial program.']],
        '6–12 weeks');

    $add('mergers-acquisitions', 'Mergers & Acquisitions', 'layers', 'photo-1573164713714-d95e436ab8d3',
        'Advisory from target screening to due diligence and post-deal integration, so every deal creates value.',
        'Deals That Create Lasting Value',
        ['A merger or acquisition can transform a business, or drain it if poorly managed. We guide you through each stage, from finding the right target to integrating the teams afterwards.',
         'Our focus is on value: understanding what you are really buying and how to realize the benefits quickly.'],
        ['Target screening and strategic fit analysis', 'Valuation and deal-structuring support', 'Commercial and operational due diligence',
         'Negotiation and transaction support', 'Post-merger integration planning', 'Synergy tracking and reporting'],
        'The deal is only the beginning; the real work is making the combination succeed.',
        [['Smarter Deals', 'Pay the right price for the right business.'], ['Fewer Surprises', 'Uncover issues before you sign.'],
         ['Smooth Integration', 'Keep customers and staff through the change.'], ['Faster Synergies', 'Capture the value you planned for.']],
        [['25+', 'Deals advised'], ['$400M', 'Transaction value'], ['100%', 'Confidential']],
        [['Do you work on both buy and sell sides?', 'Yes. We advise buyers, sellers and investors on all stages of the transaction.'],
         ['How is confidentiality handled?', 'All engagements are covered by strict confidentiality agreements, and information is shared on a need-to-know basis.']],
        '3–9 months');

    $add('sustainability-esg-advisory', 'Sustainability & ESG Advisory', 'leaf', 'photo-1600880292203-757bb62b4baf',
        'Build credible sustainability and ESG strategies that reduce impact, satisfy stakeholders and open new markets.',
        'Responsible Growth That Pays Off',
        ['Customers, investors and regulators increasingly expect businesses to act responsibly. We help you measure your impact, set realistic targets and report with confidence.',
         'Done well, sustainability reduces costs, strengthens your brand and gives you access to new customers and funding.'],
        ['ESG materiality and baseline assessment', 'Carbon footprint measurement and reduction plans', 'Sustainable supply-chain reviews',
         'Policy development and target setting', 'Sustainability reporting and disclosure', 'Stakeholder engagement'],
        'Sustainability is no longer a side project — it is a measure of how well a business is run.',
        [['Credibility', 'Back your claims with real data and clear targets.'], ['Cost Savings', 'Cut energy, waste and resource use.'],
         ['Market Access', 'Meet the requirements of larger customers and investors.'], ['Brand Value', 'Attract customers and talent who care.']],
        [['45+', 'ESG programs'], ['22%', 'Average energy saving'], ['100%', 'Reports delivered on time']],
        [['Is ESG relevant for smaller businesses?', 'Yes. Customers and lenders increasingly ask smaller suppliers for ESG information, so starting early is a real advantage.'],
         ['Which reporting standards do you use?', 'We align reporting with widely recognised frameworks and tailor it to your industry and market.']],
        '6–12 weeks');

    $add('startup-incubation-growth', 'Startup Incubation & Growth', 'rocket', 'photo-1517048676732-d65bc937f952',
        'Mentoring, validation and go-to-market support that takes founders from first idea to scalable business.',
        'From First Idea to Scalable Business',
        ['Starting a business is hard; scaling one is harder. Our incubation program gives founders the structure, mentoring and network to move quickly and avoid common mistakes.',
         'We work shoulder to shoulder with you on product-market fit, funding readiness and your first growth engine.'],
        ['Idea validation and business-model design', 'Go-to-market and sales playbooks', 'Funding strategy and pitch coaching',
         'Mentor and expert-network access', 'Legal, finance and hiring set-up', 'Growth experiments and metrics'],
        'Ideas are easy. Execution — with the right guidance — is what builds companies.',
        [['Focus', 'Concentrate on the few things that move the needle.'], ['Speed', 'Learn from the mistakes others have already made.'],
         ['Funding Ready', 'Be prepared for investor questions.'], ['Network', 'Meet customers, partners and peers who can help.']],
        [['80+', 'Startups supported'], ['$30M', 'Raised by alumni'], ['12 wks', 'Core program']],
        [['Do you take equity?', 'Terms depend on the program; we offer both fee-based and equity-based options and agree them transparently.'],
         ['Who is the program for?', 'Founders with a validated idea or early traction who want to build a scalable business.']],
        '12 weeks');

    return $list = $p;
}

function svc_get($slug)
{
    $all = svc_all();
    return isset($all[$slug]) ? $all[$slug] : null;
}

/* Card used on the listing page and in "related services" */
function svc_card($s, $delay = 1)
{
    $u = svc_url($s['slug']);
    ob_start(); ?>
                    <article class="card svc-card rv d<?= (int)$delay ?>">
                        <a class="svc-img" href="<?= $u ?>" tabindex="-1" aria-hidden="true">
                            <?= svc_img_tag($s, 720) ?>
                            <span class="svc-no"><?= str_pad((string)$s['no'], 2, '0', STR_PAD_LEFT) ?></span>
                        </a>
                        <div class="ico"><?= svc_icon($s['icon']) ?></div>
                        <h3><a href="<?= $u ?>"><?= htmlspecialchars($s['title']) ?></a></h3>
                        <p><?= htmlspecialchars($s['short']) ?></p>
                        <a class="link-arrow" href="<?= $u ?>">Learn More <?= svc_icon('arrow') ?></a>
                    </article>
<?php
    return ob_get_clean();
}
