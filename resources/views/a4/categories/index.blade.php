@extends('a4.parent')
@section('title', 'Categories')
@section('page-big-title', 'Categories')
@section('page-main-title', 'Categories')
@section('page-sub-title', 'Index')
@section('styles')

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-{{ session('alert-type') }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5>Alert!</h5>
                    {{ session('message') }}
                </div>
            @endif
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        {{-- <th>Description</th> --}}
                                        <th>Status</th>
                                        <th>Created Ar</th>
                                        <th>Updated At</th>
                                        <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            {{-- <td>{{ $category->description }}</td> --}}
                                            <td><span
                                                    class="badge @if ($category->status) bg-success @else bg-danger @endif">{{ $category->visiblitiy }}</span>
                                            </td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#"
                                                        onclick="confirmDestroy('{{ $category->id }}','{{ $category->name }}',this)"
                                                        class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"> There is no Category (¬‿¬)!</td>
                                        </tr>
                                    @endforelse
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('scripts')
    <script>
        function confirmDestroy(id, name, refernce) {
            Swal.fire({
                title: `Are you sure you want to delete ${name} category?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, refernce);
                }
            })
        }

        function destroy(id, refernce) {
            axios.delete('/a4/admin/categories/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    refernce.closest('tr').remove();
                    showMessage(response.data);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showMessage(error.response.data);
                });
        }

        function showMessage(data) {
            Swal.fire({
                title: 'Deleted!',
                text: data.text,
                icon: data.icon,
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endsection
