@extends('layouts.page')

@section('content')
<div class="product-page">

    <a class="product-back-link" href="{{ route('home') }}">← Вернуться на главную</a>

    <h1 class="product-title">{{ $product['name'] }}</h1>

    <div class="product-description">
        <p class="subheading">{{ $product['full_description'] }}</p>
    </div>

    <div class="product-documents">
        <h3>Сопроводительная документация для {{ $product['short_name'] }}</h3>
        <div class="documents-list">
            @if (empty($documents))
                <p>Документы не найдены.</p>
            @else
                @foreach ($documents as $doc)
                    <a class="document-card" href="{{ $doc['file'] }}" download>
                        <div class="document-info">
                            <span class="document-title">{{ $doc['title'] }}</span>
                        </div>
                        <div class="document-icons">
                            <div class="document-download-icon">
                                <img src="/img/icondownload.svg" alt="download">
                            </div>
                            <div class="document-icon document-icon--{{ $doc['icon'] }}">
                                {{ $doc['ext'] }}
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endsection
