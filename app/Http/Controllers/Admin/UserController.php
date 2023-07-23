<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DataTables;


class UserController extends Controller
{
  protected $user;
  public function __construct(User $user)
  {
    $this->user = $user;
  }
  public function index()
  {
    return view('admin.users.index');
  }

  public function create()
  {
    return view('admin.users.add');
  }


  public function getUsersDatatable()
  {
    $data = User::select('*');

    return   Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        if (auth()->user()->can('user delete')) {

          $btn = '
                  <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>
                  <a href="' . route('admin.users.show', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                  ';
          return $btn;
        }
      })
      ->addColumn('status', function ($row) {
        return $row->status == null ? __('words.not activated') : __('words.' . $row->status);
      })
      ->rawColumns(['action', 'status'])
      ->make(true);
  }

  public function store(Request $request)
  {
    $data = [
      'name' => 'required|string',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ];
    $validatedData = $request->validate($data);
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),
    ]);
    return redirect()->route('admin.users.index');
  }


  public function edit(User $user)
  {
    return view('admin.users.role', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    if ($request->password !== null) {
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);
    } else {
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);
    }
    return redirect()->route('admin.users.index');
  }
  public function delete(Request $request)
  {
    if (is_numeric($request->id)) {
      User::where('id', $request->id)->delete();
    }

    return redirect()->route('admin.users.index');
  }
  public function show(User $user)
  {
    $roles = Role::all();
    $permissions = Permission::all();

    return view('admin.users.role', compact('user', 'roles', 'permissions'));
  }

  public function assignRole(Request $request, User $user)
  {
    if ($user->hasRole($request->role)) {
      return back()->with('message', 'Role exists.');
    }

    $user->assignRole($request->role);
    return back()->with('message', 'Role assigned.');
  }

  public function removeRole(User $user, Role $role)
  {
    if ($user->hasRole($role)) {
      $user->removeRole($role);
      return back()->with('message', 'Role removed.');
    }

    return back()->with('message', 'Role not exists.');
  }

  public function givePermission(Request $request, User $user)
  {
    if ($user->hasPermissionTo($request->permission)) {
      return back()->with('message', 'Permission exists.');
    }
    $user->givePermissionTo($request->permission);
    return back()->with('message', 'Permission added.');
  }

  public function revokePermission(User $user, Permission $permission)
  {
    if ($user->hasPermissionTo($permission)) {
      $user->revokePermissionTo($permission);
      return back()->with('message', 'Permission revoked.');
    }
    return back()->with('message', 'Permission does not exists.');
  }

  public function destroy(User $user)
  {
    if ($user->hasRole('admin')) {
      return back()->with('message', 'you are admin.');
    }
    $user->delete();

    return back()->with('message', 'User deleted.');
  }
}