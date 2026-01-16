{{-- Add a centered container with proper background --}}
<div class="min-h-screen flex items-center justify-center bg-zinc-50 dark:bg-zinc-900 px-4 py-12">
    <div class="w-full max-w-md bg-white dark:bg-zinc-800 rounded-lg shadow-lg p-8">
        <div class="flex flex-col gap-6">
            <x-auth-header
                title="{{ __('global.forgot_password') }}"
                description="{{ __('global.forgot_password_description') }}"
            />

            <!-- Session Status -->
            <x-auth-session-status
                class="text-center"
                :status="session('status')"
            />

            <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
                <!-- Email Address -->
                <flux:input
                    wire:model="email"
                    :label="__('global.email_address')"
                    type="email"
                    name="email"
                    required
                    autofocus
                    placeholder="email@example.com"
                />

                <flux:button
                    variant="primary"
                    type="submit"
                    class="w-full"
                >
                    {{ __('global.send_password_reset_link') }}
                </flux:button>
            </form>

            <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
                <span>{{ __('global.or_return_to') }}</span>
                <flux:link :href="route('login')" wire:navigate>
                    {{ __('global.login') }}
                </flux:link>
            </div>
        </div>
    </div>
</div>
