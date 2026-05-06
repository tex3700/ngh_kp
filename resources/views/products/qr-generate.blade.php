<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Генератор QR-кода | НефтеГазХим</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/hpage.css')
    @vite('resources/css/ngh/catalog.css')
    @vite('resources/css/ngh/qrgen.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body>

@include('partials.page-nav')

<div class="qr-gen-page">
    <a class="product-back-link" href="{{ route('catalog') }}">← Вернуться в каталог</a>
    <h1>Генератор QR-кода</h1>

    <div class="qr-gen-form">
        <div class="qr-input-row">
            <input
                type="text"
                id="qr-url-input"
                class="qr-gen-input"
                placeholder="Вставьте ссылку, например https://example.com"
                autocomplete="off"
            >
            <button class="qr-check-btn" id="qr-check-btn" disabled>Проверить ссылку</button>
        </div>
        <span class="qr-gen-error" id="qr-error"></span>
        <button class="qr-gen-btn" id="qr-gen-btn" disabled>Сформировать QR</button>
    </div>

    <div class="qr-gen-result" id="qr-result">
        <a id="qr-result-link" href="#" target="_blank" rel="noopener noreferrer" class="qr-gen-url-link"></a>
        <div id="qr-gen-canvas"></div>
        <button class="qr-download-btn" id="qr-download-btn">↓ Скачать QR</button>
    </div>
</div>

@include('partials.product-footer')

<script>
    // Передаём URL для проверки в JS
    window.QR_CHECK_URL = '{{ route('qr.check-url') }}';
</script>
@vite('resources/js/ngh/qrgen.js')

</body>
</html>
