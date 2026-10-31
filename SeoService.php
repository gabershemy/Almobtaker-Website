<?php

namespace App\Services;

/**
 * Class SeoService
 * Intelligent SEO & Metadata Engine (Single Responsibility Principle)
 * Handles automated generation of Titles, Descriptions, Keywords, Slugs,
 * Schema.org JSON-LD structured data, and XML Sitemaps.
 */
class SeoService
{
    private string $companyName = 'المبتكر العربي للبرمجيات';
    private string $companyNameEn = 'Almobtaker Alaraby Software';
    private string $defaultSiteUrl = 'https://mobtakeraraby.com';

    /**
     * Map categories to high-traffic commercial search keywords
     */
    private array $categoryKeywords = [
        'erp' => [
            'ar' => 'برامج ERP, أنظمة تخطيط موارد المؤسسات, برنامج محاسبة سحابي, برامج شركات ومصانع في مصر والسعودية',
            'label' => 'أنظمة ERP وشركات'
        ],
        'medical' => [
            'ar' => 'برنامج إدارة العيادات, نظام إدارة المستشفيات, سيستم EMR طبي, برنامج مراكز طبية وصيدليات',
            'label' => 'طبي ومستشفيات'
        ],
        'industrial' => [
            'ar' => 'برنامج إدارة المصانع وتكاليف الإنتاج, نظام مزارع الدواجن, برمجيات زراعية وصناعية',
            'label' => 'صناعي وزراعي'
        ],
        'edtech' => [
            'ar' => 'منصة تعليمية إلكترونية, نظام إدارة المدارس والجامعات LMS, تطبيق كورسات واختبارات أونلاين',
            'label' => 'تعليم ومنصات EdTech'
        ],
        'fintech' => [
            'ar' => 'برنامج تقسيط وحسابات عملاء, نظام نقاط بيع POS وكاشير, منظومة إدارة تمويل وشركات تجارية',
            'label' => 'تمويل وتقسيط وكاشير'
        ],
        'ai' => [
            'ar' => 'بوت واتساب بالذكاء الاصطناعي, شات بوت خدمة عملاء WhatsApp, أتمتة الأعمال والذكاء الاصطناعي',
            'label' => 'ذكاء اصطناعي وواتساب'
        ],
        'zatca' => [
            'ar' => 'الفاتورة الإلكترونية السعودية, الربط مع هيئة الزكاة والضريبة ZATCA المرحلة الثانية, الفوترة السحابية',
            'label' => 'ZATCA وفوترة إلكترونية'
        ]
    ];

    /**
     * Generate comprehensive SEO attributes for a Project
     *
     * @param array $data Project attributes (title, category, category_name, description, tech, etc.)
     * @return array Array with keys: seo_title, seo_desc, seo_keywords, project_slug
     */
    public function generateProjectSeo(array $data): array
    {
        $title = trim($data['title'] ?? '');
        $cat = strtolower(trim($data['category'] ?? 'erp'));
        $catName = trim($data['category_name'] ?? ($this->categoryKeywords[$cat]['label'] ?? 'حلول برمجية'));
        $tech = trim($data['tech'] ?? '');
        $desc = trim($data['description'] ?? '');

        // 1. Meta Title (Max ~60-65 chars)
        $cleanTitle = preg_replace('/[|•\-_]+/', ' ', $title);
        $cleanTitle = preg_replace('/\s+/', ' ', $cleanTitle);
        $seoTitle = "{$cleanTitle} | {$this->companyName}";
        if (mb_strlen($seoTitle, 'UTF-8') > 70) {
            // Trim title gracefully if too long
            $seoTitle = mb_substr($cleanTitle, 0, 50, 'UTF-8') . " | " . $this->companyName;
        }

        // 2. Meta Description (~140-160 chars optimized for CTR)
        $summary = !empty($desc) ? $desc : "حل برمجي متكامل من {$this->companyName}.";
        $summary = strip_tags($summary);
        $summary = preg_replace('/\s+/', ' ', $summary);

        $cta = "احصل على استشارة وعرض سعر مجاني الآن من المبتكر العربي في مصر والسعودية.";
        $baseDesc = "{$title}: {$summary} {$cta}";
        if (mb_strlen($baseDesc, 'UTF-8') > 165) {
            $seoDesc = mb_substr($baseDesc, 0, 160, 'UTF-8') . '...';
        } else {
            $seoDesc = $baseDesc;
        }

        // 3. Meta Keywords
        $catKws = $this->categoryKeywords[$cat]['ar'] ?? 'برمجيات سحابية, أنظمة متكاملة';
        $keywordsList = [
            $title,
            $this->companyName,
            $this->companyNameEn,
            $catName,
            'المبتكر العربي',
            'برمجيات مصر',
            'برمجيات السعودية',
            'حلول برمجية للشركات',
            'ZATCA'
        ];
        if (!empty($tech)) {
            $techParts = preg_split('/[•,\/\|]+/', $tech);
            foreach ($techParts as $tp) {
                $tp = trim($tp);
                if (!empty($tp)) $keywordsList[] = $tp;
            }
        }
        $seoKeywords = implode(', ', array_unique(array_merge($keywordsList, explode(', ', $catKws))));

        // 4. Project Slug
        $slug = !empty($data['project_slug']) ? $data['project_slug'] : $this->generateSlug($title, 'project-' . rand(100, 999));

        return [
            'seo_title' => $seoTitle,
            'seo_desc' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'project_slug' => $slug
        ];
    }

