<div>
    <header class="relative w-full h-[96px] flex justify-between gap-4 items-center z-50 bg-[#08090B] px-4 1600:px-24">
        <div class="h-full flex justify-start gap-8 items-center">
            <a href="/">
                <img src="{{ asset('/assets/img/logo.svg') }}"
                     alt="BITLIST"
                     class="hidden 360:block 770:hidden 1330:block"
                />
                <img src="{{ asset('/assets/img/logo-mini.svg') }}"
                     alt="BL"
                     class="block 360:hidden 770:block 1330:hidden"
                />
            </a>

            <span class="h-[24px] w-[1px] bg-[#252C41]"></span>

            <form class="hidden 770:block group">
                <img src="{{ asset('/assets/img/icons/search-lg.svg') }}"
                     alt=""
                     class="absolute left-[16px] top-1/2 -translate-y-1/2 w-[20px]"
                />

                <input type="text"
                       class="default"
                       placeholder="Search"
                />
            </form>
        </div>

        <div class="h-full justify-end gap-8 items-center hidden 770:flex" :aria-hidden="!window_width < 770">
            <nav class="desktop">
                <a href="#" class="item" x-show="window_width >= 840" :aria-hidden="!window_width >= 840">Trade</a>
                <a href="#" class="item" x-show="window_width >= 910" :aria-hidden="!window_width >= 910">P2P</a>
                <a href="#" class="item" x-show="window_width >= 1010" :aria-hidden="!window_width >= 1010">Partners</a>
                <a href="#" class="item" x-show="window_width >= 1100" :aria-hidden="!window_width >= 1100">Mining</a>
                <a href="#" class="item" x-show="window_width >= 1160" :aria-hidden="!window_width >= 1160">Academy</a>

                <div class="relative flex items-center"
                     x-show="window_width < 1160"
                     x-data="{ show: false }"
                >
                    <a href="#"
                       class="item"
                       @click="show = !show"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 512 512"
                             class="fill-[#464E62] hover:fill-[#464E62]/70 transition ease-linear w-[20px] h-[20px]"
                        >
                            <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
                        </svg>
                    </a>

                    <div class="dropdown"
                         x-show="show"
                         x-transition.origin.right
                         x-transition.duration.150ms
                         @click.outside="show = false"
                         :aria-hidden="show"
                    >
                        <a href="#" class="item" x-show="window_width < 840">Trade</a>
                        <a href="#" class="item" x-show="window_width < 910">P2P</a>
                        <a href="#" class="item" x-show="window_width < 1010">Partners</a>
                        <a href="#" class="item" x-show="window_width < 1100">Mining</a>
                        <a href="#" class="item" x-show="window_width < 1160">Academy</a>
                    </div>
                </div>
            </nav>

            <span class="h-[24px] w-[1px] bg-[#252C41]"></span>

            <div class="flex justify-end items-center gap-3">
                <button class="btn primary">Register</button>
                <button class="btn secondary">Log in</button>
            </div>
        </div>

        <button class="flex justify-end items-center 770:hidden"
                @click="mobile_navigation = !mobile_navigation"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 448 512"
                 class="fill-[#464E62] focus:fill-[#464E62]/70] w-[24px] h-[24px]"
            >
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
            </svg>
        </button>
    </header>
</div>
