<?php $__env->startSection('title', 'Order Details'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order #<?php echo e($order->id); ?></div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Status:</strong> <?php echo e(ucfirst($order->status)); ?>

                    </div>
                    <div class="mb-3">
                        <strong>Date:</strong> <?php echo e($order->created_at->format('M d, Y H:i')); ?>

                    </div>
                    <div class="mb-3">
                        <strong>Total:</strong> $<?php echo e(number_format($order->total, 2)); ?>

                    </div>

                    <h5>Order Items</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td>
                                    <?php if(is_array($item)): ?>
                                        
                                        <?php echo e($item['name'] ?? 'N/A'); ?>

                                    <?php else: ?>
                                        
                                        <?php echo e($item->food->name ?? 'N/A'); ?>

                                    <?php endif; ?>
                                </td>
                                <td>$<?php echo e(number_format($item->price ?? $item['price'], 2)); ?></td>
                                <td><?php echo e($item->quantity ?? $item['quantity']); ?></td>
                                <td>$<?php echo e(number_format(($item->price ?? $item['price']) * ($item->quantity ?? $item['quantity']), 2)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-primary">
                        Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/food-order-system-2/resources/views/orders/show.blade.php ENDPATH**/ ?>