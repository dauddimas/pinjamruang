<?php
    
    include 'koneksi.php';

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM ruangan WHERE id_ruang = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>
        
        <input type="hidden" name="id_ruang" value="<?php echo $baris['id_ruang']; ?>">
            <div style="text-align: center;">
                <img src="assets/img/undipthumb.png" alt="" height="256" width="256">
            </div>
        
            <div class="form-group">
                <label for="ruang">Nama Ruang: </label>           
			    <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" readonly value="<?php echo $baris['nama_ruang']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruang">Gedung: </label>             
			    <input class="form-control" id="gedung" name="gedung" readonly value="<?php echo $baris['gedung']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruang">Lantai: </label>             
			    <input type="text" class="form-control" id="lantai" name="lantai" readonly value="<?php echo $baris['lantai']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruang">Fasilitas: </label>             
			    <input type="text" class="form-control" id="fasilitas1" name="fasilitas1" readonly value="<?php echo $baris['fasilitas1']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruang">Status: </label>             
			    <input type="text" class="form-control" id="status" name="status" readonly value="<?php echo $baris['status']; ?>" required> 
            </div>
        </form>

        <?php 

        }
    }
    $koneksi->close();
?>