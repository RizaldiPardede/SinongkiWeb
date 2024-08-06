<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Si Nongki | Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body style="background-color: #F3FFCB;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="/"><img src="{{ asset('storage/img/Logo.png') }}" style="width: 90px;"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto me-auto">
              <a class="nav-link" href="/">Pesanan</a>
              <a class="nav-link" href="menu">Menu</a>
              {{-- <a class="nav-link" href="riwayat">Riwayat</a> --}}
            </div>
        </div>
        @if (session()->get('nama'))
        <a href="logout"><button class="btn btn-outline-dark" type="button">{{ session()->get('nama') }}</button></a>
        @else
        <button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</button>
        @endif
        </div>
      </nav>

      @if (session()->has('status'))
      {{-- Alert --}}
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h5 class="text-center">{{ session('status') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      {{-- End Alert --}}
      @endif

      @yield('content')

          <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body px-5">
              <h3 class="text-center">Masuk</h3>
                <div class="justify-content-center align-item-center">
                    <form action="login" method="post">
                      @csrf
                      <label class="fw-light my-2" for="email">Email</label>
                      <input class="form-control" id="email" name="email" type="email" placeholder="Masukan email" required>
                      <label class="fw-light my-2" for="password">Password</label>
                      <input class="form-control" id="password" name="password" type="password" placeholder="Masukan password" required>
                      <div class="d-grid">
                        <button type="submit" class="btn my-4 text-dark fw-bold" style="background-color:#E7FF97; font-size: 10px;">MASUK</button>
                      </div>
                    </form>
                    <p class="text-center">Belum mempunyai akun ? <a href="register" class="text-dark"><b>Daftar Sekarang</b></a></p>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>

          <!-- Menu Modal -->
    <div class="modal fade" id="menuModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body p-5">
            <form action="menu" method="post" enctype="multipart/form-data">
              @csrf
              <div class="d-flex">
                <label for="inputFile" type="button" class=" ms-auto me-auto"><img class="img-fluid rounded" id="imgThumb" src="{{ asset('storage/img/add-image.png') }}"></label>
                <input hidden type="file" class="form-control" id="inputFile" name="img">
              </div>
              <label class="fw-light my-2" for="name">Nama Menu</label>
              <input class="form-control" name="name" type="text" placeholder="Masukan nama lengkap" required>
              <label class="fw-light my-2" for="jenis">Jenis</label>
              <select class="form-select" name="jenis">
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
              </select>
              <label class="fw-light my-2" for="stock">Stok</label>
              <input class="form-control" name="stock" type="number" placeholder="Stok" required>
              <label class="fw-light my-2" for="harga">Harga</label>
              <input class="form-control" name="harga" type="number" placeholder="Harga" required>
              <div class="d-grid">
                <button type="submit" class="btn my-4 text-light " style="background-color:#4A5338;">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <!-- Edit Menu Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body p-5">
            <form action="edit" method="post">
              @csrf
              <div class="d-flex">
                <img class="img-fluid rounded me-auto ms-auto" id="imgThumbEdit" src="{{ asset('storage/img/add-image.png') }}">
              </div>
              <input type="hidden" name="id_menu" id="id_menu">
              <label class="fw-light my-2" for="name">Nama Menu</label>
              <input class="form-control" id="name" name="name" type="text" placeholder="Masukan nama lengkap" required>
              <label class="fw-light my-2" for="jenis">Jenis</label>
              <select class="form-select" id="jenis" name="jenis">
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
              </select>
              <label class="fw-light my-2" for="stock">Stok</label>
              <input class="form-control" id="stock" name="stock" type="number" placeholder="Stok" required>
              <label class="fw-light my-2" for="harga">Harga</label>
              <input class="form-control" id="harga" name="harga" type="number" placeholder="Harga" required>
              <div class="d-grid">
                <button type="submit" class="btn my-4 text-light " style="background-color:#4A5338;">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>