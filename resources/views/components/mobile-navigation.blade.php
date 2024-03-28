<div>
    <div id="mobile__navigation"
         x-show="mobile_navigation && window_width < 770"
         x-transition.origin.right
         x-transition.duration.200ms
         style="display: none"
         class="z-[51]"
    >
        <div class="flex flex-col gap-4 px-4">

            <div class="flex flex-row gap-4 justify-between items-center h-[96px]">
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
            </div>

            <nav class="mobile">
                <a href="#" class="item">Trade</a>
                <a href="#" class="item">P2P</a>
                <a href="#" class="item">Partners</a>
                <a href="#" class="item">Mining</a>
                <a href="#" class="item">Academy</a>
            </nav>

        </div>

        <div class="flex justify-end items-center gap-3 absolute bottom-4 left-4">
            <button class="btn primary" @click.prevent="await swup.navigate('/register')">Register</button>
            <button class="btn secondary" @click.prevent="await swup.navigate('/login')">Log in</button>
        </div>
    </div>
</div>
