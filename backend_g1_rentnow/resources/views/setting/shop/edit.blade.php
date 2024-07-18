<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-1 pb-16">
        <div class="bg-white shadow-md rounded my-6 p-5">
          <form method="POST" action="{{ route('admin.shops.update', $shop->id)}}">
          @csrf
          @method('put')
            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
              EDIT SHOP
            </h6>
            <div class="flex flex-wrap">
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Shop name
                  </label>
                  <input id="shop_name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="name" value="{{ old('name', $shop->name) }}" placeholder="Enter Shop Name">

                </div>
              </div>
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Owner
                  </label>
                  <!-- <input id="owner_id" type="number" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="user_id" value="{{ old('user_id', $shop->user_id) }}" placeholder="Enter Owner ID"> -->
                  <div class="flex flex-col space-y-2">
                  <select class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" name="user_id" aria-label="Default select example">
                    <option value="">Select Owner</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}" {{ old('user_id') == '1' ? 'selected' : '' }}>{{$user->first_name}}  {{$user->last_name}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
              </div>
            </div>

            <hr class="mt-6 border-b-1 border-blueGray-300">

            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
              Contact Information
            </h6>
            <div class="flex flex-wrap">
              <div class="w-full lg:w-4/12 px-4">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Country
                  </label>
                  <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"  name="Country" value="{{ old('Country', $shop->Country) }}" placeholder="Enter Country">
                </div>
                </div>
                <div class="w-full lg:w-4/12 px-4">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Province
                  </label>
                  <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"  name="Province" value="{{ old('Province', $shop->Province ) }}" placeholder="Enter Province">
                </div>
              </div>
              <div class="w-full lg:w-4/12 px-4">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    Street
                  </label>
                  <input type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"  name="street" value="{{ old('street', $shop->street) }}" placeholder="Enter Street">
                </div>
              </div>
            </div>


            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
              Shop location
            </h6>
            <div class="flex flex-wrap">
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    lat
                  </label>
                  <input id="lat" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="latitude" value="{{ old('latitude', $shop->latitude) }}" placeholder="Enter Latitude">

                </div>
              </div>
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                    long
                  </label>
                  <input id="long" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" name="longitude" value="{{ old('longitude', $shop->longitude) }}" placeholder="Enter Longitude">

                </div>
              </div>
            </div>


            <div class="flex flex-wrap mt-5">
              <div class="w-full lg:w-12/12 px-4">
                <div class="relative w-full mb-3">
                  <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
                </div>
              </div>
            </div>
          </form>


        </div>
    </main>
  </div>
  </div>
</x-app-layout>