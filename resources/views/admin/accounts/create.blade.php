<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Account</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('accounts')}}" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor"><path  d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left"/></svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form  method="POST" action="{{ route('account.store') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror {{ $errors->has('name') ? 'error' : '' }}"
                                        value="{{ old('name') }}" />
                                </div>
                                 <div class="form-outline mb-3">
                                    <label class="form-label" for="role">Role</label>
                                    <select name="role" id="role"
                                            class="form-control @error('role') is-invalid @enderror">
                                        <option value="user">
                                            User
                                        </option>
                                        <option value="Admin">
                                            Admin
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror {{ $errors->has('email') ? 'error' : '' }}"
                                        value="{{ old('email') }}" />
                                </div>
                                
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror {{ $errors->has('password') ? 'error' : '' }}"
                                        value="{{ old('password') }}" />
                                        @error('password')
                                        <p>{{$message}}</p>
                                        @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror {{ $errors->has('password_confirmation') ? 'error' : '' }}"
                                        value="{{ old('password_confirmation') }}" />
                                </div>
                                <button type="submit" class="btn btn-primary btn-block rounded mb-4">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>