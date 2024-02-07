<?php

namespace App\Http\Controllers\Bureau;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bureau\BureauRequest;
use App\Models\Bureau;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bureau.index', ['bureaux' => Bureau::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bureau.form', [
            'bureau' => new Bureau()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BureauRequest $request)
    {
        Bureau::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Bureau $bureau)
    {
        return $bureau;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bureau $bureau)
    {
        //
        return view('admin.bureau.form', [
            'bureau' => $bureau
        ]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BureauRequest $request, Bureau $bureau)
    {
        $bureau->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bureau $bureau)
    {
        //
        $bureau->delete();
    }
}
