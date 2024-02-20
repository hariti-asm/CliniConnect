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

</head>
<body>
    <x-section :doctor="$doctor"></x-section>
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 

 
 <div class="w-full max-w-[76%] mx-auto ml-[300px] mt-10">
    <table class="w-full max-w-7xl mt-10 mx-auto  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  
                    <th scope="col" class="px-6 py-3">
                        Patient Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Patient Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ilness
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($sessions as $session)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                       
                        <td class="px-6 py-4">
                            @if ($session->patient)
                                {{ $session->patient->name }}
                            @else
                                No patient assigned
                            @endif
                        </td>
                        <td class="px-6 py-4">  {{ $session->patient->email }}</td>
                        
                        
                        <td class="px-6 py-4">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-[#0D9276] text-white px-3 py-2 rounded-md text-sm">View</button>

                        </td>
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div id="comment-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center">
            hello
        </div> --}}
    </div>
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modalToggles = document.querySelectorAll("[data-modal-toggle]");
            const modalCloses = document.querySelectorAll("[data-modal-hide]");

            modalToggles.forEach((toggle) => {
                toggle.addEventListener("click", () => {
                    const target = toggle.getAttribute("data-modal-target");
                    const modal = document.getElementById(target);
                    modal.classList.toggle("hidden");
                    modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
                });
            });

            modalCloses.forEach((close) => {
                close.addEventListener("click", () => {
                    const target = close.getAttribute("data-modal-hide");
                    const modal = document.getElementById(target);
                    modal.classList.add("hidden");
                    modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
                });
            });
        });
    </script>
    

</body>
</html>