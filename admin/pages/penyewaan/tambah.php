<main id="content" class="content py-10">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                      <div class="">
                          <h1 class="fs-3 mb-1">Add Penyewaan</h1>
                          <p class="mb-0">Manage your inventory items</p>
                      </div>
                      <div>
                          <a href="index.php?page=penyewaan" class="btn btn-primary">Go to Inventory List</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body p-4">
                          <?php

                            require_once 'function/penyewaan.php';
                            if (isset($_POST['penyewaan'])) {
                                $penyewaan = new Penyewaan();

                                $var_id_user = $_POST['id_user'];
                                $var_id_kendaraan = $_POST['id_kendaraan'];
                                $var_tanggal_mulai = $_POST['tanggal_mulai'];
                                $var_tanggal_selesai = $_POST['tanggal_selesai'];
                                $result = $penyewaan->tambah(
                                    $var_id_user,
                                    $var_id_kendaraan,
                                    $var_tanggal_mulai,
                                    $var_tanggal_selesai
                                );

                                if ($result) {
                                    echo "<script>window.location.href='index.php?page=penyewaan'</script>";
                                } else {
                                    echo "Data penyewaan gagal ditambahkan.";
                                }
                            }
                            ?>
                          <form method="post" action="" id="addProductForm">
                              <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter product name" required>
                              <div class="col-md-12 mb-3">
                                  <label for="id_user" class="form-label">ID User</label>
                                  <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Enter product name" required>
                              </div>
                              <div class="col-md-12 mb-3">
                                  <label for="id_kendaraan" class="form-label">ID Kendaraan</label>
                                  <input type="text" class="form-control" name="id_kendaraan" id="id_kendaraan" placeholder="Enter product name" required>
                              </div>
                              <div class="col-md-12 mb-3">
                                  <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                  <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Enter product name" required>
                              </div>
                              <div class="col-md-12 mb-3">
                                  <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                  <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Enter product name" required>
                              </div>
                              <div class="d-flex gap-2">
                                  <button type="submit" class="btn btn-primary">Add Product</button>
                              </div>

                          </form>
                      </div>
                  </div>


              </div>

          </div>

          <div class="row">
              <div class="col-12">
                  <footer class="text-center py-2 mt-6 text-secondary ">
                      <p class="mb-0">Copyright © 2026 InApp Inventory Dashboard. Developed by <a href="https://codescandy.com/" target="_blank" class="text-primary">CodesCandy</a> • Distributed by <a href="https://themewagon.com/" target="_blank" class="text-primary">ThemeWagon</a> </p>
                  </footer>
              </div>

          </div>

      </div>
  </main>