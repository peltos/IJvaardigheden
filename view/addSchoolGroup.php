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
                                <input type="text" class="form-control" id="groupName" name="groupName"
                                       placeholder="Geef de klas">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Toevoegen </button>
                        </form>
                        <?php

                        echo "<br>";
                        echo "<br>";
                        //tabel om de klassen weer te geven
                        echo "<h4> Klassenoverzicht </h4>";
                        echo '<form action="" method="post">';
                        echo '<table class="table table-hover" style="width:25%">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th> Klas </th>';
                        echo'<th></th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        echo "<br>";
                        $counter = 0;

                        foreach ($readList as $value) {
                            echo '<tr>';
                            echo '<td class="counter'.$counter.'">';
                            echo $value['schoolGroup'];
                            echo '</td>';
                            echo '<td>';
                            echo '<button type="button" class="btn btn-danger counter'.$counter.'"><i class="fa fa-trash-o"></i> Verwijderen</button>';
                            echo '</td>';
                            echo '</tr>';
                            $counter++;
                        }

                        echo '</tbody>';
                        echo '</table>';
                        echo '</form>'
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>