<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>{{ $product['short_name'] }} — {{ $product['title'] }} | НефтеГазХим</title>
    <meta name="description" content="{{ $product['name'] }} — документация, паспорт, технические характеристики.">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/hpage.css')
</head>
