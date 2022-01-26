<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit Brand
           <a style="float: right" href="{{ route('all-brand') }}" class="btn btn-primary">All Bran</a>
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    @if (session('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span>{{ session('success') }}</span>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    @endif


                    <div class="col-md-6">
                        <form method="POST" action="{{ url('update-brand/'.$brands->id) }}">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Brand Name</label>
                              <br>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="brand_name" aria-describedby="emailHelp" value="{{ $brands->brand_name }}">

                              @error('brand_name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Brand Name</label>
                              <br>
                              <input type="file" class="form-control" id="exampleInputEmail1" name="brand_img" aria-describedby="emailHelp" value="">
                              <img src="{{ asset($brands->brand_img) }}" width="150px" width="50px" alt="">

                              @error('brand_img')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                           <br>
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                          </form>
                    </div>
                    <div class="col-md-3"></div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
