<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="permissionKeyEmail" class="form-label">{{ __('Email') }}</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email', $item->email) }}"
                   id="permissionKeyEmail" placeholder="{{ __('Email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="permissionDesc" class="form-label">{{ __('Name') }}</label>
            <input type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name"
                   value="{{ old('name', $item->name) }}"
                   id="permissionDesc" placeholder="{{ __('Name') }}" required>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="permissionKey" class="form-label">{{ __('Surname') }}</label>
            <input type="text"
                   class="form-control @error('surname') is-invalid @enderror"
                   name="surname"
                   value="{{ old('surname', $item->surname) }}"
                   id="permissionKey" placeholder="{{ __('Surname') }}" required>
            @error('key')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="permissionKey" class="form-label">{{ __('Roles') }}</label>
            <select type="text"
                   class="form-control @error('user_role') is-invalid @enderror"
                   name="user_role" id="permissionKey" required>
                @foreach($roles as $role)
                    <option @if($item->hasRole($role)) selected @endif value="{{ $role->id }}">{{ $role->title }}</option>
                @endforeach
            </select>
            @error('key')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <hr>
    <div class="col-6">
        <div class="form-group">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password"
                   value=""
                   id="password" placeholder="{{ __('Password') }}">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="passwordConfirm" class="form-label">{{ __('Password confirmation') }}</label>
            <input type="password"
                   class="form-control"
                   name="password_confirmation"
                   value=""
                   id="passwordConfirm" placeholder="{{ __('Password confirmation') }}">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

</div>
