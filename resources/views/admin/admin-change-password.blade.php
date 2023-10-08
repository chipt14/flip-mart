@extends('admin.admin-master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Thay đổi mật khẩu</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.change.password') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Mật khẩu hiện tại <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="oldpassword" id="current_password"
                                                            class="form-control" required="" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Mật khẩu mới <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" required="" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Xác nhận mật khẩu <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password_confirmation"
                                                            id="password_confirmation" class="form-control" required=""
                                                            value="">
                                                    </div>
                                                </div>

                                            </div> <!-- end col-md-6 -->

                                        </div> <!-- end row -->

                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Cập nhật">
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
