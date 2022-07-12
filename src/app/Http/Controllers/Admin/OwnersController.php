<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\SUpport\Facades\Hash;

class OwnersController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $date_now = Carbon::now()->year();
        $date_parse = Carbon::parse();
        echo $date_now;
        echo $date_parse; */

        /* $e_all = Owner::all();

        $db_all = DB::table("owners")->select("name", "created_at")->get(); */
        /* $db_first = DB::table("owners")->select("name")->first();

        $c_test = collect([
            "name" => "テスト"
        ]);

        var_dump($db_first);

        dd($e_all, $db_all, $db_first, $c_test); */

        $owners = Owner::select("name", "email", "created_at")->get();

        return view("admin.owners.index", compact("owners"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|string|max:255|email|unique:owners",
            "password" => "required|string|confirmed|min:8"
        ]);

        Owner::create([
            'name' => $request->name,
            "email" => $request->email,
            "password" => $request->password
        ]);



        return redirect()
            ->route("admin.owners.index")
            ->with("message", "Owner create successfully!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
