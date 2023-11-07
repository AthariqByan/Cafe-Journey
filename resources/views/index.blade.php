@extends('layouts.main')
@section('container')
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
    </div>
    <div style="margin-bottom: 300px" class="row row-cols-2 row-cols-lg-6 mt-2 g-4">

        @foreach ($cafes as $cafe)
            <div class="col">
                <a href="/cafe/{{ $cafe->slug }}" class="text-decoration-none">
                    <div style="width: 160px; height: 290px;" class="card rounded">
                        @if (isset($cafe->gambar_profil))
                            <img style="object-fit: cover" src="{{ asset('storage/' . $cafe->gambar_profil) }}"
                                class="card-img-top img-profil" alt="..." width="50px" height="160px">
                        @else
                            <img style="object-fit: cover" src="/assets/img/default.png" class="card-img-top img-profil"
                                alt="..." width="50px" height="150px">
                        @endif
                        <div class="card-body">
                            <h6 style="width: 100%" class="card-title text-over d-inline-block text-truncate">
                                {{ $cafe->nama_cafe }}</h6>
                            @if (count($cafe->ulasan) > 0)
                                <?php
                                $rata_rata = $cafe->ulasan->sum('rating') / count($cafe->ulasan);
                                $jumlahRating = $cafe->ulasan->sum('rating');
                                ?>
                            @endif
                            @if (count($cafe->ulasan) > 0)
                                <div style="color:#676767;"
                                    class="mb-3 mt-3 col d-flex justify-content-start align-items-center fw-normal">
                                    <div style="font-size: 9px" class="ratings mr-2 d-flex">
                                        <i
                                            class="{{ $rata_rata >= 1 ? 'text-warning bi bi-star-fill' : 'bi bi-star' }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 2 ? 'text-warning bi bi-star-fill' : ($rata_rata > 1 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 3 ? 'text-warning bi bi-star-fill' : ($rata_rata > 2 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 4 ? 'text-warning bi bi-star-fill' : ($rata_rata > 3 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }}"></i>
                                        <i
                                            class="{{ $rata_rata >= 5 ? 'text-warning bi bi-star-fill' : ($rata_rata > 4 ? 'text-warning  bi bi-star-half' : 'bi bi-star') }} "></i>
                                        <span class="fw-bold">&nbsp;{{ round($rata_rata, 1) }}</span>
                                        <span style="padding-bottom:1px" class="d-flex align-items-end">&nbsp;
                                            ({{ count($cafe->ulasan) }} Ulasan)
                                        </span>
                                    </div>
                                </div>
                            @else
                                <div style="color:#676767;"
                                    class="col mt-3 mb-3 d-flex justify-content-start align-items-center fw-normal">
                                    <div style="font-size: 9px" class="ratings">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <span class="fw-bold">&nbsp;0</span>
                                        <span style="padding-bottom:1px" class="review-count mt-1">
                                            ({{ count($cafe->ulasan) }} Ulasan)
                                        </span>
                                    </div>
                                </div>
                            @endif
                            <p style="font-size: 11px" class="card-text ">{{ $cafe->domisili }} | Kec
                                {{ $cafe->kecamatan }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
