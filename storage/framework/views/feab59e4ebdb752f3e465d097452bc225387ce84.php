<?php $__env->startSection('title'); ?>
    <?php echo e(__('subject')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('subject')); ?>

            </h3>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('subject')); ?>

                        </h4>
                        <form class="pt-3 subject-create-form" id="create-form" action="<?php echo e(route('subject.store')); ?>" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="form-group">
                                <label><?php echo e(__('medium')); ?> <span class="text-danger">*</span></label>
                                <div class="col-12 d-flex row">
                                    <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="medium_id" id="medium_<?php echo e($medium->id); ?>" value="<?php echo e($medium->id); ?>">
                                                <?php echo e($medium->name); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                <input name="name" type="text" placeholder="<?php echo e(__('name')); ?>" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('type')); ?> <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type" id="theory" value="Theory">
                                            Theory
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="type" id="practical" value="Practical">
                                            Practical
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('subject_code')); ?></label>
                                <input name="code" type="text" placeholder="<?php echo e(__('subject_code')); ?>" class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('bg_color')); ?> <span class="text-danger">*</span></label>
                                <input name="bg_color" type="text" placeholder="<?php echo e(__('bg_color_only_hex_code')); ?>" class="color-picker" autocomplete="off"/>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="file-upload-default" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/svg"/>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('image')); ?>"/>
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button"><?php echo e(__('upload')); ?></button>
                                    </span>
                                </div>
                            </div>
                            <input class="btn btn-theme" id="create-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('subject')); ?>

                        </h4>
                        <div id="toolbar">

                            <select name="filter_subject_id" id="filter_subject_id" class="form-control">
                                <option value="">All</option>
                                <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($medium->id); ?>"><?php echo e($medium->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                        <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table" data-url="<?php echo e(url('subject-list')); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-query-params="SubjectQueryParams" data-toolbar="#toolbar" data-export-options='{ "fileName": "subject-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                            ["operate"]}' data-show-export="true">
                            <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                    <?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                <th scope="col" data-field="code" data-sortable="true"><?php echo e(__('subject_code')); ?>

                                </th>
                                <th scope="col" data-field="bg_color" data-formatter="bgColorFormatter" data-sortable="false"><?php echo e(__('bg_color')); ?></th>
                                <th scope="col" data-field="medium_name" data-sortable="false">
                                    <?php echo e(__('medium')); ?>

                                </th>
                                <th scope="col" data-field="image" data-formatter="imageFormatter" data-sortable="false"><?php echo e(__('image')); ?></th>
                                <th scope="col" data-field="type" data-sortable="true"><?php echo e(__('type')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false" data-events="actionEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit') . ' ' . __('subject')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="subject-edit-form" id="edit-form" action="<?php echo e(url('subject')); ?>" novalidate="novalidate">
                            <div class="modal-body">
                                <input type="hidden" name="edit_id" id="edit_id" value=""/>
                                <div class="form-group">
                                    <label><?php echo e(__('medium')); ?> <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input edit" name="medium_id" id="edit_medium_<?php echo e($medium->id); ?>" value="<?php echo e($medium->id); ?>"> <?php echo e($medium->name); ?>

                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                    <input name="name" id="edit_name" type="text" placeholder="<?php echo e(__('name')); ?>" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('type')); ?> <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input edit" name="type" id="edit_theory" value="Theory">
                                                Theory
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input edit" name="type" id="edit_practical" value="Practical">
                                                Practical
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('subject_code')); ?></label>
                                    <input name="code" id="edit_code" type="text" placeholder="<?php echo e(__('subject_code')); ?>" class="form-control"/>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('bg_color')); ?> <span class="text-danger">*</span></label>
                                    <input name="bg_color" id="edit_bg_color" type="text" placeholder="<?php echo e(__('bg_color_only_hex_code')); ?>" class="color-picker" autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" id="edit_image" name="image" class="file-upload-default" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/svg"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="edit_image" class="form-control" disabled="" value=""/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        window.actionEvents = {
            'click .edit-data': function (e, value, row, index) {
                $('#edit_id').val(row.id);
                $('#edit_name').val(row.name);
                $('#edit_code').val(row.code);
                $('#edit_bg_color').asColorPicker('val', row.bg_color);
                $('input[name=medium_id][value=' + row.medium_id + '].edit').prop('checked', true);
                $('input[name=type][value=' + row.type + '].edit').prop('checked', true);
            }
        };

        function bgColorFormatter(value, row) {
            return "<p style='background-color:" + row.bg_color + "' class='color-code-box'>" + row.bg_color + "</p>";
        }

        // function imageFormatter(value, row) {
        //     return "<img src='" + row.image + "' class='img-fluid' />";

        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wrteam-dev/eschool/resources/views/subject/index.blade.php ENDPATH**/ ?>