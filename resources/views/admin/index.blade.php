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
                    <form method="POST" id="myForm" action="{{ route('admin.pesan') }}">
                        @csrf
                        <input type="text" id="admin_id" name="admin_id">
                        <input type="text" id="kendaraan_id" name="kendaraan_id">
                        <input type="text" id="driver_id" name="driver_id">
                        <button type="submit">Submit</button>
                    <script>
                        document.getElementById('myForm').addEventListener('submit', function(event) {
                            var adminId = document.getElementById('admin_id').value;
                            var kendaraanId = document.getElementById('kendaraan_id').value;
                            var driverId = document.getElementById('driver_id').value;

                            var action = this.getAttribute('action');

                            action = action.replace('admin_id=', 'admin_id=' + adminId);
                            action = action.replace('kendaraan_id=', 'kendaraan_id=' + kendaraanId);
                            action = action.replace('driver_id=', 'driver_id=' + driverId);
                            this.setAttribute('action', action);
                        });
                    </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
