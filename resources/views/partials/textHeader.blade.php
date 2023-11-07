<div class="text-header">
    <div class="container-fluid">

        <div class="row row-cols-2 row-cols-lg-2">
            <div class="col text-start">
                <a href="#" class="text-white text-decoration-none">Tentang Kami
                </a><span>|</span>
                <a href="#" class="text-white text-decoration-none">Hubungi Kami <i class="bi bi-headset"></i></a>
            </div>
            <div class="col text-end ">
                <a href="" class="text-white text-decoration-none" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i
                        class="bi bi-question-circle"></i> Bantuan
                </a>
                @can('bukan_admin')
                    <span>|</span>
                    <a href="/daftar-cafe" class="text-white text-decoration-none">Mendaftar Cafe</a>
                @endcan
            </div>

        </div>
    </div>
</div>
