@extends('layouts.app')

@section('content')

    <hr />
    <div class="container">
        <h1>Member List</h1>
        <p>
            <button id="btn-add-post" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#postsAddModal">
                Add Member
            </button>
        </p>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>

                </tr>
            </thead>
            <tbody id="posts-list" name="posts-list">
                @foreach ($posts as $post)
                    <tr id="link{{$post->id}}">
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->email}}</td>
                        <td>{{$post->contact}}</td>
                        <td>{{$post->address}}</td>

                        <td>
                            <button class="btn btn-info" id="modal-edit" data-toggle="modal" data-target="#postsEditModal" value="{{$post->id}}">
                                Edit
                            </button>
                            <button class="btn btn-danger delete-post" value="{{$post->id}}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Add Post -->
        <div class="modal fade" id="postsAddModal" tabindex="-1" role="dialog" aria-labelledby="postAddModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </p>
                        <h4 class="modal-title">Add Member</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form id="postAddModalForm" name="postAddModalForm" class="form-horizontal" method="POST" novalidate="">


                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NIC</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter nic" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contact</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">RePassword</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="password2" name="password2" placeholder="Enter repassword">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn-save-add-post" class="btn btn-success">Add Post</button>
                        <button type="button" id="btn-reset-post" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Post -->
        <div class="modal fade" id="postsEditModal" tabindex="-1" role="dialog" aria-labelledby="postEditModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </p>
                        <h4 class="modal-title">Edit Member</h4>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form id="postEditModalForm" name="postEditModalForm" class="form-horizontal" method="POST" novalidate="">


                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name-edit" name="name" placeholder="Enter name" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="inputLink" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email-edit" name="email" placeholder="Enter email" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">NIC</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nic-edit" name="nic" placeholder="Enter nic" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contact</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="contact-edit" name="contact" placeholder="Enter contact" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address-edit" name="address" placeholder="Enter address" />
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="password-edit" name="password" placeholder="Enter password" />
                                    </div>
                                </div>




                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="btn-save-update-post" class="btn btn-primary">Update Post</button>
                        <input type="hidden" id="post_id" name="post_id" value="0">
                    </div>
                </div>
            </div>
        </div>

        {!! csrf_field() !!}

	</div>
@endsection
