@extends('dashboard.layouts.main')

@section('container')
    <section class="section dashboard">
        <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="/dashboard/beli">All</a></li>
                            <li><a class="dropdown-item" href="/dashboard/beli?filter={{ date('Y-m-d') }}">Hari</a></li>
                            <li><a class="dropdown-item" href="/dashboard/beli?filter={{ date('Y-m') }}">Bulan Ini</a>
                            </li>
                            <li><a class="dropdown-item" href="/dashboard/beli?filter={{ date('Y') }}">Tahun Ini</a>
                            </li>
                        </ul>
                    </div>



                    <div class="card-body">


                        <h6 class="mt-3">Filter</h6>
                        <div class="input-group mb-3">

                            <form action="">
                                <div class="input-group input-group-sm">
                                    <input style="font-size: 11px" type="date" class="form-control" name="dari"
                                        value="{{ request('dari') }}" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">-</span>
                                    <input style="font-size: 11px" type="date" class="form-control" name="sampai"
                                        value="{{ request('sampai') }}" aria-label="Sizing example input"
                                        aria-describedby="inputGroup-sizing-sm">
                                    <button type="submit" class="btn btn-sm btn-main btn-cari"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <h5 class="card-title">Recent Sales <span>| Today</span></h5>


                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama pemesen</th>
                                    <th scope="col">No Pesanan</th>
                                    <th scope="col">Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($cafes as $cafe)
                                    @if (isset($cafe->no_pesanan))
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $cafe->user->name }}</td>
                                            <td> {{ $cafe->no_pesanan }}</td>
                                            <td> <a href="" class="btn btn-sm btn-main" data-bs-toggle="modal"
                                                    data-bs-target="#detailPesanan{{ $cafe->no_pesanan }}">Lihat</a>
                                                @include('dashboard.beli.modalDetailPesan')</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->
        </div>
    </section>
@endsection
