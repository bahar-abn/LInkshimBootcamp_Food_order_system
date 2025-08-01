<?php $__env->startSection('title', 'Checkout'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    <table class="table">
                        <!-- Your order summary table here -->
                    </table>
                    <form action="<?php echo e(route('orders.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/food-order-system-2/resources/views/orders/create.blade.php ENDPATH**/ ?>