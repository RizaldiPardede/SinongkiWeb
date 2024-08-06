@extends('layouts/layouts')
@section('content')
      <!-- content -->
      <h1 class="mt-2 text-black position-absolute start-50 translate-middle-x" style="font-size : 70px; --bs-text-opacity: 5%;"><b>MENDAFTAR</b></h1>
    <div class="container">
      <h1 class="text-center mt-4 mb-4"><b>Mendaftar</b></h1>
      <div class="justify-content-center align-item-center ms-auto me-auto col-3">
        <form action="register" method="post">
          @csrf
          <label class="fw-light my-2" for="name">Nama Lengkap</label>
          <input class="form-control" id="name" name="name" type="text" placeholder="Masukan nama lengkap" required>
          <label class="fw-light my-2" for="email">Email</label>
          <input class="form-control" id="email" name="email" type="email" placeholder="Masukan email" required>
          <label class="fw-light my-2" for="password">Password</label>
          <input class="form-control" id="password" name="password" type="password" placeholder="Masukan password" required>
          <div class="d-grid">
            <button type="submit" class="btn my-4 text-dark fw-bold" style="background-color:#E7FF97; font-size: 10px;">MENDAFTAR</button>
          </div>
        </form>
        <p class="text-center">Sudah mempunyai akun ? <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#loginModal"><b>Masuk sekarang</b></a></p>
      </div>
    </div>
  @endsection