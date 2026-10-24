<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pemerintah Desa Jalatrang')</title>
    <link rel="shortcut icon" href="https://jalatrang.id/favicon.png" type="image/png">

    <!-- CSS External (Bootstrap, Icons, FontAwesome, AOS) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- CSS Internal -->
    <style>
        :root {
            --bg-dark-topbar: #0b0f19;
            --bg-dark-nav: #0f172a;
            --bg-footer: #0b0f19;
            --accent-orange: #f97316;
            --accent-gold: #f59e0b;
        }

        body {
            background-color: #f8fafc;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Topbar Styling */
        .topbar {
            background-color: var(--bg-dark-topbar);
            color: #d1d5db;
            padding: 6px 0;
            font-size: 0.8rem;
            border-bottom: 1px solid #1f2937;
        }
        .topbar-badge {
            background-color: var(--accent-orange);
            color: #ffffff;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.72rem;
        }
        .news-flash-wrapper {
            overflow: hidden;
            white-space: nowrap;
            width: 100%;
        }
        .news-flash-scroll {
            display: inline-block;
            animation: marquee 25s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Navbar Styling */
        .navbar-publik {
            background-color: var(--bg-dark-nav);
            border-bottom: 2px solid #1f2937;
            padding: 10px 0;
        }
        .navbar-logo {
            height: 42px;
            width: auto;
            object-fit: contain;
        }

        /* Brand Box (Outline & Hover Effect) */
        .brand-box {
            padding: 6px 14px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            background-color: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .brand-box:hover {
            border-color: var(--accent-gold);
            background-color: rgba(255, 255, 255, 0.12);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }

        .navbar-publik .nav-link {
            color: #9ca3af !important;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 10px;
        }
        .navbar-publik .nav-link.active,
        .navbar-publik .nav-link:hover {
            color: #ffffff !important;
        }
        .nav-home-pill {
            background: #1f2937;
            border-radius: 6px;
        }

        /* Footer Styling */
        footer.footer-dark {
            background-color: var(--bg-footer) !important;
            color: #9ca3af;
            font-size: 0.85rem;
        }
        footer.footer-dark h5 {
            color: var(--accent-gold);
            font-weight: 700;
            font-size: 0.95rem;
        }
        footer.footer-dark a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.2s;
        }
        footer.footer-dark a:hover {
            color: #ffffff;
        }
        .footer-bottom {
            border-top: 1px solid #1f2937;
            color: #6b7280;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

{{-- Topbar Web Lama --}}
<div class="topbar">
    <div class="container-fluid px-lg-4 px-3 d-flex align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-2 overflow-hidden" style="flex:1">
            <span class="topbar-badge text-nowrap"><i class="fas fa-bullhorn me-1"></i> INFO TERKINI</span>
            <div class="news-flash-wrapper">
                <div class="news-flash-scroll">
                    <span class="me-5 text-white-50"><i class="far fa-circle text-warning me-1" style="font-size:0.5rem"></i> Sekarang Anda dapat belanja langsung di Warung Desa yang merupakan Warung Online Masyarakat Desa Jalatrang.</span>
                    <span class="me-5 text-white-50"><i class="far fa-circle text-warning me-1" style="font-size:0.5rem"></i> Kini Hadir Perpustakaan Desa Selaras dengan wajah baru dan manjamen yang lebih baik</span>
                    <span class="me-5 text-white-50"><i class="far fa-circle text-warning me-1" style="font-size:0.5rem"></i> Warga bisa memeriksa langsung untuk memeriksa pembayaran PBB pada website</span>
                    <span class="me-5 text-white-50"><i class="far fa-circle text-warning me-1" style="font-size:0.5rem"></i> Desa Jalatrang akan membuka layanan public untuk mempermudah akses informasi dan pelayanan masyarakat</span>
                </div>
            </div>
        </div>
        <div class="d-none d-md-flex align-items-center gap-3 text-nowrap text-white-50" style="font-size:0.75rem">
            <span><i class="far fa-clock text-warning me-1"></i> {{ now()->translatedFormat('l, j F Y') }}</span>
        </div>
    </div>
</div>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-publik sticky-top" id="mainNav">
    <div class="container-fluid px-lg-4 px-3">
        {{-- Brand Box dengan Border & Hover Effect --}}
        <a class="navbar-brand d-flex align-items-center gap-2 brand-box text-decoration-none me-2" href="{{ route('berita.index') }}">
            <img src="https://jalatrang.id/assets/images/info_desa/logo.png" class="navbar-logo flex-shrink-0" alt="Logo Desa">
            <div class="brand-desa-text text-white overflow-hidden" style="min-width:0;">
                <div class="fw-bold text-truncate" style="font-size:1.2rem; line-height:1; color:#fff; letter-spacing:0.5px;">PEMERINTAH DESA JALATRANG</div>
                <div class="sub text-white-50 text-truncate d-none d-sm-block" style="font-size:0.62rem; letter-spacing:0.05em; margin-top:3px;">KECAMATAN CIPAKU KABUPATEN CIAMIS</div>
            </div>
        </a>
        <div class="navbar-action-group d-flex flex-row align-items-center flex-nowrap gap-2 ms-auto flex-shrink-0 order-lg-last">
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPubMain">
                <span class="navbar-toggler-icon" style="filter:invert(1)"></span>
            </button>
        </div>
        <div class="offcanvas offcanvas-start offcanvas-lg text-bg-dark border-end-0" tabindex="-1" id="offcanvasPubMain">
            <div class="offcanvas-header border-bottom border-white-10 p-3 d-lg-none">
                <div class="fw-bold text-white" style="font-size:1.3rem;line-height:1">DESA JALATRANG</div>
                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body p-3 p-lg-0">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item mb-1 mb-lg-0">
                        <a class="nav-link nav-home-pill" href="#" title="Beranda">
                            <i class="fas fa-home me-2 me-lg-0"></i><span class="d-inline d-lg-none fw-bold ms-1">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown mb-1 mb-lg-0">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> VISI</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> MISI</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Sejarah</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Struktural</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mb-1 mb-lg-0"><a class="nav-link" href="#">Kependudukan</a></li>
                    <li class="nav-item mb-1 mb-lg-0"><a class="nav-link active" href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="nav-item mb-1 mb-lg-0"><a class="nav-link" href="#">Potensi Wisata</a></li>
                    <li class="nav-item dropdown mb-1 mb-lg-0">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">IDM &amp; SDGs</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> IDM</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> SDGs</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mb-1 mb-lg-0">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">Ketahanan Pangan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Statistik</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Galeri</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Top 10</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mb-1 mb-lg-0">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">Keuangan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> APBdes</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> PBB</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Kegiatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown mb-1 mb-lg-0">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">Download</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Regulasi</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-chevron-right me-2 text-warning" style="font-size:0.65rem"></i> Materi</a></li>
                        </ul>
                    </li>

                    {{-- Fitur Login & Auth User --}}
                    @auth
                        <li class="nav-item ms-lg-3 dropdown">
                            <a class="nav-link text-white dropdown-toggle border border-secondary px-2 rounded" href="#" id="userDrop" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle text-warning me-1"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><span class="dropdown-item-text small text-muted">Role: {{ auth()->user()->role }}</span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-1"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-warning w-100">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>

{{-- Pesan Flash Success --}}
@if (session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@yield('content')

{{-- Footer --}}
<footer class="footer-dark pt-5 pb-2 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="https://jalatrang.id/assets/images/info_desa/logo.png" style="width:50px;height:50px;object-fit:contain" alt="Logo">
                    <div>
                        <div class="fw-bold text-white">PEMERINTAH DESA</div>
                        <div class="fw-bold text-warning" style="font-size:1.1rem">JALATRANG</div>
                    </div>
                </div>
                <p style="font-size:0.83rem;line-height:1.7">
                    Jalan Raya Cipaku Nomor 181<br>
                    Desa Jalatrang, Kecamatan Cipaku<br>
                    Kabupaten Ciamis<br>
                </p>
                <a href="https://www.google.com/maps/place/Jalatrang" target="_blank" class="btn btn-sm btn-outline-warning mt-1">
                    <i class="fas fa-map-marker-alt me-1"></i> Lihat Peta
                </a>
            </div>
            <div class="col-lg-2 col-6">
                <h5 class="mb-3">Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-1"><a href="#"><i class="bi bi-chevron-right me-1"></i>Beranda</a></li>
                    <li class="mb-1"><a href="{{ route('berita.index') }}"><i class="bi bi-chevron-right me-1"></i>Berita</a></li>
                    <li class="mb-1"><a href="#"><i class="bi bi-chevron-right me-1"></i>Struktural</a></li>
                    <li class="mb-1"><a href="#"><i class="bi bi-chevron-right me-1"></i>APBDes</a></li>
                    <li class="mb-1"><a href="#"><i class="bi bi-chevron-right me-1"></i>Prestasi</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-6">
                <h5 class="mb-3">Link Terkait</h5>
                <ul class="list-unstyled">
                    <li class="mb-1"><a href="https://kemendesa.go.id" target="_blank"><i class="bi bi-box-arrow-up-right me-1"></i>Kemendesa</a></li>
                    <li class="mb-1"><a href="https://ciamis.go.id" target="_blank"><i class="bi bi-box-arrow-up-right me-1"></i>Kab. Ciamis</a></li>
                    <li class="mb-1"><a href="https://jabar.go.id" target="_blank"><i class="bi bi-box-arrow-up-right me-1"></i>Pemprov Jabar</a></li>
                    <li class="mb-1"><a href="#"><i class="bi bi-shield-lock me-1"></i>Panel Admin</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="mb-3">Media Sosial</h5>
                <a href="https://x.com" target="_blank" class="d-flex align-items-center gap-2 mb-2">
                    <img src="https://jalatrang.id/assets/images/medsos/67ac8de22ae3b_1739361762.png" style="width:22px;height:22px;object-fit:contain" alt="twitter/x"> twitter/x
                </a>
                <a href="https://facebook.com" target="_blank" class="d-flex align-items-center gap-2 mb-2">
                    <img src="https://jalatrang.id/assets/images/medsos/67ac8dd784ead_1739361751.png" style="width:22px;height:22px;object-fit:contain" alt="facebook"> facebook
                </a>
                <a href="https://www.youtube.com/@jalatrangTV" target="_blank" class="d-flex align-items-center gap-2 mb-2">
                    <img src="https://jalatrang.id/assets/images/medsos/67ac8dee5976c_1739361774.png" style="width:22px;height:22px;object-fit:contain" alt="youtube"> youtube
                </a>
                <a href="https://instagram.com/pemerintahdesajalatrang" target="_blank" class="d-flex align-items-center gap-2 mb-2">
                    <img src="https://jalatrang.id/assets/images/medsos/67ac8e05b46f1_1739361797.png" style="width:22px;height:22px;object-fit:contain" alt="instagram"> instagram
                </a>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center mt-4 py-3">
        &copy; 2026 Pemerintah Desa Jalatrang — Semua hak dilindungi.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true });
</script>
</body>
</html>
