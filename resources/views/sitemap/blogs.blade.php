<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(!$blogs->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/stories</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

    @foreach ($blogs as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/stories/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
    @endforeach
    @endif
</urlset> 