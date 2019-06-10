<?php
    
    include 'koneksi.php';

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM ruangan WHERE id_ruang = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>
        <form action="admin_edit_aksi.php" method="post">
            <div class="form-group">
                <label for="ruangan">Nama Ruang: </label>  
			    <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="<?php echo $baris['nama_ruang']; ?>" required>
                <input type="hidden" id="id_ruang" name="id_ruang" value="<?php echo $baris['id_ruang']; ?>"> 
            </div>

            <div class="form-group">
                <label for="ruangan">Gedung: </label>             
			    <input type="text" class="form-control" id="gedung" name="gedung" value="<?php echo $baris['gedung']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruangan">Lantai: </label>             
			    <input type="text" class="form-control" id="lantai" name="lantai" value="<?php echo $baris['lantai']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruangan">Meja: </label>             
			    <input type="text" class="form-control" id="fasilitas1" name="fasilitas1" value="<?php echo $baris['fasilitas1']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruangan">Kursi: </label>             
                <input type="text" class="form-control" id="fasilitas2" name="fasilitas2" value="<?php echo $baris['fasilitas2']; ?>" required> 
            </div>

            <div class="form-group">
                <label for="ruangan">LCD: </label>             
                <input type="text" class="form-control" id="fasilitas3" name="fasilitas3" value="<?php echo $baris['fasilitas3']; ?>" required> 
            </div>
            <!--
            <div class="form-group">
                <label for="ruangan">Status: </label>             
			    <input type="text" class="form-control" id="status" name="status" value="<?php echo $baris['status']; ?>" required> 
            </div>-->
            
            <button class="btn btnact" id="submit" name="submit" type="submit">Update</button><br>
            
        </form>

        <?php 

        }
    }
    $koneksi->close();
?>