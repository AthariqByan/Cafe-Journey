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

                            <li><a class="dropdown-item" href="/dashboard/analis">All</a></li>
                            <li><a class="dropdown-item" href="/dashboard/analis?filter={{ date('Y-m-d') }}">Hari</a></li>
                            <li><a class="dropdown-item" href="/dashboard/analis?filter={{ date('Y-m') }}">Bulan Ini</a>
                            </li>
                            <li><a class="dropdown-item" href="/dashboard/analis?filter={{ date('Y') }}">Tahun Ini</a>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <h5 class="card-title">Analisa Data Pesanan Minuman</h5>

                                    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
                                    <div id="myMinuman" style="width:100%;"></div>

                                    <script>
                                        const xArray = {!! json_encode($minuman) !!};
                                        const yArray = {!! json_encode($jumlah) !!};

                                        const data = [{
                                            x: xArray,
                                            y: yArray,
                                            type: "bar"
                                        }];

                                        const layout = {
                                            title: "Analis Data Minuman"
                                        };

                                        Plotly.newPlot("myMinuman", data, layout);
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Analisa Data Pesanan Makanan</h5>

                                    <!-- Bar Chart -->
                                    <div id="barChart" style="min-height: 400px;" class="echart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            echarts.init(document.querySelector("#barChart")).setOption({
                                                xAxis: {
                                                    type: 'category',
                                                    data: {!! json_encode($makanan) !!}
                                                },
                                                yAxis: {
                                                    type: 'value'
                                                },
                                                series: [{
                                                    data: {!! json_encode($jumlah_makanan) !!},
                                                    type: 'bar'
                                                }]
                                            });
                                        });
                                    </script>
                                    <!-- End Bar Chart -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
