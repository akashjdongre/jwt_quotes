<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(!$tags->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/tags/all</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/tags/popular</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>

        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/tags/trending</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>

    @foreach ($tags as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/tag/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach

    @foreach ($tags as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/tag/{{ $content->url }}/text</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach

    @foreach ($tags as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/tag/{{ $content->url }}/pictures</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
    @endif
</urlset> 