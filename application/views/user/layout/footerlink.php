<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('.thumbnail').click(function() {
            $('.modal-body').empty();
            var title = $(this).parent('a').attr("title");
            var desc = $(this).parent('a').attr("desc");
            $('.modal-title').html(title);
            $('.modal-desc').html(desc);
            $($(this).parents('div').html()).appendTo('.modal-body');
            $('#myModal').modal({show: true});
        });
    });
</script>

