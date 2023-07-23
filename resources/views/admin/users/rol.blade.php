<div class="card">

    <div class="card-header">
        <strong>role User</strong>
    </div>
    @if ($user->roles)
    @foreach ($user->roles as $user_role)
    <form class="my-3 mr-5" method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
        onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">{{ $user_role->name }}</button>
    </form>
    @endforeach
    @endif
    <div class="card-block">
        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}>
                @csrf
                <div class=" form-group col-md-12">
            <label>Roles</label>
            <select id="role" name="role" autocomplete="role-name" class="form-control">
                @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role')
            <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
            أضافة إدارة</button>
    </div>
    </form>

</div>
