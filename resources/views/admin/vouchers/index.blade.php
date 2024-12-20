@extends('admin.layouts.master')
@section('title')
    Danh sách voucher
@endsection

@section('menu-item-voucher')
    open
@endsection

@section('menu-sub-index-voucher')
    active
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4>
            <span class="text-muted fw-light">Khuyến Mãi /</span> Danh sách khuyến mãi
        </h4>
        
        @if (session()->has('success'))
            <div class="alert alert-success fw-bold">
                {{ session()->get('success') }}
            </div>
        @endif
        
        <div class="card-header d-flex justify-content-end align-items-center mb-3">
            <a class="btn btn-primary" href="{{ route('vouchers.create') }}">
                <i class="mdi mdi-plus me-0 me-sm-1"></i>Thêm Khuyến mãi
            </a>
        </div>
        
        <div class="card">
            <div class="card-body">
                <table id="example" class="text-center table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Code</th>
                            <th>Giá trị giảm giá</th>
                            <th>Loại giảm giá</th>
                            <th>Số lượng</th>
                            <th>Số lần đã sử dụng</th>
                            <th>Giá trị đơn hàng tối thiểu</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $voucher)
                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- Sử dụng $loop->iteration để hiển thị STT -->
                                <td>{{ $voucher->code }}</td>
                                <td>
                                    {{ $voucher->discount_type === 'money' ? number_format($voucher->discount_value, 0, ',', '.') . ' VNĐ' : $voucher->discount_value . '%' }}
                                </td>
                                <td>
                                    {{ $voucher->discount_type === 'money' ? 'Giảm giá theo tiền' : 'Giảm giá theo phần trăm' }}
                                </td>
                                <td>{{ $voucher->quantity }}</td>
                                <td>{{ $voucher->used }}</td>
                                <td>{{ number_format($voucher->minimum_order_value, 0, ',', '.') . ' VNĐ' }}</td>
                                <td>{{ \Carbon\Carbon::parse($voucher->start_date)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show" class="btn btn-info btn-sm me-1" href="{{ route('vouchers.show', $voucher->id) }}">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Update" class="btn btn-warning btn-sm me-1" href="{{ route('vouchers.edit', $voucher->id) }}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete" class="btn btn-danger btn-sm me-1" onclick="return confirm('Bạn có muốn chuyển vào thùng rác?')">
                                                <i class="mdi mdi-delete-circle"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ]
        });
    </script>
@endsection
