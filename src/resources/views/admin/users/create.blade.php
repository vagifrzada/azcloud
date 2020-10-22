@extends('layouts.admin')

@section('content')
    <div class="user-create">
        <div class="box">
            <div class="box-header with-border">
                <h3>Creating new user</h3>
                <br>
            </div>

            <div class="box-body">
                <form id="users-create" action="{{ route('admin.users.store')  }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h4>Information</h4>
                                </div>

                                <div class="box-body">
                                    <div class="form-group form-material name required">
                                        <label class="form-control-label" for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" aria-required="true" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <p class="help-block help-block-error">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group form-material email required">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" maxlength="30" aria-required="true" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <p class="help-block help-block-error">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="box box-warning">
                                <div class="box-header with-border">
                                    <h4>Password</h4>
                                </div>
                                <div class="box-body">
                                    <div class="form-group form-material field-password required">
                                        <label class="form-control-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" maxlength="" aria-required="true">
                                        @if ($errors->has('password'))
                                            <p class="help-block help-block-error">{{ $errors->first('password')  }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group form-material password_confirmation required">
                                        <label class="form-control-label" for="password_confirmation">Repeat Password</label>
                                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" aria-required="true">
                                        @if ($errors->has('password_confirmation'))
                                            <p class="help-block help-block-error">{{ $errors->first('password_confirmation')  }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h4>Configuration</h4>
                                </div>
                                <div class="box-body">
                                    <div class="form-group form-material status required">
                                        <label class="form-control-label" for="status">Status</label>
                                        <div class="form-group">
                                            <input id="status" type="checkbox" checked data-plugin="switchery" name="status" value="{{ old('status', 1)  }}">
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="help-block help-block-error">{{ $errors->first('status')  }}</p>
                                        @endif
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Create !</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection