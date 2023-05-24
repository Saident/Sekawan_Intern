<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-lg font-semibold">
                    <h1 class="ml-4">Pihak Penyetuju Panel</h1>
                    @if ($pesanan->isEmpty())
                    <div class="mt-8 bg-white dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6">
                                <div class="flex items-center">
                                        <div class="ml-4 text-lg font-semibold">
                                            <p class="text-gray-900 dark:text-white ">Pesanan Sedang Kosong</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        @foreach ($pesanan as $item)
                        <div class="mt-8 bg-white dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="p-6">
                                    <div class="flex items-center">
                                            <div class="ml-4 text-md font-semibold">
                                                <p class="text-gray-900 dark:text-white">Nama Kendaraan : {{ $item->kendaraan->nama }}</p>
                                                <p class="text-gray-900 dark:text-white">Status : {{ $item->kendaraan->status }}</p>
                                            </div>
                                    </div>
        
                                    <div class="ml-4">
                                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                            Driver : {{ $item->driver->nama }}
                                        </div>
                                    </div>
                                </div>
                                @if (($item->kendaraan->status=='Dipesan'))
                                <div class="flex items-center p-6 justify-end">
                                    <form method="POST" action="{{ route('confirm', ['id' => $kendaraan_id])}}">
                                        @csrf
                                        <x-button class="ml-3 bg-white">
                                            {{ __('Konfirmasi') }}
                                        </x-button>
                                    </form>
    
                                    <form method="POST" action="{{ route('cancel', ['id' => $kendaraan_id])}}">
                                        @csrf
                                        <x-button class="ml-3">
                                            {{ __('Tolak') }}
                                        </x-button>
                                    </form>
    
                                </div>
                                @elseif (($item->kendaraan->status=='Diproses'))
                                <div class="flex items-center p-6 justify-end">
    
                                    <form method="POST" action="{{ route('accept', ['id' => $kendaraan_id])}}">
                                        @csrf
                                        <x-button class="ml-3">
                                            {{ __('Setujui') }}
                                        </x-button>
                                    </form>

                                    <form method="POST" action="{{ route('cancel', ['id' => $kendaraan_id])}}">
                                        @csrf
                                        <x-button class="ml-3">
                                            {{ __('Tolak') }}
                                        </x-button>
                                    </form>
    
                                </div>
                                @else
                                <div class="flex items-center p-6 justify-end text-white">
                                    Telah Dipesan
                                    <form method="POST" action="{{ route('return', ['id' => $kendaraan_id])}}">
                                        @csrf
                                        <x-button class="ml-3">
                                            {{ __('Return Kendaraan') }}
                                        </x-button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
