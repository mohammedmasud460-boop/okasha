<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<section class="space-y-6" x-data="{ open: {{ $errors->userDeletion->isNotEmpty() ? 'true' : 'false' }} }">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- زر حذف الحساب (يفتح المودال) -->
    <button
        type="button"
        class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
        @click.prevent="open = true"
    >
        {{ __('Delete Account') }}
    </button>

    <!-- المودال -->
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        aria-modal="true"
        role="dialog"
    >
        <!-- الخلفية المعتمة -->
        <div class="fixed inset-0 bg-gray-900/50" @click="open = false"></div>

        <!-- صندوق المودال -->
        <div
            class="relative z-50 w-full max-w-lg rounded-lg bg-white shadow-xl"
            @keydown.escape.window="open = false"
        >
            {{ route(
                @csrf
                @method('DELETE')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4 rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-red-500 focus:ring focus:ring-red-200"
                        placeholder="{{ __('Password') }}"
                        autocomplete="current-password"
                    >
                    @if ($errors->userDeletion->has('password'))
                        <p class="mt-2 text-sm text-red-600">
                            {{ $errors->userDeletion->first('password') }}
                        </p>
                    @endif
                </div>

                <div class="mt-6 flex justify-end">
                    <!-- إغلاق المودال بدون إرسال -->
                    <button
                        type="button"
                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        @click="open = false"
                    >
                        {{ __('Cancel') }}
                    </button>

                    <!-- إرسال حذف الحساب -->
                    <button
                        type="submit"
                        class="ms-3 inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                        onclick="return confirm('{{ __('Are you sure you want to delete your account?') }}')"
                    >
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
