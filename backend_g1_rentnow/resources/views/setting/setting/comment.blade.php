<x-app-layout>
    <div>
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
          <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
              <thead>
                <tr>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">First Name</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Last Name</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Comment</th>
                </tr>
              </thead>
              {{-- <tbody>
                @can('Comment access')
                  @foreach($comments as $comment)
                  <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">{{ $comment->first_name }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $comment->last_name }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $comment->comment }}</td>
                  </tr>
                  @endforeach
                @endcan
              </tbody> --}}
            </table>
          </div>
        </div>
      </main>
    </div>
  </x-app-layout>