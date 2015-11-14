<div class="container-question">
    <div class="row">

        <div class="col-lg-12 text-center ">
            <!--Display Final score and Time Taken for the quiz-->
            <h2>Your Score is <?php
                echo $this->data['finalScore'];
                ?>
                || Time Taken:
                <?php
                $timeTaken = $this->data['timeTaken'];

                echo $timeTaken;
                ?></h2>
        </div>

    </div> <!-- /row -->
    <div class="col-md-10 column">
        <!--Rendering content by iterating through questionStructure 
            which was cached by Question_Controller-->
        <?php
        $questionStructure = $this->cache->get('questionStructure');
        $submittedAnswers = $this->data['submittedAnswers'];

        foreach ($questionStructure as $key => $value) {
            ?>
            <div class="panel panel-primary ">
                <div class="question-title">
                    <h3 class="panel-title question-title">
                        <?php echo $value['question']->name; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    foreach ($value['answers'] as $aKey => $aValue) {
                        $submittedAnswerKeys = array_keys($submittedAnswers);
                        $answer = $submittedAnswers[$submittedAnswerKeys[$key]];
                        //displaying right or wrong status of the answer by comparing
                        //user submitted answers with cached answers
                        if ($aValue->mark > 0) {
                            if ($aValue->id == $answer) {
                                ?>
                                <div class=" answer">
                                    <label >
                                        <?php
                                        echo $aValue->name;
                                        ?>
                                        <span class="default-text"><= Your answer is </span>
                                        <span class="right-answer">right!</span>
                                    </label>
                                </div>
                                <?php
                            } else {
                                ?><div class=" answer">
                                    <label >
                                        <?php
                                        echo $aValue->name;
                                        ?>
                                        <span class="default-text"><= This is the </span>
                                        <span class="right-answer">correct!</span>
                                        <span class="default-text">Answer </span>
                                    </label>
                                </div>
                                <?php
                            }
                        } else {
                            if ($aValue->id == $answer) {
                                ?><div class=" answer">
                                    <label >
                                        <?php
                                        echo $aValue->name;
                                        ?>
                                        <span class="default-text"><= Your answer is </span>
                                        <span class="wrong-answer">wrong!</span>
                                    </label>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <?php
                    }
                    ?>
                </div>

            </div>
            <?php
        }
        ?>

        <div class="panel-footer">
            <a href="<?php echo base_url(); ?>" class="btn btn-primary" role="button">Retake another quiz</a>
        </div>
        <div class="col-md-1 column">
        </div>
    </div>
</div>
