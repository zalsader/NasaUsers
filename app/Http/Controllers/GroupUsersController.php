<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\WorkGroup;
use App\User;
use App\Role;

class GroupUsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($permalink)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$users = $group->users;
		return view('groups.users.index', compact('group', 'users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($permalink)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$form =\FormBuilder::create('App\Forms\GroupUserForm', [
				'method' => 'POST',
				'url' => route('groups.users.store', [$permalink])
		]);

		return view('groups.users.create', compact('form', 'group'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($permalink)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$data = Request::all();
		$user = User::create($data);
		$role = Role::whereName('volunteer')->first();
		$user->attachRole($role);
		$group->users()->attach($user);
		return redirect()->route('groups.users.index',[$permalink]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($permalink, $id)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$user = $group->users()->findOrFail($id);
		return view('groups.users.show', [$group, $user]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($permalink, $id)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$user = $group->users()->findOrFail($id);
		$form =\FormBuilder::create('App\Forms\GroupUserForm', [
				'method' => 'POST',
				'url' => route('groups.users.store'),
				'model' => $user,
		])
						->remove('Create')
						->add('Update', 'submit', [
								'attr' => ['class' => 'btn btn-primary']
						]);
				$deleteForm = $formBuilder->create('App\Forms\DeleteForm', [
						'method' => 'DELETE',
						'url' => route('groups.users.destroy', [$permalink, $id]),
				]);
		return view('groups.users.edit', compact('group', 'form', 'deleteForm'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($permalink, $id)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$user = $group->users()->findOrFail($id);
		return redirect()->route('groups.users.index',[$permalink]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($permalink, $id)
	{
		$group = WorkGroup::wherePermalink($permalink)->firstOrFail();
		$user = $group->users()->findOrFail($id);
		$user->delete();
		return redirect()->route('groups.users.index',[$permalink]);
	}

}
