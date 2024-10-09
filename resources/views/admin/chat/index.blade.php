@extends('admin.layouts.master')

@section('title')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
                <!-- Sidebar Left -->
                <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
                    <div
                        class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                        <div class="avatar avatar-xl avatar-online w-px-75 h-px-75">
                            <img src="{{ asset('themes') }}/admin/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <h5 class="mt-3 mb-1">Admin</h5>
                        <span>UI/UX Designer</span>
                        <i class="mdi mdi-close mdi-20px cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay
                            data-target="#app-chat-sidebar-left"></i>
                    </div>
                    <div class="sidebar-body px-4 pb-4">
                        {{-- <div class="my-4 pt-2">
                            <label for="chat-sidebar-left-user-about" class="text-uppercase text-muted">Thông tin</label>
                            <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about mt-2" rows="3"
                                maxlength="120">Xin chào, chúng tôi viết thư này để thông báo rằng bạn đã đăng ký một kho lưu trữ trên GitHub.</textarea>
                        </div> --}}
                        <div class="my-4">
                            <p class="text-uppercase text-muted">Trạng thái</p>
                            <div class="d-grid gap-2">
                                <div class="form-check form-check-success">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="active"
                                        id="user-active" checked>
                                    <label class="form-check-label" for="user-active">Đang hoạt động</label>
                                </div>
                                <div class="form-check form-check-warning">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="away"
                                        id="user-away">
                                    <label class="form-check-label" for="user-away">Vắng mặt</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="busy"
                                        id="user-busy">
                                    <label class="form-check-label" for="user-busy">Không Làm phiền</label>
                                </div>
                                <div class="form-check form-check-secondary">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="offline"
                                        id="user-offline">
                                    <label class="form-check-label" for="user-offline">Ngoại tuyến</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <p class="text-uppercase text-muted mb-2">Cài đặt</p>
                            <ul class="list-unstyled d-grid gap-3 ms-2">
                                <li>
                                    <i class="mdi mdi-check-circle-outline me-1"></i>
                                    <span class="align-middle">Xác minh hai bước</span>
                                </li>
                                <li>
                                    <i class="mdi mdi-bell-outline me-1"></i>
                                    <span class="align-middle">Thông báo</span>
                                </li>
                                <li>
                                    <i class="mdi mdi-account-outline me-1"></i>
                                    <span class="align-middle">Mời bạn bè</span>
                                </li>
                                <li>
                                    <i class="mdi mdi-delete-outline me-1"></i>
                                    <span class="align-middle">Xóa tài khoản</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mt-4">
                            <button class="btn btn-primary" data-bs-toggle="sidebar" data-overlay
                                data-target="#app-chat-sidebar-left">Đăng xuất</button>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Left-->

                <!-- Chat & Contacts -->
                <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end"
                    id="app-chat-contacts">
                    <div class="sidebar-header py-3 px-4 border-bottom">
                        <div class="d-flex align-items-center me-3 me-lg-0">
                            <div class="flex-shrink-0 avatar avatar-online me-3" data-bs-toggle="sidebar"
                                data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                                <img class="user-avatar rounded-circle cursor-pointer"
                                    src="{{ asset('themes') }}/admin/img/avatars/1.png" alt="Avatar">
                            </div>
                            <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                                <span class="input-group-text" id="basic-addon-search31"><i
                                        class="mdi mdi-magnify lh-1"></i></span>
                                <input type="text" class="form-control chat-search-input" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="basic-addon-search31">
                            </div>
                        </div>
                        <i class="mdi mdi-close mdi-20px cursor-pointer position-absolute top-0 end-0 mt-2 me-2 fs-4 d-lg-none d-block"
                            data-overlay data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                    </div>
                    <div class="sidebar-body">

                        <!-- Chats -->
                        <ul class="list-unstyled chat-contact-list" id="chat-list">
                            <li class="chat-contact-list-item chat-contact-list-item-title">
                                <h5 class="text-primary mb-0">Trò chuyện</h5>
                            </li>
                            <li class="chat-contact-list-item chat-list-item-0 d-none">
                                <h6 class="text-muted mb-0">Không tìm thấy cuộc trò chuyện nào</h6>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar avatar-online">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/13.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="chat-contact-name text-truncate fw-normal m-0">Nguyễn Văn Dương
                                            </h6>
                                            <small class="text-muted">5 phút</small>
                                        </div>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Giới thiệu bạn bè.
                                            Nhận
                                            phần thưởng.</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item active">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar avatar-offline">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="chat-contact-name text-truncate fw-normal m-0">Felecia Rower</h6>
                                            <small class="text-muted">30 Minutes</small>
                                        </div>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">I will purchase it for
                                            sure. 👍</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar avatar-busy">
                                        <span class="avatar-initial rounded-circle bg-label-success">CM</span>
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="chat-contact-name text-truncate fw-normal m-0">Calvin Moore</h6>
                                            <small class="text-muted">1 Day</small>
                                        </div>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">If it takes long you
                                            can mail inbox user</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- Contacts -->
                        <ul class="list-unstyled chat-contact-list" id="contact-list">
                            <li class="chat-contact-list-item chat-contact-list-item-title">
                                <h5 class="text-primary mb-0">Contacts</h5>
                            </li>
                            <li class="chat-contact-list-item contact-list-item-0 d-none">
                                <h6 class="text-muted mb-0">No Contacts Found</h6>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Natalie Maxwell</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">UI/UX Designer</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/5.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Jess Cook</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Business Analyst</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="avatar d-block flex-shrink-0">
                                        <span class="avatar-initial rounded-circle bg-label-primary">LM</span>
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Louie Mason</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Resource Manager</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/7.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Krystal Norton</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Business Executive</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/8.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Stacy Garrison</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Marketing Ninja</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="avatar d-block flex-shrink-0">
                                        <span class="avatar-initial rounded-circle bg-label-success">CM</span>
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Calvin Moore</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">UX Engineer</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/10.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Mary Giles</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Account Department</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/13.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Waldemar Mannering</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">AWS Support</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="avatar d-block flex-shrink-0">
                                        <span class="avatar-initial rounded-circle bg-label-danger">AJ</span>
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Amy Johnson</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Frontend Developer</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">Felecia Rower</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Cloud Engineer</p>
                                    </div>
                                </a>
                            </li>
                            <li class="chat-contact-list-item mb-3">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/11.png" alt="Avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate fw-normal m-0">William Stephens</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">Backend Developer</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Chat contacts -->

                <!-- Chat History -->
                <div class="col app-chat-history">
                    <div class="chat-history-wrapper">
                        <div class="chat-history-header border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex overflow-hidden align-items-center">
                                    <i class="mdi mdi-menu mdi-24px cursor-pointer d-lg-none d-block me-3"
                                        data-bs-toggle="sidebar" data-overlay data-target="#app-chat-contacts"></i>
                                    <div class="flex-shrink-0 avatar avatar-online">
                                        <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                            class="rounded-circle" data-bs-toggle="sidebar" data-overlay
                                            data-target="#app-chat-sidebar-right">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="m-0 fw-normal">Felecia Rower</h6>
                                        <span class="user-status text-muted">NextJS developer</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i
                                        class="mdi mdi-phone-outline mdi-24px cursor-pointer d-sm-block d-none btn btn-text-secondary btn-icon rounded-pill"></i>
                                    <i
                                        class="mdi mdi-video-outline mdi-24px cursor-pointer d-sm-block d-none btn btn-text-secondary btn-icon rounded-pill"></i>
                                    <i
                                        class="mdi mdi-magnify mdi-24px cursor-pointer d-sm-block d-none btn btn-text-secondary btn-icon rounded-pill"></i>
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="true" id="chat-header-actions"><i
                                                class="mdi mdi-dots-vertical mdi-24px"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="chat-header-actions">
                                            <a class="dropdown-item" href="javascript:void(0);">View Contact</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mute Notifications</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Clear Chat</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history-body">
                            <ul class="list-unstyled chat-history">
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">How can we help? We're here for you! 😄</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='mdi mdi-check-all mdi-14px text-success me-1'></i>
                                                <small>10:00 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Hey John, I am looking for the best admin template.</p>
                                                <p class="mb-0">Could you please help me to find it out? 🤔</p>
                                            </div>
                                            <div class="chat-message-text mt-3">
                                                <p class="mb-0">It should be Bootstrap 5 compatible.</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:02 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Materio has all the components you'll ever need in a app.
                                                </p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='mdi mdi-check-all mdi-14px text-success me-1'></i>
                                                <small>10:03 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Looks clean and fresh UI. 😃</p>
                                            </div>
                                            <div class="chat-message-text mt-3">
                                                <p class="mb-0">It's perfect for my next project.</p>
                                            </div>
                                            <div class="chat-message-text mt-3">
                                                <p class="mb-0">How can I purchase it?</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:05 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Thanks, you can purchase it.</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='mdi mdi-check-all mdi-14px text-success me-1'></i>
                                                <small>10:06 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">I will purchase it for sure. 👍</p>
                                            </div>
                                            <div class="chat-message-text mt-3">
                                                <p class="mb-0">Thanks.</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:08 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Great, Feel free to get in touch.</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='mdi mdi-check-all mdi-14px text-success me-1'></i>
                                                <small>10:10 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Do you have design files for Materio?</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:15 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1 w-50">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Yes that's correct documentation file, Design files are
                                                    included with the template.</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='mdi mdi-check-all mdi-14px me-1'></i>
                                                <small>10:15 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('themes') }}/admin/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Chat message form -->
                        <div class="chat-history-footer">
                            <form class="form-send-message d-flex justify-content-between align-items-center ">
                                <input class="form-control message-input me-3 shadow-none"
                                    placeholder="Type your message here">
                                <div class="message-actions d-flex align-items-center">
                                    <i
                                        class="btn btn-text-secondary btn-icon rounded-pill speech-to-text mdi mdi-microphone mdi-20px cursor-pointer text-heading"></i>
                                    <label for="attach-doc" class="form-label mb-0">
                                        <i
                                            class="mdi mdi-paperclip mdi-20px cursor-pointer btn btn-text-secondary btn-icon rounded-pill me-2 ms-1 text-heading"></i>
                                        <input type="file" id="attach-doc" hidden>
                                    </label>
                                    <button class="btn btn-primary d-flex send-msg-btn">
                                        <span class="align-middle">Send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Chat History -->

                <!-- Sidebar Right -->
                <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
                    <div
                        class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                        <div class="avatar avatar-xl avatar-online w-px-75 h-px-75">
                            <img src="{{ asset('themes') }}/admin/img/avatars/4.png" alt="Avatar"
                                class="rounded-circle">
                        </div>
                        <h5 class="mt-3 mb-1">Felecia Rower</h5>
                        <span>NextJS Developer</span>
                        <i class="mdi mdi-close mdi-20px cursor-pointer close-sidebar d-block" data-bs-toggle="sidebar"
                            data-overlay data-target="#app-chat-sidebar-right"></i>
                    </div>
                    <div class="sidebar-body px-4">
                        <div class="my-4 pt-2">
                            <p class="text-uppercase mb-2 text-muted">About</p>
                            <p class="mb-0">A Next. js developer is a software developer who uses the Next. js framework
                                alongside ReactJS to build web applications.</p>
                        </div>
                        <div class="my-4 py-1">
                            <p class="text-uppercase mb-2 text-muted">Personal Information</p>
                            <ul class="list-unstyled d-grid gap-3 mb-0 ms-2">
                                <li class="d-flex align-items-center">
                                    <i class='mdi mdi-email-outline mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">josephGreen@email.com</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class='mdi mdi-phone mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">+1(123) 456 - 7890</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class='mdi mdi-clock-outline mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">Mon - Fri 10AM - 8PM</span>
                                </li>
                            </ul>
                        </div>
                        <div class="my-4">
                            <p class="text-uppercase text-muted mb-2">Options</p>
                            <ul class="list-unstyled d-grid gap-3 ms-2">
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='mdi mdi-bookmark-outline mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">Add Tag</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='mdi mdi-star-outline mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">Important Contact</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='mdi mdi-image-outline mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">Shared Media</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='mdi mdi-delete-outline mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">Delete Contact</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='mdi mdi-block-helper mdi-20px'></i>
                                    <span class="align-middle ms-2 ps-1">Block Contact</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Right -->

                <div class="app-overlay"></div>
            </div>
        </div>


    </div>
@endsection

@section('style-libs')
    <link rel="stylesheet" href="{{ asset('themes') }}/admin/vendor/css/pages/app-chat.css">
@endsection
@section('script-libs')
    <script src="{{ asset('themes') }}/admin/js/app-chat.js"></script>
@endsection
