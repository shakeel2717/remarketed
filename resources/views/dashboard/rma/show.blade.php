@extends('dashboard.layout.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <x-email-alert />
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body mb-3 mb-lg-5">
                <div class="row gx-lg-4">
                    <div class="col-sm-6 col-lg-3">
                        <div class="media">
                            <div class="media-body">
                                <h6 class="card-subtitle">Total Refund</h6>
                                <span
                                    class="card-title h3">{{ env('APP_CURRENCY_SYMBOL') }}{{ number_format($addInventory->sum('sale_price'), 2) }}</span>
                            </div>
                            <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                                <i class="tio-shop"></i>
                            </span>
                        </div>

                        <div class="d-lg-none">
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 column-divider-sm">
                        <div class="media">
                            <div class="media-body">
                                <h6 class="card-subtitle">Refunded</h6>
                                <span
                                    class="card-title h3">{{ env('APP_CURRENCY_SYMBOL') }}{{ number_format($rmaRefunds->sum('amount'), 2) }}</span>
                            </div>

                            <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                                <i class="tio-website"></i>
                            </span>
                        </div>

                        <div class="d-lg-none">
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 column-divider-lg">
                        <div class="media">
                            <div class="media-body">
                                <h6 class="card-subtitle">Refund Due</h6>
                                <span
                                    class="card-title h3">{{ env('APP_CURRENCY_SYMBOL') }}{{ number_format($addInventory->sum('sale_price') - $rmaRefunds->sum('amount'), 2) }}</span>
                            </div>

                            <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                                <i class="tio-label-off"></i>
                            </span>
                        </div>

                        <div class="d-sm-none">
                            <hr>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 column-divider-sm">
                        <div class="media">
                            <div class="media-body">
                                <h6 class="card-subtitle">Inventory Due</h6>
                                <span class="card-title h3">0</span>
                            </div>

                            <span class="icon icon-sm icon-soft-secondary icon-circle ml-3">
                                <i class="tio-users-switch"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <a class="card card-hover-shadow mb-4" id="addInventory" href="javascript:;">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/create.svg') }}"
                            alt="Image Description">

                        <div class="media-body">
                            <h3 class="text-hover-primary mb-1">Inventory</h3>
                            <span class="text-body">Add a new Inventory</span>
                        </div>

                        <div class="ml-2 text-right">
                            <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="card card-hover-shadow mb-4" id="addRefund" href="javascript:;">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/choice.svg') }}"
                            alt="Image Description">

                        <div class="media-body">
                            <h3 class="text-hover-primary mb-1">Refund</h3>
                            <span class="text-body">Add Refund</span>
                        </div>

                        <div class="ml-2 text-right">
                            <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="card card-hover-shadow" id="importRma" href="#">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/sending.svg') }}"
                            alt="Image Description">

                        <div class="media-body">
                            <h3 class="text-hover-primary mb-1">Import RMA</h3>
                            <span class="text-body">Import RMA from Excel File</span>
                        </div>

                        <div class="ml-2 text-right">
                            <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </a>
            <!-- End Card -->
        </div>
        <div class="col-lg-8 mb-3 mb-lg-5">
            <div class="card h-100">
                <!-- Header -->
                <div class="card-header">
                    <!-- Nav -->
                    <ul class="nav nav-segment" id="navTab1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-resultTab1" data-toggle="pill" href="#lnventoryData"
                                role="tab" aria-controls="lnventoryData" aria-selected="true">lnventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-htmlTab1" data-toggle="pill" href="#refundData" role="tab"
                                aria-controls="refundData" aria-selected="false">Refund</a>
                        </li>
                    </ul>
                    <!-- End Nav -->
                    <div class="text-right">
                        <!-- Unfold -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-sm btn-ghost-secondary rounded-circle"
                                href="javascript:;" data-hs-unfold-options='{
                               "target": "#teamsDropdownEg",
                               "type": "css-animation"
                             }'>
                                <i class="tio-more-vertical"></i>
                            </a>

                            <div id="teamsDropdownEg"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <a class="dropdown-item" id="showStatusModal" href="#">Change Status</a>
                            </div>
                        </div>
                        <!-- End Unfold -->
                    </div>
                </div>
                <!-- End Header -->

                <!-- Tab Content -->
                <div class="tab-content" id="navTabContent1">
                    <div class="tab-pane fade p-4 active show" id="lnventoryData" role="tabpanel"
                        aria-labelledby="nav-resultTab1">
                        <div class="">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Serial</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">Issue</th>
                                            <th scope="col">Sale Price</th>
                                            <th scope="col">Attachment</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($addInventory as $Inventory)
                                            <tr>
                                                <td>{{ $Inventory->serial }}</td>
                                                <td>{{ $Inventory->model }}</td>
                                                <td>{{ $Inventory->issue }}</td>
                                                <td>{{ $Inventory->sale_price }}</td>
                                                <td><?php if ($Inventory->creditNote != null) {
                                                    $folder = 'creditNote/';
                                                    echo '<a href="{{ asset($folder.$Inventory->creditNote) }}">Download</a>';
                                                } else {
                                                    echo 'No Attatchment';
                                                } ?></td>
                                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($Inventory->created_at))->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @empty
                                            <p class="text-center">No Record Found</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                        <!-- End Tab Content -->
                    </div>

                    <div class="tab-pane fade p-4" id="refundData" role="tabpanel" aria-labelledby="nav-htmlTab1">
                        <div class="">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">TX ID</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">CREDIT NOTE</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($rmaRefunds as $refund)
                                            <tr>
                                                <td>{{ $refund->method }}</td>
                                                <td>{{ $refund->txid }}</td>
                                                <td>{{ $refund->note }}</td>
                                                <td>{{ $refund->amount }}</td>
                                                <td><?php if ($refund->creditNote != null) {
                                                    $folder = 'creditNote/';
                                                    echo '<a href="{{ asset($folder.$Inventory->creditNote) }}">Download</a>';
                                                } else {
                                                    echo 'No Attatchment';
                                                } ?></td>
                                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($refund->created_at))->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @empty
                                            <p class="text-center">No Record Found</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
            <x-add-inventory :rma="$rma" :reasons="$reasons" />
            <x-add-refund :rma="$rma" />
            <x-import-rma-modal />
            <x-change-status :rma="$rma"/>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">RMA History</h3>
                    <hr>
                    @foreach ($rmaHistories as $rmaHistory)
                        <!-- Step -->
                        <ul class="step">
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <span class="step-icon step-icon-soft-primary">{{ $loop->iteration }}</span>
                                    <div class="step-content">
                                        <h4>{{ $rmaHistory->title }}</h4>
                                        <p class="step-text">{{ $rmaHistory->value }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- End Step -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $("#addInventory").click(function() {
                $('#customersGuideModal').modal('show')
            });
            $("#addRefund").click(function() {
                $('#addRefundModal').modal('show')
            });
            $("#importRma").click(function() {
                $('#importRmaModal').modal('show')
            });
            $("#showStatusModal").click(function() {
                $('#changeStatusModal').modal('show')
            });

        });
    </script>
    <script>
        $(document).on('ready', function() {
            // INITIALIZATION OF CUSTOM FILE
            // =======================================================
            $('.js-file-attach').each(function() {
                var customFile = new HSFileAttach($(this)).init();
            });
        });
    </script>
    <script src="{{ asset('assets/vendor/hs-file-attach/dist/hs-file-attach.min.js') }}"></script>
@endsection
