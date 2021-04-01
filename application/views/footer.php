<!-- cta start -->
    <section class="cta bg-yellow pt-30 pb-30">
        <div class="container">
            <div class="row align-items-center">
         
    <!-- cta end -->
    <!-- footer start -->
   


    <!-- footer end -->
    <!-- ********************* -->
    <!-- JS Files -->
    <script>
            var BASEURL = "<?php echo base_url();?>";
        </script>

    <script src="<?php echo site_url('') ?>assets/js/modernizr-3.5.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo site_url('') ?>assets/js/jquery-1.12.4.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Jarallex -->

    <!-- JS Files -->
    <script src="<?php echo site_url('') ?>assets/js/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/jquery-1.12.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/jquery.waypoints.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/jquery.countdown.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/lightslider.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/wow.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/jquery.meanmenu.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/tilt.jquery.min.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/main.js"></script>
    <script src="<?php echo site_url('') ?>assets/js/audio-file.js"></script>
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
</script>


<script src="<?php echo site_url('') ?>assets/js/chaturmasjs.js">
</script>
<script src="<?php echo site_url('') ?>assets/js/dckap.js">
</script>

<script type="text/javascript">
 function showPicForm()
{
    $('#uploadimageModal').removeClass('hide');
    $('#uploadimageModal').modal('show');
    return false;
}</script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

</script>
<script type="text/javascript">
$(document).ready(function(){
            setTimeout(function(){
        $("#loginModal").modal('show');
    },1000);
           
    });
</script>

<script type="text/javascript">
    function download_table_as_csv(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length-1; j++) {
            // Clean innertext to remove multiple spaces and jumpline (break csv)
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'export_' + table_id + '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>

</body>
</html>