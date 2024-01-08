<?php $__env->startSection('title'); ?>
<?php echo e(__('fees')); ?> <?php echo e(__('configration')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('configration')); ?>

        </h3>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <form id="create-fees-config-form" class="fees-config" action="<?php echo e(route('fees.config.udpate')); ?>" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <h3 class="card-title">
                            <?php echo e(__('payment_gateways')); ?>

                        </h3>

                        <hr>
                        <div class="bg-light p-3">
                            <div class="col-lg-12 mt-3">
                                <h5 class="card-title">
                                    <i class="fa fa-angle-double-right menu-icon"></i> <?php echo e(__('razorpay')); ?>

                                </h5>
                            </div>
                            <div class="col-lg-12" style="margin-top: 2rem">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label>
                                        <select required name="razorpay_status" id="razorpay_status" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <?php if(isset($settings['razorpay_status'])): ?>
                                                <?php if( $settings['razorpay_status']): ?>
                                                <option value="1" selected><?php echo e(__('enable')); ?></option>
                                                <option value="0"><?php echo e(__('disable')); ?></option>
                                                <?php else: ?>
                                                <option value="1"><?php echo e(__('enable')); ?></option>
                                                <option value="0" selected><?php echo e(__('disable')); ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                            <option value="1"><?php echo e(__('enable')); ?></option>
                                            <option value="0"><?php echo e(__('disable')); ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('secret_key')); ?></label>
                                        <input name="razorpay_secret_key"  value="<?php echo e(!env('DEMO_MODE') ? (isset($settings['razorpay_secret_key']) ? $settings['razorpay_secret_key'] : '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('secret_key')); ?>" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('api_key')); ?></label>
                                        <input name="razorpay_api_key" value="<?php echo e(!env('DEMO_MODE') ? (isset($settings['razorpay_api_key']) ? $settings['razorpay_api_key'] : '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('api_key')); ?>" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('razoray_webhook_secret')); ?></label>
                                        <input name="razorpay_webhook_secret"  value="<?php echo e(!env('DEMO_MODE') ? (isset($settings['razorpay_webhook_secret']) ? $settings['razorpay_webhook_secret'] : '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('razoray_webhook_secret')); ?>" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('razorpay')); ?> <?php echo e(__('webhook_url')); ?></label>
                                        <input name="razorpay_webhook_url"  value="<?php echo e(!env('DEMO_MODE') ? (isset($domain) ? $domain.'/webhook/razorpay' : '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('razorpay').' '.__('webhook_url')); ?>" class="form-control" readonly/>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="bg-light p-3 mt-4">
                            <div class="col-lg-12 mt-3">
                                <h5 class="card-title">
                                    <i class="fa fa-angle-double-right menu-icon"></i> <?php echo e(__('stripe')); ?>

                                </h5>
                            </div>
                            <div class="col-lg-12" style="margin-top: 2rem">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label>
                                        <select required name="stripe_status" id="stripe_status"  class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <?php if(isset($settings['stripe_status'])): ?>
                                                <?php if($settings['stripe_status']): ?>
                                                <option value="1" selected><?php echo e(__('enable')); ?></option>
                                                <option value="0"><?php echo e(__('disable')); ?></option>
                                                <?php else: ?>
                                                <option value="1"><?php echo e(__('enable')); ?></option>
                                                <option value="0" selected><?php echo e(__('disable')); ?></option>
                                                <?php endif; ?>
                                            <?php else: ?>
                                            <option value="1"><?php echo e(__('enable')); ?></option>
                                            <option value="0"><?php echo e(__('disable')); ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('stripe_publishable_key')); ?></label>
                                        <input name="stripe_publishable_key" value="<?php echo e(!env('DEMO_MODE') ? (isset($settings['stripe_publishable_key']) ? $settings['stripe_publishable_key'] : '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('stripe_publishable_key')); ?>" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('stripe_secret_key')); ?></label>
                                        <input name="stripe_secret_key" value="<?php echo e(!env('DEMO_MODE') ? (isset($settings['stripe_secret_key']) ? $settings['stripe_secret_key'] : '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('stripe_secret_key')); ?>" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('stripe_webhook_secret')); ?></label>
                                        <input name="stripe_webhook_secret" value="<?php echo e(!env('DEMO_MODE') ? (isset($settings['stripe_webhook_secret']) ? $settings['stripe_webhook_secret'] : '') : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('stripe_webhook_secret')); ?>" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label><?php echo e(__('stripe')); ?> <?php echo e(__('webhook_url')); ?></label>
                                        <input name="stripe_webhook_url"  value="<?php echo e(!env('DEMO_MODE') ? (isset($domain) ? $domain.'/webhook/stripe' : '' ) : 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'); ?>" type="text" placeholder="<?php echo e(__('stripe').' '.__('webhook_url')); ?>"  class="form-control" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="card-title" style="margin-top: 3rem">
                            <?php echo e(__('other_fees')); ?> <?php echo e(__('configration')); ?>

                        </h3>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label><?php echo e(__('currency_code')); ?> <span class="text-danger">*</span></label>
                                <input name="currency_code" value="<?php echo e(isset($settings['currency_code']) ? $settings['currency_code'] : ''); ?>" type="text" placeholder="<?php echo e(__('currency_code')); ?>" class="form-control" />
                                <span style="color: rgb(0, 55, 107);font-size: 0.8rem" class="ml-2"><?php echo e(__('eg_currency_code_inr')); ?></span>
                            </div>
                            <div class="form-group col-md-3">
                                <label><?php echo e(__('currency_symbol')); ?> <span class="text-danger">*</span></label>
                                <input name="currency_symbol" value="<?php echo e(isset($settings['currency_symbol']) ? $settings['currency_symbol'] : ''); ?>" type="text" placeholder="<?php echo e(__('currency_symbol')); ?>" class="form-control" />
                                <span style="color: rgb(0, 55, 107);font-size: 0.8rem" class="ml-2"><?php echo e(__('eg_currency_symbol_₹')); ?></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-theme mt-5" type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wrteam-dev/eschool/resources/views/fees/fees_config.blade.php ENDPATH**/ ?>