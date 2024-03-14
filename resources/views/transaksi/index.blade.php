@include('layout.header')
@include('layout.navbar-top')
@include('layout.navbar-side')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Transaksi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Transaksi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">List Transaksi</h5>
          <div class="d-flex flex-row-reverse"><a class="btn btn-primary pull-right" href="{{route('transaksi.tambah')}}">Order</a></div>

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tgl Transaksi</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Pesanan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $i => $trans)
              <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{ $trans->transaksi->tgl_transaksi}}</td>
                <td>{{ $trans->barang->nama}}</td>
                <td>{{ $trans->jumlah_barang}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
      </div><!-- End Left side columns -->
    </div>
  </section>
</main>
@include('layout.footer')