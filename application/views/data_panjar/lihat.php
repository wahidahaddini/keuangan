                        <div class="body">
                            <?php echo $this->session->flashdata('success'); ?>
                            <div class="row">
                                    <div class="col-md-12">
                                        <?php 
                                        $sp = 0;                                        
                                        $w = array(
                                            'panjar_id' => $panjar[0]->panjar_id,
                                            'status' => 'Y'
                                        );
                                        $get_spj = $this->db->get_where('data_pengajuan', $w)->result();
                                        if (count($get_spj) > 0) {
                                            foreach ($get_spj as $get) {
                                                $sp = $sp + $get->nominal_bersih;
                                            }
                                        }else{
                                            $sp =0;
                                        }
                                        $sisa = $panjar[0]->nominal - $sp;
                                         ?>
                                        <table class="table">
                                            <tr>
                                                <td>Tanggal Panjar</td>
                                                <td>:</td>
                                                <td><?php echo $panjar[0]->tanggal_panjar; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Bidang yang mengajukan panjar</td>
                                                <td>:</td>
                                                <td><?php echo $panjar[0]->nama_bidang; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kegiatan</td>
                                                <td>:</td>
                                                <td><?php echo $panjar[0]->nama_kegiatan; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nominal Panjar</td>
                                                <td>:</td>
                                                <td>Rp. <?php echo number_format($panjar[0]->nominal,2,',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nominal yang sudah di SPJ kan</td>
                                                <td>:</td>
                                                <td>Rp. <?php echo number_format($sp,2,',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sisa Panjar</td>
                                                <td>:</td>
                                                <td>Rp. <?php echo number_format($sisa,2,',','.'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td>
                                                    <?php 
                                                        if ($panjar[0]->status_lunas == 'Y') {
                                                            echo "Lunas";
                                                        }else{
                                                            echo "Belum Lunas";
                                                        }
                                                     ?>
                                                </td>
                                            </tr>
                                        </table><br><br>
                                        <table class="table table-bordered" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Bidang yang mengajukan</th>
                                                    <th>Kegiatan</th>
                                                    <th>GU/PANJAR</th>
                                                    <th>Kode Rekening Belanja</th>
                                                    <th>Nama Rekening Belanja</th>
                                                    <th>Uraian</th>
                                                    <th>Nominal Kotor</th>
                                                    <th>Pajak</th>
                                                    <th>Nominal Bersih</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1; foreach ($spj as $q): ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $q->tanggal ?></td>
                                                        <td><?php echo $q->nama_bidang; ?></td>
                                                        <td><?php echo $q->nama_kegiatan; ?></td>
                                                        <td><?php echo $q->gu_panjar_nama; ?></td>
                                                        <td><?php echo $q->kode_rekening; ?></td>
                                                        <td><?php echo $q->nama_rekening; ?></td>
                                                        <td><?php echo $q->uraian; ?></td>
                                                        <td>Rp. <?php echo number_format($q->nominal_kotor,2,',','.'); ?></td>
                                                        <td>Rp. <?php echo number_format($q->pajak,2,',','.'); ?></td>
                                                        <td>Rp. <?php echo number_format($q->nominal_bersih,2,',','.'); ?></td>
                                                        <td>
                                                            <?php 
                                                                if ($q->status == 'M') {
                                                                    echo "Menunggu Persetujuan";
                                                                }elseif ($q->status == 'Y') {
                                                                    echo "Disetujui";
                                                                }else{
                                                                    echo "Ditolak";
                                                                }
                                                             ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table><br>
                            </div>
                        </div>