<?php
$i = 1; $i < 10;
$a = 0;
$product_question = get_field("question");

// var_dump($product_question);
if ($product_question  ): ?>
    <div class="property" id="tab4">
        <p class="property-tab">
            frequently asked question </p>
        <div id="tab4Content" class="tab-content property-Content faq">

            <div>
                <?php foreach ($product_question as $question):
                    $a++; ?>
                    <?php if (!empty($question['ask']) || !empty($question['value'])): ?>
                        <div>
                            <div class="question">
                                <?= !empty($question['ask']) ? $a . '. ' . $question['ask'] : ''; ?>
                            </div>
                            <div class="answer"><?= !empty($question['answer']) ? $question['answer'] : ''; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>

        </div>
    <?php 
endif; ?>

