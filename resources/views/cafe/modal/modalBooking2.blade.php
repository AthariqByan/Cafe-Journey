<!-- Modal -->
<div class="modal fade" id="deskripsiBooking{{ $booking->id }}" tabindex="-1"
    aria-labelledby="deskripsiBooking{{ $booking->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deskripsiBooking{{ $booking->id }}Label">
                    {{ $booking->vip->nama_tempat }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small class="text-body-scondary">No Pesanan </small>
                <p>{{ $booking->no_pesanan }}<br></p>
                <small class="text-body-scondary">Nama Cafe </small>
                <p><a href="/cafe/{{ $booking->cafe->slug }}">{{ $booking->cafe->nama_cafe }}</a><br></p>
                <small class="text-body-scondary">Harga </small>
                <p class="fs-5">{{ $booking->vip->harga }}</p>
                <small class="text-body-scondary">Deskripsi </small>
                {!! $booking->vip->deskripsi !!}
                <br>
                <small class="text-body-scondary">Fasilitas </small>
                <p style="margin-top: 10px">
                    @foreach (explode(',', $booking->vip->fasilitas) as $fasilitas)
                        <span class="fasilitas text-capitalize text-color">{{ $fasilitas }}</span>
                    @endforeach
                </p>
                <small class="text-body-scondary">Kapsaitas </small>
                <p class="fs-5">{{ $booking->vip->kapasitas }}</p>
            </div>
        </div>
    </div>
</div>
