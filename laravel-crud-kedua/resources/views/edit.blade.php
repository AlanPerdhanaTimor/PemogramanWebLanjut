@extends('master')

@secton('title','Edit Data')

@section('judul_halaman', 'Edit Data Mahasiswa')

@section('konten')
    <a href="/" class="btn btn-danger">Kembali</a>
    <br/>
    <br/>

    <form action="/mahasiswa/update/{{ $mahasiswa->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $mahasiswa->id }}"> <br/>
        <div class="form-grub">
            <label for="namamhs">Nama</label>
            <input type="text" class="form-control" required name="namamhs" value="{{ $mahasiswa->nama }}"> <br/>
        </div>
        <div class="form-grub">
            <label for="nimmhs">NIM</label>
            <input type="text" class="form-control" required name="nimmhs" value="{{ $mahasiswa->nim }}"> <br/>
        </div>
        <div class="form-grub">
            <label for="emailmhs">E-mail</label>
            <input type="text" class="form-control" required name="emailmhs" value="{{ $mahasiswa->email }}"> <br/>
        </div>
        <div class="form-grub">
            <label for="jurusanmhs">Jurusab</label>
            <input type="text" class="form-control" required name="jurusanmhs" value="{{ $mahasiswa->jurusan }}"> <br/>
        </div>
        <button type="submit" name="edit" class="btn btn-primary float-right">Simpan Data</button>
    </form>

@endsection