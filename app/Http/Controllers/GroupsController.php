<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\WorkGroup;

class GroupsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = WorkGroup::all();
		return view('groups.index', compact('groups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$form = \FormBuilder::create('App\Forms\GroupForm', [
				'method' => 'POST',
				'url' => route('groups.store')
		]);

		return view('groups.create', compact('form'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Request::all();
		$group = WorkGroup::create($data);
		return redirect()->route('groups.show', $group->permalink);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($permalink)
	{
		return redirect()->route('groups.users.index', [$permalink]);
		// $group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		// return view('groups.show', compact('group'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($permalink)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$form =\FormBuilder::create('App\Forms\GroupForm', [
				'method' => 'POST',
				'url' => route('groups.store'),
				'model' => $group,
		])
            ->remove('Create')
            ->add('Update', 'submit', [
                'attr' => ['class' => 'btn btn-primary']
            ]);
        $deleteForm = $formBuilder->create('App\Forms\DeleteForm', [
            'method' => 'DELETE',
            'url' => route('groups.destroy',$course->permalink),
        ]);
		return view('groups.edit', compact('group', 'form', 'deleteForm'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($permalink)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$data = Request::all();
		$group->update($data);
		return redirect()->route('groups.show', $group->permalink);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($permalink)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$group->delete();
		return redirect()->route('groups.index', $group->permalink);
	}

}
