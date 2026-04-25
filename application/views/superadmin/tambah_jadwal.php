<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <?php $this->load->view('_partials/head.php'); ?>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="register-page bg-body-secondary">
    <div class="register-box">
      <div class="card">
        <div class="card-body register-card-body">
          <p class="register-box-msg">Tambah Jadwal Baru</p>
          <form action="add_jadwal" method="post">
            <div class="input-group mb-3">
              <select name="id_karyawan" class="form-select" required>
                <option value="">-- Pilih Karyawan --</option>
                 <?php foreach ($user as $r) : ?>
                <option value="<?= $r->id ?>">
                 <?= $r->nama?>
                </option>
                <?php endforeach; ?>
              </select>
              <span class="input-group-text">
                <i class="bi bi-shield-check"></i>
              </span>
            </div>
            <div class="input-group mb-3">
              <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required />
              <div class="input-group-text"><span class="bi bi-calendar"></span></div>
            </div>
            <div class="input-group mb-3">
              <input type="time" name="jam" class="form-control" placeholder="Jam" required />
              <div class="input-group-text"><span class="bi bi-alarm"></span></div>
            </div>
            <!--begin::Row-->
            <div class="row">
              <div class="col-8">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                  <label class="form-check-label" for="flexCheckDefault">
                    I agree to the terms
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>
          <!-- /.social-auth-links -->
        </div>
        <!-- /.register-card-body -->
      </div>
    </div>
    <!-- /.register-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
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
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?= base_url('assets/')?>js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
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
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
