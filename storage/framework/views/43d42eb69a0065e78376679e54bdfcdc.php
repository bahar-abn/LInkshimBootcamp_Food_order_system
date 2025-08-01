<?php $__env->startSection('title', 'Menu'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8">
        <h1>Our Menu</h1>
        
        <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <?php if($food->image): ?>
                    <img src="<?php echo e(asset('storage/'.$food->image)); ?>" class="card-img-top" alt="<?php echo e($food->name); ?>" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo e($food->name); ?></h5>
                        <p class="card-text"><?php echo e(Str::limit($food->description, 100)); ?></p>
                        <div class="mt-auto">
                            <p class="text-muted mb-2">$<?php echo e(number_format($food->price, 2)); ?></p>
                            
                            <?php if($food->average_rating): ?>
                            <div class="mb-2">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php if($i <= $food->average_rating): ?>
                                        <i class="fas fa-star text-warning"></i>
                                    <?php else: ?>
                                        <i class="far fa-star text-warning"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <small>(<?php echo e(number_format($food->average_rating, 1)); ?>)</small>
                            </div>
                            <?php endif; ?>
                            
                            <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="mt-2">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="food_id" value="<?php echo e($food->id); ?>">
                                <div class="input-group mb-3">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 60px;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="alert alert-info">No food items available at the moment.</div>
            </div>
            <?php endif; ?>
        </div>
        
        
        <?php if(method_exists($foods, 'hasPages') && $foods->hasPages()): ?>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($foods->links()); ?>

        </div>
        <?php endif; ?>
    </div>
    
    <div class="col-md-4">
        <?php echo $__env->make('partials.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php if(auth()->guard()->check()): ?>
        <?php if(isset($recommendations) && count($recommendations) > 0): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h5>Recommended For You</h5>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <?php $__currentLoopData = $recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="list-group-item list-group-item-action">
                        <?php echo e($food->name); ?> - $<?php echo e(number_format($food->price, 2)); ?>

                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/food-order-system-2/resources/views/foods/index.blade.php ENDPATH**/ ?>