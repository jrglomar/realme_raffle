
<form id="excelSubmit">
    <label for="excelFile" class=" form-control-label">Excel File for Store List<small style=color:red> *</small></label><br>
    <input id="excelFile" name="excelFile" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" /><br><br>
    <input type="submit" name="Submit" id="btnAddExcel" value="Submit" class="btn btn-lg btn-success">
</form>

<script src="<?php echo base_url()?>assets/jquery/jquery-3.5.1.js"></script>
<script src="<?php echo base_url()?>assets/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo base_url()?>assets/jquery/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/jquery/sweetalert2@11.js"></script>
<script>
$(document).ready(function(){

        $('#excelSubmit').on('submit', function(e){
            e.preventDefault()
            
            $("#btnAddExcel").attr("disabled", true);

            var excelFile = $('#excelFile').val()
            var Extension = excelFile.substring(
                excelFile.lastIndexOf('.') + 1).toLowerCase();

            if (Extension == "xlsx") {
                    $.ajax({
                        url: '<?php echo base_url()?>import/store',
                        type: "post",
                        data: new FormData(this),
                        processData:false,
                        contentType:false,
                    
                        success: function(){
                            refresh()
                            Swal.fire({
                                title: 'Success!',
                                text: 'You successfully add a multiple user.',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                                })
                                $("#btnAddExcel").attr("disabled", false);
                        }
                    })
            }
            else{
                Swal.fire({
                            title: 'Warning!',
                            text: 'Should be .xlsx file!',
                            icon: 'warning',
                            confirmButtonText: 'Ok'
                        })
                    $("#btnAddExcel").attr("disabled", false);
            }
        })

})
</script>