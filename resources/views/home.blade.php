<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Dashboard</title>
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
      padding: 20px;
      margin-left: 250px;
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
  </style>
</head>
<body>
  <div class="backdrop" id="backdrop"></div>

  <div class="sidebar" id="sidebar">
    <div class="sidebar-brand d-flex align-items-center">
        <i class="fa-solid fa-cart-plus py-2 mx-2 fs-6"></i>
        <span class=" p-2 fs-6">SK Mart</span>
    </div>
    <ul class="nav flex-column mt-3" id="sidebarMenu">
        <li class="nav-item p-2">
            <a class="nav-link" href="#">
                <i class="fas fa-home icon"></i> Home
            </a>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#usersMenu" data-bs-parent="#sidebarMenu">
                <i class="fas fa-users icon"></i> Products <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="usersMenu" data-bs-parent="#sidebarMenu">
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-th-large m-2"></i> Categories
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-plus-circle m-2"></i> Create Products
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-box-open m-2"></i> All Products
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-sliders-h m-1"></i> <span class="ms-2">Create Adjustment</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-file-signature"></i> <span class="ms-2">Create Quotation</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-file-alt"></i> <span class="ms-2">All Quotations</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#purchasesMenu">
                <i class="fas fa-shopping-cart icon"></i> Purchases <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="purchasesMenu">
                <li><a class="nav-link ms-4" href="#"><i class="fas fa-plus-circle m-2"></i> Create Purchase</a></li>
                <li><a class="nav-link ms-4" href="#"><i class="fas fa-list m-2"></i> All Purchases</a></li>
            </ul>
        </li>

        <li class="nav-item p-2">
            <a class="nav-link" data-bs-toggle="collapse" href="#purchaseReturnMenu">
                <i class="fas fa-undo icon"></i> Purchase Return <i class="fas fa-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse list-unstyled" id="purchaseReturnMenu">
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-plus-circle m-2"></i> Create Purchase Return
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-plus-circle m-2"></i> Create Sale
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-plus-circle m-2"></i> Create Return Sale
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-plus-circle m-2"></i> Create Expense
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-user m-2"></i> Customers
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-truck m-2"></i> Suppliers
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-chart-pie m-2"></i> Profit/Loss Report
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-file-invoice-dollar m-2"></i> Payments Report
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-chart-bar m-2"></i> Sales Report
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-shopping-cart m-2"></i> Purchases Report
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-undo m-2"></i> Sales Return Report
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-undo-alt m-2"></i> Purchases Return Report
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-user-plus m-2"></i> Create User
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-users m-2"></i> All Users
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-user-shield m-2"></i> Roles & Permissions
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
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-ruler m-2"></i> Units
                    </a>
                </li>
                <li>
                    <a class="nav-link ms-4" href="#">
                        <i class="fas fa-dollar-sign m-2"></i> Currencies
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
    <nav class="navbar navbar-expand-md navbar-light mb-4">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" id="sidebarToggle">
          <i class="fas fa-bars"></i>
        </button>
        <span class="navbar-brand d-md-none">SK Mart</span>
        <div class="d-flex ms-auto">
          <div class="input-group me-3 d-none d-md-flex" style="width: 250px;">
            <input type="text" class="form-control" placeholder="Search...">
            <button class="btn btn-outline-secondary bg-secondary" type="button">
              <i class="fas fa-search text-white"></i>
            </button>
          </div>
          <a href="#" class="nav-icon"><i class="fas fa-bell"></i></a>
          <a href="#" class="nav-icon"><i class="fas fa-envelope"></i></a>
          <a href="#" class="nav-icon"><i class="fas fa-user-circle"></i></a>
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

      <div class="row mb-4">
        <div class="col-lg-8 mb-4">
          <div class="card">
            <div class="card-header bg-white">
              <h5 class="card-title mb-0">Sales Overview</h5>
            </div>
            <div class="card-body">
              <canvas id="salesChart" height="250"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div class="card-header bg-white">
              <h5 class="card-title mb-0">Traffic Sources</h5>
            </div>
            <div class="card-body">
              <canvas id="trafficChart" height="250"></canvas>
            </div>
          </div>
        </div>
      </div>


      {{-- <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">Recent Orders</h5>
              <button class="btn btn-sm btn-primary" id="refreshTable">Refresh</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Customer</th>
                      <th>Product</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="ordersTableBody">
                    <tr>
                      <td>#ORD-0025</td>
                      <td>John Smith</td>
                      <td>Laptop Pro</td>
                      <td>Mar 4, 2025</td>
                      <td>$1,250</td>
                      <td><span class="badge bg-success">Completed</span></td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-0024</td>
                      <td>Alice Johnson</td>
                      <td>Smartphone X</td>
                      <td>Mar 3, 2025</td>
                      <td>$850</td>
                      <td><span class="badge bg-warning text-dark">Pending</span></td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-0023</td>
                      <td>Robert Brown</td>
                      <td>Wireless Headphones</td>
                      <td>Mar 3, 2025</td>
                      <td>$120</td>
                      <td><span class="badge bg-success">Completed</span></td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-0022</td>
                      <td>Emily Davis</td>
                      <td>Smart Watch</td>
                      <td>Mar 2, 2025</td>
                      <td>$299</td>
                      <td><span class="badge bg-danger">Cancelled</span></td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-0021</td>
                      <td>Michael Wilson</td>
                      <td>Tablet Pro</td>
                      <td>Mar 1, 2025</td>
                      <td>$450</td>
                      <td><span class="badge bg-info">Shipped</span></td>
                      <td>
                        <button class="btn btn-sm btn-outline-primary">View</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('show');
      document.getElementById('backdrop').classList.toggle('show');
    });

    document.getElementById('backdrop').addEventListener('click', function() {
      document.getElementById('sidebar').classList.remove('show');
      document.getElementById('backdrop').classList.remove('show');
    });

    const navLinks = document.querySelectorAll('.sidebar .nav-link');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        navLinks.forEach(item => item.classList.remove('active'));
        this.classList.add('active');

        if (window.innerWidth <= 768) {
          document.getElementById('sidebar').classList.remove('show');
          document.getElementById('backdrop').classList.remove('show');
        }
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      const salesCtx = document.getElementById('salesChart').getContext('2d');
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

      const trafficCtx = document.getElementById('trafficChart').getContext('2d');
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
    });

    function updateRandomStat() {
      const statNumbers = document.querySelectorAll('.stat-number');
      const randomIndex = Math.floor(Math.random() * statNumbers.length);
      const currentValue = parseInt(statNumbers[randomIndex].textContent.replace(/[^0-9]/g, ''));
      const newValue = currentValue + Math.floor(Math.random() * 100) - 50;

      if (statNumbers[randomIndex].textContent.includes('$')) {
        statNumbers[randomIndex].textContent = '$' + newValue.toLocaleString();
      } else {
        statNumbers[randomIndex].textContent = newValue.toLocaleString();
      }

      const statChanges = document.querySelectorAll('.stat-change');
      const change = statChanges[randomIndex];
      const icon = change.querySelector('i');
      const randomChange = (Math.random() * 20 - 5).toFixed(1);

      if (randomChange > 0) {
        icon.className = 'fas fa-arrow-up';
        change.innerHTML = '';
        change.appendChild(icon);
        change.appendChild(document.createTextNode(' ' + randomChange + '%'));
      } else {
        icon.className = 'fas fa-arrow-down';
        change.innerHTML = '';
        change.appendChild(icon);
        change.appendChild(document.createTextNode(' ' + Math.abs(randomChange) + '%'));
      }
    }

    setInterval(updateRandomStat, 5000);

    const orders = [
      {
        id: '#ORD-0025',
        customer: 'John Smith',
        product: 'Laptop Pro',
        date: 'Mar 4, 2025',
        amount: '$1,250',
        status: 'Completed'
      },
      {
        id: '#ORD-0024',
        customer: 'Alice Johnson',
        product: 'Smartphone X',
        date: 'Mar 3, 2025',
        amount: '$850',
        status: 'Pending'
      },
      {
        id: '#ORD-0023',
        customer: 'Robert Brown',
        product: 'Wireless Headphones',
        date: 'Mar 3, 2025',
        amount: '$120',
        status: 'Completed'
      },
      {
        id: '#ORD-0022',
        customer: 'Emily Davis',
        product: 'Smart Watch',
        date: 'Mar 2, 2025',
        amount: '$299',
        status: 'Cancelled'
      },
      {
        id: '#ORD-0021',
        customer: 'Michael Wilson',
        product: 'Tablet Pro',
        date: 'Mar 1, 2025',
        amount: '$450',
        status: 'Shipped'
      },
      {
        id: '#ORD-0020',
        customer: 'Sarah Johnson',
        product: 'Bluetooth Speaker',
        date: 'Feb 28, 2025',
        amount: '$85',
        status: 'Completed'
      },
      {
        id: '#ORD-0019',
        customer: 'David Lee',
        product: 'Gaming Console',
        date: 'Feb 27, 2025',
        amount: '$499',
        status: 'Shipped'
      },
      {
        id: '#ORD-0018',
        customer: 'Jennifer White',
        product: 'Wireless Mouse',
        date: 'Feb 26, 2025',
        amount: '$45',
        status: 'Completed'
      }
    ];

    document.getElementById('refreshTable').addEventListener('click', function() {
      const tableBody = document.getElementById('ordersTableBody');
      tableBody.innerHTML = '';

      const shuffled = [...orders].sort(() => 0.5 - Math.random());
      const selectedOrders = shuffled.slice(0, 5);

      selectedOrders.forEach(order => {
        const row = document.createElement('tr');

        let badgeClass = 'bg-secondary';
        if (order.status === 'Completed') badgeClass = 'bg-success';
        if (order.status === 'Pending') badgeClass = 'bg-warning text-dark';
        if (order.status === 'Cancelled') badgeClass = 'bg-danger';
        if (order.status === 'Shipped') badgeClass = 'bg-info';

        row.innerHTML = `
          <td>${order.id}</td>
          <td>${order.customer}</td>
          <td>${order.product}</td>
          <td>${order.date}</td>
          <td>${order.amount}</td>
          <td><span class="badge ${badgeClass}">${order.status}</span></td>
          <td>
            <button class="btn btn-sm btn-outline-primary">View</button>
          </td>
        `;

        tableBody.appendChild(row);
      });
    });
  </script>
</body>
</html>
