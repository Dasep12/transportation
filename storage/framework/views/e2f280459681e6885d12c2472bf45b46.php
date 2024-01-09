<!-- lightbox init js-->
<script src="<?php echo e(URL::asset('public/build/js/pages/lightbox.init.js')); ?>"></script>



<!-- form advanced init -->
<script src="<?php echo e(URL::asset('public/build/js/pages/form-advanced.init.js')); ?>"></script>

<!-- form repeater js -->
<script src="<?php echo e(URL::asset('public/build/libs/jquery.repeater/jquery.repeater.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('public/build/js/pages/form-repeater.int.js')); ?>"></script>

<!-- apexcharts -->
<script src="<?php echo e(URL::asset('public/build/libs/apexcharts/apexcharts.min.js')); ?>"></script>

<!-- Sweet alert init js-->
<!-- <script src="<?php echo e(URL::asset('build/js/pages/sweet-alerts.init.js')); ?>"></script> -->

<script>
    $('#datatable thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#datatable thead');

    var tables = $("#datatable").DataTable({
        orderCellsTop: true,
        pagingType: 'full_numbers',
        fixedHeader: true,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        initComplete: function() {
            var api = this.api();

            // For each column
            api
                .columns()
                .eq(0)
                .each(function(colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" class="form-control form-control-sm" placeholder="' + title + '" />');

                    // On every keypress in this input
                    $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                        .off('keyup change')
                        .on('change', function(e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != '' ?
                                    regexr.replace('{search}', '(((' + this.value + ')))') :
                                    '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function(e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    })

    $(".select2").select2();
    $(".select3").select2();
    $(".select4").select2();
    $(".select5").select2();



    $(document).on('keyup', '.number-decimal', function(e) {

        var regex = /[^\d.]|\.(?=.*\.)/g;
        var subst = "";

        var str = $(this).val();
        var result = str.replace(regex, subst);
        $(this).val(result);

    });
</script>

<?php echo $__env->yieldContent('script'); ?>

<!-- App js -->
<script src="<?php echo e(URL::asset('public/build/js/app.js')); ?>"></script>

<?php echo $__env->yieldContent('script-bottom'); ?><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>