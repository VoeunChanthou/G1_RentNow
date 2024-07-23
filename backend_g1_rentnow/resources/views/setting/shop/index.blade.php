<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-2">
      <div class="text-right">
        @can('Shop create')
        <a href="{{route('admin.shops.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Shop</a>
        @endcan
      </div>

      <div class="bg-white shadow-md rounded my-6">
        <table class="text-left w-full border-collapse">
          <thead>
            <tr>
              <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-4/12">Name</th>
              <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light w-4/12">Address</th>
              <th class="py-4 mr-3 px-10 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-center w-3/12">Actions</th>
            </tr>
          </thead>
          <tbody>
            @can('Shop access')
            @foreach($shops as $shop)
            <tr class="hover:bg-grey-lighter">
              <td class="py-4 px-6 border-b border-grey-light" >{{ $shop->name }}</td>
              <td class="py-4 px-6 border-b border-grey-light">{{ $shop->Country }}, {{$shop->Province}}, {{$shop->street}}</td>
              <td class="py-5 px-6 border-b border-grey-light" style="display: flex; justify-content: center;">
                <!-- <svg style="width: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.
                  <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                </svg> -->
               

                @can('Shop edit')
                      <a href="{{ route('admin.shops.edit', $shop->id) }}" class=" font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-600 text-white mr-2">
                        Edit
                      </a>
                    @endcan
                
                @can('Shop delete')
                      <form action="{{ route('admin.shops.destroy', $shop->id) }}"  method="POST" class="inline">
                        @csrf
                        @method('delete')
                        <button class=" font-bold py-1 px-3 rounded text-xs bg-red-500 hover:bg-red-600 text-white">
                          Delete
                        </button>
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
</x-app-layout>