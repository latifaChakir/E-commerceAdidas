@extends('layout')
@section('content')

<section class="Agents px-4 ">
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add User</span></a>
    </div>

    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                               {{ $user->name }}
                            </p>
                        </div>
                    </div>
                </td>
                 <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                               {{ $user->email }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                               {{ $user->role_name }}
                            </p>
                        </div>
                    </div>
                </td>
                 <td>
                    <a href="/deleteUser/{{ $user->id }}"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></a>
                    <a href="/editUser/{{ $user->id }}"><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <div class="d-flex justify-content-end">
            <ul class="pagination">
                {!! $users->links() !!}
            </ul>
        </div>
</section>
@endsection
@section('additional_content')
<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="employeeForm" method="post" action="/addUser">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                     <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" data-placeholder="choose a role">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
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