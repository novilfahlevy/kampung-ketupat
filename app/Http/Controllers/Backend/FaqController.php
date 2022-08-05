<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use App\Traits\Action;
use Exception;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    use Action;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faqs = Faq::query();

        if ($request->query->has('keyword')) {
            $faqs->keyword($request->query->get('keyword'));
        }

        $faqs = $faqs->paginate(10);

        return view('backend.pages.faq.index', compact('faqs'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        try {
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->answer = $request->answer;

            $faq->save();

            $this->logAction('Menambah pertanyaan "'.$request->question.'"');

            return redirect()->route('admin.faq.index')->with('response', ['status' => 200, 'message' => 'Berhasil menambah pertanyaan']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->route('admin.faq.index')->with('response', ['status' => $error->getCode(), 'message' => 'Gagal menambah pertanyaan, silakan coba lagi']);
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
        $faq = Faq::findOrFail($id);
        return view('backend.pages.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, $id)
    {
        try {
            $faq = Faq::findOrFail($id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;

            $faq->save();

            $this->logAction('Mengedit pertanyaan "'.$request->question.'"');

            return redirect()->back()->with('response', ['status' => 200, 'message' => 'Berhasil mengedit pertanyaan']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return redirect()->back()->with('response', ['status' => $error->getCode(), 'message' => 'Gagal mengedit pertanyaan, silakan coba lagi']);
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
            $faq = Faq::find($id);
            $this->logAction('Menghapus pertanyaan "'.$faq->question.'"');
            $faq->delete();

            return back()->with('response', ['status' => 200, 'message' => 'Berhasil menghapus pertanyaan']);
        } catch (Exception $error) {
            app('sentry')->captureException($error);
            return back()->with('response', ['status' => $error->getCode(), 'message' => 'Gagal menghapus pertanyaan, silakan coba lagi']);
        }
    }
}
