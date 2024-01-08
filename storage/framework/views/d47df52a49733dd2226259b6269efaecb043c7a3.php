<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            * { font-family: DejaVu Sans, sans-serif; }
        </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fees Receipt || <?php echo e(config('app.name')); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <div class="text-center">
                    <i><img style="height: 5rem;width: 5rem;"  src="<?php echo e($logo); ?>" alt="logo"></i>
                    <br>
                    <span class="text-default-d3" style="font-size:1.5rem"><strong><?php echo e($school_name); ?></strong></span>
                    <br>
                    <span class="text-default-d3" style="font-size:1rem"><?php echo e($school_address); ?></span>
                    <hr height="2px" width="100%" style="background-color: black">
                    <h4>
                        Fee Receipt
                    </h4>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-between">
            <div class="col-md-6 col-sm-12 col-12">
                <div class="text-grey-m2">
                    <p><strong><u>Invoice</u></strong><br>
                        <strong>Fee Receipt</strong> :- <?php echo e(isset($fees_paid) ? $fees_paid->id : '-'); ?><br>
                        <strong>Payment Date :- </strong> <?php echo e(isset($fees_paid) ? date('d-m-Y',strtotime($fees_paid->date)) : '-'); ?>

                    </p>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-12 justify-content-end d-flex">
                <div class="text-black">
                    <p><strong><u>Student Details :- </u></strong><br>
                    <strong>Name</strong> :- <?php echo e(isset($fees_paid) ? $fees_paid->student->user->first_name.' '.$fees_paid->student->user->last_name : '-'); ?> <br>
                    <strong>Session</strong> :- <?php echo e(isset($fees_paid) ? $fees_paid->session_year->name : '-'); ?> <br>
                    <strong>Class</strong> :- <?php echo e(isset($fees_paid) ? $fees_paid->student->class_section->class->name . '-' . $fees_paid->student->class_section->section->name. ' ' . $fees_paid->student->class_section->class->medium->name: '-'); ?><br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <table class="table" style="text-align: center;border: 1px">
                    <thead>
                        <tr>
                        <th scope="col" class="text-left">Sr no.</th>
                        <th scope="col" colspan="2" class="text-left">Fee Type</th>
                        <th scope="col" class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <?php
                        $no = 1;
                        $amount = 0;
                    ?>
                    <tbody>
                        <?php if($fees_paid->is_fully_paid): ?>
                            <?php if(isset($paid_installment) && !empty($paid_installment->toArray())): ?>
                                <?php $__currentLoopData = $paid_installment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" class="text-left"><?php echo e($no++); ?></th>
                                        <td colspan="2" class="text-left"><?php echo e($data->installment_fee->name); ?><br><small>(PAID ON :- <?php echo e(date('d-m-Y',strtotime($data->date))); ?>) </small></td>
                                        <td class="text-right"><?php echo e($data->amount); ?> <?php echo e($currency_symbol); ?></td>
                                    </tr>
                                    <?php if($data->due_charges): ?>
                                        <tr>
                                            <th scope="row" class="text-left"><?php echo e($no++); ?></th>
                                            <td colspan="2" class="text-left">Due Charges
                                                <br><small><?php echo e($data->installment_fee->name); ?> :- </small></td>
                                            <td class="text-right"><?php echo e($data->due_charges); ?> <?php echo e($currency_symbol); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php if(isset($fees_class) && !empty($fees_class)): ?>
                                    <?php $__currentLoopData = $fees_class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row" class="text-left"><?php echo e($no++); ?></th>
                                            <td colspan="2" class="text-left"><?php echo e($data->fees_type->name); ?>

                                                <?php if($fees_paid->date): ?>
                                                    <br><small>(PAID ON :- <?php echo e(date('d-m-Y',strtotime($fees_paid->date))); ?>) </small></td>
                                                <?php endif; ?>
                                            <td class="text-right"><?php echo e($data->amount); ?> <?php echo e($currency_symbol); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(isset($paid_installment) && !empty($paid_installment->toArray())): ?>
                                <?php $__currentLoopData = $paid_installment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" class="text-left"><?php echo e($no++); ?></th>
                                        <td colspan="2" class="text-left"><?php echo e($data->installment_fee->name); ?>

                                            <br><small>(PAID ON :- <?php echo e(date('d-m-Y',strtotime($data->date))); ?>) </small></td>
                                        <td class="text-right"><?php echo e($data->amount); ?> <?php echo e($currency_symbol); ?></td>
                                    </tr>
                                    <?php if($data->due_charges): ?>
                                        <tr>
                                            <th scope="row" class="text-left"><?php echo e($no++); ?></th>
                                            <td colspan="2" class="text-left">Due Charges
                                                <br><small><?php echo e($data->installment_fee->name); ?> :- </small></td>
                                            <td class="text-right"><?php echo e($data->due_charges); ?> <?php echo e($currency_symbol); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $__currentLoopData = $fees_choiceable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data->is_due_charges == 0): ?>
                                <tr>
                                    <th scope="row" class="text-left"><?php echo e($no++); ?></th>
                                    <td colspan="2" class="text-left"><?php echo e($data->fees_type->name); ?>

                                        <?php if($data->date): ?>
                                            <br><small>(PAID ON :- <?php echo e(date('d-m-Y',strtotime($data->date))); ?>) </small></td>
                                        <?php endif; ?>
                                    <td class="text-right"><?php echo e($data->total_amount); ?> <?php echo e($currency_symbol); ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <th scope="row" class="text-left"><?php echo e($no++); ?></th>
                                    <td colspan="2" class="text-left">Due Charges (<?php echo e($session_year->fee_due_charges); ?> %)
                                        <?php if($data->date): ?>
                                            <br><small>(PAID ON :- <?php echo e(date('d-m-Y',strtotime($fees_paid->date))); ?>) </small></td>
                                        <?php endif; ?>
                                    <td class="text-right"><?php echo e($data->total_amount); ?> <?php echo e($currency_symbol); ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"></th>
                            <td colspan="2" class="text-left"><strong>Total Amount:-</strong></td>
                            <td class="text-right"><?php echo e($fees_paid->total_amount); ?> <?php echo e($currency_symbol); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH /home/wrteam-dev/eschool/resources/views/fees/fees_receipt.blade.php ENDPATH**/ ?>