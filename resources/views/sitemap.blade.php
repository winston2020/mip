<urlset>
    @foreach($data as $item)
        <url>
            <loc>{{url('')}}/{{$item->en_name}}/{{$item->id}}.html</loc>
            <lastmod>{{$item->created_at}}</lastmod>
            <changefreq>always</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>
