<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>Pemesanan Kendaraan</div>
                    <form class="flex items-center p-6" method="POST" action="{{ route('admin.pesan') }}">
                        @csrf
                        <input type="hidden" name="admin_id" value={{$admin_id}}>
                        <label class="ml-4" for="Kendaraan">Pilih Tipe Kendaraan:</label>
                            <select class="ml-4" name="kendaraans_id" id="kendaraans_id">
                                @foreach ($kendaraans as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}, {{$item->jenis}}</option>
                                @endforeach
                            </select>

                        <label class="ml-4" for="Driver">Pilih Driver:</label>
                            <select class="ml-4" name="driver_id" id="driver_id">
                                @foreach ($drivers as $item)
                                    <option value={{$item->id}}>{{$item->nama}}</option>
                                @endforeach
                            </select>

                        <label class="ml-4" for="Driver">Pilih Lokasi:</label>
                            <select class="ml-4" name="tambang_id" id="tambang_id">
                                @foreach ($tambangs as $item)
                                    <option value={{$item->id}}>{{$item->lokasi}}</option>
                                @endforeach
                            </select>
                            <x-button type="submit" class="ml-4">Submit</x-button>
                    </form>

                    <h1>Charts Order</h1>
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var userData = <?php echo json_encode($orderData)?>;
    Highcharts.chart('container', {
        title: {
            text: 'New Order Growth, 2023'
        },
        subtitle: {
            text: 'Source: positronx.io'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Orders'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Orders',
            data: userData
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>