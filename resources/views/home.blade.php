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

            <h2 class="text-[32px] 600:text-[52px] 770:text-[72px] font-medium text-[#D5EAFF] leading-[40px] 600:leading-[55px] 770:leading-[80px] mx-auto 1370:mx-0 mb-[5rem]">
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

        <div class="w-full relative hero__right mr-24 hidden 1370:block">
            <img src="{{ asset('/assets/img/hero_illustration.svg') }}"
                 alt=""
                 class="absolute -top-[40px] 1500:-top-[55px] 1660:-top-[110px] overflow-hidden -right-[70px] 1500:-right-[95px] z-[0]"
            />
        </div>
    </section>

    <section id="section-assets" class="assets px-4 1370:px-24"
             x-data="{ showAll: false }"
    >
        <div class="overflow-x-auto">
            <table class="table-auto assets__table overflow-x-scroll">
                <thead>
                <tr>
                    <th class="text-left w-full max-w-[60%]">Asset</th>
                    <th>Price</th>
                    <th>Change</th>
                    <th>Volume</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="table__assets"></tbody>
            </table>
        </div>

        <button class="all-assets_btn"
                @click="showAll = !showAll"
                x-text="showAll ? 'Hide all assets' : 'All assets'"
        ></button>
    </section>

    <script>
        window.onload = async () => {
            let table = document.getElementById('table__assets'),
                assets = []

            const appendToTable = () => {
                console.log(assets)
                let output = ''
                assets.forEach((asset, index) => {
                    output += `
                        <tr x-data="{ asset: ${JSON.stringify(asset).replace(/"/g, "'")}, index: ${index} }"
                            x-show="index < 6 || showAll"
                            x-transition.duration.200ms
                            role="article"
                        >
                            <td class="icon">
                                <img :src="asset.image"
                                     alt=""
                                />
                                <span>
                                    <span x-text="asset.name"></span>
                                    <span class="text-[#525A71] text-[14px]" x-text="asset.short_code"></span>
                                </span>
                            </td>
                            <td class="price">
                                <span x-text="'$ ' + parseFloat(asset.info.lastPrice).toFixed(3)"></span>
                            </td>
                            <td class="change">
                                <span :class="{ 'bad': asset.info.priceChangePercent < 0, 'good': asset.info.priceChangePercent >= 0 }"
                                      x-text="parseFloat(asset.info.priceChangePercent).toFixed(3).replace('-', '') + ' %'"
                                ></span>
                            </td>
                            <td class="button">
                                <span>
                                    <button class="btn secondary-nobg">
                                        Trade
                                    </button>
                                </span>
                            </td>
                        </tr>
                    `
                })

                table.innerHTML = output
            }

            const fetchAssets = async () => {
                await axios.get('/api/assets')
                    .then(async (resp) => {
                        assets = resp.data.data
                        lscache.set('assets', JSON.stringify(assets), 1)
                        await appendToTable()
                    })
                    .catch(err => {
                        console.error('Failed to fetch assets:', err)
                    })
            }

            if (lscache.get('assets') === null) {
                await fetchAssets()
            } else {
                assets = JSON.parse(lscache.get('assets'))
                appendToTable()
            }

            setInterval(await fetchAssets, 60000)
        }
    </script>

    <section id="section-partners" class="partners px-8 1370:px-32">

    </section>

@endsection
