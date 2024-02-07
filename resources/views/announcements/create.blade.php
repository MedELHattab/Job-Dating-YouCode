
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Announcements') }}
        </h2>
    </x-slot>

    
    <div class="py-12 lg:px-10">

        @if ($errors->any())

            <div id="alert-2"
                class="lg:m-10   flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <form class="max-w-sm mx-auto" action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="username-success"
                    class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Title</label>
                <input type="text" name="title"
                    class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400"
                    placeholder="name">

            </div>
            <div>
                <label for="description"
                    class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Description</label>
                <input type="text" name="description"
                    class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400"
                    placeholder="Description">

            </div>
            <div>

                <div class="mb-5">
                    <label for="company_id"
                        class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-500">Select Company</label>
                    <select name="company_id"
                        class="bg-blue-50 border border-blue-500 text-blue-900 placeholder-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-blue-400">
                        <!-- Populate the options dynamically based on your companies data -->
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="skill_id"
                        class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-500">Select Skills</label>
                    <select name="skill_ids[]" multiple="multiple"
                        class="js-example-basic-multiple bg-blue-50 border border-blue-500 text-blue-900 placeholder-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-blue-400 ">
                        <!-- Populate the options dynamically based on your companies data -->
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->skill }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="image" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Image</label>
                    <input type="file" name="image" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400" placeholder="image">
                    
                  </div>
                  <div class="py-3">
                <button type="submit"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
