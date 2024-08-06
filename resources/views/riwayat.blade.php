@extends('layouts/layouts')
@section('content')
      <!-- content -->
      <h1 class="mt-2 text-black position-absolute start-50 translate-middle-x" style="font-size : 70px; --bs-text-opacity: 5%;"><b>RIWAYAT</b></h1>
    <div class="container">
      <h1 class="text-center mt-4 mb-4"><b>Riwayat</b></h1>
      <div class="card">
        <div class="card-body">
          <table class="table table-hover border">
            <thead>
              <td>ID User</td>
              <td>ID Menu</td>
              <td>ID Admin</td>
              <td>ID Status</td>
            </thead>
            <tbody>
              <tr>
                <td>0001</td>
                <td>001A</td>
                <td>0001</td>
                <td>Sukses</td>
              </tr>
              <tr>
                <td>0002</td>
                <td>002A</td>
                <td>0001</td>
                <td>Proses</td>
              </tr>
              <tr>
                <td>0002</td>
                <td>004A</td>
                <td>0001</td>
                <td>Proses</td>
              </tr>
              <tr>
                <td>0004</td>
                <td>005A</td>
                <td>0001</td>
                <td>Sukses</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection