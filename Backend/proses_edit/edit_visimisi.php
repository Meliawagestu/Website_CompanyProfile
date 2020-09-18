<?php 
include "../template/header.php";
$conn = mysqli_connect('localhost','root','','db_website');
$result = mysqli_query($conn,"SELECT * FROM tbl_visi where id_visi = 2");
$visi = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
  $visi = $_POST['visi'];

  $update = "UPDATE tbl_visi SET visi = '$visi' where id_visi = 2";
    mysqli_query($conn,$update);
      if(mysqli_affected_rows($conn) > 0) 
        echo "
        <script>
        alert('data berhasil di ubah')
        document.location.href = '../visimisi.php';
        </script>";
      }
    ?>

  <section>
    <div class="col-sm-12 text-center">
      <h1>Edit Visi</h1><br>
    </div>

      <form action="http://localhost/website/Backend/proses_edit/edit_visimisi.php" method="post">
        <div class="form-group col-sm-12">
          <textarea name="visi" rows="10" class="form-control" ><?php echo"$visi[visi]"; ?></textarea>
        <button class="btn btn-primary mt-2" type="submit" name="submit">Simpan</button>
      </div>
    </form>
  </section>

  <?php 
include "../template/footer.php";
?>
