<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use DB;
use Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('users as u')
        ->join('role_user as r','r.user_id','=','u.id')
        ->join('roles as ro','r.role_id','=','ro.id')
        ->select('u.id','u.name','u.email','ro.name as nom')
        ->orderBy('u.id','ASC')->paginate(5);
        return view('users.index',compact('data'));

    }
     public function indexPerfil(Request $request)
    {
        $user = Auth::user();
        //dd($user->fondo);
        $rol= DB::select("select roles.name as nom from users, role_user, roles where role_user.role_id=roles.id and users.id=role_user.user_id and users.id =".$user->id);

        
        return view('users.perfil',compact('user','rol'));

    }

    public function editPerfil(Request $request)
    {
        $user = Auth::user();
        
        $rol= DB::select("select roles.name as nom from users, role_user, roles where role_user.role_id=roles.id and users.id=role_user.user_id and users.id =".$user->id);
        return view('users.editperfil',compact('user','rol'));

    }
    public function updatePerfil(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:confirm-password',
            'foto' => 'mimes:jpeg,bmp,png,PNG,jpg',
            
        ]);

      /**  $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }**/
       // dd($input['foto']);
        $user->id=$user ->id;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->fondo=$user->fondo;
        $user->password=Hash::make($request->input('password')); 

        if($request->hasFile('foto'))
          {

           $filename= time().'_'.$request->foto->getClientOriginalName(); 
           $request->foto->storeAs('public/perfil',$filename);
           $user->foto =$filename;
          }
          
               
            
        
        $user->save();
        

        return redirect()->route('users.perfil')
            ->with('success','Perfil actualizado exitosamente');
    }

    public function updateFondo(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            
            'fondo'=>'required',
            
        ]);

      /**  $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }**/
       // dd($input['foto']);
        $user->id=$user ->id;
        $user->name=$user ->name;
        $user->email=$user ->email;
        $user->fondo=$request->input('fondo');
        $user->password=$user ->password; 
        $user->foto=$user ->foto;
        $user->save();
        return redirect()->route('users.perfil')
            ->with('success','Fondo actualizado exitosamente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        
        $user =new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password')); 
        $user->foto='default.jpg';
        $user->fondo='skin-blue';
        $user->save();
/**
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);**/
        foreach ($request->input('roles') as $key => $value) {
            DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $value,
        ]);
        }

        

        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRol= DB::select("select role_id from role_user where user_id =".$id);
        $userRole= $userRol[0]->role_id;
       // $userRole = $user->roles->pluck('id','id')->toArray();
       //dd($userRole[0]->role_id);
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        //dd($user);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();


        foreach ($request->input('roles') as $key => $value) {
            DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $value,
        ]);
        }

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }
}