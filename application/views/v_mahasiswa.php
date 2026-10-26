<div class="container mt-5 pt-2">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <div class="d-flex align-items-center mb-3">
                <div class="p-2 bg-primary bg-opacity-10 rounded-3 me-3 text-primary">
                    <i class="fa-solid fa-user-graduate fs-4"></i>
                </div>
                <h3 class="fw-bold text-dark mb-0"><?= $title; ?></h3>
            </div>
            
            <div class="table-container shadow-lg rounded-4 overflow-hidden border-0">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0 custom-academic-table w-100">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center" style="width: 10%;">No</th>
                                <th scope="col" style="width: 30%;">NIM</th>
                                <th scope="col">Nama Mahasiswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $no = 1;  
                            foreach ($mahasiswa as $mhs) :  
                                $rowClass = ($no % 2 !== 0) ? 'row-ganjil' : 'row-genap';
                                ?>
                                <tr class="<?= $rowClass; ?>">
                                    <td class="text-center fw-bold text-secondary opacity-75"><?= $no++; ?></td>
                                    <td>
                                        <div class="nim-badge d-inline-block">
                                            <i class="fa-solid fa-id-card me-2 text-primary opacity-75"></i><?= $mhs['nim']; ?>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-dark">
                                        <i class="fa-solid fa-circle-user me-2 text-muted opacity-50"></i><?= $mhs['nama']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 pt-2">
    <div class="row justify-content-center">
        <div class="col-12"> 
            <div class="d-flex align-items-center mb-3">
                <div class="p-2 bg-success bg-opacity-10 rounded-3 me-3 text-success">
                    <i class="fa-solid fa-building-columns fs-4"></i>
                </div>
                <h3 class="fw-bold text-dark mb-0"><?= $title2; ?></h3>
            </div>
            
            <div class="table-container shadow-lg rounded-4 overflow-hidden border-0">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0 custom-academic-table w-100">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center" style="width: 10%;">No</th>
                                <th scope="col" style="width: 45%;">Nama Prodi</th>
                                <th scope="col">Singkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            $no = 1;  
                            foreach ($prodi as $prd) :  
                                $rowClass = ($no % 2 !== 0) ? 'row-ganjil' : 'row-genap';
                                ?>
                                <tr class="<?= $rowClass; ?>">
                                    <td class="text-center fw-bold text-secondary opacity-75"><?= $no++; ?></td>
                                    <td>
                                        <div class="prodi-badge d-inline-block">
                                            <i class="fa-solid fa-book-bookmark me-2 text-success opacity-75"></i><?= $prd['nama_prodi']; ?>
                                        </div>
                                    </td>
                                    <td class="fw-bold text-dark">
                                        <span class="badge bg-dark bg-opacity-10 text-dark px-3 py-2 rounded-3 fs-7 border border-secondary border-opacity-10">
                                            <?= $prd['keterangan']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>