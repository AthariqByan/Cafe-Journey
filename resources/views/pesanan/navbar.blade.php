<?php $i = 0; ?>
@foreach ($cafes as $cafe)
    @if (!isset($cafe->no_pesanan))
        <?php $i++; ?>
    @endif
@endforeach

<ul class="nav nav-underline">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('beli') ? 'active' : '' }}" aria-current="page" href="/beli">Pesanan</a>
    </li>
    <li class="nav-item d-flex justify-content-between align-items-start">
        <a class="nav-link {{ Request::is('beli/draf') ? 'active' : '' }}" href="/beli/draf">Draf
            @if ($i > 0)
                <span class="position-absolute ms-2 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            @endif
        </a>
    </li>
</ul>
