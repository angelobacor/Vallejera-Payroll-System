@extends('admin.layouts.sidebar')

@section('username')
{{$user->name}}
@endsection@section('content')

@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">Social Links</h1>
    </div>
    <div class="border-t border-gray-300 w-full mt-4 mb-47"></div>
    
    <div class="overflow-x-auto mt-6 ml-5 mr-5">
        <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                </svg>
                            </div>
                            Facebook
                        </div>
                    </td>
                    <td class="text-gray-300">Not added yet</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-between">
                            <input type="text" class="hidden social-input px-2 py-1 border border-gray-300 rounded-md" placeholder="Enter link" />
                            <button onclick="SocialLinks(this)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                Add
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                </svg>
                            </div>
                            Twitter
                        </div>
                    </td>
                    <td class="text-gray-300">Not added yet</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-between">
                            <input type="text" class="hidden social-input px-2 py-1 border border-gray-300 rounded-md" placeholder="Enter link" />
                            <button onclick="SocialLinks(this)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                Add
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                </svg>
                            </div>
                            Instagram
                        </div>
                    </td>
                    <td class="text-gray-300">Not added yet</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-between">
                            <input type="text" class="hidden social-input px-2 py-1 border border-gray-300 rounded-md" placeholder="Enter link" />
                            <button onclick="SocialLinks(this)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                Add
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                </svg>
                            </div>
                            LinkedIn
                        </div>
                    </td>
                    <td class="text-gray-300">Not added yet</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center justify-between">
                            <input type="text" class="hidden social-input px-2 py-1 border border-gray-300 rounded-md" placeholder="Enter link" />
                            <button onclick="SocialLinks(this)" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">
                                Add
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection
