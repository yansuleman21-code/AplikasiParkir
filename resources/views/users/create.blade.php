@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>➕ Tambah Pengguna</h2>
    <a href="{{ route('users.index') }}" class="btn" style="background: #64748b; color: white;">
        <span>⬅</span> Kembali
    </a>
</div>

<div class="form-card">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" placeholder="Nama lengkap..." required value="{{ old('name') }}">
            @error('name') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email aktif..." required value="{{ old('email') }}">
            @error('email') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
                <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter..." required>
            @error('password') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password..." required>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%;">
                💾 Simpan Pengguna
            </button>
        </div>
    </form>
</div>

@endsection
