<!-----------------------------------------------------------------------------

De footer.php pagina is om de code af te maken op elke pagina. ook zijn er wat
javascript bestanden die ingeladen moeten worden.

------------------------------------------------------------------------------>

<div class="clearfix"></div>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="view/js/klorofil-common.js"></script>
    <script>
        $(document).ready(function(){
            $( ".starcheck.input0" ).click(function() {
                $(this).parent().parent().parent().parent().addClass("rankNone");
                $(this).parent().parent().parent().parent().removeClass("rankBrown");
                $(this).parent().parent().parent().parent().removeClass("rankSilver");
                $(this).parent().parent().parent().parent().removeClass("rankGold");
            });
            $( ".starcheck.input1" ).click(function() {
                $(this).parent().parent().parent().parent().removeClass("rankNone");
                $(this).parent().parent().parent().parent().addClass("rankBrown");
                $(this).parent().parent().parent().parent().removeClass("rankSilver");
                $(this).parent().parent().parent().parent().removeClass("rankGold");
            });
            $( ".starcheck.input2" ).click(function() {
                $(this).parent().parent().parent().parent().removeClass("rankNone");
                $(this).parent().parent().parent().parent().removeClass("rankBrown");
                $(this).parent().parent().parent().parent().addClass("rankSilver");
                $(this).parent().parent().parent().parent().removeClass("rankGold");
            });
            $( ".starcheck.input3" ).click(function() {
                $(this).parent().parent().parent().parent().removeClass("rankNone");
                $(this).parent().parent().parent().parent().removeClass("rankBrown");
                $(this).parent().parent().parent().parent().removeClass("rankSilver");
                $(this).parent().parent().parent().parent().addClass("rankGold");
            });
            $(document).on('click', '.starcheck', function () {


                var checkedEmail = '<?php echo $_SESSION["email" . $idUser]?>';
                var checkedId = $(this).parent().attr("name");

                var checkedVal=$(this).val();
                var pathInfo=$(this).parents("fieldset").siblings(".infoBadge");

                $.ajax({
                    type:"post",
                    url:"<?php echo URL ?>/view/ajax/process.php",
                    data:"checkedVal="+checkedVal+"&checkedId="+checkedId+"&checkedEmail="+checkedEmail,
                    success:function(data){
                        pathInfo.html(data);
                        pathInfo.removeClass("notificationStyle0");
                        pathInfo.removeClass("notificationStyle1");
                        pathInfo.removeClass("notificationStyle2");
                        pathInfo.removeClass("notificationStyle3");
                        pathInfo.addClass("notificationStyle"+checkedVal);
                    }
                });
            });
        });

    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get( "<?php echo URL ?>/view/ajax/backend-search-pdo-format.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
    </script>
    <script type="text/javascript">
        $(document).on('click', '.panel-body button', function () {
            var email = '<?php echo $_SESSION['userEmail']?>';
            var checkedName = $('.schoolgroupStarter option:selected').text();
            var pathInfo=$(".selectClassOverlay .infoBadge");
            

            $.ajax({
                type:"post",
                url:"<?php echo URL ?>/view/ajax/chooseSG.php",
                data:"checkedName="+checkedName+"&email="+email,
                success:function(data){
                   $(".selectClassOverlay").css('display','none')
                }
            });
        });
    </script>
</body>
</html>
