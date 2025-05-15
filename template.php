<?php include_once 'top.php'; require_once 'koneksi.php'; ?>

<div class="app-wrapper">
  <?php include_once 'navbar.php'; ?>
  <?php include_once 'sidebar.php'; ?>

  <main class="app-main">
    <div class="app-content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><h3 class="mb-0">Daftar Bidang Ilmu</h3></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Bidang Ilmu</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="app-content">
        <!-- Tambahkan dalam <body> AdminLTE -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid pt-3">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sales Value</h3>
        </div>
        <div class="card-body">
          <canvas id="salesChart" height="100"></canvas>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Tambahkan sebelum </body> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('salesChart').getContext('2d');
  const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan \'1', 'Feb \'4', 'Mar \'5', 'Apr \'12', 'May \'12', 'Jun \'23'],
      datasets: [{
        label: 'Dosen ',
        data: [65, 60, 180, 60, 50, 40],
        fill: true,
        backgroundColor: 'rgba(0, 200, 150, 0.2)',
        borderColor: 'rgba(0, 200, 150, 1)',
        tension: 0.4
      },
      {
        label: 'Produk B',
        data: [30, 45, 40, 20, 85, 90],
        fill: true,
        backgroundColor: 'rgba(0, 123, 255, 0.2)',
        borderColor: 'rgba(0, 123, 255, 1)',
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 20
          }
        }
      }
    }
  });
</script>

    </div>
  </main>

  <?php include_once 'footer.php'; ?>
</div>

