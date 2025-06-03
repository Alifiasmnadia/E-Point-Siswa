<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Show Pelanggar</title>
  <style type="text/css">
  table {
    border-collapse: collapse;
    margin: 20px 0px;
    text-align: left;
  }

  table,
  th,
  td {
    border: 1px solid;
    text-align: left;
    padding-right: 20px;
  }
  </style>
</head>

<body>
   
     <h1>Detail Pelanggar</h1>
     <a href="<?php echo e(route('pelanggar.index')); ?>">Kembali</a>

     <table>
      <tr>
        <td colspan="4" style="text-align: center;"><img src="<?php echo e(asset('storage/siswas/'.$pelanggar->image)); ?>" width="120px" height="120px"></td>
      </tr>
      <tr>
        <th colspan="2">Akun Pelanggar</th>
        <th colspan="2">Data Pelanggar</th>
      </tr>
      <tr>
        <th>Nama</th>
        <td>: <?php echo e($pelanggar->name); ?></td>
        <th>Nis</th>
        <td>: <?php echo e($pelanggar->nis); ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td>: <?php echo e($pelanggar->email); ?></td>
        <th>Kelas</th>
        <td>: <?php echo e($pelanggar->tingkatan); ?> <?php echo e($pelanggar->jurusan); ?> <?php echo e($pelanggar->kelas); ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <th>No Hp</th>
        <td>: <?php echo e($pelanggar->hp); ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <th>Status</th>
        <?php if($pelanggar->status == 1): ?> :
        <td>: Aktif</td>
        <?php else: ?>
        <td>: Tidak Aktif</td>
        <?php endif; ?>
      </tr>
     </table>
     <br><br>

     <h1>Pilih Pelanggaran</h1>
     <br><br>
     <form action="" method="get">
      <label>Cari :</label>
      <input type="text" name="cari">
      <input type="submit" value="Cari">
     </form>
     <br><br>

     <?php if(Session::has('succes')): ?>
     <div class="alert alert-succes" role="alert">
      <?php echo e(Session::get('succes')); ?>

     </div>
     <?php endif; ?>

     <table class="tabel">
      <tr>
        <th>jenis</th>
        <th>konsekuensi</th>
        <th>poin</th>
        <th>Aksi</th>
      </tr>
      <?php $__empty_1 = true; $__currentLoopData = $pelanggarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><?php echo e($pelanggaran->jenis); ?></td>
        <td><?php echo e($pelanggaran->konsekuensi); ?></td>
        <td><?php echo e($pelanggaran->poin); ?></td>
        <td>
          <form action="<?php echo e(route('pelanggar.storePelanggaran', $pelanggaran->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id_pelanggar" value="<?php echo e($pelanggar->id); ?>">
            <input type="hidden" name="id_user" value="<?php echo e($idUser); ?>">
            <input type="hidden" name="id_pelanggaran" value="<?php echo e($pelanggaran->id); ?>">
            <button type="submit">Tambah Pelanggaran</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td>
          <p>data tidak ditemukan</p>
        </td>
        <td>
          <a href="<?php echo e(route('pelanggaran.index')); ?>">Kembali</a>
        </td>
      </tr>
      <?php endif; ?>
     </table>
     <?php echo e($pelanggarans->links()); ?>

  
</body>
</html><?php /**PATH C:\laragon\www\E-Point-Siswa\resources\views/admin/pelanggar/show.blade.php ENDPATH**/ ?>