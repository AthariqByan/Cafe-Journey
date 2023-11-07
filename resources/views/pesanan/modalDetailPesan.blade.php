<!-- Modal -->
<div class="modal fade" id="detailPesanan{{ $cafe->no_pesanan }}" aria-hidden="true"
    aria-labelledby="detailPesanan{{ $cafe->no_pesanan }}Label" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailPesanan{{ $cafe->no_pesanan }}Label">Detail Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <style>
                    tr,
                    td,
                    th {
                        padding: 2px 4px;
                        text-align: left
                    }
                </style>
                <table>
                    <?php $total = 0; ?>
                    <?php $jumlah = 0; ?>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    @foreach ($pesanan->Where('no_pesanan', $cafe->no_pesanan) as $pesanan)
                        <tr>
                            <td>
                                @if (isset($pesanan->minum->nama_minuman))
                                    {{ $pesanan->minum->nama_minuman }}
                                @elseif (isset($pesanan->makanan->nama_makanan))
                                    {{ $pesanan->makanan->nama_makanan }}
                                @endif
                            </td>
                            <td>
                                {{ $pesanan->jumlah }}
                                <?php $jumlah = $pesanan->jumlah + $jumlah; ?>
                            </td>
                            <td>

                                @if (isset($pesanan->minum->harga))
                                    Rp {{ $pesanan->minum->harga }}
                                    <?php $total = $pesanan->minum->harga * $pesanan->jumlah + $total; ?>
                                @elseif (isset($pesanan->makanan->harga))
                                    Rp {{ $pesanan->makanan->harga }}
                                    <?php $total = $pesanan->makanan->harga * $pesanan->jumlah + $total; ?>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr style="border-top: 2px solid black">
                        <td>Total</td>
                        <td>{{ $jumlah }}</td>
                        <td>Rp {{ $total }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" data-bs-target="#detailPesanan{{ $cafe->no_pesanan }}2" data-bs-toggle="modal"
                    class="btn btn-primary">Lihat Qr Code Pesanan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailPesanan{{ $cafe->no_pesanan }}2" aria-hidden="true"
    aria-labelledby="detailPesanan{{ $cafe->no_pesanan }}Label2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailPesanan{{ $cafe->no_pesanan }}Label2">Qr code Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="visible-print text-center">
                    {!! QrCode::size(200)->generate($cafe->no_pesanan) !!}
                    <p>No Pesanan : {{ $cafe->no_pesanan }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#detailPesanan{{ $cafe->no_pesanan }}"
                    data-bs-toggle="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>
