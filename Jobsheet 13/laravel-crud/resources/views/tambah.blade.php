@extends('master')

@section('title','Tambah Data')

@section('judul_halaman','Tambah Data Mahasiswa')

@section('konten')
	<a href="/mahasiswa" class="btn btn-danger">Kembali</a>
	<br/>
	<br/>
	<!-- Menampilkan error validasi -->
	@if (count($errors) > 0)
	<div class= "alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<!-- Form Validasi -->
	<form action="/mahasiswa/simpan" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="nama">Nama</label>
			<input type="text" name="nama" class="form-control" value="{{ old('nama')}}"> <br/>
		</div>
		<div class="form-group">
			<label for="nim">NIM</label>
			<input type="number" name="nim" class="form-control" value="{{ old('nim')}}"> <br/>
		</div>
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="email" name="email" class="form-control" value="{{ old('email')}}"> <br/>
		</div>
		<div class="form-group">
			<label for="jurusan">Jurusan</label>
			<input type="text" name="jurusan" class="form-control" value="{{ old('jurusan')}}"> <br/>
		</div>
		<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah</button>
	</form>
@endsection