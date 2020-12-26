

    <?php

    ?>
    <script>
    
    var Script = function () {
    
        var oui = document.getElementById("result1").innerHTML;
        var non = document.getElementById("result2").innerHTML;
       
        var pieData = [
            {
                value: document.getElementById("result1").innerHTML*100,
                color:"#1abc9c"
            },
            {
                value : document.getElementById("result2").innerHTML*100,
                color : "#ff0000"
            }
    
        ];
       
        new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
    
    
    }();
    </Script>
<?php

?>

