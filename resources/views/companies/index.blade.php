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
                        @include('alert_message')
                    </div>
                </div>
                <div class="d-flex justify-content-between row">
                    {{-- Add Company--}}
                    <div class="bg-gray-200 bg-opacity-25 col-4 border-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="">Add Company</a></div>
                        </div>
                        <div class="container mt-4">
                            <form method="post" action="{{route('add_comp')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline mb-2 d-flex col-10">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Company Name">
                                </div>
                                <div class="form-outline mb-2 d-flex col-10 border-gray-700 border-1 ml-3 w-79">
                                    <label class="form-label fs-16 text-muted  col-4 p-0" for="logo">Upload Logo</label>
                                    <input type="file" class="form-control-lg p-1" id="logo"  name="logo" accept="image/png, image/jpeg"/>
                                </div>
                                <div class="form-outline mb-2 col-10">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="E-Mail">
                                </div>
                                <div class="form-outline mb-2 col-10">
                                    <input type="text" id="website" name="website" class="form-control" placeholder="Company Website">
                                </div>
                                <button type="submit" class="btn col-3 btn-gray-dark bg-dark m-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                    {{--Show Data--}}
                    <div class="bg-gray-200 bg-opacity-25 col-8 border-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">All Companies</div>
                            </div>
                            <div class="container mt-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="bg-gray-200">
                                            <td><div align="center"><strong>#</strong></div></td>
                                            <td><div align="center"><strong>Company Name</strong></div></td>
                                            <td><div align="center"><strong>Company Logo</strong></div></td>
                                            <td><div align="center"><strong>E-Mail</strong></div></td>
                                            <td><div align="center"><strong>Website</strong></div></td>
                                            <td><div align="center"><strong>Created At</strong></div></td>
                                            <td><div align="center"><strong>Action</strong></div></td>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach($data as $key => $value)
                                            <tr>
                                                <td>{{$key+$data->firstItem()}}</td>
                                                <td>{{$value->name}}</td>
                                                <td><img src="{{asset($value->logo)}}" class="img-card"></td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->website}}</td>
                                                <td>{{Carbon\carbon::parse($value->created_at)->diffForHumans()}}</td>
                                                <td><a class="mr-2" href={{"edit_company/".$value->comp_id}}><span class="btn btn-primary">Edit</span></a><a  href={{"company/delete/".$value->comp_id}}><span class="btn btn-danger">Delete</span></a></td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$data->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>