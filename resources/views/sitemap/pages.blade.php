<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   
    <url>
        <loc>{{ request()->getSchemeAndHttpHost() }}/</loc>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>

    <url>
        <loc>{{ request()->getSchemeAndHttpHost() }}/about-us</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ request()->getSchemeAndHttpHost() }}/contact-us</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ request()->getSchemeAndHttpHost() }}/copyright</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ request()->getSchemeAndHttpHost() }}/privacy-policy</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

  
</urlset> 