    /**
     * Generate comprehensive SEO attributes for a Service
     *
     * @param array $data Service attributes (title, tag, short_desc, desc, tech, etc.)
     * @return array Array with keys: seo_title, seo_desc, seo_keywords, service_slug
     */
    public function generateServiceSeo(array $data): array
    {
        $title = trim($data['title'] ?? '');
        $tag = trim($data['tag'] ?? 'خدمة تقنية');
        $desc = trim($data['desc'] ?? ($data['short_desc'] ?? ''));

        // 1. Meta Title
        $seoTitle = "{$title} - {$tag} | {$this->companyName}";
        if (mb_strlen($seoTitle, 'UTF-8') > 70) {
            $seoTitle = mb_substr($title, 0, 45, 'UTF-8') . " | {$this->companyName}";
        }

        // 2. Meta Description
        $cleanDesc = strip_tags($desc);
        $cleanDesc = preg_replace('/\s+/', ' ', $cleanDesc);
        $fullDesc = "خدمة {$title} الاحترافية من {$this->companyName}. {$cleanDesc} اطلب خدماتنا البرمجية المعتمدة في مصر والسعودية والخليج.";
        if (mb_strlen($fullDesc, 'UTF-8') > 165) {
            $seoDesc = mb_substr($fullDesc, 0, 160, 'UTF-8') . '...';
        } else {
            $seoDesc = $fullDesc;
        }

        // 3. Keywords
        $keywordsList = [
            $title,
            $tag,
            $this->companyName,
            $this->companyNameEn,
            'تطوير برمجيات سحابية',
            'أنظمة شركات ومؤسسات',
            'خدمات تقنية مصر والسعودية',
            'التحول الرقمي'
        ];
        $tech = $data['tech'] ?? '';
        if (is_array($tech)) {
            $keywordsList = array_merge($keywordsList, $tech);
        } elseif (is_string($tech) && !empty($tech)) {
            $keywordsList = array_merge($keywordsList, explode('•', $tech));
        }
        $seoKeywords = implode(', ', array_unique(array_filter(array_map('trim', $keywordsList))));

        // 4. Service Slug
        $slug = !empty($data['service_slug']) ? $data['service_slug'] : $this->generateSlug($title, 'service-' . rand(100, 999));

        return [
            'seo_title' => $seoTitle,
            'seo_desc' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'service_slug' => $slug
        ];
    }

    /**
     * Generate an SEO-friendly URL Slug
     *
     * @param string $text Title or string
     * @param string $fallback Fallback slug if text produces empty string
     * @return string URL-safe slug
     */
    public function generateSlug(string $text, string $fallback = 'item'): string
    {
        // Replace special characters and punctuation with dashes
        $slug = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate if possible
        $slug = trim($slug, '-');
        // Remove duplicate dashes
        $slug = preg_replace('~-+~', '-', $slug);
        $slug = mb_strtolower($slug, 'UTF-8');

        return !empty($slug) ? $slug : $fallback;
    }

