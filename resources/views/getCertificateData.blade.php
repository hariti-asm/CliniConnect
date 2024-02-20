<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center ">
        <div class="px-10">
            @foreach ($certificates as $key => $certificate)
            @if ($key % 2 == 0)
            <div class="flex mb-8">
            @endif
            <div id="certificate{{ $certificate->id }}" class="certificate bg-white max-w-xl rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500 mb-8 mr-8">
                <div class="h-12 w-12 rounded-full border-2 border-green-400 flex items-center justify-center ml-4">
                    <img class="h-8 w-8" src="../images/healthCare.png" alt="Doctor Image">
                </div>
                <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">Medical Certificate</h1>
                <p class="mt-4 text-sm leading-relaxed text-gray-700">
                    This certifies that I, Dr. {{ $certificate->doctor->name }}, have reviewed the patient {{ $certificate->patient->name }} and confirm the following issues: {{ $certificate->description }}. 
                    Further details regarding the patient's condition and treatment can be obtained from my office.
                    This certificate is issued on {{ $certificate->date_received }} by {{ $certificate->issuer }}.
                    The patient is advised to take {{ $certificate->days_off }} days off from {{ $certificate->date_received }} to {{ $certificate->expiration_date }} for proper rest and recovery.
                </p>
                <div class="mt-6 text-xs text-gray-600">
                    <p>Clinic Address: 123 Medical Center Dr, City, State, ZIP</p>
                </div>
                <div class="flex justify-end items-center mt-4">
                    <button id="printButton{{ $certificate->id }}" onclick="printCertificate({{ $certificate->id }})" class="p-6 bg-green-400 rounded-full h-4 w-4 flex items-center justify-center text-2xl text-white shadow-lg cursor-pointer">
                    <p class="text-sm">print</p>
                    </button>
                </div>
            </div>
            @if ($key % 2 == 1 || $key == count($certificates) - 1)
            </div>
            @endif
            @endforeach
        </div>
    </div>
    
    <script>
        function printCertificate(certificateId) {
            // Create a new window with just the content of the clicked certificate
            var printWindow = window.open('', '_blank');
            var certificateContent = document.getElementById('certificate' + certificateId).innerHTML;
            printWindow.document.body.innerHTML = certificateContent;

            // Hide the print button for the clicked certificate
            document.getElementById('printButton' + certificateId).style.display = 'none';
    
            // Print the new window
            printWindow.print();
        }
    </script>
    
    <style>
        .border-t.my-2 {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
    
        @media print {
            .certificate {
                display: block !important; /* Ensure that the certificate content is displayed when printing */
            }
        }
    </style>

</body>
</html>
   