<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <?php $this->load->view('_partials/head.php'); ?>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="badge text-bg-secondary"><?= $this->session->userdata('nama') ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <li class="user-footer">
                  <a href="logout" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="#" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="<?= base_url('assets/')?>assets/img/KudoikomLogo.png"
              alt="Kudoikom Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">KUDOIKOM</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item">
                <a href="<?= base_url('admin/')?>adminku" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/')?>service_online" class="nav-link active">
                  <i class="nav-icon bi bi-clipboard-fill"></i>
                  <p>Service Online</p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Simple Tables</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tabel Permintaan</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="serviceTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Jam</th>
                          <th>Gmaps</th>
                          <th>Kerusakan</th>
                          <th>Bukti Transfer</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($service as $row): ?>
                        <tr>
                          <td><?= $row->id ?></td>
                          <td><?= $row->nama ?></td>
                          <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                          <td><?= $row->jam ?></td>
                          <td>
                            <a href="<?= $row->gmaps ?>" target="_blank">
                              <span class="badge rounded-pill text-bg-info">Link</span>
                            </a>
                          </td>
                          <td style="max-width:400px; white-space:normal;">
                            <?= $row->kerusakan ?>
                          </td>
                          <td>
                            <a href="<?= base_url('uploads/'.$row->bukti_tf) ?>" target="_blank">
                              <span class="badge rounded-pill text-bg-success">Bukti TF</span>
                            </a>
                          </td>
                          <td>
                            <?php if ($row->status == 'Menunggu'): ?>
                              <span class="badge bg-warning">Menunggu</span>
                            <?php elseif ($row->status == 'ACC'): ?>
                              <span class="badge bg-success">ACC</span>
                            <?php elseif ($row->status == 'Ditolak'): ?>
                              <span class="badge bg-danger">Ditolak</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if ($row->status == 'Menunggu'): ?>
                              <a href="<?= base_url('admin/acc/'.$row->id) ?>"
                                onclick="return confirm('Yakin ACC service ini?')"
                                class="badge rounded-pill text-bg-primary">
                                ACC
                              </a>

                              <a href="<?= base_url('admin/tolak/'.$row->id) ?>"
                                onclick="return confirm('Yakin tolak service ini?')"
                                class="badge rounded-pill text-bg-danger">
                                Tolak
                              </a>

                            <?php elseif ($row->status == 'ACC'): ?>
                              <span class="text-muted fst-italic">Sudah di-ACC</span>

                            <?php elseif ($row->status == 'Ditolak'): ?>
                              <span class="text-muted fst-italic">Sudah ditolak</span>
                            <?php endif; ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(Kudoikom)-->
    <script src="<?= base_url('assets/')?>js/adminlte.js"></script>
    <!--end::Required Plugin(Kudoikom)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <script>
                      $(document).ready(function () {
                        $('#serviceTable').DataTable({
                          responsive: true,
                          autoWidth: false,
                          pageLength: 10,
                          language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data",
                            info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                            paginate: {
                              previous: "Sebelumnya",
                              next: "Selanjutnya"
                            }
                          }
                        });
                      });
                    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
