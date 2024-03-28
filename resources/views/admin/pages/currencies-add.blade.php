@extends('layouts.admin')

@section('content')
    <h3 class="font-medium text-gray-300 text-2xl">
        Currency adding
    </h3>

    <form x-data="{ name: '', short_code: '', api_code: '', image: '', fetching: false, error: '' }"
          class="flex flex-col gap-2 mt-4"
          @submit.prevent="
            fetching = true

            await axios.post('/admin/currencies/add', {
                name: name,
                short_code: short_code,
                api_code: api_code,
                image: image
            })
                .then(async (resp) => {
                    fetching = false
                    await swup.navigate('/admin/currencies')
                })
                .catch(err => {
                    fetching = false
                    error = validatedError(err)
                    setTimeout(() => error = '', 3000)
                })
          "
    >
        <p class="text-sm text-red-500 font-medium" x-show="error !== ''" x-text="error"></p>

        <div class="group">
            <input type="text"
                   class="admin"
                   placeholder="Name"
                   x-model="name"
            />
        </div>
        <div class="group">
            <input type="text"
                   class="admin"
                   placeholder="Short code"
                   x-model="short_code"
            />
        </div>
        <div class="group">
            <input type="text"
                   class="admin"
                   placeholder="Api code"
                   x-model="api_code"
            />
        </div>
        <div class="group">
            <input type="text"
                   class="admin"
                   placeholder="Image url"
                   x-model="image"
            />
        </div>

        <button type="submit"
                class="btn primary !bg-gradient-to-r !from-zinc-800 !to-zinc-800"
                :disabled="fetching"
        >
            Add
        </button>

    </form>
@endsection
