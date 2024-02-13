<style>
    .chat-input:focus{
        outline: none;
    }
</style>
<main id="main">
    <!-- ======= Status Ticket ======= -->
    <section id="status-section" class="status-section">
        <div class="container aos-init aos-animate" data-aos="zoom-in">
            <div class="section-title-white">
                <h2>Detail Status Ticket</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div class="card">
                            <?php if($checkTicket == false) : ?>
                                <div class="alert alert-danger text-center mt-4" role="alert">
                                    Data Ticket Tidak Ditemukan
                                </div>
                            <?php else: ?>  
                            <div class="card-header">
                                <?php if($statusTicket['status_id'] == 2 || $statusTicket['status_id'] == 3) : ?>
                                    <button class="btn btn-success mt-2 mb-2" id="btn-closed" data-ticket="<?= $dataTicket['ticket'] ?>"><i class="fas fa-ticket-alt"></i> Close Ticket</button>
                                <?php elseif($statusTicket['status_id'] === 4) : ?>
                                    <button class="btn btn-danger mt-2 mb-2" disabled><i class="fas fa-ticket-alt"></i> Ticket Closed</button>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">                                                                                              
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="kode_ticket">Kode Ticket</label>
                                            <input class="form-control" type="text" name="kode_ticket" id="kode_ticket" placeholder="Masukkan Kode Ticket" value="<?= $dataTicket['kodeTicket'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="jenis_ticket">Jenis Ticket</label>
                                            <input class="form-control" type="text" name="jenis_ticket" id="jenis_ticket" placeholder="Masukkan Jenis Ticket" value="<?= $dataTicket['jenisTicket'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="judul_ticket">Judul Ticket</label>
                                            <input class="form-control" type="text" name="judul_ticket" id="judul_ticket" placeholder="Masukkan Judul Ticket" value="<?= $dataTicket['title'] ?>" readonly>
                                            <!-- <?php var_dump('data tiket: '.$dataTicket);?>
                                            <?php var_dump($statusTicket);?> -->
                                        </div>                                        
                                    </div>
                                    <?php if($dataTicket['jenisTicket'] == 'Lapor') : ?>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="deskripsi">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="5" readonly><?= strip_tags($dataTicket['description']) ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="attachment">Attachment</label><br>
                                                <?php foreach($dataAttachment as $attachment) : ?>
                                                    <a href="<?= base_url($attachment['path_attachment']) ?>" target="_blank"><?= $attachment['detail_attachment'] ?></a>
                                                    <?php if (next($dataAttachment)) {
                                                        echo ', '; // Add comma for all elements instead of last
                                                    }?>
                                                <?php endforeach; ?>
                                            </div>  
                                        </div>
                                    <?php endif; ?>
                                </div>                                                              
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <?php if($dataResponse) : ?>
                                        <div class="form-group">
                                            <?php if($statusTicket['status_id'] == 3) : ?>
                                                <button class="btn btn-info float-right" id="btn-ongoing" data-ticket="<?= $dataTicket['ticket'] ?>"><i class="fas fa-thumbs-down"></i> Jawaban Kurang Membantu</button>
                                            <?php endif; ?>
                                            <h4 class="font-weight-bold" for="jawaban">Jawaban</h4>
                                            <div class="alert alert-secondary mt-4">
                                                <?= ($dataResponse['jawab'] != NULL) ? strip_tags($dataResponse['jawab']) : $dataResponse['isiFaq'] ?>
                                            </div>
                                        </div>                                        
                                        <?php else : ?>
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="jawaban">Jawaban</label>
                                            <div class="alert alert-danger">
                                                Ticket ini belum dijawab
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>                                
                            </div>
                            <?php endif; ?>

                            <div class="w-100 p-1 bg-dark position-relative" style="height: 75vh;">
                                <div class="">
                                    <?php foreach($ticketChat as $ticketChat) : ?>
                                        <div class="m-0 px-2 py-1 d-flex flex-row align-items-center 
                                            <?php if ($ticketChat['pegawai_id'] == $this->session->id) echo 'justify-content-end'; else echo 'justify-content-start'; ?>
                                        ">
                                            <p class="px-2 py-1 w-fit" style="
                                                <?php if ($ticketChat['pegawai_id'] == $this->session->id) echo 'border-radius: 10px 10px 0 10px; background-color: white'; else echo 'border-radius: 10px 10px 10px 0; background-color: #17A2B8; color: white'; ?>
                                            "><?= $ticketChat['pesan']?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="w-100 p-2 bg-dark" style="position: absolute; bottom: 0; left:0;">
                                    <?php if($statusTicket['status_id']!=4):?>
                                        <div class="w-100 h-max rounded-lg bg-white d-flex flex-row align-items-center justify-content-center">
                                            <input type="text" class="chat-input px-1 w-100 h-100 rounded-lg" style="border: none" placeholder="Tulis pesan ...">
                                            <button class="m-1 btn px-3 py-1 bg-info text-light">send</button>
                                        </div>
                                    <?php else: ?>
                                        <div class="p-3 w-100 rounded-lg bg-success text-white d-flex align-items-center justify-content-center" style="font-size: 18px; cursor: not-allowed;">
                                            Tiket telah ditutup
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- <?php var_export($ticketChat) ?> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="overlay-bsn"></div>

<script>
    // Set BG full cover on body elem
    document.body.style.background = "url('/../assets/user_template/img/bg.png')";
</script>