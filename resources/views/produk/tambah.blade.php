@include('layout.header')
@include('layout.navbar-top')
@include('layout.navbar-side')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Produk</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Tambah Produk</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="card">
      <div class="card-body" >
        <h5 class="card-title">Form Tambah Produk</h5>

        <!-- Vertical Form -->
        <form class="row g-3" action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="col-12">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="col-12">
            <label class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-12">
              <select id="kategori" name="kategori" class="form-select" aria-label="Default select example">
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
              </select>
            </div>
          </div>
          <div class="col-12">
            <label for="hpp" class="form-label">HPP</label>
            <input type="number" class="form-control" id="hpp" name="hpp">
          </div>
          <div class="col-12">
            <label for="harga_jual" class="form-label">Harga Jual</label>
            <input type="number" class="form-control" id="harga_jual" name="harga_jual" >
          </div>
          <div class="col-12">
            <label for="file" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="file" name="file">
          </div>
          <div class="col-12">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="{{route('produk')}}">Kembali</a>
          </div>
        </form>

      </div>
    </div>
  </section>

</main>
@include('layout.footer')