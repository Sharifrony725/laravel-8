<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Categories
          <a style="float: right" href="{{ route('add-category') }}" class="btn btn-primary">Add Categories</a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
            </div>
            <div class="container">
                <div class="row">
                    <table class="table table-striped table-boardered">
                        <thead>
                          <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User</th>
                            <th scope="col">Create At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @php
                            $i = 1;
                          @endphp --}}
                         @foreach ($categories as $category )
                          <tr>
                            <th scope="row">{{  $categories->firstItem() + $loop->index }}</th>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>
                              @if($category->created_at == NULL)
                              <span class="text-danger">No Date Set</span>
                              @else
                              {{ $category->created_at->diffForHumans() }}
                              @endif
                            </td>
                            <td>
                              <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                         @endforeach
                          
                        </tbody>
                      </table>
                      {{ $categories->links() }}
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
