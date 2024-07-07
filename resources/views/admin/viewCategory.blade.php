@extends('admin.MasterPage')
@section('title','-Category')
@section('content_Title','Categories')
@section('content')
    <div class="card p-3">
        @if (session()->has('error'))
            <script>
                $(document).ready(function(){
                    swal('Category already exist!!','Please Try another Category','warning');
                })
            </script>
        @endif
        @if (session()->has('errorr'))
            <script>
                $(document).ready(function(){
                    swal('Unable to delete this Category','Please Try another Category','warning');
                })
            </script>
        @endif

        <div class="m-3 text-end">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#AddCategoryModal">+ Add Category</button>
        </div>
        <table class="w-100 table table-bordered table-light table-hover text-center" style="table-layout: fixed">
           <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
           </tr>
           @foreach ($category as $item)
               <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->date}}</td>
                <td>
                    <div class="dropdown-center">
                        <div data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer">
                          ...
                        </div>
                      
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" onclick="editCategory({{$item->id}},'{{$item->name}}')" style="cursor: pointer"><i class="bi bi-pencil-square"></i>Edit</a></li>
                          <li><a class="dropdown-item" onclick="getID({{$item->id}})" style="cursor: pointer"><i class="bi bi-trash-fill"></i>Delete</a></li>
                        </ul>
                    </div>
                </td>
               </tr>
           @endforeach
        </table>
        {{$category->links()}}
    </div>

    {{-- Add Modal --}}
    <div class="modal fade" id="AddCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/add-category" method="post">
                @csrf
              <table class="w-100">
                <tr>
                    <th>Name</th>
                    <td><input type="text" class="form-control boder-2 border-dark" name="name" required></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      <button id="edit_btn_modal" data-bs-toggle="modal" data-bs-target="#EditCategoryModal" style="visibility: hidden">edit</button>
    {{-- Edit Modal --}}
    <div class="modal fade" id="EditCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/edit-category" method="post">
                @csrf
              <table class="w-100">
                <tr>
                    <input type="hidden" name="id" id="id">
                    <th>Name</th>
                    <td><input type="text" id="name" class="form-control boder-2 border-dark" name="name" required></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <button id="delete_btn_modal" data-bs-toggle="modal" data-bs-target="#DeleteCategoryModal" style="visibility: hidden">edit</button>
    {{-- Delete Modal --}}
    <div class="modal fade" id="DeleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to delete this record?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              <form action="/admin/delete-category" method="post">
                @csrf
                <input type="hidden" name="id" id="removeID">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </form>
            </div>
          </div>
        </div>
      </div>
@endsection