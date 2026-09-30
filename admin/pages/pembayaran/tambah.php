<main id="content" class="content py-10">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                      <div class="">
                          <h1 class="fs-3 mb-1">Add Pembayaran</h1>
                          <p class="mb-0">Manage your payment records</p>
                      </div>
                      <div>
                          <a href="index.php?page=pembayaran" class="btn btn-primary">Go to Payment List</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body p-4">
                          <?php

                            require_once 'function/pembayaran.php';
                            if (isset($_POST['pembayaran'])) {
                                $pembayaran = new Pembayaran();

                                $var_id_penyewaan = $_POST['id_penyewaan'];
                                $var_total_bayar = $_POST['total_bayar'];
                                $var_status = $_POST['status'];
                                $result = $pembayaran->tambah(
                                    $var_id_penyewaan,
                                    $var_total_bayar,
                                    $var_status
                                );

                                if ($result) {
                                    echo "<script>window.location.href='index.php?page=pembayaran'</script>";
                                } else {
                                    echo "Data pembayaran gagal ditambahkan.";
                                }
                            }
                            ?>
                          <form method="post" action="" id="addProductForm">
                              <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter product name" required>
                              <div class="col-md-12 mb-3">
                                  <label for="id_penyewaan" class="form-label">ID Penyewaan</label>
                                  <input type="text" class="form-control" name="id_penyewaan" id="id_penyewaan" placeholder="Enter payment ID" required>
                              </div>
                              <div class="col-md-12 mb-3">
                                  <label for="total_bayar" class="form-label">Total Bayar</label>
                                  <input type="number" class="form-control" name="total_bayar" id="total_bayar" placeholder="Enter total payment" required>
                              </div>
                              <div class="col-md-12 mb-3">
                                  <label for="status" class="form-label">Status</label>
                                  <select class="form-control" name="status" id="status" required>
                                      <option value="">Select Status</option>
                                      <option value="lunas">Lunas</option>
                                      <option value="perbaikan">Belum Lunas</option>
                                  </select>
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