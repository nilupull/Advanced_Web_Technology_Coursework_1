<script>
    function startTimer(timerView, hiddenField) {
        var timer = 0, minutes, seconds;
        setInterval(function() {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            timerView.textContent = minutes + ":" + seconds;
            hiddenField.value = minutes + ":" + seconds;
            ++timer;
        }, 1000);
    }

    window.onload = function() {
        var timerView = document.querySelector('#time'),
            hiddenField = document.querySelector('#timeTaken');

        startTimer(timerView, hiddenField);
    };
</script>

<div class="container-question">
    <div class="col-lg-12 text-center">
        <body> 
            <!--Display time taken-->
            <div class="clock-text">Time Taken:<span id="time"></span> !</div>
        </body>
    </div>
    <form action='<?php echo base_url(); ?>score_controller' name="Quiz_Form" method="POST">
        
        <div class="col-md-10 column">
            <!--Dynamically loading Questions and answers 
            by iterating through questionStructure sent from the Question_Controller-->
            <?php
            $questionStructure = $this->data['questionStructure'];
            foreach ($questionStructure as $key => $value) {
                ?>
                <div class="panel panel-primary ">
                    <div class="question-title">
                        <h3 class="panel-title question-title">
                            <?php echo $value['question']->name; ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach ($value['answers'] as $aKey => $aValue) {
                            ?>
                            <div class="radio answer">
                                <label >
                                    <input type="radio" name="answer-radio<?php echo $value['question']->id; ?>" id="<?php echo $value['question']->id; ?>" value="<?php echo $aValue->id; ?>" checked="" > <?php echo $aValue->name; ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                </div>
                <?php
            }
            ?>
            <!--END-->
            <div class="panel-footer">
                <input class="btn btn-primary " id="submitResultsButton" name="submitResultsButton" type="submit" value="Confirm"/>
                <a href="<?php echo base_url(); ?>" class="btn btn-default" role="button">Cancel</a>
            </div>
            <div class="col-md-1 column">
            </div>

        </div>
        <!--Hidden field to store time taken-->
        <input type="hidden" name="timeTaken" id="timeTaken" value=""/>
        <input type="hidden" name="questionType" id="questionType" value="<?php echo $this->data['questionType']?>" >
    </form>
</div>
