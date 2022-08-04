@extends('layouts.theme.app')
@section('mainSection', 'Add Users')
@section('pageTitle', 'Dashboard - Users - Add New User')
@section('content')
<div class="container bg-white rounded">
    <form name="formUser" action="{{ route('accounts.store') }}" method="POST">
        <x-jet-validation-errors />
        @csrf
        <div class="row">
            <div class="mt-12 col-md-12 border-right">
                <div class="py-10">
                    <div class="mt-2 row">
                        <div class="col-md">
                            <label class="labels">First name</label>
                            <input type="text" class="form-control" placeholder="First name" name="name">
                        </div>
                        <div class="col-md">
                            <label class="labels">Last name</label>
                            <input type="text" class="form-control" placeholder="Last name" name="last_name">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col-md">
                            <label class="labels">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@example.com">
                        </div>
                        <div class="col-md">
                            <label class="labels">Phone</label>
                            <input type="text" class="form-control" name="phone_number" placeholder="777-234-6789">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-8">
                    <div class="pb-5 row">
                        <label class="labels">Select User Role</label>
                        <div class="col-4">
                            @foreach($roles as $role)
                            <div class="my-2 form-check">
                                <input type="radio" class="form-check-input" id="{{ $role->name }}" name="role" value="{{ $role->id }}">
                                <label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <div class="row">
                <!--begin::Col-->
                <div class="col-lg-8">
                    <label class="labels">Team</label>
                    <select class="w-full form-control" id="team_id" name="team_id">
                        <option></option>
                        @foreach($teams as $team)
                        <option value="{{ $team->id }}">
                            {{ $team->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!--end::Col-->
            </div>
            <div class="d-flex justify-content-end my-10">
                <a href="{{ route('accounts.index') }}" class="btn profile-button btn-sm me-2">Cancel</a>
                <button class="btn btn-primary profile-button btn-sm" type="submit">Register</button>
            </div>
        </div>
    </form>
</div>
<script>
    let role = document.getElementsByName('role');
    let teamSelect = document.getElementById('team_id');
    teamSelect.disabled = true;
    role.forEach((roleElement) => {
        roleElement.addEventListener('click', (e) => {
            if (e.target.value == 2) {
                teamSelect.disabled = false;
            } else {
                teamSelect.disabled = true;
            }
        });
    });
</script>
@endsection