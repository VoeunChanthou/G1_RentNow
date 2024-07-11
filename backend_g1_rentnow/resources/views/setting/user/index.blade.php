<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="text-right">
                  @can('User create')
                    <a href="{{route('admin.users.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New User</a>
                  @endcan
                 
                </div>

              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white">First Name</th>
                      <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white">Last Name</th>
                      <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white">Email</th>
                      <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white">Phone Number</th>
                      <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white">Role</th>
                      <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white text-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @can('User access')
                      @foreach($users as $user)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-gray-200" aria-label="firstName">{{$user->first_name}}</td>
                        <td class="py-4 px-6 border-b border-gray-200 " aria-label="lastName">{{$user->last_name }}</td>
                        <td class="py-4 px-6 border-b border-gray-200 " aria-label="email">{{ $user->email}}</td>
                        <td class="py-4 px-6 border-b border-gray-200 " aria-label="phoneNumber">{{ $user->phone_number}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            @foreach($user->roles as $role)
                              <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">
                          @can('User delete')
                          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-red-600 text-white mr-2">Delete</button>
                          </form>
                          @endcan

                        </td>
                      </tr>
                      @endforeach
                    @endcan

                  </tbody>
                </table>
              </div>
  
            </div>
        </main>
    </div>
</div>
</x-app-layout>
