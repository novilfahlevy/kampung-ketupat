<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingRequest;
use App\Models\Setting;
use App\Traits\Action;
use App\Traits\Upload;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    use Action, Upload;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first()->setting;
        return view('backend.pages.settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        DB::beginTransaction();
        try {
            Setting::where('key', 'location')->update(['value' => $request->location]);
            Setting::where('key', 'about')->update(['value' => $request->about]);
            Setting::where('key', 'address')->update(['value' => $request->address]);
            Setting::where('key', 'email')->update(['value' => $request->email]);
            Setting::where('key', 'phone')->update(['value' => $request->phone]);
            Setting::where('key', 'facebook')->update(['value' => $request->facebook]);
            Setting::where('key', 'instagram')->update(['value' => $request->instagram]);
            Setting::where('key', 'twitter')->update(['value' => $request->twitter]);
            Setting::where('key', 'youtube')->update(['value' => $request->youtube]);

            $headerBackground = $request->header_background_base64;
            $oldHeaderBackground = Setting::where('key', 'header_background_url')->first();
            if ($headerBackground && $oldHeaderBackground) {
                $filename = $this->resizeAndSave($headerBackground, 1920, 1080, $oldHeaderBackground->header_background_url);
                if ($filename) {
                    Setting::where('key', 'header_background_url')->update(['value' => $filename]);
                }
            }

            $this->logAction('Mengedit pengaturan');

            DB::commit();
            
            return redirect()->back()->with('response', [
                'status' => 200,
                'message' => 'Berhasil mengedit pengaturan'
            ]);
        } catch (Exception $error) {
            DB::rollBack();
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', [
                'status' => $error->getCode(),
                'message' => 'Gagal mengedit pengaturan, silakan coba lagi'
            ]);
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
