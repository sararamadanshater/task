<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorRequest;
use App\Models\Supervisor;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login(Request $request)
    {
       
         if ($request->method() == 'POST') {
            $credentials = $request->only('email', 'password');

            if (auth('admin')->attempt($credentials)) {
                
                return redirect()->intended('admin');
            }
           return redirect()->back()->with('danger', 'email or password is incorrect');
        } else {
            return view('admin.login');
        }
    }

    public function index(){
        $supervisors=Supervisor::all();
       
        return view('admin.home',compact('supervisors'));
    }


    public function create(){
       
        return view('admin.create');
    }


    public function store(SupervisorRequest $request){
        
        $next_id = DB::select("SHOW TABLE STATUS LIKE 'supervisors'");
        $next_id = $next_id[0]->Auto_increment;
        $imageName = Upload::uploadImage($request->file('avatar'), 'supervisor/' . $next_id);
        DB::table('supervisors')->insert([
            'username' => $request->get('username'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'avatar' => $imageName,
            'password' => $request->get('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->back()->with('success', 'Supervisor Added Successfully');

    }
    public function show($id){
        $supervisor=Supervisor::findOrFail($id);
        return view('admin.show',compact('supervisor'));
        
    }
    public function edit($id){
        $supervisor=Supervisor::findOrFail($id);
        return view('admin.edit',compact('supervisor'));

       
        
    }
    public function update(SupervisorRequest $request ,$id){
        // $supervisor = Supervisor::findOrFail($id);
        // $supervisor->username = $request->get('username');
        // $supervisor->phone = $request->get('phone');
        // $supervisor->email = $request->get('email');
        // $supervisor->password = $request->get('password');
       
        // if ($request->file('avatar')) {
        //     $supervisor->avatar = Upload::uploadImage($request->file('avatar'),
        //         'supervisor/' . $supervisor->id, $supervisor['avatar']);
        // }
        // $supervisor->save();

        $supervisor=Supervisor::findOrFail($id);
        // if(!$offer){
        //    return redirect()->back()->with(['fail'=>'offer not exsist']);
        // }
        $photo_name=  Upload::uploadImage($request->file('avatar'),
                'supervisor/' . $supervisor->id, $supervisor['avatar']);
        // $offer->update($request->all());
        $supervisor->update([
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'avatar'=> $photo_name,
            'password'=>$request->password,
            

        ]);
        return redirect()->back()->with('success','supervisor Updated Successfully');

    }
    public function destroy($id){
        $supervisor=Supervisor::findOrFail($id);
        $supervisor->delete();
        return redirect()->back()->with('success', 'supervisor Deleted Successfully');
       
        
    }

    public function deleteAll(Request $request)

    {

        $ids = $request->ids;
        dd($ids);

        DB::table("supervisors")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"supervisors Deleted successfully."]);

    }
}
