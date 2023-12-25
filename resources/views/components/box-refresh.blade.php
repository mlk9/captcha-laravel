<div {{ $attributes }}>
    <div class="flex flex-wrap">
        <div class="flex-1 border-gray-400 border-2 p-2 rounded flex flex-wrap items-center max-w-fit">
            <img id="captcha-image" class="w-[160px] h-[60px] border-gray-400" src="{{ route('captcha.image') }}" alt="captha">
            <button id="refresh-captcha" type="button"
                class="bg-gray-700 hover:bg-gray-900 transition-all text-white p-1 rounded-lg"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M15.312 11.424a5.5 5.5 0 0 1-9.201 2.466l-.312-.311h2.433a.75.75 0 0 0 0-1.5H3.989a.75.75 0 0 0-.75.75v4.242a.75.75 0 0 0 1.5 0v-2.43l.31.31a7 7 0 0 0 11.712-3.138.75.75 0 0 0-1.449-.39Zm1.23-3.723a.75.75 0 0 0 .219-.53V2.929a.75.75 0 0 0-1.5 0V5.36l-.31-.31A7 7 0 0 0 3.239 8.188a.75.75 0 1 0 1.448.389A5.5 5.5 0 0 1 13.89 6.11l.311.31h-2.432a.75.75 0 0 0 0 1.5h4.243a.75.75 0 0 0 .53-.219Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div class="flex-1 p-4">
            <div class="text-sm">{{ __('captcha.captcha') }}</div>
            <input id="captcha" name="captcha" type="text" required autocomplete="off"
                class="p-2 h-8 appearance-none relative block w-full py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 sm:text-sm">
        </div>
    </div>
</div>

<script>
	document.querySelector('#refresh-captcha').addEventListener('click', e => {
		document.querySelector('#captcha-image').src = '{{ route('captcha.image') }}?q='+new Date().getTime();
	})
</script>
