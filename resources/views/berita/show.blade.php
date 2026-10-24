@extends('layouts.app')

@section('title', $berita->judul . ' - Desa Jalatrang')

@section('content')
<style>
    .article-header { background: linear-gradient(135deg, #0f3460, #1a1a6e); padding: 35px 0 25px; }
    .article-img { width: 100%; max-height: 420px; object-fit: cover; border-radius: 10px 10px 0 0; }
    .article-title { font-size: clamp(1.4rem, 2.5vw, 2rem); line-height: 1.35; color: #1e293b; }
    .article-content { font-size: 1.02rem; line-height: 1.85; color: #334155; }
    .article-content img { max-width: 100%; height: auto; border-radius: 8px; margin: 15px 0; }

    .tag-badge { background: #f1f5f9; border: 1px solid #cbd5e1; color: #475569; padding: 4px 10px; font-size: 0.8rem; border-radius: 4px; text-decoration: none; transition: all 0.2s; }
    .tag-badge:hover { background: #e2e8f0; color: #0f3460; }

    /* Share Buttons */
    .share-btn { padding: 6px 12px; font-size: 0.82rem; border-radius: 4px; color: white !important; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 500; }
    .share-fb { background: #1877F2; } .share-tw { background: #1DA1F2; } .share-wa { background: #25D366; }
    .share-fb:hover { background: #1464cc; } .share-tw:hover { background: #188cd8; } .share-wa:hover { background: #1eb956; }
</style>

<div class="article-header mb-4">
    <div class="container text-white">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size: 0.88rem;">
                <li class="breadcrumb-item"><a href="/" class="text-warning text-decoration-none"><i class="fas fa-home"></i> Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('berita.index') }}" class="text-warning text-decoration-none">Berita</a></li>
                <li class="breadcrumb-item active text-white opacity-75 text-truncate" style="max-width: 250px;">{{ $berita->judul }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <article class="card shadow-sm border-0 mb-4" style="border-radius: 10px; overflow: hidden; border: 1px solid #e2e8f0;">
                <img src="{{ $berita->gambar ? asset('storage/'.$berita->gambar) : 'https://via.placeholder.com/800x400' }}" class="article-img" alt="{{ $berita->judul }}">
                <div class="card-body p-md-4 p-3">
                    <h1 class="fw-bold mb-3 article-title">{{ $berita->judul }}</h1>

                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4 pb-3 border-bottom text-muted small">
                        <span><i class="far fa-user me-1 text-primary"></i> <strong>{{ $berita->user->name }}</strong></span>
                        <span><i class="far fa-calendar-alt me-1"></i> {{ $berita->created_at->translatedFormat('l, d F Y') }}</span>
                        <span><i class="far fa-folder me-1"></i> {{ $berita->kategori->nama }}</span>
                        <span class="ms-auto"><i class="far fa-eye me-1"></i> {{ $berita->dilihat }} kali dibaca</span>
                    </div>

                    <div class="article-content mb-4" style="text-align: justify;">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                    {{-- Tags & Tombol Bagikan --}}
                    <div class="pt-3 border-top">
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                            <span class="fw-semibold text-secondary small"><i class="fas fa-tags me-1"></i> Tag:</span>
                            @foreach ($berita->tags as $tag)
                                <a href="{{ route('berita.index', ['tag' => $tag->id]) }}" class="tag-badge">#{{ $tag->nama }}</a>
                            @endforeach
                        </div>

                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <span class="fw-semibold text-secondary small me-1">Bagikan:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-btn share-fb"><i class="fab fa-facebook-f"></i> Facebook</a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="share-btn share-tw"><i class="fab fa-twitter"></i> Twitter</a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}" target="_blank" class="share-btn share-wa"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                        </div>
                    </div>
                </div>
            </article>

            <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-secondary fw-semibold">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</div>
@endsection
