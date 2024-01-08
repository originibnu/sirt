<?php $__env->startSection('title'); ?>
<?php echo e(__('manage') . ' ' . __('online'). ' '.__('exam')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage') . ' ' . __('online'). ' '.__('exam')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        <?php echo e(__('create') . ' ' . __('online'). ' '.__('exam')); ?>

                    </h4>
                    <form class="pt-3 mt-6 create-online-exam" id="create-form" method="POST" action="<?php echo e(route('online-exam.store')); ?>">

                        
                        <div class="form-group">
                            <label><?php echo e(__('online_exam_based_on')); ?> <span class="text-danger">*</span> <i class="fa fa-question-circle ml-1" aria-hidden="true" title="<?php echo e(__('class_and_class_section_exam_info')); ?>"></i></label><br>
                            <div class="d-flex">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="online_exam_based_on" class="online_exam_based_on" value="0">
                                        <?php echo e(__('class')); ?>

                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="online_exam_based_on" class="online_exam_based_on" value="1" checked="true">
                                        <?php echo e(__('class_section')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        
                        <div class="class_container" style="display : none">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><?php echo e(__('class')); ?> <span class="text-danger">*</span></label>
                                    <select name="class_id" class="form-control select2 online-exam-class-id" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value="">--- <?php echo e(__('select') . ' ' . __('class')); ?> ---</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>">
                                            <?php echo e($class->name); ?> <?php echo e($class->medium->name); ?> <?php echo e($class->streams->name ?? ''); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo e(__('subject')); ?> <span class="text-danger">*</span></label>
                                    <select name="subject_class_id" class="form-control select2 online-exam-subject-id" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value="">--- <?php echo e(__('select') . ' ' . __('subject')); ?> ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" id="online-exam-title" name="title_class" placeholder="<?php echo e(__('title')); ?>" class="form-control"  />
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('exam')); ?> <?php echo e(__('key')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" id="online-exam-key" name="exam_key_class" placeholder="<?php echo e(__('exam_key')); ?>" class="form-control"  />
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('duration')); ?> <span class="text-danger">*</span></label><span class="text-info small">( <?php echo e(__('in_minutes')); ?> )</span>
                                    <input type="number" id="online-exam-duration" name="duration_class" placeholder="<?php echo e(__('duration')); ?>" min="1" class="form-control"  />
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('start_date')); ?> <span class="text-danger">*</span></label>
                                    
                                    <input type="datetime-local" id="online-exam-start-date" name="start_date_class" min="<?php echo e(date('Y-m-d h:i')); ?>" placeholder="<?php echo e(__('start_date')); ?>" class='form-control'>
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('end_date')); ?> <span class="text-danger">*</span></label>
                                    
                                    <input type="datetime-local" id="online-exam-end-date" name="end_date_class" min="<?php echo e(date('Y-m-d h:i')); ?>" placeholder="<?php echo e(__('end_date')); ?>" class='form-control' >
                                </div>
                            </div>
                        </div>

                        
                        <div class="class_section_container">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><?php echo e(__('class_section')); ?> <span class="text-danger">*</span></label>
                                    <select name="class_section_id" class="form-control select2 online-exam-class-section-id" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value="">--- <?php echo e(__('select') . ' ' . __('class_section')); ?> ---</option>
                                        <?php $__currentLoopData = $class_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class_section->id); ?>">
                                            <?php echo e($class_section->class->name); ?> <?php echo e($class_section->section->name); ?> - <?php echo e($class_section->class->medium->name); ?> <?php echo e($class_section->class->streams->name ?? ''); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo e(__('subject')); ?> <span class="text-danger">*</span></label>
                                    <select name="subject_class_section_id" class="form-control select2 online-exam-subject-id" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value="">--- <?php echo e(__('select') . ' ' . __('subject')); ?> ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" id="online-exam-title" name="title_class_section" placeholder="<?php echo e(__('title')); ?>" class="form-control" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('exam')); ?> <?php echo e(__('key')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" id="online-exam-key" name="exam_key_class_section" placeholder="<?php echo e(__('exam_key')); ?>" class="form-control" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('duration')); ?> <span class="text-danger">*</span></label><span class="text-info small">( <?php echo e(__('in_minutes')); ?> )</span>
                                    <input type="number" id="online-exam-duration" name="duration_class_section" placeholder="<?php echo e(__('duration')); ?>" class="form-control"  />
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('start_date')); ?> <span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="online-exam-start-date" name="start_date_class_section" min="<?php echo e(date('Y-m-d h:i')); ?>" placeholder="<?php echo e(__('start_date')); ?>" class='form-control' >
                                </div>
                                <div class="form-group col-md-2">
                                    <label><?php echo e(__('end_date')); ?> <span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="online-exam-end-date" name="end_date_class_section" min="<?php echo e(date('Y-m-d h:i')); ?>" placeholder="<?php echo e(__('end_date')); ?>" class='form-control' >
                                </div>
                            </div>
                        </div>

                        <input class="btn btn-theme" id="add-online-exam-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list') . ' ' . __('exams')); ?>

                    </h4>
                    <div id="toolbar" class="row">
                        <div class="form-group ml-4">
                            <label><?php echo e(__('class')); ?> </label>
                            <select name="class_id" id="filter-online-exam-class-id" class="form-control" style="width:100%;" tabindex="-1" aria-hidden="true">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>">
                                    <?php echo e($class->name); ?> <?php echo e($class->medium->name); ?> <?php echo e($class->streams->name ?? ''); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group ml-4">
                            <label><?php echo e(__('subject')); ?></label>
                            <select name="subject_id" id="filter-online-exam-subject-id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $all_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>">
                                    <?php echo e($subject->name); ?> - <?php echo e($subject->type); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table" data-url="<?php echo e(route('online-exam.show', 1)); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "<?php echo e(__('online').' '.__('exam')); ?>-<?= date(' d-m-y') ?>" ,"ignoreColumn":["operate"]}' data-show-export="true" data-query-params="onlineExamQueryParams">
                        <thead>
                            <tr>
                                <th scope="col" data-field="online_exam_id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?>

                                </th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="class_name" data-sortable="false"><?php echo e(__('class')); ?></th>
                                <th scope="col" data-field="subject_name" data-sortable="false"><?php echo e(__('subject')); ?></th>
                                <th scope="col" data-field="title" data-sortable="false"><?php echo e(__('title')); ?></th>
                                <th scope="col" data-field="exam_key" data-sortable="false" data-align="center"><?php echo e(__('exam_key')); ?></th>
                                <th scope="col" data-field="duration" data-sortable="false" data-align="center"><?php echo e(__('duration')); ?> <span class="text-info small">( <?php echo e(__('in_minutes')); ?> )</span></th>
                                <th scope="col" data-field="start_date" data-sortable="true"><?php echo e(__('start_date')); ?></th>
                                <th scope="col" data-field="end_date" data-sortable="true"><?php echo e(__('end_date')); ?></th>
                                <th scope="col" data-field="total_questions" data-sortable="false" data-align="center"><?php echo e(__('total').' '.__('questions')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false" data-events="onlineExamEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit')); ?> <?php echo e(__('online')); ?> <?php echo e(__('exam')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form id="edit-form" class="pt-3 edit-form" action="<?php echo e(url('online-exam')); ?>">
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                        <input type="text" id="edit-online-exam-title" name="edit_title" placeholder="<?php echo e(__('title')); ?>" class="form-control"  />
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label><?php echo e(__('exam')); ?> <?php echo e(__('key')); ?> <span class="text-danger">*</span></label>
                            <input type="number" id="edit-online-exam-key" name="edit_exam_key" placeholder="<?php echo e(__('exam_key')); ?>" class="form-control"  />
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo e(__('duration')); ?> <span class="text-danger">*</span></label><span class="text-info small">( <?php echo e(__('in_minutes')); ?> )</span>
                            <input type="number" id="edit-online-exam-duration" name="edit_duration" placeholder="<?php echo e(__('duration')); ?>" class="form-control"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                                <label><?php echo e(__('start_date')); ?> <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="edit-online-exam-start-date" name="edit_start_date" placeholder="<?php echo e(__('start_date')); ?>" class='form-control' >
                            </div>
                            <div class="form-group col-md-6">
                                <label><?php echo e(__('end_date')); ?> <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="edit-online-exam-end-date" name="edit_end_date" placeholder="<?php echo e(__('end_date')); ?>" class='form-control' >
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                    <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?> />
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wrteam-dev/eschool/resources/views/online_exam/index.blade.php ENDPATH**/ ?>