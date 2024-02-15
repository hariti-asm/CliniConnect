

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
   <x-section :doctor="$doctor"></x-section>
   
     {{-- <x-section></x-section> --}}@if ($reviews->count() > 0)
     @foreach ($reviews as $review)
     <div class="mt-4 border border-gray-200 rounded-lg p-4 w-full max-w-[50%] mx-auto">
         <div class="flex items-center mb-2">
             <img src="../{{ $review->patient->image }}" class="w-12 h-12 rounded-full mr-2" alt="Profile Picture">
             <div class="font-semibold">{{ $review->patient->name }}</div>
             <div class="flex items-center ml-2">
                 @for ($i = 0; $i < $review->rating; $i++)
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                         <path fill-rule="evenodd" d="M10 2a.75.75 0 0 0-.75.75v6.992L5.28 8.864a.75.75 0 1 0-.53 1.428l3.47 2.624a.75.75 0 0 0 1.06-.648V2.75A.75.75 0 0 0 10 2zm6.22 6.28l-3.47-2.624a.75.75 0 1 0-.53 1.428L15.25 9.742v6.508a.75.75 0 0 0 1.06.648l3.47-2.624a.75.75 0 0 0 0-1.248z" clip-rule="evenodd"/>
                     </svg>
                 @endfor
             </div>
         </div>
         <p class="text-gray-700">{{ $review->comment }}</p>
         <div class="text-xs text-gray-500 mt-2">{{ $review->created_at->diffForHumans() }}</div>
     </div>
 @endforeach
 @else
 <p class="mt-4">No comments available.</p>
 @endif()
 <script src="..js/script.js"></script>
</body>
</html>