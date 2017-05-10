<?php include 'headAdmin.php'; ?>
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Aanpassen gebruiker</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="cname">Klas</label>
                            <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Geef de klas">
                        </div>
                        <button type="submit" class="btn btn-default" >Submit</button> 
                        <?php
                    
                        foreach ($readList as $value) {
                         echo $value['schoolGroup'];
                         echo '<hr>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>