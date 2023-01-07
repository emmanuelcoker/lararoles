<div class="container-fluid mx-3 mt-4 px-4 bg-white">
<div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                    <div class="p-4 w-full bg-white">
                            <a href="{{ route('create-role') }}"><button class="float-right rounded-lg bg-green-600 text-white text-sm hover:bg-green-400 py-2 px-2 hover:shadow-sm">Create Role</button></a>
                        </div>
                        <table class="min-w-full">
                        <thead class="border-b">
                            <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Role
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Action
                            </th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($roles as $role)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->index + 1}}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $role->role_name }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('delete-role', ['id' => $role->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-600 text-sm rounded-lg text-white hover:bg-red-400 px-2 py-2">delete</button>
                                    </form>
                                </td>
                            </tr>

                            @empty 
                            <p>There are currently no roles</p>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>