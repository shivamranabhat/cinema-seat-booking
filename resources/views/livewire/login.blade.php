<div>
    <section class="login-body d-flex align-items-center" style="margin-top: 4rem">
        <div class="container d-flex justify-content-center">
            <form wire:submit="login" class="login-form px-4 px-sm-4 px-md-4 px-lg-5 px-xl-5 py-4 col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7">
                <div class="login-form-header d-flex flex-column align-items-center">
                <h1 class="sub-heading green mb-5">Plex Cinemas</h1>
                </div>

                <!-- General Error (e.g., invalid credentials) -->
                @error('general')
                    <div class="alert alert-danger mb-4">{{ $message }}</div>
                @enderror

                <div class="email-group mb-5">
                    <p class="label-text-i d-flex align-items-center m-0">
                        Email<span class="red"> *</span>
                    </p>
                    <input type="email" wire:model="email" id="email-login" class="col-12 p-0" placeholder="Enter your Email" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="password-group mb-4">
                    <p class="label-text-i d-flex align-items-center m-0">
                        Password<span class="red"> *</span>
                    </p>
                    <input type="password" wire:model="password" id="password-login" class="col-12 p-0" placeholder="Password" />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="remeber-forget d-flex justify-content-between mb-5">
                    <div class="ml-3">
                        <input class="form-check-input mb-1" type="checkbox" wire:model="remember" id="defaultCheck1" />
                        <label class="form-check-label rem-me" for="defaultCheck1">Remember Me</label>
                    </div>
                   
                </div>

                <button type="submit" class="button login-submit-button btn btn-lg mb-5 col-12">
                    LOG IN
                </button>

                <div class="login-footer d-flex justify-content-center align-items-center">
                    <p class="label-text-ii m-0">Don't have an account?</p>
                    <a href="{{ route('signup') }}" class="btn green bg-transparent signup-page-link">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </section>

    <!-- Success Banner -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
    style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;position: fixed; bottom: 1rem; right: 1rem; height: 4rem">
            {{ session('success') }}
        </div>
    @endif
</div>