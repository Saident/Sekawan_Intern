<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Pihak Penyetuju Panel</h1>
                    @foreach ($pesanan as $pesanan)
                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6">
                                <div class="flex items-center">
                                        <div class="ml-4 text-md font-semibold">
                                            <p class="text-gray-900 dark:text-white">Jenis Kendaraan : {{ $kendaraan }}</p>
                                            <p class="text-gray-900 dark:text-white">Status : {{ $status }}</p>
                                        </div>
                                </div>
    
                                <div class="ml-4">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        Driver : {{ $driver }}
                                    </div>
                                </div>
                            </div>
                            @if (($status=='Tersedia'))
                            {{-- <form method="POST" action="{{ route('konfirmasi') }}"> --}}
                            <div class="flex items-center p-6 justify-end">
                                <x-button class="ml-3">
                                    {{ __('Konfirmasi') }}
                                </x-button>
                                <x-button class="ml-3">
                                    {{ __('Tolak') }}
                                </x-button>
                            </div>
                            {{-- </form> --}}
                            @else
                            
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
