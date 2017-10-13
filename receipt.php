<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="css/print.min.css">
    <style media="screen">
    img{
        width: 40%;
    }
        body{
            font-family: roboto, verdana, Arial, serif, sans-serif;
            font-size: 14px;
            width: 320px;
            margin: 0;
            padding: 0;
        }
        table{
            width: 100%;
        }
        table th, td {
            width: 25%;
            padding: 5px 0;
            text-align: center;
        }
        .table > thead > tr > th, .table > thead > tr > td {
            border-bottom: 1px dashed #ddd;
        }
        .table > tbody > tr > td {
            border-top: none;
        }
    </style>
  </head>
  <body>
      
    <script src="js/jquery.min.js"></script>
    <script src="js/print.min.js"></script>
    <script type="text/javascript">
    printJS({
        printable: 'receipt',
        type: 'html',
       maxWidth: 320
   });
    </script>
  </body>
</html>
