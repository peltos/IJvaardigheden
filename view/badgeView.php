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
                        <form method="post" >
                            <div class="form-group">
                                <label for="cname">Afbeelding</label>
                                <table class="selectImage">
                                    <thead>
                                        <tr>
                                            <td><input type="radio" name="badge" value="badge-01"> <img src="view/img/badge-01.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-02"> <img src="view/img/badge-02.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-03"> <img src="view/img/badge-03.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-04"> <img src="view/img/badge-04.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-05"> <img src="view/img/badge-05.png" /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="badge" value="badge-06"> <img src="view/img/badge-06.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-07"> <img src="view/img/badge-07.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-08"> <img src="view/img/badge-08.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-09"> <img src="view/img/badge-09.png" /></td>
                                            <td><input type="radio" name="badge" value="badge-10"> <img src="view/img/badge-10.png" /></td>
                                        </tr>
                                    </thead>
                                </table>
                                <br>
                                <label for="cname">Vak</label>
                                </br>
                                <select name="Vak" >
                                    <?php 
                                    foreach ($readVakken as $value) {
                                        echo '<option class="badgeStyle badgeList" value="'.$value['subject'].'">'.$value['subject'].'</option>';
                                    }
                                    ?>
                                </select>
                                <br>
                                <label for="cname">Discriptie</label>
                                <input type="text" class="form-control" id="discriptie" name="Discriptie"placeholder="Geef de klas">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Toevoegen </button>
                        </form>
                        <?php
//
//                        echo "<br>";
//                        echo "<br>";
//                        //tabel om de klassen weer te geven
//                        echo "<h4> Klassenoverzicht </h4>";
//                        echo '<form action="" method="post">';
//                            echo '<table class="table table-hover">';
//                                echo '<thead>';
//                                    echo '<tr>';
//                                        echo '<th> Afbeelding </th>';
//                                        echo '<th> Vak </th>';
//                                        echo '<th> Discriptie </th>';
//                                        echo '<th>  </th>';
//                                    echo '</tr>';
//                                echo '</thead>';
//                                echo '<tbody>';
//                                $counter = 0;
//                                    foreach ($readList as $value) {
//                                        echo '<tr class="badgeStyle badgeList'.$counter.'">';
//                                            echo '<td><center><img src="view/img/'.$value['pathToImage'].'"/></center></td>';
//                                            echo '<td>'.$value['subject_subject'].'</td>';
//                                            echo '<td>'.$value['description'].'</td>';
//                                            echo '<td><button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Verwijderen</button></td>';
//                                        echo '</tr>';
//                                        $counter++;
//                                    }
//                                echo '</tbody>';
//                            echo '</table>';
//                        echo '</form>'
//                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>