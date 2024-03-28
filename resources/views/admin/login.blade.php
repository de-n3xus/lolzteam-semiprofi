@extends('layouts.auth')

@section('content')
    <div class="flex flex-col items-center justify-center w-full h-screen">
        <form class="bg-zinc-900 p-6 rounded-lg drop-shadow-xl min-w-[300px] flex flex-col gap-4"
              x-data="{ login: '', password: '', error: '', fetching: false }"
              @submit.prevent="
                    fetching = true
                    await axios.post('/login', {
                        login: login,
                        password: password
                    })
                    .then(async resp => {
                        fetching = false
                        await swup.navigate('/admin')
                    })
                    .catch(err => {
                        fetching = false
                        console.error(err.response)
                        error = validatedError(err)

                        setTimeout(() => {
                            error = ''
                        }, 3000)
                    })
              "
        >
            <h2 class="font-medium text-gray-300 text-2xl">
                Log in
            </h2>

            <div class="group">
                <input type="text"
                       class="admin"
                       placeholder="Login"
                       x-model="login"
                />
            </div>

            <div class="group">
                <input type="password"
                       class="admin"
                       placeholder="Password"
                       x-model="password"
                />
            </div>

            <button type="submit"
                    class="btn primary !bg-gradient-to-r !from-zinc-800 !to-zinc-800"
                    :disabled="fetching"
            >
                Continue
            </button>

            <p class="text-xs font-medium text-white text-center">
                You don't have account? <a href="/register" class="text-gray-300">Register</a>
            </p>

            <p x-show="error !== ''"
               x-text="error"
               class="text-red-500 text-xs font-medium"
            ></p>
        </form>
    </div>
@endsection
