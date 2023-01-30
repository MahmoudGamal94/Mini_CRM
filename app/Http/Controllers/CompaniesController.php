<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\Companies;
use Intervention\Image\Facades\Image;

class CompaniesController extends Controller
{
    public function index()
    {
        $data=Companies::paginate(5);
        return view('companies.index',compact('data'));

    }
    public function edit($id)
    {
        $data=Companies::find($id);
        return view('companies.edit', compact(['data']));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email'=>'email',
            'website' => 'string',
            'logo' => 'max:10000|image|mimes:png,jpg,jpeg',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }


        if($request->file('logo')){
            $logo = $request->file('logo');
            $file_name=time().'.'.$logo->extension();
            $image_destination=public_path('images/companies_logo');
            if (!file_exists($image_destination)) {
                mkdir($image_destination, 666, true);
            }
            $image= Image::make($logo->path());
            $image->resize(100,100,function ($constraint){
                $constraint->aspectRatio();
            })->save($image_destination.'/'.$file_name);
            $logo_path='images/companies_logo/'.$file_name;

        }else{
            $logo_path='';
        }

        try {
            $company = Companies::create([
                'name' => $request->name,
                'logo' => $logo_path,
                'website' => $request->website,
                'email' => $request->email
            ]);
        } catch (QueryException $e) {
            $message = "Company failed to be created!";
            return back()->with('error',$message);
        }
        if ($company) {
            $message = "company created successfully!";
            return back()->with('success', $message);
        }

    }

    public function show($id)
    {
        $company = Companies::findOrFail($id);
        if ($company) {
            return view('companies', compact('company'));
        }
    }


    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'email',
            'website' => 'string',
            'logo' => 'max:10000|image|mimes:png,jpg,jpeg',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors());
        }
        if($request->file('logo')){
            $old_logo=Companies::find($id);
            unlink(public_path($old_logo->logo));
            $logo = $request->file('logo');
            $file_name=time().'.'.$logo->extension();
            $image_destination=public_path('images/companies_logo');
            $image= Image::make($logo->path());
            $image->resize(100,100,function ($constraint){
                $constraint->aspectRatio();
            })->save($image_destination.'/'.$file_name);
            $logo_path='images/companies_logo/'.$file_name;
            Companies::findorfail($id)->update(['logo' => $logo_path]);
        }
        try{
            $company = Companies::findorfail($id)->update($request->except('logo'));
            $message = "Company Updated Successfully!";
            return redirect()->route('company')->with('success',$message);
        }catch (QueryException $e){
            $message = "Company failed to be Updated!";
            return back()->with('error',$message);
        }
    }

    public function destroy($id)
    {
        try{
            $old_logo=Companies::find($id);
//            unlink(public_path($old_logo->logo));
            Companies::findorfail($id)->delete();
            $message="Company deleted successfully";
            return back()->with('success', $message);
        }
        catch (QueryException $e){
            $message="Company assigned to employees, edit or delete employees of the company first";
            return back()->with('error',$message);
        }

    }

}
