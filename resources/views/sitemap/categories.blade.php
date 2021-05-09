<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(!$categories->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/categories/all</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

    @foreach ($categories as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/category/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach

    @foreach ($categories as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/category/{{ $content->url }}/text</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach

    @foreach ($categories as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/category/{{ $content->url }}/pictures</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
    @endif
</urlset> 