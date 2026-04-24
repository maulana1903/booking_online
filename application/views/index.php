<!doctype html>
<html lang="en">
      <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<?php $this->load->view('_partials/head.php'); ?>

  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item d-none d-md-block"><a href="https://api.whatsapp.com/send?phone=6285868598956&text=Halo%20kak%20%F0%9F%91%8B%20saya%20mau%20konsultasi%20nih%20tentang%20" class="nav-link">Contact</a></li>
          </ul>

          <ul class="navbar-nav ms-auto">


            <li class="nav-item dropdown user-menu">
              <a class="btn btn-primary" href="<?= base_url('admin/login')?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Login
                      </a>
            </li>


          </ul>

        </div>

      </nav>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Daftar Service On The Spot</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="row g-4">
              <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Form Daftar Service On The Spot</div></div>
                  <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                      <?= $this->session->flashdata('error') ?>
                    </div>
                  <?php endif; ?>

                  <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                      <?= $this->session->flashdata('success') ?>
                    </div>
                  <?php endif; ?>

                  <!--end::Header-->
                  <!--begin::Form-->
                  <form class="needs-validation" action="<?= base_url('core/simpan') ?>" method="post" enctype="multipart/form-data" novalidate>
                    <!--begin::Body-->
                    <div class="card-body">
                      <!--begin::Row-->
                      <div class="row g-3">
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">Nama Pemesan</label>
                          <input
                            type="text"
                            class="form-control"
                            id="validationCustom01"
                            name="nama"
                            required
                          />
                          <div class="valid-feedback">Bagus!</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="validationCustom02" class="form-label">Alamat Lengkap</label>
                          <input
                            type="text"
                            class="form-control"
                            id="validationCustom02"
                            name="alamat"
                            required
                          />
                          <div class="valid-feedback">Bagus!</div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">No WA</label>
                          <div class="input-group">
                          <span class="input-group-text" id="basic-addon3"
                          >+62</span>
                          <input
                            type="number"
                            class="form-control"
                            id="validationCustom01"
                            aria-describedby="basic-addon3 basic-addon4"
                            name="wa"
                            required
                          />
                          <div class="valid-feedback">Bagus!</div>
                      </div>
                    </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="validationCustom02" class="form-label">Tanggal Service</label>
                          <input
                            type="date"
                            class="form-control"
                            id="tanggal"
                            name="tanggal"
                            required
                          />
                          <div class="valid-feedback">Tanggal sudah dipilih</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="validationCustomUsername" class="form-label">Jam</label>
                          <div class="input-group">
                            <input
                              type="time"
                              class="form-control"
                              id="jam_service"
                              aria-describedby="inputGroupPrepend"
                              min="09:00"
                              max="15:00"
                              name="jam"
                              required
                            />
                            <div class="valid-feedback">Jam sudah dipilih</div>
                          </div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="validationCustom03" class="form-label">Link Google Maps</label>
                          <input
                            type="text"
                            class="form-control"
                            id="validationCustom03"
                            name="gmaps"
                            readonly
                            required
                          />
                          <div class="invalid-feedback">Otomatis terisi jika pilih di maps bawah</div>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="lat" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="lng" class="form-control" readonly>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Pilih Lokasi di Maps</label>
                            <div id="mapid" style="height: 350px; border-radius:8px;"></div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="validationCustom04" class="form-label">Kerusakan</label>
                            <input
                              type="text"
                              class="form-control"
                              id="validationCustomUsername"
                              aria-describedby="inputGroupPrepend"
                              name="kerusakan"
                              required
                            />
                          </select>
                          <div class="invalid-feedback">Masukkan kerusakan dahulu</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6">
                          <label for="validationCustom05" class="form-label">Bukti Transfer</label>
                          <input
                            type="file"
                            class="form-control"
                            id="validationCustom05"
                            accept="image/*"
                            name="bukti_tf"
                            required
                          />
                          <div class="invalid-feedback">Bukti Transfer Shopeepay ke 085868598956</div>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-12">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              value=""
                              id="invalidCheck"
                              required
                            />
                            <label class="form-check-label" for="invalidCheck">
                              Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                          </div>
                        </div>
                        <!--end::Col-->
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button class="btn btn-info" type="submit">Submit form</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (() => {
                      'use strict';

                      // Fetch all the forms we want to apply custom Bootstrap validation styles to
                      const forms = document.querySelectorAll('.needs-validation');

                      // Loop over them and prevent submission
                      Array.from(forms).forEach((form) => {
                        form.addEventListener(
                          'submit',
                          (event) => {
                            if (!form.checkValidity()) {
                              event.preventDefault();
                              event.stopPropagation();
                            }

                            form.classList.add('was-validated');
                          },
                          false,
                        );
                      });
                    })();
                  </script>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
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
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?= base_url('assets/')?>js/adminlte.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <!-- ChartJS -->
    <!-- jsvectormap -->
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
      integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
      integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
      crossorigin="anonymous"
    ></script>
    <!-- jsvectormap -->
    <script>
      var centerLat = -7.719126;
var centerLng = 110.746628;
var maxRadius = 20; // km

var map = L.map('mapid').setView([centerLat, centerLng], 11);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
}).addTo(map);

// Marker pusat
var centerMarker = L.marker([centerLat, centerLng]).addTo(map)
  .bindPopup("📍 Pusat Layanan");

// Circle radius
var serviceArea = L.circle([centerLat, centerLng], {
  color: 'blue',
  fillColor: '#3b82f6',
  fillOpacity: 0.15,
  radius: maxRadius * 1000
}).addTo(map);

// Auto zoom ke area layanan
map.fitBounds(serviceArea.getBounds());

var marker;
function getDistanceFromLatLon(lat1, lon1, lat2, lon2) {
  var R = 6371; // km
  var dLat = (lat2 - lat1) * Math.PI / 180;
  var dLon = (lon2 - lon1) * Math.PI / 180;

  var a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(lat1 * Math.PI / 180) *
    Math.cos(lat2 * Math.PI / 180) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);

  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  return R * c; // km
}
// Klik map
map.on('click', function(e) {
  var lat = e.latlng.lat;
  var lng = e.latlng.lng;

  var jarak = getDistanceFromLatLon(centerLat, centerLng, lat, lng);

  if (jarak > maxRadius) {
    alert("❌ Jarak " + jarak.toFixed(2) + " km.\nMelebihi 20 km!");
    if (marker) map.removeLayer(marker);
    return;
  }
    document.getElementById("lat").value = lat;
    document.getElementById("lng").value = lng;
    document.getElementById("validationCustom03").value =
        `https://www.google.com/maps?q=${lat},${lng}`;
  if (marker) map.removeLayer(marker);

  marker = L.marker([lat, lng]).addTo(map)
    .bindPopup("Lokasi dipilih (" + jarak.toFixed(2) + " km)").openPopup();
});
</script>
<script>
  const today = new Date();
  const formatDate = (date) => date.toISOString().split("T")[0];

  const minDate = formatDate(today);
  const maxDateObj = new Date(today);
  maxDateObj.setDate(today.getDate() + 7);
  const maxDate = formatDate(maxDateObj);

  const inputTanggal = document.getElementById("tanggal");
  inputTanggal.setAttribute("min", minDate);
  inputTanggal.setAttribute("max", maxDate);
</script>
<script>
document.getElementById("jam_service").addEventListener("change", function () {
    let jam = this.value;

    if (jam < "09:00" || jam > "15:00") {
        alert("Jam pelayanan hanya antara pukul 09:00 sampai 15:00");
        this.value = "";
    }
});
</script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
