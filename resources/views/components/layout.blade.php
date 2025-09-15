<!doctype html>
<html class="h-full bg-gray-100 dark:bg-gray-900">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
  </head>
  <body class="h-full">
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>



<div class="min-h-full">
  <x-navbar></x-navbar>

  <x-header>{{$title}}</x-header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
</div>

  </body>
</html>