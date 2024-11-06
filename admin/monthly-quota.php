<?php include '../partials/admin-header.php';?>

    <main class="p-2 px-4">
        <section id="monthly-quota"> 
            <div class="content p-4">
                <h1 class="fw-bold mb-0">Edit Monthly Quota</h1>
                
                <div class="container px-5">
                    <form action="" method="post">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="jan" class="form-label fw-bold">January 2024</label>
                                <input type="text" class="form-control" id="jan" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="feb" class="form-label fw-bold">February 2024</label>
                                <input type="text" class="form-control" id="feb" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="march" class="form-label fw-bold">March 2024</label>
                                <input type="text" class="form-control" id="march" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="apr" class="form-label fw-bold">April 2024</label>
                                <input type="text" class="form-control" id="apr" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="may" class="form-label fw-bold">May 2024</label>
                                <input type="text" class="form-control" id="may" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="june" class="form-label fw-bold">June 2024</label>
                                <input type="text" class="form-control" id="june" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="jul" class="form-label fw-bold">July 2024</label>
                                <input type="text" class="form-control" id="jul" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="aug" class="form-label fw-bold">August 2024</label>
                                <input type="text" class="form-control" id="aug" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="sept" class="form-label fw-bold">September 2024</label>
                                <input type="text" class="form-control" id="sept" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="oct" class="form-label fw-bold">October 2024</label>
                                <input type="text" class="form-control" id="oct" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="nov" class="form-label fw-bold">November 2024</label>
                                <input type="text" class="form-control" id="nov" placeholder="">
                            </div>
                            <div class="col-md-6">
                                <label for="dec" class="form-label fw-bold">December 2024</label>
                                <input type="text" class="form-control" id="dec" placeholder="">
                            </div>
                        </div>
            
                        <div class="row mt-5">
                            <div class="col text-end">
                                <a href="./dashboard.php" class="btn btn-light me-2">Cancel</a>
                                <!-- NOTE: Change "type=button" to "type=submit" -->
                                <input type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#edit-success" name="submit" value="Edit Monthly Quota">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>

              <!-- Edit Successful Modal -->
            <div class="custom-modal modal fade" id="edit-success" tabindex="-1" aria-labelledby="editSuccessfulModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-success text-center fs-3 fw-light" id="editSuccessfulModalLabel">SAVED</h5>
                        </div>
                        <div class="modal-body text-center">
                            Your monthly quota has been edited successfully!
                        </div>
                        <div class="modal-footer justify-content-center text center pt-1" style="border-top: none;">
                            <a href="./dashboard.php" class="btn btn-dark">Close</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

<?php include '../partials/admin-footer.php';?>