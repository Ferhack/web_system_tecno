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
        function generateColorsHexa(listResult) {
            listColors = [];
            for (const result of listResult) {
                result > 100 ? listColors.push('red') : listColors.push('green');
            }
            return listColors;
        }

        function TotalSumEgreso(listResult) {
            resultSum = 0;
            for (const result of listResult) {
                resultSum = resultSum + parseInt(result);
            }
            return resultSum;
        }

        let dataValues = {!! json_encode($listReportResult) !!};
        let dataLabels = {!! json_encode($listReportDetail) !!};

        const data = {
            labels: dataLabels,
            datasets: [{
                backgroundColor: this.generateColorsHexa(dataValues),
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
                    text: 'Gasto Total Actualmente: ' + this.TotalSumEgreso(dataValues) + ' Bs.'
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
    <div class="card-footer">
        <?php
        session_start();
        if (isset($_SESSION['report_egreso'])) {
            $_SESSION['report_egreso'] = $_SESSION['report_egreso'] + 1;
        } else {
            $_SESSION['report_egreso'] = 1;
        }
        $x = $_SESSION['report_egreso'];
        ?>
    </div>

@endsection
