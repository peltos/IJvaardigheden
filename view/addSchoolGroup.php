<?php if (!$_SESSION["roleUser"] >= 1){ header('Location: ../student.php'); } ?>
<?php include 'headAdmin.php'; ?>


    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Klas Toevoegen</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="cname">Klas</label>
                                <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Geef de klas" autofocus>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Toevoegen </button>
                        </form>
                        <?php
                        //tabel om de klassen weer te geven
                        echo "<h4> Klassenoverzicht </h4>";
                        echo '<table class="table table-hover">';
                            echo '<thead>';
                                echo '<tr>';
                                    echo '<th> Klas </th>';
                                    echo '<th></th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                                foreach ($readList as $value) {
                                    echo '<tr>';
                                        echo '<td class="'.$value['schoolGroup'].'">';
                                            if ($value > null){echo $value['schoolGroup'];}
                                        echo '</td>';
                                        echo '<td>';
                                            echo '<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Verwijderen</button>';
                                            echo '<div class="infoBadge" > </div>';
                                        echo '</td>';
                                    echo '</tr>';
                                }
                            echo '</tbody>';
                        echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="view/vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('click', '.btn-danger', function () {
            var alert = confirm("Deze klas wordt permanent verwijderd. Weet u het zeker?");
            if (alert == true) {
                var checkedName = $(this).parent().parent().children("td").attr("class"); 
                var pathInfo=$(this).siblings(".infoBadge");
                var remove=$(this).parent().parent().remove("tr");

                $.ajax({
                      type:"post",
                      url:"/view/ajax/deleteSG.php",
                      data:"checkedName="+checkedName,
                      success:function(data){
                         remove;
                      }

                });
            } else {}
        });
   });

</script>
<?php include 'footer.php'; ?>