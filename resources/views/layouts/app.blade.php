<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SK Mart Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
    }
    .sidebar {
      height: 100vh;
      width: 250px;
      background: #343a40;
      color: white;
      position: fixed;
      padding: 15px;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
      overflow-x: hidden;
      scrollbar-width: none;
      -ms-overflow-style: none;
      transition: all 0.3s ease;
      z-index: 1030;
    }

    .sidebar::-webkit-scrollbar {
      display: none;
    }

    .sidebar-brand {
      position: sticky;
      top: 0;
      background: #343a40;
      z-index: 1000;
      padding: 10px;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      padding: 8px;
      font-size: 13px;
    }
    .sidebar a:hover {
      background: #495057;
      border-radius: 5px;
    }
    .sidebar .nav-item {
      list-style: none;
    }
    .sidebar .dropdown-menu {
      background: #495057;
      border: none;
    }
    .sidebar .dropdown-item {
      color: white;
    }
    .sidebar .dropdown-item:hover {
      background: #6c757d;
    }
    .icon {
      margin-right: 10px;
    }
    .main-content {
      padding: 10px;
      margin-left: 250px;
      transition: all 0.3s ease;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 20px;
    }

    .stat-card {
      border-radius: 10px;
      overflow: hidden;
      position: relative;
    }

    .stat-card .icon {
      position: absolute;
      top: 20px;
      right: 20px;
      opacity: 0.3;
      font-size: 2rem;
    }

    .stat-card .stat-number {
      font-size: 1.8rem;
      font-weight: 700;
      margin: 10px 0;
    }

    .stat-card .stat-change {
      display: flex;
      align-items: center;
      margin-bottom: 0;
    }

    .stat-card .stat-change i {
      margin-right: 5px;
    }

    .navbar {
      background-color: white;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
      padding: 0.5rem 1rem;
    }

    .navbar-toggler {
      border: none;
      padding: 0;
    }

    .navbar-toggler:focus {
      box-shadow: none;
    }

    .navbar-brand {
      font-weight: bold;
    }

    .nav-icon {
      color: #6c757d;
      margin-left: 15px;
      font-size: 1.2rem;
      position: relative;
    }

    .btn-pos {
      background-color: #ff3030;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 4px;
      font-weight: 500;
    }

    .badge-notification {
      position: absolute;
      top: -8px;
      right: -8px;
      background-color: #ff0000;
      color: white;
      border-radius: 50%;
      padding: 0.2rem 0.5rem;
      font-size: 0.7rem;
    }

    .user-icon {
      background-color: #1a73e8;
      color: white;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: 1rem;
    }

    .user-info {
      display: flex;
      flex-direction: column;
      margin-left: 0.5rem;
      font-size: 0.8rem;
    }

    .user-role {
      font-weight: 500;
    }

    .user-status {
      color: #666;
      display: flex;
      align-items: center;
    }

    .status-indicator {
      width: 10px;
      height: 10px;
      background-color: #2ecc71;
      border-radius: 50%;
      display: inline-block;
      margin-left: 5px;
    }

    @media (max-width: 768px) {
      .sidebar {
        left: -250px;
      }

      .sidebar.show {
        left: 0;
      }

      .main-content {
        margin-left: 0;
      }

      .backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1025;
        display: none;
      }

      .backdrop.show {
        display: block;
      }
    }

    /* For sidebar toggle functionality */
    body.sidebar-collapsed .sidebar {
      left: -250px;
    }

    body.sidebar-collapsed .main-content {
      margin-left: 0;
    }
  </style>
