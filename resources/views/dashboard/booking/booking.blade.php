@extends('dashboard.layouts.main')

@section('container')
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="/dashboard/booking">All</a></li>
                        <li><a class="dropdown-item" href="/dashboard/booking?filter={{ date('Y-m-d') }}">Hari</a></li>
                        <li><a class="dropdown-item" href="/dashboard/booking?filter={{ date('Y-m') }}">Bulan Ini</a>
                        </li>
                        <li><a class="dropdown-item" href="/dashboard/booking?filter={{ date('Y') }}">Tahun Ini</a>
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

                    <div class="mb-3 mt-3">
                        <a href="/dashboard/vip/create" class="btn btn-main">Tambah Tempat</a>
                    </div>
                    @foreach ($bookings as $booking)
                        <div class="card m-2 p-3">
                            <div class="row row-cols-2 row-cols-lg-5 g-3 g-lg-4">
                                <div class="col">
                                    <img src="{{ asset('storage/' . $booking->vip->gambar) }}" alt="..." width="120px"
                                        height="120px" style="padding: 12px; object-fit: cover;">
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <h3 class="card-title p-0">Lorem, ipsum dolor sit amet</h3>
                                    <span style="font-size: 12px" class="mb-1 p-0">Harga</span><br>
                                    <?php $harga = $booking->vip->harga; ?>
                                    <span class="card-text fs-5">Rp {{ number_format("$harga", 0, ',', '.') }}</span>

                                    <p class="card-text text-decoration-underline"><a href="" data-bs-toggle="modal"
                                            data-bs-target="#deskripsiMakanan{{ $booking->id }}"><small
                                                class="text-body-secondary">Detail Pesanan</small></a></p>
                                    @include('dashboard.booking.modal')
                                </div>
                                <div class="col">
                                    <span style="font-size: 12px" class=" p-0">Nama Pemesan</span><br>
                                    <span class="text-card fs-bold">{{ $booking->user->name }}</span><br>

                                    <span style="font-size: 12px" class="mb-1 p-0">No Pesanan</span><br>
                                    <span class="text-card fs-bold">{{ $booking->no_pesanan }}</span>
                                </div>
                                <div class="col mb-3">
                                    <a href="/dashboard/vip/{{ $booking->vip->id }}/edit" data-bs-toggle="modal"
                                        data-bs-target="#bukti{{ $booking->id }}"
                                        class="btn btn-sm btn-primary mt-3">Bukti
                                        Bayar</a>

                                    @if ($booking->opsi == 'tunggu')
                                        <a style="padding: 4px 24px" class="btn btn-sm btn-danger mt-3"
                                            data-bs-toggle="modal" data-bs-target="#setatus{{ $booking->id }}">Tunggu</a>
                                    @elseif ($booking->opsi == 'sukses')
                                        <a style="padding: 4px 24px" class="btn btn-sm btn-warning mt-3"
                                            data-bs-toggle="modal" data-bs-target="#setatus{{ $booking->id }}">Sukses</a>
                                    @elseif ($booking->opsi == 'selesai')
                                        <a style="padding: 4px 24px" class="btn btn-sm btn-success mt-3"
                                            data-bs-toggle="modal" data-bs-target="#setatus{{ $booking->id }}">Selesai</a>
                                    @endif

                                    @include('dashboard.booking.modalBukti')
                                    @include('dashboard.booking.modalStatus')
                                </div>

                            </div>
                        </div>
                    @endforeach

                    @if (count($bookings) <= 0)
                        <p class="text-center">Data Booking Kosong</p>
                    @endif

                    <div class="row mt-3">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
