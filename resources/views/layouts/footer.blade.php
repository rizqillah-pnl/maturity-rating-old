  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
      <div class="footer-content">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-6">
                      <div class="footer-info">
                          <h3>SISURAT | BPS</h3>
                          <p>
                              Jln. Tgk. Chik Di Tiro No. 5,
                              <br>Lancang Garam,
                              <br>Banda Sakti, Kota Lhokseumawe,
                              <br>Aceh, Indonesia, 24351
                              <br><strong>Phone:</strong> <a href="tel://(0645) 43441 "
                                  class="link-offset-2 link-underline link-underline-opacity-0 text-white">(0645)
                                  43441</a>
                              <br><strong>Email:</strong> <a href="pst1174@bps.go.id"
                                  class="link-offset-2 link-underline link-underline-opacity-0 text-white">pst1174@bps.go.id</a>
                              </a>
                          </p>
                      </div>
                  </div>

                  <div class="col-lg-2 col-md-6 footer-links">
                      <h4>Useful Links</h4>
                      <ul>
                          <li><i class="bi bi-chevron-right"></i> <a href="#hero-animated">Home</a></li>
                          <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
                          <li><i class="bi bi-chevron-right"></i> <a href="#services">Services</a></li>
                          <li><i class="bi bi-chevron-right"></i> <a href="https://lhokseumawekota.bps.go.id/"
                                  target="_blank">Website BPS</a></li>
                          <li><i class="bi bi-chevron-right"></i> <a
                                  href="https://ppid.bps.go.id/app/konten/1174/Profil-BPS.html" target="_blank">Profile
                                  BPS</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Developer Services</h4>
                      <ul>
                          <li><i class="bi bi-chevron-right"></i> <a href="https://github.com/putrijuliasafira">Web
                                  Design</a></li>
                          <li><i class="bi bi-chevron-right"></i> <a href="https://github.com/putrijuliasafira">Web
                                  Development</a></li>
                      </ul>
                  </div>

                  <div class="col-lg-4 col-md-6 footer-newsletter">
                      <h4>Our Newsletter</h4>
                      <p>Dapatkan pemberitahuan terbaru dari kami!</p>
                      <form action="{{ url('newsletter/subscribe') }}" method="post" id="form-newsletter">
                          @csrf
                          <input type="email" name="email" id="email-newsletter" required
                              placeholder="Masukkan Email">
                          <input type="submit">
                      </form>
                      <div class="clearfix d-none" id="loading-news">
                          <div class="spinner-border text-warning float-end"
                              style="margin-top: -37px; margin-right: -43px;" role="status">
                              <span class="visually-hidden">Loading...</span>
                          </div>
                      </div>

                      <script>
                          let loading = document.getElementById('loading-news');
                          toastr.options = {
                              "closeButton": true,
                              "debug": false,
                              "newestOnTop": true,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                          }

                          let newsletter = document.getElementById('form-newsletter');

                          newsletter.addEventListener('submit', function(e) {
                              loading.classList.remove('d-none');
                              e.preventDefault();

                              let email = document.getElementById('email-newsletter');
                              email = email.value.trim();
                              const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                              var serializedData = $(this).serialize();
                              if (email != "" || email != undefined) {
                                  let requestData = {
                                      'email': email
                                  }
                                  $.ajax({
                                      url: "{{ url('newsletter/subscribe') }}",
                                      type: 'POST',
                                      headers: {
                                          'X-CSRF-TOKEN': csrfToken
                                      },
                                      data: serializedData,
                                      success: function(res) {
                                          loading.classList.add('d-none');
                                          toastr.success(res.success);
                                          document.getElementById('email-newsletter').value = null;
                                      },
                                      error: function(err) {
                                          loading.classList.add('d-none');
                                          toastr.error('Error: ', err);
                                      }
                                  });
                              }
                          });
                      </script>
                  </div>
              </div>
          </div>
      </div>

      {{-- FOOTER --}}
      <div class="footer-legal text-center">
          <div
              class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

              <div class="d-flex flex-column align-items-center align-items-lg-start">
                  <div class="copyright">
                      2022 - {{ date('Y') }} &copy; Copyright <strong><span>SISURAT</span> &
                          <span>PUTRI|AIN</span></strong>. All Rights
                      Reserved
                  </div>
                  <div class="credits">
                      <!-- All the links in the footer should remain intact. -->
                      <!-- You can delete the links only if you purchased the pro version. -->
                      <!-- Licensing information: https://bootstrapmade.com/license/ -->
                      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                      {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                  </div>
              </div>

              <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                  <a href="https://github.com/putrijuliasafira" class="github"target="_blank"><i class="bi bi-github"
                          title="Github Developer"></i></a>
                  <a href="https://github.com/zahrulaini" class="github"target="_blank"><i class="bi bi-github"
                          title="Github Developer"></i></a>
                  <a href="https://twitter.com/BPS_Lhokseumawe" class="twitter"target="_blank"><i class="bi bi-twitter"
                          title="BPS Kota Lhokseumawe"></i></a>
                  <a href="https://facebook.com/BPSKotaLhokseumawe" class="facebook"target="_blank"
                      title="BPS Kota Lhokseumawe"><i class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/bpskotalhokseumawe" class="instagram"target="_blank"><i
                          class="bi bi-instagram" title="BPS Kota Lhokseumawe"></i></a>
                  <a href="https://www.youtube.com/@badanpusatstatistikkotalho4851" class="youtube" target="_blank"><i
                          class="bi bi-youtube" title="BPS Kota Lhokseumawe"></i></a>
              </div>
          </div>
      </div>
  </footer><!-- End Footer -->
