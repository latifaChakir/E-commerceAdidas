@extends('layout')
@section('content')

<section class="Agents px-4 ">
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add role</span></a>
    </div>

    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Role_Name</th>
                <th>Permessions</th>
            </tr>
        </thead>
 <tbody>
    @foreach ($roles as $role)
        <tr class="freelancer">
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1 f_title">
                            {{ $role->role_name }}
                        </p>
                    </div>
                </div>
            </td>
            <td>
            <div class="d-flex align-items-center">
                <div class="ms-3">
                    <p class="fw-bold mb-1 f_title">
                        @php
                            $permissionsArray = explode(',', $role->permissions);
                            $chunks = array_chunk($permissionsArray, 5);
                        @endphp

                        @foreach ($chunks as $chunk)
                            <div>
                                @foreach ($chunk as $permission)
                                    <span>{{ $permission }}</span>
                                @endforeach
                            </div>
                        @endforeach
                    </p>
                </div>
            </div>

            </td>
            <td>
                <a href="/deleteRole/{{ $role->id }}"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></a>
                <a href="/editRole/{{ $role->id }}"><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></a>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
     <div class="d-flex justify-content-end">
            <ul class="pagination">
              {{ $roles->links() }}
            </ul>
        </div>

</section>
@endsection
@section('additional_content')
<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="employeeForm" method="post" action="/addRole">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Roles</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="">
                        <select class="js-example-basic-multiple form-control" name="permissions[]" multiple="multiple" data-placeholder="Choose permissions">
                            @foreach ($permessions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->permessions_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

