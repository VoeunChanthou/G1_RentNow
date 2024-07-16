<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-purple-500 font-bold text-white  border-gray-300">User ID</th>
                <th class="py-4 px-6 bg-purple-500 font-bold text-white  border-gray-300">First Name</th>
                <th class="py-4 px-6 bg-purple-500 font-bold text-white  border-gray-300">Last Name</th>
                <th class="py-4 px-6 bg-purple-500 font-bold text-white  border-gray-300">Comment</th>
              </tr>
            </thead>
            <tbody>
              @foreach($comments as $comment)
              <tr class="hover:bg-gray-200">
                <td class="py-4 px-6 border-b border-gray-300">{{ $comment->user_id }}</td>
                <td class="py-4 px-6 border-b border-gray-300">{{ $comment->first_name }}</td>
                <td class="py-4 px-6 border-b border-gray-300">{{ $comment->last_name }}</td>
                <td class="py-4 px-6 border-b border-gray-300">{{ $comment->comment }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</x-app-layout>