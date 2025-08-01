<?php $__env->startSection('title', 'My Orders'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>My Orders</h1>
    
    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-info">You haven't placed any orders yet.</div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->created_at->format('M d, Y H:i')); ?></td>
                    <td>$<?php echo e(number_format($order->total, 2)); ?></td>
                    <td><?php echo e(ucfirst($order->status)); ?></td>
                    <td>
                        <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn btn-sm btn-info">
                            View Details
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <?php echo e($orders->links()); ?>

    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/food-order-system-2/resources/views/orders/index.blade.php ENDPATH**/ ?>