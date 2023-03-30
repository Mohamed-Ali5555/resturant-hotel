

<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>{{route('home')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('accommodations')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('check_rate')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('dining')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('gallery')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('activities')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('spa')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('offer')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('check_reservation')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('meeting')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('wedding')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{route('private')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url> <url>
        <loc>{{route('contact')}}</loc>
        <lastmod>2022-08-04T11:57:22+00:00</lastmod>
        <priority>1.00</priority>
    </url
    >



@foreach ($rooms as $room)
    <url>
        <loc>{{ route('show_rom',[$room['id'],\Illuminate\Support\Str::slug($room['name'])]) }}</loc>
        <lastmod>{{ $room->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
    @foreach ($spas as $spa)
    <url>
        <loc>{{ route('show_resort',[$spa['id'],\Illuminate\Support\Str::slug($spa['name'])]) }}</loc>
        <lastmod>{{ $spa->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
    @foreach ($resorts as $resort)
    <url>
        <loc>{{ route('show_spa',[$resort['id'],\Illuminate\Support\Str::slug($resort['name'])]) }}</loc>
        <lastmod>{{ $resort->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
    @foreach ($restaurants as $restaurant)
    <url>
        <loc>{{ route('show_restaurant',[$restaurant['id'],\Illuminate\Support\Str::slug($restaurant['name'])]) }}</loc>
        <lastmod>{{ $restaurant->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
    @foreach ($news as $new)
    <url>
        <loc>{{ route('show_news',[$new['id'],\Illuminate\Support\Str::slug($new['title'])]) }}</loc>
        <lastmod>{{ $new->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
    @foreach ($meetings as $meeting)
    <url>
        <loc>{{ route('show_meeting',[$meeting['id'],\Illuminate\Support\Str::slug($meeting['name'])]) }}</loc>
        <lastmod>{{ $meeting->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
    @foreach ($weddings as $wedding)
    <url>
        <loc>{{ route('show_wedding',[$wedding['id'],\Illuminate\Support\Str::slug($wedding['name'])]) }}</loc>
        <lastmod>{{ $wedding->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach

</urlset>
