<div class="container-fluid mx-3 mt-4 px-4 bg-white">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                    <thead class="border-b">
                        <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Name
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Email
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Roles
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Action
                        </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($users as $user)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->index + 1}}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $user->name }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $user->email }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @foreach($user->roles as $role)
                                    {{ $role->role_name }},
                                @endforeach
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('assign-role-form', ['user' => $user->id ]) }}">
                                    <button class="bg-blue-600 text-sm rounded-lg text-white hover:bg-blue-400 px-2 py-2">Assign Role</button>
                                </a>
                                <a href="{{ route('detach-role-form', ['user' => $user->id ]) }}">
                                    <button class="bg-red-600 text-sm rounded-lg text-white hover:bg-red-400 px-2 py-2">Detach Role</button>
                                </a>
                            </td>
                           
                        </tr>

                        @empty 
                        <p>There are currently no registered users</p>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>