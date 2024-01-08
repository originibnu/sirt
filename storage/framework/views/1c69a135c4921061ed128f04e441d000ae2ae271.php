<?php $__env->startSection('title'); ?>
<?php echo e(__('manage').' '.__('online').' '.__('exam').' '.__('questions')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('add_online_exam_questions')); ?>

        </h3>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="pt-3 mt-6" id="create-online-exam-questions-form" method="POST" action="<?php echo e(route('online-exam-question.store')); ?>">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label><?php echo e(__('class')); ?> <span class="text-danger">*</span></label>
                                <select required name="class_id" class="form-control select2 online-exam-class-id" style="width:100%;" tabindex="-1" aria-hidden="true">
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
                                <select required name="subject_id" class="form-control select2 online-exam-subject-id" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value="">--- <?php echo e(__('select') . ' ' . __('subject')); ?> ---</option>
                                </select>
                            </div>
                        </div>
                        <div class="bg-light p-4">
                            <div class="form-group">
                                <label><?php echo e(__('question_type')); ?> <span class="text-danger">*</span></label><br>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="question_type" class="question_type" value="0" checked>
                                            <?php echo e(__('simple_question')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="question_type" class="question_type" value="1">
                                            <?php echo e(__('equation_based')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="simple-question">
                                <div class="form-group">
                                    <label><?php echo e(__('question')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('question', null, ['placeholder' => __('enter').' '.__('question'), 'class' => 'form-control','rows'=>4]); ?>

                                </div>
                                <div class="row option-container">
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(__('option')); ?> <span class="option-number">1</span> <span class="text-danger">*</span></label>
                                        <input type="text" name="option[1]" placeholder="<?php echo e(__('enter').' '.__('option')); ?>" class="form-control add-question-option" />
                                    </div>
                                    <div class="form-group col-md-6 option-template">
                                        <label><?php echo e(__('option')); ?> <span class="option-number">2</span> <span class="text-danger">*</span></label>
                                        <input type="text" name="option[2]" placeholder="<?php echo e(__('enter').' '.__('option')); ?>" class="form-control add-question-option" />
                                        <div class="remove-option-content"></div>
                                    </div>
                                </div>
                                <div class="add_button">
                                    <button class="btn btn-dark btn-sm" type="button" id="add-new-option"><i class="fa fa-plus-circle fa-3x mr-2" aria-hidden="true"></i><?php echo e(__('add_option')); ?></button>
                                </div>
                            </div>
                            <div id="equation-question" style="display: none">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label><?php echo e(__('question')); ?> <span class="text-danger">*</span></label>
                                    <textarea class="editor_question" name="equestion" required placeholder="<?php echo e(__('enter').' '.__('question')); ?>"></textarea>
                                </div>
                                <div class="row equation-option-container p-4">
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(__('option')); ?> <span class="option-number">1</span> <span class="text-danger">*</span></label>
                                        <textarea class="editor_options" name="eoption[1]" required placeholder="<?php echo e(__('enter').' '.__('option')); ?>"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 quation-option-template">
                                        <label><?php echo e(__('option')); ?> <span class="equation-option-number">2</span> <span class="text-danger">*</span></label>
                                        <textarea class="editor_options" name="eoption[2]" required placeholder="<?php echo e(__('enter').' '.__('option')); ?>"></textarea>
                                        <div class="remove-equation-option-content"></div>
                                    </div>
                                </div>
                                <div class="add_button_equations">
                                    <button class="btn btn-dark btn-sm" type="button" id="add-new-eqation-option"><i class="fa fa-plus-circle fa-3x mr-2" aria-hidden="true"></i><?php echo e(__('add_option')); ?></button>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="form-group col-md-6 mt-2">
                                    <div class="form-group">
                                        <label><?php echo e(__('answer')); ?> <span class="text-danger">*</span></label>
                                        <select multiple required name="answer[]" id="answer_select" class="form-control js-example-basic-single select2-hidden-accessible" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            <option value="1"><?php echo e(__('option')); ?> 1</option>
                                            <option value="2"><?php echo e(__('option')); ?> 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo e(__('image')); ?></label>
                                    <input type="file" name="image" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button" ><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group p-1">
                                <label><?php echo e(__('note')); ?></label>
                                <input type="text" name="note" class="form-control">
                            </div>
                        </div>
                        <input class="btn btn-theme mt-4" id="new-question-add" type="submit" value=<?php echo e(__('submit')); ?>>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        <?php echo e(__('list') . ' ' . __('online'). ' ' . __('exam').' '.__('question')); ?>

                    </h4>
                    <div id="toolbar" class="row">
                        <div class="form-group ml-4">
                            <label><?php echo e(__('class')); ?></label>
                            <select name="class_id" id="filter-view-question-class-id" class="form-control" style="width:100%;" tabindex="-1" aria-hidden="true">
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
                            <select name="subject_id" id="filter-question-subject-id" class="form-control" style="width:100%;" tabindex="-1" aria-hidden="true">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $all_subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>">
                                    <?php echo e($subject->name); ?> - <?php echo e($subject->type); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <table aria-describedby="mydesc" class='table table-striped' id='table_list_questions' data-toggle="table" data-url="<?php echo e(route('online-exam-question.show', 1)); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "<?php echo e(__('online').' '.__('exam').' '.__('questions')); ?>-<?= date(' d-m-y') ?>" ,"ignoreColumn":["operate"]}' data-show-export="true" data-query-params="onlineExamQuestionsQueryParams">
                        <thead>
                            <tr>
                                <th scope="col" data-field="online_exam_question_id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="class_name" data-sortable="false"><?php echo e(__('class')); ?></th>
                                <th scope="col" data-field="subject_name" data-sortable="false"><?php echo e(__('subject')); ?></th>
                                <th scope="col" data-field="question" data-sortable="false"><?php echo e(__('question')); ?></th>
                                <th scope="col" data-field="options" data-sortable="false" data-formatter="optionsFormatter"><?php echo e(__('option')); ?></th>
                                <th scope="col" data-field="answers" data-sortable="false" data-formatter="answersFormatter"><?php echo e(__('answer')); ?></th>
                                <th scope="col" data-field="image" data-formatter="imageFormatter" data-sortable="false"><?php echo e(__('image')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false" data-events="onlineExamQuestionsEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit').' '.__('online').' '.__('exam').' '.__('question')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form id="edit-question-form" class="pt-3" action="<?php echo e(url('online-exam-question')); ?>">
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label><?php echo e(__('class')); ?> <span class="text-danger">*</span></label>
                            <select required name="edit_class_id" id="edit-online-exam-class-id" class="form-control select2 online-exam-class-id" style="width:100%;" tabindex="-1" aria-hidden="true">
                                <option value="">--- <?php echo e(__('select') . ' ' . __('class')); ?> ---</option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>">
                                    <?php echo e($class->name); ?> <?php echo e($class->medium->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo e(__('subject')); ?> <span class="text-danger">*</span></label>
                            <select required name="edit_subject_id" id="edit-online-exam-subject-id" class="form-control select2 online-exam-subject-id" style="width:100%;" tabindex="-1" aria-hidden="true">
                                <option value="">--- <?php echo e(__('select') . ' ' . __('subject')); ?> ---</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="edit_question_type" class="edit_question_type">
                    <div id="edit-simple-question" class="bg-light p-3" style="display: none">
                        <div class="form-group">
                            <label><?php echo e(__('question')); ?> <span class="text-danger">*</span></label>
                            <?php echo Form::textarea('edit_question', null, ['placeholder' => __('enter').' '.__('question'), 'class' => 'form-control edit-question','rows'=>4]); ?>

                        </div>
                        <div class="row edit_option_container">
                        </div>
                        <div class="add_button">
                            <button class="btn btn-dark btn-sm add-new-edit-option" type="button"><i class="fa fa-plus-circle fa-3x mr-2" aria-hidden="true"></i><?php echo e(__('add_option')); ?></button>
                        </div>
                    </div>
                    <div id="edit-equation-question" class="bg-light p-3" style="display: none">
                        <div class="form-group col-md-12 col-sm-12">
                            <label><?php echo e(__('question')); ?> <span class="text-danger">*</span></label>
                            <textarea class="editor_question" name="edit_equestion" required placeholder="<?php echo e(__('enter').' '.__('question')); ?>"></textarea>
                        </div>
                        <div class="row edit_eoption_container p-4">
                        </div>
                        <div class="add_button_equations p-4">
                            <button class="btn btn-dark btn-sm add-new-edit-eoption" type="button"><i class="fa fa-plus-circle fa-3x mr-2" aria-hidden="true"></i><?php echo e(__('add_option')); ?></button>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="form-group col-md-6 mt-2">
                            <div class="form-group">
                                <label><?php echo e(__('answer')); ?> <span class="text-danger">*</span></label>
                                <select multiple required name="edit_answer[]" class="edit_answer_select form-control js-example-basic-single select2-hidden-accessible" style="width:100%;" tabindex="-1" aria-hidden="true">
                                </select>
                            </div>
                            <div class="answers_db"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo e(__('image')); ?></label>
                            <input type="file" name="edit_image" class="file-upload-default" />
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>" />
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-theme" type="button" ><?php echo e(__('upload')); ?></button>
                                </span>
                            </div>
                            <div style="width: 60px">
                                <img src="" id="image_preview" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="form-group p-1">
                        <label><?php echo e(__('note')); ?></label>
                        <input type="text" name="edit_note" class="form-control edit_note">
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wrteam-dev/eschool/resources/views/online_exam/class_questions.blade.php ENDPATH**/ ?>