<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(!$authors->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/authors/all</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/authors/popular</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>

    @foreach ($authors as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/author/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach

    @foreach ($authors as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/author/{{ $content->url }}/text</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach

    @foreach ($authors as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/author/{{ $content->url }}/pictures</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
    @endif
</urlset> 