    /**
     * Generate full Schema.org JSON-LD Graph for Google Rich Snippets
     *
     * @param array $siteSettings
     * @param array $projects
     * @param array $services
     * @param array $faqs
     * @return string JSON-LD script string
     */
    public function generateSchemaOrg(array $siteSettings, array $projects = [], array $services = [], array $faqs = []): string
    {
        $siteUrl = rtrim($siteSettings['site_url'] ?? $this->defaultSiteUrl, '/');
        $phone = $siteSettings['phone'] ?? '+201013688446';
        $email = $siteSettings['email'] ?? 'gabershemy@gmail.com';
        $logo = $siteUrl . '/logo.jpg';

        $graph = [
            '@context' => 'https://schema.org',
            '@graph' => []
        ];

        // 1. Organization & LocalBusiness
        $graph['@graph'][] = [
            '@type' => ['Organization', 'ProfessionalService'],
            '@id' => $siteUrl . '/#organization',
            'name' => $this->companyName,
            'alternateName' => $this->companyNameEn,
            'url' => $siteUrl,
            'logo' => [
                '@type' => 'ImageObject',
                '@id' => $siteUrl . '/#logo',
                'url' => $logo,
                'caption' => $this->companyName
            ],
            'image' => $logo,
            'description' => 'شركة المبتكر العربي لتطوير البرمجيات والأنظمة السحابية ERP، حلول الذكاء الاصطناعي، الفاتورة الإلكترونية ZATCA، وتطبيقات الجوال والويب في مصر والسعودية والخليج.',
            'telephone' => $phone,
            'email' => $email,
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'دمنهور / الرياض / القاهرة',
                'addressRegion' => 'البحيرة / منطقة الرياض',
                'addressCountry' => ['EG', 'SA']
            ],
            'areaServed' => [
                ['@type' => 'Country', 'name' => 'Saudi Arabia'],
                ['@type' => 'Country', 'name' => 'Egypt'],
                ['@type' => 'Country', 'name' => 'United Arab Emirates'],
                ['@type' => 'Country', 'name' => 'Kuwait']
            ],
            'knowsAbout' => [
                'Cloud ERP Systems',
                'ZATCA E-Invoicing Integration',
                'Artificial Intelligence WhatsApp Bots',
                'Mobile App Development',
                'Custom Web Software',
                'Database Architecture'
            ],
            'priceRange' => '$$',
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'],
                'opens' => '09:00',
                'closes' => '21:00'
            ],
            'sameAs' => [
                'https://www.facebook.com/AlmobtakerAlaraby',
                'https://wa.me/201013688446'
            ]
        ];

        // 2. WebSite with Sitelinks SearchBox
        $graph['@graph'][] = [
            '@type' => 'WebSite',
            '@id' => $siteUrl . '/#website',
            'url' => $siteUrl,
            'name' => $this->companyName,
            'description' => 'المنصة الرسمية لشركة المبتكر العربي للبرمجيات والحلول الذكية',
            'publisher' => ['@id' => $siteUrl . '/#organization'],
            'inLanguage' => 'ar'
        ];

        // 3. Software Applications (Projects)
        if (!empty($projects)) {
            $softwareItems = [];
            foreach (array_slice($projects, 0, 15) as $p) {
                $item = [
                    '@type' => 'SoftwareApplication',
                    'name' => $p['title'] ?? '',
                    'operatingSystem' => 'Cloud, Web, Mobile, Windows',
                    'applicationCategory' => 'BusinessApplication',
                    'description' => $p['seo_desc'] ?? ($p['description'] ?? ''),
                    'offers' => [
                        '@type' => 'Offer',
                        'price' => '0',
                        'priceCurrency' => 'USD',
                        'availability' => 'https://schema.org/InStock'
                    ]
                ];
                if (!empty($p['image'])) {
                    $item['image'] = (strpos($p['image'], 'http') === 0) ? $p['image'] : $siteUrl . '/' . ltrim($p['image'], './');
                }
                $softwareItems[] = $item;
            }

            $graph['@graph'][] = [
                '@type' => 'ItemList',
                '@id' => $siteUrl . '/#software-list',
                'name' => 'برمجيات وأنظمة المبتكر العربي',
                'itemListElement' => array_map(function ($item, $idx) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $idx + 1,
                        'item' => $item
                    ];
                }, $softwareItems, array_keys($softwareItems))
            ];
        }

        // 4. Services
        if (!empty($services)) {
            $serviceItems = [];
            foreach ($services as $s) {
                $serviceItems[] = [
                    '@type' => 'Service',
                    'name' => $s['title'] ?? '',
                    'serviceType' => $s['tag'] ?? 'تطوير برمجيات',
                    'provider' => ['@id' => $siteUrl . '/#organization'],
                    'description' => $s['seo_desc'] ?? ($s['desc'] ?? '')
                ];
            }
            $graph['@graph'][] = [
                '@type' => 'ItemList',
                '@id' => $siteUrl . '/#services-list',
                'name' => 'خدمات المبتكر العربي التقنية',
                'itemListElement' => array_map(function ($item, $idx) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $idx + 1,
                        'item' => $item
                    ];
                }, $serviceItems, array_keys($serviceItems))
            ];
        }

        // 5. FAQPage Rich Snippet
        if (!empty($faqs)) {
            $faqItems = [];
            foreach (array_slice($faqs, 0, 10) as $f) {
                $faqItems[] = [
                    '@type' => 'Question',
                    'name' => $f['question'] ?? '',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => strip_tags($f['answer'] ?? '')
                    ]
                ];
            }
            $graph['@graph'][] = [
                '@type' => 'FAQPage',
                '@id' => $siteUrl . '/#faqs',
                'mainEntity' => $faqItems
            ];
        }

        return json_encode($graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Generate dynamic XML Sitemap containing all main URLs, projects, and services
     *
     * @param array $projects
     * @param array $services
     * @param string $siteUrl
     * @return string Full XML string
     */
    public function generateSitemap(array $projects = [], array $services = [], string $siteUrl = 'https://mobtakeraraby.com'): string
    {
        $siteUrl = rtrim($siteUrl, '/');
        $today = date('Y-m-d');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"' . "\n";
        $xml .= '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        // 1. Homepage
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$siteUrl}/</loc>\n";
        $xml .= "    <lastmod>{$today}</lastmod>\n";
        $xml .= "    <changefreq>daily</changefreq>\n";
        $xml .= "    <priority>1.0</priority>\n";
        $xml .= "    <image:image>\n";
        $xml .= "      <image:loc>{$siteUrl}/logo.jpg</image:loc>\n";
        $xml .= "      <image:title>شركة المبتكر العربي للبرمجيات</image:title>\n";
        $xml .= "    </image:image>\n";
        $xml .= "  </url>\n";

        // 2. Sections as deep URLs
        $sections = [
            'services' => ['freq' => 'weekly', 'prio' => '0.9', 'title' => 'خدمات المبتكر العربي التقنية'],
            'portfolio' => ['freq' => 'daily', 'prio' => '0.95', 'title' => 'سابقة أعمال ومشاريع المبتكر العربي'],
            'about' => ['freq' => 'monthly', 'prio' => '0.8', 'title' => 'عن شركة المبتكر العربي'],
            'team' => ['freq' => 'monthly', 'prio' => '0.75', 'title' => 'فريق خبراء المبتكر العربي'],
            'contact' => ['freq' => 'weekly', 'prio' => '0.85', 'title' => 'تواصل مع المبتكر العربي']
        ];

        foreach ($sections as $sec => $info) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$siteUrl}/#{$sec}</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>{$info['freq']}</changefreq>\n";
            $xml .= "    <priority>{$info['prio']}</priority>\n";
            $xml .= "  </url>\n";
        }

        // 3. Dynamic Projects
        foreach ($projects as $p) {
            $slug = !empty($p['project_slug']) ? $p['project_slug'] : 'project-' . $p['id'];
            $loc = "{$siteUrl}/#project-{$slug}";
            $title = htmlspecialchars($p['title'] ?? '', ENT_XML1);

            $xml .= "  <url>\n";
            $xml .= "    <loc>{$loc}</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.85</priority>\n";

            if (!empty($p['image'])) {
                $imgUrl = (strpos($p['image'], 'http') === 0) ? $p['image'] : "{$siteUrl}/" . ltrim($p['image'], './');
                $imgUrl = htmlspecialchars($imgUrl, ENT_XML1);
                $xml .= "    <image:image>\n";
                $xml .= "      <image:loc>{$imgUrl}</image:loc>\n";
                $xml .= "      <image:title>{$title}</image:title>\n";
                $xml .= "    </image:image>\n";
            }

            $xml .= "  </url>\n";
        }

        // 4. Dynamic Services
        foreach ($services as $s) {
            $slug = !empty($s['service_slug']) ? $s['service_slug'] : 'service-' . $s['id'];
            $loc = "{$siteUrl}/#service-{$slug}";
            $title = htmlspecialchars($s['title'] ?? '', ENT_XML1);

            $xml .= "  <url>\n";
            $xml .= "    <loc>{$loc}</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.85</priority>\n";

            if (!empty($s['image'])) {
                $imgUrl = (strpos($s['image'], 'http') === 0) ? $s['image'] : "{$siteUrl}/" . ltrim($s['image'], './');
                $imgUrl = htmlspecialchars($imgUrl, ENT_XML1);
                $xml .= "    <image:image>\n";
                $xml .= "      <image:loc>{$imgUrl}</image:loc>\n";
                $xml .= "      <image:title>{$title}</image:title>\n";
                $xml .= "    </image:image>\n";
            }

            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
