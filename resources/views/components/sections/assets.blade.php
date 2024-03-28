<div>
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
                <tbody id="table__assets">
                <tr>
                    <td class="icon">
                            <span>
                                Loading...
                            </span>
                    </td>
                </tr>
                </tbody>
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
                        lscache.set('/assets', JSON.stringify(assets), 1)
                        await appendToTable()
                    })
                    .catch(err => {
                        console.error('Failed to fetch assets:', err)
                    })
            }

            if (lscache.get('/assets') === null) {
                await fetchAssets()
            } else {
                assets = JSON.parse(lscache.get('/assets'))
                appendToTable()
            }

            setInterval(await fetchAssets, 60000)
        }
    </script>
</div>
