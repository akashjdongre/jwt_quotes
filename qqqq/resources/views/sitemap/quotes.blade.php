<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(!$text->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/text/all</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/text/latest</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>

        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/text/trending</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>

        @foreach ($text as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/text/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
        @endforeach

    @endif


    @if(!$image->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/pictures/all</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/pictures/latest</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>

        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/pictures/trending</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>


        @foreach ($image as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/picture/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
        @endforeach

    @endif


    @if(!$gif->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/gifs/all</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

        @foreach ($gif as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/gif/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
        @endforeach

    @endif


    @if(!$video->isEmpty())
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/videos/all</loc>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>

        @foreach ($video as $content)
        <url>
            <loc>{{ request()->getSchemeAndHttpHost() }}/video/{{ $content->url }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.80</priority>
        </url>
        @endforeach

    @endif
</urlset> 