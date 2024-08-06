@extends('layouts/layouts')
@section('content')
      <!-- content -->
      <h1 class="mt-2 text-black position-absolute start-50 translate-middle-x" style="font-size : 70px; --bs-text-opacity: 5%;"><b>MENU</b></h1>
    <div class="container">
      <h1 class="text-center mt-4 mb-4"><b>Menu</b></h1>
      <button class="btn btn-lg me-auto text-light ms-auto me-auto d-flex" style="background-color: #4A5338;" data-bs-toggle="modal" data-bs-target="#menuModal" id="tambah_menu" >Tambah Menu</button>
      <div class="d-flex justify-content-evenly flex-wrap">
        <!-- card -->
        @if (!$data)
        <h5 class="text-center">Belum terdapat menu</h5>
        @else
        @foreach ($data->menu as $item)
        <div class="card rounded-4 border-dark my-3" style="width: 15rem;">
          <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top img-fluid" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">{{ $item->nama_menu }}</h5>
            <p class="text-center"><span class="badge text-bg-warning fw-light">{{ $item->jenis }}</span></p>
            <div class="d-flex">
              <p class="card-text fw-light">Id Menu</p>
              <p class="card-text fw-light ms-auto">{{ $item->id_menu }}</p>
            </div>
            <div class="d-flex">
              <p class="card-text fw-light">Stok</p>
              <p class="card-text fw-light ms-auto">{{ $item->stok }}</p>
            </div>
            <div class="d-flex">
              <p class="card-text fw-bold">Harga</p>
              <p class="card-text fw-bold ms-auto">{{ ($item->harga) }}</p>
            </div>
            <div class="d-flex">
              <button class="btn btn-primary text-light px-4 edit"style="background-color:#4A5338 ;" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id_menu }}">Edit Menu</button>
              <a href="/deleteMenu/{{ $item->id_menu }}" class="btn btn-primary ms-auto rounded-pill text-light" style="background-color: #4A5338;"><img class="img-fluid" src="{{ asset('storage/img/Iconly.png') }}"></a>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
@endsection