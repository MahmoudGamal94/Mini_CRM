<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-2 text-2xl">
                        Hi, <b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b>  Welcome to your Admin Panel!
                    </div>
                </div>
                <div class="bg-gray-200 bg-opacity-25 border-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="">Edit Company</a></div>
                        </div>
                        <div class="container mt-4">
                            @include('alert_message')
                            <form method="post" action="{{'/company/update/'.$data->comp_id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline mb-2 d-flex col-8">
                                    <input type="text" id="name" name="name" class="form-control" value="{{$data->name}}" >
                                </div>
                                <div class="form-outline mb-2 d-flex col-8 align-items-center">
                                    <img src="{{asset($data->logo)}}">
                                    <input type="file" class="form-control-lg ml-4 border-3 p-2" id="logo"  name="logo" accept="image/png, image/jpeg"/>
                                </div>
                                <div class="form-outline mb-2 col-8">
                                    <input type="text" id="email" name="email" class="form-control" value="{{$data->email}}">
                                </div>
                                <div class="form-outline mb-2 col-8">
                                    <input type="text" id="website" name="phone" class="form-control" value="{{$data->website}}">
                                </div>
                                <button type="submit" class="btn btn-gray-dark bg-dark ml-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>