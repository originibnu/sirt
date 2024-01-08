<?php $__env->startSection('title'); ?>
    <?php echo e(__('Shifts')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage').' '.__('shifts')); ?>

            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create').' '.__('new').' '.__('shifts')); ?>

                        </h4>
                        <form class="pt-3 section-create-form" id="create-form" action="<?php echo e(route('shifts.store')); ?>" method="POST" novalidate="novalidate">
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('shift_name')); ?> <span class="text-danger">*</span></label>
                                    <input name="name" type="text" placeholder="<?php echo e(__('name')); ?>" class="form-control" required/>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('start_time')); ?> <span class="text-danger">*</span></label>
                                    <input name="start_time" type="time" class="form-control" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label><?php echo e(__('end_time')); ?> <span class="text-danger">*</span></label>
                                    <input name="end_time"type="time" class="form-control" required/>
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
                            <?php echo e(__('list').' '.__('shifts')); ?>

                        </h4>
                        <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table" data-url="<?php echo e(url('shifts/show')); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-query-params="queryParams" data-show-export="true"
                               data-export-options='{"fileName": "shift-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}'>
                            <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="title" data-sortable="false"><?php echo e(__('shift_name')); ?></th>
                                <th scope="col" data-field="start_time" data-sortable="false"><?php echo e(__('starting_time')); ?></th>
                                <th scope="col" data-field="end_time" data-sortable="false"><?php echo e(__('ending_time')); ?></th>
                                <th scope="col" data-field="status" data-sortable="false" data-formatter="shiftStatusFormatter"><?php echo e(__('status')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false" data-events="actionEvents"><?php echo e(__('action')); ?></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
             <!-- Modal -->
             <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit').' '.__('shifts')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="pt-3 section-edit-form" id="edit-form" action="<?php echo e(url('shifts')); ?>" novalidate="novalidate">
                            <input type="hidden" name="edit_id" id="edit_id" value=""/>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label><?php echo e(__('shift_name')); ?> <span class="text-danger">*</span></label>
                                        <input name="edit_name" id="edit_name" type="text" placeholder="<?php echo e(__('name')); ?>" class="form-control" required/>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label><?php echo e(__('start_time')); ?> <span class="text-danger">*</span></label>
                                        <input name="edit_start_time" id="edit_start_time" type="time" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label><?php echo e(__('end_time')); ?> <span class="text-danger">*</span></label>
                                        <input name="edit_end_time" id="edit_end_time" type="time" class="form-control" required/>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                            <label><?php echo e(__('status')); ?> <span class="text-danger">*</span></label><br>
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <?php echo Form::radio('status', '1',false,['id' => 'edit_status_active']); ?>

                                                        <?php echo e(__('active')); ?>

                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <?php echo Form::radio('status', '0',false,['id' => 'edit_status_inactive']); ?>

                                                        <?php echo e(__('inactive')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        
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
    </div>
<?php $__env->stopSection(); ?>            

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        window.actionEvents = {
            'click .edit-data': function (e, value, row, index) {
                $('#edit_id').val(row.id);
                $('#edit_name').val(row.title);
                $('#edit_start_time').val(row.start_time);
                $('#edit_end_time').val(row.end_time);
                if (row.status == '1') {
                $('#edit_status_active').removeAttr('checked');
                $('#edit_status_active').attr('checked', 'true');
                } else {
                $('#edit_status_inactive').removeAttr('checked');
                $('#edit_status_inactive').attr('checked', 'true');
                }
            }
        };
    </script>

<script type="text/javascript">
    function queryParams(p) {
        return {
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wrteam-dev/eschool/resources/views/shifts/index.blade.php ENDPATH**/ ?>