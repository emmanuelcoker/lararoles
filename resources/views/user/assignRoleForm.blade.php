<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-xl">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Assign Role</h5>
                <form action="{{ route('assign-role', ['user' =>  $user->id]) }}" method="post">
                            @csrf
                            <div class="mb-3 xl:w-96">
                                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
                                >User</label
                                >
                                <input
                                type="text"
                                name="user_name"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700
                                    bg-white bg-clip-padding
                                    border border-solid border-gray-300
                                    rounded
                                    transition
                                    ease-in-out
                                    m-0
                                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                "
                                id="exampleFormControlInput1"
                                value="{{ $user->name }}"
                                placeholder="User Name"
                                disabled
                                />
                            </div> 

                            <div class="mb-3 xl:w-96">
                            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
                                >Add Role</label
                                >
                                <select name="role_id" class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id}}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                        </form>
        
            </div>
            
            
        </div>
    </div>
</x-app-layout>
