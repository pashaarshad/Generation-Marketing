<?php
/**
 * Dynamic JSON-LD Schema Markup Generator for Generation Marketing
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

// Page Specific Schemas
if ($current_page === 'index.php') {
    // WebSite search box
    $website_schema = [
        "@context" => "https://schema.org",
        "@type" => "WebSite",
        "url" => $site_url,
        "name" => "Generation Marketing",
        "potentialAction" => [
            "@type" => "SearchAction",
            "target" => $site_url . "/blog.php?search={search_term_string}",
            "query-input" => "required name=search_term_string"
        ]
    ];
    $business_schema['@graph'][] = $website_schema;
} 
elseif ($current_page === 'service-details.php' && isset($service) && is_array($service)) {
    // Dynamic Service schema
    $service_schema = [
        "@context" => "https://schema.org",
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
            "price" => preg_replace('/[^0-9]/', '', $service['price'])
        ]
    ];
    $business_schema['@graph'][] = $service_schema;
} 
elseif ($current_page === 'blog-detail.php' && isset($blog) && is_array($blog)) {
    // Dynamic BlogPosting schema
    $image_src = htmlspecialchars($blog['image']);
    if (!empty($blog['image']) && !preg_match('/^https?:\/\//', $blog['image'])) {
        $image_src = $site_url . '/uploads/blogs/' . htmlspecialchars($blog['image']);
    }
    
    $blog_schema = [
        "@context" => "https://schema.org",
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
        "articleBody" => strip_tags($blog['content'])
    ];
    $business_schema['@graph'][] = $blog_schema;
}

echo '<script type="application/ld+json">' . json_encode($business_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
?>
