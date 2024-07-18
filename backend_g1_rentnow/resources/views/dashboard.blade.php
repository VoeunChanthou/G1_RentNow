<x-app-layout>
    {{-- <div>
        <h2>Hello</h2>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="text-gray-700 text-3xl font-medium">Welcome : {{ auth()->user()->name }}</h3>                
                    <p>Role : <b>
                        @foreach(auth()->user()->roles as $role)
                            {{ $role->name }}
                        @endforeach 
                    </b> </p>
                </div>
            </main>
        </div> --}}
            <AdminLayout>
            </AdminLayout>
</x-app-layout>
