@extends('layouts/layouts')
@section('content')
          <!-- content -->
    <h1 class="mt-2 text-black position-absolute start-50 translate-middle-x" style="font-size : 70px; --bs-text-opacity: 5%;"><b>PESANAN</b></h1>
    <div class="container">
      <h1 class="text-center mt-4 mb-5"><b>Pesanan</b></h1>
      <div class="d-flex justify-content-evenly flex-wrap">
        @foreach ($data->pemesanan as $items)
          <!-- card -->
          <div class="card border-dark position-relative my-4" style="width: 26rem;">
            <div class="card-body p-4">
              <h3 class="card-title text-center position-absolute top-0 start-50 translate-middle "><span class="badge px-5 py-3" style="background-color: #4A5338; font-size: medium;" >#{{ $items->nomor_antrian }}</span></h3>
              <!-- picture -->
              @foreach ($items->menu_pemesanan as $item)
              {{-- @dd($item) --}}
              <div class="row my-4">
                <div class="col align-item-center">
                    <img class="img-fluid" src="{{ asset('storage/'.$item->menu->gambar) }}">
                </div>
                <div class="col-8">
                    <h4 class="card-text">{{ $item->menu->nama_menu }}</h4>
                    <div class="badge text-bg-warning fw-light rounded-pill">{{ $item->menu->jenis }}</div>
                    <p class="fw-light mt-2">{{ number_format($item->menu->harga) }}</p>
                    <p class="text-sm-end" style="margin-top: -50px;">x{{ $item->jumlah }}</p>
                    <h5 class="fw-bold text-end">{{ number_format($item->hargakalijumlah) }}</h5>
                </div>
              </div>
              @endforeach
              <div class="d-flex">
                  <p class="fw-light">id Pelanggan</p>
                  <p class="fw-light ms-auto">{{ $items->id_user}}</p>
              </div>
              <div class="d-flex mb-4">
                <h5 class="fw-bold">Total Orderan</h5>
                @php
                foreach ($items->menu_pemesanan as $item ) {
                 $sum [] = $item->hargakalijumlah;
                }
                echo '<h5 class="fw-bold ms-auto">'.number_format(array_sum($sum)).'</h5>'
                @endphp
            </div>
              <div class="d-flex">
                  <a href="#" class="btn text-light px-5 proses btn-outline-success" data-id="{{ $items->nomor_antrian }}">Proses Orderan</a>
                  <a href="deletePesanan/{{ $items->nomor_antrian }}" class="btn text-light ms-auto" style="background-color: #4A5338;"><img src="{{ asset('storage/img/Iconly.png') }}"></a>
              </div>
            </div>
          </div>
        @endforeach
@endsection