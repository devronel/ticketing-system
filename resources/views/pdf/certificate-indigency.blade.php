<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="p-2">
        <div class=" flex flex-col items-center mt-5">
            <p class=" text-sm">Republic of the Philippines</p>
            <p class=" text-sm">Province of Oriental Mindoro</p>
            <p class=" text-sm">Municipality of Calapan</p>
            <p class=" text-sm font-bold">Barangay Deputa</p>
        </div>
        <div class=" mt-8">
            <p class=" uppercase font-bold text-lg text-center">Office of the Barangay Captain</p>
        </div>
        <div class=" bg-gray-200 h-[2px] w-full my-5"></div>
        <div class="mb-8">
            <p class=" uppercase font-medium tracking-wide text-3xl text-center text-yellow-500">Barangay Indigency</p>
        </div>
        <div class="px-14 mb-8">
            <p class="mb-5 uppercase text-sm font-bold tracking-wide">TO WHOM IT MAY CONCERN</p>
            <div>
                <p class="mb-2 text-sm">
                    <span class="ml-10">This</span> is to certify that <span>{{ $certificateRequest?->resident->full_name }}</span>, <span>{{ $certificateRequest?->resident->age }}</span> years old, <span>{{ ucfirst($certificateRequest?->resident->gender) }}</span> is boni fide resident of Barangay Deputa, Calapan, Oriental Mindoro.
                    The said person is of good moral character and an active member of the community. He is one of those who belong to indigent family.
                </p>
                <p class="mb-2 text-sm">
                    <span class="ml-10">This</span> certification is being issued upon the request of the above-named person for whatever purposes it may serve her/his best.
                </p>
                <p class="text-sm">
                    <span class="ml-10 font-bold">Issued</span> 
                    this on day <span>{{ \Carbon\Carbon::parse($certificateRequest?->requested_at)->day }}</span> 
                    of <span>{{ \Carbon\Carbon::parse($certificateRequest?->requested_at)->format('F') }}</span>, <span>{{ \Carbon\Carbon::parse($certificateRequest?->requested_at)->year }}</span> at 
                    Barangay Deputa, Calapan, Oriental Mindoro.
                </p>
            </div>
        </div>
        <div class="px-14 mb-8 flex flex-col items-end">
            <div>
                <p class=" text-sm font-bold text-left">John Doe</p>
                <p class=" text-xs text-left">Barangay Captain</p>
            </div>
        </div>
        <div class="px-14 mb-8">
            <div>
                <p class=" text-sm text-left">OR Number: <span class="font-bold">{{ $certificateRequest?->or_number ?? null }}</span></p>
                <p class=" text-sm text-left">Date Issued: <span class="font-bold">{{ \Carbon\Carbon::parse($certificateRequest?->requested_at)->format('F j, Y') }}</span></p>
                <p class=" text-sm text-left">Doc. Stamp: <span class="font-bold">{{ $certificateRequest?->status === 'Released' ? 'Paid' : 'Pending' }}</span></p>
            </div>
        </div>
    </div>
</body>
</html>