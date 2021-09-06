<div {{ $attributes }}>
    <div class="flex flex-wrap items-center">
        <div class="flex-1 border-gray-400 border-2 rounded">
            <img class="w-full" src="{{ app('captcha')->generate() }}" alt="captha">
        </div>
		<div class="flex-1 p-4">
			<div class="text-sm">{{ __('captcha.captcha') }}</div>
			<input id="captcha" name="captcha" type="text" required autocomplete="off" class="p-2 h-8 appearance-none relative block w-full py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 sm:text-sm">
		</div>
	</div>
</div>
