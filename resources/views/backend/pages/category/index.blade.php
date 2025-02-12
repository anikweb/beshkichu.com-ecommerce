@extends('backend.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
       <div class="row">
           <div class="col-md-12">
               <div class="card card-primary">
                   <div class="card-header">
                        <h3 class="card-title">Category List {{ session('security_check') }} </h3>
                   </div>
                   <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="category_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th class="text-center">Image</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{$categories->firstItem() + $loop->index }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td class="text-center">
                                                        <img width="300px" src="{{ asset('assets/images/layout-2/collection-banner/'.$category->image) }}" alt="">
                                                    </td>
                                                    <td>{{ $category->created_at->format('d-M-Y, h:i:s A') }}</td>
                                                    <td>
                                                        @can('category edit')
                                                            <a class="btn btn-info" href="{{ route('category.edit',$category->slug) }}"><i class="fa fa-edit"></i></a>
                                                        @endcan
                                                        @can("category delete")
                                                            <button data-id="{{ $category->id }}" type="submit" class="btn btn-danger category_delete_btn"><i class="fa fa-trash"></i></button>
                                                            <form id="category_delete_form{{$category->id}}" action="{{ route('category.destroy',$category->slug) }}" method="POST">                                                                @csrf
                                                                @method("DELETE")
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $categories->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>
           </div>
       </div>
    </div>
@endsection
@section('footer_js')
    <script>
        @if (session('success'))
            toastr["success"]("{{ session('success') }}");
        @elseif(session('error'))
            toastr["error"]("{{ session('error') }}");
        @endif

        $('.category_delete_btn').click(function(){
            var category_id = $(this).attr('data-id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete this category?',
                // text: 'Invoice No:',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {

                $("#category_delete_form"+category_id).submit();

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'This category steel now active',
                'error',
                )
            }
            })
        });
        $(document).ready( function () {
            $('#category_table').DataTable();
        } );
    </script>
@endsection
