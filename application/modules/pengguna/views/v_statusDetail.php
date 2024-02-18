<style>
    .chat-input:focus{
        outline: none;
    }
    #chat-box::-webkit-scrollbar{
        width: 7px;
    }
    #chat-box::-webkit-scrollbar-track{
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
    }
    #chat-box::-webkit-scrollbar-thumb{
        background-color: gray; 
        border-radius: 10px;
    }
    #chat-box::-webkit-scrollbar-thumb:hover{
        background-color: white;
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

                                <!-- chat -->
                                <div class="w-100 p-1 bg-dark rounded-lg">
                                    <div class="bg-dark" id="chat-box" style="max-height: 75vh; overflow-x: hidden; overflow-y: scroll;">
                                        <?php for($i = 0; $i < count($ticketChat); $i++) : ?>

                                            <?php 
                                                $selisihHari = selisihHari($ticketChat[$i]['tanggal'], date('Y-m-d H:i:s')); 
                                                if(($i-1)!=(-1)) $selisihHariSebelumnya = selisihHari($ticketChat[$i-1]['tanggal'], date('Y-m-d H:i:s'));
                                                else $selisihHariSebelumnya = 0;
                                            ?>
                                            <?php if($selisihHari != $selisihHariSebelumnya) : ?>
                                                <div style="margin: 5px 0; display:flex; align-items: center; justify-content: center;">
                                                    <div style="padding: 2px 4px; width:fit-content; background-color: white; border-radius: 5px; font-size: 12px; font-weight: 600; opacity: 0.75;"><?php 
                                                        if ($selisihHari == 0) echo 'Hari ini';
                                                        elseif ($selisihHari == 1) echo 'Kemarin';
                                                        else echo substr($ticketChat[$i]['tanggal'], 0, 10);
                                                    ?></div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="m-0 px-2 py-1 d-flex flex-row align-items-center 
                                                <?php if ($ticketChat[$i]['pegawai_id'] == $this->session->id) echo 'justify-content-end'; else echo 'justify-content-start'; ?>
                                            ">
                                                <div class="px-2 py-1 w-fit d-flex flex-column" style="
                                                    <?php if ($ticketChat[$i]['pegawai_id'] == $this->session->id) echo '
                                                        border-radius: 10px 10px 0 10px; background-color: #17A2B8; color: white; max-width: 75%; align-items: end;
                                                    '; else echo '
                                                        border-radius: 10px 10px 10px 0; background-color: white; max-width: 75%;
                                                    '; ?>
                                                ">
                                                    <?= $ticketChat[$i]['pesan']?>
                                                    <div style="opacity: 0.5;font-size: 12px;"><?= substr($ticketChat[$i]['tanggal'], -9, -3) ?></div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>

                                    <div class="w-100 p-2 bg-dark rounded-lg">
                                        <?php if($statusTicket['status_id']!=4):?>
                                            <form class="w-100 h-max rounded-lg bg-white d-flex flex-row align-items-center justify-content-center" method="post" id="chat-form">
                                                <input id="ticket-id" type="text" class="d-none" name="ticket_id" value="<?= $dataTicket['ticket'] ?>">
                                                <input id="status-ticket" type="text" class="d-none" name="status_id" value="<?= $statusTicket['status_id'] ?>">
                                                <input id="chat-pesan" type="text" name="pesan" class="chat-input px-1 w-100 h-100 rounded-lg" style="border: none" placeholder="Tulis pesan ...">
                                                <button type="submit" class="m-1 btn px-3 py-1 bg-info text-light">send</button>
                                            </form>
                                        <?php else: ?>
                                            <div class="p-3 w-100 rounded-lg bg-success text-white d-flex align-items-center justify-content-center" style="font-size: 18px; cursor: not-allowed;">
                                                Tiket telah ditutup
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- end chat -->
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="overlay-bsn"></div>
<!-- <script src="../../../../assets/user_template/js/app/statusDetail.js"></script> -->
<script>
    // Set BG full cover on body elem
    document.body.style.background = "url('/../assets/user_template/img/bg.png')";
    
    const chatBox = document.getElementById('chat-box')
    // const lastChat = document.getElementsByName('pesan')[<?= count($ticketChat)-1 ?>]
    
    chatBox.scrollTo(0, chatBox.offsetHeight)
</script>
