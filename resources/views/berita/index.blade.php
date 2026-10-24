@extends('layouts.app')

@section('title', 'Berita & Informasi - Desa Jalatrang')

@section('content')
<style>
    .hero-section { background: linear-gradient(135deg, #0f3460, #1a1a6e); padding: 50px 0 35px; }

    /* Card Berita */
    .news-card {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 2px solid #eef2f6;
        background: #ffffff;
        position: relative;
    }

    .news-card:hover {
        transform: translateY(-6px);
        border-color: #0f3460;
        box-shadow: 0 12px 25px rgba(15, 52, 96, 0.18);
    }

    .news-img-wrapper { aspect-ratio: 16/9; overflow: hidden; background: #f8f9fa; }
    .news-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
    .news-card:hover .news-img { transform: scale(1.06); }
    .news-title { font-size: 1.05rem; line-height: 1.4; color: #1e293b; text-decoration: none; transition: color 0.2s; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .news-title:hover { color: #0f3460; }

    .filter-card { border-radius: 12px; border: 1px solid #e2e8f0; background: #ffffff; }
    .filter-header { background: #0f3460; color: white; border-radius: 11px 11px 0 0 !important; font-size: 1rem; }

    /* Baca Selengkapnya */
    .btn-baca {
        background-color: #0f3460;
        color: #ffffff !important;
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.8rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(15, 52, 96, 0.25);
    }
    .btn-baca:hover {
        background-color: #1a1a6e;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(15, 52, 96, 0.35);
    }
    .btn-baca i { transition: transform 0.3s ease; }
    .btn-baca:hover i { transform: translateX(3px); }

    .tag-pill {
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        color: #475569;
        border-radius: 4px;
        padding: 2px 8px;
        font-size: 0.75rem;
        margin-right: 4px;
        text-decoration: none;
        display: inline-block;
    }
    .tag-pill:hover { background: #e2e8f0; color: #0f3460; }
</style>

<div class="hero-section">
    <div class="container text-white">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="/" class="text-warning text-decoration-none"><i class="fas fa-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Berita</li>
                    </ol>
                </nav>
                <h1 class="teko fw-bold mb-1" style="font-size:2.5rem">Berita & Informasi</h1>
                <p class="mb-0" style="opacity:0.85; font-size: 1rem;">Informasi dan kabar terkini dari Desa Jalatrang</p>
            </div>

            {{-- Tombol Tambah Berita --}}
            @auth
                <div>
                    <a href="{{ route('berita.create') }}" class="btn btn-warning fw-bold text-dark px-3 py-2 shadow-sm">
                        <i class="fas fa-plus me-1"></i> Tambah Berita
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row g-4">
        {{-- Sidebar Filter --}}
        <div class="col-lg-3">
            <div class="card shadow-sm sticky-top filter-card" style="top: 90px; z-index: 5;">
                <div class="card-header filter-header py-3 fw-bold">
                    <i class="fas fa-filter me-2"></i> Filter Berita
                </div>
                <div class="card-body p-3">
                    <form method="GET" action="{{ route('berita.index') }}">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-secondary">Kata Kunci</label>
                            <input type="text" name="kata_kunci" value="{{ request('kata_kunci') }}" class="form-control form-control-sm" placeholder="Cari berita...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-secondary">Kategori</label>
                            <select name="kategori" class="form-select form-select-sm">
                                <option value="">Semua Kategori</option>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}" @selected(request('kategori') == $k->id)>{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid gap-2 pt-2">
                            <button type="submit" class="btn btn-sm btn-primary fw-semibold" style="background:#0f3460; border:none;">Terapkan Filter</button>
                            @if(request('kata_kunci') || request('kategori') || request('tag'))
                                <a href="{{ route('berita.index') }}" class="btn btn-sm btn-light border text-secondary">Reset</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Daftar Berita Grid --}}
        <div class="col-lg-9">
            <div class="row g-4">
                @forelse ($beritas as $berita)
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="card shadow-sm h-100 news-card">
                            <div class="news-img-wrapper">
                                <img src="{{ $berita->gambar ? asset('storage/'.$berita->gambar) : 'https://via.placeholder.com/600x350' }}" class="news-img" alt="{{ $berita->judul }}">
                            </div>
                            <div class="card-body p-3 d-flex flex-column">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge" style="background:#0f3460; font-size: 0.72rem; font-weight: 500;">{{ $berita->kategori->nama }}</span>
                                    <small class="text-muted" style="font-size: 0.78rem;">
                                        <i class="far fa-calendar-alt me-1"></i>{{ $berita->created_at->translatedFormat('d M Y') }}
                                    </small>
                                </div>

                                <h6 class="fw-bold mb-2">
                                    <a href="{{ route('berita.show', $berita) }}" class="news-title">
                                        {{ $berita->judul }}
                                    </a>
                                </h6>

                                <p class="text-secondary small mb-2" style="line-height: 1.5; font-size: 0.85rem;">
                                    {{ Str::limit(strip_tags($berita->isi), 95) }}
                                </p>

                                {{-- Tag List --}}
                                <div class="mb-3">
                                    @foreach ($berita->tags as $tag)
                                        <a href="{{ route('berita.index', ['tag' => $tag->id]) }}" class="tag-pill">#{{ $tag->nama }}</a>
                                    @endforeach
                                </div>

                                {{-- Bagian Bawah Card --}}
                                <div class="mt-auto pt-3 border-top d-flex align-items-center justify-content-between gap-1">
                                    <a href="{{ route('berita.show', $berita) }}" class="btn-baca">
                                        Baca <i class="fas fa-arrow-right"></i>
                                    </a>

                                    @auth
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('berita.edit', $berita) }}" class="btn btn-sm btn-outline-warning text-dark px-2" title="Edit Berita">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if(auth()->user()->isAdmin())
                                                <form action="{{ route('berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2" title="Hapus Berita">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486754.png" alt="No Data" width="90" class="mb-3 opacity-50">
                        <h5 class="text-muted">Berita tidak ditemukan.</h5>
                        <p class="text-secondary small">Coba kata kunci lain atau ubah filter kategori.</p>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $beritas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
