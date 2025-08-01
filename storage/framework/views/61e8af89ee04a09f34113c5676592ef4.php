<div class="card">
    <div class="card-header">Your Cart</div>
    <div class="card-body">
        <?php if(session('cart')): ?>
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
                <?php $total = 0 ?>
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total += $details['price'] * $details['quantity'] ?>
                <tr>
                    <td><?php echo e($details['name']); ?></td>
                    <td>$<?php echo e(number_format($details['price'], 2)); ?></td>
                    <td><?php echo e($details['quantity']); ?></td>
                    <td>$<?php echo e(number_format($details['price'] * $details['quantity'], 2)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <?php if(session('discount')): ?>
                <tr>
                    <td colspan="3" class="text-end">Discount:</td>
                    <td>
                        <?php echo e(session('discount')['type'] === 'percentage' ? 
                           session('discount')['amount'].'%' : 
                           '$'.number_format(session('discount')['amount'], 2)); ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end">Total:</td>
                    <td>$<?php echo e(number_format(
                        session('discount')['type'] === 'percentage' ?
                        $total * (1 - session('discount')['amount'] / 100) :
                        max(0, $total - session('discount')['amount']),
                        2
                    )); ?></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td colspan="3" class="text-end">Total:</td>
                    <td>$<?php echo e(number_format($total, 2)); ?></td>
                </tr>
                <?php endif; ?>
            </tfoot>
        </table>
        <a href="<?php echo e(route('orders.create')); ?>" class="btn btn-success">Checkout</a>
        <?php else: ?>
        <p>Your cart is empty</p>
        <?php endif; ?>
    </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/food-order-system-2/resources/views/partials/cart.blade.php ENDPATH**/ ?>