@extends('employee.layouts.sidebar')
@section('username')
{{$user->name}}
@endsection

@section('content')

<div class="h-full ml-14 mt-14 mb-5 md:ml-64">
    <div class="flex items-center justify-between mt-5 ml-2">
        <h1 class="text-2xl flex-grow">App Settings</h1>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 p-4 gap-4">
                <!-- Sidebar -->
                <div class="col-span-1 bg-white shadow-lg rounded-md flex flex-col items-start p-3">
                    <div class="flex flex-col w-full">
                        <div class="flex flex-col items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="48" height="48">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <!-- <a href="#" class="m-2 text-black" onclick="showContent('general'); return false;">General</a> -->
                        <a href="#" class="m-2 text-black" onclick="showContent('update'); return false;">Update</a>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-span-3 bg-white shadow-lg rounded-md flex flex-col p-3">
                    <div id="bigBoxContent" class="w-full flex-grow flex flex-col">
                        <div id="general" class="content-section hidden">
                            <!-- Content for General -->
                            <div class="flex flex-col md:flex-row p-4">
                                <!-- Left Side: Labels -->
                                <div class="md:w-1/2 bg-white shadow-md rounded-md p-4">
                                    <h2 class="text-xl font-semibold mb-4">Company Details</h2>
                                    <div class="space-y-2">
                                        <p class="font-medium">Company Name:</p>
                                        <p class="font-medium">Company Logo:</p>
                                        <p class="font-medium">Company Icon:</p>
                                        <p class="font-medium">Company Banner:</p>
                                        <p class="font-medium">Language:</p>
                                        <p class="font-medium">Address Details:</p>
                                        <p class="font-medium">Country:</p>
                                        <p class="font-medium">Area:</p>
                                        <p class="font-medium">City:</p>
                                        <p class="font-medium">State:</p>
                                        <p class="font-medium">Zip Code:</p>
                                        <p class="font-medium">Address:</p>
                                        <p class="font-medium">Date Format:</p>
                                        <p class="font-medium">Time Format:</p>
                                        <p class="font-medium">Currency Setting:</p>
                                        <p class="font-medium">Currency Symbol:</p>
                                    </div>
                                </div>

                                <!-- Right Side: Corresponding Values -->
                                <div class="md:w-1/2 bg-white shadow-md rounded-md p-4 ml-0 md:ml-4">
                                    <h2 class="text-xl font-semibold mb-4">Details</h2>
                                    <div class="space-y-2" id="general-details">
                                        <p id="company-name" class="text-gray-600">[Company Name]</p>
                                    
                                        <p id="company-icon" class="text-gray-600">[Company Icon]</p>
                                        <p id="company-banner" class="text-gray-600">[Company Banner]</p>
                                        <p id="language" class="text-gray-600">[Language]</p>
                                        <p id="address-details" class="text-gray-600">[Address Details]</p>
                                        <p id="country" class="text-gray-600">[Country]</p>
                                        <p id="area" class="text-gray-600">[Area]</p>
                                        <p id="city" class="text-gray-600">[City]</p>
                                        <p id="state" class="text-gray-600">[State]</p>
                                        <p id="zip-code" class="text-gray-600">[Zip Code]</p>
                                        <p id="address" class="text-gray-600">[Address]</p>
                                        <p id="date-format" class="text-gray-600">[Date Format]</p>
                                        <p id="time-format" class="text-gray-600">[Time Format]</p>
                                        <p id="currency-setting" class="text-gray-600">[Currency Setting]</p>
                                        <p id="currency-symbol" class="text-gray-600">[Currency Symbol]</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <div class="text-red-500">
                                <ul>
                                    @foreach ($errors->get('password') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->has('confirm_password'))
                            <div class="text-red-500">
                                <ul>
                                    @foreach ($errors->get('confirm_password') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Update Content Section -->
                        <div id="update" class="content-section">
                            <div class="flex flex-col md:flex-row p-4">
                            <form class="form-control" method="POST" action="{{ route('emp_change_details') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Left Side: Labels for Inputs -->
                                <div class="md:w-1/2 bg-white shadow-md rounded-md p-4">
                                    <h2 class="text-xl font-semibold mb-4">Update User Details</h2>
                                    <div class="space-y-2">

                                        <div class="mb-4 flex flex-col items-center">
                                            <img id="profilePreview" src="{{ asset('profiles/' . Auth::user()->profile_img) ?? 'default-profile.png' }}" 
                                                 alt="Profile Image" class="w-20 h-20 rounded-full object-cover mb-2 border">
                                            <input type="file" name="profile_image" accept="image/*" 
                                                   onchange="previewProfileImage(event)" class="border p-2 w-full">
                                        </div>

                                        <p class="font-medium">My Name:</p>
                                        <input type="text" name="name" value="{{Auth::user()->name}}" id="edit-company-name" class="border p-2 w-full">
                                        
                                        <p class="font-medium">Email:</p>
                                        <input type="email" name="email" value="{{Auth::user()->email}}" id="edit-company-logo" class="border p-2 w-full">
                                        
                                        <p class="font-medium">Password:</p>
                                        <input type="password" name="password" id="edit-company-icon" class="border p-2 w-full">
                                        
                                        <p class="font-medium">Confirm Password:</p>
                                        <input type="password" name="confirm_password" id="edit-company-icon" class="border p-2 w-full">
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="md:w-1/2 ml-0 md:ml-4">
                                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save Changes</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show content based on section ID
    function showContent(contentId) {
        // Hide all sections
        document.querySelectorAll('.content-section').forEach(function(section) {
            section.classList.add('hidden');
        });

        // Show the clicked section
        document.getElementById(contentId).classList.remove('hidden');
    }

    // Dummy save function for demonstration
    function saveChanges() {
        // Here, you'd send the form data via AJAX or submit the form
        alert("Changes saved!");
    }
</script>


@endsection