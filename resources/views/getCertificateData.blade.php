
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ClinniConnect</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
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
    <div class="w-full max-w-[40%] mx-auto bg-white rounded-lg shadow-md p-8 mt-[10%]">
        @foreach ($certificates as $certificate)
            <div class="flex flex-col items-end">
                <p class="font-semibold">Doctor:{{ $certificate->doctor->name }}</p>
                <p>{{ $certificate->doctor->specialty }}</p>
                <p>{{ $certificate->doctor->phone }}</p>
                <p>{{ $certificate->doctor->email }}</p>
            </div>

            <!-- Decorative lines -->
            <div class=" border-gray-300 mb-6 pb-6">
                <div class="text-xs uppercase text-gray-500 tracking-wide">Medical Certificate</div>
                <p class="mt-4 text-sm leading-relaxed text-gray-700">
                    This certifies that I, Dr. {{ $certificate->doctor->name }}, have reviewed the patient and confirm the following issues: {{ $certificate->description }}. 
                    Further details regarding the patient's condition and treatment can be obtained from my office.

                    This certificate is issued on {{ $certificate->date_received }} by {{ $certificate->issuer }}.
                    The patient is advised to take {{ $certificate->days_off }} days off from {{ $certificate->date_received }} to {{ $certificate->expiration_date }} for proper rest and recovery.
                </p>
                <div class="mt-6 text-xs text-gray-600">
                    <p>Clinic Address: 123 Medical Center Dr, City, State, ZIP</p>
                </div>
            </div>
        @endforeach
        <div id="printButton" class="text-center print:hidden">
            <button onclick="window.print()" class="bg-[#0d9276] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Print</button>
        </div>
    </div>

<style>
    .border-t.my-2 {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }

    @media print {
        x-app-layout nav {
            display: none;
        }

        #printButton {
            display: none;
        }
    }
</style>
</body>
</html>