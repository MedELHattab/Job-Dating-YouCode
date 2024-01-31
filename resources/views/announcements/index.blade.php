<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Announcements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('announcements.create') }}"> Create New Announcement</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
   
<div class="relative overflow-x-auto lg:px-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    company
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                 <td class="px-6 py-4">
                    {{ $announcement->id }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $announcement->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $announcement->description }}
                </td>
               
                <td class="px-6 py-4">
                    {{ $announcement->company_id }}

                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('announcements.edit', $announcement) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('announcements.destroy', $announcement) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </form>
             </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</x-app-layout>
