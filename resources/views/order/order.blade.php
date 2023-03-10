@extends('layout.main')

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('layout.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
        @include('layout.navbar')

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</a></li>
              <li class="breadcrumb-item">Woocommerce</li>
              <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header">
                  @if(Session::has('flash_message'))
                  <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                  @endif
                  <a href="/order/create" class="btn btn-success"><i class="fas fa fa-plus-circle nav-icon"></i> Add Order </a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Fist Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Payment Method</th>
                      <th>Payment Total (Rp)</th>
                      <th>Payment Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if($orders)
                        @foreach($orders as $index => $list)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $list->id }}</td>
                          <td>{{ $list->billing->first_name }}</td>
                          <td>{{ $list->billing->last_name }}</td>
                          <td>{{ $list->billing->email }}</td>
                          <td>{{ $list->billing->phone }}</td>
                          <td>{{ $list->billing->address_1 }}</td>
                          <td>{{ $list->billing->city }}</td>
                          <td>{{ $list->payment_method_title }}</td>
                          <td>{{ $list->total }}</td>
                          <td>
                            <?php
                                if($list->status == 'completed'){
                                    echo "<span class='badge badge-success'>completed</span>";
                                } elseif($list->status == 'failed' ) {
                                    echo "<span class='badge badge-danger'>failed</span>";
                                } elseif($list->status == 'processing' ) {
                                    echo "<span class='badge badge-warning'>processing</span>";
                                } elseif($list->status == 'cancelled' ) {
                                    echo "<span class='badge badge-primary'>cancelled</span>";
                                } else {
                                    echo "<span class='badge badge-secondary'>On-hold</span>";
                                }
                            ?>
                          </td>
                        <td width="100">
                            <a href="/order/edit/{{$list->id}}"
                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>
                            <br>
                            <br>
                            <a href="/order/destroy/{{ $list->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                        </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">
              
            </div>
          </div>

          <!-- Modal Logout -->
          @include('layout.modal_logout')
          <!--end-->

        </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

</body>

