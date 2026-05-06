<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <title>Каталог продукции | НефтеГазХим</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/hpage.css')
    @vite('resources/css/ngh/catalog.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body>

@include('partials.page-nav')

<div class="catalog-page">
    <a class="product-back-link" href="{{ route('home') }}">← Вернуться на главную</a>
    <a class="product-back-link create-qr-link" href="{{ route('qr.generate') }}" style="float: right;">
        <h4>Сформировать QR →</h4>
    </a>

    <h1>Каталог продукции</h1>

    <table class="catalog-table">
        <thead>
            <tr>
                <th class="media-hide-column">#</th>
                <th>Наименование товара</th>
                <th class="media-hide-column">Описание</th>
                <th>QR-код страницы</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($products as $product)
            <tr>
                <td class="media-hide-column">{{ $i }}</td>
                <td>
                    <a class="product-link" href="{{ $product['url'] }}" target="_blank">
                        {{ $product['name'] }}
                    </a>
                </td>
                <td class="media-hide-column">
                    <span class="product-desc">{{ $product['description'] }}</span>
                </td>
                <td class="qr-cell">
                    <div id="qr-wrap-{{ $i }}"></div>
                    <button class="qr-download-btn"
                        onclick="downloadQR({{ $i }}, '{{ $product['slug'] }}')">
                        ↓ Скачать QR
                    </button>
                </td>
            </tr>
            @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</div>

@include('partials.product-footer')

<script>
let qrData = [
    @php $i = 1; @endphp
    @foreach ($products as $product)
    {id: {{ $i }}, url: '{{ addslashes($product['url']) }}', slug: '{{ $product['slug'] }}'},
    @php $i++; @endphp
    @endforeach
];

qrData.forEach(function(item) {
    let wrap = document.getElementById('qr-wrap-' + item.id);
    if (wrap) {
        new QRCode(wrap, {
            text: item.url,
            width: 150,
            height: 150,
            correctLevel: QRCode.CorrectLevel.M
        });
    }
});

function downloadQR(id, slug) {
    let wrap = document.getElementById('qr-wrap-' + id);
    if (!wrap) return;
    let canvas = wrap.querySelector('canvas');
    if (!canvas) return;
    let a = document.createElement('a');
    a.href = canvas.toDataURL('image/png');
    a.download = slug + '-qr.png';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>

</body>
</html>
