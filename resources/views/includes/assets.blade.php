<script src="{{ asset('/assets/js/alpine-screen.min.js') }}" defer></script>
<script src="{{ asset('/assets/js/alpine.min.js') }}" defer></script>
<script src="{{ asset('/assets/js/axios.min.js') }}"></script>
<script src="{{ asset('/assets/js/lscache.min.js') }}"></script>
@vite(['resources/js/app.js'])

<script src="{{ asset('https://unpkg.com/swup@4.6.1/dist/Swup.umd.js') }}"></script>

<link rel="shortcut icon" href="{{ asset('assets/img/logo-mini.svg') }}" type="image/x-icon"/>

<script>
    window.onload = async () => {
        await axios.create({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
    }

    const validatedError = async (data) => {
        if (data.response.data.errors !== undefined) {
            return data?.response?.data?.errors[Object.keys(data.response.data.errors)[0]][0]
        } else {
            return data?.response?.data?.error_message
        }
    }
</script>

<script>
    const swup = new Swup({
        containers: ['#app']
    })
</script>
