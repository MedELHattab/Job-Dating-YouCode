<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Announcements') }}
        </h2>
    </x-slot>

    <div class="py-12 lg:px-10">
        
        <form class="max-w-sm mx-auto" action="{{ route('announcements.update', $announcement) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Name</label>
                <input type="text" name="title" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" value="{{ old("title", $announcement->title) }}">
            </div>
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Description</label>
                <input type="text" name="description" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400" value="{{ old("description", $announcement->description) }}">
            </div>
            <div class="mb-5">
                <label for="company_id" class="block mb-2 text-sm font-medium text-blue-700 dark:text-blue-500">Select Company</label>
                <select name="company_id" class="bg-blue-50 border border-blue-500 text-blue-900 placeholder-blue-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-blue-100 dark:border-blue-400">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $announcement->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary lg:px-10">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
