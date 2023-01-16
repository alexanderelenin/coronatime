<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Corona Time</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
</head>     
<body >            
  <main class="flex flex-row w-full">          
    
    {{$slot}}
    <div class="relative hidden min-h-screen w-[40%] flex-1 lg:block ">
      <img class="w-full h-full object-cover absolute inset-0" src="images/vaccine.png" alt="">
    </div>
  </main>
</body>
</html>