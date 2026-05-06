<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>НГХ</title>
    <meta name="description" content="ООО «НефтеГазХим» - подбор, производство и поставка химических реагентов для нефтегазовых компаний.">
    <meta property="og:type" content="business.business">
    <meta property="og:title" content="НефтеГазХим">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:image" content="">
    <meta property="og:description" content="ООО «НефтеГазХим» - подбор, производство и поставка химических реагентов для нефтегазовых компаний">
    <meta property="business:contact_data:street_address" content="Бутлерова, д. 7б">
    <meta property="business:contact_data:locality" content="Москва">
    <meta property="business:contact_data:region" content="">
    <meta property="business:contact_data:postal_code" content="117485">
    <meta property="business:contact_data:country_name" content="Russian Federation">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    @vite('resources/css/hmain.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">
    {
        "@@context": "http://schema.org/",
        "@@type": "Organization",
        "name": "НефтеГазХим",
        "url": "{{ config('app.url') }}",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Бутлерова, д. 7б",
            "addressLocality": "Moscow",
            "postalCode": "117485",
            "addressCountry": "Russian Federation"
        },
        "sameAs": []
    }
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
    ym(100586194, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/100586194" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
