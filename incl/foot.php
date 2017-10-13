<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>

                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                       Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
        </div>
    </div>
</footer>

</div>
</div>






	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>



    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){
            var valDate = {
                'Mon' : 0,
                'Tue' : 0,
                'Wed' : 0,
                'Thu' : 0,
                'Fri' : 0,
                'Sat' : 0,
                'Sun' : 0
            };
        	demo.initChartist();
            <?php
            date_default_timezone_set('UTC');
            $sales = $db->prepare('
            SELECT orders.qty, products.price, orders.made
            FROM orders
            INNER JOIN products ON products.id = orders.pid
            WHERE orders.status = "take"
            ');
            $sales->execute();
            while ($s = $sales->fetch()) {
                $x = explode('-', $s['made']);
                $d = date('D', mktime(0, 0, 0, $x[1], $x[2], $x[0]));
                ?>
                valDate['<?php echo $d ?>'] += Math.round(<?php echo (double)$s['price'] * (double)$s['qty'] ?>);
            <?php }

            ?>
            console.log(valDate);
            var data = {
              labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
              series: [
                [542, 543, 520, 680, 653, 753, 326]
              ]
            };

            var options = {
                seriesBarDistance: 10,
                axisX: {
                    showGrid: false
                },
                showArea: true,
                showPoint: false,
                fullWidth: true,
                height: "245px"
            };

            var responsiveOptions = [
              ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                  labelInterpolationFnc: function (value) {
                    return value[0];
                  }
                }
              }]
            ];

            Chartist.Line('#saleChart', data, options, responsiveOptions);

    	});
	</script>
</body>
</html>
