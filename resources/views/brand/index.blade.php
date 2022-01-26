<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Brand
          <a style="float: right" href="{{ route('add-brand') }}" class="btn btn-primary">Add Brand</a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            </div>
            <div class="container">
                <div class="row">

                  @if (session('success'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <span>{{ session('success') }}</span>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                  </div>
                  @endif

                    <table class="table table-striped table-boardered">
                        <thead>
                          <tr>
                            <th scope="col">SL NO</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @php
                            $i = 1;
                          @endphp --}}
                         @foreach ($brands as $brand)
                          <tr>
                            <td scope="row">{{  $brands->firstItem() + $loop->index }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>
                                <img src="{{ asset($brand->brand_img) }}" width="100px" alt="brand_img">
                            </td>
                            <td>
                                @if($brand->created_at == NULL)
                                <span class="text-danger">No Date Set</span>
                                @else
                                {{ $brand->created_at->diffForHumans() }}
                                @endif
                            </td>
                            <td>
                               <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-primary btn-sm">Edit</a>
                              <a href="{{ url('brand/delete/'.$brand->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                         @endforeach

                        </tbody>
                      </table>
                      {{ $brands->links() }}
                    </div>
            </div>
        </div>

<br>

 {{-- start trash delete --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          </div>
          <div class="container">
            <h2 class="text-center bg-info color-white">List of Soft Delete </h2>
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
{{--
                       @foreach ($softDelete as $category )
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
                            <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-primary btn-sm">Restore</a>
                            <a href="{{ url('category/permanetDelete/'.$category->id) }}" class="btn btn-danger btn-sm">Permanent Delete</a>
                          </td>
                        </tr>
                       @endforeach --}}

                      </tbody>
                    </table>
                    {{-- {{ $softDelete->links() }} --}}
                  </div>
          </div>
      </div>
      {{-- end trash delete --}}

    </div>
</x-app-layout>
