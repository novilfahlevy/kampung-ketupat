<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Traits\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    use Action;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->query->has('keyword')) {
            $users->keyword($request->query->get('keyword'));
        }

        $users = $users->paginate(10);

        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();
            
            $this->logAction('Membuat pengguna "'.$request->name.'"');

            return redirect()->route('admin.pengguna.index')->with('response', ['status' => 200, 'message' => 'Berhasil membuat pengguna']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->route('admin.pengguna.index')->with('response', ['status' => $error->getCode(), 'message' => 'Gagal membuat pengguna, silakan coba lagi']);
        }
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
    public function edit()
    {
        $user = auth()->user();
        return view('backend.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->back()->with('response', ['status' => 200, 'message' => 'Berhasil mengedit profil']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', ['status' => $error->getCode(), 'message' => 'Gagal mengedit profil, silakan coba lagi']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $this->logAction('Menghapus pengguna "'.$user->name.'"');
            $user->delete();

            return back()->with('response', ['status' => 200, 'message' => 'Berhasil menghapus pengguna']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return back()->with('response', ['status' => $error->getCode(), 'message' => 'Gagal menghapus pengguna, silakan coba lagi']);
        }
    }
}
