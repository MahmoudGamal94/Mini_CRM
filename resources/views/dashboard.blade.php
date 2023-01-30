<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        {{--<x-jet-application-logo class="block h-12 w-auto" />--}}
                    </div>
                    <div class="mt-8 text-2xl">
                        Hi, <b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b>  Welcome to your Admin Panel!
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25 d-flex justify-content-between row">
                    <div class="p-4 col-6 border-2">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('employee')}}">Employees Data</a></div>
                        </div>
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
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach($employees as $key => $employee)
                                    <tr>
                                        <td>{{$key+$employees->firstItem()}}</td>
                                        <td>{{$employee->first_name}}</td>
                                        <td>{{$employee->last_name}}</td>
                                        <td>{{$employee->get_comp_name->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>{{Carbon\carbon::parse($employee->created_at)->diffForHumans()}}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            {{$employees->links()}}
                        </div>
                    </div>
                    <div class="p-4 col-6 border-2">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{route('company')}}">Companies Data</a></div>
                        </div>
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
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach($companies as $key => $company)
                                    <tr>
                                        <td>{{$key+$companies->firstItem()}}</td>
                                        <td>{{$company->name}}</td>
                                        <td><img src="{{asset($company->logo)}}" class="img-card"></td>
                                        <td>{{$company->email}}</td>
                                        <td>{{$company->website}}</td>
                                        <td>{{Carbon\carbon::parse($company->created_at)->diffForHumans()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$companies->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>

