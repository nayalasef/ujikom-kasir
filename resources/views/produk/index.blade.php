@include('layout.header')
@include('layout.navbar-top')
@include('layout.navbar-side')
<main id="main" class="main">
    <div class="pagetitle">
    <h1>Produk</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Produk</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
        <div class="row">

            <div class="d-flex gap-3 flex-row-reverse mb-4">
                <a class="btn btn-success pull-right pl-4" href="{{route('produk.pdf')}}">Report Stok</a>
                <a class="btn btn-primary pull-right" href="{{route('produk.tambah')}}">Tambah Data</a>
            </div>
            <!-- Sales Card -->
            @foreach($data as $datas)
            <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">

                <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>Detail</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Edit Data</a></li>
                    <li><a class="dropdown-item" id="{{$datas->id}}" onclick="delete_user(this.id);" href="#">Hapus Data</a></li>
                </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title"> {{$datas->nama}} <span>| {{$datas->kategori}} | Stok {{$datas->stok}} </span></h5>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/produk/'.$datas->gambar) }}" width="100%" height="322px">
                </div>
                <span class="card-title">Harga {{$datas->harga_jual}}</span>
                </div>

            </div>
            </div>
            @endforeach
            <!-- End Sales Card -->
        </div>
        </div><!-- End Left side columns -->
    </section>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
    <script>
    function delete_user(id) {
        var result = confirm("Anda Yakin menghapus produk ini ?");
        var url = '{{ route("produk.hapus", ":id") }}';
        url = url.replace(':id', id);
        if (result==true) {
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'JSON',
                data:{
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    alert("Data Berhasil Di Hapus");
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            })
        }
    }
    </script>
</main><!-- End #main -->
@include('layout.footer')