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
                        <h3 class="card-title">Category List </h3>
                   </div>
                   <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="blog_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="text-center">Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($blogs as $blog)
                                                <tr>
                                                    <td style="width:4%">{{ $loop->index +1 }}</td>
                                                    <td class="text-center" style="width:8%">
                                                        <img width="300px" src="{{ asset('assets/images/blog/'.$blog->image) }}" alt="{{ $blog }}">
                                                    </td>
                                                    <td style="width:10%"><strong>{{ $blog->title }}</strong></td>
                                                    <td style="width:50%">
                                                        @php
                                                            if (strlen($blog->description) > 500){
                                                                echo $str = substr($blog->description, 0, 500) . '...';
                                                            }else{
                                                                echo $blog->description;
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td style="width:10%">{{ $blog->created_at->format('d-M-Y, h:i:s A') }}</td>
                                                    <td style="width:13%">
                                                        <a class="btn btn-info" href="{{ route('blog.edit',$blog->id) }}"><i class="fa fa-edit"></i></a>
                                                        <button data-id="{{ $blog->id }}" type="submit" class="btn btn-danger blog_delete_btn"><i class="fa fa-trash"></i></button>
                                                        <form class="d-inline" id="blog_delete_form{{$blog->id}}" action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                        </form>
                                                        <a title="details" target="_blank" class="btn btn-primary" href="{{ route('frontend.blog.show',$blog->slug) }}"> <i class="fa fa-link"></i> </a>
                                                    </td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center"> <i class="fa fa-exclamation-circle"></i> No Blog to show!</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
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

        $('.blog_delete_btn').click(function(){
            var blog_id = $(this).attr('data-id');
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete this blog?',
                // text: 'Invoice No:',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {

                $("#blog_delete_form"+blog_id).submit();

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'This blog steel now active',
                'error',
                )
            }
            })
        });
        $(document).ready( function () {
            $('#blog_table').DataTable();
        } );
    </script>
@endsection
