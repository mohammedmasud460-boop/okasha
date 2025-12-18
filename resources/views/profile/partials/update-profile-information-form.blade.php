
<style>
  :root{
    --bg:#f7f7fb; --card:#fff; --text:#1f2937; --muted:#6b7280;
    --primary:#4f46e5; --primary-dark:#4338ca; --danger:#dc2626; --border:#e5e7eb; --ring:#c7d2fe;
  }
  .label{display:block; margin-bottom:6px; font-size:14px; color:#374151;}
  .input{
    width:100%; padding:10px 12px; border:1px solid var(--border); border-radius:8px;
    font-size:14px; background:white; color:var(--text);
    transition:border-color .15s, box-shadow .15s;
  }
  .input:focus{ outline:none; border-color:var(--primary); box-shadow:0 0 0 4px var(--ring); }
  .error{margin-top:6px; color:var(--danger); font-size:12px;}
  .btn{
    appearance:none; border:none; border-radius:10px; background:var(--primary);
    color:white; padding:10px 16px; font-size:14px; cursor:pointer;
    transition:background .15s, transform .05s;
  }
  .btn:hover{background:var(--primary-dark);}
</style>

<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header>

  {{-- نموذج إعادة إرسال بريد التحقق --}}
  {{ route('verification.send') }}
      @csrf
  </form>

  {{-- نموذج تحديث الملف الشخصي --}}
  {{ route('profile.update') }}
      @csrf
      @method('patch')

      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">
          {{ __('Name') }}
        </label>
        <input
          id="name"
          name="name"
          type="text"
          class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
          value="{{ old('name', auth()->user()->name) }}"
          required
          autofocus
          autocomplete="name"
        >
        @error('name')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">
          {{ __('Email') }}
        </label>
        <input
          id="email"
          name="email"
          type="email"
          class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
          value="{{ old('email', auth()->user()->email) }}"
          required
          autocomplete="username"
        >
        @error('email')
          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror

        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
          <div class="mt-2">
            <p class="text-sm text-gray-800">
              {{ __('Your email address is unverified.') }}

              <button
                form="send-verification"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                {{ __('Click here to re-send the verification email.') }}
              </button>
            </p>

            @if (session('status') === 'verification-link-sent')
              <p class="mt-2 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
              </p>
            @endif
          </div>
        @endif
      </div>

      <div class="flex items-center gap-4">
        <button
          type="submit"
          class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          {{ __('Save') }}
        </button>

        @if (session('status') === 'profile-updated')
          <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600"
          >
            {{ __('Saved.') }}
          </p>
        @endif
      </div>
  </form>
</section>
