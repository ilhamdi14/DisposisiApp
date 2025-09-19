<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    
<div class="max-w-md w-full mx-auto bg-white rounded-lg shadow-sm dark:bg-gray-800 p-4 md:p-6">
  <div class=" justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
<form class="max-w-md mx-auto" action="{{ route('storeMemoPimpinan') }}" method="POST" enctype="multipart/form-data">

  @csrf

  <div class="relative z-0 w-full mb-5 group">
      <input type="text" name="perihal" id="perihal" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="perihal" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Perihal</label>
  </div>
  <div class="relative z-0 w-full mb-5 group">
    <label for="sifat_surat" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Sifat Surat</label>
  <select id="sifat" name="sifat" class="bg-transparent border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option value="Biasa">Biasa</option>
    <option value="Rahasia">Rahasia</option>
    <option value="Sangat Rahasia">Sangat Rahasia</option>
  </select>
  </div>

  <div class="relative z-0 w-full mb-5 group">
  <label for="catatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
  <textarea id="catatan" name="catatan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan Catatan Memo..." required></textarea>
  
  </div>

  
  <input type="hidden" id="userId" name="userId" value="{{Auth::user()->id}}">

  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
</form>

  </div>
</div>

</x-layout>