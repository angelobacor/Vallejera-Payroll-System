<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
</x-app-layout>

    <a class="btn btn-secondary" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('LOGOUT') }}
    </a>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Leave Request") }}
                    <form action="{{route('admin.home')}}" method="Get" enctype="multipart/form-data">
                        @csrf
                        <button type="submit">*Back</button>
                    </form>
                </div>
                <form action="{{route('adminleaver')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-5">
                        <div class="col">
                        <input required type="date" class="form-control" name="date" placeholder="Date When">
                        </div>
                        <div class="col">
                            <select required class="form-control" name="type">
                                <option value="">-- Leave Type -- </option>
                                <option>Paid Casual</option>
                                <option>Unpaid Casual</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                        <input required type="text" name='activity' class="form-control" placeholder="Activity">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg mt-5">Submit</button>
                    </div>
                </form>
        </div>
    </div>

