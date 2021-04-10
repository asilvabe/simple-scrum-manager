<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\ViewModels\Developer\IndexViewModel;
use App\ViewModels\Developer\ShowViewModel;
use App\ViewModels\ViewModel;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{

    public function index(): View
    {
        $viewModel = new IndexViewModel();
        return view('developers.index', $viewModel->toArray());
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
    public function store(Request $request)
    {
        //
    }

    public function show(Developer $developer): View
    {
        $viewModel= new ShowViewModel($developer);
        return view('developers.show', $viewModel->toArray());
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

    public function destroy(Developer $developer)
    {
        try {
            $developer->delete();
        } catch (Exception $e) {
            return redirect()->route('developers.show', $developer)
                ->withError(trans('developers.messages.cannot_delete'));
        }

        return redirect()->route('developers.index')
            ->withSuccess(trans('developers.messages.deleted'));
    }
}
