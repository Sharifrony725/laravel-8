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
                            <th scope="col">User Id</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Create At</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                           </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
