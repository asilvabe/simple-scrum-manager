<?php

namespace App\Http\Controllers;


use App\Actions\Developers\StoreOrUpdateTeam;
use App\Http\Requests\Developers\StoreRequest;
use App\Models\Developer;
use App\ViewModels\Developer\CreateViewModel;
use App\ViewModels\Developer\IndexViewModel;
use App\ViewModels\Developer\ShowViewModel;

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

    public function create(): View
    {
        return view('developers.create', (new CreateViewModel())->toArray());
    }

    public function store(StoreRequest $request)
    {
        $team = StoreOrUpdateTeam::execute($request->validated());

        return redirect()->route('developers.show', $team)
            ->withSuccess(trans('developers.messages.created'));
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