</head>
<body>
  <div class="backdrop" id="backdrop"></div>

  <div class="sidebar" id="sidebar">
     <div class="sidebar-brand d-flex align-items-center">
        <i class="fa-solid fa-cart-plus py-2 mx-2 fs-6"></i>
        <span class="p-2 fs-6">SK Mart</span>
     </div>
     <ul class="nav flex-column mt-3" id="sidebarMenu">
        <li class="nav-item p-2">
            <a class="nav-link" href="">
                <i class="fas fa-home icon"></i> Home
            </a>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#usersMenu" data-bs-parent="#sidebarMenu">
                <i class="fas fa-users icon"></i> Products <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="usersMenu" data-bs-parent="#sidebarMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('categories.index') }}">
                        <i class="fas fa-th-large m-2"></i> Categories
                    </a>
                </li>

                <li>
                    <a class="nav-link ms-4" href="{{ route('products.create') }}">
                        <i class="fas fa-plus-circle m-2"></i> Create Products
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('products.index') }}">
                        <i class="fas fa-box-open m-2"></i> All Products
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('barcodes.create') }}">
                        <i class="fas fa-barcode m-2"></i> Barcode Print
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#productsMenu">
                <span><i class="fas fa-shopping-cart icon"></i> Stock Adjustment</span>
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled" id="productsMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('stock-adjustments.create') }}">
                        <i class="fas fa-sliders-h m-1"></i> <span class="ms-2">Create Adjustment</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('stock-adjustments.index') }}">
                        <i class="fas fa-list-alt m-1"></i> <span class="ms-2">All Adjustments</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#analyticsMenu" data-bs-parent="#sidebarMenu">
                <i class="fas fa-chart-bar icon"></i> Quotations <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="analyticsMenu" data-bs-parent="#sidebarMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('quotations.create') }}">
                        <i class="fas fa-file-invoice m-2"></i> Create Quotation
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('quotations.index') }}">
                        <i class="fas fa-list m-2"></i> All Quotations
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#purchasesMenu">
                <i class="fas fa-shopping-cart icon"></i> Purchases <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="purchasesMenu">
                <li><a class="nav-link ms-4" href="{{ route('purchases.create') }}"><i class="fas fa-plus-circle m-2"></i> Create Purchase</a></li>

                <li><a class="nav-link ms-4" href="{{ route('purchases.index') }}"><i class="fas fa-list m-2"></i> All Purchases</a></li>
            </ul>
        </li>


        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#purchaseReturnMenu">
                <i class="fas fa-undo icon"></i> Purchase Return <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="purchaseReturnMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('purchase-returns.create') }}">
                        <i class="fas fa-plus-circle m-2"></i> Create Purchase Return
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('purchase-returns.index') }}">
                        <i class="fas fa-list m-2"></i> All Purchase Returns
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#salesMenu">
                <i class="fas fa-shopping-bag icon"></i> Sales <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="salesMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('sales.create') }}">
                        <i class="fas fa-plus-circle m-2"></i> Create Sale
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('sales.index') }}">
                        <i class="fas fa-list m-2"></i> All Sales
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#salesReturnMenu">
                <i class="fas fa-undo icon"></i> Sales Return <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="salesReturnMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('sale_returns.create') }}">
                        <i class="fas fa-plus-circle m-2"></i> Create Return Sale
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('sale_returns.index') }}">
                        <i class="fas fa-list m-2"></i> All Return Sales
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#expensesMenu">
                <i class="fas fa-wallet icon"></i> Expenses <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="expensesMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('expenses.create') }}">
                        <i class="fas fa-plus-circle m-2"></i> Create Expense
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('expenses.index') }}">
                        <i class="fas fa-list m-2"></i> All Expenses
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#partiesMenu">
                <i class="fas fa-users icon "></i> Parties <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="partiesMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('customers.index') }}">
                        <i class="fas fa-users m-2"></i> All Customers
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('suppliers.index') }}">
                        <i class="fas fa-truck m-2"></i> All Suppliers
                    </a>
                </li>
            </ul>

        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#reportsMenu">
                <i class="fas fa-chart-line icon"></i> Reports <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="reportsMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('profit_losses.create') }}">
                        <i class="fas fa-chart-pie m-2"></i> Profit/Loss Report
                    </a>

                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('payment_reports.index') }}">
                        <i class="fas fa-file-invoice-dollar m-2"></i> Payments Report
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('sale-reports.index') }}">
                        <i class="fas fa-chart-bar m-2"></i> Sales Report
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('purchase-reports.index') }}">
                        <i class="fas fa-shopping-cart m-2"></i> Purchases Report
                    </a>

                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('sale-reports.index') }}">
                        <i class="fas fa-undo m-2"></i> Sales Return Report
                    </a>
                </li>

                <li>
                    <a class="nav-link ms-4" href="{{ route('purchase-reports.index') }}">
                        <i class="fas fa-file-invoice-dollar m-2"></i> Purchases Report Report
                    </a>
                </li>



            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#userManagementMenu">
                <i class="fas fa-users-cog icon"></i> User Managements <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="userManagementMenu">
                <li>
                    <a class="nav-link ms-4" href="{{ route('users.create') }}">
                        <i class="fas fa-user-plus m-2"></i> Create User
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('users.index') }}">
                        <i class="fas fa-users m-2"></i> All Users
                    </a>
                </li>


                <li>
                    <a class="nav-link ms-4" href="{{ route('roles.index') }}">
                        <i class="fas fa-list-alt m-2"></i> Role $ Permissions
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#settingsMenu">
                <i class="fas fa-tools icon m-2"></i> Setting <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="settingsMenu">

                <li>
                    <a class="nav-link ms-4" href="{{ route('units.index') }}">
                        <i class="fas fa-list m-2"></i> All Units
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="{{ route('currencies.index') }}">
                        <i class="fas fa-list m-2"></i> All Currencies
                    </a>
                </li>

                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-cogs m-2"></i> System Setting
                    </a>
                </li>
            </ul>
        </li>
     </ul>
  </div>

  <main class="main-content">
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" id="sidebarToggle">
          <i class="fas fa-bars"></i>
        </button>
        <span class="navbar-brand d-md-none">SK Mart</span>

        <div class="d-flex ms-auto">


          <button class="btn btn-pos me-3" style="border-radius: 25px">
            <i class="fas fa-shopping-cart me-1"></i> POS System
          </button>

          <a href="#" class="nav-icon position-relative">
            <i class="fas fa-bell"></i>
            <span class="badge-notification">2</span>
          </a>

          <a href="#" class="nav-icon">
            <i class="fas fa-envelope"></i>
          </a>

          <div class="d-flex align-items-center ms-3">
            <div class="user-icon">
              <i class="fas fa-power-off"></i>
            </div>
            <div class="user-info">
                <span class="user-role">Administrator</span>
                <span class="user-status">Offline</span>
              </div>

          </div>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="card stat-card bg-primary text-white">
            <div class="card-body">
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <h5 class="card-title">Users</h5>
              <h2 class="stat-number">2,845</h2>
              <p class="stat-change"><i class="fas fa-arrow-up"></i> 12.5%</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="card stat-card bg-success text-white">
            <div class="card-body">
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <h5 class="card-title">Revenue</h5>
              <h2 class="stat-number">$24,582</h2>
              <p class="stat-change"><i class="fas fa-arrow-up"></i> 8.3%</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="card stat-card bg-warning text-white">
            <div class="card-body">
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <h5 class="card-title">Orders</h5>
              <h2 class="stat-number">1,253</h2>
              <p class="stat-change"><i class="fas fa-arrow-down"></i> 3.7%</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
          <div class="card stat-card bg-danger text-white">
            <div class="card-body">
              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <h5 class="card-title">Visits</h5>
              <h2 class="stat-number">45,973</h2>
              <p class="stat-change"><i class="fas fa-arrow-up"></i> 15.2%</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    @yield('content')

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Sidebar toggle functionality
      const sidebar = document.getElementById('sidebar');
      const backdrop = document.getElementById('backdrop');
      const sidebarToggle = document.getElementById('sidebarToggle');
      const body = document.body;

      // Function to toggle sidebar
      function toggleSidebar() {
        if (window.innerWidth < 768) {
          // Mobile behavior - show/hide with backdrop
          sidebar.classList.toggle('show');
          backdrop.classList.toggle('show');
        } else {
          // Desktop behavior - collapse/expand
          body.classList.toggle('sidebar-collapsed');
        }
      }

      // Event listeners
      sidebarToggle.addEventListener('click', toggleSidebar);
      backdrop.addEventListener('click', function() {
        sidebar.classList.remove('show');
        backdrop.classList.remove('show');
      });

      // Handle window resize
      window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
          sidebar.classList.remove('show');
          backdrop.classList.remove('show');
        }
      });

      // Initialize charts if they exist
      const salesCanvas = document.getElementById('salesChart');
      const trafficCanvas = document.getElementById('trafficChart');

      if (salesCanvas && trafficCanvas) {
        const salesCtx = salesCanvas.getContext('2d');
        const salesChart = new Chart(salesCtx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
              label: 'Sales 2025',
              data: [12, 19, 15, 17, 14, 18, 21, 23, 19, 24, 28, 30],
              backgroundColor: 'rgba(0, 123, 255, 0.1)',
              borderColor: 'rgba(0, 123, 255, 1)',
              borderWidth: 2,
              tension: 0.3,
              fill: true
            }, {
              label: 'Sales 2024',
              data: [10, 15, 12, 14, 12, 15, 17, 19, 15, 20, 22, 25],
              backgroundColor: 'rgba(108, 117, 125, 0.1)',
              borderColor: 'rgba(108, 117, 125, 1)',
              borderWidth: 2,
              tension: 0.3,
              fill: true
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'top',
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: {
                  drawBorder: false
                }
              },
              x: {
                grid: {
                  display: false
                }
              }
            }
          }
        });

        const trafficCtx = trafficCanvas.getContext('2d');
        const trafficChart = new Chart(trafficCtx, {
          type: 'doughnut',
          data: {
            labels: ['Direct', 'Social', 'Referral', 'Organic'],
            datasets: [{
              data: [35, 25, 15, 25],
              backgroundColor: [
                'rgba(0, 123, 255, 0.8)',
                'rgba(40, 167, 69, 0.8)',
                'rgba(255, 193, 7, 0.8)',
                'rgba(220, 53, 69, 0.8)'
              ],
              borderWidth: 0
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'bottom'
              }
            },
            cutout: '70%'
          }
        });
      }
    });
  </script>
</body>
</html>
