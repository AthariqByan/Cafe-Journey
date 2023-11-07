<!-- Modal -->
<div class="modal fade" id="detail{{ $cafe->id }}" tabindex="-1" aria-labelledby="detail{{ $cafe->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail{{ $cafe->id }}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <style>
                    tr,
                    td,
                    th {
                        padding: 3px 4px;
                        text-align: left
                    }
                </style>
                <table>
                    <?php $total = 0; ?>
                    <?php $jumlah = 0; ?>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($pesanan->where('cafe_id', $cafe->cafe_id) as $pesanan)
                        @if (!isset($pesanan->no_pesanan))
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
                                <td>
                                    <form action="/beli/destroy-pesanan/{{ $pesanan->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ms-2"
                                            onclick="return confirm('Yakin Mau Hapus')"><i
                                                class="bi bi-trash3"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
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
                <form action="/beli/{{ $pesanan->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="no_pesanan">
                    <button type="submit" class="btn btn-primary">Lanjut Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
