<div>
    <section id="section-register-and-start" class="register-and-start">
        <div class="wrapper">
            <h6 class="text-[#D5EAFF] text-[36px] 480:text-[48px] font-medium leading-[48px] 480:leading-[64px]">
                Register your account now and start to trade
            </h6>

            <form class="group w-fit mx-auto">
                <img src="{{ asset('/assets/img/icons/mail-02.svg') }}"
                     alt=""
                     class="absolute left-[10px] 360:left-[16px] top-1/2 -translate-y-1/2 w-[20px]"
                />

                <input type="email"
                       class="default !min-w-[280px] 360:!min-w-[300px] 600:!min-w-[400px] !pl-[36px] 360:!pl-[44px]"
                       placeholder="Example@gmail.com"
                />

                <button class="btn secondary absolute right-0 top-0 !px-[18px] 360:!px-[24px]">
                    Sign in
                </button>

                {{--       для чего это вообще?        --}}
                <img src="{{ asset('/assets/img/logo-1.svg') }}"
                     alt="IDK"
                     class="absolute -bottom-28 left-8"
                />
            </form>
        </div>
    </section>
</div>
