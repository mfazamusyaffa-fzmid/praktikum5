@extends('layouts.app')

@section('title', 'Tambah Berita - Desa Jalatrang')

@section('content')
<div class="container my-5" style="max-width:850px">
    <div class="card shadow-sm border-0 rounded-3 p-4" style="border: 1px solid #e2e8f0;">
        <h3 class="fw-bold mb-4" style="color: #0f3460;"><i class="fas fa-plus-circle me-2"></i>Tambah Berita Baru</h3>

        @if ($errors->any())
            <div class="alert alert-danger rounded-3">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="form-control" required placeholder="Masukkan judul berita">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kategori_id" class="form-label fw-semibold">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $k)
                            <option value="{{ $k->id }}" @selected(old('kategori_id') == $k->id)>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gambar" class="form-label fw-semibold">Gambar Sampul</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, WEBP (Maksimal 2MB)</small>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold d-block">Pilih Tag</label>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}" @checked(in_array($tag->id, old('tags', [])))>
                        <label class="form-check-label small" for="tag{{ $tag->id }}">#{{ $tag->nama }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-4">
                <label for="isi" class="form-label fw-semibold">Isi Berita</label>
                <textarea name="isi" id="isi" rows="8" class="form-control" required placeholder="Tuliskan isi berita lengkap di sini">{{ old('isi') }}</textarea>
            </div>

            <div class="d-flex justify-content-between pt-3 border-top">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-primary fw-semibold" style="background:#0f3460; border:none;">Simpan Berita</button>
            </div>
        </form>
    </div>
</div>
@endsection
