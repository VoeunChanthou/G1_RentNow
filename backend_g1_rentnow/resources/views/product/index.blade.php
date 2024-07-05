<x-app-layout>
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-2">
      <div class="text-right mb-4">
        @can('Post create')
          <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white font-bold px-2 py-1 rounded focus:outline-none shadow hover:bg-blue-600 transition-colors">
            Add Product
          </a>
        @endcan
      </div>
      <div class="bg-white shadow-md rounded my-6 ">
        <table class="text-left w-full border-collapse ">
          <thead>
            <tr>
              <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white" aria-label="name">Name</th>
              <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white" aria-label="price">Price</th>
              <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white" aria-label="category_id">Category ID</th>
              <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white" aria-label="shop_id">Shop ID</th>
              <th class="py-4 px-6 bg-blue-600 font-bold text-sm  text-white text-right" aria-label="action">Actions</th>
            </tr>
          </thead>
          <tbody>
            @can('Post access')
              @foreach ($products as $product)
                <tr class="hover:bg-gray-100">
                  <td class="py-4 px-6 border-b border-gray-200" aria-label="name">{{$product->name}}</td>
                  <td class="py-4 px-6 border-b border-gray-200 " aria-label="Price">{{ $product->price }}</td>
                  <td class="py-4 px-6 border-b border-gray-200 " aria-label="Category ID">{{ $product->category_id }}</td>
                  <td class="py-4 px-6 border-b border-gray-200 " aria-label="Shop ID">{{ $product->shop_id}}</td>
                  <td class="py-4 px-6 border-b border-gray-200 text-right" aria-label="Actions">
                    @can('Product edit')
                      @csrf
                      @method('put')
                      <a href="{{ route('admin.products.edit', $product->id) }}" class=" font-bold py-1 px-3 rounded text-xs bg-green-500 hover:bg-green-600 text-white mr-2">
                        Edit
                      </a>
                    @endcan
                    @can('Product delete')
                      <form action="{{ route('admin.products.destroy', $product->id) }}"  method="POST" class="inline">
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
</x-app-layout>