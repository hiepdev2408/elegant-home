@extends('admin.layouts.master')
@section('title')
    Chi tiết đơn hàng
@endsection
@section('menu-item-order', 'active')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Đơn Hàng /</span> Chi tiết đơn hàng
        </h4>
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">

            <div class="d-flex flex-column justify-content-center">
                <div class="d-flex">
                    <h5 class="mb-0">Order #{{ $order->id }}</h5>
                    <span
                        class="badge
                        @switch($order->status_payment)
                            @case('pending') bg-label-warning mx-2 rounded-pill text-dark @break
                            @case('unpaid') bg-label-secondary mx-2 rounded-pill text-white @break
                            @case('Paid') bg-label-success mx-2 rounded-pill @break
                            @default bg-secondary
                        @endswitch">
                        {{ [
                            'pending' => 'Chờ xác nhận',
                            'unpaid' => 'Chưa Thanh Toán',
                            'Paid' => 'Đã Thanh Toán',
                        ][$order->status_payment] ?? 'Không rõ' }}
                    </span>
                    <span
                        class="badge
                        @switch($order->status_order)
                            @case('pending') bg-label-warning rounded-pill text-dark @break
                            @case('confirmed') bg-label-secondary rounded-pill text-white @break
                            @case('shipping') bg-label-primary rounded-pill @break
                            @case('delivered') bg-label-success rounded-pill @break
                            @case('completed') bg-label-info rounded-pill @break
                            @case('canceled') bg-label-danger rounded-pill @break
                            @case('return_request') bg-label-danger rounded-pill @break
                            @case('return_approved') bg-label-danger rounded-pill @break
                            @case('returned_item_received') bg-label-danger rounded-pill @break
                            @case('refund_completed') bg-label-danger rounded-pill @break
                            @default bg-secondary
                        @endswitch">
                        {{ [
                            'pending' => 'Chờ xác nhận',
                            'confirmed' => 'Xác nhận',
                            'shipping' => 'Chờ giao hàng',
                            'delivered' => 'Đang giao hàng',
                            'completed' => 'Đã nhận hàng',
                            'canceled' => 'Đã hủy',
                            'return_request' => 'Yêu cầu trả hàng',
                            'return_approved' => 'Chấp nhận trả hàng',
                            'returned_item_received' => 'Đã nhận được hàng trả lại',
                            'refund_completed' => 'Hoàn tiền thành công',
                        ][$order->status_order] ?? 'Không rõ' }}
                    </span>
                </div>
                <p class="mt-1 mb-0">Ngày
                    {{ $order->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d') }}, Tháng
                    {{ $order->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('m') }} Năm <span id="orderYear"></span>,
                    {{ $order->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('h:i A') }}</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-2">
                <a class="btn btn-info" href="{{ route('orders.index') }}">Quay Lại</a>

                @if ($order->status_order == 'pending')
                    <form action="{{ route('orders.confirmed', $order->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có chắc chắn?')">Xác
                            nhận</button>
                    </form>
                @elseif ($order->status_order == 'confirmed')
                    <form action="{{ route('orders.shipping', $order->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn?')">Chờ
                            giao hàng</button>
                    </form>
                @elseif ($order->status_order == 'shipping')
                    <form action="{{ route('orders.delivered', $order->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Bạn có chắc chắn?')">Đang
                            giao hàng</button>
                    </form>
                @elseif ($order->status_order == 'canceled')
                    <form action="" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                @elseif ($order->status_order == 'return_request')
                    <form action="{{ route('orders.return_request', $order->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                    </form>
                @elseif ($order->status_order == 'return_approved')
                    <form action="{{ route('orders.returned_item_received', $order->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Kiểm tra hàng hoàn</button>
                    </form>
                @elseif ($order->status_order == 'returned_item_received')
                    <form action="{{ route('orders.refund_completed', $order->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hoàn tiền</button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Order Details Table -->

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title m-0">Chi tiết đơn hàng</h5>
                    </div>
                    <div class="card-datatable table-responsive">
                        <table class="datatables-order-details table">
                            <thead>
                                <tr>
                                    <th class="w-50">Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $item)
                                    <tr>
                                        <td>
                                            @if ($item->product)
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="avatar me-2 pe-1">
                                                        @if ($item->product->img_thumbnail)
                                                            <img src="{{ Storage::url($item->product->img_thumbnail) }}"
                                                                width="50px" alt="">
                                                        @else
                                                            <img src="{{ asset('images/default-thumbnail.png') }}"
                                                                width="50px" alt="Default Image">
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span>{{ $item->product->name }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <span>{{ $item->product->name }}</span>
                                            @else
                                                <div class="d-flex justify-content-start align-items-center mb-1">
                                                    <div class="avatar me-2 pe-1">
                                                        @if ($item->variant && $item->variant->product->img_thumbnail)
                                                            <img class="rounded-2"
                                                                src="{{ Storage::url($item->variant->product->img_thumbnail) }}"
                                                                width="50px" alt="">
                                                        @else
                                                            <img src="{{ asset('images/default-thumbnail.png') }}"
                                                                width="50px" alt="Default Image">
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <strong>{{ optional($item->variant)->product->name }}
                                                        </strong>
                                                    </div>
                                                </div>
                                                {{-- <br> --}}
                                                <span>
                                                    @foreach ($item->variant->attributes as $attribute)
                                                        @if (!$loop->first)
                                                            <br>
                                                        @endif
                                                        {{ $attribute->attribute->name }}:
                                                        @if (!$loop->first)
                                                        @endif
                                                        {{ $attribute->attributeValue->value }}.
                                                    @endforeach

                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($item->variant->price_modifier, 0, ',', '.') }} VND</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->total_amount, 0, ',', '.') }} VND</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end align-items-center m-3 p-1">
                            <div class="order-calculations">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="w-px-100 text-heading">Tổng cộng:</span>
                                    <h6 class="mb-0">{{ number_format($item->order->total_amount, 0, ',', '.') }} VND
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title m-0">Hoạt động vận chuyển</h5>
                    </div>
                    <div class="card-body mt-3">
                        <ul class="timeline pb-0 mb-0">
                            @php
                                $hasReceived = false;
                            @endphp

                            @foreach ($events as $item)
                                @if ($item->name === 'Đã nhận hàng')
                                    @php $hasReceived = true; @endphp
                                @endif
                            @endforeach

                            @foreach ($events as $item)
                                @if ($item->name !== 'Đang giao hàng' && $item->name !== 'Đã nhận hàng')
                                    <li
                                        class="timeline-item timeline-item-transparent {{ !$loop->last ? 'border-primary' : 'border-transparent' }}">
                                        <span class="timeline-point timeline-point-primary"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header">
                                                <h6 class="mb-0">{{ $item->name }}</h6>
                                                <span class="text-muted">{{ date('d/m/Y', strtotime($item->created_at)) }}
                                                    |
                                                    {{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('h:i A') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @elseif ($item->name === 'Đang giao hàng')
                                    {{-- Hiển thị trạng thái "Đang giao hàng" --}}
                                    <li
                                        class="timeline-item timeline-item-transparent {{ !$loop->last ? 'border-primary' : 'border-transparent' }}">
                                        <span class="timeline-point timeline-point-primary"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header">
                                                <h6 class="mb-0">{{ $item->name }}</h6>
                                                <span class="text-muted">{{ date('d/m/Y', strtotime($item->created_at)) }}
                                                    |
                                                    {{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('h:i A') }}</span>
                                            </div>
                                        </div>
                                    </li>

                                    {{-- Hiển thị "Đã nhận hàng" nếu chưa có trong danh sách --}}
                                    @if (!$hasReceived)
                                        <li class="timeline-item timeline-item-transparent border-transparent pb-0">
                                            <span class="timeline-point timeline-point-secondary"></span>
                                            <div class="timeline-event pb-0">
                                                <div class="timeline-header">
                                                    <h6 class="mb-0">Đã nhận hàng</h6>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @elseif ($item->name === 'Đã nhận hàng')
                                    <li
                                        class="timeline-item timeline-item-transparent {{ !$loop->last ? 'border-primary' : 'border-transparent' }}">
                                        <span class="timeline-point timeline-point-primary"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header">
                                                <h6 class="mb-0">{{ $item->name }}</h6>
                                                <span class="text-muted">{{ date('d/m/Y', strtotime($item->created_at)) }}
                                                    |
                                                    {{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('h:i A') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Chi tiết khách hàng</h6>
                        <div class="d-flex justify-content-start align-items-center mb-4">
                            <div class="avatar me-2">
                                @if ($order->user->avatar)
                                    <img src="{{ Storage::url($order->user->avatar) }}" alt="Avatar"
                                        class="rounded-circle">
                                @else
                                    <img src="{{ asset('themes/image/logo.jpg') }}" alt="Avatar"
                                        class="rounded-circle">
                                @endif

                            </div>
                            <div class="d-flex flex-column">
                                <a href="app-user-view-account.html">
                                    <h6 class="mb-1">{{ $order->user_name }}</h6>
                                </a>
                                <small>Mã khách hàng: #{{ $order->user->id }}</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start align-items-center mb-4">
                            <span
                                class="avatar rounded-circle bg-label-success me-2 d-flex align-items-center justify-content-center"><i
                                    class='mdi mdi-cart-plus mdi-24px'></i></span>
                            <h6 class="text-nowrap mb-0">{{ $order->count('user_id') }} Đơn Hàng</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Thông tin liên lạc</h6>
                            <h6 class="mb-2"><a href=" javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#editUser">Sửa</a></h6>
                        </div>
                        <p class=" mb-1">Email: {{ $order->user_email }}</p>
                        <p class=" mb-0">Số điện thoại: {{ $order->user_phone }}</p>
                    </div>
                </div>

                <div class="card mb-4">

                    <div class="card-header d-flex justify-content-between">
                        <h6 class="card-title m-0">Địa chỉ giao hàng</h6>
                        <h6 class="m-0"><a href=" javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#addNewAddress">Chỉnh sửa</a></h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">21 Xuân Phương <br>Quận/Huyện: <br>Tỉnh/Thành
                            phố: {{ $order->user_address }}<br>Việt Nam
                        </p>
                    </div>

                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <h6 class="card-title m-0">Địa chỉ thanh toán</h6>
                        <h6 class="m-0"><a href=" javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#addNewAddress">Chỉnh sửa</a></h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-4">45 Roker Terrace <br>Latheronwheel <br>KW5 8NW,London <br>UK</p>
                        <h6 class="mb-0 pb-2">Mastercard</h6>
                        <p class="mb-0">Card Number: ******4291</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body py-3 py-md-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Chỉnh sửa thông tin người dùng</h3>
                            <p class="pt-1">Cập nhật thông tin chi tiết của người dùng sẽ nhận được kiểm toán quyền riêng
                                tư.</p>
                        </div>
                        <form id="editUserForm" class="row g-4" onsubmit="return false">
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName"
                                        class="form-control" placeholder="John" />
                                    <label for="modalEditUserFirstName">Tên</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserLastName" name="modalEditUserLastName"
                                        class="form-control" placeholder="Doe" />
                                    <label for="modalEditUserLastName">Họ</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserName" name="modalEditUserName"
                                        class="form-control" placeholder="john.doe.007" />
                                    <label for="modalEditUserName">Tên người dùng</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalEditUserEmail" name="modalEditUserEmail"
                                        class="form-control" placeholder="example@domain.com" />
                                    <label for="modalEditUserEmail">Email</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">US (+1)</span>
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="modalEditUserPhone" name="modalEditUserPhone"
                                            class="form-control phone-number-mask" placeholder="202 555 0111" />
                                        <label for="modalEditUserPhone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Trạng thái</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Không hoạt động</option>
                                        <option value="3">Đã tạm dừng</option>
                                    </select>
                                    <label for="modalEditUserStatus">Trạng thái</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="switch">
                                    <input type="checkbox" class="switch-input">
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label">Sử dụng làm địa chỉ thanh toán?</span>
                                </label>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Gửi</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Hủy bỏ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Edit User Modal -->

        <!-- Add New Address Modal -->
        <div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body p-md-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="address-title mb-2 pb-1">Cập nhật địa chỉ</h3>
                            <p class="address-subtitle">Cập nhật địa chỉ để giao hàng</p>
                        </div>
                        <form id="addNewAddressForm" class="row g-4" onsubmit="return false">
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalAddressFirstName" name="modalAddressFirstName"
                                        class="form-control" placeholder="Nguyễn Dương" />
                                    <label for="modalAddressFirstName">Họ tên</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalAddressFirstName" name="modalAddressFirstName"
                                        class="form-control" placeholder="0876552004" />
                                    <label for="modalAddressFirstName">Số điện thoại</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalAddressAddress1" name="modalAddressAddress1"
                                        class="form-control" placeholder="Số 21" />
                                    <label for="modalAddressAddress1">Dòng địa chỉ 1</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalAddressAddress2" name="modalAddressAddress2"
                                        class="form-control" placeholder="Xuân Phương" />
                                    <label for="modalAddressAddress2">Dòng địa chỉ 2</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalAddressLandmark" name="modalAddressLandmark"
                                        class="form-control" placeholder="Quận Nam Từ Liêm" />
                                    <label for="modalAddressLandmark">Quận / Huyện</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="modalAddressCity" name="modalAddressCity"
                                        class="form-control" placeholder="Hà Nội" />
                                    <label for="modalAddressCity">Thành phố / Tỉnh</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Gửi</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Hủy bỏ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@section('script-libs')
    <script src="{{ asset('themes') }}/admin/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('themes') }}/admin/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('themes') }}/admin/js/app-ecommerce-order-details.js"></script>
@endsection
