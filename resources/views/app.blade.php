<x-layout>
  
  <x-slot:title>{{ $title }}</x-slot:title>
  {{-- {{$dispo = collect($values);}} --}}

  
  
  <div class="max-w-md w-full mx-auto bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
    <dl>
      <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Jumlah Surat</dt>
      <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">{{$jlhSurat}}</dd>
    </dl>
    {{-- <div>
      <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
        </svg>
        Tingkat Jumlah 23.5%
      </span>
    </div> --}}
  </div>


  

  {{-- <div class="grid grid-cols-2 py-3">
    <dl>
      <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Surat Masuk</dt>
      <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">10</dd>
    </dl>
    <dl>
      <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Surat Keluar</dt>
      <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">5</dd>
    </dl>
  </div> --}}

  <canvas id="myChart"></canvas>
    <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
      <div class="flex justify-between items-center pt-5">
        
        <!-- Dropdown menu -->
        <div class="relative max-w-sm">
          
        <select id="cekLaporan" name="cekLaporan" class=" form-control bg-transparent border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

          <option value="kemarin">Kemarin</option>
          <option value="hari ini">Hari Ini</option>
          <option value="7 hari terakhir">7 Hari Terakhir</option>
          <option value="30 hari terakhir">30 Hari Terakhir</option>
          <option value="Setahun terakhir">Setahun Terakhir</option>
        </select>
        </div>
        
        <div class="relative max-w-sm">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
          </div>
          <input datepicker id="default-datepicker" name="tanggal" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal">
        </div>

        
      </div>
    </div>
</div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          
            const ctx = document.getElementById('myChart');
            
            var data = <?php echo json_encode($label); ?>;
            var labels = <?php echo json_encode($label); ?>;
            var values = <?php echo json_encode($total); ?>;
            //var labels = ['a', 'b', 'c'];
            //var values = [1, 2, 3];
            //alert("I am an alert box! " + data  );
            new Chart(ctx, {
                type: 'bar', // or 'line', 'pie', etc.
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# Jlh. Disposisi',
                        data: values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            // ... more colors
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            // ... more colors
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    // Chart.js options
                }
            });

            
            
        });

        
    
      </script>

    <script>
      document.getElementById('cekLaporan').addEventListener('change', function() {
        var selectedOption = this.value;
            if (selectedOption === 'kemarin') {
              // Lakukan tindakan jika opsi "kemarin" dipilih
              alert('Kemarin dipilih');

            }
            else {
              // Lakukan tindakan jika opsi "kemarin" tidak dipilih
              alert('Kemarin tidak dipilih');
            }

    });
        
        
      </script>
  
    {{-- <script>
      var labels = {{ Js::from($labels) }};
      var values = {{ Js::from($values) }};

      const data = {
        labels : labels,
        datasets : [{
          label : 'Monthly Data',
          data : values,
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      };

      const config = {
        type: 'bar',
        data: data,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
      
    </script> --}}

</x-layout>