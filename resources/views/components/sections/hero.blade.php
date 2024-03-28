<div>
    <section id="section-hero" class="flex justify-between gap-8 relative hero z-[1]">

        <div class="hero__left">

            <p class="hero__decentralized_platform mx-auto 1370:mx-0">
                <img src="{{ asset('/assets/img/logo-mini.svg') }}"
                     alt=""
                     class="h-[16px] w-[16px]"
                />
                <span>
                    Decentralized crypto platform
                </span>
            </p>

            <h2 class="text-[32px] 600:text-[52px] 770:text-[72px] font-medium text-[#D5EAFF] leading-[40px] 600:leading-[55px] 770:leading-[80px] mx-auto 1370:mx-0 mb-[5rem]">
                <span class="770:text-nowrap">
                    Buy, trade and store
                </span>
                <br>
                cryptocurrencies
            </h2>

            <div class="absolute bottom-0 left-1/2 -translate-x-1/2 1370:-translate-x-0 1370:left-0 z-[6]">
                <form class="group w-fit" action="/login">
                    <img src="{{ asset('/assets/img/icons/mail-02.svg') }}"
                         alt=""
                         class="absolute left-[10px] 360:left-[16px] top-1/2 -translate-y-1/2 w-[20px]"
                    />

                    <input type="email"
                           class="default !min-w-[280px] 360:!min-w-[300px] 600:!min-w-[400px] !pl-[36px] 360:!pl-[44px]"
                           placeholder="Example@gmail.com"
                           name="_email"
                    />

                    <button class="btn secondary absolute right-0 top-0 !px-[18px] 360:!px-[24px]">
                        Sign in
                    </button>
                </form>
            </div>
        </div>

        <div class="w-full relative hero__right mr-24 hidden 1370:block">
            <img src="{{ asset('/assets/img/hero_illustration.svg') }}"
                 alt=""
                 class="absolute -top-[40px] 1500:-top-[55px] 1660:-top-[110px] overflow-hidden -right-[70px] 1500:-right-[95px] z-[0]"
            />
        </div>
    </section>
</div>
