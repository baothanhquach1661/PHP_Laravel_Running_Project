@extends('frontend.main_master')
@section('title')
Thông tin tài khoản
@endsection
@section('content')

    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="axil-dashboard-author">
                    <div class="media">
                        <div class="thumbnail">
                            @php
                                $id = Auth::user()->id;
                                $userData = App\Models\User::find($id);
                            @endphp
                            <img src="{{ !empty($userData->profile_photo_path) ? url('upload/user_images/'.$userData->profile_photo_path):url('upload/no_image.jpg') }}" alt="{{ Auth::user()->name }}" style="height: 100px;width: 100px;">
                        </div>
                        <div class="media-body">
                            <h5 class="title mb-0">Hello! {{ Auth::user()->name }}</h5>
                            <span class="joining-date">Rinart Member Since {{ Carbon\Carbon::parse(Auth::user()->updated_at)->format('F d Y') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true">Dashboard</a>

                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false">Thông tin tài khoản</a>

                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false">Đơn hàng của tôi</a>

                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-order-tracking" role="tab" aria-selected="false">Theo dõi đơn hàng</a>

                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-returnOrders" role="tab" aria-selected="false">Đơn hàng hoàn trả</a>

                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-cancelOrders" role="tab" aria-selected="false">Đơn hàng đã hủy</a>

                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false">Thay đổi mật khẩu</a>

                                    <a class="nav-item nav-link" href="{{ route('user.logout') }}">Logout</a>
                                </div>
                            </nav>
                        </aside>
                    </div>

                    <div class="col-xl-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                <div class="axil-dashboard-overview">
                                    <div class="welcome-text">Chào, {{ Auth::user()->name }} (không phải <span>{{ Auth::user()->name }}?</span> <a href="{{ route('user.logout') }}">Log Out</a>)</div>
                                    <p>Từ trang tài khoản của tôi bạn có thể xem các đơn hàng, quản lý đơn hàng, thay đổi địa chỉ và thay đổi thông tin tài khoản cũng như mật khẩu</p>
                                </div>
                            </div>

                            {{-- my order tab --}}
                            <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        @php
                                            $id = Auth::user()->id;
                                            $user = App\Models\User::find($id);
                                            $orders = App\Models\Order::where('user_id', $id)->orderBy('id', 'DESC')->get();
                                            //dd($id);
                                        @endphp
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Invoice</th>
                                                    <th scope="col">Đơn giá</th>
                                                    <th scope="col">Phương thức thanh toán</th>
                                                    <th scope="col">Tình trạng</th>
                                                    <th scope="col" style="width: 25%;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <th scope="row">#{{ $order->invoice_no }}</th>
                                                        <td>{{ number_format($order->amount) }}₫</td>
                                                        <td>
                                                            @if( $order->payment_type == 'cod')
                                                                Thanh toán khi nhận hàng
                                                            @elseif( $order->payment_type == 'transfer' )
                                                                Thanh toán bằng chuyển khoản
                                                            @else
                                                                Ví MoMo
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if( $order->status == 'Pending')
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #19A7CE;padding: 10px;">
                                                                    Đang xử lý
                                                                </span>
                                                            @elseif( $order->status == 'Confirmed')
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #19A7CE;padding: 10px;">
                                                                    Đã xác nhận
                                                                </span>
                                                            @elseif( $order->status == 'Processing')
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #146C94;padding: 10px;">
                                                                    Đang soạn
                                                                </span>
                                                            @elseif( $order->status == 'Picked')
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #8D7B68;padding: 10px;">
                                                                    Đang soạn
                                                                </span>
                                                            @elseif( $order->status == 'Shipped')
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #A4907C;padding: 10px;">
                                                                    Đang trên đường đến
                                                                </span>
                                                            @elseif( $order->status == 'Delivered')

                                                                @if($order->return_order == 1)
                                                                    <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #DF2E38;padding: 10px;">
                                                                        Return requested
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #7AA874;padding: 10px;">
                                                                        Đã hoàn tất
                                                                    </span>
                                                                @endif
                                                            @else
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #DF2E38;padding: 10px;">
                                                                    Đã hủy
                                                                </span>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <a href="{{ url('order_details/'.$order->id ) }}" class="axil-btn btn-bg-primary" style="font-size: 13px;">Chi tiết</a>
                                                            <a target="_blank" href="{{ url('invoice_download/'.$order->id ) }}" class="axil-btn btn-bg-primary" style="font-size: 13px;"><i class="fa fa-download"></i>Invoice
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>
                            </div>

                            {{-- password change tab --}}
                            <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" method="post" action="{{ route('user.password.update') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="title">Thay đổi mật khẩu</h5>
                                                    <div class="form-group">
                                                        <label>Mật khẩu cũ</label>
                                                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                                                        @if($errors->has('current_password'))
                                                               <div class="error" style="color: red;">{{ $errors->first('current_password') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mật khẩu mới</label>
                                                        <input type="password" name="password" id="password" class="form-control" required>
                                                        @if($errors->has('password'))
                                                               <div class="error" style="color: red;">{{ $errors->first('password') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nhập lại mật khẩu mới</label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                                        @if($errors->has('password_confirmation'))
                                                               <div class="error" style="color: red;">{{ $errors->first('password_confirmation') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="LƯU THAY ĐỔI">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- password change tab --}}
                            
                            {{-- account tab --}}
                            <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>User Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>User Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>User Avatar</label>
                                                        <input type="file" class="form-control" name="profile_photo_path">
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-lg-12">
                                                    <h5>Địa chỉ bên dưới sẽ là địa chỉ mặc định để giao hàng</h5>
                                                    <div class="form-group">
                                                        <label>Địa chỉ nhận hàng</label>
                                                        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mb--0">
                                                    <input type="submit" class="axil-btn" value="LƯU THAY ĐỔI">
                                                </div>
                                                    
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- account tab --}}


                            {{-- return order tab --}}
                            <div class="tab-pane fade" id="nav-returnOrders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        @php
                                            $id = Auth::user()->id;
                                            $user = App\Models\User::find($id);
                                            $orders = App\Models\Order::where('user_id', $id)->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
                                            //dd($id);
                                        @endphp
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 15%">Invoice</th>
                                                    <th scope="col" style="width: 15%">Đơn giá</th>
                                                    <th scope="col">Phương thức thanh toán</th>
                                                    <th scope="col">Lý do</th>
                                                    <th scope="col">Tình trạng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <th scope="row">#{{ $order->invoice_no }}</th>
                                                        <td>{{ number_format($order->amount) }}₫</td>
                                                        <td>
                                                            @if( $order->payment_type == 'cod')
                                                                Thanh toán khi nhận hàng
                                                            @elseif( $order->payment_type == 'transfer' )
                                                                Thanh toán bằng chuyển khoản
                                                            @else
                                                                Ví MoMo
                                                            @endif
                                                        </td>
                                                        <td>{{ $order->return_reason }}</td>
                                                        <td>
                                                            @if($order->return_order == 0)
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #CE5959;padding: 10px;">Chưa gửi yêu cầu
                                                                </span>
                                                            @elseif($order->return_order == 1)
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #CE5959;padding: 10px;">Đang xử lý
                                                                </span>
                                                            @elseif($order->return_order == 2)
                                                                <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #7AA874;padding: 10px;">Hoàn tất 
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- return order tab --}}


                            {{-- cancel order tab --}}
                            <div class="tab-pane fade" id="nav-cancelOrders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        @php
                                            $id = Auth::user()->id;
                                            $user = App\Models\User::find($id);
                                            $orders = App\Models\Order::where('user_id', $id)->where('status', 'Cancel')->orderBy('id', 'DESC')->get();
                                            //dd($id);
                                        @endphp
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Invoice</th>
                                                    <th scope="col">Đơn giá</th>
                                                    <th scope="col">Phương thức thanh toán</th>
                                                    <th scope="col">Tình trạng</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($orders as $order)
                                                    <tr>
                                                        <th scope="row">#{{ $order->invoice_no }}</th>
                                                        <td>{{ number_format($order->amount) }}₫</td>
                                                        <td>
                                                            @if( $order->payment_type == 'cod')
                                                                Thanh toán khi nhận hàng
                                                            @elseif( $order->payment_type == 'transfer' )
                                                                Thanh toán bằng chuyển khoản
                                                            @else
                                                                Ví MoMo
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-warning" style="font-size: 13px;background: #CE5959;padding: 10px;">Đã gửi yêu cầu
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('order_details/'.$order->id ) }}" class="axil-btn btn-bg-primary" style="font-size: 13px;">Chi tiết</a>
                                                            <a target="_blank" href="{{ url('invoice_download/'.$order->id ) }}" class="axil-btn btn-bg-primary" style="font-size: 13px;"><i class="fa fa-download"></i>Invoice
                                                            </a>
                                                        </td>
                                                    </tr>

                                                @empty
                                                <h2 class="text-danger"> Order Not Found</h2>
                                                @endforelse
                                                
                                            </tbody>
                                        </table>

                                        
                                    </div>
                                </div>
                            </div>
                            {{-- cancel order tab --}}


                            {{-- order tracking tab --}}
                            <div class="tab-pane fade" id="nav-order-tracking" role="tabpanel">
                                <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" method="post" action="{{ route('order.tracking') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="title">Theo dõi đơn hàng của bạn</h5>

                                                    <div class="form-group">
                                                        <label>Số Invoice</label>
                                                        <input type="text" name="invoice" class="form-control" required>
                                                        @if($errors->has('invoice'))
                                                               <div class="error" style="color: red;">{{ $errors->first('invoice') }}</div>
                                                        @endif
                                                    </div>

                                                    <div class="form-group mb--0">
                                                        <input type="submit" class="axil-btn" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- order tracking tab --}}





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->

    <!-- Start Axil Newsletter Area  -->
        {{-- @include('frontend.body.new_letters') --}}
    <!-- End Axil Newsletter Area  -->
































@endsection































