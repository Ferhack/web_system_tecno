@extends('layouts.app')

@section('content')
    <div class="container justify-content-center pt-3">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card bg-light border border-2" style="padding: 30px;">
                    <div class="card-header">
                        <h4 class="fw-bold">Reporte Ingresos</h4>
                        {{-- <a class="btn btn-outline-success float-end" href="{{ url('/multa/create') }}">Nueva Multa</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="alert alert-secondary">
                            <canvas id="myChart"></canvas>
                            {{-- @foreach ($array as $array)
                                <p>{{ $array }}</p>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let dataValues = {!! json_encode($values) !!};
        let dataLabels = {!! json_encode($mes) !!};

        const data = {
            labels: dataLabels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: dataValues
            }]
        };

        const options = {
            indexAxis: 'y',
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
                bar: {
                    borderWidth: 2,
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Chart.js Horizontal Bar Chart'
                }
            }
        }

        const config = {
            type: 'bar',
            data: data,
            options: options
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

@endsection
