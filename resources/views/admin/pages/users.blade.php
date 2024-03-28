@extends('layouts.admin')

@section('content')
    <div class="overflow-x-auto">
        <table class="bg-zinc-800 w-full text-white rounded-lg">
            <thead>

            <tr>
                <th>ID</th>
                <th class="w-[20%]">Login</th>
                <th>Admin</th>
                <th>Delete</th>
            </tr>

            </thead>
            <tbody class="text-gray-300" x-data="{ error: '' }">

            <tr>
                <td class="py-2 text-red-500 text-sm font-medium"
                    x-text="error"
                    x-show="error !== ''"
                ></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td class="text-center py-2">
                        <b>{{ $user->id }}</b>
                    </td>
                    <td class="w-[60%] text-center py-2">
                        {{ $user->login }}
                    </td>
                    <td class="text-center py-2">
                        {{ $user->is_admin ? 'Yes' : 'No' }}
                    </td>
                    <td class="text-center py-2">
                        <a class="flex justify-center items-center"
                           href="#"
                           @click.prevent="
                                await axios.delete('/admin/users/{{ $user->id }}')
                                    .then(async (resp) => {
                                        await swup.navigate('/admin/users')
                                    })
                                    .catch(err => {
                                        console.error(err)
                                        error = validatedError(err)
                                        setTimeout( () => error = '', 3000 )
                                    })
                           "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 384 512"
                                 class="w-[20px] h-[20px] fill-red-500 hover:fill-red-400"
                            >
                                <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
