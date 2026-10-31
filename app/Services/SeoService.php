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
            'ar' => 'أنظمة ERP, نظام تخطيط موارد المؤسسات, برامج محاسبية وإدارية, برنامج سحابي متكامل للشركات والمصانع',
            'label' => 'أنظمة ERP وشركات'
        ],
        'medical' => [
            'ar' => 'برمجيات طبية ومستشفيات, نظام إدارة العيادات والمراكز, سيستم EMR طبي, منظومات السجلات الطبية',
            'label' => 'طبي ومستشفيات'
        ],
        'industrial' => [
            'ar' => 'برامج إدارة مصانع وخطوط إنتاج, نظام تكاليف المزارع, تتبع الإنتاج والمستودعات',
            'label' => 'صناعي وزراعي'
        ],
        'edtech' => [
            'ar' => 'منصات تعليم إلكتروني, برامج إدارة أكاديميات ومعاهد LMS, أنظمة امتحانات وبوابات طلابية',
            'label' => 'تعليم ومنصات EdTech'
        ],
        'fintech' => [
            'ar' => 'برامج تمويل وتقسيط شركات, برامج كاشير POS وسلاسل تجارية, محاسبة نقاط البيع وإدارة الخزينة',
            'label' => 'تمويل وتقسيط وكاشير'
        ],
        'ai' => [
            'ar' => 'حلول ذكاء اصطناعي للشركات, روبوتات محادثة ذكية وتكامل WhatsApp, أتمتة العمليات ومعالجة البيانات',
            'label' => 'ذكاء اصطناعي وواتساب'
        ],
        'zatca' => [
            'ar' => 'الفوترة الإلكترونية السعودية, الربط مع هيئة الزكاة والضريبة ZATCA المرحلة الثانية, الفاتورة الإلكترونية',
            'label' => 'ZATCA وفوترة إلكترونية'
        ]
    ];

    /**
     * Generate comprehensive SEO attributes for a Project.
     *
     * @param array $data Project attributes
     * @return array Array with keys: seo_title, seo_desc, seo_keywords, project_slug
     */
    public function generateProjectSeo(array $data): array
    {
        $title    = trim($data['title'] ?? '');
        $cat      = strtolower(trim($data['category'] ?? 'erp'));
        $catName  = trim($data['category_name'] ?? ($this->categoryKeywords[$cat]['label'] ?? 'منظومة برمجية'));
        $tech     = trim($data['tech'] ?? '');
        $desc     = trim($data['description'] ?? '');

        // 1. Meta Title (Max ~65 chars)
        $cleanTitle = preg_replace('/[|•\-_]+/', ' ', $title);
        $cleanTitle = preg_replace('/\s+/', ' ', $cleanTitle);
        $seoTitle   = "{$cleanTitle} | {$this->companyName}";
        if (mb_strlen($seoTitle, 'UTF-8') > 70) {
            $seoTitle = mb_substr($cleanTitle, 0, 50, 'UTF-8') . " | " . $this->companyName;
        }

        // 2. Meta Description (~140-160 chars)
        $seoDesc = "تعرف على {$cleanTitle}، {$catName} المطورة بأحدث التقنيات السحابية ({$tech}). حلول برمجية مخصصة للشركات من المبتكر العربي.";
        if (mb_strlen($seoDesc, 'UTF-8') > 165) {
            $seoDesc = mb_substr($seoDesc, 0, 155, 'UTF-8') . '...';
        }

        // 3. Keywords
        $catKw = $this->categoryKeywords[$cat]['ar'] ?? 'برمجة خاصة, تطوير برمجيات';
        $seoKeywords = "{$title}, {$catName}, {$tech}, {$catKw}, المبتكر العربي للبرمجيات";

        // 4. Slug
        $slug = !empty($data['project_slug']) ? $data['project_slug'] : $this->slugify($title);

        return [
            'seo_title'    => $seoTitle,
            'seo_desc'     => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'project_slug' => $slug
        ];
    }

    /**
     * Generate comprehensive Schema.org JSON-LD structured data.
     */
    public function generateSchemaOrg(array $siteData, array $projects = [], array $services = [], array $faqs = []): string
    {
        $siteUrl = rtrim($siteData['site_url'] ?? $this->defaultSiteUrl, '/');
        $phone   = $siteData['phone'] ?? '+201013688446';
        $email   = $siteData['email'] ?? 'gabershemy@gmail.com';

        $graph = [
            '@context' => 'https://schema.org',
            '@graph'   => []
        ];

        // 1. Organization
        $graph['@graph'][] = [
            '@type'             => 'Organization',
            '@id'               => "{$siteUrl}/#organization",
            'name'              => $this->companyName,
            'alternateName'     => $this->companyNameEn,
            'url'               => $siteUrl,
            'logo'              => [
                '@type'      => 'ImageObject',
                '@id'        => "{$siteUrl}/#logo",
                'url'        => "{$siteUrl}/logo.jpg",
                'caption'    => $this->companyName
            ],
            'image'             => "{$siteUrl}/logo.jpg",
            'description'       => 'شركة برمجيات متخصصة في تطوير منظومات ERP السحابية، حلول الذكاء الاصطناعي، الربط مع ZATCA، وتطبيقات الويب والموبايل للشركات والمصانع والمؤسسات الطبية.',
            'contactPoint'      => [
                '@type'             => 'ContactPoint',
                'telephone'         => $phone,
                'contactType'       => 'customer service',
                'areaServed'        => ['SA', 'EG', 'AE', 'KW', 'QA', 'OM', 'BH'],
                'availableLanguage' => ['Arabic', 'English']
            ],
            'email'             => $email,
            'sameAs'            => [
                'https://www.facebook.com/AlmobtakerAlaraby'
            ]
        ];

        // 2. WebSite
        $graph['@graph'][] = [
            '@type'         => 'WebSite',
            '@id'           => "{$siteUrl}/#website",
            'url'           => $siteUrl,
            'name'          => $this->companyName,
            'description'   => 'حلول برمجية ذكية وأنظمة سحابية وتطبيقات متقدمة للشركات في مصر والسعودية والخليج',
            'publisher'     => ['@id' => "{$siteUrl}/#organization"],
            'inLanguage'    => 'ar'
        ];

        // 3. Services ItemList
        if (!empty($services)) {
            $serviceItems = [];
            foreach ($services as $idx => $s) {
                $serviceItems[] = [
                    '@type'       => 'Service',
                    'name'        => $s['title'] ?? '',
                    'description' => $s['short_desc'] ?? ($s['desc'] ?? ''),
                    'provider'    => ['@id' => "{$siteUrl}/#organization"],
                    'areaServed'  => ['Saudi Arabia', 'Egypt', 'United Arab Emirates'],
                    'position'    => $idx + 1
                ];
            }
            $graph['@graph'][] = [
                '@type'           => 'ItemList',
                '@id'             => "{$siteUrl}/#services-list",
                'name'            => 'خدمات المبتكر العربي للبرمجيات',
                'itemListElement' => $serviceItems
            ];
        }

        // 4. Portfolio Projects ItemList
        if (!empty($projects)) {
            $projectItems = [];
            foreach (array_slice($projects, 0, 30) as $idx => $p) {
                $slug = !empty($p['project_slug']) ? $p['project_slug'] : 'project-' . ($p['id'] ?? $idx);
                $projectItems[] = [
                    '@type'       => 'SoftwareApplication',
                    'name'        => $p['title'] ?? '',
                    'description' => $p['description'] ?? '',
                    'url'         => "{$siteUrl}/#project-{$slug}",
                    'applicationCategory' => 'BusinessApplication',
                    'operatingSystem'     => 'Web, Cloud, iOS, Android',
                    'position'    => $idx + 1
                ];
            }
            $graph['@graph'][] = [
                '@type'           => 'ItemList',
                '@id'             => "{$siteUrl}/#portfolio-list",
                'name'            => 'سابقة أعمال ومشاريع المبتكر العربي للبرمجيات',
                'itemListElement' => $projectItems
            ];
        }

        // 5. FAQPage
        if (!empty($faqs)) {
            $faqItems = [];
            foreach ($faqs as $f) {
                $faqItems[] = [
                    '@type'          => 'Question',
                    'name'           => $f['question'] ?? '',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => $f['answer'] ?? ''
                    ]
                ];
            }
            $graph['@graph'][] = [
                '@type'      => 'FAQPage',
                '@id'        => "{$siteUrl}/#faq",
                'mainEntity' => $faqItems
            ];
        }

        return json_encode($graph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     * Generate URL-friendly slug.
     */
    public function slugify(string $text): string
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = mb_strtolower($text, 'UTF-8');
        return empty($text) ? 'project-' . uniqid() : $text;
    }
}
