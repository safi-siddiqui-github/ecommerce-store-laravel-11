<button type="submit" class="flex relative items-center justify-center bg-black h-9 rounded text-white font-medium hover:bg-black/85 transition-all ease-in-out duration-200 disabled:bg-black/80 disabled:cursor-wait" wire:loading.attr="disabled">
    <span class="">{{$title}}</span>

    <svg wire:loading.delay class="absolute right-2 animate-spin w-7 h-7 fill-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path d="M4.97498 12H7.89998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M11.8 5V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M18.625 12H15.7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M11.8 19V16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M6.97374 16.95L9.04203 14.8287" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M6.97374 7.05001L9.04203 9.17133" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M16.6262 7.05001L14.5579 9.17133" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M16.6262 16.95L14.5579 14.8287" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
        </g>
    </svg>
</button>