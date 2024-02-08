<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Announcement Details</title>
</head>



<body class="bg-gray-100">

    <div class="py-12">
        @if(session('success'))
    
    <div id="alert-3" class=" lg:m-10 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
          {{ session('success') }}
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    @endif

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Announcement Details</h1>

        <div class="bg-white p-8 rounded shadow-md flex">
            <!-- Image Section -->
            <div class="w-1/3">
                <img src="{{ asset('uploads/announcements/' . $announcement->image) }}" alt="Announcement Image"
                    class="w-full h-auto rounded-md">
            </div>

            <!-- Announcement Details Section -->
            <!-- Make sure to include the FontAwesome CSS in your HTML -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

            <div class="w-2/3 pl-8">
                <h2 class="text-2xl font-bold mb-2">{{ $announcement->title }}</h2>
                <p class="text-gray-600 mb-4">Description: {{ $announcement->description }}</p>

                <!-- Company Details -->
                <p class="text-lg font-bold text-gray-700 mb-2">Company Details</p>
                <p class="text-sm text-gray-500">
                    <i class="fas fa-building mr-2"></i> Name: {{ $announcement->company->name }}
                </p>
                <p class="text-sm text-gray-500">
                    <i class="fas fa-map-marker-alt mr-2"></i> Location: {{ $announcement->company->location }}
                </p>

                <!-- Skills -->
                <p class="text-lg font-bold text-gray-700 mt-5 mb-2">Skills</p>
                <p class="text-sm text-gray-500">
                    <i class="fas fa-cogs mr-2"></i> Skills:
                    {{ implode(', ', $announcement->skills->pluck('skill')->toArray()) }}
                </p>
                <div class="pt-10">
                    <form action="{{ route('announcements.apply', ['announcement' => $announcement->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Apply Now</button>
                </form>
                </div>
                
            </div>


        </div>
    </div>

</body>

</html>
