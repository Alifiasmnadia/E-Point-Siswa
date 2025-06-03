<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <a class="nav-link" href="<?php echo e(route('siswa.index')); ?>">Data Siswa</a>
    <a class="nav-link" href="<?php echo e(route('akun.index')); ?>">Data Akun</a>
    <a class="nav-link" href="<?php echo e(route('pelanggaran.index')); ?>">Data Pelanggaran</a>
    <a class="nav-link" href="<?php echo e(route('pelanggar.index')); ?>">Data Pelanggar</a>
    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
    </form>
    
    <h1>Dashboard Admin</h1>
    <?php if($message = Session::get('success')): ?>
        <p><?php echo e($message); ?></p>
    <?php else: ?>
        <p>You are logged in!</p>
    <?php endif; ?>



        <h3>Jumlah siswa <?php echo e($jmlSiswas); ?></h3>
        <h3>Jumlah pelanggar <?php echo e($jmlPelanggars); ?></h3>
        <br><br><br>

        <h1>Top 10 siswa dengan poin pelanggaran tertinggi</h1><br>
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
                    <img src="<?php echo e(asset('storage/siswas/'.$pelanggar->image)); ?>" width="120px" height="120px" alt="">
                </td>
                <td><?php echo e($pelanggar->nis); ?></td>
                <td><?php echo e($pelanggar->name); ?></td>
                <td><?php echo e($pelanggar->tingkatan); ?> <?php echo e($pelanggar->jurusan); ?> <?php echo e($pelanggar->kelas); ?></td>
                <td><?php echo e($pelanggar->hp); ?></td>
                <td><?php echo e($pelanggar->poin_pelanggar); ?></td>
                <td>
                    <a href="<?php echo e(route('pelanggar.show', $pelanggar->id)); ?>" class="btn btn-sm btn-dark">Data Pelanggaran</a>
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

        <br><br><br>

        <h1>Top 10 Pelanggaran yang sering dilakukan</h1><br>
        <table class="tabel">
            <tr>
                <th>Nama Pelanggaran</th>
                <th>Konsekuensi</th>
                <th>Poin</th>
                <th>Total Pelanggaran</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $hitung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($hit->jenis); ?></td>
                <td><?php echo e($hit->konsekuensi); ?></td>
                <td><?php echo e($hit->poin); ?></td>
                <td><?php echo e($hit->totals); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td>
                    <p>data tidak ditemukan</p>
                </td>
            </tr>
            <?php endif; ?>

        </table>

    
</body>
<footer>
    </footer>
</html><?php /**PATH C:\laragon\www\E-Point-Siswa\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>