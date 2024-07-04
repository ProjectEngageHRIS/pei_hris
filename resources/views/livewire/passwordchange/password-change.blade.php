<!-- resources/views/livewire/password-change.blade.php -->

<div>
    @if ($step == 1)
        <form wire:submit.prevent="submit">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" id="current_password" wire:model="current_password">
                @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" wire:model="new_password">
                @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" class="form-control" id="new_password_confirmation" wire:model="new_password_confirmation">
                @error('new_password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @elseif ($step == 2)
        <form wire:submit.prevent="verifyOtp">
            <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" class="form-control" id="otp" wire:model="otp">
                @error('otp') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Verify OTP</button>
        </form>

        <div>
            <button wire:click="sendOtp({{ Auth::user() }})" class="btn btn-secondary" @if (!$canResend) disabled @endif>
                Resend OTP
            </button>
            <span wire:ignore id="resend-timer"></span>
        </div>
    @elseif ($step == 3)
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>
