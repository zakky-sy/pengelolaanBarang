<script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>

<script>
  // File Input
  $('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  // Merubah Hak Akses
  $('.form-check-input').on('click', function () {
    const menuId = $(this).data('menu');
    const grupId = $(this).data('grup');
    $.ajax ({
      url: "<?= base_url('grup/ubahakses'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        grupId: grupId
      },
      success: function () {
        document.location.href = "<?= base_url('grup/detail/'); ?>" + grupId;
      }
    });
  });

  // DataTable Bahasa Indonesia
  $(document).ready(function () {
    $('#dataTable').DataTable({
      "language":{
        "url":"//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
      }
    });
  });
</script>