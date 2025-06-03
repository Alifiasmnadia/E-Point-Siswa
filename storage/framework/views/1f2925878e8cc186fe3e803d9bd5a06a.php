<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Pelanggar</title>
</head>

<body>
  <h1>Data Pelanggar</h1>
  <a href="<?php echo e(route('admin/dashboard')); ?>">Menu Utama</a>
  <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <br><br>
  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  </form>
  <br><br>
  <form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
  </form>
  <br><br>
  <a href="<?php echo e(route('pelanggar.create')); ?>">Tambah Pelanggar</a>

  <?php if(Session::has('succes')): ?>
  <div class="alert alert-succes" role="alert">
    <?php echo e(Session::get('succes')); ?>

  </div>
  <?php endif; ?>

   <table class="tabel">
    <tr>
      <th>Foto</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>No Hp</th>
      <th>Poin</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    <?php $__empty_1 = true; $__currentLoopData = $pelanggars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
      <td>
        <img src="<?php echo e(asset('storage/siswas'.$pelanggar->image)); ?>" width="120px" height="120px" alt="">
      </td>
      <td><?php echo e($pelanggar->nis); ?></td>
      <td><?php echo e($pelanggar->name); ?></td>
      <td><?php echo e($pelanggar->tingkatan); ?> <?php echo e($pelanggar->jurusan); ?> <?php echo e($pelanggar->kelas); ?></td>
      <td><?php echo e($pelanggar->hp); ?></td>
      <td><?php echo e($pelanggar->poin_pelanggar); ?></td>
      <?php if($pelanggar->status == 0): ?> :
      <td>Tidak Perlu Ditindak</td>
      <?php elseif($pelanggar->status == 1): ?>
      <td>
        <form onsubmit="return confirm('Apakah Anda Yakin <?php echo e($pelanggar->name); ?> Sudah Ditindak?');" action="<?php echo e(route('pelanggar.statusTindak', $pelanggar->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('PUT'); ?>
          <button type="submit">Perlu Ditindak</button>
        </form>
      </td>
      <?php elseif($pelanggar->status == 2): ?>
      <td>Sudah Ditindak</td>
      <?php endif; ?>
      <td>
        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="<?php echo e(route('pelanggar.destroy', $pelanggar->id)); ?>" method="POST">
          <a href="<?php echo e(route('detailPelanggar.show', $pelanggar->id)); ?>" class="btn btn-sm btn-dark">DETAIL</a>
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button type="submit">HAPUS</button>
        </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
      <td>
        <p>data tidak ditemukan</p>
      </td>
      <td>
        <a href="<?php echo e(route('pelanggar.index')); ?>">kembali</a>
      </td>
    </tr>
    <?php endif; ?>
   </table>
   <?php echo e($pelanggars->links()); ?>

</body>
</html><?php /**PATH C:\laragon\www\E-Point-Siswa\resources\views/admin/pelanggar/index.blade.php ENDPATH**/ ?>