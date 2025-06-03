<!DOCTYPE html>
<html lang="en">
      
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data User</title>
</head>

<body>
      <h1>Data User</h1>
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
      <a href="<?php echo e(route('akun.create')); ?>">Tambah User</a>

      <?php if(Session::has('success')): ?>
      <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>

      <table class="tabel" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->usertype); ?></td>
                    
                    <?php if($user->usertype == 'admin'): ?> :
                       <td>
                        <a href="<?php echo e(route('akun.edit', $user->id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
                     </td>
                     <?php else: ?>
                     <td>
                        <?php if($user->usertype == 'siswa'): ?>
                            <form onsubmit="return confirm('Jika akun siswa Dihapus Maka Data Siswa Akan Ikut Terhapus, Apakah Anda Yakin ?');" action="<?php echo e(route ('akun.destroy', $user->id)); ?> " method="POST">
                        <?php else: ?>
                            <form onsubmit="return confirm(Apakah Anda Yakin)" action="<?php echo e(route ('akun.destroy', $user->id)); ?>" method="POST"></form>
                        <?php endif; ?>
                            <a href="<?php echo e(route('akun.edit', $user->id)); ?>" class="btn btn-sm btn-primary">EDIT</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"> HAPUS</button>
                            </form>
                    </td>  
                    <?php endif; ?> 
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td>
                        <p>data tidak ditemukan</p>
                    </td>
                    <td>
                        <a href="<?php echo e(route('akun.index')); ?>">Kembali</a>
                    </td>
                </tr>
            <?php endif; ?>
      </table>
      <?php echo e($users->links()); ?>


</body>

</html><?php /**PATH C:\laragon\www\E-Point-Siswa\resources\views/admin/akun/index.blade.php ENDPATH**/ ?>