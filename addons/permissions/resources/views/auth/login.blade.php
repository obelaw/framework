<div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
    <div class="container container-tight my-5 px-lg-5">
        <div class="text-center mb-4">
            <img width="199px" height="auto" src="{{ asset('/vendor/obelaw/images/logo-dark.svg') }}" alt="">
        </div>
        <h2 class="h3 text-center mb-3">
            Login to your account
        </h2>
        <form wire:submit.prevent="submit">
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="your@email.com" autocomplete="off" wire:model.defer="email" />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="**********" autocomplete="off" wire:model="password" />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" wire:model="remember" />
                    <span class="form-check-label">Remember me on this device</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
        </form>
    </div>
</div>
