<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    
<div class="max-w-md w-full mx-auto bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
  <div class=" justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
  @if (session('success'))
            <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
                {{ session('success') }}
            </div>
    @endif


<form class="max-w-md mx-auto" action="{{ route('dashboard.store') }}" method="POST">
  @csrf
  <div class="relative z-0 w-full mb-5 group">
    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal</label>
      <input type="text" id="base-input" name="perihal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$memo->perihal}}" disabled>
  </div>

  <div class="relative z-0 w-full mb-5 group">
    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sifat Surat</label>
      <input type="text" id="base-input" name="sifat_surat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$memo->sifat_surat}}" disabled>
  </div>

  <div class="relative z-0 w-full mb-5 group">
    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tampilan Surat </label>
      
    
    <a href="{{ route('view-pdf', ['id' => $memo->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">Surat.pdf</a>

  </div>


<div class="relative z-0 w-full mb-5 group">
    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan Disposisi : </label>
<div class="grid mb-8 border border-gray-200 rounded-lg shadow-xs dark:border-gray-700 md:mb-12 md:grid-cols-1 bg-white dark:bg-gray-800">
   
    @foreach ($dispo as $dis)
        
        <figure class="block flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
            <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kepada : {{ $dis->penerima->jabatan->namaJabatan }}</h3>
                <p>({{ $dis->created_at }})</p>
                <p class="my-4">"{{ $dis->catatan }}"</p>
            </blockquote>
            <figcaption class="flex items-center justify-center ">
                
                <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                    <div>{{ $dis->pengirim->name }}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400 ">{{ $dis->pengirim->jabatan->namaJabatan }}</div>
                </div>
            </figcaption>    
        </figure>
    @endforeach 
     
</div>
</div>


  <div class="relative z-0 w-full mb-5 group">
    <label for="sifat_surat" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Disposisi</label>
  <select id="kepada_user_id" name="kepada_user_id" class="bg-transparent border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    
    @foreach ($user as $itemJabatan )
     <option value={{$itemJabatan->id}}>{{ $itemJabatan->jabatan->namaJabatan }}</option>
    @endforeach
  </select>
  </div>

  <div class="relative z-0 w-full mb-5 group">
  <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
  <textarea id="catatan" name="catatan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan Catatan Disposisi..." required></textarea>
  
  </div>
  <input type="hidden" id="dispo_id" name="memoId" value="{{$memo->id}}">
  <input type="hidden" id="memoId" name="memoId" value="{{$memo->id}}">
  <input type="hidden" id="userId" name="userId" value="{{Auth::user()->id}}">
  <input type="hidden" id="old_UserId" name="old_UserId" value="{{$memo->id}}">

  
  @if (auth()->user()->grade == 'Pimpinan')
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
      </form>
  @else
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
      </form>
      <form method="POST" action="{{ route('selesaiDispo') }}">
        @csrf
        <input type="hidden" id="memoIdX" name="memoIdX" value="{{$memo->id}}">
        <button type="submit" id="selesai" class="text-white bg-blue-200 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-2  w-full  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Selesai</button>
      </form>
  @endif


  </div>
</div>

</x-layout>

