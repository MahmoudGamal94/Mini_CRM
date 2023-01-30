<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
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
                    {{-- Add Employee--}}
                    <div class="bg-gray-200 bg-opacity-25 col-4 border-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Add Employee</div>
                            </div>
                            <div class="container mt-4">
                                <form method="post" action="{{route('add_emp')}}">
                                    @csrf

                                    <div class="form-outline mb-2 d-flex col-8">
                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name">
                                    </div>
                                    <div class="form-outline mb-2 d-flex col-8">
                                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name">
                                    </div>
                                    <div class="form-outline mb-2 col-8 fs-6">
                                        <select class="select2 form-control" name="company">
                                            <option></option>
                                            @foreach($companies as $key=>$company)
                                                <option value="{{$key}}" >{{$company}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-outline mb-2 col-8">
                                        <input type="text" id="email" name="email" class="form-control" placeholder="E-Mail">
                                    </div>
                                    <div class="form-outline mb-2 col-8">
                                        <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                    <button type="submit" class="btn btn-gray-dark bg-dark ml-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{--Show Data--}}
                    <div class="bg-gray-200 bg-opacity-25 col-8 border-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">All Employees</div>
                            </div>
                            <div class="container mt-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="bg-gray-200">
                                            <td><div align="center"><strong>#</strong></div></td>
                                            <td><div align="center"><strong>First Name</strong></div></td>
                                            <td><div align="center"><strong>Last Name</strong></div></td>
                                            <td><div align="center"><strong>Company</strong></div></td>
                                            <td><div align="center"><strong>E-Mail</strong></div></td>
                                            <td><div align="center"><strong>Phone</strong></div></td>
                                            <td><div align="center"><strong>Created At</strong></div></td>
                                            <td><div align="center"><strong>Action</strong></div></td>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach($data as $key => $value)
                                            <tr>
                                                <td>{{$key+$data->firstItem()}}</td>
                                                <td>{{$value->first_name}}</td>
                                                <td>{{$value->last_name}}</td>
                                                <td>{{$value->get_comp_name->name}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->phone}}</td>
                                                <td>{{Carbon\carbon::parse($value->created_at)->diffForHumans()}}</td>
                                                <td><a class="mr-2" href={{"edit_employee/".$value->emp_id}}><span class="btn btn-primary">Edit</span></a><a  href={{"/employee/delete/".$value->emp_id}}><span class="btn btn-danger">Delete</span></a></td>
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