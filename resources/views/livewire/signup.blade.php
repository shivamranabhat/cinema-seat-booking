<div>
    <section class="signup-body d-flex align-items-center" style="margin-top: 7rem">
        <div class="container d-flex justify-content-center">
            <form wire:submit.prevent="register"
                class="signup-form px-4 px-sm-4 px-md-4 px-lg-5 px-xl-5 py-4 col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7">
                <div class="signup-form-header d-flex flex-column align-items-center">
                    <h1 class="sub-heading green mb-5">Plex Cinemas</h1>
                </div>

                <div class="email-group mb-5">
                    <p class="label-text-i d-flex align-items-center m-0">Name<span class="red"> *</span></p>
                    <input type="name" wire:model="name" id="email-signup" class="col-12 p-0"
                        placeholder="John Doe" />
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="email-group mb-5">
                    <p class="label-text-i d-flex align-items-center m-0">Email<span class="red"> *</span></p>
                    <input type="email" wire:model="email" id="email-signup" class="col-12 p-0"
                        placeholder="someone@gmail.com" />
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="password-group mb-5">
                    <p class="label-text-i d-flex align-items-center m-0">Password<span class="red"> *</span></p>
                    <input type="password" wire:model="password" class="col-12 p-0" id="password-signup"
                        placeholder="******" />
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="re-password-group mb-5">
                    <p class="label-text-i m-0 d-flex align-items-center">
                        Confirm Password <span class="red mt-1"> *</span>
                    </p>
                    <input type="password" wire:model="password_confirmation" class="col-12 p-0" id="re-password-signup"
                        placeholder="******" />
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="button signup-submit-button btn btn-lg mb-5 col-12">
                    SIGN UP
                </button>

                <div class="login-footer d-flex justify-content-center align-items-center">
                    <p class="label-text-ii m-0">Already have an account?</p>
                    <a href="{{ route('login') }}" class="btn bg-transparent green login-page-link">Login</a>
                </div>
            </form>
        </div>
    </section>
   
    @error('general')
    <div class="alert alert-danger mb-4" style="position:fixed;bottom:1rem;right:1rem;height:4rem">{{ $message }}</div>
    @enderror

</div>