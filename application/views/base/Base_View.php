<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
        <title>Take-A-Quiz</title>
    </head>
    <body>
        <div class="container-question">
            <div class="navbar navbar-inverse navbar-static-top question-nav">
                <div class="collapse navbar-collapse ">
                    <ul class="nav navbar-nav ">
                        <li class="active "><a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main">
                <!--Appending sub-view content -->
                <?php $this->load->view($subview); ?>
            </div>
        </div>
    </body>
</html>
