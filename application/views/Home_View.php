<div class="container-full">
    <div class="row">
        <div class="col-lg-12 text-center v-center">
            <h1>Welcome to Take-A-Quiz</h1>
            <p class="lead">please select one of the following quizzes</p>
            <br>
            <form class="col-lg-12" name="Home_Form" action="<?php echo base_url(); ?>question_Controller" method="POST">
                <div class="input-group input-group-lg col-sm-offset-4 col-sm-4">
                    <select type="text" class="center-block form-control input-lg" title="Select a quiz" name="quizDropDown" id="quizDropDown">
                        <!--Dynamically loading options of this drop-down
                            by iterating through quizzes sent from the Home_Controller-->
                        <?php
                        $quizzes = $this->data['quizzes'];
                        foreach ($quizzes as $key => $value) {
                            ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit" name="selectQuizButton" id="selectQuizButton">OK</button></span>
                </div>
            </form>
        </div>
    </div>
</div>
