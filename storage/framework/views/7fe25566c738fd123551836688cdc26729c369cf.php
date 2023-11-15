<?php $__env->startSection('content'); ?>
    <div class="row" style="margin-top: 10%">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Performance</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Check In Time</th>
                            <th>Check Out Time</th>
                            <th>Check Out Pic</th>
                            <th>Check In Pic</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($data2->day); ?> <?php echo e($data2->get_month->title); ?> <?php echo e($data2->get_year->title); ?></td>
                            <td><?php echo e($data2->get_details->Check_In); ?></td>
                            <?php if($data2->get_details->Check_Out==0): ?>
                            <td>Check out not done</td>
                            <td>Check out image not done</td>
                            <?php else: ?>
                            <td><?php echo e($data2->get_details->Check_Out); ?></td>
                            <td><img src="<?php echo e(url('/uploads/image/')); ?>/<?php echo e($data2->get_details->Check_Out_Pic); ?>"></td>

                            <?php endif; ?>
                            <td><img src="<?php echo e(url('/uploads/image/')); ?>/<?php echo e($data2->get_details->Check_In_Pic); ?>"></td>

                        </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('EmployeeView.Masters.Main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Multiauth_natively\resources\views/EmployeeView/ViewTable.blade.php ENDPATH**/ ?>