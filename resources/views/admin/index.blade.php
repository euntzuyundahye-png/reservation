@extends('admin')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dashboard Admin</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">

</div>

@endsection

@push('scripts')
<script>
new Sortable(document.querySelector('.connectedSortable'), {
    group: 'shared',
    handle: '.card-header',
});

new ApexCharts(document.querySelector('#revenue-chart'), {
    series: [{
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90]
        },
        {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40]
        }
    ],
    chart: {
        height: 300,
        type: 'area'
    },
    stroke: {
        curve: 'smooth'
    }
}).render();

new jsVectorMap({
    selector: '#world-map',
    map: 'world'
});

['#sparkline-1', '#sparkline-2', '#sparkline-3'].forEach((id) => {
    new ApexCharts(document.querySelector(id), {
        series: [{
            data: [10, 20, 15, 30, 25, 40, 35]
        }],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true
            }
        }
    }).render();
});
</script>
@endpush