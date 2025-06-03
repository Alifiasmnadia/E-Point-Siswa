<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Detail Pelanggaran</title>
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
    <h1>Data Pelanggar</h1>
<a href="<?php echo e(route('pelanggar.index')); ?>">kembali</a>    


<table>
    <tr>
        <td colspan="4" style="text-align: center;"><img src="<?php echo e(asset('storage/siswas/'.$pelanggar->image)); ?>" width="120px" hight="120px" alt=""></td>
    </tr>
    <tr>
            <th colspan="2">Akun pelanggar</th>
            <th colspan="2">Data pelanggar</th>
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
            <?php if($pelanggar->status == 0): ?> :
            <td>: Tidak Perlu Ditindak </td>
            <?php elseif($pelanggar->status == 1): ?>
            <td>: Perlu Ditindak</td>
            <?php else: ?>
            <td>: Sudah Ditindak</td>
            <?php endif; ?>
        </tr>
        <tr>
            <td>
                Total Poin
            </td>
            <td>: <h1><?php echo e($pelanggar->poin_pelanggar); ?></h1>
        </td>
        </tr>
</table>
<br><br>

<h1>Pelanggaran Yang Dilakukan</h1>
<br><br>

<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert">
    <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>

<?php if($pelanggar->status == 0 || $pelanggar->status == 1): ?> :
    <button onclick="myFunction()">Tambah Pelanggaran</button>

    <script>
        function myFunction() {
            alert("Poin Pelanggar Sudah Mencapai <?php echo e($pelanggar->poin_pelanggar); ?> Poin, Pelanggar Perlu Ditindak!");
        }
    </script>
<?php else: ?>
<a href="<?php echo e(route('pelanggar.show', $pelanggar->id)); ?>">Tambah Pelanggaran</a>
<?php endif; ?>

<table class="tabel">
    <tr>
        <th>Nama PTK</th>
        <th>Tanggal</th>
        <th>Jenis</th>
        <th>Konsekuensi</th>
        <th>Poin</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php $__empty_1 = true; $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><?php echo e($detail->name); ?></td>
        <td><?php echo e($detail->created_at); ?></td>
        <td><?php echo e($detail->jenis); ?></td>
        <td><?php echo e($detail->konsekuensi); ?></td>
        <td><?php echo e($detail->poin); ?></td>
        <?php if($detail->status == 0): ?> :
            <td>
                <form onsubmit="return confirm('Apakah <?php echo e($pelanggar->name); ?> Sudah Diberikan Sanksi ?');" action="<?php echo e(route('detailPelanggar.update', $detail->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="id_pelanggar" value="<?php echo e($detail->id_pelanggar); ?>">
                    <button type="submit">Belum Diberikan Sanksi</button>
                </form>
            </td>
            <?php else: ?>
            <td>Sudah Diberikan Sanksi</td>
            <?php endif; ?>
            <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="<?php echo e(route('detailPelanggar.destroy', $detail->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <input type="hidden" name="id_pelanggar" value="<?php echo e($detail->id_pelanggar); ?>">
                    <input type="hidden" name="poin_pelanggaran" value="<?php echo e($detail->poin); ?>">
                    <button type="submit">Hapus Pelanggaran</button>
                </form>
            </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td>
            <p>data tidak ditemukan, Silahkan Tambah Pelanggaran</p>
        </td>
        <td>
            <a href="<?php echo e(route('pelanggar.show', $pelanggar->id)); ?>">Tambah</a>
        </td>
    </tr>
    <?php endif; ?>
</table>
<?php echo e($details->links()); ?>

</body>
</html><?php /**PATH C:\laragon\www\E-Point-Siswa\resources\views/admin/detail/show.blade.php ENDPATH**/ ?>