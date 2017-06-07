<!-----------------------------------------------------------------------------

De footer.php pagina is om de code af te maken op elke pagina. ook zijn er wat
javascript bestanden die ingeladen moeten worden.

------------------------------------------------------------------------------>

<div class="clearfix"></div>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="view/vendor/jquery/jquery.min.js"></script>
    <script src="view/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="view/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="view/js/klorofil-common.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("/view/ajax/backend-search-pdo-format.php", {term: inputVal}).done(function(data){
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
                url:"/view/ajax/chooseSG.php",
                data:"checkedName="+checkedName+"&email="+email,
                success:function(data){
                   $(".selectClassOverlay").css('display','none')
                }
            });
        });
    </script>
</body>
</html>
