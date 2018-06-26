
<?php include 'headAdmin.php'; ?>


    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Badge Toevoegen</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" >
                            <div class="form-group">
                                <label for="cname">Afbeelding</label>
                                <table class="selectImage">
                                    <thead>
                                        <tr>
                                            <td><input type="radio" name="badge" value="badge-01" checked> <img src="view/img/badge-01.png" /></td>
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
                                <select class="form-control" name="Vak" >
                                    <?php 
                                    foreach ($readVakken as $value) {
                                        echo '<option class="badgeStyle badgeList" value="'.$value['subject'].'">'.$value['subject'].'</option>';
                                    }
                                    ?>
                                </select>
                                <br>
                                <label for="cname">Beschrijving</label>
                                <input type="text" class="form-control" id="discriptie" name="Discriptie" placeholder="Geef hier de beschrijving">
                            </div>
                            <button type="submit" class="btn btn-primary" disabled><i class="fa fa-plus-circle"></i> Toevoegen </button>
                        </form>
                        <?php

                        echo "<br>";
                        echo "<br>";
                        //tabel om de klassen weer te geven
                        echo "<h4> Klassenoverzicht </h4>";
                        echo '<form action="" method="post">';
                            echo '<table class="table table-hover">';
                                echo '<thead>';
                                    echo '<tr>';
                                        echo '<th> Afbeelding </th>';
                                        echo '<th> Vak </th>';
                                        echo '<th> Discriptie </th>';
                                        echo '<th>  </th>';
                                    echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                    foreach ($readList as $value) {
                                        echo '<tr class="badgeStyle">';
                                            echo '<td class="'.$value['idbadges'].'"><center><img src="view/img/'.$value['pathToImage'].'.png"/></center></td>';
                                            echo '<td class="subject">'.$value['subject_subject'].'</td>';
                                            echo '<td class="desc">'.$value['description'].'</td>';
                                            echo '<td><button type="button" class="btn btn-danger btn-badge" disabled><i class="fa fa-trash-o"></i> Verwijderen</button><div class="infoBadge" > </div></td>';
                                            
                                        echo '</tr>';
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
<script src="view/vendor/jquery/jquery.min.js"></script>
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $(document).on('click', '.btn-badge', function () {-->
<!--            var alert = confirm("Deze badge wordt permanent verwijderd. Weet u het zeker?");-->
<!--            if (alert == true) {-->
<!--                var checkedSubject = $(this).parent().parent().children(".subject").text(); -->
<!--                var checkedDesc = $(this).parent().parent().children(".desc").text(); -->
<!--                var checkedID = $(this).parent().parent().children("td").attr("class"); -->
<!--                var pathInfo=$(this).siblings(".infoBadge");-->
<!--                var remove=$(this).parent().parent().remove("tr");-->
<!---->
<!--                $.ajax({-->
<!--                      type:"post",-->
<!--                      url:"--><?php //echo URL ?>///view/ajax/deleteBadge.php",
//                      data:"checkedSubject="+checkedSubject+"&checkedDesc="+checkedDesc+"&checkedID="+checkedID,
//                      success:function(data){
//                          remove;
//                      }
//
//                });
//            } else {}
//        });
//   });
//
//</script>
<?php include 'footer.php'; ?>