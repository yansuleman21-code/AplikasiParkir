@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>✏ Edit Pengguna</h2>
    <a href="{{ route('users.index') }}" class="btn" style="background: #64748b; color: white;">
        <span>⬅</span> Kembali
    </a>
</div>

<div class="form-card">
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
            @error('name') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
            @error('email') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
                <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group" style="background: #f8fafc; padding: 1rem; border-radius: 8px; border: 1px dashed #cbd5e1;">
            <label class="form-label">Password Baru (Opsional)</label>
            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah...">
            @error('password') <small style="color: red;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru...">
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%; background: #f59e0b;">
                💾 Perbarui Pengguna
            </button>
        </div>
    </form>
</div>

@endsection
