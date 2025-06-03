
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>

<body>
    <h1>Pilih Data Pelanggar</h1>
    <a href="<?php echo e(route('pelanggar.index')); ?>">Kembali</a><br><br>
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

    <table class="tabel">
        <tr>
            <th>Foto</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>No Hp</th>
            <th>Aksi</th>
        </tr>

        <?php $__empty_1 = true; $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td>
                 <img src="<?php echo e(asset('storage/siswas/'.$siswa->image)); ?>" width="120px" hight="120px" alt="">
           </td> 
            <td><?php echo e($siswa->nis); ?></td>
            <td><?php echo e($siswa->name); ?></td>
            <td><?php echo e($siswa->email); ?></td>
            <td><?php echo e($siswa->tingkatan); ?> <?php echo e($siswa->jurusan); ?> <?php echo e($siswa->kelas); ?></td>
            <td><?php echo e($siswa->hp); ?></td>
            <td>
                <form action="<?php echo e(route('pelanggar.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id_siswa" value="<?php echo e($siswa->id); ?>">
                    <button type="submit">Tambah Pelanggaran</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td>
                <p>data tidak ditemukan silahkan cek pada data pelanggar</p>
            </td>
            <td>
                <a href="<?php echo e(route('pelanggar.index')); ?>">Data Pelanggar</a>|||||||<a href="<?php echo e(route('pelanggar.create')); ?>">Kembali</a>
            </td>
        </tr>
        <?php endif; ?>
        </table>
        <?php echo e($siswas->links()); ?>

</body>
</html><?php /**PATH C:\laragon\www\E-Point-Siswa\resources\views/admin/pelanggar/create.blade.php ENDPATH**/ ?>