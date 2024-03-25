@extends('layouts.default')

@section('content')

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

            <h2 class="text-[32px] 600:text-[52px] 770:text-[72px] font-medium text-[#D5EAFF] leading-[40px] 600:leading-[55px] 770:leading-[80px] mx-auto 1370:mx-0 mb-16">
                <span class="770:text-nowrap">
                    Buy, trade and store
                </span>
                <br>
                cryptocurrencies
            </h2>

            <div class="absolute bottom-0 left-1/2 -translate-x-1/2 1370:-translate-x-0 1370:left-0 z-[6]">
                <form class="group w-fit">
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
                </form>
            </div>
        </div>

        <div class="w-full relative hero__right mr-4 1600:mr-24 hidden 1370:block">
            <img src="{{ asset('/assets/img/hero_illustration.svg') }}"
                 alt=""
                 class="absolute -top-[40px] 1500:-top-[55px] 1660:-top-[110px] overflow-hidden -right-[70px] 1500:-right-[95px] z-[0]"
            />
        </div>

        <div class="absolute bottom-0 left-0 w-full bg-[#0B0F15] py-2.5 border-t border-t-[#252C41] z-[5]"></div>
    </section>

    <section id="section-assets" class="assets px-4 1370:px-24">
        <table class="table-auto assets__table">
            <thead>
                <tr>
                    <th class="text-left w-full max-w-[60%]">Asset</th>
                    <th>Price</th>
                    <th>Change</th>
                    <th>Volume</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="icon">
                        <img src="{{ asset('/assets/img/icons/1inch.svg') }}"
                             alt=""
                        />
                        <span>
                            1inch
                            <span class="text-[#525A71] text-[14px]">
                                1INCH
                            </span>
                        </span>
                    </td>
                    <td class="price">
                        <span>&dollar; 30.000</span>
                    </td>
                    <td class="change">
                        <span class="bad">15 %</span>
                    </td>
                    <td class="button">
                        <span>
                            <button class="btn secondary-nobg">
                                Trade
                            </button>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="icon">
                        <img src="{{ asset('/assets/img/icons/btc.svg') }}"
                             alt=""
                        />
                        <span>
                            Bitcoin
                            <span class="text-[#525A71] text-[14px]">
                                BTC
                            </span>
                        </span>
                    </td>
                    <td class="price">
                        <span>&dollar; 30.000</span>
                    </td>
                    <td class="change">
                        <span class="good">15 %</span>
                    </td>
                    <td class="button">
                        <span>
                            <button class="btn secondary-nobg">
                                Trade
                            </button>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

@endsection
