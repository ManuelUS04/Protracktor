<div 
x-data="{show: true, edit: false, success: false}"
x-init="
    @this.on('saved', () => {
        success = true;
        edit = false;
        setTimeout(() => {
            show = true;
        }, 500);
    });
"
>
    <div x-show="show" 
        x-transition.duration.500ms>
        <div class="d-flex justify-content-between mb-7">
            <div>
                <div>
                    Password
                </div>
                <div class="text-muted">
                    ************
                </div>
            </div>
            <div  x-show="show" 
            x-transition.duration.500ms>
                <button class="btn btn-light" type="button"
                @click="
                    show = false;
                    setTimeout(() => {
                        edit = true;
                    }, 500);
                ">Change Password</button>
            </div>
        </div>
        <div class="alert alert-success alert-dismissible fade show" x-show="success">
            The message has been changed successfully
            <button type="button" class="btn-close" @click="success = false;"></button>
        </div>
    </div>
    <form wire:submit.prevent="updatePassword"
        x-show="edit"
        x-transition.duration.500ms>
        <div class="w-md-75">
            <div class="mb-3">
                <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                <x-jet-input id="current_password" type="password" class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                    wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" />
            </div>

            <div class="mb-3">
                <x-jet-label for="password" value="{{ __('New Password') }}" />
                <x-jet-input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                wire:model.defer="state.password" autocomplete="new-password" />
                <x-jet-input-error for="password" />
            </div>

            <div class="mb-3">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" />
            </div>
        </div>
        <div class="d-flex justify-content-end w-md-75">
            <button class="btn" type="button" @click="
                edit = false;
                setTimeout(() => {
                    show = true;
                }, 500);
            ">
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                {{ __('Cancel') }}
            </button>
            <button class="btn btn-primary" type="submit">
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

                {{ __('Save') }}
            </button>
        </div>
    </form>
</div>