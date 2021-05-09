<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ request()->getSchemeAndHttpHost()}}/pages-sitemap.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ request()->getSchemeAndHttpHost()}}/stories-sitemap.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ request()->getSchemeAndHttpHost()}}/quotes-sitemap.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ request()->getSchemeAndHttpHost()}}/authors-sitemap.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ request()->getSchemeAndHttpHost()}}/categories-sitemap.xml</loc>
    </sitemap>
    <sitemap>
        <loc>{{ request()->getSchemeAndHttpHost()}}/tags-sitemap.xml</loc>
    </sitemap>
</sitemapindex> 
