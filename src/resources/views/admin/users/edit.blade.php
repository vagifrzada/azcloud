@extends('layouts.admin')

@section('content')

    <form id="users-edit" action="{{ route('admin.users.update', ['user' => $user->getId()])  }}" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-lg-9">
                <div class="panel">
                    <div class="panel-body">

                        <div class="form-group form-material name required">
                            <label class="form-control-label" for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" aria-required="true" value="{{ $user->getName() }}">
                            @if ($errors->has('name'))
                                <p class="help-block help-block-error">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group form-material email required">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" maxlength="30" aria-required="true" value="{{ $user->getEmail() }}">
                            @if ($errors->has('email'))
                                <p class="help-block help-block-error">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

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

            <div class="col-lg-3">
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-group form-material status required">
                            <label class="form-control-label" for="status">Status</label>
                            <input id="status" type="checkbox" checked data-plugin="switchery" name="status" value="{{ old('status', 1)  }}">
                            @if ($errors->has('status'))
                                <p class="help-block help-block-error">{{ $errors->first('status')  }}</p>
                            @endif
                        </div>
                        <br><br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-round">Update !</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection