<?php
/**
 * Dynamic JSON-LD Schema Markup Generator for Generation Marketing
 * Generates Organization, LocalBusiness, WebSite, Service, BlogPosting,
 * FAQPage, and BreadcrumbList schemas for maximum Google Rich Results.
 */

$current_page = basename($_SERVER['SCRIPT_NAME']);
$site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

// Base Organization and LocalBusiness Schema (Always included)
$business_schema = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "Organization",
            "@id" => $site_url . "/#organization",
            "name" => "Generation Marketing",
            "url" => $site_url,
            "logo" => [
                "@type" => "ImageObject",
                "url" => $site_url . "/assets/logo.png",
                "width" => 200,
                "height" => 60
            ],
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => "+91-83061-56521",
                "contactType" => "customer service",
                "areaServed" => ["IN", "US", "GB", "AE", "CA", "AU"],
                "availableLanguage" => ["English", "Hindi"]
            ],
            "sameAs" => [
                "https://www.instagram.com/generation_marketing",
                "https://www.facebook.com/generation_marketing",
                "https://www.linkedin.com/company/generation-marketing"
            ]
        ],
        [
            "@type" => "LocalBusiness",
            "@id" => $site_url . "/#localbusiness",
            "name" => "Generation Marketing",
            "image" => $site_url . "/assets/logo.png",
            "telephone" => "+91 83061 56521",
            "email" => "info@generationmarketing.in",
            "priceRange" => "$$",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "India",
                "addressLocality" => "Jaipur",
                "addressRegion" => "Rajasthan",
                "postalCode" => "302001",
                "addressCountry" => "IN"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 26.9124,
                "longitude" => 75.7873
            ],
            "url" => $site_url,
            "openingHoursSpecification" => [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ],
                "opens" => "09:00",
                "closes" => "19:00"
            ]
        ]
    ]
];

// ====== Page Specific Schemas ======

if ($current_page === 'index.php') {
    // WebSite schema with Sitelinks Search Box
    $website_schema = [
        "@type" => "WebSite",
        "url" => $site_url,
        "name" => "Generation Marketing",
        "description" => "Premium Digital Marketing Agency — Google Ads, SEO, Social Media, Branding & Web Development.",
        "potentialAction" => [
            "@type" => "SearchAction",
            "target" => $site_url . "/blog.php?search={search_term_string}",
            "query-input" => "required name=search_term_string"
        ]
    ];
    $business_schema['@graph'][] = $website_schema;

    // ProfessionalService schema for homepage
    $professional_schema = [
        "@type" => "ProfessionalService",
        "name" => "Generation Marketing",
        "url" => $site_url,
        "serviceType" => "Digital Marketing Agency",
        "areaServed" => [
            ["@type" => "Country", "name" => "India"],
            ["@type" => "Country", "name" => "United States"],
            ["@type" => "Country", "name" => "United Kingdom"],
            ["@type" => "Country", "name" => "UAE"]
        ],
        "hasOfferCatalog" => [
            "@type" => "OfferCatalog",
            "name" => "Digital Marketing Services",
            "itemListElement" => [
                ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Google Ads Management"]],
                ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Search Engine Optimization"]],
                ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Social Media Marketing"]],
                ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Premium Brand Design"]],
                ["@type" => "Offer", "itemOffered" => ["@type" => "Service", "name" => "Website Development"]]
            ]
        ]
    ];
    $business_schema['@graph'][] = $professional_schema;
} 
elseif ($current_page === 'service-details.php' && isset($service) && is_array($service)) {
    // Dynamic Service schema
    $service_schema = [
        "@type" => "Service",
        "serviceType" => $service['title'],
        "provider" => [
            "@type" => "LocalBusiness",
            "name" => "Generation Marketing",
            "url" => $site_url
        ],
        "description" => $service['desc'],
        "offers" => [
            "@type" => "Offer",
            "priceCurrency" => "INR",
            "price" => preg_replace('/[^0-9]/', '', $service['price']),
            "availability" => "https://schema.org/InStock"
        ]
    ];
    $business_schema['@graph'][] = $service_schema;

    // BreadcrumbList for service detail navigation
    $breadcrumb_schema = [
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $site_url . "/"],
            ["@type" => "ListItem", "position" => 2, "name" => "Services", "item" => $site_url . "/services.php"],
            ["@type" => "ListItem", "position" => 3, "name" => $service['title'], "item" => $site_url . "/service-details.php?id=" . urlencode(isset($_GET['id']) ? $_GET['id'] : '')]
        ]
    ];
    $business_schema['@graph'][] = $breadcrumb_schema;
} 
elseif ($current_page === 'blog-detail.php' && isset($blog) && is_array($blog)) {
    // Dynamic BlogPosting schema
    $image_src = htmlspecialchars($blog['image']);
    if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
        $image_src = $site_url . '/uploads/blogs/' . htmlspecialchars($blog['image']);
    }
    
    $blog_schema = [
        "@type" => "BlogPosting",
        "headline" => $blog['title'],
        "image" => $image_src,
        "author" => [
            "@type" => "Person",
            "name" => isset($blog['author']) ? $blog['author'] : "Generation Marketing"
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => "Generation Marketing",
            "logo" => [
                "@type" => "ImageObject",
                "url" => $site_url . "/assets/logo.png"
            ]
        ],
        "datePublished" => isset($blog['created_at']) ? date('c', strtotime($blog['created_at'])) : date('c'),
        "dateModified" => isset($blog['updated_at']) ? date('c', strtotime($blog['updated_at'])) : date('c'),
        "description" => $blog['excerpt'],
        "articleBody" => strip_tags($blog['content']),
        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => $site_url . "/blog-detail.php?slug=" . urlencode(isset($blog['slug']) ? $blog['slug'] : '')
        ]
    ];
    $business_schema['@graph'][] = $blog_schema;

    // BreadcrumbList for blog navigation
    $breadcrumb_schema = [
        "@type" => "BreadcrumbList",
        "itemListElement" => [
            ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => $site_url . "/"],
            ["@type" => "ListItem", "position" => 2, "name" => "Blog", "item" => $site_url . "/blog.php"],
            ["@type" => "ListItem", "position" => 3, "name" => $blog['title']]
        ]
    ];
    $business_schema['@graph'][] = $breadcrumb_schema;
}
elseif ($current_page === 'pricing.php') {
    // FAQPage schema for Google Rich Results
    $faq_schema = [
        "@type" => "FAQPage",
        "mainEntity" => [
            [
                "@type" => "Question",
                "name" => "How often am I billed for digital services?",
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => "All recurring services (SEO plans, paid campaign management, social media plans) are billed on a monthly basis, in advance. One-time services like Brand Strategy and Custom Website Development require a 50% advance to kick off the project, and the final 50% upon delivery."
                ]
            ],
            [
                "@type" => "Question",
                "name" => "Are third-party ad spend budgets included in the pricing?",
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => "No, our packages only cover agency setup, monitoring, ad design, and optimization fees. The actual advertising budget spent on Google Ads or Meta Ads is billed directly to your corporate credit card by Google or Meta."
                ]
            ],
            [
                "@type" => "Question",
                "name" => "Is there a minimum contract commitment length?",
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => "For Paid Ads and Social Media, we operate on a month-to-month basis with no long-term lock-in. For organic SEO plans, we recommend a minimum commitment of 3 to 6 months, as organic indexing and domain authority building require time to manifest in solid search results."
                ]
            ]
        ]
    ];
    $business_schema['@graph'][] = $faq_schema;
}

echo '<script type="application/ld+json">' . json_encode($business_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
?>
